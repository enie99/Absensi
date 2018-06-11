 <!--Untuk logo fosquare-->
 <div id="header">
  <h1 ><a href="#">White Label</a></h1>
</div>

<!--Style Button Right-->
<div class="btn-group rightzero">
  <a class="top_message tip-left" title="" data-original-title="Manage Files"><i class="icon-file"></i></a>
  <a class="top_message tip-bottom" title="" data-original-title="Manage Users"><i class="icon-user"></i></a>
  <a class="top_message tip-bottom" title="" data-original-title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
  <a class="top_message tip-bottom" title="" data-original-title="Manage Orders"><i class="icon-shopping-cart"></i></a>
</div>
<div id="user-nav" class="navbar navbar-inverse" style="border-color: #47475c;top:-2px;">
  <ul class="nav">
    <li class=""><a title="" href="#view"><i class="icon icon-share-alt"></i> <span class="text" style="color: #fff">Logout</span></a></li>
    <!-- <li><a href="#view">Logout</a></li> -->
  </ul>
  <!-- Modal -->
</div>

<div class="light-modal" id="view" role="dialog" aria-labelledby="light-modal-label" aria-hidden="false">
  <div class="light-modal-content  animated zoomInUp">
    <div class="light-modal-header">
      <h3 class="light-modal-heading"><i class="fa fa-warning"></i> Logout</h3>
    </div>
    <div class="light-modal-body">
      Yakin ingin Keluar?
    </div>
    <div class="light-modal-footer">
      <a href="<?php echo base_url('mastercms/login/logout'); ?>" class="btn btn-danger" aria-label="close">Ya</a>&nbsp;&nbsp;&nbsp;
      <a href="#" class="btn btn-info" aria-label="close">Tidak</a>
    </div>
  </div>
</div>
