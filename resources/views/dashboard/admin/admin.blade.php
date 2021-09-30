@extends('layouts.app')

@section('title')
    ثبت کاربر جدید
@endsection


@section('styles')


    <link rel="stylesheet" href="/assets/libs/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="/assets/libs/css/bootstrap-datepicker.min.css"/>

    <link rel="stylesheet" href="/vendor/sweetalert2/dist/sweetalert2.min.css">


    <link rel="stylesheet" href="/assets/libs/css/fileinput.min.css">

@endsection


@section('content')





    <div class="content-body">
        <div class="container-fluid pt-2">
            <!-- row -->
            <div class="row">
                <div class="dashboard-ecommerce">
                    @include('layouts.info-box')
                    <div class="col-12">
                        <div class="card pt-2" >
                            <div class="card-header">
                                <h5 class="card-title text-primary">ایجاد کاربر جدید</h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" enctype="multipart/form-data" action="/admin/store"
                                      class="step-form-horizontal jvalidate" id="step-form-horizontal" novalidate>

                                    <input type="hidden" name="permission_ids" id="permission_ids">
                                    @csrf

                                    <div class="card col-12">
                                        <div class="card-header">
                                            <h6 class="card-title">وضعیت حساب</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12  p-0 m-0 justify-content-center">
                                                <div class="card-body">

                                                    <div class="container-fluid selectSecurityLevel ">
                                                        <div class="row text-center radio-toolbar">

                                                            <div class="col-sm col-md col-lg col-xs-12 d-inline-flex">
                                                                <input checked class="d-inline-flex" type="radio" id="radio11" name="status" value="1" @if( old('status') == '1' ) checked @endif>
                                                                <label class="" for="radio11">فعال</label>
                                                            </div>
                                                            <div class="col-sm col-md col-lg col-xs-12 d-inline-flex">
                                                                <input class="d-inline-flex" type="radio" id="radio12" name="status" value="0" @if( old('status')== '0' ) checked @endif>
                                                                <label for="radio12">غیرفعال</label>
                                                            </div>
                                                            <div class="col-sm col-md col-lg col-xs-12">
                                                                <input class="d-inline-flex" type="radio" id="radio13" name="status" value="3" @if( old('status')== '3' ) checked @endif>
                                                                <label for="radio13">مجوز موقت</label>
                                                            </div>
                                                            <div class="col-sm col-md col-lg col-xs-12">
                                                                <input class="d-inline-flex" type="radio" id="radio14" name="status" value="4" @if( old('status')== '4' ) checked @endif>
                                                                <label for="radio14">معلق</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card col-12">
                                        <div class="card-header">
                                            <h6 class="card-title">اطلاعات فردی</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12  p-0 m-0 justify-content-center">
                                                <div class="card-body">
                                                    <div class="container-fluid d-p-form">
                                                        <div class="row">
                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="text" id="100" class="formField" placeholder=" " name="first_name" required
                                                                       @if(isset($user))
                                                                       value="{{$user->first_name ?? '---'}}"
                                                                       @else
                                                                       value={{old('first_name')}}
                                                                    @endif
                                                                >
                                                                <div class="invalid-feedback">
                                                                    این فیلد اجباری می باشد
                                                                </div>
                                                                <label for="100" class="formLabel">نام</label>
                                                            </div>

                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="text" id="101" class="formField" placeholder=" " name="last_name" required
                                                                       @if(isset($user))
                                                                       value="{{$user->last_name ?? '---'}}"
                                                                       @else
                                                                       value={{old('last_name')}}
                                                                    @endif
                                                                >
                                                                <label for="101" class="formLabel">نام خانوادگی</label>
                                                            </div>
                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="number" id="102" class="formField" placeholder=" " name="national_id" pattern="^[0-9]{10}$"
                                                                       @if(isset($user))
                                                                       value="{{$user->national_id ?? '---'}}"
                                                                       @else
                                                                       value={{old('national_id')}}
                                                                    @endif
                                                                >
                                                                <label for="102" class="formLabel">کد ملی</label>
                                                            </div>

                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="number" id="103" class="formField" placeholder=" " name="mobile" pattern="^(\+98|0)?9\d{9}$"
                                                                       @if(isset($user))
                                                                       value="{{$user->mobile ?? '---'}}"
                                                                       @else
                                                                       value="{{old('mobile')}}"
                                                                    @endif
                                                                >
                                                                <label for="103" class="formLabel">شماره همراه</label>
                                                            </div>
                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="email" id="104" class="formField" placeholder=" " name="email" pattern="^\S+@\S+\.\S+$"
                                                                       @if(isset($user))
                                                                       value="{{$user->email ?? '---'}}"
                                                                       @else
                                                                       value="{{old('email')}}"
                                                                    @endif
                                                                >
                                                                <label for="104" class="formLabel">پست الکترونیک</label>
                                                            </div>
                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="password" id="105" class="formField" placeholder=" " name="password" pattern="(?=.*[0-9]).{8,}"
                                                                       value="{{old('password')}}">
                                                                <label for="105" class="formLabel">رمز عبور</label>
                                                                <div class="invalid-feedback">
                                                                    رمز عبور حداقل 8 کارکتر و ترکیبی از حروف و عدد می باشد.
                                                                </div>
                                                            </div>
                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="password" id="106" class="formField" placeholder=" " name="password_confirmation" pattern="(?=.*[0-9]).{8,}"
                                                                >
                                                                <label for="106" class="formLabel">تکرار رمز عبور</label>
                                                                <div class="invalid-feedback">
                                                                    رمز عبور حداقل 8 کارکتر و ترکیبی از حروف و عدد می باشد.
                                                                </div>
                                                            </div>

                                                            <div class="col-12 formGroup hiddenButtons">
                                                                <hr>
                                                                <label for="dropZoneInput" class="d-inline mt-3">بارگزاری عکس پرسنلی:</label>
                                                                <div class="formGroup col-6 m-auto p-1 mt-3">
                                                                    <input id="dropZoneInput" name="avatar" type="file" class="file" data-browse-on-zone-click="true">
                                                                </div>
                                                            </div>

                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                <input type="text" id="datepicker4"  class="formField" placeholder=" " name="birth_data"
                                                                       autocomplete="off"
                                                                       @if(isset($user))
                                                                       value="{{$user->birth_data ?? '---'}}"
                                                                       @else
                                                                       value="{{old('birth_data')}}"
                                                                    @endif
                                                                >
                                                                <label for="" class="formLabel">تاریخ تولد </label>
                                                            </div>
                                                            {{--                                                        <div class="formGroup col-6 p-1 mt-2 ml-auto mr-auto">--}}
                                                            {{--                                                            <label class="tr-0 formLabel no-style2-label-top" for="datepicker4"> تاریخ بیمه خودرو (از):</label>--}}
                                                            {{--                                                            <div class="controls">--}}
                                                            {{--                                                                <input class="outline-primary formField" id="datepicker4" type="text" required>--}}
                                                            {{--                                                            </div>--}}
                                                            {{--                                                        </div>--}}


                                                            <div class="formGroup col-6 pr-1 pl-1">
                                                                <input type="text" id="aa4" class="formField" placeholder="" name="address"
                                                                       value="{{old('address')}}">
                                                                <label for="aa4" class="formLabel">آدرس منزل</label>
                                                            </div>

                                                            <div class="formGroup col-6 pr-1 pl-1">
                                                                <input type="text" id="aa3" class="formField" placeholder="" name="phone"
                                                                       value="{{old('phone')}}">
                                                                <label for="aa3" class="formLabel">تلفن منزل</label>
                                                            </div>

                                                            <div class="formGroup col-6 pr-1 pl-1">
                                                                <input type="text" id="aa2" class="formField" placeholder="" name="description"
                                                                       value="{{old('description')}}">
                                                                <label for="aa2" class="formLabel">توضیحات </label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btnStyle w-50 mt-4">
                                            @if(isset($user))
                                                ویرایش
                                            @else
                                                ایجاد حساب جدید
                                            @endif
                                        </button>
                                    </div>
                                </form>
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


    <!-- Form validate init -->
    <script src="/js/plugins-init/jquery.validate-init.js"></script>
    <script src="/js/plugins-init/jquery-steps-init.js"></script>
    <script src="/assets/libs/js/dropify.js"></script>




    <script src="/assets/libs/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/js/bootstrap-datepicker.fa.min.js"></script>

    <script src="/assets/libs/js/fileinput.min.js"></script>

    <!--    SELECT MULTI-->
    <script src="/assets/libs/js/select2.min.js"></script>
    <script src="/js/jvalidate.js"></script>





    <script>


        $(document).ready(function(){
            var workAddresse = '{{$user->extra_information->work_address ?? ""}}' ;
            var workTell = '{{$user->extra_information->work_Tell ?? ""}}' ;

            $('.js-example-basic-multiple').select2();

            $("#datepicker4").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy-m-dd"
            });




            $('.collapse-custom').hide();



            $(document).on('click','.role-radio',function (){

                let role_id = $(this).val();
                // console.log(role_id);
                // /role/permissions


                $.ajax({
                    type: 'get' ,
                    url: '/api/role/permissions' ,
                    dataType: 'json' ,
                    data:{ "role_id": role_id},
                    success: function (data){

                        console.log(data);
                        if( data.status == "ok" ) {

                            $('.checkbox-permission').attr('checked',false);
                            $('.checkboxDisplay').removeAttr('checked');
                            $('.btn-click-toggle').removeClass('btn-primary');
                            $('.div-permission').removeClass('d-block').addClass('d-none') ;
                            $('.button-permission').removeClass('btn-primary');
                            let new_permissions = '';
                            $.each(data.permissions, function (key, value) {
                                let permission_id = value.permission_id ;
                                let check_box_name = '#checkbox-permission'+permission_id ;
                                let check_box = $(check_box_name) ;
                                let div_permission_name = '#div-permission'+permission_id ;
                                let div_permission = $(div_permission_name) ;
                                let permission_button_name = '#button-permission'+permission_id ;
                                let permission_button = $(permission_button_name) ;


                                console.log(check_box);
                                check_box.attr('checked', true) ;
                                div_permission.removeClass('d-none').addClass('d-block') ;
                                permission_button.addClass('btn-primary');

                                new_permissions += permission_id + ',';

                            });
                            $('#permission_ids').val(new_permissions);
                        }
                    },
                    error: function (data) {
                        console.log("error") ;
                    }
                }) ;
            });


            $("#dropZoneInput").fileinput({
                theme: "fas",
                uploadUrl: "/assets/libs/js/theme.min.js",
                hideThumbnailContent: true, // hide image, pdf, text or other content in the thumbnail preview
                showUpload: false,
                showBrowse: false,
                showCancel: false,
                previewFileType: 'any',
                rtl: true,
                dropZoneEnabled: true,
                removeFromPreviewOnError: true,
                overwriteInitial: true,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
                allowedPreviewTypes: ['image'],
                maxFileSize: 300, // kb
                maxFileCount: 1, //max file upload
                fileActionSettings: {
                    showRemove: true,
                    showUpload: true,
                    showZoom: true,
                    showDrag: true,},
            });

            $('#aa6').dropify();



            // $('.btn-click-toggle').click(function () {
            $(document).on('click','.btn-click-toggle',function (){
                let permission = $(this);
                let id = permission.attr('data-id');
                $('.btn-click-toggle').siblings('div').css('display', 'none');
                // $(this).children('input').attr('checked','checked')
                let check = $(this).children('input').val();
                let permission_ids = $('#permission_ids').val();
                if( permission_ids != '' )
                    permission_ids = permission_ids.split(',');
                else
                    permission_ids = [];
                let length = permission_ids.length;
                let new_permissions = '';
                if ($(this).children('input').is(':checked')) {

                    $(this).children('input').attr("checked", false);

                    var i = 0;
                    for( i = 0; i < length; i++ ){
                        if( check == permission_ids[i] )
                            continue;
                        else{
                            if( permission_ids[i] != '' )
                                new_permissions += permission_ids[i] + ',';

                        }
                    }
                    $('#permission_ids').val(new_permissions);
                    $(this).removeClass('btn-primary');


                    $(this).siblings('div').addClass('d-none');
                    $(this).siblings('div').removeClass('d-block');

                } else {
                    $(this).children('input').attr("checked", true);
                    $(this).addClass('btn-primary');
                    var i = 0;
                    for( i = 0; i < length; i++ ){
                        new_permissions += permission_ids[i] + ',';
                    }
                    new_permissions += check;
                    $('#permission_ids').val(new_permissions);
                    $(this).siblings('div').addClass('d-block');
                    $(this).siblings('div').removeClass('d-none');
                }

                $.ajax({
                    type: 'get' ,
                    url: '/api/permission/sub' ,
                    dataType: 'json' ,
                    data:{ "permission_id": id},
                    success: function (data){
                        let array = data.data;
                        $('#'+id+"_").empty();
                        for( let i = 0; i < array.length; i++ ){
                            var newOption = new Option(array[i].title, array[i].id, false, false);
                            $('#'+id+"_").append(newOption).trigger('change');
                        }

                    },

                    error: function (data) {
                        console.log("error") ;
                    }
                }) ;

                // $(this).siblings('div').toggleClass('d-block d-none');
            })
        })

    </script>


@endsection
