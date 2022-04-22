$(document).ready(function() {

    $("#add_category_form").submit(function(event) {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Adding Category";

        trigger_btn.html(spinner);

        var form_data = $(this).serialize();

        $.ajax({
            url: admin_url() + "models/add_category.php",
            type: "POST",
            data: form_data,
            success: function(response){

                response = $.trim(response);

                if(response === "Category Added Successfully"){

                    window.location = admin_url() + "all_categories";

                }else{

                    server_response.html(response);
                    trigger_btn.html("Add Category");

                }

            }
        });

    });

});
