@extends('layouts.app')

@section('title')
    مدیریت خطوط
@endsection


@section('styles')

    <!-- select2 css  -->
    <link rel="stylesheet" href="/assets/libs/css/select2.min.css">
    <link rel="stylesheet" href="/assets/libs/css/bootstrap-datepicker.min.css" />

    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/css/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/css/map/leaflet.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/css/map/mg.css')}}">
    <link href="{{asset('css/main-style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/css/panel2/bootstrap-select.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/libs/css/style.css')}}">


    <link href="/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <style>

        .multiSelectLine span.select2-selection.select2-selection--multiple,
        .select2-container .select2-selection--multiple{
            width: inherit !important;
            /* height: 40px; */
            height: 30px!important;
            overflow-y: scroll!important;;
            /*overflow-x: hidden;*/
        }
    </style>
@endsection



@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @include('layouts.info-box')
            <div class="row">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content pt-3">

                        <div class="topWidgets">
                            <div class="row">
                            </div>
                        </div>

                        <div class="ecommerce-widget">
                            <form class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">تنظیمات عمومی</h5>
                                        <div class="card-body">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">
                                                    <!-- <div class="col-12 text-right pt-1">
                                                        <svg class="" width="1.5rem" height="1.5rem" fill="black" id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><g><g><g><path d="m379.655 170.335c-5.522 0-10-4.478-10-10v-68.379c0-5.522 4.478-10 10-10s10 4.478 10 10v68.379c0 5.522-4.477 10-10 10z"/></g></g><g><g><circle cx="379.612" cy="59.778" r="10"/></g></g><g><path d="m484.648 105.057c0-57.929-47.119-105.057-105.037-105.057-23.973 0-46.095 8.074-63.793 21.646h-252.073c-20.067 0-36.393 16.325-36.393 36.393v363.773c0 20.067 16.326 36.394 36.393 36.394h31.731v17.4c0 20.067 16.326 36.394 36.393 36.394h261.461c20.067 0 36.393-16.326 36.393-36.394v-138.702c0-5.522-4.478-10-10-10s-10 4.478-10 10v138.702c0 9.039-7.354 16.394-16.393 16.394h-261.461c-9.039 0-16.393-7.354-16.393-16.394v-17.4h209.731c20.067 0 36.394-16.326 36.394-36.394v-213.244c5.854 1.016 11.871 1.546 18.011 1.546 10.461 0 20.57-1.538 30.112-4.399v40.778c0 5.522 4.478 10 10 10s10-4.478 10-10v-49.125c32.692-17.826 54.924-52.52 54.924-92.311zm-143.047 316.756c0 9.039-7.354 16.394-16.394 16.394h-261.462c-9.039 0-16.393-7.354-16.393-16.394v-363.774c0-9.039 7.354-16.393 16.393-16.393h232.171c-12.552 16.533-20.326 36.883-21.248 58.974h-170.291c-5.522 0-10 4.478-10 10v42.234c0 5.522 4.478 10 10 10h180.198c2.273 0 4.369-.759 6.049-2.037 11.946 19.004 29.806 33.931 50.977 42.179zm-67.026-301.193v22.234h-160.198v-22.234zm105.036 69.493c-46.889 0-85.036-38.156-85.036-85.057 0-46.9 38.147-85.057 85.036-85.057 46.89 0 85.037 38.156 85.037 85.057s-38.147 85.057-85.037 85.057z"/><g><g><path d="m419.72 301.52c-4.12 0-7.897-2.637-9.349-6.482-1.491-3.946-.27-8.586 3.009-11.255 3.285-2.673 8.014-2.994 11.617-.758 3.596 2.232 5.437 6.635 4.464 10.764-1.053 4.466-5.146 7.731-9.741 7.731z"/></g></g></g><g><g><g><g><path d="m284.575 217.633h-180.198c-5.522 0-10-4.477-10-10 0-5.522 4.478-10 10-10h180.198c5.522 0 10 4.478 10 10s-4.477 10-10 10z"/></g></g><g><g><path d="m284.575 265.063h-180.198c-5.522 0-10-4.478-10-10 0-5.523 4.478-10 10-10h180.198c5.522 0 10 4.477 10 10 0 5.522-4.477 10-10 10z"/></g></g><g><g><path d="m284.575 312.493h-180.198c-5.522 0-10-4.478-10-10s4.478-10 10-10h180.198c5.522 0 10 4.478 10 10 0 5.523-4.477 10-10 10z"/></g></g><g><g><path d="m284.575 359.923h-180.198c-5.522 0-10-4.478-10-10 0-5.523 4.478-10 10-10h180.198c5.522 0 10 4.477 10 10 0 5.522-4.477 10-10 10z"/></g></g></g></g></g></g></svg>
                                                        <span class="font-weight-bold pt-1">تنظیمات عمومی :</span>
                                                    </div> -->

                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            سامانه هوشمند ناوگان اتوبوسرانی شهرداری قم
                                                        </p>
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">    عنوان اصلی سامانه </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            شرکت توسعه ارتباطات هوشمند مبتکر شاهرود
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">   	نام شرکت	 </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            busavl.qom.ir
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">	آدرس صفحه اصلی</label>
                                                    </div>



