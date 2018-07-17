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
    
</head>

<body class="login-body">
    <div class="container">
        <form class="form-signin" action="" method="post">
            <div class="form-signin-heading text-center">
                
                <h3 style="color: #000; font-weight: bold;">Reset Password</h3>
            </div>
            <div class="login-wrap">
                 <?php echo $this->session->userdata('msg');  ?>
                
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru">
                
                <button class="btn btn-login btn-block" type="submit">
                    &nbsp; Kirim
                </button>

                
            </div>
           
        </form>
    </div>

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
