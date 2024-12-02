<?php

namespace App\Http\Controllers;

use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParametersController extends Controller
{
	public function getKabKotaByProvinsi(Request $request): JsonResponse
	{
		try {
			if(!$request->kode_provinsi){
				response()->json([]);
			}
			
			$kabKota = KabKota::where('kode_provinsi', $request->kode_provinsi)->aktif()->get();
			
			return response()->json($kabKota);
		} catch (\Throwable $th) {
			return response()->json([]);
		}
	}
	
	public function getKecamatanByKabKota(Request $request): JsonResponse
	{
		try {
			if(!$request->kode_kabupaten_kota){
				response()->json([]);
			}
			
			$kecamatan = Kecamatan::where('kode_kab_kota', $request->kode_kabupaten_kota)->aktif()->get();
			return response()->json($kecamatan);
		} catch (\Throwable $th) {
			return response()->json([]);
		}
	}
	
	public function getKelurahanByKecamatan(Request $request): JsonResponse
	{
		try {
			if(!$request->kode_kecamatan){
				response()->json([]);
			}
			
			$kelurahan = Kelurahan::where('kode_kecamatan', $request->kode_kecamatan)->aktif()->get();
			return response()->json($kelurahan);
		} catch (\Throwable $th) {
			return response()->json([]);
		}
	}
}
