<?php
/**
 * 
 */
class Perusahaan extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Mperusahaan');

		if (!$this->session->userdata('user'))
		{
			$log = base_url("mastercms");
			echo "<script>location='$log';</script>";
		}
	}

	function index()
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$data['profil'] = $this->Mperusahaan->profil($id);
		$this->render_page('backend/perusahaan/profil',$data);
	}

	function cabang()
	{
		$id = $_SESSION['user']['perusahaan_id'];
		// $data['perusahaan'] = $this->Mperusahaan->tampil_cabang($id);
		$data['perusahaan'] = $this->Mperusahaan->tampil_cabang($id);
		$data['jam_kerja'] = $this->Mperusahaan->semua_jamkerja();

		$this->render_page('backend/perusahaan/data-cabang',$data);
	}

	function editprofil($id)
	{
		$data['title'] = 'Edit Profil';
		$data['profil'] = $this->Mperusahaan->profil($id);

		if ($this->input->post()) {
			$input = $this->input->post();
			$this->Mperusahaan->edit_profil($id, $input);
			redirect('mastercms/perusahaan', 'refresh');
		}
		$this->render_page('backend/perusahaan/edit-profil', $data);
	}

	function detail($id)
	{
		$data['detail'] = $this->Mperusahaan->get_by_id($id);
		$data['id'] = $id;
		$this->render_page('backend/perusahaan/detail',$data);
	}

	function add()
	{
		$this->load->library('ciqrcode');

		if ($this->input->post()) {
			$input = $this->input->post();
			$input['perusahaan_id'] = $_SESSION['user']['perusahaan_id'];
			$input['lokasi_nama'] = $this->input->post('lokasi_nama');
			$input['perusahaan_alamat'] = $this->input->post('perusahaan_alamat');

			$time	= date("dmyhis");
			$url 	= strtolower($input['lokasi_nama']);
			$url 	= str_replace(" ", "-", $url);
			$url 	= str_replace(".", "-", $url);
			$url 	= str_replace(",", "-", $url);
			$url 	= str_replace("(", "-", $url);
			$url 	= str_replace(")", "-", $url);
			$alias 	= $url;

			$config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './assets/'; //string, the default is application/cache/
	        $config['errorlog']     = './assets/'; //string, the default is application/logs/
	        $config['imagedir']     = './assets/images/qrcode/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);

	        $image_name	=	$alias.'-'.$time.'.png'; //buat name dari qr code sesuai dengan nama

	        $params['data'] = $input['lokasi_nama']."\n"."\n".$input['perusahaan_alamat']; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


	        $this->Mperusahaan->add_lokasi($input,$image_name);
	        redirect('mastercms/perusahaan/cabang', 'refresh');
	    }
	    $this->render_page('backend/perusahaan/tambah-cabang');
	}

	function edit($id)
	{
		$this->load->library('ciqrcode');
		$data['title'] = 'Edit Perusahaan / Cabang';
		$data['data'] = $this->Mperusahaan->get_by_id($id);

		if ($this->input->post()) {
			$input = $this->input->post();
			$input['lokasi_nama'] = $this->input->post('lokasi_nama');
			$input['perusahaan_alamat'] = $this->input->post('perusahaan_alamat');

			$time	= date("dmyhis");
			$url 	= strtolower($input['lokasi_nama']);
			$url 	= str_replace(" ", "-", $url);
			$url 	= str_replace(".", "-", $url);
			$url 	= str_replace(",", "-", $url);
			$url 	= str_replace("(", "-", $url);
			$url 	= str_replace(")", "-", $url);
			$alias 	= $url;

			$config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './assets/'; //string, the default is application/cache/
	        $config['errorlog']     = './assets/'; //string, the default is application/logs/
	        $config['imagedir']     = './assets/images/qrcode/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);

	        $image_name	=	$alias.'-'.$time.'.png'; //buat name dari qr code sesuai dengan nama

	        $params['data'] = $input['lokasi_nama']."\n"."\n".$input['perusahaan_alamat']; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

	        $this->Mperusahaan->edit($id, $input, $image_name);
	        redirect('mastercms/perusahaan/cabang', 'refresh');
	    }
	    $this->render_page('backend/perusahaan/edit', $data);
	}

	function add_jam_kerja($id)
	{
		// $data['data'] = $this->Mperusahaan->get_by_id($id);
		$data['edit'] = $this->Mperusahaan->get_jam_kerja($id);
		// foreach ($ as $key => $value) {
		// 	# code...
		// }
		if ($this->input->post())
		{
			$input = $this->input->post();
			if ($input['hari']['senin'])
			{
				$jamkerja['lokasi_id'] = $id;
				$jamkerja['kerja_hari'] = "senin";
				$jamkerja['jam_masuk'] = $this->input->post('hari[senin][masuk]');
				$jamkerja['jam_keluar'] = $this->input->post('hari[senin][keluar]');

				if (!empty($this->input->post('hari[senin][masuk]') && $this->input->post('hari[senin][keluar]')))
				{
					$this->Mperusahaan->jam_kerja($jamkerja);
				}
			}
			if ($input['hari']['selasa']) 
			{
				$jamkerja['lokasi_id'] = $id;
				$jamkerja['kerja_hari'] = "selasa";
				$jamkerja['jam_masuk'] = $this->input->post('hari[selasa][masuk]');
				$jamkerja['jam_keluar'] = $this->input->post('hari[selasa][keluar]');
				if (!empty($this->input->post('hari[selasa][masuk]') && $this->input->post('hari[selasa][keluar]')))
				{
					$this->Mperusahaan->jam_kerja($jamkerja);
				}

			}
			if ($input['hari']['rabu']) 
			{
				$jamkerja['lokasi_id'] = $id;
				$jamkerja['kerja_hari'] = "rabu";
				$jamkerja['jam_masuk'] = $this->input->post('hari[rabu][masuk]');
				$jamkerja['jam_keluar'] = $this->input->post('hari[rabu][keluar]');
				if (!empty($this->input->post('hari[rabu][masuk]') && $this->input->post('hari[rabu][keluar]')))
				{
					$this->Mperusahaan->jam_kerja($jamkerja);
				}

			}
			if ($input['hari']['kamis']) 
			{
				$jamkerja['lokasi_id'] = $id;
				$jamkerja['kerja_hari'] = "kamis";
				$jamkerja['jam_masuk'] = $this->input->post('hari[kamis][masuk]');
				$jamkerja['jam_keluar'] = $this->input->post('hari[kamis][keluar]');
				if (!empty($this->input->post('hari[kamis][masuk]') && $this->input->post('hari[kamis][keluar]')))
				{
					$this->Mperusahaan->jam_kerja($jamkerja);
				}

			}
			if ($input['hari']['jumat']) 
			{
				$jamkerja['lokasi_id'] = $id;
				$jamkerja['kerja_hari'] = "jumat";
				$jamkerja['jam_masuk'] = $this->input->post('hari[jumat][masuk]');
				$jamkerja['jam_keluar'] = $this->input->post('hari[jumat][keluar]');
				if (!empty($this->input->post('hari[jumat][masuk]') && $this->input->post('hari[jumat][keluar]')))
				{
					$this->Mperusahaan->jam_kerja($jamkerja);
				}

			}
			if ($input['hari']['sabtu']) 
			{
				$jamkerja['lokasi_id'] = $id;
				$jamkerja['kerja_hari'] = "sabtu";
				$jamkerja['jam_masuk'] = $this->input->post('hari[sabtu][masuk]');
				$jamkerja['jam_keluar'] = $this->input->post('hari[sabtu][keluar]');
				if (!empty($this->input->post('hari[sabtu][masuk]') && $this->input->post('hari[sabtu][keluar]')))
				{
					$this->Mperusahaan->jam_kerja($jamkerja);
				}

			}

			// echo "<pre>";
			// print_r($input['hari']);
			// echo "</pre>";
			
		}
		
		$this->render_page('backend/perusahaan/tambah-jam-kerja',$data);
	}

}
?>