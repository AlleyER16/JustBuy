$(document).ready(function() {

    $("#user_details_edit").submit(function(event) {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Editing User Details";

        trigger_btn.html(spinner);

        var form_data = $(this).serialize();

        $.ajax({

            url: base_url() + "models/edit_user_details.mdl.php",
            type: "POST",
            data: form_data,
            success: function(data){

                var data = $.trim(data);

                server_response.html(data);

                trigger_btn.html("<span class='fas fa-spinner fa-spin'></span> Reloading");

                setInterval(function() {

                    window.location.reload();

                }, 1500);

            }

        });

    });

    $("#password_edit").submit(function(event) {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Changing Password";

        trigger_btn.html(spinner);

        var form_data = $(this).serialize();

        $.ajax({

            url: base_url() + "models/change_password.mdl.php",
            type: "POST",
            data: form_data,
            success: function(data){

                var data = $.trim(data);

                if(data == "Password changed successfully"){

                    server_response.html(data);

                    trigger_btn.html("<span class='fas fa-spinner fa-spin'></span> Reloading");

                    setInterval(function() {

                        window.location.reload();

                    }, 1500);

                }else{

                    server_response.html(data);

                    trigger_btn.html("Change Password");

                }

            }

        });

    });

    $("#profile_picture_edit").submit(function(event) {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var spinner = "<span class='fas fa-spinner fa-spin'></span>";

        trigger_btn.html(spinner);

        var profile_picture = $(this).find("input[name='profile_picture']")[0].files[0];

        var form_data = new FormData();

        form_data.append("profile_picture", profile_picture);

        $.ajax({

            url: base_url() + "models/change_profile_picture.mdl.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: function(data){

                var data = $.trim(data);

                if(data == "Profile picture updated successfully"){

                    server_response.html(data);

                    trigger_btn.html("<span class='fas fa-spinner fa-spin'></span> Reloading");

                    setInterval(function() {

                        window.location.reload();

                    }, 1500);

                }else{

                    server_response.html(data);

                    trigger_btn.html("Change");

                }

            }

        });

    });

});
