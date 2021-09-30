@extends('layouts.app')

@section('title')
    مدیریت آیکن ها
@endsection


@section('styles')

    <link rel="stylesheet" href="/assets/libs/css/dropify.css">

    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css"> -->
    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link rel="stylesheet" href="/css/main-style.css">
    <link rel="stylesheet" href="/css/main-style.css">
    <!-- <link rel="stylesheet" href="assets/libs/css/panel2/chartist.min.css"> -->
    <link rel="stylesheet" href="/assets/libs/css/style.css">

    <style>
        .pwt-btn-calendar {
            display: none !important ;
        }
    </style>
@endsection



@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content">

                        <div class="ecommerce-widget">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">
                                            انتخاب آیکون های پیش فرض برای سیستم
                                        </h5>
                                        <div class="card-body ">

                                            <form method="POST" enctype="multipart/form-data" action="/setting/icon/update"
                                                  class="step-form-horizontal jvalidate" id="step-form-horizontal" novalidate>
                                                @csrf

                                                <div class="container-fluid p-1">
                                                    <div class="row text-center radio-toolbar p-1">
                                                        <div class="col-12 pb-3 text-right pt-1">
                                                            <span class="font-weight-bold pt-1">
                                                                لطفاآیکون های مورد نظر خود را آپلود نمائید
                                                            </span>
                                                        </div>
                                                        <div class="container-fluid p-2">
                                                            <div class="row text-center p-1">
                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                                                                    <div class="container-fluid shadow rounded-sm">
                                                                        <div class="d-block">
                                                                            <h5>انتخاب آیکون اتوبوس</h5>
                                                                        </div>
                                                                        <div class=" col-12 pr-1 pl-1 mainDropDefaultIcon">
                                                                            <input type="file" data-default-file="{{asset("images/default_images/bus.png")}}" id="defaultBusIcon" name="bus_icon" class="formField " placeholder="">
                                                                            <label for="defaultBusIcon" class="formLabel"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                                                                    <div class="container-fluid shadow rounded-sm">
                                                                        <div class="d-block">
                                                                            <h5>انتخاب آیکون ایستگاه(پیش فرض و رفت)</h5>
                                                                        </div>
                                                                        <div class=" col-12 pr-1 pl-1 mainDropDefaultIcon">
                                                                            <input type="file" id="defaultStationIcon" data-default-file="{{asset("images/default_images/station.png")}}" name="station_icon" class="formField " placeholder="/images/default_images/station.png">
                                                                            <label for="defaultStationIcon" class="formLabel"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                                                                    <div class="container-fluid shadow rounded-sm">
                                                                        <div class="d-block">
                                                                            <h5>انتخاب آیکون ایستگاه (برگشت)</h5>
                                                                        </div>
                                                                        <div class=" col-12 pr-1 pl-1 mainDropDefaultIcon">
                                                                            <input type="file" id="defaultStationReturnIcon" data-default-file="{{asset("images/default_images/station2.png")}}" name="station_icon2" class="formField " placeholder="/images/default_images/station.png">
                                                                            <label for="defaultStationReturnIcon" class="formLabel"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-3 text-center">
                                                                    <div class="container-fluid shadow rounded-sm">
                                                                        <div class="d-block">
                                                                            <h5>انتخاب آیکون خودرو شخصی</h5>
                                                                        </div>
                                                                        <div class=" col-12 pr-1 pl-1 mainDropDefaultIcon">
                                                                            <input type="file" id="defaultTerminalIcon" data-default-file="{{asset("images/default_images/car.png")}}" name="car_icon" class="formField " placeholder="">
                                                                            <label for="defaultTerminalIcon" class="formLabel"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>





                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-12 text-center mt-1 mb-1">
                                                                    <button type="submit" class="btn btnStyle w-50 text-center m-auto mt-4">
                                                                        ذخیره تنظیمات
                                                                    </button>
                                                                </div>
                                                            </div>
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
    <!-- <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script> -->

    <script src="/assets/libs/js/dropify.js"></script>

    <script>
        $(document).ready(function () {


            $(document).on('change','.inline-editing-text',function (){
                console.log('change');
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
                $('.shiftCont').append('' +
                    '<div class="row height50">' +
                    '<div class="d-block col-1 pt-4">شیفت 1:</div>' +
                    '<div class="formGroup col-3 p-1 mt-2 ml-auto mr-auto input-group clockpicker">' +
                    '<label class="tr-0 formLabel" for="">از ساعت</label>' +
                    '<input type="text" class="outline-primary formField form-control" value="">' +
                    '</div><div class="formGroup col-3 p-1 mt-2 ml-auto mr-auto input-group clockpicker"><label class="tr-0 formLabel" for="">تا ساعت</label><input type="text" class="outline-primary formField form-control" value=""></div><div class="formGroup col-4 p-1 mt-2 ml-auto mr-auto"><label class="tr-0 formLabel no-style2-label-top pointer-events-none-" for="carCodeInput26">نام راننده</label><select class="outline-primary formField webkit-appearance-none- pl-2" id="carCodeInput26" type="text" required dir="ltr"><option disabled selected value="" label=""></option><option label="">1</option><option label="">2</option><option label="">3</option><option label="">4</option></select></div><div class="d-block col-1 pt-4"><a href="javascript: void(0);" class="btn shadow btn-xs sharp icon-trash"><i class="fas fa-trash-alt" onclick="removeRow();"></i></a></div></div>');
            });






            // $(".example1").pDatepicker({
            // 	initialValueType: "persian",
            // 	format: "YYYY/MM/DD",
            // 	onSelect: "year"
            // }) ;

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







            //start INIT DROPIFY
            $('#defaultBusIcon').dropify();
            $('#defaultStationIcon').dropify();
            $('#defaultStationReturnIcon').dropify();
            $('#defaultTerminalIcon').dropify();
            $('#defaultMarkerIcon').dropify();
            $('#defaultPersonalCarIcon').dropify();
            $('#reserve').dropify();
            //end INIT DROPIFY


            $('.dt-buttons.btn-group.flex-wrap button.btn.buttons-html5 , .buttons-print').removeClass('btn-secondary')
            $('.dt-buttons.btn-group.flex-wrap button.btn.buttons-html5 , .buttons-print').addClass('btn-primary').css({'border-radius':'5px','margin-left':'10px'});


        })
    </script>


@endsection
