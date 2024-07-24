<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}." />
    <meta name="keywords" content="bank-dki, dki, bank" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ config('app.faker_locale') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('app.name') }} | Bank DKI" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    @include('layouts.styles')
    @yield('styles')
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.header')
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
    </div>

    <form action="" method="post" id="form-global-delete-data-table" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <form action="{{ route('auth.logout') }}" method="POST" id="form-global-logout"  style="display: none;">
        @csrf
    </form>

    @include('layouts.scripts')
    @include('layouts.loading-dialog')
    @include('layouts.alert-dialog')

    @yield('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.btn-global-delete-data-table', function (){
                Swal.fire({
                    title: $(this).data('title'),
                    html: $(this).data('text'),
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-global-delete-data-table').attr('action', $(this).data('route')).submit()
                    }
                })
            })

            $(document).on('click', '#btn-global-logout', function (){
                Swal.fire({
                    title: 'Ingin Logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-global-logout').attr('action', $(this).data('route')).submit()
                    }
                })
            })
        })
    </script>
</body>

</html>
