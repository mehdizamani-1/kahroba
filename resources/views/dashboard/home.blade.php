@extends('layouts.app')

@section('title')
    صفحه اصلی
@endsection


@section('styles')

    <!-- select2222 css  -->



    <style>
        .select2-container{
            width: 180px !important;
            height: 36px;
            /*overflow-y: scroll;*/
        }

        .pwt-btn-calendar {
            display: none !important;
        }

        /*TIMELINE STYLE*/
        .mt-70 {
            margin-top: 70px
        }

        .mb-70 {
            margin-bottom: 70px
        }

        .card {
            box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
            border-width: 0;
            transition: all .2s
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(26, 54, 126, 0.125);
            border-radius: .25rem
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .vertical-timeline {
            width: 100%;
            position: relative;
            padding: 1.5rem 0 1rem
        }

        .vertical-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 67px;
            height: 100%;
            width: 4px;
            background: #e9ecef;
            border-radius: .25rem
        }

        .vertical-timeline-element {
            position: relative;
            margin: 0 0 1rem
        }

        .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
            visibility: visible;
            animation: cd-bounce-1 .8s
        }

        .vertical-timeline-element-icon {
            position: absolute;
            top: 0;
            left: 60px
        }

        .vertical-timeline-element-icon .badge-dot-xl {
            box-shadow: 0 0 0 5px #fff
        }

        .badge-dot-xl {
            width: 18px;
            height: 18px;
            position: relative
        }

        .badge:empty {
            display: none
        }

        .badge-dot-xl::before {
            content: '';
            width: 10px;
            height: 10px;
            border-radius: .25rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -5px 0 0 -5px;
            background: #fff
        }

        .vertical-timeline-element-content {
            position: relative;
            margin-left: 90px;
            font-size: .8rem
        }

        .vertical-timeline-element-content .timeline-title {
            font-size: .8rem;
            text-transform: uppercase;
            margin: 0 0 .5rem;
            padding: 2px 0 0;
            font-weight: bold
        }

        .vertical-timeline-element-content .vertical-timeline-element-date {
            display: block;
            position: absolute;
            left: -90px;
            top: 0;
            padding-right: 10px;
            text-align: right;
            color: #adb5bd;
            font-size: .7619rem;
            white-space: nowrap
        }

        .vertical-timeline-element-content:after {
            content: "";
            display: table;
            clear: both
        }
        .vertical-timeline-element:hover{
            background-color: rgba(200,200,200,0.15);
        }
        /*.select2-container {*/
        /*    width: 90% !important;*/
        /*}*/

        .select2-container .select-all {
            position: absolute;
            top: 6px;
            right: 4px;
            width: 20px;
            height: 20px;
            margin: auto;
            display: block;
            background: url('data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNDc0LjggNDc0LjgwMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc0LjggNDc0LjgwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zOTYuMjgzLDI1Ny4wOTdjLTEuMTQtMC41NzUtMi4yODItMC44NjItMy40MzMtMC44NjJjLTIuNDc4LDAtNC42NjEsMC45NTEtNi41NjMsMi44NTdsLTE4LjI3NCwxOC4yNzEgICAgYy0xLjcwOCwxLjcxNS0yLjU2NiwzLjgwNi0yLjU2Niw2LjI4M3Y3Mi41MTNjMCwxMi41NjUtNC40NjMsMjMuMzE0LTEzLjQxNSwzMi4yNjRjLTguOTQ1LDguOTQ1LTE5LjcwMSwxMy40MTgtMzIuMjY0LDEzLjQxOCAgICBIODIuMjI2Yy0xMi41NjQsMC0yMy4zMTktNC40NzMtMzIuMjY0LTEzLjQxOGMtOC45NDctOC45NDktMTMuNDE4LTE5LjY5OC0xMy40MTgtMzIuMjY0VjExOC42MjIgICAgYzAtMTIuNTYyLDQuNDcxLTIzLjMxNiwxMy40MTgtMzIuMjY0YzguOTQ1LTguOTQ2LDE5LjctMTMuNDE4LDMyLjI2NC0xMy40MThIMzE5Ljc3YzQuMTg4LDAsOC40NywwLjU3MSwxMi44NDcsMS43MTQgICAgYzEuMTQzLDAuMzc4LDEuOTk5LDAuNTcxLDIuNTYzLDAuNTcxYzIuNDc4LDAsNC42NjgtMC45NDksNi41Ny0yLjg1MmwxMy45OS0xMy45OWMyLjI4Mi0yLjI4MSwzLjE0Mi01LjA0MywyLjU2Ni04LjI3NiAgICBjLTAuNTcxLTMuMDQ2LTIuMjg2LTUuMjM2LTUuMTQxLTYuNTY3Yy0xMC4yNzItNC43NTItMjEuNDEyLTcuMTM5LTMzLjQwMy03LjEzOUg4Mi4yMjZjLTIyLjY1LDAtNDIuMDE4LDguMDQyLTU4LjEwMiwyNC4xMjYgICAgQzguMDQyLDc2LjYxMywwLDk1Ljk3OCwwLDExOC42Mjl2MjM3LjU0M2MwLDIyLjY0Nyw4LjA0Miw0Mi4wMTQsMjQuMTI1LDU4LjA5OGMxNi4wODQsMTYuMDg4LDM1LjQ1MiwyNC4xMyw1OC4xMDIsMjQuMTNoMjM3LjU0MSAgICBjMjIuNjQ3LDAsNDIuMDE3LTguMDQyLDU4LjEwMS0yNC4xM2MxNi4wODUtMTYuMDg0LDI0LjEzNC0zNS40NSwyNC4xMzQtNTguMDk4di05MC43OTcgICAgQzQwMi4wMDEsMjYxLjM4MSw0MDAuMDg4LDI1OC42MjMsMzk2LjI4MywyNTcuMDk3eiIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwYXRoIGQ9Ik00NjcuOTUsOTMuMjE2bC0zMS40MDktMzEuNDA5Yy00LjU2OC00LjU2Ny05Ljk5Ni02Ljg1MS0xNi4yNzktNi44NTFjLTYuMjc1LDAtMTEuNzA3LDIuMjg0LTE2LjI3MSw2Ljg1MSAgICBMMjE5LjI2NSwyNDYuNTMybC03NS4wODQtNzUuMDg5Yy00LjU2OS00LjU3LTkuOTk1LTYuODUxLTE2LjI3NC02Ljg1MWMtNi4yOCwwLTExLjcwNCwyLjI4MS0xNi4yNzQsNi44NTFsLTMxLjQwNSwzMS40MDUgICAgYy00LjU2OCw0LjU2OC02Ljg1NCw5Ljk5NC02Ljg1NCwxNi4yNzdjMCw2LjI4LDIuMjg2LDExLjcwNCw2Ljg1NCwxNi4yNzRsMTIyLjc2NywxMjIuNzY3YzQuNTY5LDQuNTcxLDkuOTk1LDYuODUxLDE2LjI3NCw2Ljg1MSAgICBjNi4yNzksMCwxMS43MDQtMi4yNzksMTYuMjc0LTYuODUxbDIzMi40MDQtMjMyLjQwM2M0LjU2NS00LjU2Nyw2Ljg1NC05Ljk5NCw2Ljg1NC0xNi4yNzRTNDcyLjUxOCw5Ny43ODMsNDY3Ljk1LDkzLjIxNnoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K') no-repeat center;
            background-size: contain;
            cursor: pointer;
            z-index: 100;
        }
    </style>
