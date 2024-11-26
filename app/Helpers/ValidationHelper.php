<?php

function validateDaftarKomisaris(): array
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

function ruleDaftarKomisaris(): array
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

function validateDaftarDireksi(): array
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

function ruleDaftarDireksi(): array
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