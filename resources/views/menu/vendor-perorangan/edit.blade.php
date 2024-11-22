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
                    <form action="{{ route('menu.registrasi-vendor.update', ['registrasi_vendor' => enkrip($registrasiVendor->id)]) }}" method="POST" id="form-update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentColor" fill-rule="nonzero"/>
                                            </g>
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
                                        <input type="text" required maxlength="255"
                                               class="form-control @error('nama') is-invalid @enderror"
                                               name="nama" value="{{ old('nama', $registrasiVendor->nama) }}" id="nama" />
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="nama_singkatan" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Nama Singkatan</span>
                                        </label>
                                        <input type="text" required maxlength="255"
                                               class="form-control @error('nama_singkatan') is-invalid @enderror"
                                               name="nama_singkatan" value="{{ old('nama_singkatan', $registrasiVendor->nama_singkatan) }}" id="nama_singkatan" />
                                        @error('nama_singkatan')
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
                                               required minlength="15"
                                               class="form-control @error('npwp') is-invalid @enderror positive-numeric"
                                               name="npwp" value="{{ old('npwp', $registrasiVendor->npwp) }}" id="npwp" maxlength="16" />
                                        @error('npwp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="id_master_kategori_vendor" class="fs-6 fw-semibold form-label mt-3">
                                            <span>Kategori Vendor</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                               title="Hanya Kategori Vendor yang aktif saja yang dapat dipilih"></i>
                                        </label>
                                        <select class="form-select  @error('id_master_kategori_vendor') is-invalid @enderror"
                                                id="id_master_kategori_vendor" name="id_master_kategori_vendor" data-control="select2"
                                                data-placeholder="---Pilih Kategori Vendor---" >
                                            <option></option>
                                            @foreach ($stmtKategoriVendor as $kategoriVendor)
                                                <option value="{{ $kategoriVendor->kode }}"
                                                    {{ $kategoriVendor->kode == old('id_master_kategori_vendor', $registrasiVendor->id_master_kategori_vendor) ? 'selected' : '' }}>
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
                                            <span>Nomor KTP/SIM/Passport</span>
                                        </label>
                                        <input type="text"
                                               class="form-control @error('no_identitas') is-invalid @enderror"
                                               name="no_identitas" value="{{ old('no_identitas', $registrasiVendor->no_identitas) }}" id="no_identitas" />
                                        @error('no_identitas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="tanggal_berakhir" class="fs-6 fw-semibold form-label mt-3">
                                            <span>Tanggal Berakhir</span>
                                        </label>
                                        <input type="date"
                                               class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                                               name="tanggal_berakhir" value="{{ old('tanggal_berakhir', $registrasiVendor->tanggal_berakhir) }}" id="tanggal_berakhir" />
                                        @error('tanggal_berakhir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
                                            <span>Alamat</span>
                                        </label>
                                        <textarea class="form-control form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                  name="alamat" rows="2">{{ old('alamat', $registrasiVendor->alamat) }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="id_master_negara" class="fs-6 fw-semibold form-label mt-3">
                                            <span>Negara</span>
                                        </label>
                                        <select class="form-select  @error('id_master_negara') is-invalid @enderror"
                                                id="id_master_negara" name="id_master_negara" data-control="select2"
                                                data-placeholder="---Pilih Negara---" >
                                            <option></option>
                                            @foreach ($stmtKategoriVendor as $kategoriVendor)
                                                <option value="{{ $kategoriVendor->kode }}"
                                                    {{ $kategoriVendor->kode == old('id_master_negara', $registrasiVendor->id_master_negara) ? 'selected' : '' }}>
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
                                            <span>Provinsi</span>
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
                                            <span>Kabupaten/Kota</span>
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
                                            <span>Kecamatan</span>
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
                                            <span>Kelurahan</span>
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
                                <div class="row">
                                    @foreach($documentsField as $field)
                                        <div class="col-md-4 col-sm-12 mb-4">
                                            <div class="row">
                                                <div class="col-md-{{ $field['old_value'] ? '6' : '12' }}">
                                                    <label for="{{ $field['id'] }}" class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="{{ (empty($field['old_value']) && $field['is_required']) ? 'has_required_label' : '' }}">{{ $field['label'] }}</span>
                                                    </label>
                                                </div>
                                                @if($field['old_value'])
                                                    <div class="col-md-6 text-md-end">
                                                        <label class="fs-6 fw-semibold form-label mt-3">
                                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($field['old_value']['path']) }}">Download</a>
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file" accept="{{ implode(',', array_map(fn($item) => 'application/' . $item, $field['allowed_file_types'])) }}"
                                                   class="form-control @error($field['name']) is-invalid @enderror {{ (empty($field['old_value']) && $field['is_required']) ? 'has_required_input' : '' }}"
                                                   onchange="onDocumentChange(this, '{{ implode(',', $field['allowed_file_types']) }}', '{{ $field['max_file_size'] }}')"
                                                   name="{{ $field['name'] }}" id="{{ $field['id'] }}" />
                                            @error($field['name'])
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
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
                            <button type="submit" class="btn btn-primary" id="btn-submit">
                                Save to Draft
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

            $('#btn-submit').click(function (){
                $(':required:invalid', '#form-update').each(function () {
                    let id = $('.tab-pane').find(':required:invalid').closest('.tab-pane').attr('id');

                    $(`.nav a[href="#` + id + `"]`).tab('show');

                    return false
                });
            })

            $(document).on('submit', '#form-update', function (e) {
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
                            $('#form-update')[0].submit()
                        }
                    })
                } else {
                    $('#loader-overlay').show();
                    $('#form-update')[0].submit()
                }
            })

            $('#confirm_done_checkbox').on('change', function() {
                if ($(this).prop('checked')) {
                    isSubmitForm()
                    $('#btn-submit').text('Submit');
                } else {
                    isSaveToDraftForm()
                    $('#btn-submit').text('Save to Draft');
                }
            });

            function isSubmitForm(){
                $('.has_required_label').addClass('required')
                $('.has_required_input').attr('required', true)
            }

            function isSaveToDraftForm(){
                $('.has_required_label').removeClass('required')
                $('.has_required_input').removeAttr('required')
            }
        });
    </script>
@endsection
