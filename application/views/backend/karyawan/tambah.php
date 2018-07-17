<!-- page Content Start-->
<div id="content">
    <!--Breadcrumb Start-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="" class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home
            </a>
            <a href="<?php echo base_url('mastercms/karyawan'); ?>">Karyawan
            </a>
            <a href="#" class="current"></i>Tambah
            </a>
        </div>
    </div>
    <!--Breadcrumb End-->


    <!--Container Fluid start-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
    <?php echo $this->session->userdata('msg');  ?>
                <div class="widget-box">
                    <!--page header start-->
                    <div class="widget-title" style="margin-bottom: 15px">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <h5>
                            Tambah Karyawan
                        </h5>
                    </div>
                    <!--page header end-->

                    <!--Add content start-->
                    <div class="widget-content nopadding">
                        <form class="form-horizontal " role="form" action="<?php echo base_url('mastercms/karyawan/add'); ?>" method="post" enctype="multipart/form-data" name="tambah_karyawan">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="widget-content">
                                        <?php if (validation_errors()): ?>

                                        <?php endif ?>

                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> Nama Karyawan </label>
                                            <div class="controls">
                                                <input type="text" name="karyawan_nama" class="span11" value="" required="required">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> Perusahaan </label>
                                            <div class="controls">
                                                <select name="lokasi_id" class="span11">
                                                    <?php if (empty($karyawan)): ?>
                                                        <option value=""><?php echo "Tidak ada perusahaan yang dimasukkan"; ?></option>
                                                    <?php else: ?>
                                                            <?php foreach ($karyawan as $key => $value) :?>
                                                                <option value="<?php echo $value['lokasi_id'] ?>"><?php echo $value['lokasi_nama']; ?></option>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"><span class="asterik">*</span> Jabatan </label>
                                                <div class="controls">
                                                    <input type="text" name="karyawan_jabatan" class="span3" value="" required="required" >
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"> Tanggal Lahir </label>
                                                <div class="controls">
                                                    <!-- <div class="input-group date" id="tgl" style="margin-top:-5px;"> -->
                                                        <input type="date" name="karyawan_ttl" class="span3" size="16">
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"><span class="asterik">*</span> Email </label>
                                                <div class="controls">
                                                    <input type="email" name="karyawan_email" class="span3" value=""  required="required">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"> No HP </label>
                                                <div class="controls">
                                                    <input type="text" name="no_hp" class="span3" value="">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"><span class="asterik">*</span> Alamat </label>
                                                <div class="controls">
                                                    <textarea class="span11" name="karyawan_alamat" rows="5"  required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"> Sallary Karyawan </label>
                                                <div class="controls">
                                                    <input type="text" name="karyawan_salary" class="span11" value="" >
                                                </div>
                                            </div>
                                            <div class="control-group form-action">
                                                <label class="span2 span2" ><code>(*) wajib diisi.</code></label>
                                                <div class="span8">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button> &nbsp;
                                                    <a href="<?php echo base_url('mastercms/karyawan'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- page end-->
                            </form>
                        </div>
                        <!--Add contetn End-->
                    </div>
                </div>
            </div>
            <!--Span12 End-->
        </div>
        <!-- Container fluid END-->

    </div>

    <!-- page Content End-->


    <script>
        $(function(){
            $('#tgl').datetimepicker({format : "DD/MMM/YYYY"});
        });
    </script>
