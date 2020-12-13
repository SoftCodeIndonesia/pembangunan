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

// $.ajax({
//     type: "POST",
//     url: base_url + 'Usulan/getAllUsulan',
//     dataType: "json",
//     success: function (response) {
//         $('#usulan-masyarakat').html('');
//         $.each(response, function (i, value) {

//             $('#usulan-masyarakat').append(`

//                 <div class="col-lg-4">
//                     <div class="card">
//                         <div class="card-body">
//                             <h5 class="card-title">`+ value.name + `</h5>
//                             <h6 class="card-subtitle mb-2 text-muted">`+ value.rule + `</h6>
//                             <p class="card-text">`+ value.title.slice(0, 100) + `</p>
//                             <a href="`+ base_url + 'Usulan/detail/' + value.usulan_id + `" class="card-link btn btn-sm btn-primary">Lihat detail</a>
//                         </div>
//                     </div>
//                 </div>

//              `);
//         });
//     }
// });