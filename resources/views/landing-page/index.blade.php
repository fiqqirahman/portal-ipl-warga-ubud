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
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">Alur
                    Proses Registrasi</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                    <br/>for different amazing and great useful admin
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
            <!--begin::Product slider-->
            <div class="tns tns-default">
                <!--begin::Slider-->
                <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                     data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                     data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                     data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{asset('assets/images/img.png')}}"
                             class="card-rounded shadow mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{asset('assets/images/img_1.png')}}"
                             class="card-rounded shadow mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{asset('assets/images/img_2.png')}}"
                             class="card-rounded shadow mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <img src="{{asset('assets/images/img_3.png')}}"
                             class="card-rounded shadow mw-100" alt=""/>
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Slider-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                    <span class="svg-icon svg-icon-3x">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
									<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                          fill="currentColor"/>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                    <span class="svg-icon svg-icon-3x">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
									<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                          fill="currentColor"/>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Slider button-->
            </div>
            <!--end::Product slider-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::How It Works Section-->
    <!--begin::Statistics Section-->
    <div class="mt-sm-n10">
        <!--begin::Curve top-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                      fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve top-->
        <!--begin::Wrapper-->
        <div class="pb-15 pt-18 landing-dark-bg">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-white fw-bold mb-5">Solusi Digital untuk Pengadaan yang Transparan dan Efektif</h3>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-5 text-gray-700 fw-bold">Transparan: Seluruh proses pengadaan dapat diakses dan dipantau secara terbuka, sehingga mengurangi risiko kecurangan dan meningkatkan kepercayaan antara pihak-pihak yang terlibat.
                        <br/>Efektif: Menggunakan teknologi digital untuk menyederhanakan dan mempercepat proses pengadaan, menghemat waktu, tenaga, dan biaya. Proses menjadi lebih terorganisir dan mudah dijalankan.
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Statistics-->
                <div class="d-flex flex-center">
                    <!--begin::Items-->
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                             style="background-image: url('{{asset('metronic/demo2/assets/media/svg/misc/octagon.svg')}}')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
											<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"/>
											<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                  fill="currentColor"/>
											<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                  fill="currentColor"/>
											<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                  fill="currentColor"/>
										</svg>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700"
                                         data-kt-countup-suffix="+">0
                                    </div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Known Companies</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                             style="background-image: url('{{asset('metronic/demo2/assets/media/svg/misc/octagon.svg')}}')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
											<path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                                  fill="currentColor"/>
											<path opacity="0.3"
                                                  d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                                  fill="currentColor"/>
											<path opacity="0.3"
                                                  d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                                  fill="currentColor"/>
										</svg>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80"
                                         data-kt-countup-suffix="K+">0
                                    </div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Statistic Reports</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                             style="background-image: url('{{asset('
metronic/demo2/assets/media/svg/misc/octagon.svg')}}')">
                            <!--begin::Symbol-->
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
											<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                  fill="currentColor"/>
											<path opacity="0.3"
                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                  fill="currentColor"/>
											<path opacity="0.3"
                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                  fill="currentColor"/>
										</svg>
									</span>
                            <!--end::Svg Icon-->
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="mb-0">
                                <!--begin::Value-->
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35"
                                         data-kt-countup-suffix="M+">0
                                    </div>
                                </div>
                                <!--end::Value-->
                                <!--begin::Label-->
                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Secure Payments</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Statistics-->
                <!--begin::Testimonial-->
                <div class="fs-2 fw-semibold text-muted text-center mb-3">
                    <span class="fs-1 lh-1 text-gray-700">“</span>Procurement adalah seni mengelola risiko, menciptakan peluang,
                    dan memastikan keberlanjutan bisnis dengan
                    <br/>
                    <span class="text-gray-700 me-1">transparansi.</span>
                    <span class="fs-1 lh-1 text-gray-700">“</span></div>
                <!--end::Testimonial-->
                <!--begin::Author-->
                <div class="fs-2 fw-semibold text-muted text-center">
                    <a href="../../demo2/dist/account/security.html" class="link-primary fs-4 fw-bold">Fiqqi Nurrakhman,</a>
                    <span class="fs-4 fw-bold text-gray-600">IT Development</span>
                </div>
                <!--end::Author-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Curve bottom-->
        <div class="landing-curve landing-dark-color">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                      fill="currentColor"></path>
            </svg>
        </div>
        <!--end::Curve bottom-->
    </div>
    <!--end::Statistics Section-->

    <!--begin::Testimonials Section-->
    <div class="mt-20 mb-n20 position-relative z-index-2">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">What Our
                    Clients Say</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                    <br/>for different amazing and great useful admin
                </div>
                <!--end::Description-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row g-lg-10 mb-10 mb-lg-20">
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Rating-->
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <!--end::Rating-->
                            <!--begin::Title-->
                            <div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest template
                                <br/>and the most well structured
                            </div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have
                                ever used. The codes are up to tandard. The css styles are very clean. In fact the
                                cleanest and the most up to standard I have ever seen.
                            </div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{asset('metronic/demo2/assets/media/avatars/300-1.jpg')}}" class="" alt=""/>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Paul Miles</a>
                                <span class="text-muted d-block fw-bold">Development Lead</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Rating-->
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <!--end::Rating-->
                            <!--begin::Title-->
                            <div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest template
                                <br/>and the most well structured
                            </div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have
                                ever used. The codes are up to tandard. The css styles are very clean. In fact the
                                cleanest and the most up to standard I have ever seen.
                            </div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{asset('metronic/demo2/assets/media/avatars/300-2.jpg')}}" class="" alt=""/>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Janya Clebert</a>
                                <span class="text-muted d-block fw-bold">Development Lead</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-4">
                    <!--begin::Testimonial-->
                    <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                        <!--begin::Wrapper-->
                        <div class="mb-7">
                            <!--begin::Rating-->
                            <div class="rating mb-6">
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                                <div class="rating-label me-2 checked">
                                    <i class="bi bi-star-fill fs-5"></i>
                                </div>
                            </div>
                            <!--end::Rating-->
                            <!--begin::Title-->
                            <div class="fs-2 fw-bold text-dark mb-3">This is by far the cleanest template
                                <br/>and the most well structured
                            </div>
                            <!--end::Title-->
                            <!--begin::Feedback-->
                            <div class="text-gray-500 fw-semibold fs-4">The most well thought out design theme I have
                                ever used. The codes are up to tandard. The css styles are very clean. In fact the
                                cleanest and the most up to standard I have ever seen.
                            </div>
                            <!--end::Feedback-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Author-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-circle symbol-50px me-5">
                                <img src="{{asset('metronic/demo2/assets/media/avatars/300-16.jpg')}}" class="" alt=""/>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <div class="flex-grow-1">
                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">Steave Brown</a>
                                <span class="text-muted d-block fw-bold">Development Lead</span>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Author-->
                    </div>
                    <!--end::Testimonial-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Testimonials Section-->
@endsection


@section('scripts')

@endsection