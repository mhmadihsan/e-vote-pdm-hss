function btn_delete(btn){
    const id = $(btn).data('id');
    Swal.fire({
        title: 'Apakah anda yakin ingin menghapus',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        denyButtonText: `Jangan Hapus`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            axios.delete(window.location.origin+'/admin/tickets/delete/'+id)
                .then(function (response) {
                    if(response.data.status=="failed"){
                        Swal.fire(
                            'Peringatan',
                            response.data.message,
                            'error'
                        );
                    }
                    else{
                        Swal.fire(
                            'Berhasil',
                            response.data.message,
                            'success'
                        );
                        location.reload();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        } else if (result.isDenied) {
            Swal.fire('data tidak jadi dihapus', '', 'info')
        }
    });
}
