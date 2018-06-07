<!-- page heading start-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb">
			<a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
				<i class="icon-home"></i> Home
			</a>
			<a href="#" class="current"></i></i>Profil
			</a>
		</div>
	</div>
	<div class="col-md-12" style="margin-top:20px;padding-right: 34px;">
		<div align="right">
			<p>
				<a href="<?php echo base_url('mastercms/perusahaan/edit/').$id; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
				<a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
			</p>
		</div>
	</div>
	<div class="span12" >
		
	</div>
	<!-- page heading end-->
	<!-- body start -->
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-body">
						<div class="profile-desk">
							<div class="text-center" style="width:100%;">
								<img style="width: 100%; height: auto; padding: 10px; " name="Logo Perusahaan" src="
									<?php echo base_url("assets/images/qrcode/".$detail['qr_code']); ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel">
						<div class="panel-body">
							<div class="profile-desk">
								<div class="col-md-12" style="padding-top:10px;">
									<h3><?= $detail['lokasi_nama']; ?></h3>
									<table class="table">
										<tbody>
											<tr>
												<td>Kantor</td>
												<td>:</td>
												<td><?php echo ucwords($detail['perusahaan_title']); ?></td>
											</tr>
											<tr>
												<td style="width: 20%">Nama Perusahaan</td>
												<td style="width: 5%">:</td>
												<td><?php echo $detail['lokasi_nama']; ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><?php echo $detail['perusahaan_alamat']; ?></td>
											</tr>
											<tr>
												<td>Jam Kerja</td>
												<td>:</td>
												<td><?php echo ""; ?></td>
											</tr>
										</tbody>
									</table>
									<!-- <span class="designation">MEMBE	R ID : </span> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- body end -->
	</div>