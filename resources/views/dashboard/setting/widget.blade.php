@extends('layouts.app')

@section('title')
    مدیریت منوی دسترسی سریع
@endsection


@section('styles')
    <link rel="stylesheet" href="/assets/libs/css/bootstrap-datepicker.min.css"/>

    <link rel="stylesheet" href="/assets/libs/css/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css"> -->
    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link rel="stylesheet" href="/css/main-style.css">
    <!-- <link rel="stylesheet" href="assets/libs/css/panel2/chartist.min.css"> -->
    <link rel="stylesheet" href="/assets/libs/css/style.css">

    <link href="/vendor/sweetalert2/dist/sweetalert.css" rel="stylesheet">

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
                @include('layouts.info-box')
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content">
                        <div class="ecommerce-widget">
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="container-fluid">
                                            <h5 class="card-header row">
												<span class="col-12 col-md-3 m-0 pt-1 pl-0 pr-0 pb-1">
													تنظیمات منوی دسترسی سریع

{{--                                                    @foreach($widgetLinks as $key=> $widgetLink)--}}
{{--                                                        {{   $key    }}--}}
{{--                                                    @endforeach--}}
												</span>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <form method="POST" enctype="multipart/form-data" action="/config/widget/update"
                                                      class="step-form-horizontal jvalidate" id="step-form-horizontal" novalidate>
                                                    @csrf
                                                    <input type="hidden" name="widget_status" id="widget-status" value="{!! $widgetStatusStr !!}">
                                                <table class="table tableOptions first uniqe-class-tabel-2 tableFontSmall" id="table-id2">
                                                    <thead>
                                                        <tr>
    {{--                                                        <th>آیتم ها</th>--}}
                                                            <th>فعال </th>
                                                            <th>عنوان </th>
                                                            <th>لینک </th>
                                                            <th>فایل </th>
                                                            <th>رنگ زمینه</th>
                                                            <th>عملیات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach($widgetLinks as $key => $widgetLink)
                                                            <tr class="tbody-tr">
{{--                                                                <td>--}}
{{--                                                                    {{   $key+1    }}--}}
{{--                                                                </td>--}}
                                                                <input type="hidden" name="ids[]" value="{!! $widgetLink->id !!}">
                                                                <td>
                                                                    <label class="switch">
                                                                        <input type="checkbox" name="active[]" class="widgetLinkCheckBox"
                                                                            @if($widgetLink->active == 1)
                                                                                   checked
                                                                                   value="1"
                                                                               @else
                                                                                   value="0"
                                                                            @endif>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" placeholder="عنوان" name="title[]" value="{{$widgetLink->title ?? ''}}">
                                                                </td>
                                                                <td>
                                                                    <input type="text" placeholder="لینک" name="link_url[]" value="{{$widgetLink->link_url ?? ''}}">
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="icons[]" value="{{ '/' .$widgetLink->icon ?? ''}}" placeholder="{{$widgetLink->icon ?? ''}}" multiple>
                                                                </td>
                                                                <td>
                                                                    <input id="colorForLineNew2" value="{{$widgetLink->background_color ?? '#ff6600'}}" name="background_color[]" style="display: inline;border-radius: 100%;position: relative;margin: 0;width: 30px;height: 30px;" type="color" >
                                                                </td>
                                                                <td>
{{--                                                                        <a href="#" class="btn shadow btn-xs sharp mr-1 icon-pencil">--}}
{{--                                                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                                                        </a>--}}
                                                                    <button  class="btn shadow btn-xs sharp icon-trash sweetalert sweet-confirm">
                                                                        <i class="fas fa-trash-alt sweet-confirm"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                        @endforeach


                                                        <tr>
                                                            <td class="append-for-rows">
                                                                <div class="row">
                                                                    <div class="d-block col-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-12 m-2"></div>
                                                            <div class="col-12 text-center">

                                                                <button type="submit"  class="btn btnStyle w-50 text-center m-auto mt-4">
                                                                    ثبت
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

    <script src="/vendor/sweetalert2/dist/sweetalert.min.js"></script>
    <script src="/vendor/sweetalert2/dist/jquery.sweet-alert.custom.js"></script>


    <script>


        function makeValuesStr(){
            var values = $("input[name='active[]']").map(function(){
                return $(this).val() ;
            }).get() ;
            var valuesStr = values.join(',') ;
            $('#widget-status').val(valuesStr) ;
        }

        $(document).ready(function () {

            $(document).on('change' ,'.widgetLinkCheckBox',function(){
                if ($(this).val() == 1){
                    $(this).val('0') ;
                }else {
                    $(this).val('1') ;
                }


                var values = $("input[name='active[]']").map(function(){
                    return $(this).val() ;
                }).get() ;

                var valuesStr = values.join(',') ;


                $('#widget-status').val(valuesStr) ;
                // console.log(valuesStr);
            });


            $(document).on('click tap' ,'.append-for-rows',function(){

                let trCounts = $('.tbody-tr').length + 1 ;

                $(this).parent().parent().append(
                `
                <tr class="tbody-tr">

                    <td>
                        <label class="switch">
                            <input type="checkbox" name="active[]" value="1" >
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <input type="text" placeholder="عنوان" name="title[]" value="" required>
                    </td>
                    <td>
                        <input type="text" placeholder="لینک" name="link_url[]" value="" required>
                    </td>
                    <td>
                        <input type="file" name="icons[]" multiple required>
                    </td>

                    <td>
                        <input id="colorForLineNew2" value="#ff6600" name="background_color[]" style="display: inline;border-radius: 100%;position: relative;margin: 0;width: 30px;height: 30px;" type="color" >
                    </td>
                    <td>

                        <button  class="btn shadow btn-xs sharp icon-trash sweetalert sweet-confirm">
                            <i class="fas fa-trash-alt sweet-confirm"></i>
                        </button>
                    </td>
                </tr>
                `

                )
                $(this).parent().remove()
                $('table tbody').append(
                    `
                    <tr>
                        <td class="append-for-rows">
                            <div class="row">
                                <div class="d-block col-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    `
                )
            });




            $(document).on('change','.inline-editing-text',function (){
                console.log('change');
            });



            $(function removeRow(){
                $(document).on('click','.icon-trash',function(){
                    event.preventDefault();


                    let this_ = $(this);

                    swal({
                        title: "مطمئنید؟",
                        text: "قادر به بازگرداندن نیست!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "بله، حذف شود!",
                        cancelButtonText: "لغو",
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        if (!isConfirm) return;
                        $(this_).parents('.tbody-tr').remove();
                        makeValuesStr();
                    }) ;


                }) ;
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

        })
    </script>


@endsection
