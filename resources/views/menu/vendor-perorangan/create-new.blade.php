@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-flush h-lg-100">
                <div class="card-header pt-7">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-1 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <h2>Form {{ $title }}</h2>
                    </div>
                </div>
                <div class="card-body pt-5">
                    <form action="{{ route('master.bentuk-badan-usaha.store') }}" method="POST" id="form-store">
                        @csrf
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_contact_view_general" aria-selected="true" role="tab">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"></path>
                                        </svg>
                                        General
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_documents" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                            <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
                                            <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
                                        </svg>
                                        Dokumen
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_activity" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Activity
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="">
                            <div class="tab-pane fade active show" id="kt_contact_view_general" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="nama" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Nama Perorangan</span>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('nama') is-invalid @enderror"
                                               required
                                               name="nama" value="{{ old('nama') }}" id="nama" />
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Alamat</span>
                                        </label>
                                        <textarea class="form-control form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                  name="alamat" rows="2">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                    <div class="col-md-4 col-sm-12 mb-4">
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_documents" role="tabpanel">
                                <h3>Tengah</h3>
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">
                                <h3>Last</h3>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="confirm_done_checkbox" name="confirm_done_checkbox">
                                <label class="form-check-label" for="confirm_done_checkbox">Saya menyatakan bahwa data ini telah lengkap</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-7">
                            <a href="{{ route('menu.registrasi-vendor.index') }}">
                                <button type="button" class="btn btn-light me-3">Kembali</button>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
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

            $(document).on('submit', '#form-store', function (e) {
                e.preventDefault()

                if($('#confirm_done_checkbox').prop('checked')){
                    Swal.fire({
                        title: 'Anda Yakin?',
                        html: 'Ingin menyelesaikan data Registrasi ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, selesaikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#loader-overlay').show();
                            $('#form-store')[0].submit()
                        }
                    })
                } else {
                    $('#loader-overlay').show();
                    $('#form-store')[0].submit()
                }
            })
        });
    </script>
@endsection
