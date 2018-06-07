<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	private $def_lat;
	private $def_lng;
	function __construct()
	{
		parent::__construct();
		// LOAD Helper Url untuk menggunakan base_url
		$this->load->helper(array('form','url'));
		// Load Config Map
		$this->load->config('map');
		// Set lokasi latitude dan longitude
		$this->def_lat=$this->config->item('default_lat');
		$this->def_lng=$this->config->item('default_lng');
		
		//Load library googlemap
		//Sumber Library http://biostall.com/codeigniter-google-maps-v3-api-library
		$this->load->library('googlemaps');
	}
	
	function index()
	{
		//Set Lokasi pusat		
		$center=$this->def_lat.",".$this->def_lng;
		
		//Konfigurasi Gogle Map
		$cfg=array(
		'class'			=>'map-canvas', //Class Div, disini bisa membuat map full size,dll
		'map_div_id'	=>'map-canvas', //Definisi ID Default
		'center'		=>$center, //Set Lokasi pusat ke google map
		'zoom'			=>17,	 // Besar map, katanya bagus yg 17 ini
		);
		$this->googlemaps->initialize($cfg);
		
		$meta['judul']="Google Map dengan CI";
		$this->load->view('template/header',$meta);
		
		//Buat HTML Map
		$d['map']=$this->googlemaps->create_map();
		
		$this->load->view('mapview',$d);
		$this->load->view('template/footer');
	}
	
	function dragmarker()
	{
		$center=$this->def_lat.",".$this->def_lng;
		$cfg=array(
		'class'			=>'map-canvas',
		'map_div_id'	=>'map-canvas',
		'center'		=>$center,
		'zoom'			=>17,		
		);
		$this->googlemaps->initialize($cfg);		
		
		// Set penandaan
		$marker=array(
		'position'		=>$center, // Tandakan pada lokasi pusat
		'draggable'		=>TRUE, //Fitur drag diaktifkan
		'title'			=>'Coba diDrag', //Judul di atas tanda marker
		'ondragend'		=>"document.getElementById('lat').value = event.latLng.lat(); 
        					document.getElementById('lng').value = event.latLng.lng();", //Aksi disaat marker di drag nilai latitude dan longitude disimpan pada div id lat dan lng
		);		
        $this->googlemaps->add_marker($marker);
		
		$meta['judul']="Google Map dengan CI | Map Marker Drag";
		$this->load->view('template/header',$meta);
		
		
		$d['map']=$this->googlemaps->create_map();
		$d['lat']=$this->def_lat;
		$d['lng']=$this->def_lng;
		
		$this->load->view('mapdragmarkerview',$d);
		$this->load->view('template/footer');
	}
	
	function acom()
	{
		$center=$this->def_lat.",".$this->def_lng;
		$cfg=array(
		'class'			=>'map-canvas',
		'map_div_id'	=>'map-canvas',
		'center'		=>$center,
		'zoom'			=>17,
		'places'		=>TRUE, //Aktifkan pencarian alamat
		'placesAutocompleteInputID'	=>'cari', //set sumber pencarian input
		'placesAutocompleteBoundsMap'	=>TRUE,
		'placesAutocompleteOnChange'	=>'showmap();' //Aksi ketika pencarian dipilih
		);
		$this->googlemaps->initialize($cfg);
		
		$marker=array(
		'position'		=>$center,
		'draggable'		=>TRUE,
		'title'			=>'Coba diDrag',
		'ondragend'		=>"document.getElementById('lat').value = event.latLng.lat();
        					document.getElementById('lng').value = event.latLng.lng();
        					showmap();",
		);		
        $this->googlemaps->add_marker($marker);
		
		$meta['judul']="Google Map dengan CI | Auto Complete Address";
		$this->load->view('template/header',$meta);
		
		$d['map']=$this->googlemaps->create_map();
		$d['lat']=$this->def_lat;
		$d['lng']=$this->def_lng;
		
		$this->load->view('mapacview',$d);
		$this->load->view('template/footer');
	}
}