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

function create() { 
    $.ajax({
        type: "POST",
        url: base_url + "Usulan/getAllData",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#usulan-masyarakat").append("");
            $.each(response, function (i, value) { 
                var content = `
                 <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">` + value.name +`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">` + value.rule +`</h6>
                            <p class="card-text">` + value.title.substr(0,100) + `</p>
                            <a href="`+ base_url +`usulan/detail/`+ value.usulan_id +`"
                                class="card-link btn btn-sm btn-primary">Lihat detail</a>
                            <?php if (!empty($_SESSION['userdata'])) : ?>
                            <?php if ($value['writer'] == $_SESSION['userdata']['user_id']) : ?>
                            <?php if ($value['is_read'] == 0) : ?>
                            <a href="<?= BASE_URL ?>Usulan/ubah/` + value.usulan_id + `"
                                class="card-link btn btn-sm btn-warning">Ubah</a>
                            <?php endif; ?>
                            <a href="<?= BASE_URL ?>Usulan/hapus/`+ value.usulan_id +`" class="card-link btn btn-sm btn-danger"
                                id="btn-delete" data-id="`+ value.usulan_id +`">Hapus</a>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>`;
                $("#usulan-masyarakat").append(content);
            });
        }
    });
 }

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
                var usulan_id = $(this).data('id');
                // swal("Poof! Your imaginary file has been deleted!", {
                //     icon: "success",
                // });
                $.ajax({
                    type: "POST",
                    url: base_url + "usulan/delete",
                    data: {
                        usulan_id: usulan_id
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

                        window.location.replace(base_url + 'Usulan');
                    }
                });
            }
        });
});