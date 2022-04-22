$(document).ready(function() {

    $("#add_address_form").submit(function(event) {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Adding address";

        trigger_btn.html(spinner);

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: base_url() + "models/add_address.mdl.php",
            data: form_data,
            success: function(data){

                data = $.trim(data);

                if(data == "Address added successfully"){

                    server_response.html(data)

                    trigger_btn.html("<span class='fas fa-spinner fa-spin'></span> Reloading");

                    window.location.reload();

                }else{

                    server_response.html(data);
                    trigger_btn.html("Add address");

                }

            }
        });

    });

});
