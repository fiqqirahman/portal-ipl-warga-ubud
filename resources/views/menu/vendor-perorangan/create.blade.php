@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-auto align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com006.svg') !!}
                                </span>
                                <h2>Informasi Umum</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form action="{{ route('master.bentuk-badan-usaha.store') }}" class="form" method="POST"
                                  id="form">
                                @csrf
                                <div class="fv-row">
                                    <label for="nama" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama Perorangan</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nama') is-invalid @enderror"
                                           name="nama" value="{{ old('nama') }}" id="nama" />
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="nama_singkat" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama Singkat</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nama_singkat') is-invalid @enderror"
                                           name="nama_singkat" value="{{ old('nama_singkat') }}" id="nama_singkat" />
                                    @error('nama_singkat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="npwp" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">NPWP</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('npwp') is-invalid @enderror"
                                           name="npwp" value="{{ old('npwp') }}" id="npwp" maxlength="16" />
                                    @error('npwp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="id_master_kategori_vendor" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Kategori Vendor</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select class="form-select  @error('id_master_kategori_vendor') is-invalid @enderror"
                                            id="id_master_kategori_vendor" name="id_master_kategori_vendor" data-control="select2"
                                            data-placeholder="---Pilih Kategori Vendor---" >
                                        <option></option>
                                        @foreach ($stmtKategoriVendor as $kategoriVendor)
                                            <option value="{{ $kategoriVendor->kode }}"
                                                    {{ $kategoriVendor->kode ?  : '' }}>
                                                {{ $kategoriVendor->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_master_kategori_vendor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="no_identitas" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nomor KTP/SIM/Passport</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('no_identitas') is-invalid @enderror"
                                           name="no_identitas" value="{{ old('no_identitas') }}" id="no_identitas" />
                                    @error('no_identitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="tanggal_berakhir" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Tanggal Berakhir</span>
                                    </label>
                                    <input type="date"
                                           class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                                           name="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}" id="tanggal_berakhir" />
                                    @error('tanggal_berakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="card-header pt-7">
                                    <div class="card-title">
                                        <span class="svg-icon svg-icon-1 me-2">
                                            {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com006.svg') !!}
                                        </span>
                                        <h2>Alamat Perorangan</h2>
                                    </div>
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Alamat</span>
                                    </label>
                                    <textarea class="form-control form-control @error('alamat') is-invalid @enderror" id="alamat"
                                            name="alamat" rows="15">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="id_master_negara" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Negara</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select class="form-select  @error('id_master_negara') is-invalid @enderror"
                                            id="id_master_negara" name="id_master_negara" data-control="select2"
                                            data-placeholder="---Pilih Negara---" >
                                        <option></option>
                                        @foreach ($stmtKategoriVendor as $kategoriVendor)
                                            <option value="{{ $kategoriVendor->kode }}"
                                                    {{ $kategoriVendor->kode ?  : '' }}>
                                                {{ $kategoriVendor->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_master_negara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="kode_provinsi" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Provinsi</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select class="form-select  @error('kode_provinsi') is-invalid @enderror"
                                            id="kode_provinsi" name="kode_provinsi" data-control="select2"
                                            data-placeholder="---Pilih Provinsi---" >
                                        <option></option>
                                        @foreach ($stmtProvinsi as $provinsi)
                                            <option value="{{ $provinsi->kode }}"
                                                    {{ $provinsi->kode ? : '' }}>
                                                {{ $provinsi->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="kode_kabupaten_kota" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Kabupaten/Kota</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select class="form-select  @error('kode_kabupaten_kota') is-invalid @enderror"
                                            id="kode_kabupaten_kota" name="kode_kabupaten_kota" data-control="select2"
                                            data-placeholder="---Pilih Kabupaten Kota---" >
                                        <option></option>
                                    </select>
                                    @error('kode_kabupaten_kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="kode_kecamatan" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Kecamatan</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select class="form-select  @error('kode_kecamatan') is-invalid @enderror"
                                            id="kode_kecamatan" name="kode_kecamatan" data-control="select2"
                                            data-placeholder="---Pilih Kecamatan---" >
                                        <option></option>
                                    </select>
                                    @error('kode_kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row">
                                    <label for="kode_kelurahan" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Kelurahan</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                    </label>
                                    <select class="form-select  @error('kode_kelurahan') is-invalid @enderror"
                                            id="kode_kelurahan" name="kode_kelurahan" data-control="select2"
                                            data-placeholder="---Pilih Kelurahan---" >
                                        <option></option>
                                    </select>
                                    @error('kode_kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light me-3">Reset</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const container = document.querySelector("#kt_content");

            const blockContainer = new KTBlockUI(container, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Sedang menyimpan data...</div>',
            });

            $('#form').on('submit', function() {
                if (!blockContainer.isBlocked()) {
                    blockContainer.block();
                }
            });

            // Handle Province change
            $('#kode_provinsi').change(function () {
                let kode_provinsi = $(this).val();
                console.log('provinsiId', kode_provinsi)
                $.ajax({
                    url: '{{ route("menu.getKabKotaByProvinsi") }}',
                    type: 'GET',
                    data: {kode_provinsi},
                    success: function (data) {
                        $('#kode_kabupaten_kota').empty().append('<option></option>');
                        $.each(data, function (key, value) {
                            $('#kode_kabupaten_kota').append('<option value="' + value.kode_kabupaten_kota + '">' + value.nama + '</option>');
                        });
                    }
                });
            });

            // Handle Kab/Kota change
            $('#kode_kabupaten_kota').change(function () {
                let kode_kabupaten_kota = $(this).val();
                console.log('kode_kabupaten_kota', kode_kabupaten_kota)
                $.ajax({
                    url: '{{ route("menu.getKecamatanByKabKota") }}',
                    type: 'GET',
                    data: {kode_kabupaten_kota},
                    success: function (data) {
                        $('#kode_kecamatan').empty().append('<option></option>');
                        $.each(data, function (key, value) {
                            $('#kode_kecamatan').append('<option value="' + value.kode + '">' + value.nama + '</option>');
                        });
                    }
                });
            });

            // Handle Kecamatan change
            $('#kode_kecamatan').change(function () {
                let kode_kecamatan = $(this).val();
                console.log('kecamatan', kode_kecamatan)
                $.ajax({
                    url: '{{ route("menu.getKelurahanByKecamatan") }}',
                    type: 'GET',
                    data: {kode_kecamatan},
                    success: function (data) {
                        $('#kode_kelurahan').empty().append('<option></option>');
                        $.each(data, function (key, value) {
                            $('#kode_kelurahan').append('<option value="' + value.kode_kelurahan + '">' + value.nama + '</option>');
                        });
                    }
                });
            });

            $('#kode_kelurahan').on('change', function(){
                console.log($(this).val())
            })
        });
    </script>
@endsection
