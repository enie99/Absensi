<!-- page heading start-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="" class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home
            </a>
            <a href="<?php echo base_url('mastercms/absensi/summary'); ?>">
                Presensi
            </a>
            <a href="#" class="current">Detail Presensi
            </a>
        </div>
    </div>
    <!-- page heading end -->

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-body">
                        <div class="profile-desk">
                            <div class="col-md-12" style="padding-top:10px;">
                                <div class="col-md-6 col-sm-6"><h3>Detail Karyawan</h3></div>
                                <div class="col-md-6 col-sm-6" style="padding-top: 20px;">
                                    <a href="<?php echo base_url('mastercms/absensi/summary'); ?>" class="pull-right" title="Kembali"><button class="btn btn-primary"><i class="fa fa-undo"></i> Kembali</button></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td >Nama Karyawan </td>
                                                <td >:</td>
                                                <td><?php echo $detail_data['karyawan_nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Perusahaan </td>
                                                <td>:</td>
                                                <td><?php echo $detail_data['lokasi_nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td><?php echo $detail_data['perusahaan_title']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td>:</td>
                                                <td><?php echo $detail_data['karyawan_jabatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?php  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td><?php echo $detail_data['karyawan_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td>:</td>
                                                <td><?php echo $detail_data['no_hp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $detail_data['karyawan_alamat']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-md-7">
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
               <h5 align="center">Detail Presensi Bulan <?php echo $nama_bulan; ?></h5> 
             <table class="table table-data table-bordered table-hover table-condensed cf">
                <thead class="DataTables_sort_wrapper" >
                    <tr>
                        <th style="background: #dedeec; font-size: 12px" width="100">Tanggal</th>
                        <th style="background: #dedeec; font-size: 12px" width="130">Hari</th>
                        <th style="background: #dedeec; font-size: 12px" width="130">Jam Absen</th>
                        <th style="background: #dedeec; font-size: 12px" width="130">Jam Keluar</th>
                        <th style="background: #dedeec; font-size: 12px" width="130">Status</th>
                        <th style="background: #dedeec; font-size: 12px" width="150">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($detail_data_absensi as $key => $value) {?>
                        <tr>
                            <td data-title="tanggal"><?php echo date('d M Y', strtotime($value['tanggal'])); ?></td>
                            <td data-title="absen_hari"><?php echo $value['absen_hari']; ?></td>
                            <td data-title="jam_masuk_absen"><?php echo $value['jam_masuk_absen']; ?></td>
                            <td data-title="jam_keluar_absen"><?php echo $value['jam_keluar_absen']; ?></td>
                            <td data-title="status"><?php echo $value['status']; ?></td>
                            <td data-title="keterangan"><?php echo $value['keterangan']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>
</div>
