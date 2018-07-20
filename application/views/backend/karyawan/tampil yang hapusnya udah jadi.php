 <!-- page heading start-->
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
        <i class="icon-home"></i> Home
      </a>
      <a href="<?php echo base_url('mastercms/karyawan'); ?>">Data Karyawan</i>
      </a>
    </div>
  </div>
  <!-- page heading end-->
  <!-- body wrapper start -->
  <div class="container-fluid" style="min-height: 450px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="col-md-3">
          <div class="panel">
            <div class="panel-body">
              <h5 align="center">Daftar Perusahaan</h5>

              <table class="table">
                <?php foreach ($perusahaan as $key => $value) : ?>
                  <tr>
                    <form class="form-horizontal " role="form" method="post" enctype="multipart/form-data">
                      <td width="10%"><?php echo $key+1; ?></td>
                      <td>
                        <input type="hidden" name="lokasi_id" value="<?php echo $value['lokasi_id']; ?>">      
                        <div class="btn-group">
                          <button type="submit" class="btn btn-info" ><?php echo $value['lokasi_nama']; ?></button>
                        </div>
                      </td>
                    </form>
                  </tr>
                <?php endforeach ?>
              </table>

            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="panel">
            <div class="panel panel-default">
              <div class="panel-heading">&nbsp; Data Karyawan
                <div class="label label-success  pull-right"><a style="color: #fff;" href="<?php echo base_url('mastercms/karyawan/add'); ?>" title="Add Karyawan"><i class="fa fa-plus"></i> Add Karyawan</a></div>
              </div>
              <br/>
              <?php if (!empty($karyawan_id)): ?>
                <div class="row-fluid" style="padding-left: 8px;">
                  <div class="span12">
                    <form name="filterFrm" method="post">
                      <div class="span2">
                        <div class="controls">
                          <input type="hidden" id="lokasi_id" name="lokasi_id" value="<?php echo $lokasi_id; ?>">
                          <input type="text" name="cari" class="span12" placeholder="Cari Karyawan" />
                        </div>  
                      </div>
                      <div class="span4" style="margin-left: 5px">
                        <div class="controls">
                          <p>
                            <button type="submit" class="btn btn-primary" name="filter" value="1"><i class="fa fa-search"></i>Cari Karyawan</button>
                            <span><button type="submit" onclick="window.location=<?php echo base_url('mastercms/karyawan/');?>" class="btn btn-warning" name="reset" value="1"><i class="fa fa-rotate-left"></i> Reset</button> </span>
                          </p>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              <?php endif ?>
              <div class="panel-body" style="padding-left: 8px; padding-right: 8px">
                <div id="load_data">
                  


                </div>
              
                </div>

                <div class="center" style="text-align: center">
                  <div class="pagination alternate" style="text-align: center;">
                    <ul>
                      <!-- <?php echo $mpaging ?> -->
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Body wrapper End -->

</div> <!-- penutup id="content" -->


<script type="text/javascript">
  
  // ini paging punya
  $(document).ready(function(){
    load_data();
    function load_data(page){
      var lokasi_id = $('#lokasi_id').val();
      $.ajax({
        url: '<?php echo base_url('mastercms/karyawan/pagination') ?>',
        method: 'GET',
        data: 'page='+page+'&lokasi_id='+lokasi_id,
        success: function(res){
          $('#load_data').html(res);
        }
      });
    }

    $(document).on('click', '.pagination', function(){
      $page = $(this).attr('id');
      load_data($page);   
    });
  });

// ini hapus punya
  function hapus_karyawan(id){

           if(confirm('Anda yakin akan menghapus data ini ?')){

            // alert(id);
                        $.ajax({
                            url:"<?php echo base_url('mastercms/karyawan/hapus_karyawan') ?>",
                            data:"id="+id,
                            success:function() {

                             window.location.reload();   
                         }
                     });

                    }
   
  }



</script>

