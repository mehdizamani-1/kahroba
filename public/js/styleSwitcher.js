function addSwitcher()
{
    var dzSwitcher = '<div class="sidebar-right show ">' +
        '<div class="sidebar-right-inner">' +
        '<div class="tab-content tab-content-default tabcontent-border">' +
        '<div class="tab-pane fade active show" id="home8" role="tabpanel">' +
        '<div class="admin-settings">' +
        // '<p>استایل خود را انتخاب کنید</p>' +
        '<div>' +
        '<p>  حالت نمایش روز یا شب</p>' +
        ' شب  ' +
        '<label class="switch">'+
        '<input type="checkbox" id="switchDayNight">'+
        '<span class="slider round"></span>'+
        '</label>'+
        '  روز  ' +

        '</div>' +
        '' +
        '<div>' +
        '<hr class="mb-2 mt-2">'+
        '<p>رنگ اصلی سامانه</p>' +
        '<div>' +
        // '<p style="display:inline-block;vertical-align:super;font-size:x-small;padding-left:5px;margin-top:10px;">پیش فرض رنگ:</p>'+
            '<span><input type="radio" name="main-app-color" value="color_1" class="filled-in chk-col-primary" id="defaultAppColor"><label for="defaultAppColor" style="background-color:#3a7afe;"></label></span>'+

            '<p style="display:inline-block;vertical-align:super;font-size:x-small;padding:0px 10px 0 5px;margin-top:10px;">انتخاب رنگ:</p>'+
            '<span><input type="color" style="padding: 0;width: 28px;height: 30px;border-radius:4px; margin: 0px 0px 0px 4px;vertical-align: top; border:none; cursor:pointer;" name="" value="" class="filled-in chk-col-primary" id="mainAppColor"><label for="mainAppColor"></label></span>'+
        '</div>'+

        '<hr class="mb-2 mt-2">'+
        '<p>رنگ جعبه لوگو</p>' +
        '<div>'+
        '<span><input type="radio" name="navigation_header" value="color_1" class="filled-in chk-col-primary" id="nav_header_color_1"><label for="nav_header_color_1"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_2" class="filled-in chk-col-primary" id="nav_header_color_2"><label for="nav_header_color_2"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_3" class="filled-in chk-col-primary" id="nav_header_color_3"><label for="nav_header_color_3"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_4" class="filled-in chk-col-primary" id="nav_header_color_4"><label for="nav_header_color_4"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_5" class="filled-in chk-col-primary" id="nav_header_color_5"><label for="nav_header_color_5"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_6" class="filled-in chk-col-primary" id="nav_header_color_6"><label for="nav_header_color_6"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_7" class="filled-in chk-col-primary" id="nav_header_color_7"><label for="nav_header_color_7"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_8" class="filled-in chk-col-primary" id="nav_header_color_8"><label for="nav_header_color_8"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_9" class="filled-in chk-col-primary" id="nav_header_color_9"><label for="nav_header_color_9"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_10" class="filled-in chk-col-primary" id="nav_header_color_10"><label for="nav_header_color_10"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_11" class="filled-in chk-col-primary" id="nav_header_color_11"><label for="nav_header_color_11"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_12" class="filled-in chk-col-primary" id="nav_header_color_12"><label for="nav_header_color_12"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_13" class="filled-in chk-col-primary" id="nav_header_color_13"><label for="nav_header_color_13"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_14" class="filled-in chk-col-primary" id="nav_header_color_14"><label for="nav_header_color_14"></label></span>' +
        '<span><input type="radio" name="navigation_header" value="color_15" class="filled-in chk-col-primary" id="nav_header_color_15"><label for="nav_header_color_15"></label></span>' +
        '</div>' +
        '</div>' +
        '' +
        '<div>' +

        '<hr class="mb-2 mt-2">'+
        '<p>رنگ نوار بالایی</p>' +
        '<div>' +
        '<span><input type="radio" name="header_bg" value="color_1" class="filled-in chk-col-primary" id="header_color_1"><label for="header_color_1"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_2" class="filled-in chk-col-primary" id="header_color_2"><label for="header_color_2"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_3" class="filled-in chk-col-primary" id="header_color_3"><label for="header_color_3"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_4" class="filled-in chk-col-primary" id="header_color_4"><label for="header_color_4"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_5" class="filled-in chk-col-primary" id="header_color_5"><label for="header_color_5"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_6" class="filled-in chk-col-primary" id="header_color_6"><label for="header_color_6"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_7" class="filled-in chk-col-primary" id="header_color_7"><label for="header_color_7"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_8" class="filled-in chk-col-primary" id="header_color_8"><label for="header_color_8"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_9" class="filled-in chk-col-primary" id="header_color_9"><label for="header_color_9"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_10" class="filled-in chk-col-primary" id="header_color_10"><label for="header_color_10"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_11" class="filled-in chk-col-primary" id="header_color_11"><label for="header_color_11"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_12" class="filled-in chk-col-primary" id="header_color_12"><label for="header_color_12"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_13" class="filled-in chk-col-primary" id="header_color_13"><label for="header_color_13"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_14" class="filled-in chk-col-primary" id="header_color_14"><label for="header_color_14"></label></span>' +
        '<span><input type="radio" name="header_bg" value="color_15" class="filled-in chk-col-primary" id="header_color_15"><label for="header_color_15"></label></span>' +
        '</div>' +
        '</div>' +
        '<div>' +


        '<hr class="mb-2 mt-2">'+
        '<p>رنگ نوار کناری</p>' +
        '<div>' +
        '<span><input type="radio" name="sidebar_bg" value="color_1" class="filled-in chk-col-primary" id="sidebar_color_1"><label for="sidebar_color_1"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_2" class="filled-in chk-col-primary" id="sidebar_color_2"><label for="sidebar_color_2"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_3" class="filled-in chk-col-primary" id="sidebar_color_3"><label for="sidebar_color_3"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_4" class="filled-in chk-col-primary" id="sidebar_color_4"><label for="sidebar_color_4"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_5" class="filled-in chk-col-primary" id="sidebar_color_5"><label for="sidebar_color_5"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_6" class="filled-in chk-col-primary" id="sidebar_color_6"><label for="sidebar_color_6"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_7" class="filled-in chk-col-primary" id="sidebar_color_7"><label for="sidebar_color_7"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_8" class="filled-in chk-col-primary" id="sidebar_color_8"><label for="sidebar_color_8"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_9" class="filled-in chk-col-primary" id="sidebar_color_9"><label for="sidebar_color_9"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_10" class="filled-in chk-col-primary" id="sidebar_color_10"><label for="sidebar_color_10"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_11" class="filled-in chk-col-primary" id="sidebar_color_11"><label for="sidebar_color_11"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_12" class="filled-in chk-col-primary" id="sidebar_color_12"><label for="sidebar_color_12"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_13" class="filled-in chk-col-primary" id="sidebar_color_13"><label for="sidebar_color_13"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_14" class="filled-in chk-col-primary" id="sidebar_color_14"><label for="sidebar_color_14"></label></span>' +
        '<span><input type="radio" name="sidebar_bg" value="color_15" class="filled-in chk-col-primary" id="sidebar_color_15"><label for="sidebar_color_15"></label></span>' +
        '</div>' +

        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    if($("#dzSwitcher").length == 0) {
        jQuery('.styleSwitcherBox').append(dzSwitcher);
        const sr = new PerfectScrollbar('.sidebar-right-inner');
    }
}
jQuery(window).on('load',function(){

});
(function($) {
    "use strict"
    addSwitcher();

    const body = $('body');
    const html = $('html');

    //get the DOM elements from right sidebar
    const typographySelect = $('#typography');
    const versionSelect = $('#switchDayNight');
    const hamburgerSelect = $('.hamburger');
    const layoutSelect = $('#theme_layout');
    const sidebarStyleSelect = $('#sidebar_style');
    const sidebarPositionSelect = $('#sidebar_position');
    const headerPositionSelect = $('#header_position');
    const containerLayoutSelect = $('#container_layout');
    const themeDirectionSelect = $('#theme_direction');
    const firstDefaultColor = '#3a7afe';

    //change the theme typography controller
    typographySelect.on('change', function() {
        body.attr('data-typography', this.value);
    });

    //change the theme version controller
    versionSelect.on('change', function() {
        if ($(this).is(':checked')) {
            // switchStatus = $(this).is(':checked');
            // alert(switchStatus);// To verify
            body.attr('data-theme-version', 'dark');
            if(typeof(localStorage) !== "undefined") {
                localStorage.setItem('bodyVersion','dark');
            }
        }else {
            body.attr('data-theme-version', 'light');
            if(typeof(localStorage) !== "undefined") {
                localStorage.setItem('bodyVersion','light');
            }
        }
    }); //change the theme version controller
    hamburgerSelect.on('click', function() {
        if ($(this).hasClass('is-active')) {
            // switchStatus = $(this).is(':checked');
            // alert(switchStatus);// To verify
            // body.attr('data-theme-version', 'dark');
            if(typeof(localStorage) !== "undefined") {
                localStorage.setItem('toggleStatus','false');
            }
        }else {
            // body.attr('data-theme-version', 'light');
            if(typeof(localStorage) !== "undefined") {
                localStorage.setItem('toggleStatus','true');
            }
        }
    });

    //change the sidebar position controller
    sidebarPositionSelect.on('change', function() {
        this.value === "fixed" && body.attr('data-sidebar-style') === "modern" && body.attr('data-layout') === "vertical" ?
            alert("Sorry, Modern sidebar layout dosen't support fixed position!") :
            body.attr('data-sidebar-position', this.value);
    });

    //change the header position controller
    headerPositionSelect.on('change', function() {
        body.attr('data-header-position', this.value);
    });

    //change the theme direction (rtl, ltr) controller
    themeDirectionSelect.on('change', function() {
        html.attr('dir', this.value);
        html.attr('class', '');
        html.addClass(this.value);
        body.attr('direction', this.value);
    });

    //change the theme layout controller
    layoutSelect.on('change', function() {
        if(body.attr('data-sidebar-style') === 'overlay') {
            body.attr('data-sidebar-style', 'full');
            body.attr('data-layout', this.value);
            return;
        }

        body.attr('data-layout', this.value);
    });

    //change the container layout controller
    containerLayoutSelect.on('change', function() {
        if(this.value === "boxed") {

            if(body.attr('data-layout') === "vertical" && body.attr('data-sidebar-style') === "full") {
                body.attr('data-sidebar-style', 'overlay');
                body.attr('data-container', this.value);
                return;
            }
        }

        body.attr('data-container', this.value);
    });

    //change the sidebar style controller
    sidebarStyleSelect.on('change', function() {
        if(body.attr('data-layout') === "horizontal") {
            if(this.value === "overlay") {
                alert("Sorry! Overlay is not possible in Horizontal layout.");
                return;
            }
        }

        if(body.attr('data-layout') === "vertical") {
            if(body.attr('data-container') === "boxed" && this.value === "full") {
                alert("Sorry! Full menu is not available in Vertical Boxed layout.");
                return;
            }

            if(this.value === "modern" && body.attr('data-sidebar-position') === "fixed") {
                alert("Sorry! Modern sidebar layout is not available in the fixed position. Please change the sidebar position into Static.");
                return;
            }
        }

        body.attr('data-sidebar-style', this.value);

        if(body.attr('data-sidebar-style') === 'icon-hover') {
            $('.deznav').hover(function() {
                $('#main-wrapper').addClass('icon-hover-toggle');
            }, function() {
                $('#main-wrapper').removeClass('icon-hover-toggle');
            });
        }
    });

    //change the nav-header background controller
    $('input[name="navigation_header"]').on('click', function() {
        body.attr('data-nav-headerbg', this.value);
        if(typeof(localStorage) !== "undefined") {
            localStorage.setItem('logoBoxVersion',this.value);
            // localStorage
        }
    });

    //change the header background controller
    $('input[name="header_bg"]').on('click', function() {
        body.attr('data-headerbg', this.value);
        if(typeof(localStorage) !== "undefined") {
            localStorage.setItem('headerBoxVersion',this.value);
        }
    });

    //change the sidebar background controller
    $('input[name="sidebar_bg"]').on('click', function() {
        body.attr('data-sibebarbg', this.value);
        if(typeof(localStorage) !== "undefined") {
            localStorage.setItem('sidebarVersion',this.value);
        }
    });

    //change the primary color controller
    $('input[name="primary_bg"]').on('click', function() {
        body.attr('data-primary', this.value);
    });


    //  ADDED FOR SELECT A COLOR AND CHANGE MAIN COLOR OF APP
    $(document).on('load',function () {
        let getMainColorOfStorage = localStorage.getItem('sidebarVersion');
        if(getStorageMainColor !== null){
            document.documentElement.style.setProperty('--newcolor',selectedMainColor);
        } else {
            document.documentElement.style.setProperty('--newcolor',firstDefaultColor);
        }
    })

    $(document).on('change','#mainAppColor',function () {
        let selectedMainColor = $(this).val();
        localStorage.setItem('mainColorApp',selectedMainColor);
        document.documentElement.style.setProperty('--newcolor',selectedMainColor);
    });

    $(document).on('click', '#defaultAppColor', function () {
        localStorage.setItem('mainColorApp',firstDefaultColor);
        document.documentElement.style.setProperty('--newcolor', firstDefaultColor);
    });

})(jQuery);


