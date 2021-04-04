<div class="container-fluid">
    <input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">

    <div class="row" id="usulan-masyarakat">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-title text-primary"><?= $data['usulan']['name'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $data['usulan']['rule'] ?></h6>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= BASE_URL ?>lokasi/location/<?= $data['usulan']['lat'] ?>/<?= $data['usulan']['lang'] ?>/<?= $data['usulan']['usulan_id'] ?>"
                                class="btn btn-sm btn-secondary"><i
                                    class="fa fa-fw fa-map-marker-alt text-danger"></i>Lihat
                                lokasi</a>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text"><?= $data['usulan']['title'] ?></p>
                    <?php if (!empty($_SESSION['userdata'])) : ?>
                    <?php if ($data['usulan']['writer'] == $_SESSION['userdata']['user_id']) : ?>
                    <?php if ($data['usulan']['is_read'] == 0) : ?>
                    <a href="<?= BASE_URL ?>Usulan/ubah/<?= $data['usulan']['usulan_id'] ?>"
                        class="card-link btn btn-sm btn-warning">Ubah</a>
                    <?php endif; ?>
                    <a href="<?= BASE_URL ?>Usulan/hapus/<?= $data['usulan']['usulan_id'] ?>"
                        class="card-link btn btn-sm btn-danger">Hapus</a>
                    <?php endif; ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>