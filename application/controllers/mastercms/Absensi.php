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

    public function index(){
        $x['absensi']=$this->Mabsensi->tampil();
        $x['data']=$this->Mabsensi->get_cabang();
        $this->render_page('backend/report/absensi',$x);
        $this->load->view('backend/report/absensi',$x);

    }

    public function get_karyawan(){
        $id=$this->input->post('id');
        $data=$this->Mabsensi->get_karyawan($id);
        echo json_encode($data);
    }

    public function pencarian(){
        $cabang=$this->input->get('cabang');
        $bulan=$this->input->get('filterbulan');
        $tahun=$this->input->get('tahun');
        $karyawan=$this->input->get('karyawan');
        $data['data']=$this->Mabsensi->get_cabang();
        $data['absensi']=$this->Mabsensi->pencarian_d($cabang,$bulan,$tahun,$karyawan);
        $this->render_page('backend/report/filter_absensi',$data);
        $this->load->view('backend/report/filter_absensi',$data);
    }


    public function summary()
    {
        $id = $_SESSION['user']['perusahaan_id'];
        $data['cabang'] = $this->Mabsensi->semua_cabang($id);
        if ($this->input->post()) { //Perintah yg dijalankan saat user mengklik lokasi perusahaan yg dipilih
            $input = $this->input->post();
            $lokasi_id = $input['lokasi_id'];
            $bulan = date('m');

            $data['bulan'] = $bulan;
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['lokasi'] = $lokasi_id;
            $data['kehadiran'] = $this->Mabsensi->kehadiran($bulan);
        }
        elseif ($this->input->get()) //Perintah yg dijalankan saat tombol cari diklik (methode formnya "GET")
        { 
            $input = $this->input->get();
            $lokasi_id = $input['lokasi_id'];
            $bulan = $input['bulan'];
            
            $data['bulan'] = $bulan;
            $data['lokasi'] = $lokasi_id;
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['kehadiran'] = $this->Mabsensi->kehadiran($bulan);
        }
        else //Perintah yg dijalankan pada saat user belum mengklik lokasi perusahaan
        { 
            $lokasi_id = "";
            $data['lokasi'] = "";
            $bulan = date('m');
            $data['bulan'] = $bulan;
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['kehadiran'] = $this->Mabsensi->kehadiran($bulan);
        }
        
        $this->render_page('backend/report/summary', $data);
    }

    public function export_excel(){
           $data = array( 'title' => 'Laporan Excel | Absensi',
                'karyawan' => $this->Mabsensi->semua_karyawan($lokasi_id),
                'kehadiran' => $this->Mabsensi->kehadiran($bulan));
           $this->load->view('backend/report/excel_semua_karyawan',$data);
       }


}
?>