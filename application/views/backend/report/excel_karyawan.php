<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
	<thead>
		<tr style="background-color: #e1e1e1;">
			<th>No</th>
			<th>Hari, Tanggal</th>
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
				<td><?php echo hari($user->tanggal).', '.tanggal($user->tanggal); ?></td>
				<td><?php echo $user->karyawan_nama ?></td>
				<td><?php echo $user->jam_masuk_absen ?></td>
				<td><?php echo $user->jam_keluar_absen ?></td>
				<td><?php echo $user->status ?></td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>