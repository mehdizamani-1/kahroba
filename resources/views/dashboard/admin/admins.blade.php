@extends('layouts.app')

@section('title')
    مدیریت کاربران
@endsection


@section('styles')

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-top blueBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class=" text-white">کاربران فعال</h5>
                                <p class="h4 mb-0">{{ $active_users }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card  greenBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class="text-white">کاربران غیرفعال</h5>
                                <p class="h4 mb-0">{{ $deactivated_users }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-top purpleBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class="text-white">تعداد سرپرست</h5>
                                <p class="h4 mb-0">{{ $supervisor_users }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-top orangeBg h-100">
                            <div class="card-body" style="text-align: center">
                                <h5 class="text-white">تعداد لاگین شده امروز</h5>
                                <p class="h4 mb-0">{{ $logged_users }}</p>

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
                                        <h5 class="card-header">لیست کاربران

                                        </h5>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table tableOptions table-striped first uniqe-class-tabel-2 tableFontSmall" id="table-id2">
                                                    <thead>
                                                    <tr>

                                                        <th>#</th>
                                                        <th>عکس پرسنلی</th>
                                                        <th>نام</th>
                                                        <th>شناسه کاربری</th>
                                                        <th>شماره همراه</th>
                                                        <th>وضعیت حساب</th>
                                                        <th>آخرین فعالیت</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach($users as $user)

                                                        <tr class="row-bg-color-green-op">
{{--                                                            <td><input type="checkbox"></td>--}}
                                                            <td>{{ $i++ }}</td>
                                                            <td>
                                                                <img src="{{   $user->avatar }}" class="roundImage"
                                                                     alt="" onerror="this.onerror=null;this.src='{{asset('assets/images/default_avatar.png')}}';">
                                                            </td>
                                                            <td>{{   $user->full_name ?? 'بدون نام'  }}</td>
                                                            <td>{{   'SPHO'.$user->id  }}</td>
                                                            <td>{{   $user->mobile ?? 'ثبت نشده'    }}</td>

                                                            @if($user->status == 1)
                                                                <td><i class="fas fa-check-circle text-success fa-sm" title="فعال"></i></td>
                                                            @elseif($user->status == 3)
                                                                <td><i class="fas fa-exclamation-circle text-warning fa-sm" title="استفاده موقت"></i></td>
                                                            @elseif($user->status == 4)
                                                                <td><i class="fas fa-pause-circle text-danger fa-sm" title="معلق"></i></td>
                                                            @else
                                                                <td><i class="fas fa-times-circle text-danger fa-sm" title="غیر فعال"></i></td>
                                                            @endif
                                                            <td><a href="{{ '/admins/log?operator_id='.$user->id }}">{{ gregorian_to_jalali_string($user->last_login, true) ?? '' }}</a></td>
                                                            <td>
                                                                <a href="{{   '/admin/edit/'.$user->id  }}" style="color: white" class="btn shadow btn-xs sharp mr-1 icon-pencil">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a  style="color: white" data-id="{{ $user->id }}"  class="btn shadow btn-xs sharp icon-trash delete-row " title="حذف">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
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




    <a href="/admin/create" type="button" class="bigPlus" style="background-color: var(--newcolor)">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </a>

@endsection




{{--@section('include_scripts')--}}
{{--    --}}
{{--@endsection--}}



@section('scripts')


    <script src="/vendor/sweetalert2/dist/sweetalert.min.js"></script>
    <script src="/vendor/sweetalert2/dist/jquery.sweet-alert.custom.js"></script>


    <script>

        $(document).ready(function () {
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
                        url: "/admin/delete/"+remove_id,
                        type: "GET",
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
