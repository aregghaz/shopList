$('#shipingAddress').on('click', function () {
    if ($("#shipingAddress").is(':checked')) {
        $(".form-address").removeAttr('style')
    } else {
        $(".form-address").attr('style', 'display:none')
    }
})