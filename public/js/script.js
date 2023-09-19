$(".carousel").swipe({
    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll:"vertical"
});

// For show  session message //
window.setTimeout(function () {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
        $(this).remove();
    });
}, 5000);

// For show  session message close //


// category colips show sub-category dinamic

$('.sub_link').click(function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    $(this).attr("href", "#collapse" + id);
    $(this).closest('.panel-default').find('.collapse').attr('id', 'collapse' + id);

    $('#category_id').val(id);
    $('#category_name').text(name);
});

///end category colips show sub-category dinamic


// edit category data


$('.edit_category_admin').click(function () {
    var id = $(this).closest('.panel-title').find('.sub_link').data('id');
    var name = $(this).closest('.panel-title').find('.sub_link').data('name');
    var nameRu = $(this).closest('.panel-title').find('.sub_link').data('nameru');
    var nameAm = $(this).closest('.panel-title').find('.sub_link').data('nameam');
    var icon = $(this).closest('.panel-title').find('.sub_link').data('icon');
    console.log(id,'ididid')
    $('#category_id_for_edit').val(id);
    $('#category_id_for_edit_show').text(id);
    $('#nameEn').val(name);
    $('#nameAm').val(nameAm);
    $('#nameRu').val(nameRu);
    $('#category_icon_for_edit').val(icon);
});

//end edit category data

// edit sub category modal
$('.subcategory').click(function () {
    var id = $(this).data('id');
    var category_id = $(this).data('categoryid');
    var name = $(this).data('name');
    var nameRu = $(this).data('nameru');
    var nameAm = $(this).data('nameam');

    $('#sub_category_id_for_edit').val(id);
    $('#sub_category_id_for_edit_show').text(id);
    $('#category_id_in_sub').val(category_id);
    $('#sub_category_name_for_edit').val(name);
    $('#sub_category_nameRu_for_edit').val(nameRu);
    $('#sub_category_nameAm_for_edit').val(nameAm);
});

// end edit sub category modal

//get category and set sub category results

$('#sel1').change(function () {
    var caregor_id = $(this).val();

    $.ajax({
        type: "GET",
        url: "/admin/products/getsubcajax",
        data: {id: caregor_id},

        success: function (data) {

            var subCategory = data.subcategory;

            $('#sel2').empty();
            for (var i = 0; i < subCategory.length; i++) {
                $('#sel2').append('<option value="' + subCategory[i]['id'] + '">' + subCategory[i]['name'] + '</option>')
            }


        }
    });
});
// end get category and set sub category results

// function for appand img and color inputs
function colorFunction() {
    $('.mycolor .row').append(" <div class='col-lg-1'>" +
        " <input type=\"color\" class=\"form-control\" name=\"colors[]\"  required/></div>");
}

function fileFunction() {
    $('.myimg .row').append(" <div class='col-sm-4 col-xs-12 '>" +
        " <input type=\"file\" class=\"form-control\" name=\"images[]\" id=\"image\" placeholder=\"Images\" required/></div>");
}

// show modal product information

// function for appand img and color edit modal
function colorFunctionedit() {
    $('.mycolor_edit').append(" <div class='form-group col-sm-4 col-xs-12 '> <label for=\"icon\">Color:</label>" +
        " <input type=\"color\" class=\"form-control\" name=\"colors[]\"  required/></div>");
}

function fileFunctionedit() {
    $('.myimg_edit').append(" <div class='form-group col-sm-12 col-xs-12 '><label for=\"icon\">Images:</label>" +
        " <input type=\"file\" class=\"form-control\" name=\"images[]\" id=\"image\" placeholder=\"Images\" required/></div>");
}

// show modal product information


