        <!-- page heading start-->
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">
                    <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
                        <i class="icon-home"></i> Home
                    </a>
                    <a href="<?php echo base_url('mastercms/absensi'); ?>">Absensi</i>
                    </a>
                </div>
            </div>
            <!-- page heading end-->

            <!-- body wrapper start -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <form name="filterFrm" action="<?php echo base_url('mastercms/absensi/cari');?>" method="get">
                            <div class="span2">
                                <div class="controls">
                                    <input type="text" name="cari" class="span12" placeholder="Cari Data" value="" />
                                </div>
                            </div>
                            <div class="span4" style="margin-left: 5px">
                                <div class="controls">
                                    <p>
                                        <button type="submit" class="btn btn-primary"><a href="<?php echo base_url('mastercms/absensi/cari'); ?>"><i class="fa fa-search"></i></a> Cari Data</button>
                                        <a href="<?php echo base_url('mastercms/absensi'); ?>"><button name="resetFilterCustomer" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button></a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title" style="margin-bottom: 15px">
                                <span class="icon">
                                    <i class="icon-th-list"></i>
                                </span>
                                <h5>
                                    List Data Absensi
                                </h5>
                                <span class="label label-success"><a style="color: #fff" href="<?php echo base_url('mastercms/absensi/export_excel') ?>"><i class="fa fa-"></i> Export to Excel</a></span>
                            </div>
                            <div class="widget-content nopadding">
                                <section id="no-more-tables">
                                    <table class="table table-data table-bordered table-hover table-condensed cf">
                                        <thead class="DataTables_sort_wrapper" >
                                            <tr>
                                                <th style="background: #dedeec; font-size: 12px" width="30">No</th>
                                                <th style="background: #dedeec; font-size: 12px" width="100">Tanggal</th>
                                                <th style="background: #dedeec; font-size: 12px" width="200">Nama Karyawan</th>
                                                <th style="background: #dedeec; font-size: 12px" width="130">Hari</th>
                                                <th style="background: #dedeec; font-size: 12px" width="130">Jam Absen</th>
                                                <th style="background: #dedeec; font-size: 12px" width="130">Jam Keluar</th>
                                                <th style="background: #dedeec; font-size: 12px" width="130">Status</th>
                                                <th style="background: #dedeec; font-size: 12px" width="150">Keterangan</th>
                                                <th style="background: #dedeec; font-size: 12px" width="60">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($absensi as $key => $value) {?>
                                                <tr>
                                                    <td data-title="No"><?php echo $key+1; ?></td>
                                                    <td data-title="tanggal"><?php echo date('d M Y', strtotime($value['tanggal'])); ?></td>
                                                    <td data-title="karyawan_nama"><strong><a href="<?php echo base_url("mastercms/absensi/detail/$value[karyawan_id]"); ?>"><?php echo $value['karyawan_nama']; ?></a></strong></td>
                                                    <td data-title="absen_hari"><?php echo $value['absen_hari']; ?></td>
                                                    <td data-title="jam_masuk_absen"><?php echo $value['jam_masuk_absen']; ?></td>
                                                    <td data-title="jam_keluar_absen"><?php echo $value['jam_keluar_absen']; ?></td>
                                                    <td data-title="status"><?php echo $value['status']; ?></td>
                                                    <td data-title="keterangan"><?php echo $value['keterangan']; ?></td>
                                                    <td data-title="Aksi" align="center">
                                                        <a href="<?php echo base_url("mastercms/absensi/detail/$value[karyawan_id]"); ?>" title="Detail"><i class="fa fa-eye"></i></a> &nbsp;
                                                        <a href="<?php echo base_url("mastercms/absensi/hapus/$value[karyawan_id]"); ?>" title="Hapus"><i class="fa fa-trash-o"></i></a> &nbsp;
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                            

                                        </tbody>
                                    </table>
                                    <div class="center" style="text-align: center">
                                        <!-- <?php if (isset($links)) { ?>
                                        <?php echo $links ?>
                                        <?php } ?> -->
                                        <?php echo $this->pagination->create_links(); ?>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
