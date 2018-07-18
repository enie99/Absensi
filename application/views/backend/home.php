<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a></div>
    </div>
    <div class="container-fluid" style="min-height: 540px;">
        <!--REPORT START-->
        <div class="row-fluid">
            <div class="col-md-6">
                <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #2ECC71;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">Total Cabang </h6>
                            <h4 style="text-align: left;margin-left: 15px;"><?= count($perusahaan); ?></h4>
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #F39C12;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">Total Karyawan </h6>
                            <h4 style="text-align: left;margin-left: 15px;"><?= $totalkaryawan; ?></h4>
                        </li>
                    </ul>
                </div>
               <!-- <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #3498DB;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">? </h6>
                            <h4 style="text-align: left;margin-left: 15px;">000</h4>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>

        <div class="row-fluid">
                
            <?php foreach ($perusahaan as $key => $p): ?>
                <div class="col-md-6">
                    <div class="widget-box">
                        <div class="widget-title" style="margin-bottom: 15px">
                            <span class="icon">
                                <i class="fa fa-suitcase"></i>
                            </span>
                            <h5><?= $p['lokasi_nama']; ?></h5>
                        </div>  
                        <div class="widget-content nopadding" style="margin-top: -20px; width: 100%;">
                            <div id="container-<?= $p['lokasi_id'];?>" style="min-width: 310px; min-height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div> 
                    </div>
                </div>
                <script>
                    Highcharts.chart('container-<?= $p['lokasi_id'];?>', {
                      chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Presensi <?= $p['lokasi_nama'];?>'
                    },
                    subtitle: {
                        text: 'Total Karyawan : <?= $p['jml_karyawan']; ?>'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                          allowPointSelect: true,
                          cursor: 'pointer',
                          dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{data: <?= (!empty($absen[$p['lokasi_id']])) ? json_encode($absen[$p['lokasi_id']]) : json_encode(array('kosong')) ?>}]  
          });
      </script>
  <?php endforeach ?>
</div>
<br>
<!--REPORT END-->
</div>