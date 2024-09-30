<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="{{ config('app.name') }}." />
    <meta name="keywords" content="bank-dki, dki, bank" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ config('app.faker_locale') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('app.name') }} | Portal Dedup" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    @include('layouts.styles')
    <style>
        body {
            background-image: url('metronic/demo2/assets/media/auth/bg10.jpeg');
        }

        [data-theme="dark"] body {
            background-image: url('metronic/demo2/assets/media/auth/bg10-dark.jpeg');
        }
    </style>

    <script src="{{ asset('js/theme.js') }}" defer></script>
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">

<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Password reset -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="bg-body rounded-4 w-md-600px p-10 d-flex flex-center flex-column flex-md-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Form-->
                    <form class="form w-100" action="{{ route('landing-page.password.email') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="email" placeholder="Email" name="email" autocomplete="off" required
                                   class="form-control @error('email') is-invalid @enderror
                                   {{ session()->has('alert.status') && session()->get('alert.status') === 'success' ? 'is-valid' : ''  }}
                                   bg-transparent" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if(session()->has('alert.status') && session()->get('alert.status') === 'success')
                                <div class="valid-feedback">
                                    {{ session()->get('alert.message') }}
                                </div>
                            @endif
                            <!--end::Email-->
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                                {{ __('Send Password Reset Link') }}
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Submit</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <a href="{{ route('auth.login') }}" class="btn btn-light">Cancel</a>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <!--end::Footer-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-400px mb-10 mb-lg-20"
                     src="{{ asset('metronic/demo2/assets/media/illustrations/dozzy-1/4.png') }}" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-400px mb-10 mb-lg-20"
                     src="{{ asset('metronic/demo2/assets/media/illustrations/dozzy-1/4-dark.png') }}" alt="" />
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">{{ config('app.name') }}</h1>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Password reset-->
</div>

@include('layouts.login-script')
@include('layouts.alert-dialog')
</body>

</html>
