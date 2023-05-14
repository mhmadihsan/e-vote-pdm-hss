$(document).ready(function() {
   // $('#count_show_choice').text('69');
});

function checking(){
    var numberOfChecked = $('input:checkbox:checked').length;
    $('#count_show_choice').text(numberOfChecked);
    if(numberOfChecked==13){
        $('#btn_sumbit').attr('disabled',false);
    }
    else{
        if(numberOfChecked>13){
            Swal.fire(
                'Peringatan',
                'Tidak Boleh memilih lebih dari 13 calon',
                'error'
            );
        }
        $('#btn_sumbit').attr('disabled',true);
    }
}
