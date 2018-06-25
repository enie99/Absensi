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
			<div class="col-md-12">
				<div class="panel">
					<div class="panel panel-default">
						<div class="panel-heading">
							Profil &nbsp;&nbsp;<a href="<?php echo base_url('mastercms/perusahaan/editprofil/').$profil['perusahaan_id']; ?>" title="Edit"><span class="pull-right"><i class="fa fa-pencil" style="font-size: 14px;"></i></a></span>
						</div>
						<div class="panel-body">
							<!-- <div class="profile-desk"> -->
								<div class="col-md-12" style="padding-top:10px;">
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
							<!-- </div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- body end -->
</div>