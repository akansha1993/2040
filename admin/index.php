<?php
require_once('includes/config.php');
require_once('includes/function.php');

if (isset($_POST['username'])) {
    $GFH_Admin->login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $sys['system_name'];?> Admin</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->
    <?php require_once('includes/css.inc'); ?>

    <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN LOGIN SECTION -->
<section class="section-account">
    <div class="img-backdrop" style="background-image: url('assets/img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <br/>
                    <span class="text-lg text-bold text-primary"><?php echo $sys['system_name'];?> </span>
                    <br/><br/>

                    <form class="form floating-label" accept-charset="utf-8" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <label for="password">Password</label>

                            <p class="help-block"><a href="#">Forgotten?</a></p>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        <input type="checkbox"> <span>Remember me</span>
                                    </label>
                                </div>
                            </div>
                            <!--end .col -->
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Login</button>
                            </div>
                            <!--end .col -->
                        </div>
                        <!--end .row -->
                    </form>
                </div>
                <!--end .col -->
                <div class="col-sm-5 col-sm-offset-1 text-center">
                    <br><br>

                    <h3 class="text-light">
                        No account yet?
                    </h3>
                    <a class="btn btn-block btn-raised btn-primary" href="#">Sign up here</a>
                    <br><br>

                    <h3 class="text-light">
                        or
                    </h3>

                    <p>
                        <a href="#" class="btn btn-block btn-raised btn-info"><i class="fa fa-facebook pull-left"></i>Login
                            with Facebook</a>
                    </p>

                    <p>
                        <a href="#" class="btn btn-block btn-raised btn-info"><i class="fa fa-twitter pull-left"></i>Login
                            with Twitter</a>
                    </p>
                </div>
                <!--end .col -->
            </div>
            <!--end .row -->
        </div>
        <!--end .card-body -->
    </div>
    <!--end .card -->
</section>
<!-- END LOGIN SECTION -->
<?php require_once('includes/js.inc'); ?>

</body>
</html>
