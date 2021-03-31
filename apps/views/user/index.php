<div class="container-fluid">

    <!-- Page Heading -->
    <?php if (!empty($_SESSION['userdata'])) : ?>
    <div class="row mb-2">
        <div class="col-sm-2">
            <a href="<?= BASE_URL ?>User/tambah" class="btn btn-sm btn-primary"> <i class="fa fa-fw fa-plus"></i> Tambah
                Data</a>
        </div>
    </div>
    <?php endif; ?>

    <input type="hidden" name="flash" id="flash" value="<?= !empty($_SESSION['flash']) ? $_SESSION['flash'] : '' ?>">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            User ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">
                                            Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending">Jabatan
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending">Dibuat
                                            oleh</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending">Dibuat pada
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending">
                                            Action</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">User ID</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Jabatan</th>
                                        <th rowspan="1" colspan="1">Office</th>
                                        <th rowspan="1" colspan="1">Age</th>
                                        <th rowspan="1" colspan="1">Start date</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php foreach ($data['user'] as $row) : ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?= $row['user_id'] ?></td>
                                        <td class="sorting_1"><?= $row['name'] ?></td>
                                        <td><?= $row['rule'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?= $row['created_by'] ?></td>
                                        <td>
                                            <?php if (empty($_SESSION['userdata'])) : ?>
                                            <a href="<?= BASE_URL ?>Login" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                </span>
                                                <span class="text">Login</span>
                                            </a>
                                            <?php else : ?>
                                            <a href="<?= BASE_URL ?>User/ubah/<?= $row['user_id'] ?>"
                                                class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="<?= BASE_URL ?>" data-id="<?= $row['user_id'] ?>"
                                                class="btn btn-danger btn-icon-split btn-delete">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>