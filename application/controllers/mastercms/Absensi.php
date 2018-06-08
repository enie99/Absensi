<?php
/**
 * 
 */
class Absensi extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Mabsensi');

        if (!$this->session->userdata('user'))
        {
            $log = base_url("mastercms");
            echo "<script>location='$log';</script>";
        }
    }

	public function index()
    {
        $data['absensi'] = $this->Mabsensi->tampil();
        $this->render_page('backend/report/absensi',$data);
    }

    public function absensi()
    {
        $data['absensi'] = $this->Mabsensi->tampil($id);
        $this->render_page('backend/report/absensi', $data);
    }

    function summary()
    {
        $this->render_page('backend/report/summary');
    }

    //export ke dalam format excel
    public function export_excel(){
           $data = array( 'title' => 'Laporan Excel | Absensi',
                'absensi' => $this->Mabsensi->getAll());
           $this->load->view('backend/report/laporan_excel',$data);
       }

    public function hapus($karyawan_id)
    {
        $data = $this->Mabsensi->get_by_id($karyawan_id);

        $this->Mabsensi->hapus($karyawan_id);
        redirect("mastercms/absensi", "refresh");
    }

    public function cari(){
        $keyword = $this->input->get('cari', TRUE); //mengambil nilai dari form input cari
        $data['absensi'] = $this->Mabsensi->cari($keyword); //mencari data karyawan berdasarkan inputan
        $this->render_page('backend/report/absensi', $data);; //menampilkan data yang sudah dicari
    }

    public function detail($karyawan_id){
        $data['detail_data']= $this->Mabsensi->detail($karyawan_id);
        $data['detail_data_absensi']= $this->Mabsensi->detail_absensi($karyawan_id);
        $this->render_page('backend/report/detail', $data);
    }

    public function summary(){
        $id = $_SESSION['user']['perusahaan_id'];
        $data['cabang'] = $this->Mabsensi->semua_cabang($id);
        if ($this->input->post()) {
            $input = $this->input->post();
            $lokasi_id = $input['lokasi_id'];
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['kehadiran'] = $this->Mabsensi->kehadiran();

            echo "<pre>";
            print_r($data['kehadiran']);
            echo "</pre>";
        }
        
        $this->render_page('backend/report/summary', $data);
    }

}
?>