<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Bank DKI" />
    <meta name="keywords" content="bank-dki, dki, bank" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ config('app.faker_locale') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ config('app.name') }} | Bank DKI" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    @include('layouts.styles')
    <style>
        body {
            height: 100%;
            background-size: cover;
            background-image: url('assets/images/Banner_Pattern_2600x1000.png');
        }

        [data-theme="dark"] body {
            background-image: url('metronic/demo2/assets/media/auth/bg5-dark.jpg');
        }
    </style>
    <script src="{{ asset('js/theme.js') }}" defer></script>
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex flex-column flex-center p-10">
            <div class="card card-flush w-lg-650px py-5">
                <form action="{{ route('landing-page.password.update') }}" method="POST" class="form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="card-body py-15 py-lg-20">
                        <div class="card-title d-block mb-10">
                            <div class="text-center mb-5">
                                <img alt="Logo" src="{{ asset('assets/images/logo_bank_dki.png') }}"
                                     class="h-40px" />
                            </div>
                            <h1 class="fw-bolder text-gray-900 mb-2">Ubah Password</h1>
                            <p class="text-gray-400 fw-semibold fs-5">Password Anda sudah kadaluarsa</p>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label fw-semibold fs-6 mb-2" for="email">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" id="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="fv-row" data-kt-password-meter="true">
                            <div class="form-group mb-1">
                                <label class="form-label fw-semibold fs-6 mb-2" for="password">
                                    Password Baru
                                </label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                            type="password" name="password" autocomplete="off"
                                            id="password" />
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>

                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                </div>

                                <div class="d-flex align-items-center mb-2"
                                     data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                    </div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                    </div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                    </div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>

                            <div class="text-muted mb-4">
                                Masukkan minimal 8 karakter dengan kombinasi kapital, huruf kecil, angka dan simbol.
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label class="form-label fw-semibold fs-6 mb-2" for="password_confirmation">Konfirmasi
                                Password</label>
                            <input type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   name="password_confirmation" id="password_confirmation">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.login-script')
@include('layouts.alert-dialog')
</body>

</html>
