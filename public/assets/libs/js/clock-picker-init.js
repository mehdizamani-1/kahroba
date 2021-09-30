(function($) {
    "use strict"

    // Clock pickers
    let input = $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoClose: true,
        'default': 'now'
    });

    $('.clockpicker').clockpicker({
        doneText: 'Done',
    }).find('input').change(function () {
        console.log(this.value);
    });

    $('#check-minutes').click(function (e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });

})(jQuery)
