<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
    <thead>
        <table class="table table-data table-bordered table-hover table-condensed cf" border="1">
            <thead class="DataTables_sort_wrapper" >
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jml Hari Kerja</th>
                    <th>Masuk</th>
                    <th>Terlambat</th>
                    <th>Absen</th>
                    <th>Sakit</th>
                    <th>Ijin</th>
                    <th>Cuti</th>
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