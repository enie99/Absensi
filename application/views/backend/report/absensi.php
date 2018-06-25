
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
                        <form name="filterFrm" class="form" method="get" action="<?php echo base_url("absensi/pencarian/")?>">
                         <div class="span3">
                            <div class="controls">
                               <select name="cabang" id="cabang" class="form-control" required="">
                                    <option value="0">-Pilih perusahaan / cabang-</option>
                                    <?php foreach($data->result() as $row):?>
                                        <option value="<?php echo $row->lokasi_id;?>"><?php echo $row->lokasi_nama;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="span2">
                            <div class="controls">
                                <select name="filterbulan" class="form-control" required="">
                                    <option value="">- Pilih bulan -</option>
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
                                    <option value="11r">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="span2">
                            <div class="controls">
                                <select name="tahun" class="form-control" required="">
                                    <?php
                                    $mulai= date('Y') - 50;
                                    for($i = $mulai;$i<$mulai + 100;$i++){
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="span2">
                            <div class="controls">
                                <select name="karyawan" class="karyawan form-control">
                                    <option value="0">-Pilih karyawan-</option>
                                </select>
                            </div>

                        </div>
                        <div class="span3 text-right">
                            <div class="controls">
                                <p>
                                   <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>

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

    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#cabang').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>mastercms/absensi/get_karyawan",
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option>'+data[i].karyawan_nama+'</option>';
                        }
                        $('.karyawan').html(html);
                    }
                });
            });
        });
    </script>