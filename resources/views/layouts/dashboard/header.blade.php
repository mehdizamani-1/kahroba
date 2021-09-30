<div class="nav-header">
    <a href="/" class="brand-logo">
        <img class="logo-abbr" src="/assets/images/logo.png" alt="">
        <span class="brand-title" style="font-size: 13px">
            @foreach($setting as $key)
                @if( $key['key'] == 'main_system_title' )
                    {!! $key['value'] !!}
                @endif
            @endforeach
        </span>
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
</div>


<div class="header">

    {{--    {{var_dump($operator)}}--}}

    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">

                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="جستجو" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li>
                        <p id="showDate" class="resizeSmall"></p>
                    </li>



                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-fullscreen" href="#">
                            <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                            <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                        </a>
                    </li>

                    <li id="showHeaderProfile" class="nav-item dropdown header-profile notification_dropdown">
                        <a class="nav-link" style="cursor: pointer">
                            <img src="{{Session::get('operator')['avatar']}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/default_avatar.png') }}'" width="20" alt=""/>
                            <div class="header-info">
                                <span>سلام,
                                    <strong>
                                        {{ Session::get('operator')['full_name'] ?? 'بدون نام'}}
                                    </strong>
                                </span>
                                <small>خوش آمدید</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="container-fluid pb-1">
                                <a class="" href="">
                                    <img src="{{Session::get('operator')['avatar']}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/default_avatar.png') }}'" width="20" alt=""/>
                                    <span class="text-primary"><strong> {{ Session::get('operator')['full_name'] ?? 'بدون نام'}}  </strong></span>
                                </a>
{{--                                <div class="text-center ">--}}
{{--                                    <small>آخرین ورود :</small>--}}
{{--                                    <small>1400/02/10 19:20</small>--}}
{{--                                </div>--}}
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="/user/profile" onclick="window.location='/user/profile'" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">پروفایل </span>
                            </a>
                            <a href="/ticket/receive/show" onclick="window.location='/ticket/receive/show'" class="dropdown-item ai-icon">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span class="ml-2">صندوق ورودی </span>
                            </a>
                            <a href="/auth/logout" onclick="window.location='/auth/logout'" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">خروج</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item right-sidebar">
                        <a class="nav-link bell ai-icon" href="#">

                            <svg aria-hidden="true" focusable="false" width="30px" height="30px" data-prefix="fas" data-icon="palette" class="svg-inline--fa fa-palette fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</div>





{{--@include('layouts.includes.dashboard.simcart_modal');--}}
