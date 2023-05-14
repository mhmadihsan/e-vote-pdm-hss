$(document).ready(function() {

});

function search_button(btn){
    var ticket = $('#input_ticket').val();
    $(btn).attr('disabled',true);
    axios.get(window.location.origin+'/voting?ticket='+ticket)
        .then(function (response) {
            $(btn).attr('disabled',false);
            Swal.fire(
                'Sukses',
                'Tiket Ditemukan!',
                'success'
            );
            window.location.href = 'voting?ticket='+ticket;
        })
        .catch(function (error) {
            $(btn).attr('disabled',false);
            Swal.fire(
                'Peringatan',
                'Tiket Tidak Ditemukan!',
                'error'
            );
        });
}
