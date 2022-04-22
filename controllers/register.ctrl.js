$(document).ready(function() {

    $(document).on("input", $("#signup_form").find("input"), function() {

        $("#server_response").html("");

    });

    $("#signup_form").submit(function(event) {

        event.preventDefault();

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Creating Account";

        $("#signup_button").html(spinner);

        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: base_url("main") + "models/user_register.mdl.php",
            data: form_data,
            success: function(data){
                data = $.trim(data);

                if(data == "Account Created Successfully"){

                    window.location = base_url() + "my_dashboard";

                }else{

                    $("#signup_button").html("Create Account");
                    $("#server_response").html(data);

                }
            }
        });

    });

});
