<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $data['title'] ?></title>
    <!-- loader-->
    <link href="<?= BASE_URL ?>assets/vendor/css/pace.min.css" rel="stylesheet" />
    <script src="<?= BASE_URL ?>assets/vendor/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="<?= BASE_URL ?>assets/vendor/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="<?= BASE_URL ?>assets/vendor/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="<?= BASE_URL ?>assets/vendor/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="<?= BASE_URL ?>assets/vendor/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="<?= BASE_URL ?>assets/vendor/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="<?= BASE_URL ?>assets/vendor/images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign In</div>
                    <form method="POST" action="<?= BASE_URL ?>Login/login">
                        <div class="form-group">
                            <label for="user_id" class="sr-only">ID USER</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="user_id" value="<?= $this->helper->set_value('user_id') ?>"
                                    name="user_id" class="form-control input-shadow" placeholder="Enter ID User"
                                    required autocomplete="off">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                                <p class="text-danger font-italic"><?= $this->helper->form_error('user_id') ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="password" name="password"
                                    value="<?= $this->helper->set_value('password') ?>"
                                    class="form-control input-shadow" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                                <p class="text-danger font-italic"><?= $this->helper->form_error('password') ?></p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light btn-block">Sign In</button>


                    </form>
                </div>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->



    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= BASE_URL ?>assets/vendor/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/js/bootstrap.min.js"></script>

    <!-- sidebar-menu js -->
    <script src="<?= BASE_URL ?>assets/vendor/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="<?= BASE_URL ?>assets/vendor/js/app-script.js"></script>

</body>

</html>