<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table class="table table-data table-bordered table-hover table-condensed cf" border="1">
    <thead class="DataTables_sort_wrapper" >
        <tr>
            <th style="background: #dedeec; font-size: 12px" width="30">No</th>
            <th style="background: #dedeec; font-size: 12px" width="100">Tanggal</th>
            <th style="background: #dedeec; font-size: 12px" width="200">Nama Karyawan</th>
            <th style="background: #dedeec; font-size: 12px" width="130">Hari</th>
            <th style="background: #dedeec; font-size: 12px" width="130">Jam Absen</th>
            <th style="background: #dedeec; font-size: 12px" width="130">Jam Keluar</th>
            <th style="background: #dedeec; font-size: 12px" width="130">Status</th>
            <th style="background: #dedeec; font-size: 12px" width="150">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($absensi as $key => $value) {?>
            <tr>
                <td data-title="No"><?php echo $key+1; ?></td>
                <td data-title="No"><?php echo date('d M Y', strtotime($value['tanggal'])); ?></td>
                <td data-title="No"><?php echo $value['karyawan_nama']; ?></td>
                <td data-title="No"><?php echo $value['absen_hari']; ?></td>
                <td data-title="No"><?php echo $value['jam_masuk_absen']; ?></td>
                <td data-title="No"><?php echo $value['jam_keluar_absen']; ?></td>
                <td data-title="No"><?php echo $value['status']; ?></td>
                <td data-title="No"><?php echo $value['keterangan']; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>