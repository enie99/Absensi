<!-- page Content Start-->
<div id="content">
    <!--Breadcrumb Start-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="" class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home
            </a>
            <a href="<?php echo base_url('mastercms/karyawan'); ?>">Profil Perusahaan
            </a>
            <a href="#" class="current"></i><?= $title ?>
        </a>
    </div>
</div>
<!--Breadcrumb End-->

<!--Container Fluid start-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <!--page header start-->
                <div class="widget-title" style="margin-bottom: 15px">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <h5>Edit Profil Perusahaan</h5>
                </div>
                <!--page header end-->

                <!--Add content start-->
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-content">
                                    <div class="control-group">
                                        <label class="control-label"><span class="asterik">*</span> Nama Perusahaan</label>
                                        <div class="controls">
                                            <input type="text" name="perusahaan_nama" class="span11" value="<?= $profil['perusahaan_nama']; ?>">
                                        </div>
                                    </div>
                                  <!--   <div class="control-group">
                                        <label class="control-label"><span class="asterik"></span> Logo Perusahaan</label>
                                        <div class="controls">
                                            <img src="<?= base_url("assets/backend/images/perusahaan/").'$profil[perusahaan_logo]' ?>"><br/>
                                            <input type="file" name="perusahaan_logo" class="span11" />
                                        </div>
                                    </div> -->
                                    <!-- <div class="control-group">
                                        <label class="control-label"><span class="asterik"></span> Logo Perusahaan</label>
                                        <div class="controls">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 16px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Ganti</span>
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="control-group">
                                        <label class="control-label"><span class="asterik">*</span> Email</label>
                                        <div class="controls">
                                            <input type="text" name="perusahaan_email" class="span11" value="<?= $profil['perusahaan_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><span class="asterik">*</span> Password</label>
                                        <div class="controls">
                                            <input type="password" name="perusahaan_password" class="span11" value="<?= $profil['perusahaan_password']; ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><span class="asterik">*</span> No. Telepon</label>
                                        <div class="controls">
                                            <input type="number" min="0" minlength="9" maxlength="12" name="perusahaan_telp" class="span11" value="<?= $profil['perusahaan_telp']; ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><span class="asterik">*</span> Bidang Perusahaan</label>
                                        <div class="controls">
                                            <input type="text" name="perusahaan_bidang" class="span11" value="<?= $profil['perusahaan_bidang']; ?>">
                                        </div>
                                    </div>
                                    <div class="control-group form-action">
                                        <label class="span2 span2" ><code>(*) wajib diisi.</code></label>
                                        <div class="span8">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button> &nbsp;
                                            <a href="#" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
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
