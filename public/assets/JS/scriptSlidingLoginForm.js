$(document).ready(function(){
			$(".veen-sliding-form .rgstr-btn button").click(function(){
				$('.veen-sliding-form .wrapper-sliding-form').addClass('move');
				$(".veen-sliding-form .login-btn-sliding-form button").removeClass('active');
				$(this).addClass('active');
			});
			$(".veen-sliding-form .login-btn-sliding-form button").click(function(){
				$('.veen-sliding-form .wrapper-sliding-form').removeClass('move');
				$(".veen-sliding-form .rgstr-btn button").removeClass('active');
				$(this).addClass('active');
			});
});

$(document).ready(function () {
		if ($('.veen-sliding-form input').val() == ""){
			$('.veen-sliding-form input').siblings('label').css('transform', 'translateY(35px)  rotateX(360deg)')
		}else{
			$('.veen-sliding-form input ').siblings('label').css({'transform':'translateY(0px)'})
		}

	$('.veen-sliding-form input ').focus(function () {
		if ($(this).val() == ""){
			$(this).css('border','linear-gradient("to bottom,red,green, yellow, purple") 0 0 100% 0;')
			$(this).siblings('label').css('transform', 'translateY(0px)  rotateX(360deg)')
		}
	})


	$('.veen-sliding-form input').focusout(function(){
		if ($(this).val() == ""){
			$(this).css('border-image','linear-gradient("to right,#621940,#843b62, #f67e7d, #ffb997") 0 0 100% 0;')
			$(this).siblings('label').css('transform','translateY(35px)')
		}
	})

})