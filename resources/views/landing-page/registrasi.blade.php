@extends('main-landing-page')

@section('styles')

@endsection

@section('heroBackground')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <!--begin::Heading-->
        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
            <!--begin::Title-->
            <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">E-Procurement PT.Bank DKI
                <br />
                <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">Aplikasi Pengadaan Barang dan Jasa Elektronik</span>
							</span></h1>
            <!--end::Title-->
            <!--begin::Action-->
            <a href="#" class="btn btn-primary">Download Panduan Vendor</a>
            <!--end::Action-->
        </div>
        <!--end::Heading-->
        <!--begin::Clients-->
        <div class="d-flex flex-center flex-wrap position-relative px-5">
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/fujifilm.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/vodafone.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/kpmg.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/nasa.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/aspnetzero.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/aon.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/hp-3.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
            <!--begin::Client-->
            <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
                <img src="{{asset('metronic/demo2/assets/media/svg/brand-logos/truman.svg')}}" class="mh-30px mh-lg-40px" alt="" />
            </div>
            <!--end::Client-->
        </div>
        <!--end::Clients-->
    </div>
    <!--end::Landing hero-->
@endsection

@section('contents')
    <!--begin::How It Works Section-->
    <div class="mb-n10 mb-lg-n20 z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">Choose Account Type</h3>
                <!--end::Title-->
                <!--begin::Text-->

                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Option-->
                        <input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                            <span class="svg-icon svg-icon-3x me-5">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
																<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
															</svg>
														</span>
                            <!--end::Svg Icon-->
                            <!--begin::Info-->
                            <span class="d-block fw-semibold text-start">
															<span class="text-dark fw-bold d-block fs-4 mb-2">Personal Account</span>
															<span class="text-muted fw-semibold fs-6">If you need more info, please check it out</span>
														</span>
                            <!--end::Info-->
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Option-->
                        <input type="radio" class="btn-check" name="account_type" value="corporate" id="kt_create_account_form_account_type_corporate" />
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-3x me-5">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
																<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
															</svg>
														</span>
                            <!--end::Svg Icon-->
                            <!--begin::Info-->
                            <span class="d-block fw-semibold text-start">
															<span class="text-dark fw-bold d-block fs-4 mb-2">Corporate Account</span>
															<span class="text-muted fw-semibold fs-6">Create corporate account to mane users</span>
														</span>
                            <!--end::Info-->
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection


@section('scripts')

@endsection