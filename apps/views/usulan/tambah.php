<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Buat usulan</div>
                    <hr>
                    <form method="POST" action="<?= BASE_URL ?>Usulan/storeCreated">
                        <div class="form-group">
                            <label for="title">Usulan Masyarakat</label>
                            <!-- <input type="text" class="form-control" value="" name="name" id="name" placeholder="Masukan nama"
                            autocomplete="off" required> -->
                            <textarea class="form-control" placeholder="Ketik usulanmu disini?" name="title" id="title"
                                cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Dibuat oleh</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['userdata']['name'] ?>"
                                name="created_at" id="created_at" autocomplete="off" readonly>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="rt">Koordinat Latitude</label>
                                <input type="text" class="form-control" value="<?= $this->helper->set_value('rt') ?>"
                                    id="lat" name="lat" autocomplete="off" readonly placeholder="Masukan latitidue"
                                    required>
                            </div>
                            <div class="form-group  col-sm-6">
                                <label for="rw">Koordinat longitude</label>
                                <input type="text" value="<?= $this->helper->set_value('rw') ?>" class="form-control"
                                    id="lng" name="lng" autocomplete="off" readonly placeholder="Masukan longitude"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="map" style="height: 500px;">

                                </div>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-sm btn-primary">simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>