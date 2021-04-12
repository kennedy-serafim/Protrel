document.addEventListener("turbolinks:load", function (event) {
    // window.livewire.restart();

    // Dispatch all Sweet Alert Component
    window.addEventListener("swal", function (e) {
        Swal.fire(e.detail);
    });

    // ================ Company Events

    window.addEventListener("openDeleteCompanyModal", (event) => {
        $("#deleteCompanyModal").modal("show");
    });

    window.addEventListener("closeDeleteCompanyModal", (event) => {
        $("#deleteCompanyModal").modal("hide");
    });

    window.addEventListener("openUpdateCompanyModal", (event) => {
        $("#updateCompanyModal").modal("show");
    });

    window.addEventListener("closeUpdateCompanyModal", (event) => {
        $("#updateCompanyModal").modal("hide");
    });

    window.addEventListener("companyCreateCollapseHide", (event) => {
        $("#newCompanyCollapse").collapse("hide");
        $("#btnCreateCompanyCollapse").removeClass("d-none");
    });

    $(document).on("click", "#btnCreateCompanyCollapse", function () {
        $(this).addClass("d-none");
    });

    $(document).on("click", "#btnCancelCompanyCollapse", function () {
        $("#btnCreateCompanyCollapse").removeClass("d-none");
    });

    // ================ Employee Events

    window.addEventListener("openDeleteEmployeeModal", (event) => {
        $("#deleteEmployeeModal").modal("show");
    });

    window.addEventListener("closeDeleteEmployeeModal", (event) => {
        $("#deleteEmployeeModal").modal("hide");
    });

    window.addEventListener("openUpdateEmployeeModal", (event) => {
        $("#updateEmployeeModal").modal("show");
    });

    window.addEventListener("closeUpdateEmployeeModal", (event) => {
        $("#updateEmployeeModal").modal("hide");
    });

    window.addEventListener("EmployeeCreateCollapseHide", (event) => {
        $("#newEmployeeCollapse").collapse("hide");
        $("#btnCreateEmployeeCollapse").removeClass("d-none");
    });

    $(document).on("click", "#btnCreateEmployeeCollapse", function () {
        $(this).addClass("d-none");
    });

    $(document).on("click", "#btnCancelEmployeeCollapse", function () {
        $("#btnCreateEmployeeCollapse").removeClass("d-none");
    });

    // ========================== Validation ===========================

    // Fields Formatter
    $(".f-money").mask("000000000000000.0", { reverse: true });
    $(".f-phone-area").mask("(000) 00 000 0 000");
    $(".f-phone").mask("00 000 0 000");
    $(".f-nuit").mask("000 000 000");
});

$(document).on("ajax:before", "[data-remote]", () => {
    Turbolinks.clearCache();
});
