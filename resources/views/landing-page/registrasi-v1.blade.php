<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <meta name="description" content="{{ config('app.name') }}." />
    <meta name="keywords" content="bank-dki, dki, bank, e-procurement" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="{{ config('app.locale') }}" />
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ config('app.name') }} | Bank DKI" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/bdki-favicon.png') }}"/>
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('metronic/demo2/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/demo2/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Logo-->
        <a href="#" class="d-block d-lg-none mx-auto py-20">
            <img alt="Logo" src="{{asset('metronic/demo2/assets/media/logos/default.svg')}}" class="theme-light-show h-25px" />
            <img alt="Logo" src="{{asset('metronic/demo2/assets/media/logos/default-dark.svg')}}" class="theme-dark-show h-25px" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <!--begin::Header-->
                <div class="d-flex flex-stack py-2">
                    <!--begin::Back link-->
                    <div class="me-2">
                        <a href="/" class="btn btn-icon bg-light rounded-circle">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr002.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-gray-800">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor" />
											<path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor" />
										</svg>
									</span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>
                    <!--end::Back link-->
                    <!--begin::Sign Up link-->
                    <div class="m-0">
                        <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Already a member ?</span>
                        <a href="/login" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign In</a>
                    </div>
                    <!--end::Sign Up link=-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="py-20">
                    <!--begin::Form-->
                    <form class="form" method="POST" novalidate="novalidate" id="kt_sign_up_form" action="{{ route('landing-page.register-submit') }}">
                        @csrf
                        <input type="hidden" id="id_role" name="id_role" value="3">
                        <!--begin::Heading-->
                        <div class="text-start mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-up-title">Create an Account</h1>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Get unlimited access & earn money</div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        <div class="fv-row mb-10">
                            <input class="form-control form-control-lg" type="text" placeholder="Full Name" name="name" autocomplete="off" data-kt-translate="sign-up-input-name" />
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <input class="form-control form-control-lg" type="email" placeholder="Email" name="email" autocomplete="off" data-kt-translate="sign-up-input-email" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" autocomplete="off" data-kt-translate="sign-up-input-password" />
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
                                </div>
                                <!--end::Input wrapper-->
                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Hint-->
                            <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <input class="form-control form-control-lg" type="password" placeholder="Confirm Password" name="confirm_password" autocomplete="off" data-kt-translate="sign-up-input-confirm-password" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <!--begin::Submit-->
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary" data-kt-translate="sign-up-submit">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Submit</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <!--end::Submit-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="m-0">
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url('{{asset('metronic/demo2/assets/media/auth/bg11.png')}}')"></div>
        <!--begin::Body-->
    </div>
    <!--end::Authentication - Sign-up-->
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('metronic/demo2/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('metronic/demo2/assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used by this page)-->
<script src="{{asset('metronic/demo2/assets/js/custom/authentication/sign-up/free-trial.js')}}"></script>
<script src="{{asset('metronic/demo2/assets/js/custom/authentication/sign-in/i18n.js')}}"></script>
@include('layouts.alert-dialog')
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>