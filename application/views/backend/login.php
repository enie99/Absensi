<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/js/gritter/css/jquery.gritter.css');?>" />
    <link href="<?php echo base_url('assets/backend/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/backend/css/style-responsive.css');?>" rel="stylesheet">
    <?php echo $script_captcha; // javascript recaptcha ?>
</head>

<body class="login-body">
    <div class="container">
        <form class="form-signin" action="" method="post">
            <div class="form-signin-heading text-center">
                <!-- <img src="<?php echo base_url('assets/backend/images/login-logo.png');?>" alt=""/> -->
                <h3 style="color: #000; font-weight: bold;">LOGIN ABSENSI</h3>
            </div>
            <div class="login-wrap">
                <?php echo $this->session->userdata('msg'); unset($_SESSION); ?>
                <input type="email" name="AdmUsr" class="form-control" placeholder="Email" autofocus>
                <input type="password" name="AdmPswd" class="form-control" placeholder="Password">
                <div class="form-group">
                    <?php echo $captcha // tampilkan recaptcha ?>
                </div>
                <button class="btn btn-login btn-block" type="submit" name="LogAdmin">
                    <i class="fa fa-unlock-alt"></i>&nbsp; Login
                </button>

                <div class="registration">
                    <a data-toggle="modal" href="#myModal"> Lupa Password !</a>
                </div>
            </div>
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Lupa Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="email" name="forgetEmail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-primary" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
        </form>
    </div>
    <?php if ($hasil=='berhasil'): ?>
        <script>
            location='<?php echo base_url("mastercms/home"); ?>';
        </script>
    <?php endif ?>

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/backend/js/jquery-1.10.2.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery-ui-1.9.2.custom.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery-migrate-1.2.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/modernizr.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.nicescroll.js');?>"></script>

    <!--gritter script-->
    <script src="<?php echo base_url('assets/backend/js/gritter/js/jquery.gritter.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/backend/js/gritter/js/gritter-init.js');?>" type="text/javascript"></script>


</body>
</html>
