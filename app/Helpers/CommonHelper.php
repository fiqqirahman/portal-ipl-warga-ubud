<?php

/**
 * Format number to Rupiah Currency Format
 * @param $number
 * @param bool $withSymbol
 * @return string
 */
function formatRupiah($number, bool $withSymbol = true): string
{
	if(empty($number) OR !is_numeric($number)){
		$number = 0;
	}
	
	if($withSymbol){
        return 'Rp ' . number_format((float)$number, 2, ',', '.');
	}
	
	return number_format((float)$number, 2, ',', '.');
}

/**
 * Reformat date to 'd-MMM-Y' -> Ex : 1 Januari 2023
 * @param $date
 * @return string
 */
function dateWithFullMonthFormat($date): string
{
    if (empty($date)) {
        return '-';
    }
    return Carbon\Carbon::parse($date)->locale(config('app.locale'))->translatedFormat('j F Y');
}

/**
 * Reformat date to 'd-MMM-Y, h:i:s' -> Ex : 1 Januari 2023, 12:30:00
 * @param $date
 * @param bool $withSeconds
 * @return string
 */
function dateWithFullMonthAndTimeFormat($date, bool $withSeconds = true): string
{
    if (empty($date)) {
        return '-';
    }
	
	if($withSeconds){
		$format = 'j F Y, H:i:s';
	} else {
		$format = 'j F Y, H:i';
	}
	
    return Carbon\Carbon::parse($date)->locale(config('app.locale'))->translatedFormat($format);
}

/**
 * Create log activity user
 * @param string $activity
 * @param string|NULL $dataBefore
 * @param string|NULL $dataAfter
 * @return void
 */
function createLogActivity(string $activity, string $dataBefore = null, string $dataAfter = null): void
{
	try {
		$log = [
			'ip_access' => Illuminate\Support\Facades\Request::ip(),
			'user_id' => Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::id() : null,
			'activity_content' => $activity,
			'url' => Illuminate\Support\Facades\Request::fullUrl(),
			'operating_system' => hisorange\BrowserDetect\Parser::platformName(),
			'device_type' => hisorange\BrowserDetect\Parser::deviceType(),
			'browser_name' => hisorange\BrowserDetect\Parser::browserName(),
			'method' => Illuminate\Support\Facades\Request::method(),
			'data_before' => $dataBefore,
			'data_after' => $dataAfter,
		];
		
		\Laravel\Telescope\Telescope::withoutRecording(function () use($log) {
			App\Models\LogActivity::create($log);
		});
	} catch (Exception $exception) {
		logException('Error creating log activity', $exception);
	}
}

/**
 * Create log file
 * @param string $kodeFile
 * @param string $pathFile
 * @param string $keterangan
 * @return App\Models\HistoryFile
 */
function createHistoryFile(string $kodeFile, string $pathFile, string $keterangan): App\Models\HistoryFile
{
    return App\Models\HistoryFile::create([
        'kode_file' => $kodeFile,
        'path_file' => $pathFile,
        'keterangan' => $keterangan,
        'status_upload' => 1,
        'created_by' => Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::id() : null,
    ]);
}

function getLayoutIsFullWidth(): string
{
	return \App\Helpers\CacheForeverHelper::getSingle(\App\Enums\MasterConfigKeyEnum::StyleIsLayoutFullWidth->value) == '1' ? 'container-fluid' : 'container-xxl';
}

/**
 * @param string $message
 * @param string|Throwable|null $throw
 * @param array|null $context
 * @return void
 */
function logException(string $message, string|null|Throwable $throw = null, array|null $context = []): void
{
	$throwMessage = '-';
	if($throw instanceof Throwable){
		$relativeFilePath = Str::after($throw->getFile(), base_path() . DIRECTORY_SEPARATOR);
		$context = [
			'context' => $context,
			'trace' => [
				'file' => $relativeFilePath,
				'line' => $throw->getLine()
			]
		];
		$throwMessage = $throw->getMessage();
	} else if(is_string($throw)){
		$throwMessage = $throw;
	}
	
	Log::channel('exception')->error(trim($message) . ' [' . $throwMessage . ']', $context);
}

function allowCreateRegistration(): bool
{
	return true;
}

function convertToReadableSize($size): string
{
	$base = log($size) / log(1024);
	$suffix = array("", "KB", "MB", "GB", "TB");
	$f_base = floor($base);
	return round(pow(1024, $base - floor($base)), 1) .' '. $suffix[$f_base];
}

function uniqueString($length): string
{
	$result = '';
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$charactersLength = strlen($characters);
	
	for ($i = 0; $i < $length; $i++) {
		$result .= $characters[rand(0, $charactersLength - 1)];
	}
	
	return $result;
}

function generateNumberVendor(): string
{
	$prefix = 'EPROC';
	$vendorType = Auth::user()->vendor_type === \App\Enums\UserVendorTypeEnum::Individual ? 'VPR' : 'VPT';
	$maxNumber = \App\Models\RegistrasiVendor::max('id') + 1;
	$sequence = Str::padLeft($maxNumber, 7, '0');
	$year = date('y');
	
	return $prefix . $vendorType . $sequence . $year;
}

function allowUpdateStatusRegistrasi(\App\Models\RegistrasiVendor $registrasiVendor): bool
{
	return !in_array($registrasiVendor->status_registrasi, [
		\App\Enums\StatusRegistrasiEnum::Approved,
		\App\Enums\StatusRegistrasiEnum::Rejected,
		\App\Enums\StatusRegistrasiEnum::Draft,
	]);
}
