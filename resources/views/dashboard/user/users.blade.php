@extends('layouts.app')

@section('title')
    کاربران
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
                                <h5 class=" text-white">کاربران فعال</h5>
                                <p class="h4 mb-0">{{ 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card  greenBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class="text-white">کاربران غیرفعال</h5>
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
                                                        <th>نام</th>
                                                        <th>موبایل</th>
                                                        <th>کد ملی</th>
                                                        <th>آخرین بازدید</th>
                                                        <th>تعداد دستگاه</th>
                                                        <th>اعتبار پنل</th>
                                                        <th>زمان ثبت</th>
                                                        <th>بیشتر</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach($users as $user)
                                                        @php
                                                        $devices = $user->devices();
                                                        $total = count($devices);
                                                        $credit_panels = '';
                                                        foreach ($devices as $device){
                                                            $credit_panels .= gregorian_to_jalali_string($device->expire_date, false) . '|';
                                                        }
                                                        $credit_panels = rtrim($credit_panels, '|');
                                                        @endphp
                                                        <tr class="row-bg-color-green-op">

                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $user->fname . ' ' . $user->lname }}</td>
                                                            <td>{{ $user->mobile }}</td>
                                                            <td>{{ $user->national_id }}</td>
                                                            <td>{{ gregorian_to_jalali_string($user->last_login, true) }}</td>
                                                            <td><a href="/devices?user_id={{ $user->id }}">{{ $total }}</a></td>
                                                            <td>{{ $credit_panels }}</td>
                                                            <td>{{ gregorian_to_jalali_string($user->created_at, true) }}</td>

                                                            <td>
                                                                <a href="{{ '/user/'.$user->id  }}" style="color: white" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                    <i class="fas fa-arrow-left"></i>
                                                                </a>
                                                                <button data-id="{{ $user['id'] }}" type="button" class="btn btn-xs btn-toggle btn-primary @if( $user['active'] == 1 ) active @endif toggle-row" data-toggle="button" @if( $user['active'] == 1 )  aria-pressed="true" @else  aria-pressed="false" @endif autocomplete="off">
                                                                    <div class="handle"></div>
                                                                </button>
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


@endsection




{{--@section('include_scripts')--}}
{{--    --}}
{{--@endsection--}}



@section('scripts')


    <script src="/assets/libs/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/js/bootstrap-datepicker.fa.min.js"></script>



    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /////////////////////////////// for toggle
            $('.toggle-row').click(function () {
                var change_id = $(this).attr('data-id');
                $.post('{{ route('user.toggle') }}', {
                    user_id: change_id
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
