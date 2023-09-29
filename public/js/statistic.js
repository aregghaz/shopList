function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + ( 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var product_id = getCookie('product_id');
   return product_id;
}
$(document).ready(function () {
    var matchesId = true;
    var id = productId;
    if(checkCookie()) {
        var getId = checkCookie();
        var checking = getId.split(",");
        for(var i = 0; i<=checking.length; i++) {
            console.log(checking[i])
            console.log(id)
            if(id == checking[i]) {
                matchesId = false;
                break;
            }

        }
        if(matchesId){
            setCookie('product_id', id+","+getId)

            storeId(id)
        }
    } else {
        setCookie('product_id', id)

        storeId(id)
    }

});
function storeId(id) {
    console.log('1')
    $.ajax({
        type: "GET",
        url: "/saveStatistic",
        data: {id: id},
        success: function (data) {

        }
    });
}