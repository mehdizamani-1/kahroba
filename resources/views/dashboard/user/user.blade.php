@extends('layouts.app')

@section('title')
    {{ $user->fname . ' ' . $user->lname }}
@endsection


@section('styles')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/libs/css/persian-datepicker.min.css">

    <link rel="stylesheet" href="/assets/libs/css/bootstrap-datepicker.min.css"/>
    <link href="/vendor/sweetalert2/dist/sweetalert.css" rel="stylesheet">

    <style>
        .select2-selection{
            width: 180px !important;
            height: 36px;
            overflow-y: scroll;
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
                                        <h5 class="card-header">مشاهده اطلاعات فرد</h5>
                                        <div class="card-body">
                                            <form name="">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <form>
                                                            <div class="col-12">
                                                                <div class="card p-2">
                                                                    <div class="card-body">
                                                                        <div class="basic-form">
                                                                            <div class="row">
                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="1" placeholder="" class="formField text-red" value ="{{ $user->fname . ' ' . $user->lname }}">
                                                                                    <label for="1" class="formLabel">نام و نام خانوادگی</label>
                                                                                </div>
                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="1" placeholder="" class="formField text-red" value ="{{ $user->mobile }}">
                                                                                    <label for="1" class="formLabel">شماره همراه</label>
                                                                                </div>

                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="1" placeholder="" class="formField text-red" value ="{{ ($user->active)?'فعال':'غیرفعال' }}">
                                                                                    <label for="1" class="formLabel">وضعیت</label>
                                                                                </div>
                                                                                @php
                                                                                    $devices = $user->devices();
                                                                                    $total = count($devices);
                                                                                    $credit_panels = '';
                                                                                    foreach ($devices as $device){
                                                                                        $credit_panels .= gregorian_to_jalali_string($device->expire_date, false) . '|';
                                                                                    }
                                                                                    $credit_panels = rtrim($credit_panels, '|');
                                                                                @endphp
                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="3" class="formField" placeholder="" value="{!! $total !!}">
                                                                                    <label for="3" class="formLabel">تعداد دستگاه ها<span class="otherSelectName"></span></label>
                                                                                </div>

                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="3" class="formField" placeholder=" " value="{{ $credit_panels }}">
                                                                                    <label for="3" class="formLabel">اعتبار پنل های کاربر<span class="otherSelectName"></span></label>
                                                                                </div>

                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="3" class="formField" placeholder=" " value="{{ gregorian_to_jalali_string($user->last_login, true) }}">
                                                                                    <label for="3" class="formLabel">آخرین ورود<span class="otherSelectName"></span></label>
                                                                                </div>

                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="26" class="formField" placeholder=" " value="{{ ($user->gender)?'مذکر':'مونث' }}">
                                                                                    <label for="26" class="formLabel">جنسیت<span class="otherSelectName"></span></label>
                                                                                </div>

                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="4" class="formField" placeholder=" " value="{{ $user->national_id }}">
                                                                                    <label for="4" class="formLabel">کد ملی<span class="otherSelectName"></span></label>
                                                                                </div>

                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="4" class="formField" placeholder=" " value="{{ (isset($ref))?$ref->fname. ' ' . $ref->lname:'' }}">
                                                                                    <label for="4" class="formLabel">معرف<span class="otherSelectName"></span></label>
                                                                                </div>
                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="4" class="formField" placeholder=" " value="{{ gregorian_to_jalali_string($user->created_at, true) }}">
                                                                                    <label for="4" class="formLabel">تاریخ ثبت نام<span class="otherSelectName"></span></label>
                                                                                </div>
                                                                                <div class="formGroup col-sm-6 col-md-4 col-lg-3 p-1 mt-2">
                                                                                    <input disabled type="text" id="4" class="formField" placeholder=" " value="{{ gregorian_to_jalali_string($user->created_at, true) }}">
                                                                                    <label for="4" class="formLabel">ریست<span class="otherSelectName"></span></label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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
            <div class="row">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content">
                        <div class="ecommerce-widget">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">تراکنش ها</h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table tableOptions table-striped first uniqe-class-tabel-2 tableFontSmall" id="table-id2">
                                                    <thead>
                                                    <tr>

                                                        <th>#</th>
                                                        <th>کد سفارش</th>
                                                        <th>مجموع خرید</th>
                                                        <th>مجموع تخفیف</th>
                                                        <th>وضعیت سفارش</th>
                                                        <th>زمان ثبت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach($transactions as $transaction)
                                                        @php
                                                            $status = $transaction->delivery_status();
                                                        @endphp
                                                        <tr class="row-bg-color-green-op">
                                                            <td>{{ $i++ }}</td>
                                                            <td><a href="{{ route('transaction', ['id' => $transaction->id]) }}">{{ $transaction->purchase_code }}</a></td>
                                                            <td>{{ number_format($transaction->total_price) }}</td>
                                                            <td>{{ number_format($transaction->total_off) }}</td>
                                                            <td>{!! $status !!}</td>
                                                            <td>{{ gregorian_to_jalali_string($transaction->created_at, true) }}</td>
                                                        </tr>


                                                    @endforeach


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">خودروها</h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table tableOptions table-striped first uniqe-class-tabel-2 tableFontSmall" id="table-id2">
                                                    <thead>
                                                    <tr>

                                                        <th>#</th>
                                                        <th>نام خودرو</th>
                                                        <th>شماره پشتیبان</th>
                                                        <th>تصویر</th>
                                                        <th>شماره ثبتی</th>
                                                        <th>شماره ریموت</th>
                                                        <th>آخرین موقعیت</th>
                                                        <th>زمان ثبت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach($cars as $car)

                                                        <tr class="row-bg-color-green-op">
                                                            <td>{{ $i++ }}</td>
                                                            <td><a href="{{ route('car', ['id' => $car->id]) }}">{{ $car->car_name ?? 'ثبت نشده' }}</a></td>
                                                            <td>{{ $car->sos }}</td>
                                                            <td>
                                                                <img data-src="{{ $base_url }}/{{ $car->icon }}" src="{{ $base_url . '/' . $car->icon }}" class="roundImage ct-img pointer"
                                                                     alt="" onerror="this.onerror=null;this.src='{{asset('assets/images/default_avatar.png')}}';">
                                                            </td>
                                                            <td>{{ $car->ref_mobile ?? 'ثبت نشده' }}</td>
                                                            <td>{{ $car->remote_mobile ?? 'ثبت نشده' }}</td>
                                                            <td>
                                                                <a href="javascript:void(0)" class="showMap" data-id="<?=$car['last_lat'] . ',' .$car['last_lng'] ?>">
                                                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                                                </a>
                                                            </td>
                                                            <td>{{ gregorian_to_jalali_string($car->created_at, true) }}</td>

                                                        </tr>


                                                    @endforeach


                                                    </tbody>

                                                </table>
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
    <div class="modal fade" id="mapModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="bus_id" name="bus_id">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">موقعیت خودرو
                        <span class="text-danger" id="busCode"></span>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div id="mapLeaflet" class="map-size customer-form-add" placeholder="مختصات روی نقشه"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>

@endsection




{{--@section('include_scripts')--}}
{{--    --}}
{{--@endsection--}}



@section('scripts')


    <script src="/assets/libs/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/js/bootstrap-datepicker.fa.min.js"></script>

    <script src="/vendor/sweetalert2/dist/sweetalert.min.js"></script>
    <script src="/vendor/sweetalert2/dist/jquery.sweet-alert.custom.js"></script>

    <script>
        let map = L.map('mapLeaflet', {
            zoomControl: true,
            // fullscreenControl: true,
            attributionControl: false
        }).setView([35.7197398307386, 51.26451456959719], 12);
        //fullscreen start

        //fullscreen end

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        setInterval(function () {
            map.invalidateSize();
        }, 1000);
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var marker = '' ;
            var return_line = '' ;
            $(document).on('click', '.showMap', function () {
                let coordinates = $(this).attr('data-id').split('|');
                if( marker != '' )
                    map.removeLayer(marker);
                if( return_line != '' )
                    map.removeLayer(return_line);
                if( coordinates.length >= 2 ){
                    var route = [];
                    for( let i = 0; i < coordinates.length; i++ ){
                        let coordinate = coordinates[i].split(',');
                        console.log(coordinate);
                        if( coordinate[0] > 0 && coordinate[1] > 0 ){
                            route.push([coordinate[0], coordinate[1]]);
                            map.setView([coordinate[0], coordinate[1]], 13)

                        }
                    }

                    return_line = L.polyline(route, {color: '#e20b37'}).addTo(map);
                    $('#mapModal').modal('show');
                }else{
                    let coordinate = $(this).attr('data-id').split(',');

                    // $('#bus_id').val(coordinate);
                    // $('#bus_title').val(coordinate);
                    let lat = coordinate[0];
                    let lng = coordinate[1];
                    console.log(lat +'  ' + lng);
                    map.invalidateSize();

                    let busMarker = L.icon({
                        iconUrl: '/images/default_images/bus.png',
                        iconSize: [20, 30], // size of the icon
                        shadowSize: [38, 38], // size of the shadow
                        iconAnchor: [0, 25], // point of the icon which will correspond to marker's location
                        shadowAnchor: [4, 62], // the same for the shadow
                        popupAnchor: [0, -55], // point from which the popup should open relative to the iconAnchor
                    });
                    map.setView([lat, lng], 13)
                    marker = L.marker([lat, lng], {icon: busMarker}).addTo(map);
                    // marker.bindPopup("<b>نشانگر!</b><br>نشانگر موقعیت اغنتخابی").openPopup();
                    // L.marker( [35.7197398307386, 51.26451456959719] )
                    //     .bindPopup(
                    //         '<p class="text-danger">'+ 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،' +'</p>'+
                    //         '<p class="text-info">'+'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صن،'+'</p>'+
                    //         '<br>'+
                    //         '<img class="imgInPopup text-center" src="assets/images/busStation.jpg">'+
                    //         '<br>'+
                    //         '<a class="btn btn-success btn-sm m-auto mr-3 justify-content-center text-center" href="">'+
                    //         'دکمه کاربردی' +
                    //         '</a>')
                    //     .addTo(map);
                    $('#mapModal').modal('show');
                }

            });



            //////////////////////////////// for zoom image
            $('.ct-img').click(function(){
                var data = $(this);
                $('#img-modal').modal('show',data);
            });
            $('#img-modal').on('show.bs.modal', function (event) {
                var img = $(event.relatedTarget);
                var src = img.data('src');
                $(this).find('.ct-img-mod').attr('src',src);

            });


            $('#table-id2').DataTable({
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
                    "LengthMenu": 'نمایش <select>'+
                        '<option value="10">10</option>'+
                        '<option value="20">20</option>'+
                        '<option value="30">30</option>'+
                        '<option value="40">40</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">همه</option>'+
                        '</select> نتایج',
                    "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ نتیجه",
                    "buttons": {
                        'copy': '<img style="padding:0;" width="40px" height="40px" src="/assets/images/icons/copy.svg" title="کپی در حافظه موقت">',
                        'excel': '<img style="padding:0;" width="40px" height="40px" src="/assets/images/icons/tableIcon/excel.svg" title="خروجی فایل اکسل">',
                        'pdf': '<img style="padding:0;" width="40px" height="40px" src="/assets/images/icons/tableIcon/pdf.svg" title="خروجی فایل پی دی اف">',
                        'print': '<img style="padding:0;" width="40px" height="40px" src="/assets/images/icons/tableIcon/printer.svg" title="پرینت جدول">'
                    }
                },

                pagingType: "full_numbers",
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                // responsive: true,

                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });



            $('.dt-buttons.btn-group.flex-wrap button.btn.buttons-html5 , .buttons-print').removeClass('btn-secondary')
            $('.dt-buttons.btn-group.flex-wrap button.btn.buttons-html5 , .buttons-print').addClass('btn-primary').css({'border-radius':'5px','margin-left':'10px'})

        });
    </script>

@endsection
