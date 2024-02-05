<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library(array());
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function index()
    {
        $data['judul'] = 'Absensi';
        $data['bulan'] = $_POST['bulan'] ?? date('m');
        $data['tahun'] = $_POST['tahun'] ?? date('Y');
        $data['karyawan_id'] = $_POST['karyawan_id'] ?? 0;
        $data['karyawan'] = $this->db->get('karyawan')->result();
        $data['absensi'] = $this->generateAbsensi($data['bulan'], $data['tahun'], $data['karyawan_id']);

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/absensi/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function generateAbsensi($bulan, $tahun, $karyawan_id)
    {
        return $this->db->query("
        SELECT
        id_karyawan,
        DATE( A.waktu_checkin ) AS tanggal,
        MAX(TIME_FORMAT( A.waktu_checkin, '%H:%i:%s' )) AS waktu_checkin,
        ( SELECT TIME_FORMAT( waktu_checkout, '%H:%i:%s' ) FROM kehadiran WHERE waktu_checkin = MAX( A.waktu_checkin ) LIMIT 1 ) AS waktu_checkout,
        CASE
            WHEN MAX(TIME_FORMAT( A.waktu_checkin, '%H:%i:%s' )) > '08:10:00'
            THEN 1
            ELSE 0 
        END AS parameter_telat,
        CASE
            WHEN MAX(TIME_FORMAT( A.waktu_checkout, '%H:%i:%s' )) < '17:00:00'
            THEN 1
            ELSE 0
        END AS parameter_checkout_awal,
        CASE WHEN TIME( A.waktu_checkout ) < '18:00:00'
            THEN 0
            ELSE TIME_TO_SEC( A.waktu_checkout ) DIV 3600 - TIME_TO_SEC( '18:00:00' ) DIV 3600 
        END AS jumlah_jam_lembur 
    FROM
        kehadiran A
        JOIN karyawan B ON A.karyawan_id = B.id_karyawan
    WHERE
        karyawan_id = $karyawan_id
        AND MONTH ( A.waktu_checkin ) = $bulan
        AND YEAR ( A.waktu_checkin ) = $tahun
    GROUP BY
        waktu_checkin")->result();
    }

    function importAbsensi(){
        
        if (isset($_FILES["fileExcel"]["name"])) {
            $path = 'assets/uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);        
            if (!$this->upload->do_upload('fileExcel')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
                if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
                
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $flag = true;
                $i=0;
                foreach ($allDataInSheet as $value) {
                    if($flag){
                    $flag =false;
                    continue;
                    }
                    if ($value['A'] && $value['B'] && $value['C']) {
                        $insert['karyawan_id'] = $value['A'];
                        $insert['waktu_checkin'] = $value['B'];
                        $insert['waktu_checkout'] = $value['C'];
                        $this->db->insert('kehadiran', $insert);
                    }
                    $i++;
                }   
                
                return true;
      
              } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' .$e->getMessage());
            }
            }
		}

        $data['judul'] = 'Input Data Absensi';
        $data['bulan'] = $_POST['bulan'] ?? date('m');
        $data['tahun'] = $_POST['tahun'] ?? date('Y');

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/absensi/import', $data);
        $this->load->view('backend/dashboard/templates/footer');
	}
}
