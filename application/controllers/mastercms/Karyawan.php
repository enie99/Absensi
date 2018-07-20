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
  $data['session']=$id;
  $data['perusahaan'] = $this->Mperusahaan->get_cabang($id);
  // $data['perusahaan'] = $this->db->query('SELECT * FROM `_lokasi` WHERE perusahaan_id = "'.$id.'"')->result_array();
      // $dataKaryawan = $this->Mkaryawan->tampil($id);
  $data['karyawan'] = $this->Mkaryawan->tampil($id);
  $data['lokasi_id'] = "";

      // if ($this->input->post()) {
  $lokasi_id  = $this->input->post('lokasi_id');
  $data['lokasi_id'] = $lokasi_id;
        // $data['karyawan_id'] = $this->Mkaryawan->tampil_id($id, $lokasi_id);
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
        // $data['mpaging'] = $this->paginat  ion->create_links(); 

//edited

// library
  $this->load->library('pagination');

// buat paging
  $config['base_url'] = base_url("mastercms/karyawan/index/");
  $config['total_rows'] =  $this->db->query('SELECT * FROM _karyawan k, _lokasi l where k.lokasi_id=l.lokasi_id and k.lokasi_id="'.$lokasi_id.'"')->num_rows();
  $config['per_page'] = 2;
  $config['num_links'] = 2;
// buat css



//buat nyari
  $config['first_link']='< First ';
  $config['last_link']='Last > ';
  $config['next_link']='> ';
  $config['prev_link']='< ';

  $from = $this->uri->segment(4);
  $this->pagination->initialize($config);   
  $data['karyawan_id'] =$this->Mkaryawan->show_karyawan_id_pagination($config['per_page'], $from, $lokasi_id);
  $data['mpaging']= $this->pagination->create_links();
          // $data['total_rows']=$total_rows;

// buat oret2

  $data['lokasi']=$lokasi_id;
  $data['coba']=$this->uri->segment(5);
  $data['num_rows']=$this->db->query('SELECT * FROM _karyawan k, _lokasi l where k.lokasi_id=l.lokasi_id and k.lokasi_id="'.$this->input->post('lokasi_id').'"')->num_rows();

      // }
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



public function pagination()
{


// inisialisasi variabel
 $lokasi_id=$this->input->get('lokasi_id');
  $id_perusahaan = $_SESSION['user']['perusahaan_id'];



// buat oret2

  // $data['lokasi']=$lokasi_id;
  // $data['coba']=$this->uri->segment(5);
  // $data['num_rows']=$this->db->query('SELECT * FROM _karyawan k, _lokasi l where k.lokasi_id=l.lokasi_id and k.lokasi_id="'.$this->input->post('lokasi_id').'"')->num_rows();




if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page =  1;
  }

  $record_per_page=3;
  
  $start = ($page - 1) * $record_per_page;



//tampilan tabe;

  $karyawan_id =$this->Mkaryawan->show_karyawan_id_pagination($record_per_page, $page, $lokasi_id)->result();

  // $karyawan_id =$this->db->query('SELECT * FROM `_karyawan` JOIN `_lokasi` ON `_lokasi`.`lokasi_id` = `_karyawan`.`lokasi_id` JOIN `_perusahaan` ON `_perusahaan`.`perusahaan_id` = `_lokasi`.`perusahaan_id` WHERE `_perusahaan`.`perusahaan_id` = '.$id_perusahaan.' AND `_lokasi`.`lokasi_id` = '.$lokasi_id.' ORDER BY `_karyawan`.`karyawan_id` DESC LIMIT '.$start.','.$record_per_page.'')->result();

  // $result='';
  echo '<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th><font size="2px">No</font></th>
                        <th><font size="2px">Nama</font></th>
                        <th><font size="2px">Jabatan</font></th>
                        <th><font size="2px">Email</font></th>
                        <th><font size="2px">No.Handphone</font></th>
                        <th><font size="2px">Aksi</font></th>
                      </tr>
                    </thead>
                    <tbody>
                    ';
$no=1;
                   foreach ($karyawan_id as $k) {
                   echo '<tr>
                        <td>'.$no++.'</td>';
                   echo '<td>'.$k->karyawan_nama.'</td>';
                   echo '<td>'.$k->karyawan_jabatan.'</td>';
                   echo '<td>'.$k->karyawan_email.'</td>';
                   echo '<td>'.$k->no_hp.'</td>';
                   echo '<td>';

                   echo '<span><a href="';
                   echo base_url("mastercms/karyawan/detail/$k->karyawan_id"); 
                   echo '" title="Detail"><i class="fa fa-eye"></i></a> &nbsp;</span>';


                  echo '<span><a href="';
                  echo base_url("mastercms/karyawan/edit/$k->karyawan_id");
                  echo'" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;</span>';

                  echo '
                    <span><a href="';
                     echo base_url("mastercms/karyawan/hapus/$k->karyawan_id");
                    echo '" title="Hapus" onClick="return confirm(Anda yakin ingin menghapus data ini?)"><i class="fa fa-times"></i></a> &nbsp;</span>';




                   echo '</td>
                   </tr>';

                    }


                    echo '</tbody>
                    </table>'; 



//oret2
          // $lokasi = $this->input->get('lokasi_id');
          $id_perusahaan = $_SESSION['user']['perusahaan_id'];
  // echo $result;
                    // print_r($karyawan_id);
                    // echo $this->pagination->create_links();

                    $num_rows=$this->db->query('SELECT * FROM _karyawan k, _lokasi l where k.lokasi_id=l.lokasi_id and k.lokasi_id="'.$lokasi_id.'"')->num_rows();
                    $total_pages = ceil($num_rows/$record_per_page);

                    for ($i=1; $i <= $total_pages ; $i++) { 
                        echo "<span class = 'pagination' style = 'cursor:pointer; margin:1px; padding:8px; border:1px solid #ccc;' id = '".$i."'>".$i."</span>";

                    }

                    echo "<span class = 'pull-right'>Page of ".$page." out of ".$total_pages."</span>";

// print_r($karyawan_id);


}




function add()
{
  if ($this->input->post())
  {
   $input = $this->input->post();
   $receiver = $input['karyawan_email'];
    $this->Mkaryawan->sendEmail($receiver);
    $this->Mkaryawan->tambah($input);
    
    $this->session->set_flashdata('msg', '<div class="alert alert-info">Karyawan berhasil ditambahkan, Email telah dikirimkan ke karyawan baru.</div>');
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