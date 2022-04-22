function add_product_to_cart(trigger_btn, product_id){

    trigger_btn.html("<span class='fas fa-spinner fa-spin'></span>");

    $.ajax({
        type: "POST",
        url: base_url() + "models/add_product_to_cart.mdl.php",
        data: {product_id, product_id},
        success: function(data){

            if(data[0] == "Product added to cart successfully"){

                $(".__num_cart_products").html(data[1]);
                $(".__total_cart_bill").html(data[2]);

                show_popup("Add to cart", data[0]);

                trigger_btn.removeClass("btn-outline-success").addClass("btn-success");
                trigger_btn.html("<span class='fas fa-shopping-cart'></span>");

            }else{

                show_popup("Add to cart", data[0]);

                trigger_btn.html("<span class='fas fa-shopping-cart'></span>");

            }

        }
    });

}

function add_product_to_wishlist(trigger_btn, product_id){

    trigger_btn.html("<span class='fas fa-spinner fa-spin'></span>");

    $.ajax({
        type: "POST",
        url: base_url() + "models/add_product_to_wishlist.mdl.php",
        data: {product_id, product_id},
        success: function(data){

            if(data[0] == "Product added to wishlist successfully"){

                $(".__num_wishlist_products").html(data[1]);

                show_popup("Add to wishlist", data[0]);

                trigger_btn.removeClass("btn-outline-success").addClass("btn-success");
                trigger_btn.html("<span class='fas fa-heart'></span>");

            }else{

                show_popup("Add to wishlist", data[0]);

                trigger_btn.html("<span class='fas fa-heart'></span>");

            }

        }
    });

}

function filter_products(){

    var category = $("input[name='category_filter']:checked").val();
    var brand = $("input[name='brand_filter']:checked").val();
    var price = $("input[name='price_filter']:checked").val();
    var search_keyword = $("#search").val();

    if(search_keyword === ""){

        search_keyword = "all";

    }

    var url = base_url() + "products/" + category + "/" + brand + "/" + price + "/" + search_keyword;

    //console.log(url);

    $("#products_pane").html("<div style='width: 100%; height: 50vh; display: flex; align-items: center; justify-content: center'><h1><span class='fas fa-spinner fa-spin'></span></h1></div>");

    setInterval(function() {

        window.location = url;

    }, 1500);

}

function remove_product_from_cart(trigger_element, product_id){

    trigger_element.html("<span class='fas fa-spinner fa-spin'></span>");

    $.ajax({
        type: "POST",
        data: {product_id: product_id},
        url: base_url() + "models/remove_cart_product.mdl.php",
        success: function(data){

            data = $.trim(data);

            if(data === "Product removed successfully"){

                //show_popup("Product removed", "<span class='fas fa-spinner'></span> Product removed from cart successfully. Reloading...")

                window.location.reload();

            }else{

                show_popup("Product remove", data);

                trigger_btn.html("<span class='fas fa-trash'></span>");

            }

        }
    });

}

function remove_product_from_wishlist(trigger_element, product_id){

    trigger_element.html("<span class='fas fa-spinner fa-spin'></span>");

    $.ajax({
        type: "POST",
        data: {product_id: product_id},
        url: base_url() + "models/remove_wishlist_product.mdl.php",
        success: function(data){

            data = $.trim(data);

            if(data === "Product removed successfully"){

                //show_popup("Product removed", "<span class='fas fa-spinner'></span> Product removed from cart successfully. Reloading...")

                window.location.reload();

            }else{

                show_popup("Product remove", data);

                trigger_btn.html("<span class='fas fa-trash'></span>");

            }

        }
    });

}

$(document).ready(function() {

    $(".search_btn").click(function() {

        if($("#search").val() !== ""){
            filter_products();
        }

    })

    $("input[name='category_filter'], input[name='brand_filter'], input[name='price_filter']").change(function() {

        var interval = setInterval(filter_products(), 1000);

    });

    $(".buy_product").click(function() {

        var button_clicked = $(this).attr("name");

        var address = $("#buy_products").find("select[name='address']").val();

        switch(button_clicked){

            case "checkout":

                $(this).html("<span class='fas fa-spinner fa-spin'></span> Checking out");

                $.ajax({
                    type: "POST",
                    data: {address, address},
                    url: base_url() + "models/checkout_cart.mdl.php",
                    success: function(data){

                        data = $.trim(data);

                        if(data == "Checkout successful"){

                            var url = base_url() + "my_purchased";

                            window.location = url;

                        }else{

                            show_popup("Checkout", data);

                            $(this).html("Checkout");

                        }

                    }
                });

                break;

            case "order":

                $(this).html("<span class='fas fa-spinner fa-spin'></span> Placing order");

                $.ajax({
                    type: "POST",
                    data: {address, address},
                    url: base_url() + "models/order_cart.mdl.php",
                    success: function(data){

                        data = $.trim(data);

                        if(data == "Order successful"){

                            var url = base_url() + "my_orders";

                            window.location = url;

                        }else{

                            show_popup("Order", data);

                            $(this).html("Order");

                        }

                    }

                });

                break;

        }

    });

    $(".update_product_quantity_form").submit(function(event) {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");

        trigger_btn.html("<span class='fas fa-spinner fa-spin'></span>");

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            data: form_data,
            url: base_url() + "models/update_cart_product_quantity.mdl.php",
            success: function(data){

                data = $.trim(data);

                if(data === "Quantity changed successfully"){

                    //show_popup("Quantity changed", "<span class='fas fa-spinner'></span> Product quantity changed successfully. Reloading...")

                    window.location.reload();

                }else{

                    show_popup("Quantity change", data);

                    trigger_btn.html("<span class='fas fa-check'></span>");

                }

            }
        });

    });

});
