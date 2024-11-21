<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * The UploadFileService class provides methods for handling file uploads, including creating new uploads
 * and updating existing files. It supports customizable options such as disk selection, nullable file uploads,
 * and removing old files upon update.
 *
 * Methods:
 * - `create(UploadedFile|null $requestFile, string $destinationPath): ?string`
 *   Uploads a new file to the specified destination path. Returns the file path or throws an exception if the file is required but not provided.
 *
 * - `update(UploadedFile|null $requestFile, string $destinationPath, ?string $oldFile = null): ?string`
 *   Updates an existing file upload. If a new file is provided, it replaces the old file and optionally deletes the old file. Returns the new file path or the old file path.
 *
 * - `nullable(): UploadFileService`
 *   Sets the service to nullable file uploads.
 *
 * - `keepOldFile(): UploadFileService`
 *   Configures the service to retain the old file upon update, rather than deleting it.
 *
 * - `disk(string $disk = 'public'): UploadFileService`
 *   Specifies the disk to be used for file storage. Defaults to 'public'.
 *
 * - `extractFilename(string $path): string`
 *   Extract path to origin filename. Example : path/to/images/image-{someRandomString}.{extension} => image.{extension}
 */
class UploadFileService {
	
	private static string $disk = 'public';
	private static bool $required = TRUE;
	private static bool $removeOldFile = TRUE;
	
	/**
	 * Create a new file upload.
	 *
	 * @param UploadedFile|null $requestFile
	 * @param $destinationPath
	 * @return string|null path uploaded file
	 * @throws Exception
	 */
    public static function create(?UploadedFile $requestFile, $destinationPath): ?string
    {
        try {
	        if ($requestFile && $requestFile->isFile()) {
	            $filename = self::makeFilename($requestFile);
	            
	            $requestFile->storeAs($destinationPath, $filename, self::$disk);

                return trim($destinationPath, '/') . '/' . $filename;
	        } else {
				if(self::$required){
					throw new Exception('Request File is empty!');
				}
				
	            return NULL;
	        }
        } catch (Exception $e) {
			logException('[create] UploadFile', $e);
            throw new Exception($e->getMessage());
        }
    }
	
	/**
	 * Update an existing file upload, if empty will return old file.
	 *
	 * @param UploadedFile|null $requestFile
	 * @param $destinationPath
	 * @param string|null $oldFile
	 * @return string|null path uploaded file or path old file
	 * @throws Exception
	 */
    public static function update(?UploadedFile $requestFile, $destinationPath, ?string $oldFile = null): ?string
    {
        try {
	        if ($requestFile && $requestFile->isFile()) {
		        $filename = self::makeFilename($requestFile);
	            
	            $requestFile->storeAs($destinationPath, $filename, self::$disk);
				
                if(self::$removeOldFile && !empty($oldFile) && Storage::disk(self::$disk)->exists($oldFile)){
                    Storage::disk(self::$disk)->delete($oldFile);
                }

                return trim($destinationPath, '/') . '/' . $filename;
	        } else {
				if(!self::$required && empty($oldFile)){
					throw new Exception('Old File is empty!');
				}
				
		        if(self::$required){
			        throw new Exception('Request File is empty!');
		        }
				
	            return $oldFile;
	        }
        } catch (Exception $e) {
            logException('[update] UploadFile', $e);
            throw new Exception($e->getMessage());
        }
    }
	
	/**
	 * Make file request is nullable
	 *
	 * @return UploadFileService
	 */
	public static function nullable(): UploadFileService
	{
		self::$required = FALSE;
		
		return new static;
	}
	
	/**
	 * Keep the old file on update.
	 *
	 * @return UploadFileService
	 */
	public static function keepOldFile(): UploadFileService
	{
		self::$removeOldFile = FALSE;
		
		return new static;
	}
	
	/**
	 * Set the storage disk.
	 *
	 * @param string $disk
	 * @return UploadFileService
	 */
	public static function disk(string $disk = 'public'): UploadFileService
	{
		if(!in_array($disk, ['public', 'local'])){
			$disk = 'public';
		}
		self::$disk = $disk;
		
		return new static;
	}
	
	/**
     * Generate a filename.
	 *
	 * @param UploadedFile $file
     * @return string
	 */
	private static function makeFilename(UploadedFile $file): string
	{
		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$extension = strtolower($file->guessExtension());
		
		return strtolower(Str::slug(substr($filename, 0, 200)) . '-' . Str::random(6)) . '.' . $extension;
	}
	
	/**
	 * Extract path to origin filename. Example : path/to/images/image-{someRandomString}.{extension} => image.{extension}
	 *
	 * @param $path
	 * @return string|null
	 */
	public static function extractFilename($path): ?string
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
}