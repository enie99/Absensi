<!DOCTYPE html>
<html>
<head>
  <title>MEMBUAT GRAFIK LINE DENGAN PLUGIN HIGHCHART</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
  <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
  <script type="text/javascript" src="http://code.highcharts.com/highcharts-3d.js"></script>
  <style type="text/css">
  .container { margin: auto; padding: 5px; width: 800px; border: 2px solid #DBDBDB; }
</style>

</head>
<body>
  <div class="container">
    <div class="grafik" style="width:100%; height:400px;"></div>
  </div>
  <script type="text/javascript">
    $('.grafik').highcharts({
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        },
        marginTop: 80
      },
      credits: {
        enabled: false
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      title: {
        text: 'JUMLAH SISWA SD TRITUNGGAL'
      },
      subtitle: {
        text: 'TAHUN 2013 - 2015'
      },
      xAxis: {
        categories: <?php echo $array_kategori; ?>,
        labels: {
          style: {
            fontSize: '10px',
            fontFamily: 'Verdana, sans-serif'
          }
        }
      },
      legend: {
        enabled: true
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: false
          },
          showInLegend: true
        }
      },
      series: <?php echo $array_series; ?>
    });
    
  </script>
</body>
</html>