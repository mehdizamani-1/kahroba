<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>

{{-------------------------------------------------------------------------------}}
{{-------------------------------   META TAGS    --------------------------------}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{------------------------------   /META TAGS2    --------------------------------}}
{{-------------------------------------------------------------------------------}}


    <link href="{{asset('assets/libs/css/panel2/bootstrap-select.min.css')}}" rel="stylesheet">

    @yield('pre_styles')

    @include('layouts.dashboard.styles')

    @yield('styles')

    <script>
        var getDataFromStorage = localStorage.getItem('bodyVersion');
        if( getDataFromStorage == null ){
            localStorage.setItem('bodyVersion','light');
        }
    </script>



    <style>

        .alert{
            /*position: absolute;*/
            position: relative;
            /*top: -15px;*/
            z-index: 1;
            left: 0px;
            width: 100%;
        }

        /* FOR MULTISELECT STYLE IN MOBILE VIEW*/
        @media screen and (max-width: 578px) {
            .ms-selectable{
                display: block!important;
                float: none !important;
                width: 90% !important;
            }
            .ms-selection{
                margin-top: 15px !important;
                display: block !important;
                float: none !important;
                width: 90% !important;
            }
            .ms-container{
                background: none !important;
            }
        }
        .searchInputSelect{
            width: 168px!important;
        }
    </style>

</head>

<body>

