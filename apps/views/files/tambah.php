<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Upload File</div>
                    <hr>
                    <form method="POST" action="<?= BASE_URL ?>Report/storeCreated" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" placeholder="Masukan nama" name="title" id="title"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <!-- <input type="text" class="form-control" value="" name="name" id="name" placeholder="Masukan nama"
                            autocomplete="off" required> -->
                            <textarea class="form-control" placeholder="Masukan description" name="description"
                                id="Description" cols="30" rows="10"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for="file">Upload file</label>
                            <input type="file" class="form-control" name="file" id="file" autocomplete="off"
                                accept=".jpg, .jpeg, .png, .xls, .xlsx, .pdf, .docx">
                        </div>
                        <div class="row" id="list-file">

                        </div> -->
                        <button class="btn btn-success btn-sm btn-add-column"><i class="fa fa-fw fa-plus"></i> Tambahkan
                            kolom untuk
                            upload file</button>
                        <div class="row mt-3 field-upload">
                            <!-- <div class="form-group col-sm-3">
                                <label for="upload">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img src="<?= BASE_URL ?>assets/images/upload-icon.png" width="100%"
                                                class="img-thumbnail" alt="...">

                                        </div>
                                        <div class="col-sm-12">
                                            <p class="text-center">Klick to upload</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-danger btn-sm col-sm-12"><i
                                                    class="fa fa-fw fa-trash"></i>
                                                Hapus</button>
                                        </div>
                                    </div>
                                </label>
                                <input type="file" name="file" id="upload" style="display: none;">
                            </div> -->
                        </div>
                        <div class="form-group mt-3">
                            <label for="created_at">Dibuat oleh</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['userdata']['name'] ?>"
                                name="created_at" id="created_at" autocomplete="off" readonly>
                        </div>
                        <div class="row mb-2 mt-5">
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-sm btn-primary">simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>