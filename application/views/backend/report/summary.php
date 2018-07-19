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
                  <?php if (!empty($karyawan)): ?>
                  <br>
                    <div class="panel-body" style="padding-left: 8px; padding-right: 8px">
                      <form name="filterFrm" action="" method="get">
                        <div class="span5">
                          <?php foreach ($lokasi as $key => $value) : ?>
                            <h5 style="margin-top: -6px">Perusahaan : <?php echo $value['lokasi_nama']; ?></h5>
                          <?php endforeach; ?>
                            <?php switch ($bulan)
                            {
                              case '01':
                                $nama_bulan="Januari"; break;
                              case '02':
                                $nama_bulan="Februari"; break;
                              case '03':
                                $nama_bulan="Maret"; break;
                              case '04':
                                $nama_bulan="April"; break;
                              case '05':
                                $nama_bulan="Mei"; break;
                              case '06':
                                $nama_bulan="Juni"; break;
                              case '07':
                                $nama_bulan="Juli"; break;
                              case '08':
                                $nama_bulan="Agustus"; break;
                              case '09':
                                $nama_bulan="September"; break;
                              case '10':
                                $nama_bulan="Oktober"; break;
                              case '11':
                                $nama_bulan="November"; break;
                              case '12':
                                $nama_bulan="Desember"; break;

                              default:
                                $nama_bulan="Bulan"; break;
                            } ?>
                            <h5>Laporan Bulan : <?php echo $nama_bulan." ".$tahun; ?></h5>
                        </div>
                        <div class="span7" align="right">
                          <div class="form-inline">
                            <p>
                              <input type="hidden" name="lokasi_id" value="<?php echo $lokasi_id; ?>">
                              <select  name="bulan">
                                <option value="01" <?php if($bulan == '01'){ echo "selected=selected"; } ?>>Januari</option>
                                <option value="02" <?php if($bulan == '02'){ echo "selected=selected"; } ?>>Februari</option>
                                <option value="03" <?php if($bulan == '03'){ echo "selected=selected"; } ?>>Maret</option>
                                <option value="04" <?php if($bulan == '04'){ echo "selected=selected"; } ?>>April</option>
                                <option value="05" <?php if($bulan == '05'){ echo "selected=selected"; } ?>>Mei</option>
                                <option value="06" <?php if($bulan == '06'){ echo "selected=selected"; } ?>>Juni</option>
                                <option value="07" <?php if($bulan == '07'){ echo "selected=selected"; } ?>>Juli</option>
                                <option value="08" <?php if($bulan == '08'){ echo "selected=selected"; } ?>>Agustus</option>
                                <option value="09" <?php if($bulan == '09'){ echo "selected=selected"; } ?>>September</option>
                                <option value="10" <?php if($bulan == '10'){ echo "selected=selected"; } ?>>Oktober</option>
                                <option value="11" <?php if($bulan == '11'){ echo "selected=selected"; } ?>>November</option>
                                <option value="12" <?php if($bulan == '12'){ echo "selected=selected"; } ?>>Desember</option>
                              </select>
                              <select name="tahun">
                                <?php
                                $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 2010; $x--) {
                                  ?>
                                  <option value="<?php echo $x ?>" <?php if ($tahun == $x){ echo "selected=selected"; } ?>>
                                    <?php echo $x ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>

                              <button type="submit" class="btn btn-primary" name="cari" value="1"><i class="fa fa-search"></i> Cari Data</button>
                              <a href="<?php echo base_url('mastercms/absensi/summary/'); ?>">
                                <button name="reset" type="submit" class="btn btn-warning" value="1"><i class="fa fa-rotate-left"></i> Reset Filter</button>
                              </a>
                            </p>
                          </div>
                          <span class="label label-success" style="margin-bottom: 8px;"><a style="color: #fff;" href="<?php echo base_url('mastercms/absensi/export_excel/'.$lokasi_id.'/'.$bulan.'/'.$tahun); ?>"><i class="fa fa-print"></i>  Export to Excel</a></span>
                        </div>
                      </form>

                      <br>
                      <!-- Tabel Data Presensi -->
                        <table class="table table-bordered table-responsive">
                          <tr>
                            <th><font size="2px">No</font></th>
                            <th><font size="2px">Nama</font></th>
                            <th><font size="2px">Jml Hari Kerja</font></th>
                            <th><font size="2px">Masuk</font></th>
                            <th><font size="2px">Terlambat</font></th>
                            <th><font size="2px">Sakit</font></th>
                            <th><font size="2px">Ijin</font></th>
                            <th><font size="2px">Cuti</font></th>
                            <th style="color:#ff0000;"><font size="2px">Absen</font></th>
                            <th><font size="2px">Aksi</font></th>
                          </tr>
                        <?php endif ?>

                        <?php if (!empty($karyawan)): ?>
                          <?php foreach ($karyawan as $key => $kary) : ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><a href="<?php echo base_url('mastercms/absensi/detail/').$kary['karyawan_id'].'/'.$bulan; ?>"><?php echo $kary['karyawan_nama']; ?></a></td>
                                <td><?php echo $jml_hari_kerja; ?></td>
                                <td>
                                  <?php
                                  foreach ($kehadiran as $key => $kehad) :
                                    if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="masuk kerja")
                                    {
                                      echo $kehad['jumlah'];
                                    }
                                  endforeach;
                                  ?>
                                </td>
                                <td>
                                  <?php
                                  foreach ($kehadiran as $key => $kehad) :
                                    if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="terlambat")
                                    {
                                      echo $kehad['jumlah'];
                                    }
                                  endforeach;
                                  ?>
                                </td>
                                <td>
                                  <?php
                                  foreach ($kehadiran as $key => $kehad) :
                                    if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="sakit")
                                    {
                                  echo $kehad['jumlah'];
                                    }
                                  endforeach;
                                  ?>
                                </td>
                                <td>
                                  <?php
                                  foreach ($kehadiran as $key => $kehad) :
                                    if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="ijin")
                                    {
                                 echo $kehad['jumlah'];
                                    }
                                  endforeach;
                                  ?>
                                </td>
                                <td>
                                  <?php
                                  foreach ($kehadiran as $key => $kehad) :
                                    if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="cuti")
                                    {
                                      echo $kehad['jumlah'];
                                    }
                                  endforeach;
                                  ?>
                                </td>
                                <td style="color:#ff0000;">
                                  <?php
                                    foreach ($presensi as $key => $pres) :
                                      if ($pres['karyawan_id'] == $kary['karyawan_id'])
                                      {
                                        $tot_presensi = $pres['jumlah'];
                                        $absen = $jml_hari_kerja - $tot_presensi;
                                        echo $absen;
                                      }
                                    endforeach;
                                  ?>
                                </td>
                                <td align="center">
                                  <a href="<?php echo base_url('mastercms/absensi/detail/').$kary['karyawan_id'].'/'.$bulan; ?>">
                                    <center><span class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</span></center>
                                  </a>
                                </td>
                              </tr>
                            
                          <?php endforeach; ?>
                        <?php elseif (empty($lokasi_id)): ?> <!-- Jika belum memilih perusahaan -->
                        <div class="alert alert-error alert-block" style="margin-right: 10px;margin-left: 10px;margin-top: 15px">
                          <a class="close" data-dismiss="alert" href="#">×</a>
                          <strong>Silahkan Pilih Perusahaan Anda</strong> Untuk Melihat Laporan Presensi Karyawan
                        </div>

                        <?php else: ?> <!-- Jika perusahaan yang dipilih belum memiliki data karyawan -->
                        <div class="alert alert-error alert-block" style="margin-right: 10px;margin-left: 10px;margin-top: 15px">
                          <a class="close" data-dismiss="alert" href="#">×</a>
                          Perusahaan anda <strong>belum memasukkan data karyawan</strong>, Silahkan masukkan data karyawan Anda
                        </div>
                       <!--  <div class="alert alert-info " style="margin-right: 10px;margin-left: 10px;margin-top: 10px"> <a class="close" data-dismiss="alert" href="#">×</a>
                          Ditemukan <strong>10</strong> data content.
                        </div> -->
                        <?php endif ?>

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

