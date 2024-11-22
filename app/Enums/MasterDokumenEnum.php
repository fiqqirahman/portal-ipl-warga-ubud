<?php

namespace App\Enums;

enum MasterDokumenEnum: int {
    case SuratPermohonanRekanan = 1;
    case SuratPernyataanKebenaran = 2;
    case CompanyProfilePerusahaan = 3;
    case AktaPendirianPerusahaan = 4;
    case SkMenhukhamAtasAktaPendirian = 5;
    case AktaPerubahanPerusahaanTerakhir = 6;
    case SkMenhukhamAktePerubahanTerakhir = 7;
    case SuratIzinUsaha = 8;
    case KtpPengurusPerusahaan = 9;
    case TdpNomorIndukBerusaha = 10;
    case SuratKeteranganDomisili = 11;
    case NpwpPerusahaan = 12;
    case SuratPengukuganPengusahaKenaPajak = 13;
    case SuratPernyataanTidakSedangBerpekaraHukum = 14;
    case SuratPernyataanBahwaSeluruhDataYangDisampaikanMerupakanDataYangTerbaru = 15;
    case StrukturOrganisasiPerusahaan = 16;
    case DaftarPengurusPerusahaan = 17;
    case LaporanKeuangan = 18;
    case RekeningKoranBank = 19;
    case DaftarPengalamanPerusahaan = 20;
    case SuratPernyataanTidakSendangDiBlacklist = 21;
    case SuratPernyataanVendor = 22;
    case DokumenRekanan = 23;  //tidak mandatory
    case SuratDrtYangSudahAtauAkanJatuhTempo = 24; //tidak mandatory
    case BeritaNegaraRiAtasAktePendirianPerusahaan = 25; //tidak mandatory
    case BeritaNegaraRiAktePerubahanTerakhir = 26; //tidak mandatory
    case SIUJK = 27; //tidak mandatory
    case SuratIjinUsahaPenyediaJasaTenagaKerjaDariInstansiKetenagakerjaanSetempat = 28; //tidak mandatory
    case SuratSertifikatKompetensiDanKualifikasiAtauSBU = 29; //tidak mandatory
    case KartuTandaAnggotaAsosiasi = 30; //tidak mandatory
    case SuratKeteranganReferensiBankDariBankDki = 31; //tidak mandatory
    case SuratIzinUsahaKhusus = 32; //tidak mandatory
    case DataPegawaiTetapDanTidakTetap = 33; //tidak mandatory
    case DaftarDanCVTenagaAhli = 34; //tidak mandatory
    case DataGedungKantorDanAtauWorkshop = 35; //tidak mandatory
    case DataMesinAtauPeralatanUtama = 36; //tidak mandatory
    case DataKapasitasProduksiPerusahaan = 37; //tidak mandatory
    case DaftarPemasok = 38; //tidak mandatory
    case FotoCopyKontrakAtauPODenganPemasok = 39; //tidak mandatory
    case NPWPPerorangan = 40; //tidak mandatory
    case KTPPerorangan = 41; //tidak mandatory
    case KartuTandaAnggotaHPI = 42; //tidak mandatory
    case BukuTabungan = 43; //tidak mandatory
    case SuratPermohonan = 44; //tidak mandatory
	
	public static function groupIndividual(): array
	{
		return [
			self::KTPPerorangan,
			self::NPWPPerorangan,
		];
	}
	
	public static function groupCompany(): array
	{
		return [
			self::KTPPerorangan,
			self::NPWPPerorangan,
			self::KartuTandaAnggotaHPI,
			self::BukuTabungan,
			self::SuratPermohonan
		];
	}
}
