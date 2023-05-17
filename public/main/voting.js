$(document).ready(function() {
   // $('#count_show_choice').text('69');
});

function checking(check){
    $('#btn_sumbit').attr('disabled',true);
    var numberOfChecked = $('input:checkbox:checked').length;
    if(numberOfChecked==13){
        $('#count_show_choice').text(numberOfChecked);
        $('#btn_sumbit').attr('disabled',false);
    }
    else{
        if(numberOfChecked>13){
            var numberOfChecked = 13;
            $(check).prop('checked', false);
            Swal.fire(
                'Peringatan',
                'Tidak Boleh memilih lebih dari 13 calon',
                'error'
            );
            $('#btn_sumbit').attr('disabled',false);
        }
        $('#count_show_choice').text(numberOfChecked);
    }

}

function submit_vote(btn){
    var voted =  $('input:checked').map(function(){
        return $(this).val();
    }).get();
    const ticket = getUrlParameter('ticket');
    $(btn).attr('disabled',true);

    Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(window.location.origin+'/vote/store', {
                voted: voted,
                ticket: ticket
            })
                .then(function (response) {
                    if(response.data.status=='failed'){
                        Swal.fire(
                            response.data.status,
                            response.data.messages,
                            'error'
                        );
                    }
                    let timerInterval
                    Swal.fire({
                        title: 'Berhasil memvote data',
                        html: 'Berhasil Memvote <b></b> milliseconds.',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            window.location.href = '/';
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                    })
                    $(btn).attr('disabled',false);
                    //window.location.href = 'polling';
                })
                .catch(function (error) {
                    $(btn).attr('disabled',false);
                });
        }
    })

}

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
