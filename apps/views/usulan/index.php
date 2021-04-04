<!-- <?php if (!empty($_SESSION['userdata'])) : ?>
<div class="row mb-2">
    <div class="col-sm-2">
        <a href="<?= BASE_URL ?>Usulan/tambah" class="btn btn-sm btn-light btn-block">Beri usulan</a>
    </div>
</div>
<?php endif; ?>

<input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">

<div class="row" id="usulan-masyarakat">
    <?php foreach ($data['usulan'] as $value) : ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $value['name'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $value['rule'] ?></h6>
                <p class="card-text"><?= substr($value['title'], 0, 100) ?></p>
                <a href="<?= BASE_URL ?>usulan/detail/<?= $value['usulan_id'] ?>"
                    class="card-link btn btn-sm btn-primary">Lihat detail</a>
                <?php if (!empty($_SESSION['userdata'])) : ?>
                <?php if ($value['writer'] == $_SESSION['userdata']['user_id']) : ?>
                <?php if ($value['is_read'] == 0) : ?>
                <a href="<?= BASE_URL ?>Usulan/ubah/<?= $value['usulan_id'] ?>"
                    class="card-link btn btn-sm btn-warning">Ubah</a>
                <?php endif; ?>
                <a href="<?= BASE_URL ?>Usulan/hapus/<?= $value['usulan_id'] ?>" class="card-link btn btn-sm btn-danger"
                    id="btn-delete" data-id="<?= $value['usulan_id'] ?>">Hapus</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div> -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usulan Masyarakat</h1>
    </div>

    <?php if (!empty($_SESSION['userdata'])) : ?>
    <div class="row mb-2">
        <div class="col-sm-2">
            <a href="<?= BASE_URL ?>Usulan/tambah" class="btn btn-sm btn-primary">Beri usulan</a>
        </div>
    </div>
    <?php endif; ?>
    <input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">
    <div class="row">

        <?php foreach ($data['usulan'] as $value) : ?>
        <div class="col-lg-6">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $value['name'] . ' ' . $value['rule'] ?>
                        <!-- <span class="text-muted"> |
                            <?= $value['is_read'] == 1 ? "Telah dibaca" : "Belum dibaca" ?></span> -->
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item"
                                href="<?= BASE_URL ?>usulan/detail/<?= $value['usulan_id'] ?>">Lihat detail</a>
                            <?php if ($value['user_id'] == $_SESSION['userdata']['user_id']) : ?>
                            <a class="dropdown-item"
                                href="<?= BASE_URL ?>Usulan/ubah/<?= $value['usulan_id'] ?>">Ubah</a>
                            <div class="dropdown-divider"></div>
                            <?php endif; ?>
                            <?php if ($value['user_id'] == $_SESSION['userdata']['user_id']) : ?>
                            <a class="dropdown-item" data-id="<?= $value['usulan_id'] ?>" id="btn-delete"
                                href="#">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?= substr($value['title'], 0, 500) ?>
                </div>
                <?php if ($value['lat'] && $value['lang']) : ?>
                <div class="card-footer">
                    <a href="<?= BASE_URL ?>lokasi/location/<?= $value['lat'] ?>/<?= $value['lang'] ?>/<?= $value['usulan_id'] ?>"
                        class="btn btn-sm btn-secondary"> <i class="fa fa-fw fa-map-marker-alt text-danger"></i>Lihat
                        lokasi</a>

                </div>
                <?php endif; ?>
            </div>

        </div>

        <?php endforeach; ?>
    </div>

</div>