<?php
class M_Jenis_Kelamin extends CI_Model
{
    public function get_jenis_kelamin()
    {
        return $this->db->get('jenis_kelamin')->result();
    }
}