@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <span class="svg-icon svg-icon-1 me-2">
                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com014.svg') !!}
                </span>
                <h2>{{ $title }}</h2>
            </div>
            @can(\App\Enums\PermissionEnum::RegistrasiVendorCreate->value)
                @if(allowCreateRegistration())
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('menu.registrasi-vendor-perusahaan.create') }}" type="button" class="btn btn-primary">
                                <span class="svg-icon svg-icon-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
                                </span>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                @endif
            @endcan
        </div>
        <div class="card-body py-4">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
