var i = 0;
$(document).on('click', '.btn-add-column', function(e){
    e.preventDefault();
    var content = `<div class="form-group col-sm-3" id="parentElement`+i+`">
    <label for="upload`+i+`">
            <div class="row">
                <div class="col-sm-12">
                    <img src="`+base_url+`assets/images/upload-icon.png" style="width: 500px;height:200px"
                        class="img-thumbnail upload`+i+`" alt="...">

                </div>
                <div class="col-sm-12">
                    <p class="text-center">Klick to upload</p>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-danger btn-sm col-sm-12 btn-delete-file" data-id="`+i+`"><i
                            class="fa fa-fw fa-trash"></i>
                        Hapus</button>
                </div>
            </div>
        </label>
        <input type="file" name="file`+i+`" class="btn-upload-file" id="upload`+i+`" accept=".jpg, .jpeg, .png, .xls, .xlsx, .pdf, .docx" style="display: none;">
    </div>`;
    $('.field-upload').append(content);
    i++;
});
    
    
function readURL(input) {
    var className = '.'+input.id;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
    
    
        reader.onload = function(e) {
            var split = input.files[0].name.split('.');
            var fileType = split[split.length - 1];
            
            
            if(fileType == 'jpg' || fileType == 'jpeg' || fileType == 'png'){
                $(className).attr('src', e.target.result);
            }else if (fileType == 'xls' || fileType == 'xlsx'){
                $(className).attr('src', base_url + 'assets/images/xls.jpeg');
            }else if(fileType == 'pdf'){
                $(className).attr('src', base_url + 'assets/images/pdf.png');
            }else{
                $(className).attr('src', base_url + 'assets/images/docx.png');
            }

            
        }

        // $(document).on('click','.btn-danger',function (e) { 
        //     e.preventDefault();
        //     var id = $(this).data("id");
        //     var child = $(this).parent().parent().parent();
        //     child.remove();
            
        // });
    
        reader.readAsDataURL(input.files[0]); // convert to base64 string

    
    }

    
}

// $(".btn-upload-file").change(function() {

//     readURL(this);
// });
$(document).on('change','.btn-upload-file', function () {
    readURL(this);
})
$(document).on('click', '.btn-delete-file', function (e) {
    e.preventDefault();
    var parent = '#parentElement' + $(this).data('id');
    $(parent).remove();
})

