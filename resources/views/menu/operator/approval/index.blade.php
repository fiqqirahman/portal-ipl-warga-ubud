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
        </div>
        <div class="card-body py-4">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@section('scripts')
    {{ $dataTable->scripts() }}
@endsection