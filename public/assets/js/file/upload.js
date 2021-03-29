
    
    
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
    
    
        reader.onload = function(e) {
            var split = input.files[0].name.split('.');
            var fileType = split[split.length - 1];
            
            if(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png'){
                content = `<div class="col-sm-3" id="`+input.files[0].name+`">
                <div class="card">
                    <img src="` + e.target.result + `" class="card-img-top" alt="`+input.files[0].name+`" width="100" height="200">
                    <div class="card-body">
                        <h5 class="card-title">`+input.files[0].name+`</h5>
                        <button data-id="`+input.files[0].name+`" data-id="`+input.files[0].name+`" class="btn btn-danger col-sm-12">Hapus</button>
                    </div>
                </div>
            </div>`;
                
                $("#list-file").append(content);
            }else if (fileType == 'xls' || fileType == 'xlsx'){
                content = `<div class="col-sm-3" id="`+input.files[0].name+`">
                <div class="card">
                    <img src="`+ base_url +`assets/images/xls.jpeg" class="card-img-top" alt="`+input.files[0].name+`" width="100" height="200">
                    <div class="card-body">
                        <h5 class="card-title">`+input.files[0].name+`</h5>
                        <button data-id="`+input.files[0].name+`" class="btn btn-danger col-sm-12">Hapus</button>
                    </div>
                </div>
            </div>`;
                $("#list-file").append(content);
            }else if(fileType == 'pdf'){
                content = `<div class="col-sm-3" id="`+input.files[0].name+`">
                <div class="card">
                    <img src="`+ base_url +`assets/images/pdf.png" class="card-img-top" alt="`+input.files[0].name+`" width="100" height="200">
                    <div class="card-body">
                        <h5 class="card-title">`+input.files[0].name+`</h5>
                        <button data-id="`+input.files[0].name+`" class="btn btn-danger col-sm-12">Hapus</button>
                    </div>
                </div>
            </div>`;
                                $("#list-file").html(content);
            }else{
                content = `<div class="col-sm-3" id="`+input.files[0].name+`">
                <div class="card">
                    <img src="` + base_url + `assets/images/docx.png" class="card-img-top" alt="`+input.files[0].name+`" width="100" height="200">
                    <div class="card-body">
                        <h5 class="card-title">`+input.files[0].name+`</h5>
                        <button data-id="`+input.files[0].name+`" class="btn btn-danger col-sm-12">Hapus</button>
                    </div>
                </div>
            </div>`;
            $("#list-file").append(content);
            }

            
        }

        $(document).on('click','.btn-danger',function (e) { 
            e.preventDefault();
            var id = $(this).data("id");
            var child = $(this).parent().parent().parent();
            child.remove();
            
        });
    
        reader.readAsDataURL(input.files[0]); // convert to base64 string

    
    }

    
}

$("#file").change(function() {
    readURL(this);
});
