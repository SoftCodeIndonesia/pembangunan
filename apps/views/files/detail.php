<div class="container-fluid">
    <input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">

    <div class="row" id="usulan-masyarakat">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-title text-primary"><?= $data['attachment']['title'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $data['attachment']['description'] ?></h6>
                        </div>
                        <div class="col-sm-6 text-right">
                            <p class="text-muted">Created By : <?= $data['attachment']['name'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <?php foreach ($data['file'] as $data) : ?>
                        <div class="col-sm-3 mr-2 mb-2">
                            <div class="card" style="width: 18rem;">
                                <?php if ($this->helper->checkTypeFile($data['name']) == 'jpg' || $this->helper->checkTypeFile($data['name']) == 'png' || $this->helper->checkTypeFile($data['name']) == 'jpeg') : ?>
                                <img src="<?= BASE_URL . $data['source'] ?>" style="width: 100%; height: 200px"
                                    class="card-img-top" alt="...">
                                <?php elseif ($this->helper->checkTypeFile($data['name']) == 'pdf') : ?>
                                <img src="<?= BASE_URL ?>assets/images/pdf.png" style="width: 100%; height: 200px"
                                    class="card-img-top" alt="...">
                                <?php else : ?>
                                <img src="<?= BASE_URL ?>assets/xls.jpeg" style="width: 100%; height: 200px"
                                    class="card-img-top" alt="...">
                                <?php endif; ?>
                                <div class="card-body">
                                    <a href="<?= BASE_URL . $data['source'] ?>" class="btn btn-primary col-12">Download
                                        File</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>