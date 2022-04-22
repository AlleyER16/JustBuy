$(document).ready(function() {

    $("#lg_email, #lg_pwd").keyup(function() {

        $("#server_response").html("");

    });

    $("#login_form").submit(function(event) {

        event.preventDefault();

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Logging in";

        $("#login_button").html(spinner);

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: base_url() + "models/user_login.mdl.php",
            data: form_data,
            success: function(data){
                data = $.trim(data);

                if(data == "Account Verified"){

                    window.location = base_url() + "my_dashboard";

                }else{

                    $("#login_button").html("Login");
                    $("#server_response").html(data);

                }
            }
        });

    });

});
