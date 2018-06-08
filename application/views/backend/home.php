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
                            <h4 style="text-align: left;margin-left: 15px;"><?= $totalcabang; ?></h4>
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
                <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #3498DB;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">? </h6>
                            <h4 style="text-align: left;margin-left: 15px;"><?php echo rupiah($angka); ?></h4>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #9B59B6;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">? </h6>
                            <h4 style="text-align: left;margin-left: 15px;"><?php echo rupiah($angka); ?></h4>
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #2ECC71;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">? </h6>
                            <h4 style="text-align: left;margin-left: 15px;"><?php echo rupiah($angka); ?> </h4>
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    <ul class="quick-actions">
                        <li style="width: 100%;margin-left: 5px;background-color: #34495E;color: #fff;">
                            <h6 style="text-align: left;margin-top: 10px;margin-left: 15px">Fosquare Saldo </h6>
                            <h4 style="text-align: left;margin-left: 15px;"><?php echo rupiah($angka); ?></h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <pre><?php print_r($perusahaan); ?></pre>
            <?php foreach ($perusahaan as $key => $value): ?>
                <div class="col-md-6">
                    <div class="widget-box">
                        <div class="widget-title" style="margin-bottom: 15px">
                            <span class="icon">
                                <i class="fa fa-suitcase"></i>
                            </span>
                            <h5><?= $value['lokasi_nama']; ?></h5>
                        </div>  
                        <div class="widget-content nopadding" style="margin-top: -20px; width: 100%;">
                           <div id="container-<?= $value['lokasi_id'];?>" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                       </div> 
                   </div>
               </div>
               <script>
                    // Build the chart
                    Highcharts.chart('container-<?= $value['lokasi_id'];?>', {
                      chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Absensi Karyawan <?= $value['lokasi_nama'];?>'
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
                    series: [{
                        name: 'Karyawan',
                        colorByPoint: true,
                        data: [{
                          name: 'Masuk',
                          y: 61.41,
                          sliced: true,
                          selected: true
                      }, {
                          name: 'Absent',
                          y: 11.84
                      }, {
                          name: 'Ijin',
                          y: 10.85
                      }, {
                          name: 'Sakit',
                          y: 4.67
                      }, {
                          name: 'Terlambat',
                          y: 4.18
                      }]
                    }]
                    });
                </script>
           <?php endforeach ?>
       </div>
       <br>
       <!--REPORT END-->
   </div>