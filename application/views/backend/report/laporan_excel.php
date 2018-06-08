<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Karyawan</th>
            <th>Jam Absen</th>
            <th>Jam Keluar</th>
            <th>Hari</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($absensi as $key => $value) {?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo date('d M Y', strtotime($value['tanggal'])); ?></td>
                <td><?php echo $value['karyawan_nama']; ?></td>
                <td><?php echo $value['absen_hari']; ?></td>
                <td><?php echo $value['jam_masuk_absen']; ?></td>
                <td><?php echo $value['jam_keluar_absen']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['keterangan']; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>