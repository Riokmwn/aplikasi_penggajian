<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_Email extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Data_Gaji');
    }

     public function index()
     {
        $selectedMonth = $this->input->get('bulan');
        $selectedYear = $this->input->get('tahun');
        $karyawan = $this->input->get('karyawan_id');
        $slip_gaji = $this->M_Data_Gaji->get_data_gaji_by_month_year_karyawan($selectedMonth, $selectedYear, $karyawan);
        $link = '<a href="'.base_url('C_Slip_Gaji/data_slip_gaji_print?bulan='.$selectedMonth.'&tahun='.$selectedYear.'&karyawan='.$karyawan).'">berikut</a>';
        $subject = 'Slip Gaji';
        $message = 'Yth. Bpk/Ibu. Berikut kami kirimkan slip gaji untuk bulan '.$selectedMonth.' tahun '. $selectedYear.'. Slip gaji dapat diunduh di link '.$link.'. Terimakasih';
        $to = $slip_gaji->email;

        if (!$slip_gaji->email) {
            var_dump('gaada emailnya');
            die();
        }

        $config['gmail'] = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_name' => 'PT. ANEKA HITTACINDO PRATAMA',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'studytraceriti@gmail.com',  // Email gmail
            'smtp_pass'   => 'qwwjiekubtopueyh',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
    
        $configEmail = $config['gmail'];
		get_instance()->load->library('email', $configEmail);
		get_instance()->email->from($configEmail['smtp_user'], $configEmail['smtp_name']);
		get_instance()->email->to($to);
		get_instance()->email->subject($subject);
		get_instance()->email->message($message);

		if (get_instance()->email->send()) {
			redirect('C_Data_Gaji/data_gaji');
		} else {
			echo 'Error! email tidak dapat dikirim.';
		}


     }

}