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
                        <form name="filterFrm" class="form" method="post">
                            <div class="span4">
                                <div class="controls">
                                    <select name="cabang" class="form-control" id="cabang">
                                        <option value="">- Pilih perusahaan / cabang -</option>
                                        <?php foreach ($perusahaan as $key => $value) :?>
                                            <option value="<?php echo $value['lokasi_id'] ?>"><?php echo $value['lokasi_nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="span2">
                                <div class="controls">
                                    <select name="filterbulan" class="form-control">
                                        <option value="">- Pilih bulan -</option>
                                        <option value="januari">Januari</option>
                                        <option value="februari">Februari</option>
                                        <option value="maret">Maret</option>
                                        <option value="april">April</option>
                                        <option value="mei">Mei</option>
                                        <option value="juni">Juni</option>
                                        <option value="juli">Juli</option>
                                        <option value="agustus">Agustus</option>
                                        <option value="september">September</option>
                                        <option value="oktober">Oktober</option>
                                        <option value="november">November</option>
                                        <option value="desember">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="controls">
                                    <select name="karyawan" class='form-control' id='karyawan'>
                                        <option value='0'>--pilih--</option>

                                         <?php foreach ($karyawan as $key => $value) :?>
                                            <option value="<?php echo $value['karyawan_id'] ?>"><?php echo $value['karyawan_nama']; ?></option>
                                        <?php endforeach ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="span3 text-right">
                                <div class="controls">
                                    <p>
                                        <a href="<?php echo base_url('mastercms/absensi/cari'); ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button></a>
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
                                            <th style="background: #dedeec; font-size: 12px" width="2%">No</th>
                                            <th style="background: #dedeec; font-size: 12px" width="15%">Hari</th>
                                            <th style="background: #dedeec; font-size: 12px" width="15%">Tanggal</th>
                                            <th style="background: #dedeec; font-size: 12px" width="25%">Nama Karyawan</th>
                                            <th style="background: #dedeec; font-size: 12px" width="15%">Jam Masuk Absen</th>
                                            <th style="background: #dedeec; font-size: 12px" width="15%">Jam Keluar Absen</th>
                                            <th style="background: #dedeec; font-size: 12px" width="15">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($absensi as $key =>$value): ?>
                                                <td data-title="No"><?php echo $key+1 ; ?></td>
                                                <td data-title="hari"><?php echo $value['absen_hari']; ?></td>
                                                <td data-title="tanggal"><?php echo date('d M Y', strtotime($value['tanggal'])); ?></td>
                                                <td data-title="karyawan_nama"><strong><?php echo $value['karyawan_nama']; ?></strong></td>
                                                <td data-title="jam masuk"><?php echo $value['jam_masuk_absen']; ?></td>
                                                <td data-title="jam kelauar"><?php echo $value['jam_keluar_absen']; ?></td>
                                                <td data-title="Aksi" align="center"><?php echo $value['status']; ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <div class="center" style="text-align: center">
                                    <?php if (isset($links)) { ?>
                                        <?php echo $links ?>
                                        <?php } ?>
                                        <?php echo $this->pagination->create_links(); ?>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript">

            $(function(){

                $.ajaxSetup({
                    type:"POST",
                    url: "<?php echo base_url('index.php/absensi/ambil_data') ?>",
                    cache: false,
                });

                $("#cabang").change(function(){

                    var value=$(this).val();
                    if(value>0){
                        $.ajax({
                            data:{modul:'karyawan',id:value},
                            success: function(respond){
                                $("#karyawan").html(respond);
                            }
                        })
                    }

                });

            })

        </script>