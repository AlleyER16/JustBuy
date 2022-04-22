$(document).ready(function() {

    $("#login_form").submit(function(event){

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        trigger_btn.html("<span class='fas fa-spinner fa-spin'></span> Loggin In");

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: admin_url() + "models/login.php",
            data: form_data,
            success: function(data){

                if(data === "Authenticated"){

                    window.location = "analytics";

                }else{

                    server_response.html(data);

                    trigger_btn.html("Login");

                }

            }
        });

    });

});
