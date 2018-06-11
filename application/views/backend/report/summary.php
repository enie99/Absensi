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
                          <form class="form-horizontal " role="form" action="<?php echo base_url('mastercms/absensi/summary') ?>" method="post" enctype="multipart/form-data">
                          <td width="10%"><?php echo $key+1; ?></td>
                          <td>
                            <input type="hidden" name="lokasi_id" value="<?php echo $value['lokasi_id']; ?>">
                            <!-- <a href="<?php echo base_url('mastercms/absensi/summary') ?>" type="submit" ><?php echo $value['lokasi_nama']; ?></a> -->
                            <!-- <button type="submit"></button> -->

                            
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
              <div class="panel" style="min-height: 500px;">
                <div class="panel panel-default">
                  <div class="panel-heading">&nbsp; Summary</div>
                  <br>
                  <form name="filterFrm" action="<?php echo base_url('mastercms/absensi/cari/'); ?>" method="post">
                    <div class="span3" style="margin-right: 6px; margin-left: 6px;">
                      <div class="controls">
                        <input type="hidden" name="lokasi_id" value="<?php echo $lokasi; ?>">
                        <select name="bulan">
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="span4" style="margin-left: 5px">
                      <div class="controls">
                        <p>
                          <a href=""><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari Data</button></a>
                          <!-- <a href="<?php echo base_url('mastercms/Absensi/summary'); ?>"><button name="resetFilterCustomer" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button></a> -->
                           <a href="<?php echo base_url('mastercms/karyawan'); ?>"><button name="resetFilterCustomer" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button></a>
                        </p>
                      </div>
                    </div>
                  </form>

                  <div class="panel-body" style="padding-left: 8px; padding-right: 8px">
                    <br>
                    <table class="table table-bordered">
                      <tr>
                        <th><font size="2px">No</font></th>
                        <th><font size="2px">Nama</font></th>
                        <th><font size="2px">Jml Hari Kerja</font></th>
                        <th><font size="2px">Masuk</font></th>
                        <th><font size="2px">Terlambat</font></th>
                        <th><font size="2px">Absen</font></th>
                        <th><font size="2px">Sakit</font></th>
                        <th><font size="2px">Ijin</font></th>
                        <th><font size="2px">Cuti</font></th>
                      </tr>
                      <?php foreach ($karyawan as $key => $kary) : ?>
                      <tr>
                        
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $kary['karyawan_nama']; ?></td>
                        <td>Belum</td>
                        
                        <td>
                          <?php
                          foreach ($kehadiran as $key => $kehad) :
                          if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="masuk kerja"){
                            echo $kehad['jumlah'];
                          }
                          endforeach;
                          ?>
                        </td>
                        <td>
                          <?php
                          foreach ($kehadiran as $key => $kehad) :
                          if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="terlambat"){
                            echo $kehad['jumlah'];
                          }
                          endforeach;
                          ?>
                        </td>
                        <td>Belum</td>
                        <td>
                          <?php
                          foreach ($kehadiran as $key => $kehad) :
                          if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="sakit"){
                            echo $kehad['jumlah'];
                          }
                          endforeach;
                          ?>
                        </td>
                        <td>
                          <?php
                          foreach ($kehadiran as $key => $kehad) :
                          if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="ijin"){
                            echo $kehad['jumlah'];
                          }
                          endforeach;
                          ?>
                        </td>
                        <td>
                          <?php
                          foreach ($kehadiran as $key => $kehad) :
                          if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="cuti"){
                            echo $kehad['jumlah'];
                          }
                          endforeach;
                          ?>
                        </td>

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

