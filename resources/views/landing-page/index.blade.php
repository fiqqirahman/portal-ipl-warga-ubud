@extends('main-landing-page')

@section('styles')

@endsection

@section('heroBackground')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <!--begin::Heading-->
{{--        <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">--}}
{{--            <!--begin::Title-->--}}
{{--            <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">E-Procurement PT.Bank DKI--}}
{{--                <br />--}}
{{--                Aplikasi Pengadaan Barang dan Jasa Elektronik--}}
{{--            </h1>--}}
{{--            <!--end::Title-->--}}
{{--            <!--begin::Action-->--}}
{{--            <a href="#" class="btn btn-primary">Download Panduan Vendor</a>--}}
{{--            <!--end::Action-->--}}
{{--        </div>--}}
        <!--end::Heading-->
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
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">Portal Warga Ubud Garden
                    <br />
                    Aplikasi Pengadaan Barang dan Jasa Elektronik</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-5 text-muted fw-bold">
                    Registrasi e-Procurement Bank DKI adalah proses pendaftaran vendor untuk menjadi mitra
                    penyedia barang/jasa melalui sistem elektronik yang dimiliki oleh Bank DKI.
                    <br/>Proses ini bertujuan untuk memastikan transparansi, akuntabilitas, dan efisiensi dalam pengadaan.
                </div>
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('metronic/demo2/assets/media/illustrations/sigma-1/2.png')}}"
                             class="mh-125px mb-9" alt=""/>
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">Vendor Registration</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Vendor melakukan registrasi,
                            <br/>upload dokumen pendukung
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('metronic/demo2/assets/media/illustrations/sigma-1/8.png')}}"
                             class="mh-125px mb-9" alt=""/>
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">Verifikasi Vendor</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Registrasi vendor akan diverifikasi oleh
                            <br/>PT. Bank DKI
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{asset('metronic/demo2/assets/media/illustrations/sigma-1/12.png')}}"
                             class="mh-125px mb-9" alt=""/>
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">Enjoy, Vendor Active</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">Berhasil, vendor aktif
                            <br/>dan dapat mengikuti pengadaan barang dan jasa
                            <br/>di PT. Bank DKI
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <div class="mt-sm">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                      fill=""></path>
            </svg>
        </div>
    </div>
        <!--end::Curve top-->

@endsection


@section('scripts')

@endsection