$('.show_modal').click(function () {

    var id = $(this).data('id');
    var name = $(this).data('name');
    var user_id = $(this).data('userid');
    var user_name = $(this).data('user');
    var nameEn = $(this).data('nameen');
    var nameRu = $(this).data('nameru');
    var nameAm = $(this).data('nameam');
    var category_name = $(this).data('categoryname');
    var subcategory_name = $(this).data('subcategoryname');
    var price = $(this).data('price');
    var description = $(this).data('description');
    var sku = $(this).data('sku');
    var availability = $(this).data('availability');
    var size = $(this).data('size');
    var created = $(this).data('created');
    var updated = $(this).data('updated');

    var images = $(this).data('images');
    var colors = $(this).data('colors');

    var k = 4;
    $('.demo_img').empty()
    $('.tab-content').empty()

    if (typeof images == 'string') {
        $('.tab-content').append('<div id="metro-related" class="tab-pane fade active in"><a href="#"> <img class="img-responsive images_product_show1 " src="/img/products/' + eval(images) + '" alt="single"></a></div> ');
        $('.demo_img').append('<li class="col-sm-4 active"><a aria-expanded="false" data-toggle="tab" href="#metro-related"><img class="img-responsive " src="/img/products/' + eval(images) + '" alt="related3"></a></li>');

    } else {
        console.log(images.length)

        for (var j = 0; j < images.length; j++) {
            if (k == 4) {
                $('.tab-content').append('<div id=\"metro-related' + k + '\" class="tab-pane fade active in"><a href="#"> <img class="img-responsive images_product_show1 " src=\"/img/products/' + images[j] + '\" alt="single"></a></div> ');
                $('.demo_img').append('<li class="col-sm-2 active"><a aria-expanded="false" data-toggle="tab" href=\"#metro-related' + k + '\"><img class="img-responsive " src=\"/img/products/' + images[j] + '\" alt="related3"></a></li>');
            } else {
                $('.tab-content').append('<div id=\"metro-related' + k + '\" class="tab-pane fade"><a href="#"> <img class="img-responsive images_product_show1 " src=\"/img/products/' + images[j] + '\" alt="single"></a></div> ');
                $('.demo_img').append('<li class="col-sm-2"><a aria-expanded="false" data-toggle="tab" href=\"#metro-related' + k + '\"><img class="img-responsive " src=\"/img/products/' + images[j] + '\" alt="related3"></a></li>');
            }
            k++;
        }
    }


    $('.insert-color').empty()
    for (var i = 0; i < colors.length; i++) {
        $('.insert-color').append('<div class="col-sm-1 pull-right" style=\"background-color:' + colors[i] + '\">.</div>');
    }

    $('#product_id').text(id);
    $('#nameEn').text(nameEn);
    $('#nameRu').text(nameRu);
    $('#nameAm').text(nameAm);
    $('#category_name').text(category_name);
    $('#subcategory_name').text(subcategory_name);
    $('#name').text(name);
    $('#price').text(price);
    $('#user_name').text(user_name);
    $('#description_show').text(description);
    $('#sku').text(sku);
    $('#availability').text(availability);
    $('#size').text(size);
    $('#created').text(created);
    $('#updated').text(updated);
});


// end show modal product information

//edit product module
$('.edit_modal').click(function () {
    var id = $(this).closest('td').find('.show_modal').data('id');
    var nameEn = $(this).closest('td').find('.show_modal').data('nameen');
    var nameRu = $(this).closest('td').find('.show_modal').data('nameru');
    var nameAm = $(this).closest('td').find('.show_modal').data('nameam');
    var user_id = $(this).closest('td').find('.show_modal').data('userid');
    var user_name = $(this).closest('td').find('.show_modal').data('user');
    var category_id = $(this).closest('td').find('.show_modal').data('categoryid');
    var category_name = $(this).closest('td').find('.show_modal').data('categoryname');
    var subcategory_name = $(this).closest('td').find('.show_modal').data('subcategoryname');
    var subcategory_id = $(this).closest('td').find('.show_modal').data('subcategoryid');
    var price = $(this).closest('td').find('.show_modal').data('price');
    var descriptionRu = $(this).closest('td').find('.show_modal').data('descriptionru');
    var descriptionAm = $(this).closest('td').find('.show_modal').data('descriptionam');
    var descriptionEn = $(this).closest('td').find('.show_modal').data('descriptionen');
    var sku = $(this).closest('td').find('.show_modal').data('sku');
    var availability = $(this).closest('td').find('.show_modal').data('availability');
    var size = $(this).closest('td').find('.show_modal').data('size');
    var images = $(this).closest('td').find('.show_modal').data('images');
    var colors = $(this).closest('td').find('.show_modal').data('colors');

    $('#forImages').empty()

    if (typeof images == 'string') {
        $('#forImages').append(' <div class="form-group col-sm-12 col-xs-12"><label for="icon "><img src="/img/products/' + images + '" width="50px" height="70px" alt=""></label>' +
            ' <input type="file" class="form-control" name="images[]" id="image" placeholder="Images" /></div>');
    } else {
        for (var i = 0; i < images.length; i++) {

            $('#forImages').append(' <div class="form-group col-sm-12 col-xs-12"><label for="icon "><img src="/img/products/' + images[i] + '" alt=""  width="70px" height="50px"></label>' +
                ' <input type="file" class="form-control" name="images[]" id="image" placeholder="Images" /></div>');
        }
    }
    //$('.mycolor_edit').empty()
    for (var j = 0; j < colors.length; j++) {
        $('.mycolor_edit').append(' <div class="form-group col-xs-12"> <label for="icon"></label>' +
            ' <input type="color" class="form-control" name="colors[]" value=\"' + colors[j] + '"\  /></div>');
    }


    $('#product_id_edit').text(id);
    $('#product_id_edit_hidden').val(id);
    $('#user_name_edit').text(user_name);
    $('#editeNameEn').val(nameEn);
    $('#editeNameAm').val(nameAm);
    $('#editeNameRu').val(nameRu);
    $('#category_id_edit').val(category_id);
    $('#subcategory_edit').append('<option value="' + subcategory_id + '">' + subcategory_name + '</option>');
    $('#subcategory_edit').val(subcategory_id);
    $('#price_edit').val(price);
    $('#sku_edit').val(sku);
    $('#availability_edit').val(availability);
    $('#size_edit').val(size);
    $('#descriptionAm').val(descriptionAm);
    $('#descriptionEn').val(descriptionEn);
    $('#descriptionRu').val(descriptionRu);

});

