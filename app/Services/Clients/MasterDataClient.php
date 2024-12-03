<?php

namespace App\Services\Clients;

use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MasterDataClient
{
    private string $url;
    private int $timeout;

    public function __construct()
    {
        $this->url = config('master-data.url_master_data');
        $this->timeout = (int) config('app.api_timeout');
    }

    /**
     * Master Data API
     * Endpoint digunakan untuk seeding data menggunakan API
     *
     * @return PromiseInterface|Response
     * @throws Exception
     */

    public function masterDataProvinsi(): PromiseInterface|Response
    {
        try {
            return Http::timeout($this->timeout)->post($this->url . '/service-master-core/provinsi');
        } catch (Exception $e) {
            logException('[masterDataProvinsi] MasterDataClient', $e);

            throw new Exception($e->getMessage());
        }
    }

    public function masterDataKabKota(): PromiseInterface|Response
    {
        try {
            return Http::timeout($this->timeout)->post($this->url . '/service-master-core/kabupaten-kota');
        } catch (Exception $e) {
            logException('[masterDataKabKota] MasterDataClient', $e);

            throw new Exception($e->getMessage());
        }
    }

    public function masterDataKecamatan(): PromiseInterface|Response
    {
        try {
            return Http::timeout($this->timeout)->post($this->url . '/service-master-core/kecamatan');
        } catch (Exception $e) {
            logException('[masterDataKecamatan] MasterDataClient', $e);

            throw new Exception($e->getMessage());
        }
    }

    public function masterDataKelurahan(): PromiseInterface|Response
    {
        try {
            return Http::timeout($this->timeout)->post($this->url . '/service-master-core/kelurahan');
        } catch (Exception $e) {
            logException('[masterDataKelurahan] MasterDataClient', $e);

            throw new Exception($e->getMessage());
        }
    }

}