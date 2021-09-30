@extends('layouts.app')

@section('title')
    مختصات و مکان ها
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
            <div class="topWidgets mb-2">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-top blueBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class=" text-white">مکان های فعال</h5>
                                <p class="h4 mb-0">{{ 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card  greenBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class="text-white">مکان های غیرفعال</h5>
                                <p class="h4 mb-0">{{ 0 }}</p>
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
                                        <h5 class="card-header">لیست

                                        </h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table tableOptions table-striped first uniqe-class-tabel-2 tableFontSmall" id="table-id2">
                                                    <thead>
                                                    <tr>

                                                        <th>#</th>
                                                        <th>عنوان</th>
                                                        <th>تصویر</th>
                                                        <th>استریت ویو</th>
                                                        <th>تور مجازی</th>
                                                        <th>مختصات</th>
                                                        <th>زمان ثبت</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach($locations as $location)

                                                        <tr class="row-bg-color-green-op">
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $location->title }}</td>
                                                            <td>
                                                                <img data-src="{{ $base_url }}/{{ $location->main_pic }}" src="{{ $base_url . '/' . $location->main_pic }}" class="roundImage ct-img pointer"
                                                                     alt="" onerror="this.onerror=null;this.src='{{asset('assets/images/default_avatar.png')}}';">
                                                            </td>
                                                            <td><a href="{{ $location->street_view }}">مشاهده</a></td>
                                                            <td><a href="{{ $location->virtual_tour }}">مشاهده</a></td>
                                                            <td>
                                                                <a href="javascript:void(0)" class="showMap" data-id="<?=$location['lat'] . ',' . $location['lng']?>">
                                                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                                                </a>
                                                            </td>
                                                            <td>{{ gregorian_to_jalali_string($location->created_at, true) }}</td>
                                                            <td>
                                                                <a href="{{ '/locations/'.$location->id.'/edit' }}" style="color: white" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a  style="color: white" data-id="{{ $location->id }}"  class="btn shadow btn-xs sharp icon-trash delete-row " title="حذف">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
{{--                                                                <button data-id="{{ $location['id'] }}" type="button" class="btn btn-xs btn-toggle btn-primary @if( $location['active'] == 1 ) active @endif toggle-row" data-toggle="button" @if( $location['active'] == 1 )  aria-pressed="true" @else  aria-pressed="false" @endif autocomplete="off">--}}
{{--                                                                    <div class="handle"></div>--}}
{{--                                                                </button>--}}
                                                            </td>
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


    <!-- Modal -->
    <div class="modal center-modal fade" id="img-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تصویر</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" style="width: 100%; height: 300px"  alt="" class="ct-img-mod">
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
                    <h4 class="modal-title">موقعیت
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
        let coordinates = '';
        let latlangleaflet = [];
        let coordinates_string = '';
        let markers = [];

        function getLoc(){
            $('table').on('click',function(e){
                let getLoc = $(e.target).attr('data-id');
                console.log(getLoc);
                let convert = getLoc.split("|");
                console.log(convert);
            });
        }

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
                        iconUrl: '/assets/libs/css/map/images/marker-icon-2x.png',
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
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete-row').click(function () {

                var remove_id = $(this).attr('data-id');
                var this_ = $(this);
                swal({
                    title: "مطمئنید؟",
                    text: "قادر به بازگرداندن نیست!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "بله، حذف شود!",
                    cancelButtonText: "لغو",
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (!isConfirm) return;
                    $.ajax({
                        url: "/locations/"+remove_id,
                        type: "DELETE",
                        data: {
                            line_id: remove_id
                        },
                        dataType: "html",
                        success: function () {
                            this_.parent().parent().remove();
                            swal("انجام شد!", "با موفقیت حذف شد!", "success");
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("خطا در حذف!", "خطا در حذف", "error");
                        }
                    });
                });
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
            /////////////////////////////// for toggle
            $('.toggle-row').click(function () {
                var change_id = $(this).attr('data-id');
                $.post('/locations/toggle', {
                    location_id: change_id
                }, function (Res) {
                    console.log(Res);
                    if( Res['status_number'] == 1 ) {
                        var rows = $('.toggle-row');
                        for (var j = 0; j < rows.length; j++) {
                            var id_attach = rows[j].getAttribute('data-id');
                            if (id_attach == change_id) {
                                if (Res['active'] == 1) {
                                    rows[j].classList.add("active");
                                    rows[j].setAttribute('aria-pressed', 'true');
                                } else {
                                    rows[j].classList.remove("active");
                                    rows[j].setAttribute('aria-pressed', 'false');
                                }
                            }
                        }
                    }
                    if (Res['status'] === 'error') {
                        alert(Res['message']);
                    }
                });

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
                columnDefs: [
                    {
                        orderable: true ,
                        targets: 7,
                    }
                ],
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
