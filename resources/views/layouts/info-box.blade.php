
@section('styles')
    <style>
        .alert-info{
            margin-bottom: 0px !important;
            position: fixed !important;
        }
    </style>
@append

@if(\Session::has('Fail'))
    <div class="alert alert-danger alert-dismissable alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>{{ \Session::get('Fail') }}</center>
    </div>
    <br>
    <?php
    \Session::forget('Fail');
    ?>
@endif

@if(\Session::has('fail'))
    <div class="alert alert-danger alert-dismissable alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>{{ \Session::get('fail') }}</center>
    </div>
    <?php
    \Session::forget('fail');
    ?>
@endif

@if(\Session::has('warning'))
    <div class="alert alert-warning alert-dismissable  alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <center>{{ \Session::get('warning') }}</center>
    </div>

    <?php
    \Session::forget('warning');
    ?>
@endif

@if(\Session::has('Success'))
    <div class="alert alert-success alert-dismissable  alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>{{ \Session::get('Success') }}</center>

    </div>
    <?php
    \Session::forget('Success');
    ?>

@endif

@if(\Session::has('success'))
    <div class="alert alert-success alert-dismissable  alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>{{ \Session::get('success') }}</center>

    </div>
    <?php
    \Session::forget('success');
    ?>
@endif

@if(Session::has('errors') )
    @foreach(Session::get('errors')->all() as $error)
        @if( $error == 'validation.captcha')
            <div class="alert alert-warning alert-dismissable  alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <center>کد امنیتی اشتباه میباشد</center>
            </div>
        @else
            <div class="alert alert-warning alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <center>{{ $error }}</center>
            </div>
        @endif
    @endforeach

    @php
        \Session::forget('errors');
    @endphp
@endif

@if(Session::has('error') )
    <div class="alert alert-danger alert-dismissable alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>{{ \Session::get('error') }}</center>
    </div>

    @php
        \Session::forget('error');
    @endphp
@endif

<div class="custom_flash_message" >

</div>

