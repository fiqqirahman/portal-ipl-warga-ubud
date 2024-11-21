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
                                <h2>{{ $title }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form action="{{ route('master.dokumen.store') }}" class="form" method="POST"
                                  id="form">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label for="nama_dokumen" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama Dokumen</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('nama_dokumen') is-invalid @enderror"
                                           name="nama_dokumen" value="{{ old('nama_dokumen') }}" id="nama_dokumen" />
                                    @error('nama_dokumen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="keterangan" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Keterangan</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('keterangan') is-invalid @enderror"
                                           name="keterangan" value="{{ old('keterangan') }}" id="keterangan" />
                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="fv-row">
                                        <label for="is_required" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Dokumen Mandatory</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                               title="Dokumen Mandatory"></i>
                                        </label>
                                        <select class="form-select @error('is_required') is-invalid @enderror"
                                                id="is_required" name="is_required" data-control="select2"
                                                data-placeholder="---Pilih Dokumen Mandatory---">
                                            <option></option>
                                            <option value="true">Mandatory</option>
                                            <option value="false">Tidak Mandatory</option>
                                        </select>
                                        @error('is_required')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="max_file_size" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Maksimal Dokumen Size</span>
                                        <span class="text-muted fs-7">(Maksimal 5120 KB)</span>
                                    </label>
                                    <input type="number"
                                           class="form-control @error('max_file_size') is-invalid @enderror"
                                           name="max_file_size" value="{{ old('max_file_size') }}" id="max_file_size" />
                                    @error('max_file_size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="fv-row">
                                        <label for="allowed_file_types" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Tipe Dokumen yang Diizinkan</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                               title="Pilih tipe dokumen yang diizinkan untuk diunggah"></i>
                                        </label>
                                        <div id="allowed_file_types">
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="allowed_file_types[]" value="jpg" id="fileTypeJpg">--}}
{{--                                                <label class="form-check-label" for="fileTypeJpg">--}}
{{--                                                    .jpg--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="allowed_file_types[]" value="jpeg" id="fileTypeJpeg">--}}
{{--                                                <label class="form-check-label" for="fileTypeJpeg">--}}
{{--                                                    .jpeg--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="allowed_file_types[]" value="png" id="fileTypePng">--}}
{{--                                                <label class="form-check-label" for="fileTypePng">--}}
{{--                                                    .png--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allowed_file_types[]" value="pdf" id="fileTypePdf">
                                                <label class="form-check-label" for="fileTypePdf">
                                                    .pdf
                                                </label>
                                            </div>
                                        </div>
                                        @error('allowed_file_types')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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
        });
        document.getElementById('keterangan').addEventListener('change', function () {
            const maxSize = 5120 * 5120; // 5120 KB in bytes
            if (this.files[0].size > maxSize) {
                alert('Ukuran file melebihi 5120 KB');
                this.value = ''; // Reset input
            }
        });
    </script>
@endsection
