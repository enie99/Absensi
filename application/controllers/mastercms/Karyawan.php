<?php
class Karyawan extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
    $this->load->model('Mkaryawan');
		$this->load->model('Mperusahaan');
		if (!$this->session->userdata('user'))
		{
			$log = base_url("mastercms");
      $this->session->set_flashdata('msg', '<div class="alert alert-block alert-info fade in"><button type="button" class="close close-sm" data-dismiss="alert"><i class="fa fa-times"></i></button><i class="fa fa-warning"></i>&nbsp;&nbsp;Anda harus login terlebih dahulu.</div>');
			echo "<script>location='$log';</script>";			
		}
	}
	function index()
	{ 
      $id = $_SESSION['user']['perusahaan_id'];
      $data['perusahaan'] = $this->Mperusahaan->get_cabang($id);
      // $dataKaryawan = $this->Mkaryawan->tampil($id);
      $data['karyawan'] = $this->Mkaryawan->tampil($id);
      $data['lokasi_id'] = "";

      if ($this->input->post()) {
        $lokasi_id  = $this->input->post('lokasi_id');
        $data['lokasi_id'] = $lokasi_id;
        $data['karyawan_id'] = $this->Mkaryawan->tampil_id($id, $lokasi_id);
        // $data['karyawan_id'] = $this->Mkaryawan->tampil_id($id, $lokasi_id);
        // $config['base_url'] = base_url("mastercms/karyawan/");
        // $config['total_rows'] = count($karyawanId);
        // $config['full_tag_open'] = '<li>';
        // $config['full_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="active"><a>';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $config['first_link'] = "First";
        // $config['first_tag_open'] = "<li>";
        // $config['first_tag_close'] = "</li>";
        // $config['prev_link'] = "Prev";
        // $config['prev_tag_open'] = "<li>";
        // $config['prev_tag_close'] = "</li>";
        // // pull right
        // $config['next_link'] = "Next";
        // $config['next_tag_open'] = "<li>";
        // $config['next_tag_close'] = "</li>";
        // $config['last_link'] = "Last";
        // $config['last_tag_open'] = "<li>";
        // $config['last_tag_close'] = "</li>";

        // $this->pagination->initialize($config);
        // $from = $this->uri->segment(3);

        // $data['karyawan_id'] = $this->Mkaryawan->show_karyawan_id_pagination($config['per_page'], $from);
        // $data['mpaging'] = $this->pagination->create_links(); 



        // $this->load->library('pagination');

    // pagination

        // $config['base_url'] = base_url().'logincms/gallery/index/';
        // $config['total_rows'] = count($karyawanId);
        // $config['per_page'] = 3;
        // $config['num_links'] = 2;



      }
      if ($this->input->post('filter') == "1")
      {
        $keyword = $this->input->post('cari');
        $data['karyawan_id'] = $this->Mkaryawan->cari($keyword);
      }
      if($this->input->post('reset') == "1")
      {
        $lokasi_id  = $this->input->post('lokasi_id');
        $data['lokasi_id'] = $lokasi_id;
        $data['karyawan_id'] = $this->Mkaryawan->tampil_id($id, $lokasi_id);
      }

      $this->render_page('backend/karyawan/tampil', $data);
    }
    
    function add()
    {
        if ($this->input->post())
        {
             $input = $this->input->post();
             $this->Mkaryawan->tambah($input);
        }
       $data['karyawan'] = $this->Mkaryawan->daftar_perusahaan();
       $this->render_page('backend/karyawan/tambah', $data);
    }

    function detail($karyawan_id)
    {
      $data['detail_data']= $this->Mkaryawan->detail($karyawan_id);
      $this->render_page('backend/karyawan/detail', $data);
    }

    function edit($karyawan_id)
    {
      $data['edit'] = $this->Mkaryawan->get_by_id($karyawan_id);
      $data['karyawan'] = $this->Mkaryawan->daftar_perusahaan();

      if ($this->input->post())
      {
         $input = $this->input->post();
         $this->Mkaryawan->edit($input, $karyawan_id);
      }
      $this->render_page('backend/karyawan/edit',$data);
    }
    function hapus($karyawan_id)
    {
      $data = $this->Mkaryawan->get_by_id($karyawan_id);

      $this->Mkaryawan->hapus($karyawan_id);
      redirect("mastercms/karyawan", "refresh");
    }

}
?>