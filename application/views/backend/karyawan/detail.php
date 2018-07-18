<!-- page heading start-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="" class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home
            </a>
            <a href="<?php echo base_url('mastercms/karyawan'); ?>">
                Karyawan 
            </a>
            <a href="#" class="current">Detail Karyawan
            </a>
        </div>
    </div>
    <!-- page heading end -->

    <div class="container-fluid" style="min-height: 480px;">
        <div class="row-fluid">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            &nbsp; Detail Karyawan
                            <span class="pull-right" style="font-size: 12px;">
                                <a href="<?php echo base_url('mastercms/karyawan/edit/').$detail_data['karyawan_id']; ?>" title="Edit"><i class="fa fa-pencil"></i>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?= base_url('mastercms/karyawan'); ?>" title="Kembali"><i class="fa fa-undo"></i>Kembali</a>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="profile-desk">
                                <div class="col-md-12" style="padding-top:10px;">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%">Nama Karyawan </td>
                                                <td style="width: 5%">:</td>
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
                                                <td><?php echo date("d-F-Y", strtotime($detail_data['karyawan_ttl']));  ?></td>
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
        </div>
    </div>
</div>
