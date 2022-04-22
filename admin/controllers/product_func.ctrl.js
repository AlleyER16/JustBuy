$(document).ready(function() {

    $("#add_product_form").submit(function(event) {

        event.preventDefault();

        event.preventDefault();

        var submit_button = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var loader = "<span class='fas fa-spinner fa-spin'></span> Adding Product";
        submit_button.html(loader);

        var product_name = $(this).find("input[name='product_name']").val();
        var description = $(this).find("textarea[name='description']").val();
        var price = $(this).find("input[name='price']").val();
        var stock = $(this).find("input[name='stock']").val();
        var image = $(this).find("input[name='image']")[0].files[0];
        var launch_date = $(this).find("input[name='launch_date']").val();
        var category = $(this).find("select[name='category']").val();
        var brand = $(this).find("select[name='brand']").val();

        var form_data = new FormData();

        form_data.append("product_name", product_name);
        form_data.append("description", description);
        form_data.append("price", price);
        form_data.append("stock", stock);
        form_data.append("image", image);
        form_data.append("launch_date", launch_date);
        form_data.append("category", category);
        form_data.append("brand", brand);

        $.ajax({

            url: admin_url() + "models/add_product.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: function(data){

                var data = $.trim(data);

                if(data == "Product added successfully"){

                    window.location = admin_url() + "all_products";

                }else{

                    server_response.html(data);

                    submit_button.html("Add Product");

                }

            }

        });

    });

});
