<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table style="min-width: 1000px;" width="100%">
    <thead>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($lokasi_by_id as $key => $lok) :
                $nama_lokasi = $lok['lokasi_nama'];
            endforeach;
            ?>
            <td colspan="9" align="center" valign="middle"><b><font size="4">Laporan Presensi Karyawan <?php echo $nama_lokasi; ?></font></b></td>
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
            <td colspan="9" align="center" valign="middle"><b><font size="4">Bulan <?php echo $nama_bulan." ".$tahun; ?></font></b></td>
        </tr>
        <tr>&nbsp;</tr>
    </tbody>
        <table class="table table-data table-bordered table-hover table-condensed cf" border="1">
            <thead class="DataTables_sort_wrapper" >
                <tr bgcolor="#89bbd4">
                    <th align="center" width="20%">No</th>
                    <th align="center" width="100px">Nama</th>
                    <th align="center">Jml Hari Kerja</th>
                    <th align="center">Masuk</th>
                    <th align="center">Terlambat</th>
                    <th align="center">Sakit</th>
                    <th align="center">Ijin</th>
                    <th align="center">Cuti</th>
                    <th align="center">Absen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($karyawan as $key => $kary) {?>
                    <tr>
                        <td align="center" width="20%"><?php echo $key+1; ?></td>
                        <td align="left" width="100%"><?php echo $kary['karyawan_nama'] ?></td>
                        <td><?php echo $jml_hari_kerja; ?></td>
                        <td>
                            <?php
                            foreach ($kehadiran as $key => $kehad) :
                                if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="masuk kerja")
                                {
                                    echo $kehad['jumlah'];
                                }
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($kehadiran as $key => $kehad) :
                                if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="terlambat")
                                {
                                    echo $kehad['jumlah'];
                                }
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($kehadiran as $key => $kehad) :
                                if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="sakit")
                                {
                                  echo $kehad['jumlah'];
                                }
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($kehadiran as $key => $kehad) :
                                if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="ijin")
                                {
                                   echo $kehad['jumlah'];
                                }
                            endforeach;
                            ?>
                       </td>
                       <td>
                            <?php
                            foreach ($kehadiran as $key => $kehad) :
                                if ($kehad['karyawan_id'] == $kary['karyawan_id'] && $kehad['status']=="cuti")
                                {
                                    echo $kehad['jumlah'];
                                }
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($presensi as $key => $pres) :
                                if ($pres['karyawan_id'] == $kary['karyawan_id'])
                                {
                                    $tot_presensi = $pres['jumlah'];
                                    $absen = $jml_hari_kerja - $tot_presensi;
                                    echo $absen;
                                }
                            endforeach;
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>