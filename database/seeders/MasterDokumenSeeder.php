<?php

namespace Database\Seeders;

use App\Enums\MasterConfigKeyEnum;
use App\Enums\MasterConfigTypeEnum;
use App\Enums\MasterDokumenEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'id' => MasterDokumenEnum::SuratPermohonanRekanan->value,
                'nama_dokumen' => 'Surat Permohonan Rekanan',
                'keterangan' => 'Surat Permohonan Rekanan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratPernyataanKebenaran->value,
                'nama_dokumen' => 'Surat Pernyataan Kebenaran',
                'keterangan' => 'Surat Pernyataan Kebenaran',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::CompanyProfilePerusahaan->value,
                'nama_dokumen' => 'Company Profile',
                'keterangan' => 'Company Profile',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::AktaPendirianPerusahaan->value,
                'nama_dokumen' => 'Akta Pendirian Perusahaan',
                'keterangan' => 'Akta Pendirian Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SkMenhukhamAtasAktaPendirian->value,
                'nama_dokumen' => 'SK Menhukham Atas Akta Pendirian',
                'keterangan' => 'SK Menhukham Atas Akta Pendirian',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::AktaPerubahanPerusahaanTerakhir->value,
                'nama_dokumen' => 'Akta Perubahan Perusahaan Terakhir',
                'keterangan' => 'Akta Perubahan Perusahaan Terakhir',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SkMenhukhamAktePerubahanTerakhir->value,
                'nama_dokumen' => 'SK Menhukham Akte Perubahan Terakhir',
                'keterangan' => 'SK Menhukham Akte Perubahan Terakhir',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratIzinUsaha->value,
                'nama_dokumen' => 'Surat Izin Usaha',
                'keterangan' => 'Surat Izin Usaha',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::KtpPengurusPerusahaan->value,
                'nama_dokumen' => 'KTP Pengurus Perusahaan',
                'keterangan' => 'KTP Pengurus Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::TdpNomorIndukBerusaha->value,
                'nama_dokumen' => 'TDP Nomor Induk Berusaha (NIB)',
                'keterangan' => 'TDP Nomor Induk Berusaha (NIB)',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratKeteranganDomisili->value,
                'nama_dokumen' => 'Surat KeteranganDomisili',
                'keterangan' => 'Surat KeteranganDomisili',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::NpwpPerusahaan->value,
                'nama_dokumen' => 'NPWP Perusahaan',
                'keterangan' => 'NPWP Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratPengukuganPengusahaKenaPajak->value,
                'nama_dokumen' => 'Surat Pengukuhan Pengusaha Kena Pajak',
                'keterangan' => 'Surat Pengukuhan Pengusaha Kena Pajak',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratPernyataanTidakSedangBerpekaraHukum->value,
                'nama_dokumen' => 'Surat Pernyataan Tidak Sedang Berpekara Hukum (Asli Bermaterai)',
                'keterangan' => 'Surat Pernyataan Tidak Sedang Berpekara Hukum (Asli Bermaterai)',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratPernyataanBahwaSeluruhDataYangDisampaikanMerupakanDataYangTerbaru->value,
                'nama_dokumen' => 'Surat Pernyataan Bahwa Seluruh Data yang disampaikan merupakan data yang terbaru',
                'keterangan' => 'Surat Pernyataan Bahwa Seluruh Data yang disampaikan merupakan data yang terbaru',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::StrukturOrganisasiPerusahaan->value,
                'nama_dokumen' => 'Struktur Organisasi Perusahaan',
                'keterangan' => 'Struktur Organisasi Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DaftarPengurusPerusahaan->value,
                'nama_dokumen' => 'Daftar Pengurus Perusahaan',
                'keterangan' => 'Daftar Pengurus Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::LaporanKeuangan->value,
                'nama_dokumen' => 'Laporan Keuangan',
                'keterangan' => 'Laporan Keuangan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::RekeningKoranBank->value,
                'nama_dokumen' => 'Rekening Koran Bank 3 (tiga) Bulan Terakhir',
                'keterangan' => 'Rekening Koran Bank 3 (tiga) Bulan Terakhir',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DaftarPengalamanPerusahaan->value,
                'nama_dokumen' => 'Daftar Pengalaman Perusahaan',
                'keterangan' => 'Daftar Pengalaman Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratPernyataanTidakSendangDiBlacklist->value,
                'nama_dokumen' => 'Surat Pernyataan Tidak Sedang Di Blacklist',
                'keterangan' => 'Surat Pernyataan Tidak Sedang Di Blacklist',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratPernyataanVendor->value,
                'nama_dokumen' => 'Surat Pernyataan Vendor',
                'keterangan' => 'Surat Pernyataan Vendor',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DokumenRekanan->value,
                'nama_dokumen' => 'Dokumen Rekanan',
                'keterangan' => 'Dokumen Rekanan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratDrtYangSudahAtauAkanJatuhTempo->value,
                'nama_dokumen' => 'Surat DRT yang sudah atau akan jatuh tempo',
                'keterangan' => 'Surat DRT yang sudah atau akan jatuh tempo',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::BeritaNegaraRiAtasAktePendirianPerusahaan->value,
                'nama_dokumen' => 'Berita Negara RI Atas Akte Pendirian Perusahan',
                'keterangan' => 'Berita Negara RI Atas Akte Pendirian Perusahan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::BeritaNegaraRiAktePerubahanTerakhir->value,
                'nama_dokumen' => 'Berita Negara RI Akte Perubahan Terakhir',
                'keterangan' => 'Berita Negara RI Akte Perubahan Terakhir',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SIUJK->value,
                'nama_dokumen' => 'SIUJK',
                'keterangan' => 'SIUJK',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratIjinUsahaPenyediaJasaTenagaKerjaDariInstansiKetenagakerjaanSetempat->value,
                'nama_dokumen' => 'Surat Ijin Usaha Penyedia Jasa Tenaga Kerja dari Instansi Ketenagakerjaan Setempat',
                'keterangan' => 'Surat Ijin Usaha Penyedia Jasa Tenaga Kerja dari Instansi Ketenagakerjaan Setempat',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratSertifikatKompetensiDanKualifikasiAtauSBU->value,
                'nama_dokumen' => 'Surat Sertifikat Kompetensi dan Kualifikasi atau SBU',
                'keterangan' => 'Surat Sertifikat Kompetensi dan Kualifikasi atau SBU',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::KartuTandaAnggotaAsosiasi->value,
                'nama_dokumen' => 'Kartu Tanda Anggota Asosiasi',
                'keterangan' => 'Kartu Tanda Anggota Asosiasi',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratKeteranganReferensiBankDariBankDki->value,
                'nama_dokumen' => 'Surat Keterangan Referensi Bank Dari Bank DKI',
                'keterangan' => 'Surat Keterangan Referensi Bank Dari Bank DKI',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::SuratIzinUsahaKhusus->value,
                'nama_dokumen' => 'Surat Izin Usaha Khusus',
                'keterangan' => 'Surat Izin Usaha Khusus',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DataPegawaiTetapDanTidakTetap->value,
                'nama_dokumen' => 'Data Pegawai Tetap dan Tidak Tetap',
                'keterangan' => 'Data Pegawai Tetap dan Tidak Tetap',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DaftarDanCVTenagaAhli->value,
                'nama_dokumen' => 'Daftar dan CV Tenaga Ahli',
                'keterangan' => 'Daftar dan CV Tenaga Ahli',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DataGedungKantorDanAtauWorkshop->value,
                'nama_dokumen' => 'Data Gedung Kantor dan atau Workshop',
                'keterangan' => 'Data Gedung Kantor dan atau Workshop',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DataMesinAtauPeralatanUtama->value,
                'nama_dokumen' => 'Data Mesin atau Peralatan Utama',
                'keterangan' => 'Data Mesin atau Peralatan Utama',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DataKapasitasProduksiPerusahaan->value,
                'nama_dokumen' => 'Data Kapasitas Produksi Perusahaan',
                'keterangan' => 'Data Kapasitas Produksi Perusahaan',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::DaftarPemasok->value,
                'nama_dokumen' => 'Daftar Pemasok',
                'keterangan' => 'Daftar Pemasok',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
            [
                'id' => MasterDokumenEnum::FotoCopyKontrakAtauPODenganPemasok->value,
                'nama_dokumen' => 'Foto Copy Kontrak atau PO Dengan Pemasok',
                'keterangan' => 'Foto Copy Kontrak atau PO Dengan Pemasok',
                'is_required' => true,
                'max_file_size' => '5120',
                'allowed_file_types' => json_encode(['pdf'])
            ],
        ];
    }
}
