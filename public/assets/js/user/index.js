
flash();
function flash() {
    var flash = $('#flash').val();
    if (flash) {

        swal({
            title: "Success!",
            text: "Data " + flash + "!",
            icon: "success",
            button: "OK",
        });
        $.ajax({
            type: "POST",
            url: base_url + "user/destroy_session",
            dataType: "json",
        });

    }
}
$('.btn-delete').click(function (e) { 
    e.preventDefault();
    console.log("delete");
    swal({
        title: "Yakin ingin hapus data?",
        text: "Data akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var user_id = $(this).data('id');
                // swal("Poof! Your imaginary file has been deleted!", {
                //     icon: "success",
                // });
                $.ajax({
                    type: "POST",
                    url: base_url + "user/delete",
                    data: {
                        user_id: user_id
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response > 0) {
                            $('#flash').val('berhasil dihapus');
                            flash();
                        } else {
                            $('#flash').val('gagal dihapus');
                        }

                        window.location.replace(base_url + 'User');

                        dataTablesCreated();
                    }
                });
            }
        });
});
// $(document).ready(function () {
//     $.ajax({
//         type: "POST",
//         url: base_url + "/Users/allUsers",
//         dataType: "json",
//         success: function (response) {
//             console.log(response);
//         }
//     });
// });