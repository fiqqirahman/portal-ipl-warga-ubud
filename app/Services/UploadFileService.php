<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * The UploadFileService class handles file upload operations, providing methods to create, update, and manage files
 * with customizable options like disk selection, nullable file uploads, and automatic deletion of old files.
 *
 * Features:
 * - Customizable disk storage (`public` by default).
 * - Optional nullable file uploads, meaning files are not required for certain operations.
 * - Ability to retain or remove old files when updating with a new file.
 * - Supports custom file names, with optional random string generation for uniqueness.
 * - Extracts the original file name from a stored file path.
 *
 * Methods:
 * - `create(UploadedFile|null $requestFile, string $destinationPath): ?string`
 *   Uploads a new file to the specified destination path. Returns the file path or throws an exception if the file is required but not provided.
 *
 * - `update(UploadedFile|null $requestFile, string $destinationPath, ?string $oldFile = null): ?string`
 *   Updates an existing file. If a new file is provided, it replaces the old one and optionally deletes the previous file.
 *   Returns the new file path or the old file path if no new file is uploaded.
 *
 * - `nullable(): UploadFileService`
 *   Configures the service to allow nullable file uploads (i.e., the file is not required).
 *
 * - `keepOldFile(): UploadFileService`
 *   Configures the service to keep the old file when updating, instead of deleting it.
 *
 * - `customFilename(?string $customFilename = null, bool $withRandomString = false): UploadFileService`
 *   Sets a custom name for the file, with an optional random string for uniqueness.
 *
 * - `disk(string $disk = 'public'): UploadFileService`
 *   Sets the storage disk for file uploads. Defaults to 'public'.
 *
 * - `extractFilename(string $path): ?string`
 *   Extracts the original filename from the given file path (e.g., 'path/to/images/image-{randomString}.{extension}' returns 'image.{extension}').
 */
class UploadFileService {
	
	private static string $disk = 'public';
	private static bool $required = true;
	private static bool $removeOldFile = true;
	private static ?string $customFilename = null;
	private static bool $withRandomString = false;
	
	/**
	 * Create a new file upload.
	 *
	 * @param UploadedFile|null $requestFile
	 * @param string $destinationPath
	 * @return string|null Uploaded file path or null if file is not required and not provided.
	 * @throws Exception
	 */
	public static function create(?UploadedFile $requestFile, string $destinationPath): ?string
	{
		try {
			if ($requestFile && $requestFile->isFile()) {
				$filename = self::makeFilename($requestFile);
				$requestFile->storeAs($destinationPath, $filename, self::$disk);
				
				return trim($destinationPath, '/') . '/' . $filename;
			} elseif (self::$required) {
				throw new Exception('Request File is empty!');
			}
			
			return null;
		} catch (Exception $e) {
			logException('[create] UploadFileService', $e);
			
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Update an existing file, keeping or deleting the old file as needed.
	 *
	 * @param UploadedFile|null $requestFile
	 * @param string $destinationPath
	 * @param string|null $oldFile
	 * @return string|null New or old file path.
	 * @throws Exception
	 */
	public static function update(?UploadedFile $requestFile, string $destinationPath, ?string $oldFile = null): ?string
	{
		try {
			if ($requestFile && $requestFile->isFile()) {
				$filename = self::makeFilename($requestFile);
				$requestFile->storeAs($destinationPath, $filename, self::$disk);
				if (self::$removeOldFile && !empty($oldFile) && Storage::disk(self::$disk)->exists($oldFile)) {
					Storage::disk(self::$disk)->delete($oldFile);
				}
				
				return trim($destinationPath, '/') . '/' . $filename;
			} elseif (!self::$required && empty($oldFile)) {
				throw new Exception('Old file is empty!');
			} elseif (self::$required) {
				throw new Exception('Request File is empty!');
			}
			
			return $oldFile;
		} catch (Exception $e) {
			logException('[update] UploadFileService', $e);
			
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Set the file upload to be nullable (not required).
	 *
	 * @return UploadFileService
	 */
	public static function nullable(): UploadFileService
	{
		self::$required = false;
		
		return new static;
	}
	
	/**
	 * Keep the old file when updating.
	 *
	 * @return UploadFileService
	 */
	public static function keepOldFile(): UploadFileService
	{
		self::$removeOldFile = false;
		
		return new static;
	}
	
	/**
	 * Set a custom file name with an optional random string.
	 *
	 * @param string|null $customFilename
	 * @param bool $withRandomString
	 * @return UploadFileService
	 */
	public static function customFilename(?string $customFilename = null, bool $withRandomString = false): UploadFileService
	{
		self::$customFilename = $customFilename;
		self::$withRandomString = $withRandomString;
		
		return new static;
	}
	
	/**
	 * Set the storage disk for file uploads.
	 *
	 * @param string $disk
	 * @return UploadFileService
	 */
	public static function disk(string $disk = 'public'): UploadFileService
	{
		if (!in_array($disk, ['public', 'local'])) {
			$disk = 'public';
		}
		self::$disk = $disk;
		
		return new static;
	}
	
	/**
	 * Generate a filename based on the original name or a custom name.
	 *
	 * @param UploadedFile $file
	 * @return string
	 */
	private static function makeFilename(UploadedFile $file): string
	{
		if (!is_null(self::$customFilename) && self::$withRandomString) {
			return self::$customFilename . '-' . Str::random(6) . '.' . strtolower($file->guessExtension());
		} elseif (!is_null(self::$customFilename)) {
			return self::$customFilename . '.' . strtolower($file->guessExtension());
		}
		
		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		
		return strtolower(Str::slug(substr($filename, 0, 200)) . '-' . Str::random(6)) . '.' . strtolower($file->guessExtension());
	}
	
	/**
	 * Extract the original filename from a stored file path.
	 *
	 * @param string $path
	 * @return string|null Original filename.
	 */
	public static function extractFilename(string $path): ?string
	{
		try {
			$arrayPath = explode('.', $path);
			$beforeExtension = $arrayPath[0];
			$extension = $arrayPath[1];
			
			$lastPath = last(explode('/', $beforeExtension));
			$split = explode('-', $lastPath);
			$randomString = last($split);
			
			return str_replace('-' . $randomString, '', $lastPath) . '.' . $extension;
		} catch (Exception $e) {
			return null;
		}
	}
	
	/**
	 * Make File Additional Info
	 *
	 * @param UploadedFile $requestFile
	 * @return array
	 */
	public static function getAdditionalInfo(UploadedFile $requestFile): array
	{
		$guessExtension = strtolower($requestFile->guessExtension());
		$fileName = pathinfo(
			$requestFile->getClientOriginalName(), PATHINFO_FILENAME
		);
		
		return [
			'uuid' => Str::uuid(),
			'original_name' => $fileName,
			'size' => $requestFile->getSize(),
			'extension' => $guessExtension
		];
	}
	
	/**
	 * Delete file from storage
	 *
	 * @param string|null $path
	 * @return bool
	 */
	public static function delete(?string $path): bool
	{
		try {
			if (!empty($path) && Storage::disk(self::$disk)->exists($path)) {
				Storage::disk(self::$disk)->delete($path);
				
				return true;
			}
			
			return false;
		} catch (Exception $e) {
			logException('[delete] UploadFileService failed delete file from storage', $e);
			
			return false;
		}
	}
}