@extends('main')

@section('content')
    @include('layouts.toolbar')
    
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-12">
                    <div class="card h-10">
                        <div class="card-header">
                            <div class="card-title fs-1tx fw-bold mb-3">
                                Hi, {{ Auth::user()->name }}
                            </div>
                        </div>
                        <div class="card-body fs-5">
                            Selamat datang di Aplikasi {{ config('app.name') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection