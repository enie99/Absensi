<!-- page heading start-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
        <i class="icon-home"></i> Home
      </a>
      <a href="<?php echo base_url('mastercms/absensi'); ?>">Absensi - Summary</i>
      </a>
    </div>
  </div>
  <!-- page heading end-->

  <!-- body wrapper start -->
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="container-fluid">
          <div class="row-fluid">

            <div class="col-md-3">
              <div class="panel">
                <div class="panel-body">
                  <h5 align="center">Daftar Perusahaan</h5>
                  
                    <table class="table">
                      <?php foreach ($cabang as $key => $value) : ?>
                        <tr>
                          <form class="form-horizontal " role="form" action="" method="post" enctype="multipart/form-data">
                          <td width="10%"><?php echo $key+1; ?></td>
                          <td>
                            <input type="hidden" name="lokasi_id" value="<?php echo $value['lokasi_id']; ?>">
                            <!-- <a href="<?php echo base_url('mastercms/absensi/summary') ?>" type="submit" ><?php echo $value['lokasi_nama']; ?></a> -->
                            <!-- <button type="submit"></button> -->

                            
                              <div class="btn-group">
                                <button type="submit" class="btn btn-primary" ><?php echo $value['lokasi_nama']; ?></button>
                                
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
                  <div class="panel-heading">&nbsp; Summary</div>
                  <div class="panel-body">
                    <br>
                    <table class="table table-bordered">
                      <tr>
                        <th><font size="2px">No</font></th>
                        <th><font size="2px">Nama</font></th>
                        <th><font size="2px">Jml Hari Kerja</font></th>
                        <th><font size="2px">Jml Masuk</font></th>
                        <th><font size="2px">Jml Absen</font></th>
                        <th><font size="2px">Jml Ijin</font></th>
                      </tr>
                      <tr>
                        <?php foreach ($karyawan as $key => $kary) : ?>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $kary['karyawan_nama']; ?></td>
                        <td>No</td>
                        
                        <td>
                          <?php
                          foreach ($kehadiran as $key => $kehad) :
                          if ($kehad['karyawan_id'] = $kary['karyawan_id']){
                            echo $kehad['jumlah'];
                          }
                          endforeach;
                          ?>
                        </td>
                        <td>No</td>
                        <td>No</td>
                        
                        
                        
                        <?php endforeach; ?>
                      </tr>
                    </table>
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