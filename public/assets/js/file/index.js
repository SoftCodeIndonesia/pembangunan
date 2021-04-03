flash();
createDataIndex();

function createDataIndex() { 
    var content = '';
    
    $.ajax({
        type: "GET",
        url: base_url + 'Report/getAllAttachment',
        dataType: "json",
        success: function (response) {
            
            $.each(response, function (i, value) { 
                
                content += '<div class="col-sm-3">';
                content += '<div class="card">';
                content += '<div class="card-body">';
                content += '<i class="fa fa-fw fa-folder"></i>'+value.title+'';
                content += '</div>';
                content += '<div class="card-footer">';
                content += '<div class="row">';
                content += '<div class="col-sm-6">';
                content += '<a href="'+base_url+'/Report/ubah/'+value.attachment_id+'" class="col-12 btn btn-sm btn-warning">Edit</a>';
                content += '</div>';
                content += '<div class="col-sm-6">';
                content += '<a href="" data-id="'+value.attachment_id+'" class="col-12 btn btn-sm btn-danger" id="btn-delete">Hapus</a>';
                
                content += '</div>';
                content += '</div>';
                content += '</div>';
                content += '</div>';
                content += '</div>';
                $('#content-file').html('');
                $('#content-file').append(content);
                
            });
        }
    });
}

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


$(document).on('click', '#btn-delete', function (e) {
    e.preventDefault();
    console.log("delete");
    
    var id = $(this).data('id');
    swal({
        title: "Yakin ingin hapus data?",
        text: "Data akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if(willDelete){
                window.location.replace(base_url + 'Report/delete/' + id);
            }
        });
});