@extends('layouts.app')

@section('title')
    ویرایش اطلاعات کاربری
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

                            <form method="POST" enctype="multipart/form-data" action="/admin/profile/update"
                                  class="step-form-horizontal" id="step-form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">اطلاعات شخصی</h5>
                                        <div class="card-body">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">
                                                    <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                        <input type="text" id="2004" class="formField" name="first_name" placeholder=" "
                                                               value="{{   $user->first_name ?? '' }} ">
                                                        <label for="2004" class="formLabel">نام	</label>
                                                    </div>
                                                    <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                        <input type="text" id="2004" class="formField" name="last_name" placeholder=" "
                                                               value="{{   $user->last_name ?? '' }}">
                                                        <label for="2005" class="formLabel">نام خانوادگی</label>
                                                    </div>

                                                    <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                        <div class="container-fluid p-1">
                                                            <div class="row text-center radio-toolbar">
                                                                <div class="col-4 text-right pt-1">
                                                                    <span class="font-weight-bold pt-1">جنسیت:</span>
                                                                </div>
                                                                <div class="col-4 d-inline-flex mb-1 mt-1">
                                                                    <input class="d-inline-flex" type="radio" @if( $user->gender == 2 ) checked @endif id="radio21" name="gender" value="2" data-toggle="collapse" href="#collapse1"  aria-expanded="true" aria-controls="collapseOne">
                                                                    <label for="radio21" style="width: 160px">
                                                                        زن
                                                                    </label>
                                                                </div>
                                                                <div class="col-4 d-inline-flex mb-1 mt-1">
                                                                    <input class="d-inline-flex" type="radio" @if( $user->gender == 1 ) checked @endif id="radio22" name="gender" value="1">
                                                                    <label for="radio22" style="width: 160px">
                                                                        مرد
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3 text-center">
                                                        <div class="container-fluid shadow rounded-sm">
                                                            <div class="d-block">
                                                                <h5>انتخاب تصویر کاربری</h5>
                                                            </div>
                                                            <div class=" col-12 pr-1 pl-1 mainDropDefaultIcon">
                                                                <input type="file" id="avatar"
{{--                                                                       data-default-file="{{asset("images/default_images/station2.png")}}"--}}
                                                                       data-default-file="{{   $user->avatar ?? 'assets/images/default_avatar.png"' }}"
                                                                       onerror="this.onerror=null;this.attr('data-default-file','/assets/images/default_avatar.png');"
                                                                       name="avatar" class="formField">
                                                                <label for="defaultStationReturnIcon" class="formLabel"></label>
                                                            </div>
                                                        </div>
                                                    </div>



                                                        <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                            <input type="text" id="2007" class="formField" name="national_id" placeholder=""
                                                                   value="{{   $user->national_id ?? '' }}" disabled>
                                                            <label for="2007" class="formLabel">کد ملی	 </label>
                                                        </div>
                                                        <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                            <input type="text" id="2008" class="formField" name="mobile" placeholder=""
                                                                   value="{{   $user->mobile ?? '' }}" >
                                                            <label for="2008" class="formLabel">تلفن همراه	</label>
                                                        </div>
                                                        <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                            <input type="text" id="2009" class="formField" name="email" placeholder=""
                                                                   value="{{   $user->email ?? '' }}" >
                                                            <label for="2009" class="formLabel">پست الکترونیک	</label>
                                                        </div>
                                                        <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                            <input type="text" id="2010" class="formField" placeholder=""
                                                                   value="{{ $user->active == 1 ? 'فعال' : 'غیرفعال' }}" disabled>
                                                            <label for="2010" class="formLabel">وضعیت حساب	</label>
                                                        </div>










                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">اطلاعات حساب کاربری</h5>
                                        <div class="card-body ">
                                            <div class="container-fluid p-1">
                                                <div class="row text-center radio-toolbar">

                                                    <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                        <input type="text" id="2014" class="formField" placeholder=" "
                                                               value="{{   gregorian_to_jalali_pro($user->created_at, true)   }}"
                                                               disabled>
                                                        <label for="2014" class="formLabel">تاریخ عضویت	 </label>
                                                    </div>

                                                    <div class="formGroup col-12 col-md-6 p-1 mt-2">
                                                        <input type="text" id="2015" class="formField" placeholder=" "
                                                               value="{{   gregorian_to_jalali_pro($user->last_login, true)   }}"
                                                               disabled>
                                                        <label for="2015" class="formLabel"> آخرین فعالیت</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body ">

                                            <button type="submit" class="btn btnStyle  text-center mt-4 col-12 col-md-6 text-center d-block mr-auto ml-auto">
                                                ذخیره تغییرات
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

        $('#avatar').dropify();


        $(document).ready(function () {


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
                $(this).sibiling('.inline-editing-text').removeAttr('contenteditable');
                $(this).sibiling('.inline-editing-edit').show();
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
