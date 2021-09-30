<script src="/assets/vendor/jquery/jquery-3.5.1.min.js"></script>

<script>
    $(window).on('load', function(event) {
        $('#loader').delay(500).fadeOut(500);
    });
</script>
<script src="/vendor/global/global.min.js"></script>



<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/vendor/jquery/jquery-3.5.1.min.js"></script>

<script src="/vendor/global/global.min.js"></script>
<script src="/js/custom.min.js"></script>
<!--    <script src="vendor/chartist/js/chartist.min.js"></script>-->
<script src="/js/dashboard/dashboard-1.js"></script>

<script src="/assets/libs/js/popper.min.js"></script>
<script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="/assets/libs/js/main-js.js"></script>
<script src="/assets/vendor/charts/morris-bundle/raphael.min.js"></script>

<script src="/assets/libs/js/datatables.js"></script>
<script src="/assets/libs/js/Map/leaflet.js"></script>
<script src="/assets/libs/js/Map/mg.js"></script>
<script src="/assets/libs/js/Map/fullscreen.min.js"></script>

<script src="/assets/libs/js/select2.min.js"></script>

<script src="/assets/libs/js/jquery.multi-select.js" type="text/javascript"></script>
<script src="/assets/libs/js/jquery.quicksearch.js" type="text/javascript"></script>









<script src="/js/bootstrap.js"></script>
<script>
    var direction =  getUrlParams('dir') ;
    if(direction != 'rtl') {
        direction = 'ltr';
    }

    new dezSettings({
        typography: "roboto",
        version: "light",
        layout: "vertical",
        headerBg: "color_1",
        navheaderBg: "color_3",
        sidebarBg: "color_1",
        sidebarStyle: "full",
        sidebarPosition: "fixed",
        headerPosition: "fixed",
        containerLayout: "wide",
        direction: direction
    });
    //SHOW DATE ON TOP PAGE
    var hour = '{{ date('H') }}';
    var minutes = '{{ date('i') }}';
    var seconds = '{{ date('s') }}';
    let kk = 0;
    let myHour;//sundte.getHours();
    let myMin;//sundte.getMinutes();
    let mySec;//sundte.getSeconds();
    function timer(){
        let sundte = new Date();
        let yeardte = sundte.getFullYear();
        let monthdte = sundte.getMonth();
        let dtedte = sundte.getDate();
        let daydte = sundte.getDay();

        if( kk != 0 ){
            mySec++;
            if( mySec == 60 ){
                myMin++;
                mySec = 0;
                if( myMin == 60){
                    myHour++;
                    myMin = 0;
                    mySec = 0;
                    if(myHour == 24){
                        myHour = 0;
                        myMin = 0;
                        mySec = 0;
                    }
                }
            }
        }else{
            myHour = hour;//sundte.getHours();
            myMin = minutes;//sundte.getMinutes();
            mySec = seconds;//sundte.getSeconds();
            kk++;
        }
        let sunyear;
        switch (daydte) {
            case 0:
                var today = "يکشنبه";
                break;
            case 1:
                var today = "دوشنبه";
                break;
            case 2:
                var today = "سه شنبه";
                break;
            case 3:
                var today = "چهارشنبه";
                break;
            case 4:
                var today = "پنجشنبه";
                break;
            case 5:
                var today = "جمعه";
                break;
            case 6:
                var today = "شنبه";
                break;
        }
        switch (monthdte) {
            case 0:
                sunyear = yeardte - 622;
                if (dtedte <= 20) {
                    var sunmonth = "دي";
                    var daysun = dtedte + 10;
                } else {
                    var sunmonth = "بهمن";
                    var daysun = dtedte - 20;
                }
                break;
            case 1:
                sunyear = yeardte - 622;
                if (dtedte <= 19) {
                    var sunmonth = "بهمن";
                    var daysun = dtedte + 11;
                } else {
                    var sunmonth = "اسفند";
                    var daysun = dtedte - 19;
                }
                break;
            case 2:
            {
                if ((yeardte - 621) % 4 == 0) var i = 10;
                else var i = 9;
                if (dtedte <= 20) {
                    sunyear = yeardte - 622;
                    var sunmonth = "اسفند";
                    var daysun = dtedte + i;
                } else {
                    sunyear = yeardte - 621;
                    var sunmonth = "فروردين";
                    var daysun = dtedte - 20;
                }
            }
                break;
            case 3:
                sunyear = yeardte - 621;
                if (dtedte <= 20) {
                    var sunmonth = "فروردين";
                    var daysun = dtedte + 11;
                } else {
                    var sunmonth = "ارديبهشت";
                    var daysun = dtedte - 20;
                }
                break;
            case 4:
                sunyear = yeardte - 621;
                if (dtedte <= 21) {
                    var sunmonth = "ارديبهشت";
                    var daysun = dtedte + 10;
                } else {
                    var sunmonth = "خرداد";
                    var daysun = dtedte - 21;
                }

                break;
            case 5:
                sunyear = yeardte - 621;
                if (dtedte <= 21) {
                    var sunmonth = "خرداد";
                    var daysun = dtedte + 10;
                } else {
                    var sunmonth = "تير";
                    var daysun = dtedte - 21;
                }
                break;
            case 6:
                sunyear = yeardte - 621;
                if (dtedte <= 22) {
                    var sunmonth = "تير";
                    var daysun = dtedte + 9;
                } else {
                    var sunmonth = "مرداد";
                    var daysun = dtedte - 22;
                }
                break;
            case 7:
                sunyear = yeardte - 621;
                if (dtedte <= 22) {
                    var sunmonth = "مرداد";
                    var daysun = dtedte + 9;
                } else {
                    var sunmonth = "شهريور";
                    var daysun = dtedte - 22;
                }
                break;
            case 8:
                sunyear = yeardte - 621;
                if (dtedte <= 22) {
                    var sunmonth = "شهريور";
                    var daysun = dtedte + 9;
                } else {
                    var sunmonth = "مهر";
                    var daysun = dtedte + 22;
                }
                break;
            case 9:
                sunyear = yeardte - 621;
                if (dtedte <= 22) {
                    var sunmonth = "مهر";
                    var daysun = dtedte + 8;
                } else {
                    var sunmonth = "آبان";
                    var daysun = dtedte - 22;
                }
                break;
            case 10:
                sunyear = yeardte - 621;
                if (dtedte <= 21) {
                    var sunmonth = "آبان";
                    var daysun = dtedte + 9;
                } else {
                    var sunmonth = "آذر";
                    var daysun = dtedte - 21;
                }

                break;
            case 11:
                sunyear = yeardte - 621;
                if (dtedte <= 19) {
                    var sunmonth = "آذر";
                    var daysun = dtedte + 9;
                } else {
                    var sunmonth = "دي";
                    var daysun = dtedte + 21;
                }
                break;
        }
        document.getElementById("showDate").innerHTML =
            myHour + ":" +
            myMin + ":" + mySec + " - " + "&nbsp;" +
            today + "&nbsp;" + [daysun ] + "&nbsp;" + sunmonth +
            "&nbsp;" + sunyear
        // setTimeout(function () {
        //     timer();
        // }, 1000);
    };

    setInterval(function () {
        timer();
    }, 1000);




</script>
