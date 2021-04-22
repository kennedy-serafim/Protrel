$(document).on("turbolinks:load", () => {
    $.ajaxSetup({
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    });

    $("#suppliersFormBtn").on("click", function(e) {
        e.preventDefault();

        $.ajax({
            url: $("#suppliersFormCreate").attr("action"),
            type: "POST",
            data: $("#suppliersFormCreate").serialize(),
            dataType: "json",
            method: "POST",
            beforeSend: function() {
                $(".loader").show();
                $(".loader").removeClass("d-none");
                // $("#suppliersFormBtn").setAttribute("disabled", "disabled");
            },
            success: function(data) {

                if (data.error) {
                    $.each(data.message, function(key, value) {
                        $("#alertSuppliers")
                        .children("span")
                        .text(value[0]);
                    });

                    $("#alertSuppliers").removeClass("d-none");
                } else {
                    $("#suppliersFormCreate").trigger("reset");
                    $("#alertSuppliers").addClass("d-none");
                    Swal.fire({
                        title: "Companhia Cadastrada com Sucesso.",
                        toast: true,
                        type: "success",
                        timer: 3000,
                        timerProgressBar: true,
                        position: "top-end"
                    });
                }
            },
            complete: function() {
                $(".loader").hide();
                $(".loader").addClass("d-none");
                $(this).removeAttr("disabled");
            },
            error: function(data) {
                Swal.fire({
                    title: "Algum erro ocorreu.",
                    toast: false,
                    type: "warning",
                    timer: 5000,
                    timerProgressBar: false,
                    position: "center"
                });
            }
        });
    });

    $("#suppliersFormBtnCancel").on("click", function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Cancelar a Operaçao?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim",
            cancelButtonText: "Não"
        }).then(result => {
            if (result.isConfirmed) {
                $("#suppliersFormCreate").trigger("reset");
                Swal.fire({
                    title: "Operação cancelada com sucesso.",
                    toast: true,
                    type: "success",
                    timer: 3000,
                    timerProgressBar: true,
                    position: "center"
                });
            }
        });
    });
});
