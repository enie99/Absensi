<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Hari</th>
			<th>Tanggal</th>
			<th>Nama Karyawan</th>
			<th>Jam Masuk</th>
			<th>Jam Keluar</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($user as $user) { ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $user->absen_hari ?></td>
				<td><?php echo date('d M Y', strtotime($user->tanggal)); ?></td>
				<td><?php echo $user->karyawan_nama ?></td>
				<td><?php echo $user->jam_masuk_absen ?></td>
				<td><?php echo $user->jam_keluar_absen ?></td>
				<td><?php echo $user->status ?></td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>