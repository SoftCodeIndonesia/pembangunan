<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambah user</div>
                <hr>
                <form method="POST" action="<?= BASE_URL ?>User/storeCreated">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama"
                            autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-select form-control" name="rules_id" aria-label="Default select example">
                            <option selected>
                                <== PILIH JABATAN==>
                            </option>
                            <?php foreach($data['rules'] as $rules) : ?>
                            <option value="<?= $rules['rules_id'] ?>"><?= $rules['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-sm btn-light btn-block">simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>