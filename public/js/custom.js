// Dispatch all Sweet Alert Component
window.addEventListener("swal", function (e) {
    Swal.fire(e.detail);
});

// ========================== Validation ===========================

// Fields Formatter
$(".f-money").mask("000000000000000.0", { reverse: true });
$(".f-phone-area").mask("(000) 00 000 0 000");
$(".f-phone").mask("00 000 0 000");
