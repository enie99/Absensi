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
        // $this->load->library('MyPHPMailer'); // load library

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

        $data['lokasi'] = $cabang;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['karyawan'] = $karyawan;
        $data['data']=$this->Mabsensi->get_cabang();
        $data['absensi']=$this->Mabsensi->pencarian_d($cabang,$bulan,$tahun,$karyawan);
        $this->render_page('backend/report/filter_absensi',$data);
    }


    public function summary()
    {
        $id = $_SESSION['user']['perusahaan_id'];
        $data['cabang'] = $this->Mabsensi->semua_cabang($id);
        if ($this->input->post()) { //Perintah yg dijalankan saat user mengklik lokasi perusahaan yg dipilih
            $input = $this->input->post();
            $lokasi_id = $input['lokasi_id'];
            $bulan = date('m');
            $tahun = date('Y');

            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['lokasi_id'] = $lokasi_id;
            $data['lokasi'] = $this->Mabsensi->lokasi_by_id($lokasi_id);
            $data['jml_hari_kerja'] = $this->Mabsensi->jml_hari_kerja($lokasi_id, $bulan, $tahun);
            $data['presensi'] = $this->Mabsensi->presensi_per_karyawan($bulan, $tahun);
            $data['kehadiran'] = $this->Mabsensi->kehadiran($bulan, $tahun);
        }
        elseif ($this->input->get()) //Perintah yg dijalankan saat tombol cari diklik (methode formnya "GET")
        { 
            $input = $this->input->get();
            $lokasi_id = $input['lokasi_id'];
            if (!empty($this->input->get('cari'))) 
            {
                $bulan = $input['bulan'];
                $tahun = $input['tahun'];
            }
            elseif (!empty($this->input->get('reset'))) 
            {
                $bulan = date('m');
                $tahun = date('Y');
            }
            else
            {
                echo "Pencarian tidak diketahui";
            }
            
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['lokasi_id'] = $lokasi_id;
            $data['lokasi'] = $this->Mabsensi->lokasi_by_id($lokasi_id);
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['jml_hari_kerja'] = $this->Mabsensi->jml_hari_kerja($lokasi_id, $bulan, $tahun);
            $data['presensi'] = $this->Mabsensi->presensi_per_karyawan($bulan, $tahun);
            $data['kehadiran'] = $this->Mabsensi->kehadiran($bulan, $tahun);
        }
        else //Perintah yg dijalankan pada saat user belum mengklik lokasi perusahaan
        { 
            $lokasi_id = "";
            $data['lokasi'] = "";
            $bulan = date('m');
            $tahun = date('Y');

            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['karyawan'] = $this->Mabsensi->semua_karyawan($lokasi_id);
            $data['kehadiran'] = $this->Mabsensi->kehadiran($bulan,$tahun);
        }
        
        $this->render_page('backend/report/summary', $data);
    }

   public function export_excel($lokasi_id, $bulan, $tahun){
            $data = array( 'title' => 'Laporan Excel | Absensi',
                'karyawan' => $this->Mabsensi->semua_karyawan($lokasi_id),
                'kehadiran' => $this->Mabsensi->kehadiran($bulan, $tahun),
                'lokasi_by_id' => $this->Mabsensi->lokasi_by_id($lokasi_id),
                'jml_hari_kerja' => $this->Mabsensi->jml_hari_kerja($lokasi_id, $bulan, $tahun),
                'presensi' => $this->Mabsensi->presensi_per_karyawan($bulan, $tahun),
                'bulan' => $bulan,
                'tahun' => $tahun);
           $this->load->view('backend/report/excel_semua_karyawan',$data);
       }

    public function detail($karyawan_id, $bulan){
        $data['detail_data'] = $this->Mabsensi->detail($karyawan_id);
        $data['detail_data_absensi'] = $this->Mabsensi->detail_absensi($karyawan_id, $bulan);
        $data['bulan'] = $bulan;
        $this->render_page('backend/report/detail', $data);
    }

    // public function send_email(){
    //     $this->load->view('backend/send_email_karyawan');
    // }

    // function sendEmail()
    // {
    //     $this->load->library('email');
    //     $this->email->from('hilo73ch@gmail.com'); //change it
    //     $this->email->to('enieyuliani.99@gmail.com'); //change it
    //     // $this->email->subject($subject);
    //     // $this->email->message($body);
    //     $this->email->subject("TES EMAIL");
    //     $this->email->message("Tes send email");

    //     if ($this->email->send())
    //     {
    //         $data['success'] = 'Yes'; 
    //     } 
    //     else 
    //     {
    //         $data['success'] = 'No'; 
    //         $data['error'] = $this->email->print_debugger(array('headers'));
    //     }

    //   echo " < pre > ";
    //   print_r($data);
    //   echo " < / pre > ";
    // }

    public function export_excel_karyawan($lokasi,$bulan,$tahun,$karyawan){
        $nama = str_replace("%20", " ", $karyawan); 
        $data = array( 'title' => 'Report Absensi Karyawan',
        'lokasi_by_id' => $this->Mabsensi->lokasi_by_id($lokasi),
        'bulan' => $bulan,
        'tahun' => $tahun,
        'user' => $this->Mabsensi->absensi_perorangan($lokasi,$bulan,$tahun,$nama));
       $this->load->view('backend/report/excel_karyawan',$data);
    }

    function emailSend(){
        $fromEmail = "hilo73ch@gmail.com";
        $isiEmail = "Isi email tulis disini";
        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $fromEmail;  // alamat email kamu
        $mail->Password   = "sismart16";            // password GMail
        $mail->SetFrom('info@yourdomain.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = "Subjek email";
        $mail->Body       = $isiEmail;
        $toEmail = "enieyuliani.99@gmail.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
       
        if(!$mail->Send()) {
            echo "Eror: ".$mail->ErrorInfo;
        } else {
            echo "Email berhasil dikirim";
        }
    }

}
?>