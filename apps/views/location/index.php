<div class="container-fluid">
    <div class="row" id="usulan-masyarakat">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-title text-primary"><?= $data['usulan']['name'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $data['usulan']['rule'] ?></h6>
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
    <div class="row">
        <div class="col-sm-12 text-center pl-4 pt-4 pr-4">
            <div class="mapouter">
                <div class="gmap_canvas">

                    <iframe width="100%" height="100%" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=<?= $_SESSION['lat'] . ',' . $_SESSION['lng'] ?>&t=k&z=15&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                    <a href="https://embedgooglemap.net/134/"></a>

                </div>

                <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 300%;
                    width: 100%;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 100%;
                    width: 100%;
                }
                </style>
            </div>
        </div>
    </div>
</div>