@extends('main')

@section('styles')
    <link href="{{ asset('css/yearpicker.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @include('layouts.toolbar')

    @can(\App\Enums\PermissionEnum::RegistrasiVendorApproval->value)
        @include('menu.operator.approval.approval-form')
    @endcan

    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-flush h-lg-100">
                <div class="card-header pt-7">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-1 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <h2>Form {{ $title }}</h2>
                    </div>
                </div>
                <div class="card-body pt-5">
                    <form method="POST" id="form-update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_contact_view_general" aria-selected="true" role="tab">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"></path>
                                        </svg>
                                        Informasi Umum
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#kt_contact_view_address" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        Alamat Perusahaan
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#kt_contact_view_contact_person" aria-selected="false" role="tab"
                                   tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        Kontak Person
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#kt_contact_view_banks" aria-selected="false" role="tab"
                                   tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        Bank
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#kt_contact_view_segmentasi" aria-selected="false" role="tab"
                                   tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        Segmentasi
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_documents" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="currentColor" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        Dokumen
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#kt_contact_view_keahlian" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                      fill="currentColor" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        Keahlian
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_daftar_komisaris" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Komisaris
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_daftar_direksi" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Direksi
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_daftar_pemegang_saham" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Pemegang Saham
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_daftar_tenaga_ahli" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Tenaga Ahli
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_daftar_inventaris" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Inventaris
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_daftar_neraca_keuangan" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Neraca Keuangan
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_pengalaman_3_tahun_terakhir" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Pengalaman 3 Tahun Terakhir
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_pengalaman_mitra_usaha" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Pengalaman Mitra Usaha
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_contact_view_pengalaman_pekerjaan_berjalan" aria-selected="false" role="tab" tabindex="-1">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0077 19.2901L12.9293 17.5311C12.3487 17.1993 11.6407 17.1796 11.0426 17.4787L6.89443 19.5528C5.56462 20.2177 4 19.2507 4 17.7639V5C4 3.89543 4.89543 3 6 3H17C18.1046 3 19 3.89543 19 5V17.5536C19 19.0893 17.341 20.052 16.0077 19.2901Z" fill="currentColor"></path>
                                        </svg>
                                        Pengalaman Pekerjaan Berjalan
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="kt_contact_view_general" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="nama" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Nama</span>
                                        </label>
                                        <input type="text" required maxlength="255"
                                               class="form-control @error('nama') is-invalid @enderror"
                                               name="nama" value="{{ old('nama', $registrasiVendor->nama) }}" id="nama" />
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="npwp" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">NPWP</span>
                                        </label>
                                        <input type="text"
                                               required pattern="^\d{15,16}$" title="NPWP harus terdiri dari 15 atau 16 digit"
                                               class="form-control @error('npwp') is-invalid @enderror positive-numeric"
                                               name="npwp" value="{{ old('npwp', $registrasiVendor->npwp) }}" id="npwp" maxlength="16" />
                                        @error('npwp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="kode_master_kategori_vendor" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Kategori Vendor</span>
                                        </label>
                                        <select class="form-select @error('kode_master_kategori_vendor') is-invalid @enderror" required
                                                id="kode_master_kategori_vendor" name="kode_master_kategori_vendor" data-control="select2"
                                                data-placeholder="---Pilih Kategori Vendor---" >
                                            <option></option>
                                            @foreach ($stmtKategoriVendor as $kategoriVendor)
                                                <option value="{{ $kategoriVendor->kode }}"
                                                        {{ $kategoriVendor->kode == old('kode_master_kategori_vendor', $registrasiVendor->kode_master_kategori_vendor) ? 'selected' : '' }}>
                                                    {{ $kategoriVendor->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kode_master_kategori_vendor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="kode_master_jenis_vendor" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Jenis Vendor</span>
                                        </label>
                                        <select class="form-select @error('kode_master_jenis_vendor') is-invalid @enderror" required
                                                id="kode_master_jenis_vendor" name="kode_master_jenis_vendor" data-control="select2"
                                                data-placeholder="---Pilih Jenis Vendor---" >
                                            <option></option>
                                            @foreach ($stmtJenisVendor as $jenisVendor)
                                                <option value="{{ $jenisVendor->kode }}"
                                                        {{ $jenisVendor->kode == old('kode_master_jenis_vendor', $registrasiVendor->kode_master_jenis_vendor) ? 'selected' : '' }}>
                                                    {{ $jenisVendor->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kode_master_jenis_vendor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="kode_master_bentuk_badan_usaha" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Bentuk Badan Usaha</span>
                                        </label>
                                        <select class="form-select @error('kode_master_bentuk_badan_usaha') is-invalid @enderror" required
                                                id="kode_master_bentuk_badan_usaha" name="kode_master_bentuk_badan_usaha" data-control="select2"
                                                data-placeholder="---Pilih Bentuk Badan Usaha---" >
                                            <option></option>
                                            @foreach ($stmtBentukBadanUsaha as $bentukBadanUsaha)
                                                <option value="{{ $bentukBadanUsaha->kode }}"
                                                        {{ $bentukBadanUsaha->kode == old('kode_master_bentuk_badan_usaha', $registrasiVendor->kode_master_bentuk_badan_usaha) ? 'selected' : '' }}>
                                                    {{ $bentukBadanUsaha->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kode_master_bentuk_badan_usaha')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-4">
                                        <label for="kode_master_status_perusahaan" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Status Perusahaan</span>
                                        </label>
                                        <select class="form-select @error('kode_master_status_perusahaan') is-invalid @enderror" required
                                                id="kode_master_status_perusahaan" name="kode_master_status_perusahaan" data-control="select2"
                                                data-placeholder="---Pilih Status Perusahaan---" >
                                            <option></option>
                                            @foreach ($stmtStatusPerusahaan as $statusPerusahaan)
                                                <option value="{{ $statusPerusahaan->kode }}"
                                                        {{ $statusPerusahaan->kode == old('kode_master_status_perusahaan', $registrasiVendor->kode_master_status_perusahaan) ? 'selected' : '' }}>
                                                    {{ $statusPerusahaan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kode_master_status_perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_address" role="tabpanel">
                                @include('menu.vendor-partials-readonly.address-readonly')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_contact_person" role="tabpanel">
                                @include('menu.vendor-partials-readonly.contact-persons-readonly')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_banks" role="tabpanel">
                                @include('menu.vendor-partials-readonly.banks-readonly')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_segmentasi" role="tabpanel">
                                @include('menu.vendor-partials-readonly.segmentasi-readonly')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_documents" role="tabpanel">
                                @include('menu.vendor-partials.documents.edit')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_keahlian" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-4">
                                        <label for="profesi_keahlian" class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Profesi / Keahlian</span>
                                        </label>
                                        <textarea
                                                class="form-control form-control @error('profesi_keahlian') is-invalid @enderror"
                                                id="profesi_keahlian" required maxlength="3000"
                                                name="profesi_keahlian" rows="4">{{ old('profesi_keahlian', isset($registrasiVendor) ? $registrasiVendor?->profesi_keahlian : null) }}</textarea>
                                        @error('profesi_keahlian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_daftar_komisaris" role="tabpanel">
                                @include('menu.vendor-partials.daftar-komisaris')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_daftar_direksi" role="tabpanel">
                                @include('menu.vendor-partials.daftar-direksi')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_daftar_pemegang_saham" role="tabpanel">
                                @include('menu.vendor-partials.daftar-pemegang-saham')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_daftar_tenaga_ahli" role="tabpanel">
                                @include('menu.vendor-partials.daftar-tenaga-ahli')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_daftar_inventaris" role="tabpanel">
                                @include('menu.vendor-partials.daftar-inventaris')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_daftar_neraca_keuangan" role="tabpanel">
                                @include('menu.vendor-partials.daftar-neraca-keuangan')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_pengalaman_3_tahun_terakhir" role="tabpanel">
                                @include('menu.vendor-partials.pengalaman-kerja.3-tahun-terakhir')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_pengalaman_mitra_usaha" role="tabpanel">
                                @include('menu.vendor-partials.pengalaman-kerja.mitra-usaha')
                            </div>
                            <div class="tab-pane fade" id="kt_contact_view_pengalaman_pekerjaan_berjalan" role="tabpanel">
                                @include('menu.vendor-partials.pengalaman-kerja.pekerjaan-berjalan')
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-7">
                            <a href="{{ route('menu.registrasi-vendor-perusahaan.index') }}">
                                <button type="button" class="btn btn-light me-3">Kembali</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="" id="form-remove-document" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <form action="" id="form-remove-path-file-inventaris" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/yearpicker.js') }}"></script>
    <script>
        // Variable to be passed to JS fields file
        const vendorJenisIdentitas = @json($vendorJenisIdentitas);
        const vendorJabatan = @json($vendorJabatan);
        const masterJenisInventaris = @json($masterJenisInventaris);
        const masterJenisMerkInventaris = @json($masterJenisMerkInventaris);
        const masterKondisiInventaris = @json($masterKondisiInventaris);
        const masterStatusAudit = @json($masterStatusAudit);
    </script>
    <script src="{{ asset('js/fields/daftar-komisaris.js') }}"></script>
    <script src="{{ asset('js/fields/daftar-direksi.js') }}"></script>
    <script src="{{ asset('js/fields/daftar-pemegang-saham.js') }}"></script>
    <script src="{{ asset('js/fields/daftar-tenaga-ahli.js') }}"></script>
    <script src="{{ asset('js/fields/daftar-inventaris.js') }}"></script>
    <script src="{{ asset('js/fields/daftar-neraca-keuangan.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kode_provinsi').change(function () {
                let kode_provinsi = $(this).val();
                $.ajax({
                    url: '{{ route("menu.getKabKotaByProvinsi") }}',
                    type: 'GET',
                    data: {kode_provinsi},
                    success: function (data) {
                        const oldValue = parseInt('{{ old('kode_kabupaten_kota', $registrasiVendor->kode_kabupaten_kota ?? '') }}'.trim())

                        $('#kode_kabupaten_kota').empty().append('<option></option>');
                        $.each(data, function (key, value) {
                            $('#kode_kabupaten_kota').append(`<option value="${value.kode}" ${oldValue === value.kode ? 'selected' : ''}>${value.nama}</option>`);
                        });
                        if(oldValue > 0){
                            $('#kode_kabupaten_kota').trigger('change')
                        }
                    }
                });
            }).trigger('change');

            $('#kode_kabupaten_kota').change(function () {
                let kode_kabupaten_kota = $(this).val();
                $.ajax({
                    url: '{{ route("menu.getKecamatanByKabKota") }}',
                    type: 'GET',
                    data: {kode_kabupaten_kota},
                    success: function (data) {
                        const oldValue = parseInt('{{ old('kode_kecamatan', $registrasiVendor->kode_kecamatan ?? '') }}'.trim())

                        $('#kode_kecamatan').empty().append('<option></option>');
                        $.each(data, function (key, value) {
                            $('#kode_kecamatan').append(`<option value="${value.kode}" ${oldValue === value.kode ? 'selected' : ''}>${value.nama}</option>`);
                        });
                        if(oldValue > 0){
                            $('#kode_kecamatan').trigger('change')
                        }
                    }
                });
            });

            $('#kode_kecamatan').change(function () {
                let kode_kecamatan = $(this).val();
                $.ajax({
                    url: '{{ route("menu.getKelurahanByKecamatan") }}',
                    type: 'GET',
                    data: {kode_kecamatan},
                    success: function (data) {
                        const oldValue = parseInt('{{ old('kode_kelurahan', $registrasiVendor->kode_kelurahan ?? '') }}'.trim())

                        $('#kode_kelurahan').empty().append('<option></option>');
                        $.each(data, function (key, value) {
                            $('#kode_kelurahan').append(`<option value="${value.kode}" ${oldValue === value.kode ? 'selected' : ''}>${value.nama}</option>`);
                        });
                        if(oldValue > 0){
                            $('#kode_kelurahan').trigger('change')
                        }
                    }
                });
            });

            $('#kode_kelurahan').on('change', function(){
                // console.log($(this).val())
            })

            $('#btn-submit').click(function (){
                $(':required:invalid', '#form-update').each(function () {
                    let id = $('.tab-pane').find(':required:invalid').closest('.tab-pane').attr('id');

                    $(`.nav a[href="#` + id + `"]`).tab('show');

                    return false
                });
            })

            $('div.invalid-feedback', '#form-update').each(function () {
                let id = $(this).closest('.tab-pane').attr('id');

                if (id) {
                    $(`.nav a[href="#${id}"]`).tab('show');

                    return false
                }
            });

            @if(session()->has('last_opened_tab') && !$errors->any())
            $(`.nav a[href="#` + '{{ session()->get('last_opened_tab') }}' + `"]`).tab('show');
            @endif

            $(document).on('submit', '#form-update', function (e) {
                e.preventDefault()

                if($('#confirm_done_checkbox').prop('checked')){
                    Swal.fire({
                        title: 'Anda Yakin?',
                        html: 'Ingin menyelesaikan data Registrasi ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, selesaikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#loader-overlay').show();
                            updateActionForm()
                            $('#form-update')[0].submit()
                        }
                    })
                } else {
                    $('#loader-overlay').show();
                    updateActionForm()
                    $('#form-update')[0].submit()
                }
            })

            $('#confirm_done_checkbox').on('change', function() {
                if ($(this).prop('checked')) {
                    isSubmitForm()
                    $('#btn-submit').text('Submit');
                } else {
                    isSaveToDraftForm()
                    $('#btn-submit').text('Save to Draft');
                }
            });

            $('.btn-remove-document').click(function (){
                const route = $(this).data('route')
                const fieldName = $(this).data('field-name')

                Swal.fire({
                    title: 'Anda Yakin?',
                    html: `Ingin menghapus dokumen ${fieldName} ?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#loader-overlay').show();
                        $('#form-remove-document').attr('action', route).submit()
                    }
                })
            })

            $('.btn-remove-path-file-inventaris').click(function (){
                const route = $(this).data('route')
                const fieldName = $(this).data('field-name')

                Swal.fire({
                    title: 'Anda Yakin?',
                    html: `Ingin menghapus ${fieldName} ?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#loader-overlay').show();
                        $('#form-remove-path-file-inventaris').attr('action', route).submit()
                    }
                })
            })

            function updateActionForm(){
                const hrefValue = $('.nav-link.text-active-primary.pb-4.active').attr('href');

                if (hrefValue) {
                    const updatedAction = `${$('#form-update').attr('action')}?tab=${hrefValue.replace('#','')}`;

                    $('#form-update').attr('action', updatedAction);
                }
            }

            function isSubmitForm(){
                $('.has_required_label').addClass('required')
                $('.has_required_input').attr('required', true)
            }

            function isSaveToDraftForm(){
                $('.has_required_label').removeClass('required')
                $('.has_required_input').removeAttr('required')
            }
        });
    </script>
    <script src="{{ asset('js/fields/readonly.js') }}"></script>
@endsection
