<?php

function rulesDaftarKomisaris(): array
{
	return [
		'daftar_komisaris' => 'required|array',
		'daftar_komisaris.*.no_identitas_komisaris' => 'required|string|max:255',
		'daftar_komisaris.*.kode_master_jenis_identitas_komisaris' => 'required|string|max:255',
		'daftar_komisaris.*.nama_komisaris' => 'required|string|max:255',
		'daftar_komisaris.*.alamat_komisaris' => 'required|string|max:255',
		'daftar_komisaris.*.kode_master_jabatan_vendor_komisaris' => 'required|string|max:255',
		'daftar_komisaris.*.tanggal_lahir_komisaris' => 'required|date',
	];
}

function attributesDaftarKomisaris(): array
{
	return [
		'daftar_komisaris' => 'Daftar Komisaris',
		'daftar_komisaris.*.no_identitas_komisaris' => 'Nomor Identitas Komisaris',
		'daftar_komisaris.*.kode_master_jenis_identitas_komisaris' => 'Jenis Identitas Komisaris',
		'daftar_komisaris.*.nama_komisaris' => 'Nama Komisaris',
		'daftar_komisaris.*.alamat_komisaris' => 'Alamat Komisaris',
		'daftar_komisaris.*.kode_master_jabatan_vendor_komisaris' => 'Jabatan Komisaris',
		'daftar_komisaris.*.tanggal_lahir_komisaris' => 'Tanggal Lahir Komisaris',
	];
}

function rulesDaftarDireksi(): array
{
	return [
		'daftar_direksi' => 'required|array',
		'daftar_direksi.*.no_identitas_direksi' => 'required|string|max:255',
		'daftar_direksi.*.nama_direksi' => 'required|string|max:255',
		'daftar_direksi.*.alamat_direksi' => 'required|string|max:255',
		'daftar_direksi.*.kode_master_jenis_identitas_direksi' => 'required|string|max:255',
		'daftar_direksi.*.kode_master_jabatan_vendor_direksi' => 'required|string|max:255',
		'daftar_direksi.*.tanggal_lahir_direksi' => 'required|date',
	];
}

function attributesDaftarDireksi(): array
{
	return [
		'daftar_direksi' => 'Daftar Direksi',
		'daftar_direksi.*.no_identitas_direksi' => 'Nomor Identitas Direksi',
		'daftar_direksi.*.nama_direksi' => 'Jenis Identitas Direksi',
		'daftar_direksi.*.alamat_direksi' => 'Nama Direksi',
		'daftar_direksi.*.kode_master_jenis_identitas_direksi' => 'Alamat Direksi',
		'daftar_direksi.*.kode_master_jabatan_vendor_direksi' => 'Jabatan Direksi',
		'daftar_direksi.*.tanggal_lahir_direksi' => 'Tanggal Lahir Direksi',
	];
}

function rulesPemegangSaham(): array
{
	return [
		'pemegang_saham' => 'nullable|array',
		'pemegang_saham.*.no_identitas_pemegang_saham' => 'required|string|max:255',
		'pemegang_saham.*.kode_master_jenis_identitas_pemegang_saham' => 'required|string|max:255',
		'pemegang_saham.*.nama_pemegang_saham' => 'required|string|max:255',
		'pemegang_saham.*.alamat_pemegang_saham' => 'required|string|max:255',
		'pemegang_saham.*.persentase_kepemilikan' => [
			'required',
			'regex:/^[0-9,]+$/'
		],
		'pemegang_saham.*.tanggal_lahir_pemegang_saham' => 'required|date',
	];
}

function attributesPemegangSaham(): array
{
	return [
		'pemegang_saham' => 'Daftar Direksi',
		'pemegang_saham.*.no_identitas_pemegang_saham' => 'Nomor Identitas Pemegang Saham',
		'pemegang_saham.*.kode_master_jenis_identitas_pemegang_saham' => 'Jenis Identitas Pemegang Saham',
		'pemegang_saham.*.nama_pemegang_saham' => 'Nama Pemegang Saham',
		'pemegang_saham.*.alamat_pemegang_saham' => 'Alamat Pemegang Saham',
		'pemegang_saham.*.persentase_kepemilikan' => 'Persentase Kepemilikan',
		'pemegang_saham.*.tanggal_lahir_pemegang_saham' => 'Tanggal Lahir Pemegang Saham',
	];
}

function rulesTenagaAhli(): array
{
	return [
		'tenaga_ahli' => 'nullable|array',
		'tenaga_ahli.*.nama_tenaga_ahli' => 'required|string|max:255',
		'tenaga_ahli.*.tanggal_lahir_tenaga_ahli' => 'required|date',
		'tenaga_ahli.*.pendidikan_tenaga_ahli' => 'required|string|max:255',
		'tenaga_ahli.*.pengalaman_tenaga_ahli' => 'required|string|max:1000',
		'tenaga_ahli.*.profesi_tenaga_ahli' => 'required|string|max:255',
	];
}

function attributesTenagaAhli(): array
{
	return [
		'tenaga_ahli' => 'Daftar Tenaga Ahli',
		'tenaga_ahli.*.nama_tenaga_ahli' => 'Nama Tenaga Ahli',
		'tenaga_ahli.*.tanggal_lahir_tenaga_ahli' => 'Tangga Lahir Tenaga Ahli',
		'tenaga_ahli.*.pendidikan_tenaga_ahli' => 'Pendidikan Tenaga Ahli',
		'tenaga_ahli.*.pengalaman_tenaga_ahli' => 'Pengalaman Tenaga Ahli',
		'tenaga_ahli.*.profesi_tenaga_ahli' => 'Profesi Tenaga Ahli',
	];
}