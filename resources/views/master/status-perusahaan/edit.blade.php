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
                                <h2>{{ $title }} {{ $stmtStatusPerusahaan->nama }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form action="{{ route('master.status-perusahaan.update', enkrip($stmtStatusPerusahaan->id)) }}" class="form"
                                  id="form" method="POST">
                                @method('put')
                                @csrf
                                <div class="fv-row mb-7">
                                    <label for="nama" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama</span>
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-solid @error('nama') is-invalid @enderror"
                                           name="nama" value="{{ old('nama', $stmtStatusPerusahaan->nama) }}" id="nama" />
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="kode" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Kode</span>
                                    </label>
                                    <input type="number"
                                           class="form-control form-control-solid @error('kode') is-invalid @enderror"
                                           name="kode" value="{{ old('kode', $stmtStatusPerusahaan->kode) }}" id="kode" />
                                    @error('kode')
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
                                           class="form-control form-control-solid @error('keterangan') is-invalid @enderror"
                                           name="keterangan" value="{{ old('keterangan', $stmtStatusPerusahaan->keterangan) }}" id="keterangan" />
                                    @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light me-3">Reset</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Perbarui</span>
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
    </script>
@endsection
