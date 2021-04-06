// Dispatch all Sweet Alert Component
window.addEventListener('swal', function (e) {
    Swal.fire(e.detail);
});

// ========================== Administrator ===========================

// Hide Administrator Create Collapse
window.addEventListener('administratorCreateCollapseHide', event => {
    $('#newAdministratorCollapse').collapse('hide')
});

// Open administrator delete dialog modal 
window.addEventListener('openDeleteAdministratorModal', event => {
    $("#deleteAdministratorModal").modal('show'); //close create modal
});

// Close administrator delete dialog modal 
window.addEventListener('closeDeleteAdministratorModal', event => {
    $("#deleteAdministratorModal").modal('hide'); //close create modal
});

// ========================== Musician ===========================

// Hide Musician Create Collapse
window.addEventListener('musicianCreateCollapseHide', event => {
    $('#newMusicianCollapse').collapse('hide')
});

// Open Musician delete dialog modal 
window.addEventListener('openDeleteMusicianModal', event => {
    $("#deleteMusicianModal").modal('show'); //close create modal
});

// Close Musician delete dialog modal 
window.addEventListener('closeDeleteMusicianModal', event => {
    $("#deleteMusicianModal").modal('hide'); //close create modal
});

// ========================== Client ===========================

// Hide Client Create Collapse
window.addEventListener('clientCreateCollapseHide', event => {
    $('#newClientCollapse').collapse('hide')
});

// Open Client delete dialog modal 
window.addEventListener('openDeleteClientModal', event => {
    $("#deleteClientModal").modal('show'); //close create modal
});

// Close Client delete dialog modal 
window.addEventListener('closeDeleteClientModal', event => {
    $("#deleteClientModal").modal('hide'); //close create modal
});

// ========================== Validation ===========================

// Fields Formatter
$('.f-money').mask('000000000000000.0', { reverse: true });
$('.f-phone-area').mask('(000) 00 000 0 000');
$('.f-phone').mask('00 000 0 000');