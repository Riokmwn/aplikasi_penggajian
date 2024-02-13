<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reset extends CI_Controller
{
    public function index()
    {
        $this->db->query("TRUNCATE kehadiran");
        $this->db->query("TRUNCATE rekap_gaji_karyawan");
        //$this->db->query("TRUNCATE karyawan");
       // $this->db->query("DELETE FROM users WHERE `id_users` > 1");
        redirect('AbsensiController/');
    }
}
