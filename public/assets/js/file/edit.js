var id = $('#id_attachment').val();
$.ajax({
    type: "GET",
    url: base_url + 'Report/getDataWithUpdate/' + id,
    dataType: "json",
    success: function (response) {
        $('#title').val(response[0].title)
        $('#description').val(response[0].description)
        
        var i = 0
        $.each(response[1], function (i, value) { 
             var content = '';
            content += '<div class="form-group col-sm-3" id="parentElement'+i+'">';
            content += '<label for="upload'+i+'">';
            content += '<div class="row">';
            content += '<div class="col-sm-12">';
            content += '<img src="'+ base_url + value.source +'" style="width: 500px;height:200px" class="img-thumbnail upload`+i+`" alt="...">';
            content += '</div>';
            content += '<div class="col-sm-12"><p class="text-center">Klick to upload</p></div>';
            content += '<div class="col-sm-12"><button class="btn btn-danger btn-sm col-sm-12" id="btn-delete" data-id="'+value.file_id+'"><i class="fa fa-fw fa-trash"></i>Hapus</button>';
            content += '</div>';
            content += '</div>';
            content += '</label>';
            content += '</div>';

            $('.field-upload').append(content);
        });
    }
});

$(document).on('click', '#btn-delete', function (e) {
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
                var file_id = $(this).data('id');
                // swal("Poof! Your imaginary file has been deleted!", {
                //     icon: "success",
                // });
                $.ajax({
                    type: "POST",
                    url: base_url + "Report/deleteFile",
                    data: {
                        file_id: file_id
                    },
                    dataType: "json",
                    success: function (response) {
                        
                        console.log("console : " + response);
                        if (response > 0) {
                            $('#flash').val('berhasil dihapus');
                            flash();
                        } else {
                            $('#flash').val('gagal dihapus');
                            flash();
                        }

                        window.location.replace(base_url + 'Report/ubah/' + id);
                    }
                });
            }
        });
});

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
            url: base_url + "report/destroy_session",
            dataType: "json",
        });

    }
}