{{--    @include('layouts.dashboard.loading')--}}



    <div id="main-wrapper">

        @include('layouts.dashboard.header')
        @include('layouts.dashboard.chat_box')
        @include('layouts.dashboard.sideBar')

        @yield('content')




    </div>
    <div class="container-circular-menu" style="z-index: 20000">
        <div class="menu-toggle-circular-menu">
            <span class="fas fa-bars"></span>
        </div>
        <div class="menu-round">
            @foreach($widgetLinks as $key=> $widgetLink)
                @if($key <=2)
                    <div class="btn-app d-flex justify-content-center align-items-center" style="background-color:{{$widgetLink->background_color}}">
                        <a title="{{$widgetLink->title ?? ''}}" href="{{$widgetLink->link_url ?? '#'}}" style="color:{{$widgetLink->font_color}} !important;">
                            <img class="w-100" src="{{'/'.$widgetLink->icon}}"
                                 alt="" onerror="this.onerror=null;this.src='{{asset('assets/images/default_avatar.png')}}';">
                        </a>
                    </div>
                @else
                    @break
                @endif
            @endforeach

        </div>
        <div class="menu-line">
            @foreach($widgetLinks as $key=> $widgetLink)
                @if($key >2)
                    <div class="btn-app d-flex justify-content-center align-items-center" style="background-color:{{$widgetLink->background_color}}">
                        <a title="{{$widgetLink->title ?? ''}}" href="{{$widgetLink->link_url ?? '#'}}" style="color:{{$widgetLink->font_color}} !important;">
                            <img class="w-100" src="{{'/'.$widgetLink->icon}}"
                                 alt="" onerror="this.onerror=null;this.src='{{asset('assets/images/default_avatar.png')}}';">
                        </a>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    <p id="info"></p>

    <div id="scrollBtn" class="scroll-top">
        <svg class="bi bi-arrow-bar-up" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.354 5.854a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L8 3.207l2.646 2.647a.5.5 0 0 0 .708 0z"/>
            <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-1 0v6.5a.5.5 0 0 0 .5.5zm-4.8 1.6c0-.22.18-.4.4-.4h8.8a.4.4 0 0 1 0 .8H3.6a.4.4 0 0 1-.4-.4z"/>
        </svg>
    </div>

    <div class="errorBox shadow-sm container-fluid p-1 ">
        <div class="row">
            <div class="col-11">
                <p id="text__" class="errorMsg m-auto align-middle pt-2 pb-2 d-inline-block text-white mb-0 errorMsgSize w-100"></p>
            </div>
            <div class="col-1 p-0 pr-3">
                <i class="fas fa-close fa-2x pt-1 pb-2 text-white d-inline-block float-right errorBoxRemove"
                   onclick="$(this).parent().parent().parent().removeClass('fadeInRight');" style="cursor: pointer"></i>
            </div>
        </div>
    </div>



    @include('layouts.dashboard.scripts')
    @yield('scripts')


    <script src="/js/styleSwitcher.js"></script>
    <script>

        function showMessage(message, status = '', toggle=true) {
            $('#text__').empty().html(message);
            if( status == 'success'){
                $('.errorBox').removeClass('bg-danger').addClass('bg-success');
            }else{
                $('.errorBox').removeClass('bg-success').addClass('bg-danger');
            }
            if( toggle == true ){
                if($('.errorBox').hasClass('fadeInRight')){
                    $('.errorBox').removeClass('fadeInRight');
                    setTimeout(progressRemove,5000);
                }else{
                    $('.errorBox').addClass('fadeInRight');
                    setTimeout(progressRemove,5000);
                }
            }else{
                $('.errorBox').addClass('fadeInRight');
            }

        }
        function progressRemove(){
            $('.errorBox').removeClass('fadeInRight',2000);
        }
        $(document).ready(function () {
            $('table').addClass('tableFontSmall');

            // $(document).find('table').addClass('table-responsive');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click tap','#collapseHandleMap',function () {
                $('#rotateToggleIcon').toggleClass('rotateToggleCollapseIcon');
                $('#collapseMap').slideToggle(500,"swing");
            });
            //ERRORBOX VISIBLE ANIMATION




            $(document).on('change','#switchDayNight',function () {
                getDataFromStorage = localStorage.getItem('bodyVersion');
                // if( getDataFromStorage)
                let darkModeMap = 'https://api.mapbox.com/styles/v1/nasiopars/cko83zuao1p6k19p10b1ns8ds/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoibmFzaW9wYXJzIiwiYSI6ImNrY3JpejBnYTFmNmsycnM2MGVmaThtZ2sifQ.Rw_6my-C0Xlv2rWWwSVWyA';
                let lightModeMap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
                if (getDataFromStorage ==='light'){
                    L.tileLayer(lightModeMap, {
                        attribution: '&copy; <a href="https://www.farahamgostar.ir"></a> contributors'
                    }).addTo(map);
                }else if(getDataFromStorage ==='dark'){
                    L.tileLayer(darkModeMap, {
                        attribution: '&copy; <a href="https://www.farahamgostar.ir"></a> contributors'
                    }).addTo(map);
                }
            });
            //ERRORBOX VISIBLE ANIMATION


            $(document).on('click tap','#showHeaderNotification',function() {
                event.preventDefault();
                $('#showHeaderNotification').children('.dropdown-menu').fadeToggle(120);
                $('#showHeaderProfile').children('.dropdown-menu').slideUp(100);
            });
            $(document).on('click tap','#showHeaderProfile',function() {
                event.preventDefault();
                $('#showHeaderNotification').children('.dropdown-menu').slideUp(100);
                $('#showHeaderProfile').children('.dropdown-menu').fadeToggle(120)
            });
            $(document).on('click tap',function(e) {
                e.stopPropagation();
                var containerNotification = $("#showHeaderNotification");
                var containerProfile = $("#showHeaderProfile");
                if (containerNotification.has(e.target).length === 0) {
                    $(containerNotification).children('.dropdown-menu').slideUp(100);
                }
                if (containerProfile.has(e.target).length === 0) {
                    $(containerProfile).children('.dropdown-menu').slideUp(100);
                }
            });

            $(document).on('click', '.buttons-pdf', function (e) {
                document.getElementById('info').innerText = '';
                e.preventDefault();
                var myTab = document.getElementsByTagName('table')[0];

                // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
                for (let i = 1; i < myTab.rows.length; i++) {

                    // GET THE CELLS COLLECTION OF THE CURRENT ROW.
                    var objCells = myTab.rows.item(i).cells;

                    // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
                    for (var j = 0; j < objCells.length; j++) {
                        info.innerText = info.innerText  + objCells.item(j).innerText + ',';
                    }
                    info.innerText = info.innerText + '|';     // ADD A BREAK (TAG).
                }
                let rows = info.innerText;
                let headers = $('#table-id2 thead tr th');
                let cols = '';
                $.each(headers, function( index, value ) {
                    cols += $(value).text() + '|';
                });

                console.log(cols);
                $.post('/pdf', {
                    'cols': cols,
                    'rows': rows,
                }, function (Res) {
                    console.log(Res);
                    window.location = "/"+Res;
                });
            })



            let topBtn = $("#scrollBtn");
            $(function(){
                window.onscroll = function() {
                    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
                        topBtn.css('z-index','950').fadeIn();
                    }else{
                        topBtn.fadeOut();
                    }
                }
            });

            $(function () {
                topBtn.on("click",function(e) {
                    e.preventDefault();
                    $("html, body").animate({scrollTop:'0'},'slow','swing',1000);
                });
            });
