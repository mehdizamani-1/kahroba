@extends('layouts.app')

@section('title')
    ثبت مختصات
@endsection


@section('styles')

    <!-- select2 css  -->
    <link rel="stylesheet" href="/assets/libs/css/fileinput.min.css">
    <link href="/assets/libs/css/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/libs/css/dropify.css">

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
            <div class="row">
                <div class="dashboard-ecommerce">



                    <div class="container-fluid dashboard-content pt-3">
                        @include('layouts.info-box')
                        <div class="ecommerce-widget">
                            <div class="row">
                                {{--                            pattern="^(\+98|0)?9\d{9}$" --}}

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <a class="accordionButtonStyle" id="collapseHandleMap">
                                            <h5 class="card-header">
                                                ایجاد مختصات جدید
                                                <i id="rotateToggleIcon" class="fas fa-sort-down"></i></h5>
                                        </a>
                                        <div class="card-body">

                                            <form method="POST" enctype="multipart/form-data" action="/locations" class="step-form-horizontal jvalidate" id="step-form-horizontal" novalidate>
                                                @csrf
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-12" id="collapseMap">
                                                            <div class="card p-2">
                                                                <div class="card-body p-1">
                                                                    <div class="basic-form">
                                                                        <div class="row">
                                                                            <div class="container-fluid p-1">
                                                                                <div class="row ">
                                                                                    <div class="col-12 text-right pt-1" style="position: relative;">
                                                                                        <span class="address-map-marker"><img onclick="onMapClick()" src="/assets/libs/css/map/images/marker-icon-2x.png" style="vertical-align: 105px !important; top: 18%; width: 20px; height: 40px; position: absolute; left: 50%; z-index: 2; top: 50%;" id="marker_img" alt=""></span>
                                                                                        <div id="stationMakeMap" class="map-size"></div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <input type="hidden" id="lat" value="" name="lat">
                                                                                        <input type="hidden" id="lng" value="" name="lng">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card p-2">
                                                                <div class="card-header">
                                                                    <h5 class="card-title">فرم زیر را برای ایجاد پر کنید (اطلاعات الزامی)</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="basic-form">
                                                                        <div class="row">

                                                                            <div class="formGroup col-4 p-1 mt-2">
                                                                                <input required type="text" id="1" class="formField" placeholder=" " name="title"
                                                                                       value="{{ old('title') }}">
                                                                                <label for="1" class="formLabel">نام مکان</label>
                                                                                <div class="invalid-feedback">
                                                                                    این فیلد اجباری است
                                                                                </div>
                                                                            </div>

                                                                            <div class="formGroup col-4 p-1 mt-2">
                                                                                <input autocomplete="off" type="text" id="3" class="formField" placeholder=" " name="street_view"
                                                                                       value="{{ old('street_view') }}">
                                                                                <label for="3" class="formLabel">لینک استریت ویو</label>
                                                                            </div>
                                                                            <div class="formGroup col-4 p-1 mt-2">
                                                                                <input autocomplete="off" type="text" id="3" class="formField" placeholder=" " name="virtual_tour"
                                                                                       value="{{ old('virtual_tour') }}">
                                                                                <label for="3" class="formLabel">لینک تور مجازی</label>
                                                                            </div>



                                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                                <input required type="text" id="lat-input" class="formField" placeholder=" " name="lat"
                                                                                       value="{{ old('lat') }}" >
                                                                                <label for="lat-input" class="formLabel">عرض جغرافیایی مکان</label>
                                                                                <div class="invalid-feedback">
                                                                                    این فیلد اجباری است
                                                                                </div>
                                                                            </div>
                                                                            <div class="formGroup col-6 p-1 mt-2">
                                                                                <input required type="text" id="lng-input" class="formField" placeholder=" " name="lng"
                                                                                       value="{{ old('lng') }}" >
                                                                                <label for="lat-input" class="formLabel">طول جغرافیایی مکان</label>
                                                                                <div class="invalid-feedback">
                                                                                    این فیلد اجباری است
                                                                                </div>
                                                                            </div>

                                                                            <hr>
                                                                            <div class="formGroup col-12 hiddenButtons">

                                                                                <label for="dropZoneInput" class="d-inline mt-3">تصویر مکان را آپلود کنید:</label>
                                                                                <div class="formGroup col-12 m-auto p-1 mt-3">
                                                                                    <input id="dropZoneInput" name="main_pic" type="file" class="file" data-browse-on-zone-click="true">
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card p-2">
                                                                <div class="card-header">
                                                                    <h5 class="card-title">فرم زیر را برای ایجاد مکان جدید پر کنید(اطلاعات اختیاری)</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="basic-form">
                                                                        <div class="row">
                                                                            <div class="formGroup col-12 p-1 mt-2">
                                                                                <input type="text" id="first_initial_brightness" class="formField" placeholder=" " name="abstract"
                                                                                       value="{{ old('abstract') }}">
                                                                                <label for="first_initial_brightness" class="formLabel">توضیحات مختصر</label>
                                                                            </div>
                                                                            <br>

                                                                            <div class="formGroup col-12 p-1 mt-2">
                                                                                <textarea id="summernote" class="formField" placeholder=" " name="description">{{ old('description') }}</textarea>
{{--                                                                                <label for="summernote" class="formLabel">توضیحات مختصر</label>--}}
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="text-center">
                                                                <input type="submit" class="btn btn-success" value="ذخیره اطلاعات">

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
    <script src="/assets/libs/js/dropify.js"></script>




    <script src="/assets/libs/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/js/bootstrap-datepicker.fa.min.js"></script>

    <script src="/assets/libs/js/fileinput.min.js"></script>

    <!--    SELECT MULTI-->
    <script src="/assets/libs/js/select2.min.js"></script>
    <script src="/js/jvalidate.js"></script>
    <script src="/assets/libs/css/summernote/summernote.js"></script>
    <script src="/js/jvalidate.js"></script>




    <script>
        let lat_view = "35.70058695988636";
        let lng_view = "51.391091109149585";
        let zoom_view = '14';
        @php
            if( isset($last_station) ){
        @endphp
            lat_view = '{{ $last_station['station_lat'] }}';
        lng_view = '{{ $last_station['station_lng'] }}';
        @php
            }else{
                foreach ($setting as $key){
                    if( $key['key'] == 'default_lat' ){
        @endphp
            lat_view = '{{ $key['value'] }}';
        @php
            }
            if( $key['key'] == 'default_lng' ){
        @endphp
            lng_view = '{{ $key['value'] }}';
        @php
            }
            if( $key['key'] == 'default_zoom' ){
        @endphp
            zoom_view = '{{ $key['value'] }}';
        @php
            }
        }
    }

        @endphp


        /**
         * -----------------------------------------------------
         *       MAP SCRIPT
         *       MAP SCRIPT
         *       MAP SCRIPT
         * ------------------------------------------------------
         */
        let greenMarker = L.icon({
            iconUrl: '/assets/libs/css/map/images/marker-icon-green2x.png',
            iconSize: [20, 40], // size of the icon
            shadowSize: [18, 18], // size of the shadow
            iconAnchor: [10, 40], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -55], // point from which the popup should open relative to the iconAnchor
        });

        let coordinates = '' ;
        let latlangleaflet = [] ;
        let coordinates_string = '' ;
        let marker = '' ;
        let map = L.map('stationMakeMap', {
            zoomControl: true,
            // fullscreenControl: true,
            attributionControl: false
        }).setView([lat_view, lng_view], zoom_view);

        //fullscreen start
        map.addControl(new L.Control.Fullscreen({
            title: {
                'false': 'تمام صفحه',
                'true': 'خروج از تمام صفحه'
            }
        }));
        //fullscreen end

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);




        //additional option
        let newzoom = '' + (2 * (map.getZoom())) + 'px';
        $(map).css({'width': newzoom, 'height': newzoom}) ;

        // let returnColor = document.querySelector("#colorForlineNew");
        let polyline;
        let createLinePoints = [];
        let i = 0;
        let wentColor = '';//document.querySelector("#colorForlineNew").val();

        function resetMap(){
            map.eachLayer(function (layer) {
                map.removeLayer(layer);
            });
            // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            // }).addTo(map);
            getDataFromStorage = localStorage.getItem('bodyVersion');
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
            $(".MG-overlay-pane svg g path").remove();
            markers=[];
            createLinePoints = [];
        }

        function onMapClick() {
            // alert("You clicked the map at " + e.latlng);
            let redMarker = L.icon({
                iconUrl: '/assets/libs/css/map/images/marker-icon-2x.png',
                iconSize: [20, 40], // size of the icon
                shadowSize: [18, 18], // size of the shadow
                iconAnchor: [-3, 18], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [0, -55], // point from which the popup should open relative to the iconAnchor
            });
            map.invalidateSize();
            var coordinate = map.getCenter();
            var lat = coordinate.lat;
            var lng = coordinate.lng;
            coordinates_string += lat + ',' + lng;
            // markers[i] = L.marker(coordinate, {icon: greenIcon}).addTo(map);

            marker = L.marker(coordinate, {icon: redMarker,draggable:true}).bindPopup(
                '<u class="text-info mb-0">مختصات نقطه:</u>'+
                '<p class="mb-0">'+
                '<span class="text-secondary mt-0">طول جغرافیایی: </span>'+ lat+ '<br>'+
                '<span class="text-secondary">عرض جغرافیایی: </span>'+ lng+ '</p>').addTo(map);
            map.addLayer(marker);
            $('#lat').val(lat);
            $('#lng').val(lng);
            $('#lat-input').val(lat);
            $('#lng-input').val(lng);
            marker.on('dragend', function(event){
                var markers = event.target;
                var position = markers.getLatLng();
                console.log(position);
                $('#lat').val(position.lat);
                $('#lng').val(position.lng);
                $('#lat-input').val(position.lat);
                $('#lng-input').val(position.lng);
            });
            $('#marker_img').hide();
            // alert("hello" + latlangleaflet);
        }




        setInterval(function () {
            map.invalidateSize();
        }, 1000);


        function removeLayer(j,lat,lng){

            wentColor = $("#colorForLineNew1").val();
            map.removeLayer(markers[j]);

            createLinePoints.pop();
            map.eachLayer(function (layer) {
                map.removeLayer(layer);
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            // $(".MG-overlay-pane svg g path").remove();
            let redMarker = L.icon({
                iconUrl: 'assets/libs/css/map/images/marker-icon-2x.png',
                iconSize: [36, 55] , // size of the icon
                shadowSize: [38, 38] , // size of the shadow
                iconAnchor: [20, 58] , // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62] , // the same for the shadow
                popupAnchor: [0, -55] , // point from which the popup should open relative to the iconAnchor
            }) ;

            var i = 0 ;
            var maskMarker = [] ;
            createLinePoints = [] ;
            coordinates_string = '' ;
            console.log(markers) ;
            for(var l=0; l<markers.length; l++){
                let markersLat = markers[l]._latlng.lat ;
                let markersLng = markers[l]._latlng.lng ;
                if(l != j){
                    // maskMarker[i] = markers[l] ;
                    coordinates_string += markersLat + ',' + markersLng + '|' ;
                    maskMarker[i] = L.marker(markers[l]._latlng, {icon: redMarker,draggable:true}).bindPopup(
                        '<span class="text-gray">'+'مکان شماره:'+'</span>'+
                        '<span class="text-info font-weight-bold">'+ ( i + 1 ) +'</span>'+ '<br>'+
                        '<u class="text-info mb-0">مختصات نقطه:</u>'+
                        '<p class="mb-0">'+
                        '<span class="text-secondary mt-0">طول جغرافیایی: </span>'+ markersLat+ '<br>'+
                        '<span class="text-secondary">عرض جغرافیایی: </span>'+ markersLng+ '</p>'+
                        '<button onclick="removeLayer('+i+','+markersLat+','+markersLng+')" title="حذف همین نقطه" type="button" class="btn  btn-danger btn-rounded btn-sm m-auto text-center justify-content-center text-center" >'+
                        'X' +
                        '</button>').addTo(map);
                    maskMarker[i].on('dragend', function(event) {
                        var marker = event.target;
                        var position = marker.getLatLng();

                        // createLinePoints.pop();
                        // map.eachLayer(function (layer) {
                        // 	map.removeLayer(layer);
                        // });

                        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        // 	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        // }).addTo(map);

                        $(".MG-overlay-pane svg g path").remove();
                        // var k = 0;

                        createLinePoints = [];
                        coordinates_string = '';
                        for (var m = 0; m < maskMarker.length; m++) {
                            let markersLat = maskMarker[m]._latlng.lat;
                            let markersLng = maskMarker[m]._latlng.lng;
                            // if(markersLat != lat && markersLng != lng){
                            coordinates_string += markersLat + ',' + markersLng + '|';

                            // createLinePoints.push([markersLat, markersLng]);
                            // k++;
                            // }

                        }

                        // polyline = L.polyline(createLinePoints).addTo(map);
                        // polyline.setStyle({
                        // 	color: wentColor
                        // });
                        document.getElementById('latlangResult').innerHTML = coordinates_string;

                    });

                    // createLinePoints.push([markersLat, markersLng]) ;
                    i++;


                }}
            markers = [];
            for(var l=0; l<maskMarker.length; l++){
                markers[l] = maskMarker[l];
            }
            polyline = L.polyline(createLinePoints).addTo(map);
            polyline.setStyle({
                color: wentColor
            });
            document.getElementById('latlangResult').innerHTML = coordinates_string;

        }
        // map.on('click', onMapClick);
        coordinates += '35.70163,51.39211' + '|';
        // var Google_Layer = L.setGoogle(map);
        // var Google_Layer2 = L.setGoogle(map2);

        function polylineMakeAgain(){
            polyline = L.polyline(createLinePoints).addTo(map);
            polyline.setStyle({
                color: wentColor
            });
        }


        function clearPolylines() {
            map.removeLayer(polyline);
        }

        function getCurrentLoc() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPositionForIp);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }



        function reset_transit() {
            if (marker1 != null) {
                map.removeLayer(marker1);
                marker1 = null;
            }

            $('#coordinate').val('');
            $('#image_center').css('display', 'block');

        }








        (function($) {
            $('#summernote').summernote({
                placeholder: "توضیحات کامل",
                tabsize: 2,
                lang: 'FA',
                height: 120
            });
            var drEvent_file = $(".dropify").dropify({
                messages: {
                    default: "Drag the desired image or click here",
                    replace: "برای جایگزین، تصویر را بکشید یا کلیک کنید",
                    remove: "حذف",
                    error: "There is a problem, please try again."
                },
                tpl: {
                    message: '<div class="dropify-message"><span class="fa fa-image fa-3x" /> <p>تصویر را بکشید یا کلیک کنید</p></div>',
                    filename: '<p class="dropify-filename"><span class="fa fa-image fa-3x"></span> <span class="dropify-filename-inner"></span></p>',
                }
            });
            $(document).on('change','#lat-input',function (){


                let currentLat = $('#lat-input').val();
                let currentLng = $('#lng-input').val();

                if( currentLat != '' && currentLng != '' ){
                    map.setView([currentLat, currentLng], 14);

                    let redMarker = L.icon({
                        iconUrl: '/assets/libs/css/map/images/marker-icon-2x.png',
                        iconSize: [20, 40], // size of the icon
                        shadowSize: [18, 18], // size of the shadow
                        iconAnchor: [-3, 18], // point of the icon which will correspond to marker's location
                        shadowAnchor: [4, 62], // the same for the shadow
                        popupAnchor: [0, -55], // point from which the popup should open relative to the iconAnchor
                    });
                    map.invalidateSize();
                    if( marker != '' ){
                        marker.remove();
                    }
                    marker = L.marker([currentLat, currentLng], {icon: redMarker,draggable:true}).bindPopup(
                        '<u class="text-info mb-0">مختصات نقطه:</u>'+
                        '<p class="mb-0">'+
                        '<span class="text-secondary mt-0">طول جغرافیایی: </span>'+ currentLat+ '<br>'+
                        '<span class="text-secondary">عرض جغرافیایی: </span>'+ currentLng+ '</p>').addTo(map);
                    map.addLayer(marker);

                    marker.on('dragend', function(event){
                        var markers = event.target;
                        var position = markers.getLatLng();
                        console.log(position);
                        $('#lat').val(position.lat);
                        $('#lng').val(position.lng);
                        $('#lat-input').val(position.lat);
                        $('#lng-input').val(position.lng);
                    });
                    $('#marker_img').hide();

                }


            });

            $(document).on('change','#lng-input',function (){


                let currentLat = $('#lat-input').val();
                let currentLng = $('#lng-input').val();

                if( currentLat != '' && currentLng != '' ){
                    map.setView([currentLat, currentLng], 14);
                    let redMarker = L.icon({
                        iconUrl: '/assets/libs/css/map/images/marker-icon-2x.png',
                        iconSize: [20, 40], // size of the icon
                        shadowSize: [18, 18], // size of the shadow
                        iconAnchor: [-3, 18], // point of the icon which will correspond to marker's location
                        shadowAnchor: [4, 62], // the same for the shadow
                        popupAnchor: [0, -55], // point from which the popup should open relative to the iconAnchor
                    });
                    map.invalidateSize();
                    if( marker != '' ){
                        marker.remove();
                    }
                    marker = L.marker([currentLat, currentLng], {icon: redMarker,draggable:true}).bindPopup(
                        '<u class="text-info mb-0">مختصات نقطه:</u>'+
                        '<p class="mb-0">'+
                        '<span class="text-secondary mt-0">طول جغرافیایی: </span>'+ currentLat+ '<br>'+
                        '<span class="text-secondary">عرض جغرافیایی: </span>'+ currentLng+ '</p>').addTo(map);
                    map.addLayer(marker);

                    marker.on('dragend', function(event){
                        var markers = event.target;
                        var position = markers.getLatLng();
                        console.log(position);
                        $('#lat').val(position.lat);
                        $('#lng').val(position.lng);
                        $('#lat-input').val(position.lat);
                        $('#lng-input').val(position.lng);
                    });
                    $('#marker_img').hide();
                }


            });

            $('.tableOptions').DataTable({
                "oLanguage": {
                    "sSearch": "جستجو کنید...",
                    "sZeroRecords": "هیچ داده ای با عبارت مورد نظر یافت نشد.",
                    "sLoadingRecords": "لطفا شکیبا باشید...",
                    "sEmptyTable": "هیچ داده ای برای نمایش در دسترس موجود نیست...",
                    "oPaginate": {
                        "sFirst":      "اولین",
                        "sLast":       "آخرین",
                        "sNext":       "بعدی",
                        "sPrevious":   "قبلی"
                    },
                    "sLengthMenu": 'نمایش <select>'+
                        '<option value="10">10</option>'+
                        '<option value="20">20</option>'+
                        '<option value="30">30</option>'+
                        '<option value="40">40</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">همه</option>'+
                        '</select> نتایج',
                    "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ نتیجه",
                },

            });




        })(jQuery);
    </script>

@endsection
