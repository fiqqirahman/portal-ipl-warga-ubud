@extends('main')

@section('content')
    @include('layouts.toolbar')
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    <form action="{{ route('utility.master-config.update', ['master_config' => enkrip($masterConfig->id)]) }}" method="POST" id="form">
                        @csrf
                        @method('PUT')
                        <div class="fv-row mb-7">
                            <label for="key" class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Key</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                   title="Key"></i>
                            </label>
                            <input class="form-control form-control-solid" id="key"
                                   style="cursor: no-drop"
                                   name="key" readonly value="{{ $masterConfig->key }}" required>
                        </div>
                        @if(in_array($masterConfig->type->value, \App\Enums\MasterConfigTypeEnum::isCommonText()))
                            <div class="fv-row mb-7">
                                <label for="value" class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Value</span>
                                </label>
                                <input class="form-control form-control-solid @error('value') is-invalid @enderror"
                                       id="value" type="{{ $masterConfig->type->value }}" value="{{ old('value', $masterConfig->value) }}"
                                       name="value" required
                                    {{ $masterConfig->type->value === \App\Enums\MasterConfigTypeEnum::Number ? 'max="9999999999"' : 'maxlength="650000"' }}>
                                @error('value')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        @elseif($masterConfig->type === \App\Enums\MasterConfigTypeEnum::Boolean)
                            <div class="fv-row mb-7">
                                <label for="value" class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Value</span>
                                </label>
                                <select class="form-select form-select-solid @error('value') is-invalid @enderror"
                                        data-kt-select2="true"
                                        data-control="select2"
                                        id="value" name="value" required>
                                    <option value="0" {{ old('value', $masterConfig->value) == 0 ? 'selected' : '' }}>Tidak</option>
                                    <option value="1" {{ old('value', $masterConfig->value) == 1 ? 'selected' : '' }}>Ya</option>
                                </select>
                                @error('value')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        @elseif($masterConfig->type === \App\Enums\MasterConfigTypeEnum::TextArea)
                            <div class="fv-row mb-7">
                                <label for="value" class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Value</span>
                                </label>
                                <textarea class="form-control form-control-solid @error('value') is-invalid @enderror"
                                          id="value" type="{{ $masterConfig->type->value }}" maxlength="650000"
                                          name="value" rows="3" required>{{ old('value', $masterConfig->value) }}</textarea>
                                @error('value')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        @elseif($masterConfig->type === \App\Enums\MasterConfigTypeEnum::RichText)
                            <div class="fv-row mb-7">
                                <label for="richtext-value" class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Value</span>
                                </label>
                                <textarea
                                    class="form-control form-control-solid @error('value') is-invalid @enderror"
                                    id="richtext-value"
                                    name="value" rows="15">{{ old('value', $masterConfig->value) }}</textarea>
                                @error('value')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        @endif
                        <div class="fv-row mb-7">
                            <label for="description" class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">Keterangan</span>
                            </label>
                            <textarea class="form-control form-control-solid @error('description') is-invalid @enderror" id="description"
                                      name="description" rows="3" required maxlength="2000">{{ old('description', $masterConfig->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="separator mb-6"></div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light me-3">Reset</button>
                            <button type="submit" class="btn btn-primary" id="btn-submit">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if($masterConfig->type === \App\Enums\MasterConfigTypeEnum::RichText)
        <script src="{{ asset('metronic/demo2/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    @endif
    <script>
        $(document).ready(function() {
            const container = document.querySelector("#kt_content");

            const blockContainer = new KTBlockUI(container, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Sedang menyimpan data...</div>',
            });

            $('#form').on('submit', function() {
                @if($masterConfig->type === \App\Enums\MasterConfigTypeEnum::RichText)
                    if (tinymce.get('richtext-value').getContent().length === 0) {
                        Swal.fire({
                            title: "Value wajib diisi",
                            icon: "warning",
                        });
                        return false;
                    }
                @endif

                if (!blockContainer.isBlocked()) {
                    blockContainer.block();
                }
            });

            @if($masterConfig->type === \App\Enums\MasterConfigTypeEnum::RichText)
                let KTTinymce = function () {
                    let inputs = function () {
                        tinymce.init({
                            selector: '#richtext-value'
                        });
                    }

                    return {
                        init: function () {
                            inputs();
                        }
                    };
                }();

                KTTinymce.init();
            @endif
        });
    </script>
@endsection
