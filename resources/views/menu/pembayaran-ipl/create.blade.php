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
                            <form action="{{ route('menu.pembayaran-ipl.store') }}" class="form" method="POST" enctype="multipart/form-data"
                                  id="form">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label for="amount" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Jumlah Pembayaran</span>
                                    </label>
                                    <input type="text" required maxlength="15" onkeyup="formatRupiah(this)"
                                           class="form-control @error('amount') is-invalid @enderror"
                                           name="amount" value="{{ old('amount') }}" id="amount"/>
                                    @error('amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="periode" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Periode</span>
                                    </label>
                                    <input type="month" required
                                           class="form-control @error('periode') is-invalid @enderror"
                                           name="periode" value="{{ old('periode') }}" id="periode"/>
                                    @error('periode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-12 mb-4">
                                    <label for="method" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Jenis Pembayaran</span>
                                    </label>
                                    <select class="form-select  @error('method') is-invalid @enderror"
                                            id="method" name="method" data-control="select2" required
                                            data-placeholder="---Pilih Metode Pembayaran---">
                                        <option></option>
                                        @foreach (\App\Enums\JenisPembayaranEnum::cases() as $metode)
                                            <option value="{{ $metode->value }}"
                                                    {{ old('method', isset($registrasiVendor) ? $registrasiVendor?->method ?? '' : '') == $metode->value ? 'selected' : '' }}>
                                                {{ $metode->label() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('method')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="proof" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Upload Bukti Pembayaran</span>
                                    </label>
                                    <input type="file"
                                           class="form-control @error('proof') is-invalid @enderror"
                                           name="proof" id="proof"/>
                                    @error('proof')
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
        $(document).ready(function () {
            const container = document.querySelector("#kt_content");

            const blockContainer = new KTBlockUI(container, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Sedang menyimpan data...</div>',
            });

            $('#form').on('submit', function () {
                if (!blockContainer.isBlocked()) {
                    blockContainer.block();
                }
            });
        });
    </script>
@endsection
