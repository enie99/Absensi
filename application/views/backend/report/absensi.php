
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
                        <form name="filterFrm" class="form" method="get" action="<?php echo base_url("mastercms/absensi/pencarian")?>">
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
                                   <a href="<?php echo base_url('mastercms/absensi'); ?>">
                                    <button type="Reset" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button></a>
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
                        </div>
                        <div class="widget-content nopadding">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#cabang').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>mastercms/absensi/get_karyawan",
                    type : "POST",
                    data : {id: id},
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