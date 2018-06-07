        <!-- page heading start-->
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">
                    <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
                        <i class="icon-home"></i> Home
                    </a>
                    <a href="<?php echo base_url('mastercms/karyawan'); ?>">Karyawan</i>
                    </a>
                </div>
            </div>
            <!-- page heading end-->

            <!-- body wrapper start -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <form name="filterFrm" action="<?php echo base_url('mastercms/karyawan/cari');?>" method="get">
                            <div class="span2">
                                <div class="controls">
                                    <input type="text" name="cari" class="span12" placeholder="Cari Data Karyawan" value="" />
                                </div>
                            </div>
                            <div class="span4" style="margin-left: 5px">
                                <div class="controls">
                                    <p>
                                        <button type="submit" class="btn btn-primary"><a href="<?php echo base_url('mastercms/karyawan/cari'); ?>"><i class="fa fa-search"></i></a> Cari Data</button>
                                        <a href="<?php echo base_url('mastercms/karyawan'); ?>"><button name="resetFilterCustomer" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button></a>
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
                                    List Data Content
                                </h5>
                                <span class="label label-success"><a style="color: #fff" href="<?php echo base_url('mastercms/karyawan/add'); ?>"><i class="fa fa-plus"></i> Tambah Karyawan</a></span>

                            </div>
                            <div class="widget-content nopadding">
                                <section id="no-more-tables">
                                    <table class="table table-data table-bordered table-hover table-condensed cf">
                                        <thead class="DataTables_sort_wrapper" >
                                            <tr>
                                                <th style="background: #dedeec; font-size: 12px" width="30">No</th>
                                                <th style="background: #dedeec; font-size: 12px" width="160">Nama Karyawan</th>
                                                <th style="background: #dedeec; font-size: 12px">Jabatan</th>
                                                <th style="background: #dedeec; font-size: 12px">Tgl Lahir</th>
                                                <th style="background: #dedeec; font-size: 12px">Email</th>
                                                <th style="background: #dedeec; font-size: 12px">No. HP</th>
                                                <th style="background: #dedeec; font-size: 12px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($karyawan as $key => $value) {?>
                                                <tr>
                                                    <td data-title="No"><?php echo $key+1; ?></td>
                                                    <td data-title="No"><?php echo $value['karyawan_nama']; ?></td>
                                                    <td data-title="No"><?php echo $value['karyawan_jabatan']; ?></td>
                                                    <td data-title="No"><?php echo date('d M Y', strtotime($value['karyawan_ttl'])); ?></td>
                                                    <td data-title="No"><?php echo $value['karyawan_email']; ?></td>
                                                    <td data-title="No"><?php 
                                                    if (empty($value['no_hp'])) {
                                                        echo "-";
                                                    } else{
                                                        echo $value['no_hp'];
                                                    }
                                                    ?></td>
                                                    <td data-title="Aksi" align="center">
                                                        <span><a href="<?php echo base_url("mastercms/karyawan/detail/$value[karyawan_id]"); ?>" title="Detail"><i class="fa fa-eye"></i></a> &nbsp;</span>
                                                        <span><a href="<?php echo base_url("mastercms/karyawan/edit/$value[karyawan_id]"); ?>" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;</span>
                                                        <span><a href="<?php echo base_url("mastercms/karyawan/hapus/$value[karyawan_id]"); ?>" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-times"></i></a> &nbsp;</span>
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
