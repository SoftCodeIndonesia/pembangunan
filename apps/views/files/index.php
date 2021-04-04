<div class="container-fluid">
    <?php if (!empty($_SESSION['userdata'])) : ?>
    <div class="row mb-2">
        <div class="col-sm-2">
            <a href="<?= BASE_URL ?>Report/tambah" class="btn btn-sm btn-primary btn-block"> <i
                    class="fa fa-fw fa-upload"></i> Upload File</a>
        </div>
    </div>
    <?php endif; ?>
    <input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">
    <input type="hidden" name="session" value="<?= $_SESSION['userdata']['user_id'] ?>">
    <div class="row" id="content-file">

    </div>
</div>