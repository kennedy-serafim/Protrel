$(document).on("turbolinks:load", () => {
    $.ajaxSetup({
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    });

});
