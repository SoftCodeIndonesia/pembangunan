<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Ubah usulan</div>
                <hr>
                <form method="POST" action="<?= BASE_URL ?>Usulan/storeUbah">
                    <input type="hidden" name="usulan_id" value="<?= $data['usulan']['usulan_id'] ?>">
                    <input type="hidden" name="is_read" value="<?= $data['usulan']['is_read'] ?>">
                    <div class="form-group">
                        <label for="title">Usulan Masyarakat</label>
                        <!-- <input type="text" class="form-control" value="" name="name" id="name" placeholder="Masukan nama"
                            autocomplete="off" required> -->
                        <textarea class="form-control" placeholder="Ketik usulanmu disini?" name="title" id="title"
                            cols="30" rows="10"><?= $data['usulan']['title'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Dibuat oleh</label>
                        <input type="text" class="form-control" value="<?= $_SESSION['userdata']['name'] ?>"
                            name="created_at" id="created_at" autocomplete="off" readonly>
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