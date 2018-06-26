<!-- page Content Start-->
<?php echo $map['js']; ?>
<div id="content">
    <!--Breadcrumb Start-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="" class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home
            </a>
            <a href="<?php echo base_url('mastercms/karyawan'); ?>">Content
            </a>
            <a href="#" class="current"></i>Add
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
                            Tambah Lokasi / Perusahaan / Cabang
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
                                                <input class="span12" type="text" name='lokasi_nama' minlength="5" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> Title</label>
                                            <div class="controls icheck">
                                                <div class="square-blue">
                                                    <div class="radio">
                                                        <input type="radio" name="perusahaan_title" value="pusat">
                                                        <label class="control-label" style="text-align:left; padding:2px 12px 0 0;">Pusat </label>
                                                    </div>
                                                    <div class="radio ">
                                                        <input type="radio" name="perusahaan_title" value="cabang">
                                                        <label>Cabang </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="lokasi">Lokasi</label>
                                            <div class="controls">
                                                <input class="span12" id="pencarian"  type="text" placeholder="Cari Alamat atau Tempat" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div style="width:100%;"><?php echo $map['html'];?></div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> latitude</label>
                                            <div class="controls">
                                                <input class="span3" id="lat"  type="text" placeholder="Latitude" readonly="" value="<?=$lat;?>"/ >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"><span class="asterik">*</span> longitude</label>
                                            <div class="controls">
                                                <input class="span3" id="lng" type="text" placeholder="Longitudelng" readonly="" value="<?=$lng;?>"/>
                                            </div>
                                        </div>
                                        <div class="control-group form-action">
                                            <label class="span2 span2" ><code>(*) wajib diisi.</code></label>
                                            <div class="span8">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button> &nbsp;
                                                <a href="" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</a>
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


<!-- <script type="text/javascript" >
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
</script> -->







<!-- <script type="text/javascript">
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
</script> -->

<script>
update_address(<?=$lat;?>,<?=$lng;?>); //Set terlebih dahulu alamat lokasi pusat
function showmap()
{                       
    var place = placesAutocomplete.getPlace(); //Inisialkan auto complete atau pencarian
    if (!place.geometry) //Jika hasil tidak ada
    {
        return; //Abaikan
    }
    var lat = place.geometry.location.lat(), // Ambil Posisi Latitude Auto Complete
    lng = place.geometry.location.lng(); // Ambil Posisi Longitude Auto Complete
    document.getElementById('lat').value=lat; //Set Latitude pada input lat
    document.getElementById('lng').value=lng; //Set Longitude pada input lng
    var map = new google.maps.Map(document.getElementById('map-canvas'), { //Refresh alamat
        center: {lat: lat, lng: lng},
        zoom: 17
    });
    placesAutocomplete.bindTo('bounds', map); //Render Map Auto Complete
    
    //Tambah penandaan pada alamat
    var marker = new google.maps.Marker({
        map: map,
        draggable: true,
        title: "Drag Untuk mencari posisi",
        anchorPoint: new google.maps.Point(0, -29)
    });
    
    if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
    }
    marker.setPosition(place.geometry.location);        
    marker_0 = createMarker_map(marker);
    
        var alamat=document.getElementById('pencarian');
            google.maps.event.addListener(marker_0, "dragend", function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
                update_address(event.latLng.lat(),event.latLng.lng());              
            });
}

//Fungsi mendapatkan alamat disaat drag marker
function update_address(lat,lng)
{
    var geocoder = new google.maps.Geocoder;
    var latlng={lat: parseFloat(lat), lng: parseFloat(lng)};
    geocoder.geocode({'location': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {         
        document.getElementById('pencarian').value=results[0].formatted_address;
      } else {
        window.alert('Tidak ada hasil pencarian');
      }
    } else {
      window.alert('Geocoder error: ' + status);
    }
  });
}
</script>