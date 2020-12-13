<?php if(!empty($_SESSION['userdata'])) : ?>
<div class="row mb-2">
    <div class="col-sm-2">
        <a href="<?= BASE_URL ?>User/tambah" class="btn btn-sm btn-light btn-block">Tambah Data</a>
    </div>
</div>
<?php endif; ?>

<input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Responsive Users</h5>
                <div class="table-responsive">
                    <table class="table bg-transparent" id="table-users">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Dibuat oleh</th>
                                <th scope="col">Dibuat pada</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data-column">
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>