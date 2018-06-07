<?php
/**
 * 
 */
class Karyawan extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkaryawan');
        $this->load->model('MkaryawanPage');
		if (!$this->session->userdata('user'))
		{
			$log = base_url("mastercms");
			echo "<script>location='$log';</script>";			
		}
	}

	function index()
	{ 
        $data = array();
        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->MkaryawanPage->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $data["results"] = $this->MkaryawanPage->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'mastercms/karyawan/index';
            $config['total_rows'] = $total_records;
            
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
            $data['karyawan']= $this->Mkaryawan->tampil();
        }
        
        $this->render_page('backend/karyawan/tampil', $data);
    }
     
    public function custom()
    {
        // load db and model
        $this->load->database();
        $this->load->model('MkaryawanPage');
     
        // init params
        $data = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->MkaryawanPage->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $data["results"] = $this->Users->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] = base_url() . 'paging/custom';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
             
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
 
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
 
            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';
 
            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
     
        $this->render_page('backend/karyawan/tampil', $data);
    }


    function cari(){
  		$keyword = $this->input->get('cari', TRUE);
  		$data['karyawan'] = $this->Mkaryawan->cari($keyword);
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

		if ($this->input->post()){
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