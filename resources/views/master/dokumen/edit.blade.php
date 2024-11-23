@extends('main')

@section('content')
    @include('layouts.toolbar')

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
            <form action="{{ route('master.dokumen.update', ['dokumen' => enkrip($dokumen->id)]) }}" class="form" method="POST"
                  id="form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-9 mb-4">
                        <label for="nama_dokumen" class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Nama Dokumen</span>
                        </label>
                        <input type="text" maxlength="255" required
                               class="form-control @error('nama_dokumen') is-invalid @enderror"
                               name="nama_dokumen" value="{{ old('nama_dokumen', $dokumen->nama_dokumen) }}" id="nama_dokumen" />
                        @error('nama_dokumen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="is_required" class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Dokumen Mandatory</span>
                        </label>
                        <select class="form-select @error('is_required') is-invalid @enderror"
                                id="is_required" name="is_required" data-control="select2" required
                                data-placeholder="--- Pilih Dokumen Mandatory ---">
                            <option value="1" {{ old('is_required', (int) $dokumen->is_required) == '1' ? 'selected' : '' }}>Mandatory</option>
                            <option value="0" {{ old('is_required', (int) $dokumen->is_required) == '0' ? 'selected' : '' }}>Tidak Mandatory</option>
                        </select>
                        @error('is_required')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label for="keterangan" class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Keterangan</span>
                        </label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                  rows="3" maxlength="500" required
                                  name="keterangan" id="keterangan">{{ old('keterangan', $dokumen->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label for="max_file_size" class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Maksimal Dokumen Size</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                               data-bs-placement="right" data-bs-html="true"
                               title="<ul>
                                  <li>100 KB : 102</li>
                                  <li>1 MB : 1024</li>
                                  <li>5 MB : 5120</li>
                                </ul>">
                            </i>
                        </label>
                        <input type="text" maxlength="5" placeholder="5120 (5 MB)" required
                               class="form-control @error('max_file_size') is-invalid @enderror positive-numeric"
                               name="max_file_size" value="{{ old('max_file_size', $dokumen->max_file_size) }}" id="max_file_size" />
                        @error('max_file_size')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="allowed_file_types" class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Tipe Dokumen Yang Diizinkan</span>
                        </label>
                        <select class="form-select @error('allowed_file_types') is-invalid @enderror"
                                multiple required
                                id="allowed_file_types" name="allowed_file_types[]" data-control="select2"
                                data-placeholder="--- Pilih ---">
                            @foreach(\App\Enums\DocumentAllowedTypesEnum::getAll() as $type)
                                <option value="{{ $type }}" {{ in_array($type, old('allowed_file_types', $dokumen->allowed_file_types)) ? 'selected' : '' }}>
                                    {{ \App\Enums\DocumentAllowedTypesEnum::from($type)->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('allowed_file_types')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="for" class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Dokumen Untuk</span>
                        </label>
                        <select class="form-select form-select-lg" name="for" data-control="select2"
                                data-placeholder="--- Pilih Dokumen Untuk ---" required>
                            <option value="{{ \App\Enums\DocumentForEnum::Company->value }}" {{ old('for', $dokumen->for->value) == \App\Enums\DocumentForEnum::Company->value ? 'selected' : '' }}>
                                {{ \App\Enums\DocumentForEnum::Company->label() }}
                            </option>
                            <option value="{{ \App\Enums\DocumentForEnum::Individual->value }}" {{ old('for', $dokumen->for->value) == \App\Enums\DocumentForEnum::Individual->value ? 'selected' : '' }}>
                                {{ \App\Enums\DocumentForEnum::Individual->label() }}
                            </option>
                        </select>
                        @error('for')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-7">
                    <div class="d-flex justify-content-center">
                        <button type="reset" class="btn btn-light me-3">Reset</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Update</span>
                        </button>
                    </div>
                </div>
            </form>
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
