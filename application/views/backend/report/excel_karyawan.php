<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table width="100%">
	<thead>
		<tr>
			<?php
			foreach ($lokasi_by_id as $key => $lok) :
				$nama_lokasi = $lok['lokasi_nama'];
			endforeach;
			?>
			<td colspan="7" align="center" valign="middle"><b><font size="4">Laporan Presensi Karyawan <?php echo $nama_lokasi; ?></font></b></td>
		</tr>
		<tr>
			<?php switch ($bulan)
			{
				case '01':
				$nama_bulan="Januari"; break;
				case '02':
				$nama_bulan="Februari"; break;
				case '03':
				$nama_bulan="Maret"; break;
				case '04':
				$nama_bulan="April"; break;
				case '05':
				$nama_bulan="Mei"; break;
				case '06':
				$nama_bulan="Juni"; break;
				case '07':
				$nama_bulan="Juli"; break;
				case '08':
				$nama_bulan="Agustus"; break;
				case '09':
				$nama_bulan="September"; break;
				case '10':
				$nama_bulan="Oktober"; break;
				case '11':
				$nama_bulan="November"; break;
				case '12':
				$nama_bulan="Desember"; break;

				default:
				$nama_bulan="Bulan"; break;
			} ?>
			<td colspan="7" align="center" valign="middle"><b><font size="4">Bulan <?php echo $nama_bulan." ".$tahun; ?></font></b></td>
		</tr>
		<tr>&nbsp;</tr>
	</thead>
</table>

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
				<td width="100%"><?php echo $user->karyawan_nama ?></td>
				<td width="100%"><?php echo $user->jam_masuk_absen ?></td>
				<td width="100%"><?php echo $user->jam_keluar_absen ?></td>
				<td><?php echo $user->status ?></td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>