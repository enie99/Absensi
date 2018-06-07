<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- <link rel="shortcut icon" href="<?/*php echo base_url();*/?>/images/favicon.png" type="image/png">-->
    
    <title>Absensi</title>
    <!--icheck-->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/iCheck/skins/minimal/minimal.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/iCheck/skins/square/square.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/iCheck/skins/square/red.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/iCheck/skins/square/blue.css');?>" />  
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/iCheck/skins/flat/blue.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/clndr.css');?>" /><!--dashboard calendar-->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/morris-chart/morris.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap-fileupload.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/bootstrap-datepicker/css/datepicker-custom.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/bootstrap-timepicker/css/timepicker.css');?>" />  
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/bootstrap-datetimepicker/css/datetimepicker-custom.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/bootstrap-daterangepicker/daterangepicker.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/jquery-tags-input/jquery.tagsinput.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/gritter/css/jquery.gritter.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/nestable/jquery.nestable.css');?>" /><!--nestable css-->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/dropzone/css/dropzone.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/style.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/style-responsive.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/table-responsive.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/fuelux/css/tree-style.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/bootstrap-fileinput-master/css/fileinput.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/js/sweetalert-master/dist/sweetalert.css');?>" />

    <!--New Template-->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/css/bootstrap-responsive.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/css/maruti-style.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/css/maruti-media.css');?>" class="skin-color" />

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/backend/js/jquery-1.10.2.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery-ui-1.9.2.custom.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery-migrate-1.2.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/modernizr.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.nicescroll.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/fuelux/js/tree.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/tree-init.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/bootstrap-fileinput-master/js/fileinput.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/RobinHerbots-Inputmask/dist/jquery.inputmask.bundle.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/tooltip.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/sweetalert-master/dist/sweetalert-dev.js');?>"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyD67FGdk2D3otSMETke5rb8i9J6tw7MbdI&callback=initMap"></script>

</head>

<body class="cz-shortcut-listen='true'">
    <?php echo $header; ?>
    <?php echo $sidebar; ?>
    <?php echo $content; ?>
    <?php echo $footer; ?>

    <!--ios7-->
    <script src="<?php echo base_url('assets/backend/js/ios-switch/switchery.js');?>" ></script>
    <script src="<?php echo base_url('assets/backend/js/ios-switch/ios-init.js');?>" ></script>

    <!--icheck -->
    <script src="<?php echo base_url('assets/backend/js/iCheck/jquery.icheck.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/icheck-init.js');?>"></script>

    <!--pickers plugins-->
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-daterangepicker/date.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-daterangepicker/moment.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/backend/js/bootstrap-timepicker/js/bootstrap-timepicker.js');?>"></script>

    <!--pickers initialization-->
    <script src="<?php echo base_url('assets/backend/js/pickers-init.js');?>"></script>

    <!--easy pie chart-->
    <script src="<?php echo base_url('assets/backend/js/easypiechart/jquery.easypiechart.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/easypiechart/easypiechart-init.js');?>"></script>

    <!--Sparkline Chart-->
    <script src="<?php echo base_url('assets/backend/js/sparkline/jquery.sparkline.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/js/sparkline/sparkline-init.js');?>"></script>


<!--Morris Chart-->
<script src="<?php echo base_url('assets/backend/js/morris-chart/morris.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/morris-chart/raphael-min.js');?>"></script>

<!--Calendar-->
<!--<script src="<?php echo base_url();?>/js/calendar/clndr.js"></script>
<script src="<?php echo base_url();?>/js/calendar/evnt.calendar.init.js"></script>
<script src="<?php echo base_url();?>/js/calendar/moment-2.2.1.js"></script>
<script src="<?php echo base_url();?>/js/underscore-min.js"></script>-->

<!--Dashboard Charts-->
<script src="<?php echo base_url('assets/backend/js/dashboard-chart-init.js');?>"></script>
<!--file upload-->
<script src="<?php echo base_url('assets/backend/js/bootstrap-fileupload.min.js');?>"></script>

<!--tags input-->
<script src="<?php echo base_url('assets/backend/js/jquery-tags-input/jquery.tagsinput.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/tagsinput-init.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/ckeditor/ckeditor.js');?>"></script>

<!--New Template-->
<script src="<?php echo base_url('assets/backend/js/js/excanvas.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/jquery.ui.custom.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/jquery.flot.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/jquery.flot.resize.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/jquery.peity.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/fullcalendar.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/maruti.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/maruti.dashboard.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/js/maruti.chat.js');?>"></script>

<!--gritter script-->
<script src="<?php echo base_url('assets/backend/js/gritter/js/jquery.gritter.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/gritter/js/gritter-init.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/jquery.maskMoney.js');?>"></script>

<!--dropzone-->
<script src="<?php echo base_url('assets/backend/js/dropzone/dropzone.js');?>"></script>
<!--common scripts for all pages-->
<script src="<?php echo base_url('assets/backend/js/scripts.js');?>"></script>
</body>
</html>
