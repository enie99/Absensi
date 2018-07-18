 <!-- page heading start-->
<div id="content">
    <div id="content-header">
      <div id="breadcrumb">
          <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
            <i class="icon-home"></i> Home
        </a>
        <a href="<?php echo base_url('mastercms/karyawan'); ?>">Data Karyawan</i>
        </a>
      </div>
  </div>
<!-- page heading end-->
<!-- body wrapper start -->
<div class="container-fluid" style="min-height: 450px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="col-md-3">
          <div class="panel">
            <div class="panel-body">
              <h5 align="center">Daftar Perusahaan</h5>

              <table class="table">
                  <?php foreach ($perusahaan as $key => $value) : ?>
                    <tr>
                      <form class="form-horizontal " role="form" method="post" enctype="multipart/form-data">
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
  <div class="panel">
    <div class="panel panel-default">
      <div class="panel-heading">&nbsp; Data Karyawan
        <div class="label label-success  pull-right"><a style="color: #fff;" href="<?php echo base_url('mastercms/karyawan/add'); ?>" title="Add Karyawan"><i class="fa fa-plus"></i> Add Karyawan</a></div>
      </div>
      <br/>
      <?php if (!empty($karyawan_id)): ?>
          <div class="row-fluid" style="padding-left: 8px;">
            <div class="span12">
                <form name="filterFrm" method="post">
                    <div class="span2">
                        <div class="controls">
                            <input type="text" name="cari" class="span12" placeholder="Cari Karyawan" />
                        </div>  
                    </div>
                    <div class="span4" style="margin-left: 5px">
                        <div class="controls">
                            <p>
                                <button type="submit" class="btn btn-primary"><a href="<?php echo base_url('mastercms/karyawan/cari'); ?>"><i class="fa fa-search"></i></a> Cari Karyawan</button>
                                <span><a href="" onclick="window.location=<?php echo base_url('mastercms/karyawan');?>" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset</a> </span>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif ?>
    <div class="panel-body" style="padding-left: 8px; padding-right: 8px">
        <?php if (!empty($karyawan_id)): ?>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><font size="2px">No</font></th>
                    <th><font size="2px">Nama</font></th>
                    <th><font size="2px">Jabatan</font></th>
                    <th><font size="2px">Email</font></th>
                    <th><font size="2px">No.Handphone</font></th>
                    <th><font size="2px">Aksi</font></th>
                </tr>
            </thead>
            <tbody>
        <?php endif ?>
            <?php if (!empty($karyawan_id)): ?>
                <?php foreach ($karyawan_id as $key => $value): ?>
                    <tr>
                        <td><?= $key+1; ?></td>
                        <td><?= $value['karyawan_nama']; ?></td>
                        <td><?= $value['karyawan_jabatan']; ?></td>
                        <td><?= $value['karyawan_email']; ?></td>
                        <td><?php if(!empty($value['no_hp']))echo $value['no_hp']; else echo "-"; ?></td>
                        <td>
                          <span><a href="<?php echo base_url("mastercms/karyawan/detail/$value[karyawan_id]"); ?>" title="Detail"><i class="fa fa-eye"></i></a> &nbsp;</span>
                          <span><a href="<?php echo base_url("mastercms/karyawan/edit/$value[karyawan_id]"); ?>" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;</span>
                          <span><a href="<?php echo base_url("mastercms/karyawan/hapus/$value[karyawan_id]"); ?>" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-times"></i></a> &nbsp;</span>
                      </td>
                  </tr>
              <?php endforeach ?>
              <?php elseif(empty($lokasi_id)): ?>
                <div class="alert alert-danger">
                  Silahkan pilih <strong>Perusahaan Anda </strong>
              </div><br/>
              <?php else: ?>
               <div class="alert alert-danger">
                  Data Karyawan untuk perusahaan ini <strong>Tidak Ada! </strong>
              </div><br/>
            <?php endif ?>
        </tbody>
    </table>
</div>

<div class="center" style="text-align: center">
    <div class="pagination alternate" style="text-align: center;">
        <ul>
            <!-- <?php echo $mpaging; ?> -->
        </ul>
    </div>
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

