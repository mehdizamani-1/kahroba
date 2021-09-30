<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>فراموشی رمز عبور</title>
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

            .veen-sliding-form > .wrapper-sliding-form {
                left: 25%;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
            }

            @media (max-width: 1000px) {
                .veen-sliding-form {
                    width: 97%;
                    margin: 100px auto;
                    background: rgba(255, 255, 255, 0.5);
                    min-height: 500px;
                    display: table;
                    direction: ltr;
                    position: relative;
                    box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
                    -webkit-border-radius: 8px;
                    -moz-border-radius: 8px;
                    border-radius: 8px;
                }
                .veen-sliding-form > .wrapper-sliding-form {
                    position: absolute;
                    width: 80%;
                    justify-self: center;
                    justify-items: center;
                    justify-content: center;
                    height: 120%;
                    top: -10%;
                    left: 5%;
                    right: 5%;
                    margin: 0 auto;
                    background: var(--color-white-fff);
                    box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
                    transition: all 0.5s;
                    color: #303030;
                    overflow: hidden;
                    -webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                }
            }

            .returnBtn{
                display: block;
                position: absolute;
                top: 0;
                right: 0;
            }
            .veen-sliding-form button{
                background: transparent;
                background-image: linear-gradient(90deg, var(--newcolor), #000000);
                display: inline-block;
                padding: 5px 20px;
                border: 2px solid var(--color-white-fff);
                border-radius: 50px;
                background-clip: padding-box;
                position: relative;
                color: var(--color-white-fff);
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);
                transition: all 0.25s;
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





        <div class="body-sliding-form container-fluid m-sm-0">
            <div class="veen-sliding-form ">
                <div class="wrapper-sliding-form ">
                    <form id="login-sliding-form" action="/auth/postVerifyForgetCode" method="post" tabindex="500">
                        @csrf
                        <input type="hidden" name="mobile" value="{!! $mobile !!}">
                        <h3 class="m-0 pr-0 pl-0 pb-4">بازیابی رمز عبور</h3>
                        <div class="formGroup col-10 p-1 mt-2 ml-auto mr-auto">
                            <input type="password" id="2" class="formField" name="password" placeholder=" ">
                            <label for="2" class="formLabel">
                                رمز عبور جدید
                            </label>
                        </div>
                        <div class="formGroup col-10 p-1 mt-2 ml-auto mr-auto">
                            <input type="password" id="3" class="formField" name="password_confirmation" placeholder=" ">
                            <label for="3" class="formLabel">
                                تکرار رمز عبور
                            </label>
                        </div>
                        <div class="formGroup col-10 p-1 mt-2 ml-auto mr-auto">
                            <input type="text" id="4" maxlength="5" name="verify_code" class="formField text-center " placeholder=" ">
                            <label for="4" class="formLabel">
                                ورود کد تایید
                            </label>
                        </div>

                        <div class="submit-sliding-form pb-2"><button class="dark" title="ارسال فرم">ارسال</button></div>
                        <div class=" text-right mb-0">
                            <a href="/auth/login">
                                <button type="button" class="returnBtn" title="بازگشت">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-arrow-return-right align-middle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
                                    </svg>
                                </button>
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>




        <script src="{{ asset('assets/libs/js/scriptSlidingLoginForm.js') }}"></script>
        <script src="{{ asset('assets/JS/scriptSlidingLoginForm.js') }}"></script>

        <script>
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
        </script>

    </body>
</html>