{{--                                --------------------------------------------------------                    --}}
{{--                                --------------------------------------------------------                    --}}
{{--                                --------------------------------------------------------                    --}}



                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <input type="text" id="datepicker1" class="formField inline-editing-text pt-3">
                                                        <span class="inline-editing-edit">
                                                            <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>

{{--                                                        <div class="input-group input-daterange">--}}
{{--                                                            <input type="text" class="form-control" value="2012-04-05">--}}
{{--                                                            <div class="input-group-addon">to</div>--}}
{{--                                                            <input type="text" class="form-control" value="2012-04-19">--}}
{{--                                                        </div>--}}
                                                        <label for="" id="" class="outline-primary formLabel ">		تاریخ کپی رایت  </label>
                                                    </div>





{{--                                --------------------------------------------------------                    --}}
{{--                                --------------------------------------------------------                    --}}
{{--                                --------------------------------------------------------                    --}}


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            اتوبوسرانی, قم, سامانه, هوشمندسازی
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">			متا کلمات کلیدی	 </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            سامانه کنترل و مانیتورینگ اتوبوسرانی قم
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">متا توضیحات	 </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            no-replay@qom.ir
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            آدرس ایمیل اصلی
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            archive@qom.ir
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            آدرس ایمیل آرشیوی
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            9
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            تعداد ریکوردهای نمایشی
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            Asia/Tehran
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            ساعت محلی سامانه
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            blue_nile
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            قالب سامانه
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header"> تنظیمات پروتکل های ارتباطی</h5>
                                        <div class="card-body ">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            bus
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            نام کاربری درگاه Cas
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            1a72dad44b1a2de4b02f17aacaa4dd58
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            کلمه عبور درگاه Cas
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            https://account.qom.ir
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            آدرس هسته درگاه Cas
                                                        </label>
                                                    </div>


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            rjnxf
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            کلمه عبور درگاه سخت افزارها
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header"> تنظیمات پروتکل های ارتباطی</h5>
                                        <div class="card-body ">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">


                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            AIzaSyCXvBR_JnEpxRJuLoZ_-45k-ZSiIvN_L88
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            کد API گوگل
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            35.692238
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            عرض جغرافیایی پیش‌فرض
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            35.692238
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            طول جغرافیایی پیش‌فرض
                                                        </label>
                                                    </div>
                                                    <div class="formGroup col-12 col-sm-12 col-md-6 col-lg-4 p-1 mt-2 ml-auto mr-auto inline-editing-box">
                                                        <p type="text" id="carCodeInput1" class="formField inline-editing-text pt-3">
                                                            14
                                                        </p>
                                                        <span class="inline-editing-edit">
																	<a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																</span>
                                                        <i id="inline-editing-save-id" class="inline-editing-save fas fa-check"></i>
                                                        <label for="" class="outline-primary formLabel ">
                                                            بزرگنمایی پیش‌فرض
                                                        </label>
                                                    </div>






                                                </div>
                                            </div>
                                            <a href="" class="btn btnStyle  text-center mt-4 col-12 col-md-6 text-center d-block mr-auto ml-auto">
                                                ذخیره کلیه تنظیمات
                                            </a>
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

    <script src="{{asset('/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('/js/custom.min.js')}}"></script>
    <!--	<script src="js/dashboard/dashboard-1.js"></script>-->
    <script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/assets/libs/js/popper.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('/assets/libs/js/main-js.js')}}"></script>
    <script src="{{asset('/assets/libs/js/datatables.js')}}"></script>
    <script src="{{asset('/assets/libs/js/BsMultiSelect.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('/assets/libs/js/Map/leaflet.js')}}"></script>
    <script src="{{asset('/assets/libs/js/Map/mg.js')}}"></script>
    <script src="{{asset('/assets/libs/js/Map/fullscreen.min.js')}}"></script>

    <!-- select2 js  -->
    <script src="/assets/libs/js/select2.min.js"></script>

    <script src="/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    {{--    <script src="/js/plugins-init/sweetalert.init.js"></script>--}}


    <script src="/assets/libs/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/js/bootstrap-datepicker.fa.min.js"></script>



    <script>
        $(document).ready(function () {


            // $('.input-daterange input').each(function() {
            //     $(this).datepicker('clearDates');
            // });



            $("#datepicker1").datepicker({
                // changeMonth: true,
                changeYear: true,
                isRTL: true,
                // dateFormat: "yy/m/dd"
                dateFormat: "yy"
            });


            //
            // $('#data1').clockpicker({
            //     placement: 'bottom',
            //     align: 'center'
            // });
            // $('#data2').clockpicker({
            //     placement: 'bottom',
            //     align: 'center'
            // });


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
                $(this).sibiling('.inline-editing-text').removeAttr('contenteditable');
                $(this).sibiling('.inline-editing-edit').show();
            })
            $(document).on('hover','.inline-editing-box',function(){
                $(this).children(".inline-editing-edit").show();
            })



            $(".inline-editing-box").hover(function(){
                $(this).children(".inline-editing-edit").show();
            }, function(){
                $(this).children(".inline-editing-edit").hide();
            });


        })
    </script>

@endsection
