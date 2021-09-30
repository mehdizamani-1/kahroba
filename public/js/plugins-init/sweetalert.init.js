
// (document.querySelector(".sweet-confirm").onclick = function () {
$(document).on('click','.sweet-confirm',function(){
    swal(
        {
            title: "مطمئناً حذف می کنید؟",
            text: "شما نمی توانید این پرونده خیالی را بازیابی کنید !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله ، آن را حذف کنید !!",
            closeOnConfirm: !1,
        },
        function () {
            swal("حذف شده !!", "سلام ، پرونده خیالی شما حذف شده است !!", "success");
        }
    );
});

// (document.querySelector(".sweet-wrong").onclick = function () {
//     sweetAlert("اوپس...", "مشکلی پیش آمد !!", "error");
// }),
// (document.querySelector(".sweet-message").onclick = function () {
//     swal("سلام ، این یک پیام است!!");
// }),
// (document.querySelector(".sweet-text").onclick = function () {
//     swal("سلام ، این یک پیام است!!", "قشنگ است ، نه؟");
// }),
// (document.querySelector(".sweet-success").onclick = function () {
//     swal("سلام ، کار خوب!!", "روی دکمه کلیک کردید !!", "success");
// }),
// (document.querySelector(".sweet-confirm").onclick = function () {
$(document).on('click','.sweet-confirm',function(){
    swal(
        {
            title: "آیا از حذف این مورد مطمئن هستید ؟",
            // text: "شما نمی توانید این پرونده خیالی را بازیابی کنید !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله ، آن را حذف کنید !!",
            closeOnConfirm: !1,
        },
        function () {
            swal("حذف شده !!", "سلام ، پرونده خیالی شما حذف شده است !!", "success");
        }
    );
});
// (document.querySelector(".sweet-success-cancel").onclick = function () {
$(document).on('click','.sweet-success-cancel',function(){
    swal(
        {
            title: "مطمئناً حذف می کنید؟",
            text: "شما نمی توانید این پرونده خیالی را بازیابی کنید !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله ، آن را حذف کنید !!",
            cancelButtonText: "نه ، آن را لغو کنید !!",
            closeOnConfirm: !1,
            closeOnCancel: !1,
        },
        function (e) {
            e ? swal("حذف شده !!", "سلام ، پرونده خیالی شما حذف شده است !!", "success") : swal("لغو شده !!", "سلام ، پرونده خیالی شما امن است !!", "error");
        }
    );
});
// (document.querySelector(".sweet-image-message").onclick = function () {
$(document).on('click','.sweet-image-message',function(){
    swal({ title: "هشدار !!", text: "سلام ، این یک تصویر سفارشی است !!", imageUrl: "../assets/images/hand.jpg" });
});
// (document.querySelector(".sweet-html").onclick = function () {
$(document).on('click','.sweet-html',function(){
    swal({ title: "هشدار !!", text: "<span style='color:#ff0000'>سلام ، شما از HTML استفاده می کنید !!<span>", html: !0 });
});
// (document.querySelector(".sweet-auto").onclick = function () {
$(document).on('click','.sweet-auto',function(){
    swal({ title: "هشدار بستن خودکار شیرین !!", text: "سلام ، من ظرف 2 ثانیه می بندم !!", timer: 2e3, showConfirmButton: !1 });
});
// (document.querySelector(".sweet-prompt").onclick = function () {
$(document).on('click','.sweet-prompt',function(){
    swal({ title: "ورودی وارد کنید !!", text: "چیز جالبی بنویسید !!", type: "input", showCancelButton: !0, closeOnConfirm: !1, animation: "slide-from-top", inputPlaceholder: "چیزی بنویسید" }, function (e) {
        return !1 !== e && ("" === e ? (swal.showInputError("شما باید چیزی بنویسید!"), !1) : void swal("سلام !!", "تو نوشتی: " + e, "success"));
    });
});
// (document.querySelector(".sweet-ajax").onclick = function () {
$(document).on('click','.sweet-ajax',function(){
    swal({ title: "درخواست آژاکس شیرین !!", text: "برای اجرای درخواست ajax ارسال کنید !!", type: "info", showCancelButton: !0, closeOnConfirm: !1, showLoaderOnConfirm: !0 }, function () {
        setTimeout(function () {
            swal("سلام ، درخواست آژاکس شما تمام شد !!");

        }, 2e3);
    });
});
