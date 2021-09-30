$(document).ready(function(){
    $(document).on('keyup change ', '.success', function (){
        let pattern = $(this).attr('pattern');
        let required = $(this).attr('required');
        let min = $(this).attr('min');
        let max = $(this).attr('max');
        let type = $(this).attr('type');

        // if( typeof type != 'undefined' ){
        //     let val = $(element).val();
        //
        //     if( val > max ){
        //         $(element).addClass('error');
        //         let error = $(element).parent().children('.invalid-feedback');
        //         if( error.length == 1 ){
        //             error.css('display', 'block');
        //         }else{
        //             $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
        //                 '                                                               مقدار بزرگتر از حد مجاز است\n' +
        //                 '                                                            </div>')
        //         }
        //     }else{
        //         $(element).removeClass('error');
        //         let error = $(element).parent().children('.invalid-feedback');
        //         if( error.length == 1 ){
        //             error.css('display', 'none');
        //         }
        //     }
        // }
        if( typeof required != 'undefined' ){
            let val = $(this).val();

            if( val == '' || val == null ){

                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                                این فیلد اجباری می باشد\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
        if( typeof pattern != 'undefined' ){
            let val = $(this).val();
            var Pattern = new RegExp(pattern);

            // console.log(Pattern.test(val));
            if( !Pattern.test(val) ){
                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                               مطابق الگو نمی باشد\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
        if( typeof min != 'undefined' ){
            let val = $(this).val();

            if( val < min ){
                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                               مقدار کوچکتر از حد مجاز است\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
        if( typeof max != 'undefined' ){
            let val = $(this).val();

            if( val > max ){
                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                               مقدار بزرگتر از حد مجاز است\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
    });
    $(document).on('keyup change ', '.error', function (){
        let pattern = $(this).attr('pattern');
        let required = $(this).attr('required');
        let min = $(this).attr('min');
        let max = $(this).attr('max');
        let type = $(this).attr('type');

        // if( typeof type != 'undefined' ){
        //     let val = $(element).val();
        //
        //     if( val > max ){
        //         $(element).addClass('error');
        //         let error = $(element).parent().children('.invalid-feedback');
        //         if( error.length == 1 ){
        //             error.css('display', 'block');
        //         }else{
        //             $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
        //                 '                                                               مقدار بزرگتر از حد مجاز است\n' +
        //                 '                                                            </div>')
        //         }
        //     }else{
        //         $(element).removeClass('error');
        //         let error = $(element).parent().children('.invalid-feedback');
        //         if( error.length == 1 ){
        //             error.css('display', 'none');
        //         }
        //     }
        // }
        if( typeof required != 'undefined' ){
            let val = $(this).val();
            if( val == '' || val == null ){

                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                                این فیلد اجباری می باشد\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
        if( typeof pattern != 'undefined' ){
            let val = $(this).val();
            var Pattern = new RegExp(pattern);

            if( !Pattern.test(val) ){
                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                               مطابق الگو نمی باشد\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
        if( typeof min != 'undefined' ){
            let val = $(this).val();

            if( val < min ){
                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                               مقدار کوچکتر از حد مجاز است\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
        if( typeof max != 'undefined' ){
            let val = $(this).val();

            if( val > max ){
                $(this).addClass('error');
                $(this).removeClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'block');
                }else{
                    $(this).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                        '                                                               مقدار بزرگتر از حد مجاز است\n' +
                        '                                                            </div>')
                }
            }else{
                $(this).removeClass('error');
                $(this).addClass('success');
                let error = $(this).parent().children('.invalid-feedback');
                if( error.length == 1 ){
                    error.css('display', 'none');
                }
            }
        }
    });
    (function () {
        'use strict';
        // window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName(
            'jvalidate');


        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(
            forms,
            function (form) {
                form.addEventListener('submit',
                    function (event) {
                        // alert();

                        if (form
                                .checkValidity() ===
                            false) {
                            event
                                .preventDefault();
                            event
                                .stopPropagation();
                            // get all elements to form

                            $("form").each(function(){
                                let elements = $(form).find(':input');

                                let rand;
                                $.each( elements, function( key, element ) {
                                    let disabled = $(element).attr('disabled');
                                    if( !disabled ){
                                        let pattern = $(element).attr('pattern');
                                        let required = $(element).attr('required');
                                        let min = $(element).attr('min');
                                        let max = $(element).attr('max');
                                        let type = $(element).attr('type');

                                        // if( typeof type != 'undefined' ){
                                        //     let val = $(element).val();
                                        //
                                        //     if( val > max ){
                                        //         $(element).addClass('error');
                                        //         let error = $(element).parent().children('.invalid-feedback');
                                        //         if( error.length == 1 ){
                                        //             error.css('display', 'block');
                                        //         }else{
                                        //             $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                                        //                 '                                                               مقدار بزرگتر از حد مجاز است\n' +
                                        //                 '                                                            </div>')
                                        //         }
                                        //     }else{
                                        //         $(element).removeClass('error');
                                        //         let error = $(element).parent().children('.invalid-feedback');
                                        //         if( error.length == 1 ){
                                        //             error.css('display', 'none');
                                        //         }
                                        //     }
                                        // }
                                        if( typeof required != 'undefined' ){
                                            let val = $(element).val();
                                            // if( val != '' )
                                            //     val = val.trim();
                                            console.log($(element), val);
                                            if( val == '' || val == null ){
                                                rand = element;
                                                // $("html, body").animate({scrollTop:'0'},'slow','swing',1000);
                                                $(element).addClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'block');
                                                }else{
                                                    $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                                                        '                                                                این فیلد اجباری می باشد\n' +
                                                        '                                                            </div>')

                                                }
                                            }else{
                                                $(element).removeClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'none');
                                                }
                                            }
                                        }
                                        if( typeof pattern != 'undefined' ){

                                            let val = $(element).val();
                                            var Pattern = new RegExp(pattern);

                                            if( !Pattern.test(val) ){
                                                rand = element;
                                                $(element).addClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'block');
                                                }else{
                                                    $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                                                        '                                                               مطابق الگو نمی باشد\n' +
                                                        '                                                            </div>')
                                                }
                                            }else{
                                                $(element).removeClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'none');
                                                }
                                            }
                                        }
                                        if( typeof min != 'undefined' ){
                                            let val = $(element).val();

                                            if( val < min ){
                                                rand = element;
                                                $(element).addClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'block');
                                                }else{
                                                    $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                                                        '                                                               مقدار کوچکتر از حد مجاز است\n' +
                                                        '                                                            </div>')
                                                }
                                            }else{
                                                $(element).removeClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'none');
                                                }
                                            }
                                        }
                                        if( typeof max != 'undefined' ){
                                            let val = $(element).val();

                                            if( val > max ){
                                                rand = element;
                                                $(element).addClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'block');
                                                }else{
                                                    $(element).parent().append('<div class="invalid-feedback" style="display: block;">\n' +
                                                        '                                                               مقدار بزرگتر از حد مجاز است\n' +
                                                        '                                                            </div>')
                                                }
                                            }else{
                                                $(element).removeClass('error');
                                                let error = $(element).parent().children('.invalid-feedback');
                                                if( error.length == 1 ){
                                                    error.css('display', 'none');
                                                }
                                            }
                                        }
                                    }else{
                                        $(element).removeClass('error');
                                        let error = $(element).parent().children('.invalid-feedback');
                                        if( error.length == 1 ){
                                            error.css('display', 'none');
                                        }
                                    }

                                });
                                // $("html, body").animate({scrollTop:rand.top },'slow','swing',1000);
                                if( typeof rand != 'undefined')
                                    rand.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
                            });





                        }
                        form.classList.add(
                            'was-validated'
                        ) ;
                    }, false) ;
            });
        // }, false);
    })();


})
