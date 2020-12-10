
var table = dataTablesCreated();

function dataTablesCreated() {
    $('#data-column').html('');
    $.ajax({
        type: "POST",
        url: base_url + "/User/allUsers",
        dataType: "json",
        success: function (response) {
            $.each(response.data, function (index, value) {
                $('#data-column').append(value);
            });
        }
    });
}
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

$(document).on('click', '.btn-delete', function (e) {

    e.preventDefault();
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