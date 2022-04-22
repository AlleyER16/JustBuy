function base_url(){

    return "http://localhost/justbuy/";

}

$(document).ready(function() {

    $("#feedback_form").submit(function() {

        event.preventDefault();

        var trigger_btn = $(this).find("button[type='submit']");
        var server_response = $(this).find("span[class='server_response']");

        var spinner = "<span class='fas fa-spinner fa-spin'></span> Sending Feedback";

        trigger_btn.html(spinner);

        var form_data = $(this).serialize();

        $.ajax({

            url: base_url() + "models/add_feedback.mdl.php",
            type: "POST",
            data: form_data,
            success: function(data){

                var data = $.trim(data);

                if(data == "Feedback sent successfully"){

                    server_response.html(data);

                    trigger_btn.html("<span class='fas fa-spinner fa-spin'></span> Reloading");

                    setInterval(function() {

                        window.location.reload();

                    }, 1500);

                }else{

                    server_response.html(data);

                    trigger_btn.html("Send Feedback");

                }

            }

        });

    });

    $(".m_search_btn").click(function() {

        var category = $(".m_search_category").val();
        var search_keyword = $(".m_search_keyword").val();

        if(search_keyword === ""){

            search_keyword = "all";

        }

        var url = base_url() + "products/" + category + "/all/all/" + search_keyword;

        //console.log(url);

        window.location = url;

    });

    $(".d_search_btn").click(function() {

        var category = $(".d_search_category").val();
        var search_keyword = $(".d_search_keyword").val();

        if(search_keyword === ""){

            search_keyword = "all";

        }

        var url = base_url() + "products/" + category + "/all/all/" + search_keyword;

        window.location = url;

    });

});
