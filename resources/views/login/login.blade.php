<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ورود به سامانه</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/fontawesome-all.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/CSS/style.css') }}">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style type="text/css">
        *{
            transform: translate();
            margin: 0;
            padding: 0;
        }
        .site-link {
            padding: 5px 15px;
            position: fixed;
            z-index: 99999;
            background: #fff;
            box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
            right: 30px;
            bottom: 30px;
            border-radius: 10px;
        }
        .site-link img {
            width: 30px;
            height: 30px;
        }
        .alert{

        }
    </style>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    @include('layouts.info-box')




    <div class="body-sliding-form container-fluid">

        <div class="veen-sliding-form">
            <div class="login-btn-sliding-form splits-sliding-form">
                <p>میخواهید وارد شوید؟</p>
                <button class="active login_form_btn">کلیک کنید</button>
            </div>
            <div class="rgstr-btn splits-sliding-form">
                <p>پسورد خود را فراموش کردید؟</p>
                <button class="forget_form_btn">کلیک کنید</button>
            </div>
            <div class="wrapper-sliding-form">
                <form  id="login-sliding-form" tabindex="500" method="post" action="{{ url('/auth/login') }}">
                        @csrf
                    <h3 class="m-0 p-0">ورود </h3>
                    <div class="mail-sliding-form">
                        <label for="001">موبایل</label>
                        <input id="001" type="mail" name="user_name">
                    </div>

                    <div class="passwd-sliding-form">
                        <label for="002">رمز عبور</label>
                        <input id="002" type="password" name="password">
                    </div>


                    <div class="recaptcha-image-parent">
                        <div class="recaptcha-image p-t-20">
                            <div class="captcha">
                                <span id="captcha1">{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger reload" id="reload" style="padding: 0!important;width: 30px">
                                    &#x21bb;
                                </button>
                            </div>

                        </div>
                    </div>


                    <div class="mail-sliding-form">
                        <label for="003">لطفاً کد امنیتی را در کادر زیر وارد نمایید</label>
                        <input id="003" type="text" name="captcha">
                    </div>

                    <div class="submit-sliding-form">
                        <button type="submit" class="dark"> ادامه</button>
                    </div>
                </form>



                <form id="register" tabindex="502" method="post" class="forget_password_form" action="/auth/forgetPassword">
                    @csrf
                    <h3 class="m-0 p-0">بازیابی کلمه عبور</h3>
                    <div class="name-sliding-form">
                        <label for="mobile">شماره همراه</label>
                        <input id="mobile" type="text" name="mobile">
                    </div>

{{--                    <div class="recaptcha-image-parent ">--}}
{{--                        <div class="recaptcha-image p-t-20">--}}

{{--                            <div class="captcha">--}}
{{--                                <span id="captcha2">{!! captcha_img() !!}</span>--}}
{{--                                <button type="button" class="btn btn-danger reload" id="reload2" style="padding: 0!important;width: 30px">--}}
{{--                                    &#x21bb;--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="uid-sliding-form">--}}
{{--                        <label for="captcha">لطفاً کد امنیتی را در کادر زیر وارد نمایید</label>--}}
{{--                        <input id="captcha" type="text" name="captcha" autocomplete="off">--}}
{{--                    </div>--}}
                    <div class="submit-sliding-form">
                        <button class="dark submit-forget-form-btn">ارسال کد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>



    <script src="{{ asset('assets/libs/js/scriptSlidingLoginForm.js') }}"></script>
    <script src="{{ asset('assets/JS/scriptSlidingLoginForm.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#reload').click(function (){
            $.ajax({
                type: 'GET',
                url: 'reload/captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
            console.log('here');
        });
        $('#reload2').click(function (){
            $.ajax({
                type: 'GET',
                url: 'reload/captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
            console.log('here');
        });


        $(document).on('click','.forget_form_btn',function (){
            $.ajax({
                type: 'GET',
                url: 'reload/captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            })
        });
        $(document).on('click','.login_form_btn',function (){
            $.ajax({
                type: 'GET',
                url: 'reload/captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            })
        });


        $('.submit-forget-form-btn').click(function (){
            // event.preventDefault();
            console.log('hh');
            $('form.forget_password_form').submit;
            // let mobile = $('#mobile').val();
            // let captcha = $('#captcha').val();
            // $.ajax({
            //     type: 'get',
            //     url: '/auth/forgetPassword',
            //     data: {'mobile':mobile},
            //     success: function (data) {
            //         if (data.status=='ok'){
            //             let mobile = data.mobile;
            //             let address = "/auth/verifyForgetCode?mobile="+mobile+"&captcha="+captcha ;
            //             // console.log(address);
            //             window.location.href = "/auth/verifyForgetCode?mobile="+mobile;
            //         }
            //         console.log(data)
            //     }
            // });

        });
    </script>

</html>