//SET AND GET DATA BODY STYLE FROM SESSION STORAGE
            let getDataFromSession = localStorage.getItem('bodyVersion');
            let getToggleStatus = localStorage.getItem('toggleStatus');
            let switchToggle = $('#switchDayNight');
            let logoBoxVersion = localStorage.getItem('logoBoxVersion');
            let headerBoxVersion = localStorage.getItem('headerBoxVersion');
            let sidebarVersion = localStorage.getItem('sidebarVersion');
            setTimeout(function () {
                if(getDataFromSession === 'dark'){
                    body.attr('data-theme-version', 'dark');
                    switchToggle.prop('checked',true);
                }else{
                    body.attr('data-theme-version', 'light');
                    switchToggle.prop('checked',false);
                }
                if( getToggleStatus === 'true' ){
                    $('.hamburger').addClass('is-active');
                    $('#main-wrapper').addClass('show menu-toggle');
                }else{
                    $('.hamburger').removeClass('is-active');
                    $('#main-wrapper').removeClass('menu-toggle');
                }
                body.attr('data-nav-headerbg',logoBoxVersion);
                body.attr('data-headerbg',headerBoxVersion);
                body.attr('data-sibebarbg',sidebarVersion);

                let getStorageMainColor = localStorage.getItem('mainColorApp');
                if(getStorageMainColor !== null){
                    document.documentElement.style.setProperty('--newcolor',getStorageMainColor);
                }else{
                    document.documentElement.style.setProperty('--newcolor','#3a7afe');
                }
            }, 100);



            let i =1;
            $('.first-child-widget').on('click',function () {
                if (i % 2 === 0) {
                    displayBlockPosRelative()
                } else {
                    $('.second-child-widget,.third-child-widget,.fourth-child-widget').addClass(
                        'display-block-position-relative')
                    $(".second-child-widget").delay(30).animate({
                        left: '0',
                        opacity: "1"
                    }, {
                        duration: 200
                    });
                    $(".third-child-widget").delay(30).animate({
                        left: '0',
                        opacity: "1"
                    }, {
                        duration: 300
                    });
                    $(".fourth-child-widget").delay(30).animate({
                        left: '0',
                        opacity: "1"
                    }, {
                        duration: 400
                    });
                }
                i++
            })
            $(".widget-parent-bottom-left").hover(function () {}, function () {
                displayBlockPosRelative()
                i++
            })


            function displayBlockPosRelative() {
                $(".third-child-widget").animate({
                    left: '-25px',
                    opacity: "0"
                }, {
                    duration: 200
                });
                $(".second-child-widget").animate({
                    left: '-25px',
                    opacity: "0"
                }, {
                    duration: 300
                });
                $(".fourth-child-widget").animate({
                    left: '-25px',
                    opacity: "0"
                }, {
                    duration: 400
                });
                $('.second-child-widget,.third-child-widget,.fourth-child-widget').removeClass(
                    'display-block-position-relative')
            }

            $(document).on('click','#charge-station-btn',function (){
                $.ajax({
                    type: 'get' ,
                    url: "/charge/stations" ,
                    dataType: 'json' ,
                    data:$('form#charge-station-form').serialize() ,
                    success: function (response) {

                        if (response.status_code == 1000){
                            let string =
                                `<div class="alert alert-success">
                                    <center>با موفقیت شارژ گردید
                                       <button type="button" class="close button-style-alerts" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </center>
                                </div>

                                `;
                            $('.custom_flash_message').append(string);
                            $('#exampleModalLongSimCart').modal({backdrop:'false'});
                            $('#close-btn-charge-modal').click();
                            $('.modal-backdrop').hide();
                        }else {
                            let string =
                                `<div class="alert alert-danger">
                                    <center>${response.message}
                                       <button type="button" class="close button-style-alerts" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </center>
                                </div>
                                `;
                            $('.custom_flash_message').append(string);
                            $('#exampleModalLongSimCart').modal({backdrop:'false'});
                            $('#close-btn-charge-modal').click();
                            $('.modal-backdrop').hide();
                        }
                        console.log(response);
                    },
                    error: function (data) {
                        console.log("error") ;
                    }
                });
            });

            $(document).on('click','#charge-bus-btn',function (){
                $.ajax({
                    type: 'get' ,
                    url: "/charge/buses" ,
                    dataType: 'json' ,
                    data:$('form#charge-bus-form').serialize() ,
                    success: function (response) {

                        console.log(response);
                        if (response.status_code == 1000){
                            let string =
                                `<div class="alert alert-success">
                                    <center>با موفقیت شارژ گردید
                                       <button type="button" class="close button-style-alerts" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </center>
                                </div>

                                `;
                            $('.custom_flash_message').append(string);
                            $('#exampleModalLongSimCart').modal({backdrop:'false'});
                            $('#close-btn-charge-modal').click();
                            $('.modal-backdrop').hide();
                        }else {
                            let string =
                                `<div class="alert alert-danger">
                                    <center>${response.message}
                                       <button type="button" class="close button-style-alerts" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </center>
                                </div>
                                `;
                            $('.custom_flash_message').append(string);
                            $('#exampleModalLongSimCart').modal({backdrop:'false'});
                            $('#close-btn-charge-modal').click();
                            $('.modal-backdrop').hide();
                        }
                        console.log(response);
                    },
                    error: function (data) {
                        console.log(data);
                        console.log("error") ;
                    }
                });
            });
        });



        $(document).on('click tap','.menu-toggle-circular-menu',function() {
            $(this).toggleClass('open');
            $(".menu-round").toggleClass('open');
            $(".menu-line").toggleClass('open');
            if($(this).hasClass('open')){
                $(this).children('span').toggleClass('fa-bars fa-close');
            }else{
                $(this).children('span').toggleClass('fa-bars fa-close');
            }
        });
    </script>

</body>

</html>
