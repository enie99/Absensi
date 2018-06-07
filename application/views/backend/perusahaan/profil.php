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
	<!-- page heading end-->
	<!-- body start -->
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-body">
						<div class="profile-desk">
							<div class="profile-pic text-center" style="margin:10px;margin-bottom:30px;width:100%;height:auto;">
								<img alt="Logo Perusahaan" style="width: 200px; height: auto;" name="Logo Perusahaan" src="
								<?php echo base_url("assets/backend/images/perusahaan/$profil[perusahaan_logo]"); ?>">
								<h3></h3>
								<p>Kantor </p>
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
								<h3>Profil <a href="<?php echo base_url('mastercms/perusahaan/editprofil/').$profil['perusahaan_id']; ?>" class="pull-right" title="Edit"><span class="btn btn-warning"><i class="fa fa-pencil" style="font-size: 14px;"></i></a></span></h3>
								<table class="table">
									<tbody>
										<tr>
											<td style="width: 20%">Nama Perusahaan</td>
											<td style="width: 5%">:</td>
											<td><?php echo $profil['perusahaan_nama']; ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td>:</td>
											<td><?php echo $profil['perusahaan_email']; ?></td>
										</tr>
										<tr>
											<td>No. Telpon</td>
											<td>:</td>
											<td><?php echo $profil['perusahaan_telp']; ?></td>
										</tr>
										<tr>
											<td>Bidang</td>
											<td>:</td>
											<td><?php echo $profil['perusahaan_bidang']; ?></td>
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