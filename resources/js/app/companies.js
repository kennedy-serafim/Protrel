$(document).on("turbolinks:load", () => {
    $.ajaxSetup({
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    });

    $("#companiesFormBtn").on("click", function(e) {
        e.preventDefault();
        console.log($("#companiesForm").serialize())
        $.ajax({
            data: $("#companiesForm").serialize(),
            url: "/companies",
            type: "POST",
            dataType: "json",
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});