//edit product module
$('.edit_order').click(function () {
    var id = $(this).closest('td').find('.edit_order').data('id');
    var status = $(this).closest('td').find('.edit_order').data('status');
    $("#changeStatus").val(status)
        .find("option[value=" + status + "]").attr('selected', true);

    $('#orderId').val(id);

});
//end edit module

//product show modal in home

$(".product_show").click(function () {

    var id = $(this).data('id');
    var name = $(this).data('name');
    var price = $(this).data('price');
    var description = $(this).data('description');
    var images = $(this).data('images');
    var sku = $(this).data('sku');
    var availability = $(this).data('availability');
    var size = $(this).data('size');
    var colors = $(this).data('colors');
    var category_name = $(this).data('category_showpr');
    var subcategory_name = $(this).data('subcategory_showpr');

    $('.imgfirst').empty();
    $('.imgsecond').empty();
    $('.imgthired').empty();
    $('.mycolor_edit').empty();
    if (typeof images == 'string') {

        $('.imgfirst').append('<img class="img-responsive sizeimgshow" src="/img/products/' + images + '" alt="' + name + '">');
        $('.imgsecond').attr('style', 'display:none');
        $('.imgthired').attr('style', 'display:none');
    } else {

        if (images[0]) {
            $('.imgfirst').append('<img class="img-responsive sizeimgshow" src="/img/products/' + images[0] + '" alt="' + name + '">');
        }
        if (images[1]) {
            $('.imgsecond').append('<img class="img-responsive sizeimgshow" src="/img/products/' + images[1] + '" alt="' + name + '">');
            $('.imgsecond').removeAttr('style');
        } else {
            $('.imgsecond').attr('style', 'display:none');
        }
        if (images[2]) {
            $('.imgthired').append('<img class="img-responsive sizeimgshow" src="/img/products/' + images[2] + '" alt="' + name + '">');
            $('.imgthired').removeAttr('style');
        } else {
            $('.imgthired').attr('style', 'display:none');
        }


    }


    $('#name').text(name);
    $('#price').text("$" + price);
    $('#description').text(description);
    $('#images').text(images);
    $('#sku').text("SKU: " + " " + sku);
    $('#availability').text("Availability:" + " " + availability);
    $('#size').text(size);
    $('#colors').text(colors);
    if (subcategory_name) {
        $('#category_name').text("Category:" + " " + category_name + " / " + subcategory_name);
    } else {
        $('#category_name').text("Category:" + " " + category_name);
    }


});

//end product show modal in home

// sidebar toggler function start here

if ($(window).width() <= 991) {
    $(".sidebar-col").toggleClass("hideThis"), $(".main-right").toggleClass("col-sm-8");
}

$(".fa-bars, .categories-all .fa-times").click(function () {
    $(".sidebar-col").toggleClass("hideThis"), $(".main-right").toggleClass("col-sm-8"), $("body").toggleClass("toggled-sdb");
});

$(".fa-bars").click(function () {
    $('.fa-bars').toggleClass('fa-times');
})

// sidebar toggler function end here


$(".chatHead").click(function () {
    $(this).parent().toggleClass("chat-opened")
})




$('#filter-submit').on('click', function(e) {
    var from = $('#filter-price-from').val()
    var to =  $('#filter-price-to').val()
    e.preventDefault();
    if(from  || to) {
        $.ajax({
            type: "GET",
            url: "/addFiltre",
            data: {to: to, from: from, cmd:'serchByPrice'},
            success: function (data) {
                console.log(data)
                $('.shop-page-area').empty()
                $('.shop-page-area').html(data)
            }
        });
    }

})




