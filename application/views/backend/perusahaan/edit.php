<!-- page Content Start-->
<div id="content">
    <!--Breadcrumb Start-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="" class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home
            </a>
            <a href="<?php echo base_url('mastercms/perusahaan'); ?>">Content
            </a>
            <a href="<?php echo base_url('master/perusahaan/edit') ?>" class="current"></i><?= $title; ?>
            </a>
        </div>
    </div>
    <!--Breadcrumb End-->

    <!--Container Fluid start-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <!--page header start-->
                    <div class="widget-title" style="margin-bottom: 15px">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <h5>
                            Edit Lokasi / Perusahaan / Cabang
                        </h5>
                    </div>
                    <!--page header end-->

                    <!--Add content start-->
                    <div class="widget-content nopadding">
                        <form class="form-horizontal " role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="widget-content">
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> Nama Lokasi / Perusahaan</label>
                                            <div class="controls">
                                                <input class="span12" type="text" name='lokasi_nama' minlength="4" value="<?php echo $data['lokasi_nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> Title</label>
                                            <div class="controls icheck">
                                                <div class="square-blue">
                                                    <div class="radio">
                                                        <input type="radio" name="perusahaan_title" value="pusat" <?php if($data['perusahaan_title']=='pusat'){echo "checked";} ?> >
                                                        <label class="control-label" style="text-align:left; padding:2px 12px 0 0;">Pusat </label>
                                                    </div>
                                                    <div class="radio ">
                                                        <input type="radio" name="perusahaan_title" value="cabang" <?php if($data['perusahaan_title']=='cabang'){echo "checked";} ?> >
                                                        <label>Cabang </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> Alamat</label>
                                            <div class="controls">
                                                <div>
                                                    <textarea class="form-control" name="perusahaan_alamat" rows="2" resize="none" id="address" required="" onchange="geocodeLokasi()"><?php echo $data['perusahaan_alamat']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="lokasi">Map</label>
                                            <div class="controls">
                                                <br>    
                                                <div id="map_pencarian" style="width:100%; height:410px;"></div>  
                                            </div>   
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> latitude</label>
                                            <div class="controls">
                                                <input class="span4" type="text" name='latitude' id='latitude' value="<?php echo $data['latitude']; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> longitude</label>
                                            <div class="controls">
                                                <input class="span4" type="text" name='longitude' id='longitude' value="<?php echo $data['longitude']; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="control-group form-action">
                                            <label class="span2 span2" ><code>(*) wajib diisi.</code></label>
                                            <div class="span8">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button> &nbsp;
                                                <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <!-- page end-->
                        </form>
                    </div>
                    <!--Add contetn End-->
                </div>
            </div>
        </div>
        <!--Span12 End-->
    </div>
    <!-- Container fluid END-->

</div>

<!-- page Content End-->


<script type="text/javascript" >
    var geocoder;
    var map;
    function initialize() {  
        var latlng = new google.maps.LatLng(-7.7585089,110.3979093,17);
        var mapOptions = {
            zoom: 12,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP  
        }
        map = new google.maps.Map(document.getElementById('map_pencarian'), mapOptions);
    }

    function geocodeLokasi() {
        //inisialisasi geocoder
        geocoder = new google.maps.Geocoder();
        //mendapatkan nilai dari alamat yang dimasukan di text area dengan id 
        //address
        var address = document.getElementById('address').value;
        //menggunakan fungsi geocoder untuk mencari berdasarkan alamat 
        geocoder.geocode( { 'address': address}, function(results, status) {
            //jika status ok maka
            if (status == google.maps.GeocoderStatus.OK) {
                //menengahkan peta pada lokasi pencarian
                map.setCenter(results[0].geometry.location);
                //membuat objek marker titik pencarian dan menampilkannya pada 
                //peta 
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    title: 'Titik pencarian',
                    draggable : true,
                    animation: google.maps.Animation.DROP
                });
                //membuat variabel untuk menyimpan nilai latitude dan nilai 
                //longitude
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
                
                //korrdinat latitude dimunculkan di textbox dengan class 
                //latitude
                document.getElementById("latitude").value = lat;      
                //korrdinat longitude dimunculkan di textbox dengan class 
                //longitude
                document.getElementById("longitude").value = lng;    
            } else {
                //jika status tidak OK muncul pesan informasi status gagal
                alert('Geocode gagal karena : ' + status);
            }
        });
    }

    var myOptions = {
      zoom: 11,
      scaleControl: true,
      center:  new google.maps.LatLng(-7.783027122967378,110.36708066137703),
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };

    // Membuat sebuah fungsi yang mengembalikan koordinat alama
    google.maps.event.addDomListener(window, 'load', initialize());
</script>

<script type="text/javascript">
  function updateMarkerPosition(latLng) {
      document.getElementById('latitude').value = [latLng.lat()];
      document.getElementById('longitude').value = [latLng.lng()];
  }

  var myOptions = {
      zoom: 11,
      scaleControl: true,
      center:  new google.maps.LatLng(-7.783027122967378,110.36708066137703),
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };


  var map = new google.maps.Map(document.getElementById("map_pencarian"),
    myOptions);

  var marker = new google.maps.Marker({
    position : new google.maps.LatLng(-7.783027122967378,110.36708066137703),
    title : 'lokasi',
    map : map,
    draggable : true
});

 //updateMarkerPosition(latLng);

 google.maps.event.addListener(marker, 'drag', function() {
  updateMarkerPosition(marker.getPosition());
});
</script>