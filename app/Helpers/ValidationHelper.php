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

function rulesInventaris(): array
{
	return [
		'inventaris' => 'nullable|array',
		'inventaris.*.kode_master_jenis_inventaris' => 'required|string',
		'inventaris.*.jumlah_inventaris' => 'required|numeric|min:0|max:1000000000',
		'inventaris.*.kapasitas_inventaris' => 'required|string|max:255',
		'inventaris.*.kode_master_jenis_merk_inventaris' => 'required|string',
		'inventaris.*.tahun_pembuatan_inventaris' => 'required|string|date_format:Y',
		'inventaris.*.kondisi_inventaris' => 'required|string|in:Baik,Tidak Baik',
		'inventaris.*.lokasi_inventaris' => 'required|string|max:500',
		'inventaris.*.path_upload_inventaris' => 'nullable|file|max:10240|mimes:pdf,jpg,jpeg,png',
		'inventaris.*.path_upload_inventaris_old' => 'nullable|string|max:3000',
	];
}

function attributesInventaris(): array
{
	return [
		'inventaris' => 'Daftar Inventaris',
		'inventaris.*.kode_master_jenis_inventaris' => 'Jenis Inventaris',
		'inventaris.*.jumlah_inventaris' => 'Jumlah Inventaris',
		'inventaris.*.kapasitas_inventaris' => 'Kapasitas Inventaris',
		'inventaris.*.kode_master_jenis_merk_inventaris' => 'Jenis Merk Inventaris',
		'inventaris.*.tahun_pembuatan_inventaris' => 'Tahun Pembuatan Inventaris',
		'inventaris.*.kondisi_inventaris' => 'Kondisi Inventaris',
		'inventaris.*.lokasi_inventaris' => 'Lokasi Inventaris',
		'inventaris.*.path_upload_inventaris' => 'Dokumen Bukti Kepemilikan',
	];
}

function rulesNeracaKeuangan(): array
{
	return [
		'neraca_keuangan' => 'nullable|array',
		'neraca_keuangan.*.tahun_data_keuangan' => 'required|date_format:Y',
		'neraca_keuangan.*.mata_uang_data_keuangan' => 'required|string|max:50',
		'neraca_keuangan.*.aktiva_lancar' => 'required|string|max:50',
		'neraca_keuangan.*.hutang_lancar' => 'required|string|max:50',
		'neraca_keuangan.*.rasio_likuiditas' => 'required|string|max:20',
		'neraca_keuangan.*.total_hutang' => 'required|string|max:50',
		'neraca_keuangan.*.ekuitas' => 'required|string|max:50',
		'neraca_keuangan.*.rasio_hutang' => 'required|string|max:20',
		'neraca_keuangan.*.laba_rugi' => 'required|string|max:50',
		'neraca_keuangan.*.return_of_equity' => 'required|string|max:20',
		'neraca_keuangan.*.kas' => 'required|string|max:50',
		'neraca_keuangan.*.total_aktiva' => 'required|string|max:50',
		'neraca_keuangan.*.status_audit' => 'required|string|in:Audited,Not Audited',
		'neraca_keuangan.*.nama_auditor' => 'nullable|string|max:255',
		'neraca_keuangan.*.tanggal_audit' => 'nullable|string|date',
	];
}

function attributesNeracaKeuangan(): array
{
	return [
		'neraca_keuangan' => 'Daftar Neraca Keuangan',
		'neraca_keuangan.*.tahun_data_keuangan' => 'Tahun Data Keuangan',
		'neraca_keuangan.*.mata_uang_data_keuangan' => 'Mata Uang Data Keuangan',
		'neraca_keuangan.*.aktiva_lancar' => 'Aktiva Lancar',
		'neraca_keuangan.*.hutang_lancar' => 'Hutang Lancar',
		'neraca_keuangan.*.rasio_likuiditas' => 'Rasio Likuiditas',
		'neraca_keuangan.*.total_hutang' => 'Total Hutang',
		'neraca_keuangan.*.ekuitas' => 'Ekuitas',
		'neraca_keuangan.*.rasio_hutang' => 'Rasio Hutang',
		'neraca_keuangan.*.laba_rugi' => 'Laba Rugi',
		'neraca_keuangan.*.return_of_equity' => 'Return of Equity',
		'neraca_keuangan.*.kas' => 'Kas',
		'neraca_keuangan.*.total_aktiva' => 'Total Aktiva',
		'neraca_keuangan.*.status_audit' => 'Status Audit',
		'neraca_keuangan.*.nama_auditor' => 'Nama Auditor',
		'neraca_keuangan.*.tanggal_audit' => 'Tanggal Audit',
	];
}