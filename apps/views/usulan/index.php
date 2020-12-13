<?php if(!empty($_SESSION['userdata'])) : ?>
    <div class="row mb-2">
    <div class="col-sm-2">
        <a href="<?= BASE_URL ?>Usulan/tambah" class="btn btn-sm btn-light btn-block">Beri usulan</a>
    </div>
</div>
<?php endif; ?>

<input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">

<div class="row" id="usulan-masyarakat">
<?php foreach($data['usulan'] as $value) : ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $value['name'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $value['rule'] ?></h6>
                <p class="card-text"><?= substr($value['title'],0,100) ?></p>
                <a href="<?= BASE_URL ?>usulan/detail/<?= $value['usulan_id'] ?>" class="card-link btn btn-sm btn-primary">Lihat detail</a>
                <?php if( !empty($_SESSION['userdata'])) : ?>
                    <?php if( $value['writer'] == $_SESSION['userdata']['user_id']) : ?>
                    <a href="<?= BASE_URL ?>usulan/ubah/<?= $value['usulan_id'] ?>" class="card-link btn btn-sm btn-warning">Ubah</a>
                    <a href="<?= BASE_URL ?>usulan/hapus/<?= $value['usulan_id'] ?>" class="card-link btn btn-sm btn-danger">Hapus</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

