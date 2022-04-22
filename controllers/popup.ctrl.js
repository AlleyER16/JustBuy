function show_popup(title, message){

    $("#popup_modal").find(".modal-title").html(title);
    $("#popup_modal").find(".modal-body").html(message);

    $("#popup_modal").modal();

}
