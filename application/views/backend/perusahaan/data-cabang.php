        <!-- page heading start-->
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">
                    <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
                        <i class="icon-home"></i> Home
                    </a>
                    <a href="#" class="current"></i></i>Data Perusahaan
                    </a>
                </div>
            </div>
            <!-- page heading end-->
            <!-- body wrapper start -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <form name="filterFrm" method="post">
                            <div class="span2">
                                <div class="controls">
                                    <input type="text" name="cari" class="span12" placeholder="Cari Data Perusahaan" value="" />
                                </div>
                            </div>
                            <div class="span4" style="margin-left: 5px">
                                <div class="controls">
                                    <p>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari Data</button>
                                        <a href="<?php echo base_url('mastercms/perusahaan'); ?>"><button name="resetFilterCustomer" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button></a>
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
                                    List Data Perusahaan
                                </h5>
                                <span class="label label-success"><a style="color: #fff" href="<?php echo base_url('mastercms/perusahaan/add'); ?>"><i class="fa fa-plus"></i> Add Perusahaan</a></span>

                            </div>
                            <div class="widget-content nopadding">
                                <section id="no-more-tables">
                                    <?php if (!empty($perusahaan)): ?>
                                        <table class="table table-data table-bordered table-hover table-condensed cf">
                                            <thead class="DataTables_sort_wrapper" >
                                                <tr>
                                                    <th style="background: #dedeec; font-size: 12px" width="2%">No</th>
                                                    <th style="background: #dedeec; font-size: 12px" width="15%">Perusahaan / Cabang</th>
                                                    <!--<th style="background: #dedeec; font-size: 12px" width="85">Foto</th>-->
                                                    <th style="background: #dedeec; font-size: 12px" width="5%">Title</th>
                                                    <th style="background: #dedeec; font-size: 12px" width="7%">Jml Karyawan</th>
                                                    <th style="background: #dedeec; font-size: 12px" width="20%">Alamat Perusahaan</th>

                                                    <th style="background: #dedeec; font-size: 12px" width="13%">Hari & Jam Kerja</th>
                                                    <th style="background: #dedeec; font-size: 12px" width="10%">QR Code</th>
                                                    <th style="background: #dedeec; font-size: 12px" width="7%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php endif ?>
                                            <?php if (!empty($perusahaan)): ?>
                                                <tr>
                                                    <?php foreach ($perusahaan as $key =>$p): ?>
                                                        <td data-title="No"><?php echo $key+1 ; ?></td>
                                                        <td data-title="nama perusahaan"><strong><?php echo $p['lokasi_nama']; ?></strong></td>
                                                        <td data-title="No. HP"><?php echo $p['perusahaan_title']; ?></td>
                                                        <td data-title="Jml Karyawan" style="text-align: center;"><?php echo $p['jml_karyawan']; ?></td>
                                                        <td data-title="Alamat"><?php echo $p['perusahaan_alamat'] ?></td>
                                                        <td>
                                                            <div align="center">
                                                                <span class="btn btn-info"><a href="<?php echo base_url('mastercms/perusahaan/add_jam_kerja/'.$p['lokasi_id']); ?>" title="Detail" style="color: white">Add / Edit</a></span>

                                                                <span><a href="#view-<?= $p['lokasi_id']; ?>" class="btn btn-info">View</a></span>   
                                                            </div>

                                                            <!--  Modal Jam Kerja -->
                                                            <div class="light-modal" id="view-<?= $p['lokasi_id']; ?>" role="dialog" aria-labelledby="light-modal-label" aria-hidden="false">
                                                                <div class="light-modal-content  animated zoomInUp">
                                                                    <!-- light modal header -->
                                                                    <div class="light-modal-header">
                                                                        <h3 class="light-modal-heading">Jam Kerja</h3>
                                                                        <a href="#" class="light-modal-close-icon" aria-label="close">&times;</a>
                                                                    </div>
                                                                    <!-- light modal body -->
                                                                    <div class="light-modal-body">
                                                                        <table class="table" align="center">

                                                                            <?php foreach ($jam_kerja as $key => $j) : ?>
                                                                                <?php if ($p['lokasi_id'] == $j['lokasi_id']): ?>
                                                                                    <tr>

                                                                                        <td><?php echo $j['kerja_hari']; ?></td>
                                                                                        <td title="Jam Masuk"><?php echo $j['jam_masuk']; ?></td>
                                                                                        <td>-</td>
                                                                                        <td title="Jam Selesai"><?php echo $j['jam_keluar']; ?></td>

                                                                                    </tr>

                                                                                <?php endif ?>
                                                                            <?php endforeach ?>

                                                                        </table>
                                                                    </div>
                                                                    <div class="light-modal-footer">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- / Modal Jam Kerja -->

                                                        </td>
                                                        <td><img style="width: 150px;" src="<?php echo base_url('assets/images/qrcode/').$p['qr_code'];?>"></td>
                                                        <td data-title="Aksi" align="center">
                                                            <a href="<?php echo base_url('mastercms/perusahaan/detail/'.$p['lokasi_id']); ?>" title="Detail"><i class="fa fa-eye"></i></a> &nbsp;
                                                            <a href="<?php echo base_url('mastercms/perusahaan/edit/'.$p['lokasi_id']); ?>" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;

                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                                <?php else: ?>
                                                    <div class="alert alert-danger" role="alert" style="margin: 20px;">
                                                        <!-- Kata kunci untuk <strong><?= $keyword; ?></strong> tidak ditemukan ! -->
                                                        Data Perusahaan masih kosong.
                                                    </div>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                        <div class="center" style="text-align: center">
                                            paging
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
