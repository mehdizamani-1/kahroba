@extends('layouts.app')

@section('title')
    تنظیمات
@endsection


@section('styles')
    <link rel="stylesheet" href="/assets/libs/css/dropify.css">
    <link rel="stylesheet" href="/assets/libs/css/bootstrap-datepicker.min.css" />

    <link rel="stylesheet" href="/assets/libs/css/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css"> -->
    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link href="/css/main-style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/libs/css/panel2/chartist.min.css"> -->
    <link rel="stylesheet" href="/assets/libs/css/style.css">

    <style>
        .pwt-btn-calendar {
            display: none !important;
        }
    </style>

@endsection



@section('content')



    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                @include('layouts.info-box')
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content pt-3">

                        <div class="topWidgets">
                            <div class="row">
                            </div>
                        </div>

                        <div class="ecommerce-widget">
                            <form method="POST" enctype="multipart/form-data" action="/config/main/store"
                                  class="newsForm" id="step-form-horizontal">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">تنظیمات عمومی</h5>
                                        <div class="card-body">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3 p_editable" data-name="main_system_title">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'main_system_title')
                                                                    {{ $config['value'] ?? 'سامانه هوشمند ناوگان اتوبوسرانی شهرداری قم' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif

                                                            @endforeach
                                                        </p>

                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="main_system_title"
                                                               value="{{ $currentKeyValue ?? 'سامانه هوشمند ناوگان اتوبوسرانی شهرداری قم' }}">
                                                        <label for="" class="outline-primary formLabel ">    عنوان اصلی سامانه </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'company_title')
                                                                    {{ $config['value'] ?? 'شرکت توسعه ارتباطات هوشمند مبتکر شاهرود' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif

                                                            @endforeach
                                                        </p>
                                                        <input type="hidden" class="p_input" name="company_title" value="">
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="company_title"
                                                               value="{{ $currentKeyValue ?? 'شرکت توسعه ارتباطات هوشمند مبتکر شاهرود' }}">
                                                        <label for="" class="outline-primary formLabel ">   	نام شرکت	 </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'home_page_url')
                                                                    {{ $config['value'] ?? 'busavl.qom.ir' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif

                                                            @endforeach
                                                        </p>
                                                        <input type="hidden" class="p_input" name="home_page_url" value="">
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="home_page_url"
                                                               value="{{ $currentKeyValue ?? 'busavl.qom.ir' }}">
                                                        <label for="" class="outline-primary formLabel ">	آدرس صفحه اصلی</label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'copyright_date')
                                                                    {{ $config['value'] ?? '2019-2022' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="copyright_date"
                                                               value="{{ $currentKeyValue ?? '2019-2022' }}">
                                                        <label for="" class="outline-primary formLabel ">		تاریخ کپی رایت  </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'copyright_date')
                                                                    {{ $config['value'] ?? 'اتوبوسرانی, قم, سامانه, هوشمندسازی' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                    2حا        </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="meta_key"
                                                               value="{{ $currentKeyValue ?? 'اتوبوسرانی, قم, سامانه, هوشمندسازی' }}"
                                                               >
                                                        <label for="" class="outline-primary formLabel ">			متا کلمات کلیدی	 </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'mata_description')
                                                                    {{ $config['value'] ?? 'سامانه کنترل و مانیتورینگ اتوبوسرانی قم' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="mata_description" value="{{ $currentKeyValue ?? 'سامانه کنترل و مانیتورینگ اتوبوسرانی قم' }}">
                                                        <label for="" class="outline-primary formLabel ">متا توضیحات	 </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'main_email')
                                                                    {{ $config['value'] ?? 'no-replay@qom.ir' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="main_email" value="{{ $currentKeyValue ?? 'no-replay@qom.ir' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            آدرس ایمیل اصلی
                                                        </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">

                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'archived_email')
                                                                    {{ $config['value'] ?? 'archive@qom.ir' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="archived_email"
                                                               value="{{ $currentKeyValue ?? 'archive@qom.ir' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            آدرس ایمیل آرشیوی
                                                        </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'show_recorded_count')
                                                                    {{ $config['value'] ?? '9' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="show_recorded_count"
                                                               value="{{ $currentKeyValue ?? '9' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            تعداد رکوردهای نمایشی
                                                        </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'time_zone')
                                                                    {{ $config['value'] ?? 'Asia/Tehran' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="time_zone" value="{{ $currentKeyValue ?? 'Asia/Tehran' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            ساعت محلی سامانه
                                                        </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'access_login')
                                                                    {{ $config['value'] ?? '3' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="access_login" value="{{ $currentKeyValue ?? '3' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            تعداد روز مجوز موقت
                                                        </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'penalty_counter')
                                                                    {{ $config['value'] ?? '10' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="penalty_counter" value="{{ $currentKeyValue ?? '10' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            تعداد شمارنده ثبت تخلف
                                                        </label>
                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>




                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">تنظیمات پروتکل های ارتباطی</h5>
                                        <div class="card-body">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'hardware_port_password')
                                                                    {{ $config['value'] }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="hardware_port_password" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            کلمه عبور درگاه سخت افزارها
                                                        </label>
                                                    </div>


                                                    <div class="col-12"></div>
                                                    <hr>
                                                    <div class="col-12 p-0 mt-2 mb-2">
                                                        <h5 class="card-header mb-2">تنظیمات نقشه</h5>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'default_lat')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="default_lat" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            عرض جغرافیایی پیش‌ فرض
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'default_lng')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="default_lng" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            طول جغرافیایی پیش‌فرض
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'default_zoom')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="default_zoom" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            بزرگنمایی پیش‌فرض
                                                        </label>
                                                    </div>




                                                    <div class="col-12"></div>
                                                    <hr>
                                                    <div class="col-12 p-0 mt-2 mb-2">
                                                        <h5 class="card-header mb-2">تنظیمات وب سرویس شارژ سیم کارت</h5>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'charge_webService_userName')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="charge_webService_userName" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            نام کاربری
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'charge_webService_password')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="charge_webService_password" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            رمز عبور وب سرویس
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">تنظیمات وب سرویس ها</h5>
                                        <div class="card-body">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">


                                                    <div class="col-12"></div>
                                                    <hr>
                                                    <div class="col-12 p-0 mt-2 mb-2">
                                                        <h5 class="card-header mb-2">وب سرویس آینکس (شارژ سیم کارت)</h5>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'charge_webService_userName')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="charge_webService_userName" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            نام کاربری
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @foreach($configs as  $config)
                                                                @if($config['key'] == 'charge_webService_password')
                                                                    {{ $config['value'] ?? '' }}
                                                                    @php $currentKeyValue = $config['value'] @endphp
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="charge_webService_password" value="{{ $currentKeyValue ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            رمز عبور وب سرویس
                                                        </label>
                                                    </div>



                                                    <div class="col-12"></div>
                                                    <hr>
                                                    <div class="col-12 p-0 mt-2 mb-2">
                                                        <h5 class="card-header mb-2">وب سرویس SMS.ir (ارسال پیامک)</h5>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @php
                                                                echo config('smsirlaravel.api-key')
                                                            @endphp
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="api-key" value="{{ config('smsirlaravel.api-key') ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            API Key
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @php
                                                                echo config('smsirlaravel.secret-key')
                                                            @endphp
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="secret-key" value="{{ config('smsirlaravel.secret-key') ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            Secret Key
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            @php
                                                                echo config('smsirlaravel.line-number')
                                                            @endphp
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <input type="hidden" class="p_input" name="line-number" value="{{ config('smsirlaravel.line-number') ?? '' }}">
                                                        <label for="" class="outline-primary formLabel ">
                                                            شماره خط
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>






                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">حالت تعمیر سامانه</h5>
                                        <div class="card-body">

                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">
                                                    <div class="col-12 text-right pt-1">
                                                        <span class="font-weight-bold pt-1"> وضعیت فعلی سامانه	:</span>


                                                    </div>
                                                    <label style="margin: 35px;" class="switch">
                                                        <input type="checkbox" name="maintance_mode">
                                                        <span class="slider round"></span>
                                                    </label>


{{--                                                    <div class="col-4 col-sm-3 col-md-2 d-inline-flex mb-1 mt-1">--}}
{{--                                                        <input class="d-inline-flex" type="radio" id="radio21" name="carStatus" value="1" data-toggle="collapse" href="#collapse1"  aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                                        <label for="radio21" style="width: 160px">--}}
{{--                                                            <svg width="1.2rem" height="1.2rem" fill="#57cad5" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lightbulb" class="svg-inline--fa fa-lightbulb fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M96.06 454.35c.01 6.29 1.87 12.45 5.36 17.69l17.09 25.69a31.99 31.99 0 0 0 26.64 14.28h61.71a31.99 31.99 0 0 0 26.64-14.28l17.09-25.69a31.989 31.989 0 0 0 5.36-17.69l.04-38.35H96.01l.05 38.35zM0 176c0 44.37 16.45 84.85 43.56 115.78 16.52 18.85 42.36 58.23 52.21 91.45.04.26.07.52.11.78h160.24c.04-.26.07-.51.11-.78 9.85-33.22 35.69-72.6 52.21-91.45C335.55 260.85 352 220.37 352 176 352 78.61 272.91-.3 175.45 0 73.44.31 0 82.97 0 176zm176-80c-44.11 0-80 35.89-80 80 0 8.84-7.16 16-16 16s-16-7.16-16-16c0-61.76 50.24-112 112-112 8.84 0 16 7.16 16 16s-7.16 16-16 16z"></path></svg>--}}
{{--                                                            فعال--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-4 col-sm-3 col-md-2 d-inline-flex mb-1 mt-1">--}}
{{--                                                        <input class="d-inline-flex" type="radio" id="radio22" name="carStatus" value="0">--}}
{{--                                                        <label for="radio22" style="width: 160px">--}}
{{--                                                            <svg width="1.2rem" height="1.2rem" fill="#57cad5" aria-hidden="true" focusable="false" data-prefix="far" data-icon="lightbulb" class="svg-inline--fa fa-lightbulb fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M176 80c-52.94 0-96 43.06-96 96 0 8.84 7.16 16 16 16s16-7.16 16-16c0-35.3 28.72-64 64-64 8.84 0 16-7.16 16-16s-7.16-16-16-16zM96.06 459.17c0 3.15.93 6.22 2.68 8.84l24.51 36.84c2.97 4.46 7.97 7.14 13.32 7.14h78.85c5.36 0 10.36-2.68 13.32-7.14l24.51-36.84c1.74-2.62 2.67-5.7 2.68-8.84l.05-43.18H96.02l.04 43.18zM176 0C73.72 0 0 82.97 0 176c0 44.37 16.45 84.85 43.56 115.78 16.64 18.99 42.74 58.8 52.42 92.16v.06h48v-.12c-.01-4.77-.72-9.51-2.15-14.07-5.59-17.81-22.82-64.77-62.17-109.67-20.54-23.43-31.52-53.15-31.61-84.14-.2-73.64 59.67-128 127.95-128 70.58 0 128 57.42 128 128 0 30.97-11.24 60.85-31.65 84.14-39.11 44.61-56.42 91.47-62.1 109.46a47.507 47.507 0 0 0-2.22 14.3v.1h48v-.05c9.68-33.37 35.78-73.18 52.42-92.16C335.55 260.85 352 220.37 352 176 352 78.8 273.2 0 176 0z"></path></svg>--}}
{{--                                                            غیرفعال--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">
                                                    <div class="col-12 text-right pt-1">
                                                        <span class="font-weight-bold pt-1">   متن پیغام *:</span>
                                                        <span class="pt-1 d-block"> (در صفحه ورودی نمایش داده می شود)	</span>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea id="latlangResult" placeholder=""
                                                                  contenteditable="true" class="form-control" style="width:100%;height:auto;">@foreach($configs as  $config) @if($config['key'] == 'maintance_mode_note'){{ $config['value'] ?? '' }}@endif @endforeach</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="mb-1 d-inline-block font">تصویر پس زمینه صفحه ورود(jpg)</p>
                                                <input type="file" data-default-file="{{asset("/assets/images/2000px-Qom_panorama.jpg")}}" name="main_pic" id="loginBgInput" class="formField " placeholder="">
                                                <label for="loginBgInput" class="formLabel"></label>
                                            </div>


{{--                                            <a type="submit" class="btn btnStyle  text-center mt-4 col-12 col-md-6 text-center d-block mr-auto ml-auto">--}}
{{--                                                ذخیره کلیه تنظیمات--}}
{{--                                            </a>--}}
                                            <button type="submit" class="btn btn-success" >
                                                ذخیره کلیه تنظیمات
                                            </button>

                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




@section('include_scripts')

@endsection



@section('scripts')


    <script src="/vendor/apexchart/apexchart.js"></script>
    <!--	<script src="vendor/peity/jquery.peity.min.js"></script>-->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/vendor/chartist/js/chartist.min.js"></script>
    <script src="/js/dashboard/dashboard-1.js"></script>
    <script src="/vendor/svganimation/vivus.min.js"></script>
    <script src="/vendor/svganimation/svg.animation.js"></script>
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/libs/js/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/assets/libs/js/main-js.js"></script>
    <script src="/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script> -->
    <!--	DATE PICKER-->
    <script src="/assets/libs/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/js/bootstrap-datepicker.fa.min.js"></script>
    <!--	DATE PICKER-->

    <script src="/assets/libs/js/bootstrap-clockpicker.min.js"></script>
    <script src="/assets/libs/js/clock-picker-init.js"></script>
    <script src="/assets/libs/js/dropify.js"></script>

    <script>
        $(document).ready(function () {


            $(document).on('change','.inline-editing-text',function (){
                console.log('change');
            });




            $('#data1').clockpicker({
                placement: 'bottom',
                align: 'center'
            });
            $('#data2').clockpicker({
                placement: 'bottom',
                align: 'center'
            });


            $(function removeRow(){
                $(document).on('click','.icon-trash',function(){
                    let cc = $(this).parents().find('shiftCont').children();
                    console.log(cc);
                    // $(this).parentsUntil('.row').siblings().remove();
                    // $(this).parentsUntil('.row').remove();
                });
            })

            $(document).on('click','.bi-plus-square-fill',function(){
                $('.shiftCont').append('<div class="row height50"><div class="d-block col-1 pt-4">شیفت 1:</div><div class="formGroup col-3 p-1 mt-2 ml-auto mr-auto input-group clockpicker"><label class="tr-0 formLabel" for="">از ساعت</label><input type="text" class="outline-primary formField form-control" value=""></div><div class="formGroup col-3 p-1 mt-2 ml-auto mr-auto input-group clockpicker"><label class="tr-0 formLabel" for="">تا ساعت</label><input type="text" class="outline-primary formField form-control" value=""></div><div class="formGroup col-4 p-1 mt-2 ml-auto mr-auto"><label class="tr-0 formLabel no-style2-label-top pointer-events-none-" for="carCodeInput26">نام راننده</label><select class="outline-primary formField webkit-appearance-none- pl-2" id="carCodeInput26" type="text" required dir="ltr"><option disabled selected value="" label=""></option><option label="">1</option><option label="">2</option><option label="">3</option><option label="">4</option></select></div><div class="d-block col-1 pt-4"><a href="javascript: void(0);" class="btn shadow btn-xs sharp icon-trash"><i class="fas fa-trash-alt" onclick="removeRow();"></i></a></div></div>');
            });
            $('#loginBgInput').dropify();


            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/m/dd"
            });
            $("#datepicker5").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/m/dd"
            });

            $("#datepicker1").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/m/dd"
            });
            $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/m/dd"
            });



            $("#datepicker6").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/m/dd"
            });



            // $(".example1").pDatepicker({
            // 	initialValueType: "persian",
            // 	format: "YYYY/MM/DD",
            // 	onSelect: "year"
            // });

            //call drop image of krajee


        })
    </script>
    <script>

        (function($) {

            var direction =  getUrlParams('dir');
            if(direction != 'rtl')
            {direction = 'ltr'; }

            new dezSettings({
                typography: "roboto",
                version: "light",
                layout: "vertical",
                headerBg: "color_1",
                navheaderBg: "color_3",
                sidebarBg: "color_1",
                sidebarStyle: "full",
                sidebarPosition: "fixed",
                headerPosition: "fixed",
                containerLayout: "wide",
                direction: direction
            });

        })(jQuery);
    </script>


    <script>
        $(document).ready(function(){

            $('.header-content .nav-item').on('click', function(){
                if($(this)){
                    $(this).children('.dropdown-menu').toggle();
                }else{
                    $(document.body).on('click', function() {
                        if(!$(this).children(".dropdown-menu")){
                            $(".header-content .nav-item").children('.dropdown-menu').hide();
                        }

                    })
                }

            })

        })

    </script>


    <script>
        $(document).ready(function(){
            $('.inline-editing-box').click(function(){
                $(this).children(".inline-editing-edit").hide();
                $(this).addClass('inline-editing-editable');
                $(this).children('.inline-editing-text').attr('contenteditable', 'true');
                $(this).children('.inline-editing-save').show();
            });
            $(document).on('click','#inline-editing-save-id',function(){
                $(this).hide();
                $(this).parent('.inline-editing-box').removeClass('inline-editing-editable');
                let text = $(this).parents('.formGroup').find('.formField').html();
                text = $.trim(text);
                $(this).next('.p_input').val(text);
                // $(this).sibiling('.inline-editing-text').removeAttr('contenteditable');
                // $(this).sibiling('.inline-editing-edit').show();
            })
            $(document).on('hover','.inline-editing-box',function(){
                $(this).children(".inline-editing-edit").show();
            })



            $(".inline-editing-box").hover(function(){
                $(this).children(".inline-editing-edit").show();
                $(this).children(".inline-editing-delete").show();
            }, function(){
                $(this).children(".inline-editing-edit").hide();
                $(this).children(".inline-editing-delete").hide();
            });

        })
    </script>


@endsection
