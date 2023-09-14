function getBaseURL() {
    return $("html").attr("baseURL");
}

jQuery(document).ready(($) => {
    $('.quantity').on('click', '.plus', function(e) {
        
        let $input = $(this).prev('input.qty');
        
        let val = parseInt($input.val());
        $input.val( val + 1 ).change();
    });

    $('.quantity').on('click', '.minus', 
        function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val( val - 1 ).change();
            } 
        }
    );
});

function addToCart(planId, quantity) {
    $.ajax({
        type: "GET",
        url: getBaseURL() + "/add_to_cart?" + "planId=" + planId + "&quantity=" + quantity,
        success: function(response) {
            var cart = JSON.parse(response);
            var quantity = 0;
            for (var i = 0; i < cart.order_entries.length; i++) {
                quantity += cart.order_entries[i].quantity;
            }
            
            document.getElementById("cart-count").innerText = quantity;
            document.getElementById("cart-count-mobile").innerText = quantity;
        }
    });
}

function showCart() {
    if (!$("#addToCardMenuWeb").hasClass("show")) {
        $("#shopping-cart-loading").removeClass('d-none');
        $.ajax({
            type: "GET",
            url: getBaseURL() + "/get_cart",
            success: function(response) {
                $("#shopping-cart-loading").addClass('d-none')
                $("#total").hasClass('total-price');
                var cart = JSON.parse(response);
                var html = '';
                for (var i = 0; i < cart.order_entries.length; i++) {
                    var plan = cart.order_entries[i];

                    html += '<li class="item" id="'+'item'+plan.planId+'">'+
                    '           <img src="' + getBaseURL()  + '/storage/' + plan.image + '" alt="product" class="product-image"/>'+
                    '            <div class="text-price">'+
                    '                <span class="name-product">' + plan.name + '</span>'+
                    '                <span class="price">'+
                    '                    ' + plan.quantity + ' x ' + parseFloat(plan.price).toFixed(2) + '$'+
                    '                </span>'+
                    '            </div>'+
                    '       <div onclick="removeItemCart('+plan.planId+')">' +
                    '            <img src="/assets/images/victor/remove.png" alt="icon" class="icon-remove" />'+
                    '       </div>'+
                    '</li>';
                   
                }
                
                document.getElementById('total').innerHTML =  parseFloat(cart.total).toFixed(2) + '$';
                document.getElementById('shopping-cart-body').innerHTML = html;
                
            }
        }); 
    }
}
function showCartMobile() {
    if (!$("#addToCardMobile").hasClass("show")) {
        $("#shopping-cart-loading").removeClass('d-none');
        $.ajax({
            type: "GET",
            url: getBaseURL() + "/get_cart",
            success: function(response) {
                $("#shopping-cart-loading").addClass('d-none')
                $("#total").hasClass('total-price');
                var cart = JSON.parse(response);
                var html = '';
                for (var i = 0; i < cart.order_entries.length; i++) {
                    var plan = cart.order_entries[i];

                    html += '<li class="item" id="'+'item'+plan.planId+'">'+
                    '           <img src="' + getBaseURL()  + '/storage/' + plan.image + '" alt="product" class="product-image"/>'+
                    '            <div class="text-price">'+
                    '                <span class="name-product">' + plan.name + '</span>'+
                    '                <span class="price">'+
                    '                    ' + plan.quantity + ' x ' + parseFloat(plan.price).toFixed(2) + '$'+
                    '                </span>'+
                    '            </div>'+
                    '       <div onclick="removeItemCart('+plan.planId+')">' +
                    '            <img src="/assets/images/victor/remove.png" alt="icon" class="icon-remove" />'+
                    '       </div>'+
                    '</li>';
                   
                }
                
                document.getElementById('total-mobile').innerHTML =  parseFloat(cart.total).toFixed(2) + '$';
                document.getElementById('shopping-cart-body-mobile').innerHTML = html;
            }
        }); 
    }
}

function getCart() {
    $.ajax({
        type: "GET",
        url: getBaseURL() + "/get_cart",
        success: function(response) {
            if (response) {
                var cart = JSON.parse(response);
                var quantity = 0;
                for (var i = 0; i < cart.order_entries.length; i++) {
                    quantity += cart.order_entries[i].quantity;
                }
                
                document.getElementById("cart-count").innerText = quantity;
                document.getElementById("cart-count-mobile").innerText = quantity;
            }
        }
    });
}

$(document).ready(function() {
    getCart();
});

// reload
onload=function(){
    $(document).ready(function() {
        getCart();
    });
}

// remove 
function removeItemCart(planId, reload_after_success = false) {
    $.ajax({
        type: "GET",
        url: getBaseURL() + "/remove_cart?planId=" + planId,
        success: function(response) {
            document.getElementById("total").innerText = response.total;

            var getIdTag = 'item' + planId;
            var itemCart = document.getElementById(getIdTag);
            itemCart.remove();

            location.reload();
            // if (reload_after_success) {
            //     location.reload();
            // }
        }
    });
}

function removeOrderDetail(planId, unique_id) {
    $.ajax({
        type: "GET",
        url: getBaseURL() + "/remove_order_detail?planId=" + planId + "&unique_id=" + unique_id,
        success: function(response) {
            $(".body-form#" + unique_id).remove();
            location.reload();
        }
    });
}



  
