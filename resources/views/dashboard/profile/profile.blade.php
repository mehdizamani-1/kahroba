@extends('layouts.app')

@section('title')
    @if(isset($role))
        ویرایش سطح دسترسی
    @else
        ثبت سطح دسترسی جدید
    @endif

@endsection


@section('styles')

{{--    <link rel="stylesheet" href="/assets/libs/css/kamadatepicker.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/dropify.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/charts/chartist-bundle/chartist.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/charts/morris-bundle/morris.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/datatables.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/Map/leaflet.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/Map/mg.css">--}}
{{--    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">--}}

{{--    <link rel="stylesheet" href="/css/main-style.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/panel2/chartist.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/panel2/bootstrap-select.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/css/style.css">--}}



    <link rel="stylesheet" href="/vendor/jquery-steps/css/jquery.steps.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/libs/css/datatables.css">
    <link rel="stylesheet" href="/assets/libs/css/BsMultiSelect.min.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/libs/css/dropify.css">
    <link rel="stylesheet" href="/css/main-style.css">
    <link rel="stylesheet" href="/assets/libs/css/style.css">


    <style>
        .step-form-horizontal .wizard .steps li.current a,
        .step-form-horizontal .wizard .steps li.disabled a {
            color: black;
        }

        .step-form-horizontal .wizard .steps li.current a:hover,
        .step-form-horizontal .wizard .steps li.current a:active,
        .step-form-horizontal .wizard .steps li.disabled a:hover,
        .step-form-horizontal .wizard .steps li.disabled a:active{
            color: var(--newcolor);
        }

        label.error{
            color:red;
        }
    </style>

@endsection



@section('content')

    <div class="content-body">
        <div class="container-fluid pt-2">
            @include('layouts.includes.info-box')
            <!-- row -->
            <div class="row">
                <div class="dashboard-ecommerce">
                    <div class="col-12">
                        <div class="card pt-2" >
                            <div class="card-header">
                                <h5 class="card-title text-primary">
                                    @if(isset($role))
                                        ویرایش سطح کاربری
                                    @else
                                        ایجاد سطح کاربری جدید
                                    @endif

                                </h5>
                            </div>
                            <div class="card-body">
                                @if(isset($role))
                                    <form method="POST" id="form_validated" enctype="multipart/form-data" action="{{'/role/update/'.$role->id}}"
                                          class="step-form-horizontal jvalidate" id="step-form-horizontal" novalidate>
                                    @method('PUT')
                                @else
                                    <form method="POST" id="form_validated" enctype="multipart/form-data" action="/role/store"
                                          class="step-form-horizontal jvalidate" id="step-form-horizontal" novalidate>
                                @endif
                                    @csrf

                                <h4>ثبت اطلاعات</h4>
                                <section>
                                    <div class="row">
                                        <div class="dashboard-ecommerce">
                                            <div class="container p-0 dashboard-content">
                                                <div class="dashboard-ecommerce">
                                                    <div>
                                                        <div class="formGroup col-12 col-md-4 p-1 mt-2">
                                                            <input type="text" id="title" class="formField text-right" dir="rtl" placeholder="" name="title"
                                                                 @if(isset($role))
                                                                    value="{{ $role->title ?? '----' }}"
                                                                 @else
                                                                    value="{{ old('title')  }}"
                                                                @endif
                                                            " required="required">
                                                            <label for="2" class="formLabel">  نام سطح کاربری *</label>
                                                            <div class="invalid-feedback">
                                                                این فیلد اجباری است
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="col-12 mb-3 text-center">
                                                            <h3 class="text-primary ">اطلاعات فرم زیر را تکمیل نمایید.</h3>
                                                        </div>
                                                        <hr class="mt-0 mb-1">

                                                        <div id="main" class="main">
                                                            <div class="container m-0 p-0">
                                                                <div class="accordion" id="faq">
                                                                    <div class="card">
                                                                        <div class="card-header" id="faqhead1">
                                                                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                                                                               aria-expanded="true" aria-controls="faq1">سطح دسترسی</a>
                                                                        </div>
                                                                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                                                            <div class="card-body">
                                                                                <div class="container p-0 m-0 justify-content-center">
                                                                                    <div class="row">

                                                                                        @foreach($permissions as $permission)
                                                                                            <div class="col-xs-12 col-3 mt-1 mb-1">
                                                                                                <div class="btn-click-toggle btn btn-rounded w-100 text-right
                                                                                                @if(isset($rolePermissions))
                                                                                                    @foreach($rolePermissions as $rolePermission)
                                                                                                        @if($permission->id == $rolePermission->permission_id)
                                                                                                        btn-primary
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                                ">
                                                                                                    <span class="btn-icon-left text-info ">
                                                                                                        <i class="fas fa-plus color-info"></i>
                                                                                                    </span>
                                                                                                    {{   $permission->title ?? '---'    }}
                                                                                                    <input class="checkboxDisplay" id="{{'checkbox-'.$permission->id}}"
                                                                                                           name="role_id[]" type="checkbox" value="{{$permission->id}}"
                                                                                                       @if(isset($rolePermissions))
                                                                                                           @foreach($rolePermissions as $rolePermission)
                                                                                                               @if($permission->id == $rolePermission->permission_id)
                                                                                                                   checked
                                                                                                               @endif
                                                                                                           @endforeach
                                                                                                       @endif
                                                                                                    >
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(isset($role))
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btnStyle mt-4">
                                                                    ویرایش سطح کاربری
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btnStyle mt-4">
                                                                    ایجاد سطح کاربری جدید
                                                                </button>
                                                            </div>
                                                        @endif

                                                    </div>

                                                    <div class="ecommerce-widget">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/libs/js/popper.min.js"></script>
    <script src="/vendor/global/global.min.js"></script>

    <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/deznav-init.js"></script>
    <!-- Apex Chart -->
    <script src="/vendor/apexchart/apexchart.js"></script>
    <script src="/vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
{{--    <script src="/js/plugins-init/jquery.validate-init.js"></script>--}}
    <script src="/js/plugins-init/jquery-steps-init.js"></script>
    <script src="/assets/libs/js/dropify.js"></script>
    <script src="/assets/libs/js/BsMultiSelect.min.js"></script>
    <script src="/js/jvalidate.js"></script>
{{--    <script src="/js/validate.js"></script>--}}
{{--    <script>--}}
{{--        // $.validator.setDefaults({--}}
{{--        //     submitHandler: function() {--}}
{{--        //         alert("submitted!");--}}
{{--        //     }--}}
{{--        // });--}}

{{--        $(document).ready(function() {--}}
{{--            // validate the comment form when it is submitted--}}
{{--            // $("#form_validated").validate();--}}

{{--            // validate signup form on keyup and submit--}}
{{--            $("#form_validated").validate({--}}
{{--                // rules: {--}}
{{--                //     // title: "required",--}}
{{--                //     title: {--}}
{{--                //         required: true,--}}
{{--                //         minlength: 2 ,--}}
{{--                //         number: true ,--}}
{{--                //         pattern:"^(\+98|0)?9\d{9}$"--}}
{{--                //     },--}}
{{--                //     // password: {--}}
{{--                //     //     required: true,--}}
{{--                //     //     minlength: 5--}}
{{--                //     // },--}}
{{--                //     // confirm_password: {--}}
{{--                //     //     required: true,--}}
{{--                //     //     minlength: 5,--}}
{{--                //     //     equalTo: "#password"--}}
{{--                //     // },--}}
{{--                //     // email: {--}}
{{--                //     //     required: true,--}}
{{--                //     //     email: true--}}
{{--                //     // },--}}
{{--                //     // topic: {--}}
{{--                //     //     required: "#newsletter:checked",--}}
{{--                //     //     minlength: 2--}}
{{--                //     // },--}}
{{--                // },--}}
{{--                messages: {--}}
{{--                    title: "تایتل سطح را وارد نمایید",--}}
{{--                    // lastname: "Please enter your lastname",--}}
{{--                    // username: {--}}
{{--                    //     required: "Please enter a username",--}}
{{--                    //     minlength: "Your username must consist of at least 2 characters"--}}
{{--                    // },--}}
{{--                    // password: {--}}
{{--                    //     required: "Please provide a password",--}}
{{--                    //     minlength: "Your password must be at least 5 characters long"--}}
{{--                    // },--}}
{{--                    // confirm_password: {--}}
{{--                    //     required: "Please provide a password",--}}
{{--                    //     minlength: "Your password must be at least 5 characters long",--}}
{{--                    //     equalTo: "Please enter the same password as above"--}}
{{--                    // },--}}
{{--                    // email: "Please enter a valid email address",--}}
{{--                    // agree: "Please accept our policy",--}}
{{--                    // topic: "Please select at least 2 topics"--}}
{{--                }--}}
{{--            });--}}

{{--            // propose username by combining first- and lastname--}}
{{--            $("#username").focus(function() {--}}
{{--                var firstname = $("#firstname").val();--}}
{{--                var lastname = $("#lastname").val();--}}
{{--                if (firstname && lastname && !this.value) {--}}
{{--                    this.value = firstname + "." + lastname;--}}
{{--                }--}}
{{--            });--}}

{{--            //code to hide topic selection, disable for demo--}}
{{--            var newsletter = $("#newsletter");--}}
{{--            // newsletter topics are optional, hide at first--}}
{{--            var inital = newsletter.is(":checked");--}}
{{--            var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");--}}
{{--            var topicInputs = topics.find("input").attr("disabled", !inital);--}}
{{--            // show when newsletter is checked--}}
{{--            newsletter.click(function() {--}}
{{--                topics[this.checked ? "removeClass" : "addClass"]("gray");--}}
{{--                topicInputs.attr("disabled", !this.checked);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}




    <script>
        $(document).ready(function(){
            $('#aa6').dropify() ;

            var direction =  getUrlParams('dir') ;
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
                sidebarPosition: "absolute",
                headerPosition: "fixed",
                containerLayout: "wide",
                direction: direction
            });

            $('.btn-click-toggle').click(function () {
                $('.btn-click-toggle').siblings('div').css('display', 'none')
                // $(this).children('input').attr('checked','checked')
                $(this).children('input').attr("checked", !$(this).children('input').attr("checked"));
                if ($(this).children('input').is(':checked')) {
                    console.log('attr checked is ')
                    $(this).addClass('btn-primary')
                } else {
                    console.log('attr is not checked')
                    $(this).removeClass('btn-primary')
                    // $(this).css('border-bottom','1px solid white')
                }
                $(this).siblings('div').toggleClass('d-block d-none')
            });
        });
    </script>



@endsection
