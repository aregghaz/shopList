
var countProduct

var sum
$('.quantity-plus').on('click', function (event) {
    var getPrice = $(event.target.parentNode.parentNode.childNodes).eq(1).val()
    var amountSingle = $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-single').find('span').text();
    countProduct =(Number(getPrice) + 1)
    console.log(countProduct)
    $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-total').find('span.amount-price').text(Number(countProduct) * Number(amountSingle))

    sum = 0;
    $('.amount-price').each(function () {
        sum += parseFloat($(this).text());
    });
    $('#totalPrice').text(sum)

})
$('.quantity-minus').on('click', function (event) {
    var  getPrice = $(event.target.parentNode.parentNode.childNodes).eq(1).val()
    if (Number(getPrice) !== 1) {
        countProduct =(Number(getPrice) - 1)
        console.log(countProduct)
        var amountSingle = $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-single').find('span').text();
        $(event.target.parentNode.parentNode.parentNode.parentNode).find('td.amount-total').find('span.amount-price').text(Number(countProduct) * Number(amountSingle))
    }
    sum = 0;
    $('.amount-price').each(function () {
        sum += parseFloat($(this).text());
    });
    $('#totalPrice').text(sum)
})
var productsId =[];
$('.btn-apply-coupon').on('click', function () {
    var countArray = 0;
    $('.product-checkBox').each(function () {
        if($(this).is(':checked')) {
            productsId[countArray] = [
                this.value, $(this.parentNode.parentNode).find('.quantity div input').val()
        ];


            countArray++
        }
    });

    $.ajax({
        url: "/check-out",
        method: 'POST',
        data: {data:productsId, _token: token},
        success: function (res) {
        if(res == 'ok'){
            window.location.href = '/AddToOrder?cmd=checkout';
        }
        }

    });


})
$('.order-now').on('click', function () {
    var productSelectedId = $(this).attr('data-id')

    if(countProduct){
        var newUrl = '/AddToOrder?id=' + productSelectedId + '&count=' + countProduct + '&cmd=addOrderCart';

    }else {
        var newUrl = '/AddToOrder?id=' + productSelectedId +  '&cmd=addOrderCart';

    }
    $('.order-now').attr('href', newUrl)
    $('.order-now').click()

})
$('#checkAll').on('click', function () {
    if($(this).is(':checked')) {
        $('.product-checkBox').each(function () {
            $(this).attr('checked', 'checked')
        });
    }else {
        $('.product-checkBox').each(function () {
            $(this).removeAttr('checked')
        });
    }
})
