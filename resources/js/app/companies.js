$(document).on("turbolinks:load", () => {
    $.ajaxSetup({
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    });

    $("#companiesFormBtn").on("click", function(e) {
        e.preventDefault();
        $(this).attr("disabled");
        $("#alertCompanies").addClass("d-none");
        $(".loader").removeClass("d-none");

        $.ajax({
            url: "/companies",
            type: "POST",
            data: $("#companiesFormCreate").serialize(),
            dataType: "json",
            success: function(data) {
                if (data.error) {
                    $.each(data.message, function(key, value) {
                        $("#alertCompanies")
                            .children("span")
                            .text(value);
                    });
                    $("#alertCompanies").removeClass("d-none");
                } else {
                    $("#companiesFormCreate").trigger("reset");
                    Swal.fire({
                        title: "Companhia Cadastrada com Sucesso.",
                        toast: true,
                        icon: "success",
                        timer: 3000,
                        timerProgressBar: true,
                        position: "top-end"
                    });
                }
                $(this).removeAttr("disabled");
                $(".loader").addClass("d-none");
            },
            error: function(data) {
                Swal.fire({
                    title: "Algum erro ocorreu.",
                    toast: false,
                    icon: "warning",
                    timer: 5000,
                    timerProgressBar: false,
                    position: "center"
                });
            }
        });
    });

    $("#companiesFormBtnCancel").on("click", function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Cancelar a Operaçao?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim",
            cancelButtonText: "Não"
        }).then(result => {
            if (result.isConfirmed) {
                $("#companiesFormCreate").trigger("reset");
                Swal.fire({
                    title: "Operação cancelada com sucesso.",
                    toast: true,
                    icon: "success",
                    timer: 3000,
                    timerProgressBar: true,
                    position: "center"
                });
            }
        });
    });

    $(".deleteCompanyButton").on("click", function(event) {
        // event.preventDefault();
        let href = $(this).attr("data-attr");
        $.ajax({
            url: href,
            beforeSend: function() {
                $("#loader").show();
            },
            // return the result
            success: function(result) {
                $("#deleteCompanyModal").modal("show");
                $("#companySmallBody")
                    .html(result)
                    .show();
            },
            complete: function() {
                $("#loader").hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $("#loader").hide();
            },
            timeout: 8000
        });
    });
});
