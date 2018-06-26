<style type="text/css">

    .thirdlevel {
        left: 100% !important;
        top: 0px !important;
    }

    .forthlevel {
        top: 100% !important;
        top: 0px !important;
    }

</style>
<div class="main-menu"  id="sidebar"><a href="<?php echo base_url('mastercms/home'); ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul style="display: block;">
        <li class="active"><a href="<?php echo base_url('mastercms/home'); ?>"><i class="icon icon-home"></i><span>Dashboard</span></a></li>
        <li class="dropdown fadeInDown animated d3">
            <a href="#" class="right-caret"><i class="icon icon-briefcase"></i> <span>Perusahaan</span> <span><b class="caret" style="margin-top:10px;border-top: 4px solid #f1e7e7;"></b></span></a>
                <ul class="firstlevel sub-menu">
                    <li class="twolevel">
                        <a class=" right-caret" href="<?php echo base_url('mastercms/perusahaan') ?>">Profil </a>
                        <!-- <ul class="thirdlevel dropdown-menu sub-menu" style=" margin-top: 10px">
                            <li><a href="#" class="trigger">Add Content</a></li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="<?php echo base_url('mastercms/perusahaan/cabang'); ?>">Data Cabang</a>
                    </li>
                </ul>
        </li>
        <!-- <li> <a href="#"><i class="icon icon-inbox"></i><span>E-Commarce</span></a> </li> -->
        <li class="submenu"> <a href="#"><i class="icon-user"></i><span>Karyawan</span> <span><b class="caret" style="margin-top:10px;border-top: 4px solid #f1e7e7;"></b></span></a>
            <ul>
                <li><a href="<?php echo base_url('mastercms/karyawan'); ?>">Data Karyawan</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-file"></i><span>Report</span> <span><b class="caret" style="margin-top:10px;border-top: 4px solid #f1e7e7;"></b></span></a>
            <ul>
                <li><a href="<?php echo base_url('mastercms/absensi/summary'); ?>"></i> Summary</a></li>
                <li><a href="<?php echo base_url('mastercms/absensi'); ?>"></i> Absensi Karyawan</a></li>
            </ul>
        </li>

       <!--  <li class="submenu"> <a href="#"><i class="icon icon-cog"></i><span>Setting</span> <span><b class="caret" style="margin-top:10px;border-top: 4px solid #f1e7e7;"></b></span></a>
            <ul>
                <li><a href="#">Bank Account</a></li>
                <li><a href="#">Shipping</a></li>
            </ul>
        </li> -->
    </ul>
</div>
<script type="text/javascript">
    $(function() {
        $(".main-menu").on("mouseenter", ".dropdown", function() {
            $(this).find(".firstlevel").parent().addClass("active");
            $(this).find(".firstlevel").show();
            $(this).on("mouseleave", function() {
                $(this).find(".firstlevel").hide();
                $(this).find(".firstlevel").parent().removeClass("active");
            });
        });

        $(".main-menu").on("mouseenter", ".twolevel", function() {

            var ww = $(window).width();
            var $menuItem = $(this).find(".thirdlevel");
            var $firstLevel = $(".firstlevel");
            var mw = $menuItem.width() + $firstLevel.offset().left + $firstLevel.width();
            var marginLeft = 0 - ($menuItem.width() + $firstLevel.width());
            if (ww < mw) {
                $menuItem.css("margin-left", marginLeft);
            }
            $menuItem.css("display", "block");
            $(this).on("mouseleave", function() {
                $(this).find(".thirdlevel").css("display", "none");
            });
        });

    });

    $(function() {
        $(".dropdown-menu > li > a.trigger").on("click", function(e) {
            var current = $(this).next();
            var grandparent = $(this).parent().parent();
            if ($(this).hasClass('left-caret') || $(this).hasClass('right-caret'))
                $(this).toggleClass('right-caret left-caret');
            grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
            grandparent.find(".sub-menu:visible").not(current).hide();
            current.toggle();
            e.stopPropagation();
        });
        $(".dropdown-menu > li > a:not(.trigger)").on("click", function() {
            var root = $(this).closest('.dropdown');
            root.find('.left-caret').toggleClass('right-caret left-caret');
            root.find('.sub-menu:visible').hide();
        });
    });
</script>