<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reset extends CI_Controller
{
    public function index()
    {
        $this->db->query("TRUNCATE kehadiran");
        redirect('AbsensiController/');
    }
}
