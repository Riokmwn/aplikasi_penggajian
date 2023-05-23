<?php
class M_Jenis_Kelamin_Model extends CI_Model
{
    public function get_jenis_kelamin()
    {
        return $this->db->get('jenis_kelamin')->result();
    }
}
