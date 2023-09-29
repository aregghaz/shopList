var getPrice
$('.quantity-plus').on('click', function (event) {
    getPrice = $(event.target.parentNode.parentNode.childNodes).eq(1).val()
    var amountSingle = $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-single').find('span').text();
    $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-total').find('span.amount-price').text((Number(getPrice) + 1) * Number(amountSingle))
    var sum = 0;
    $('.amount-price').each(function () {
        sum += parseFloat($(this).text());
    });


})
$('.quantity-minus').on('click', function (event) {
    getPrice = $(event.target.parentNode.parentNode.childNodes).eq(1).val()
    if (Number(getPrice) !== 1) {
        var amountSingle = $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-single').find('span').text();
        $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-total').find('span.amount-price').text((Number(getPrice) - 1) * Number(amountSingle))
    }
    var sum = 0;
    $('.amount-price').each(function () {
        sum += parseFloat($(this).text());
    });

})
$('.add-to-cart').on('click', function () {
    var checkUser = "{{ Auth::check() }}";
    if (!checkUser) {
        window.location.href = '/sign'
    }
    if (getPrice) {
        var countProduct = getPrice
    } else {
        countProduct = $(this).attr('data-count')
    }

    var productId = $(this).attr('data-id')
    var color = $(this).attr('data-color')
    var size = $(this).attr('data-size')
    $.ajax({
        url: "/add-to-cart",
        data: {id: productId, count: countProduct, color: color, size: size},
        success: function () {
        }
    });
    $.ajax({
        url: "/deleteWish/"+productId+"",
        success: function () {
        }
    });
    location.reload();
})