@endsection


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @include('layouts.info-box')
            <div class="row">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content pt-0">
                        <div class="topWidgets mb-2">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card border-top blueBg h-100">
                                        <div class="card-body">

                                            <div class="d-inline-block pr-3 text-white">
                                                <h5 class=" text-white">بازدید امروز</h5>
                                                <p class="h4 mb-0">{{ 0 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card  greenBg h-100">
                                        <div class="card-body">
                                            <div class="d-inline-block pr-3 text-white">
                                                <h5 class="text-white">شهرهای فعال</h5>
                                                <p class="h4 mb-0">{{ 0 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card border-top purpleBg h-100">
                                        <div class="card-body">
                                            <div class="d-inline-block pr-3 text-white">
                                                <h5 class="text-white">تعداد کاربران</h5>
                                                <p class="h4 mb-0"> {{ 0 }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card border-top orangeBg h-100">
                                        <div class="card-body">
                                            <div class="d-inline-block pr-3 text-white">
                                                <h5 class="text-white">تعداد مکان ها</h5>
                                                <p class="h4 mb-0">{{ 0 }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="ecommerce-widget">

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">

                                        <a class="accordionButtonStyle" id="collapseHandleMap">
                                            <h5 class="card-header" >نقشه
                                                <i id="rotateToggleIcon" class="fas fa-sort-down"></i></h5>
                                        </a>

                                        <div class="card-body collapse p-0" id="collapseMap">


                                            <div id="mapLeaflet" class="customer-form-add"
                                                 placeholder="ثبت نشانی روی نقشه">
                                            </div>
                                            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

                                            <ul class="col-12 mapHelp mt-1 mb-1">
                                                <li class="mr-1 d-inline-flex">
														<span class="pl-1"
                                                              style="border-left:1px dotted var(--newcolor)">
															<svg width="1.5em" height="1.5em" version="1.1" id="Capa_1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                 y="0px" viewBox="0 0 512.046 512.046"
                                                                 style="enable-background:new 0 0 512.046 512.046;"
                                                                 xml:space="preserve">
																<g transform="translate(-1 -1)">
																	<g transform="translate(1 1)">
																		<path style="fill:#2E7D32;"
                                                                              d="M495.131,483.032c-1.268,5.887-4.522,11.16-9.216,14.933c-4.54,3.598-10.164,5.553-15.957,5.547 H42.096c-1.894,0.022-3.784-0.179-5.632-0.597c-6.833-1.525-12.743-5.782-16.354-11.779c-3.611-5.997-4.609-13.212-2.761-19.965 l38.912-142.677l6.571-23.808l17.408-63.915c3.036-11.122,13.132-18.843,24.661-18.859h28.587 c12.203,36.096,59.307,55.637,109.397,58.453c58.709,3.413,121.344-16.043,135.68-58.453h28.587 c11.529,0.016,21.625,7.736,24.661,18.859l9.472,34.56l6.741,24.747l46.677,171.093 C495.777,475.036,495.923,479.1,495.131,483.032z" />
																		<path style="fill:#4CAF50;"
                                                                              d="M468.848,483.032c-1.268,5.887-4.522,11.16-9.216,14.933c-4.54,3.598-10.165,5.553-15.957,5.547 H42.096c-1.894,0.022-3.784-0.179-5.632-0.597c-6.833-1.525-12.743-5.782-16.354-11.779c-3.611-5.997-4.609-13.212-2.761-19.965 l38.912-142.677l6.571-23.808l17.408-63.915c3.036-11.122,13.132-18.843,24.661-18.859h23.125 c14.251,42.411,56.064,61.867,114.859,58.453c50.005-2.816,97.195-22.357,109.397-58.453h28.587 c11.529,0.016,21.625,7.736,24.661,18.859l9.472,34.56l6.741,24.747l46.677,171.093C469.494,475.036,469.64,479.1,468.848,483.032 z" />
																		<path style="fill:#C52828;"
                                                                              d="M392.56,145.112c0,103.68-89.515,218.539-123.563,258.475c-3.235,3.723-7.915,5.875-12.847,5.908 c-4.932,0.033-9.64-2.057-12.924-5.737l-0.256-0.256c-35.755-41.984-132.352-166.144-122.795-273.408 C126.798,65.58,178.282,14.848,242.886,9.176h0.171c5.075-0.499,10.176-0.698,15.275-0.597 C332.835,9.836,392.571,70.598,392.56,145.112z" />
																		<path style="fill:#F44335;"
                                                                              d="M366.96,145.112c0,103.68-89.515,218.539-123.563,258.475l-0.171,0.171l-0.256-0.256 c-35.755-41.984-132.352-166.144-122.795-273.408C126.798,65.58,178.282,14.848,242.886,9.176h0.171 C313.262,15.698,366.954,74.605,366.96,145.112z" />
																		<path style="fill:#F57C00;"
                                                                              d="M298.694,170.712l0,38.741c0.011,3.308-1.298,6.483-3.637,8.822 c-2.339,2.339-5.514,3.648-8.822,3.636h-60.416c-3.308,0.011-6.483-1.298-8.822-3.636c-2.339-2.339-3.648-5.514-3.637-8.822 l0-38.741H298.694z" />
																		<path style="fill:#FF9801;"
                                                                              d="M273.094,170.712l0,38.741c0.011,3.308-1.298,6.483-3.637,8.822 c-2.339,2.339-5.514,3.648-8.822,3.636h-34.816c-3.308,0.011-6.483-1.298-8.822-3.636c-2.339-2.339-3.648-5.514-3.637-8.822 l0-38.741H273.094z" />
																		<path style="fill:#0377BC;"
                                                                              d="M298.694,142.808v27.904H213.36l0-27.904c-0.007-6.181,2.445-12.11,6.816-16.48 c4.37-4.37,10.3-6.823,16.48-6.816h38.741c6.181-0.007,12.11,2.445,16.48,6.816C296.248,130.698,298.701,136.628,298.694,142.808z " />
																		<path style="fill:#02A9F4;"
                                                                              d="M273.094,142.808v27.904H213.36l0-27.904c-0.007-6.181,2.445-12.11,6.816-16.48 c4.37-4.37,10.3-6.823,16.48-6.816h13.141c6.181-0.007,12.11,2.445,16.48,6.816C270.648,130.698,273.101,136.628,273.094,142.808z " />
																	</g>
																	<g>
																		<path
                                                                            d="M43.079,513.046h427.895c10.639,0,20.67-4.961,27.128-13.416c6.458-8.456,8.603-19.439,5.802-29.703l-62.831-230.4 c-4.078-14.834-17.554-25.123-32.939-25.148h-16.836c6.856-22.12,10.491-45.111,10.795-68.267 C401.756,67.091,338.497,2.738,259.493,1.046c-75.201-1.876-139.175,54.447-146.842,129.28 c-1.948,28.401,1.465,56.915,10.061,84.053h-16.794c-15.384,0.025-28.861,10.314-32.939,25.148l-62.839,230.4 c-2.801,10.266-0.655,21.25,5.805,29.706C22.405,508.089,32.438,513.048,43.079,513.046z M127.32,456.905 c2.999-2.331,6.689-3.595,10.487-3.593h147.2l14.225,42.667H77.102L127.32,456.905z M316.658,495.979 c0.037-0.911-0.075-1.822-0.333-2.697l-13.321-39.97h49.135c12.941,0.043,24.782-7.273,30.532-18.867l13.227-26.453l84.83,84.83 c-2.846,2.037-6.254,3.14-9.754,3.157H316.658z M487.615,475.567l-83.627-83.627l39.467-78.933l43.972,161.417 C487.547,474.799,487.538,475.183,487.615,475.567z M408.135,231.446c7.698-0.002,14.445,5.151,16.469,12.578l12.066,44.245 l-69.265,138.59c-2.891,5.777-8.807,9.414-15.266,9.387l-86.579,0v-18.773c0.179-0.068,0.358-0.111,0.538-0.179 c0.538-0.213,1.118-0.316,1.647-0.563c0.708-0.324,1.331-0.853,2.014-1.203c2.525-1.405,4.791-3.232,6.699-5.402 c1.468-1.707,3.029-3.584,4.642-5.513l0.427-0.512c28.766-34.492,78.507-100.642,104.166-172.621L408.135,231.446z M129.65,131.827c6.791-65.076,61.95-114.319,127.377-113.715h2.202c69.701,1.503,125.505,58.283,125.798,128 c-0.439,25.009-4.884,49.785-13.167,73.387c-0.13,0.217-0.247,0.443-0.35,0.674c-24.644,72.943-76.937,141.585-103.04,172.902 l-0.333,0.401c-1.707,2.005-3.234,3.866-4.668,5.538c-1.666,1.827-4.029,2.861-6.502,2.843c-2.473-0.018-4.821-1.086-6.46-2.937 c-1.229-1.434-2.56-3.063-3.994-4.736l-1.707-2.048l-2.705-3.294c-1.886-2.304-3.84-4.719-5.973-7.364l-0.051-0.06 C196.62,331.78,121.492,224.004,129.65,131.827z M89.449,244.024c2.025-7.427,8.771-12.58,16.469-12.578h22.391 c25.6,71.74,75.093,137.754,104.363,172.8c1.707,2.005,3.302,3.934,4.83,5.726c2.919,3.371,6.67,5.919,10.88,7.39h0.094v18.884 H137.808c-1.173,0.037-2.344,0.134-3.507,0.29L69.882,315.755L89.449,244.024z M26.627,474.424L63.32,339.751l54.844,102.818 c-0.435,0.307-0.905,0.538-1.323,0.853L49.3,495.979h-6.221c-5.316-0.004-10.327-2.486-13.553-6.712 S25.229,479.553,26.627,474.424z" />
																		<path
                                                                            d="M223.551,265.579h66.953l1.263,3.174c1.298,3.239,4.438,5.362,7.927,5.359c1.087-0.001,2.164-0.207,3.174-0.606 c2.101-0.841,3.783-2.482,4.674-4.562s0.92-4.43,0.079-6.531l-0.538-1.34c0.72-1.222,1.114-2.609,1.143-4.028 c-0.026-3.689-2.445-6.935-5.973-8.013l-7.603-19.004c8.145-3.057,13.55-10.833,13.577-19.533v-66.679 c-0.023-17.574-14.264-31.814-31.838-31.838h-4.267l17.843-29.739c1.586-2.64,1.627-5.929,0.106-8.607 c-1.52-2.678-4.366-4.329-7.445-4.321h-34.133c-4.713,0-8.533,3.821-8.533,8.533s3.821,8.533,8.533,8.533h19.063l-15.36,25.6 h-14.507c-17.584,0.009-31.84,14.254-31.863,31.838v66.679c0.024,8.695,5.421,16.47,13.559,19.533l-7.586,19.004 c-3.529,1.078-5.948,4.323-5.973,8.013c0.031,1.415,0.425,2.799,1.143,4.019l-0.538,1.34c-0.841,2.101-0.813,4.451,0.079,6.531 c0.891,2.08,2.573,3.722,4.674,4.562c1.01,0.402,2.087,0.611,3.174,0.614c3.49,0.003,6.629-2.12,7.927-5.359L223.551,265.579z M230.377,248.512l6.827-17.067h39.646l6.827,17.067H230.377z M231.231,214.379h-4.471c-2.138-0.009-3.866-1.745-3.866-3.883 v-30.251h68.267v30.251c0,2.144-1.738,3.883-3.883,3.883h-56.03H231.231z M237.648,129.046h38.724 c8.159,0.005,14.774,6.612,14.788,14.771v19.362h-68.267v-19.362c0.014-8.152,6.619-14.757,14.771-14.771H237.648z" />
																		<circle cx="239.96" cy="197.312" r="8.533" />
																		<circle cx="274.094" cy="197.312" r="8.533" />
																	</g>
																</g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
																<g></g>
															</svg>
														</span>
                                                    <span class="pr-1 pt-1">مکان ها</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>





                            </div>


                            <div class="row">


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" >
                                    <div class="card">
                                        <h5 class="card-header"> آخرین کاربران </h5>
                                        <div class="card-body p-0">
                                            <ul class="traffic-sales list-group list-group-flush p-0 ul-li-striped">
                                                @foreach( $last_users as $last_user )
                                                    <li class="traffic-sales-content list-group-item ">
                                                        <span class="traffic-sales-name">کاربر  {{ $last_user['full_name'] }}</span>
                                                        <span class="traffic-sales-amount text-center">{{ gregorian_to_jalali_pro($last_user['created_at'], true) }}</span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="/users" class="btn-primary-link">نمایش همه</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" >
                                    <div class="card">
                                        <h5 class="card-header"> آخرین مکان ها </h5>
                                        <div class="card-body p-0">
                                            <ul class="traffic-sales list-group list-group-flush p-0 ul-li-striped">
                                                @foreach( $last_users as $last_user )
                                                    <li class="traffic-sales-content list-group-item ">
                                                        <span class="traffic-sales-name">کاربر  {{ $last_user['full_name'] }}</span>
                                                        <span class="traffic-sales-amount text-center">{{ gregorian_to_jalali_pro($last_user['created_at'], true) }}</span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="/users" class="btn-primary-link">نمایش همه</a>
                                        </div>
                                    </div>
                                </div>





                                @if( isset($last_news) )
                                    @foreach( $last_news as $news )
                                <div class="col-12">

                                        <div class="card">
                                            <h5 class="card-header collapseHandleNews" style="cursor: pointer" data-id="{{ $news->id }}" > {{ $news['title'] }}</h5>

                                                    <div class="card-body pr-4 pl-4 text-justify collapseNews{{ $news->id }}" style="display: none">

                                                                {!! $news['content'] !!}

                                                    </div>

                                        </div>

                                </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">تایم لاین جدیدترین تفییرات</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        {{--                                                <h5 class="card-title">تایم لاین اتوبوس</h5>--}}
                                        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-warning"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                        <b><p class="timeline-title">بارگزاری تمام صفحات</p></b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-danger"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                        <b><p class="timeline-title">بارگزاری صفحات گزارش</p></b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-primary"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                        <b><p class="timeline-title">رفع باگ و اتصال به دستگاه</p></b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-danger"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                        <b><p class="timeline-title">اصلاح دسترسی های کاربر</p></b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-item vertical-timeline-element">
                                                <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-warning"> </i> </span>
                                                    <div class="vertical-timeline-element-content bounce-in">
                                                        <b><p class="timeline-title">اصلاح نقشه آفلاین</p></b>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                {{--                                        <button type="button" class="btn btn-primary">دخیره</button>--}}
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection
@section('scripts')



    <script>
        let buses = [] ;
        let lines = [] ;
        let stations = [] ;
        // $(document).ready(function() {
        //     $('.js-example-basic-multiple').select2() ;
        // }) ;
    </script>
    <script src="/js/bootstrap.js"></script>
    <!--shortcut widget javascript-->

    <script>
        /**
         * -----------------------------------------------------
         *       MAP SCRIPT
         *       MAP SCRIPT
         *       MAP SCRIPT
         * ------------------------------------------------------
         */

        let coordinates = '';
        let latlangleaflet = [];
        let coordinates_string = '';
        let markers = [];

        let lat_view = '35.70058695988636';
        let lng_view = '51.391091109149585';

        let map = L.map('mapLeaflet', {
                zoomControl: true,
                // fullscreenControl: true,
                attributionControl: false
            }).setView([lat_view, lng_view], 14);

        //fullscreen start
        map.addControl(new L.Control.Fullscreen({
            title: {
                'false': 'تمام صفحه',
                'true': 'خروج از تمام صفحه'
            }
        }));
        //fullscreen end




        getDataFromStorage = localStorage.getItem('bodyVersion');
        let darkModeMap = 'https://api.mapbox.com/styles/v1/nasiopars/cko83zuao1p6k19p10b1ns8ds/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoibmFzaW9wYXJzIiwiYSI6ImNrY3JpejBnYTFmNmsycnM2MGVmaThtZ2sifQ.Rw_6my-C0Xlv2rWWwSVWyA';
        let lightModeMap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        if (getDataFromStorage ==='light'){
            // L.tileLayer('https://maps.googleapis.com/maps/api/js?sensor=false', {
            //     maxZoom: 21,
            // }).addTo(map);
            L.tileLayer(lightModeMap, {
                attribution: '&copy; <a href="https://www.farahamgostar.ir"></a> contributors'
            }).addTo(map);
        }else if(getDataFromStorage ==='dark'){
            L.tileLayer(darkModeMap, {
                attribution: '&copy; <a href="https://www.farahamgostar.ir"></a> contributors'
            }).addTo(map);
        }



        var coordinates_went = [];
        var coordinates_return = [];
        let went_color = '';
        let return_color = '';
        let Markers = [];


        // PolylineArray(redMarker, )


        function resetMap(){
            let i = 0;
            map.eachLayer(function (layer) {
                if( i != 0 )
                    map.removeLayer(layer);
                i++;
            });


            getDataFromStorage = localStorage.getItem('bodyVersion');
            let darkModeMap = 'https://api.mapbox.com/styles/v1/nasiopars/cko83zuao1p6k19p10b1ns8ds/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoibmFzaW9wYXJzIiwiYSI6ImNrY3JpejBnYTFmNmsycnM2MGVmaThtZ2sifQ.Rw_6my-C0Xlv2rWWwSVWyA';
            let lightModeMap = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            if (getDataFromStorage ==='light'){
                // L.tileLayer('https://maps.googleapis.com/maps/api/js?sensor=false', {
                //     maxZoom: 21,
                // }).addTo(map);
                L.tileLayer(lightModeMap, {
                    attribution: '&copy; <a href="https://www.farahamgostar.ir"></a> contributors'
                }).addTo(map);
            }else if(getDataFromStorage ==='dark'){
                L.tileLayer(darkModeMap, {
                    attribution: '&copy; <a href="https://www.farahamgostar.ir"></a> contributors'
                }).addTo(map);
            }
            $(".MG-overlay-pane svg g path").remove();

            Markers=[];
        }



        function Point(marker, lat, lng, draggable = false, returnLatId = '', returnLngId = ''){
            var marker = L.marker([lat, lng], {icon: marker,draggable:draggable}).addTo(map);
            if( draggable ){
                marker.on('dragend', function(event){
                    var Marker_ = event.target;
                    var position = Marker_.getLatLng();
                    $('#'+returnLatId).val(position.lat);
                    $('#'+returnLngId).val(position.lng);
                });
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


        //additional option
        var newzoom = '' + (2*(map.getZoom())) +'px';
        $(map).css({'width':newzoom,'height':newzoom});


        //Marker
        var i = 0;


        setInterval(function () {
            map.invalidateSize();
            // map2.invalidateSize();
        }, 1000);


        // map.on('click', onMapClick);
        coordinates += '35.70163,51.39211' + '|';
        // var Google_Layer = L.setGoogle(map);
        // var Google_Layer2 = L.setGoogle(map2);





    </script>
    <script>
        $(document).ready(function(){

            //SHOW DATE ON TOP PAGE

            $(document).on('click tap','.collapseHandleNews',function () {
                let id = $(this).attr('data-id');
                id = 'collapseNews' + id;
                $('.'+ id).slideToggle(300,"swing");
            });



        });
    </script>

@endsection
