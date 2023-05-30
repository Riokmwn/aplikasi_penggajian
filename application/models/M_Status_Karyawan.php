<?php
class M_Status_Karyawan extends CI_Model
{
    public function get_status_karyawan()
    {
        return $this->db->get('status_karyawan')->result();
    }
}
