
var countProduct;
$(document).ready(function () {
    console.log('asds')
    sessionStorage.removeItem('color');
    sessionStorage.removeItem('size');
    if ($('.color').length == 1) {
        var color = $('.color').css("background-color");
        sessionStorage.setItem("color", color);
    }
    if ($('.size').length == 1) {
        var size = $('.size').text();
        sessionStorage.setItem("size", size);
    }
    countProduct = 1;

    $('.color').on('click', function () {
        console.log($('.color').length)
        $('.color').attr('class', 'color')
        $(this).attr('class', 'color active')
        var asd = $(this).css("background-color");
        sessionStorage.setItem("color", asd);

    })
    $('.size').on('click', function () {
        console.log($('.size').length)
        $('.size').attr('class', 'size')
        $(this).attr('class', 'size active')
        var asd = $(this).text();
        sessionStorage.setItem("size", asd);

    })


    $('.quantity-plus').on('click', function (event) {
        var getPrice = $(event.target.parentNode.childNodes).eq(3).val()

        countProduct = Number(getPrice) + 1;
        $('.total-amount').text(countProduct * Number(amountSingle))

    })
    $('.quantity-minus').on('click', function (event) {
        var getPrice = $(event.target.parentNode.childNodes).eq(3).val()
        if (Number(getPrice) !== 1) {

            countProduct = Number(getPrice) - 1;
            $('.total-amount').text(countProduct * Number(amountSingle))
        }
    })
    $('.add-to-cart').on('click', function () {

        if(!checkUser) {
            window.location.href = '/sign'
        }
        var color = sessionStorage.getItem("color");
        var size = sessionStorage.getItem("size");
        if (color && size) {


            $.ajax({
                url: "/add-to-cart",
                data: {id: productId, count: countProduct, color: color, size: size},
                success: function(response){
                    $('.cartLi').empty()
                    $('.cartLi').html(response)
            }
            });

         //   location.reload();
        } else if (!color && size) {
            $('.color-list').attr('style', 'border:1px solid red;padding: 5px')
        } else if (!size && color) {
            $('.product-size').attr('style', 'border:1px solid red;padding: 5px')
        } else {
            $('.color-list').attr('style', 'border:1px solid red;padding: 5px')
            $('.product-size').attr('style', 'border:1px solid red;padding: 5px')
        }
    })
    $('.order-now').on('click', function () {

        if(!checkUser) {
            window.location.href = '/sign'
        }

        var color = sessionStorage.getItem("color");
        var size = sessionStorage.getItem("size");
        if (color && size) {

            var newUrl = '/AddToOrder?id=' + productId + '&count=' + countProduct + '&color=' + color + '&size=' + size + '&cmd=addOrder';
            $('.order-now').attr('href', newUrl)
            $('.order-now').click()

        } else if (!color && size) {
            $('.color-list').attr('style', 'border:2px solid red;padding: 5px')
        } else if (!size && color) {
            $('.product-size').attr('style', 'border:2px solid red;padding: 5px')
        } else {
            $('.color-list').attr('style', 'border:2px solid red;padding: 5px')
            $('.product-size').attr('style', 'border:2px solid red;padding: 5px')
        }
    })
    $('.add-to-favorite').on('click', function () {
        var color = sessionStorage.getItem("color");
        var size = sessionStorage.getItem("size");

        if (color && size) {


            $.ajax({
                url: "/add-to-favorite",
                data: {id: productId, count: countProduct, color: color, size: size},
                success: function () {
                }
            });
            location.reload();
        }
        else if (!color && size) {
            $('.color-list').attr('style', 'border:1px solid red;padding: 5px')
        } else if (!size && color) {
            $('.product-size').attr('style', 'border:1px solid red;padding: 5px')
        } else {
            $('.color-list').attr('style', 'border:1px solid red;padding: 5px')
            $('.product-size').attr('style', 'border:1px solid red;padding: 5px')
        }
    })
})
$('.stars-review').on('click', function () {
    $('.stars-review a i').attr('class', 'fal fa-star')
    var countStars = 0;
    $(this).find('a').find('i').each(function () {
        countStars++;
        $(this).attr('class', 'fas fa-star')
    })
    $('#countStars').val(countStars)
})
