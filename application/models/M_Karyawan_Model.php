<?php
class M_Karyawan_Model extends CI_Model
{
    function get_all_karyawan()
    {
        return $this->db->get('karyawan')->result();
    }

    function get_karyawan_by_nik($nik_karyawan)
    {
        return $this->db->get_where('karyawan', array('nik_karyawan' => $nik_karyawan))->row();
    }

    function add_karyawan($data)
    {
        return $this->db->insert('karyawan', $data);
    }

    function delete_karyawan($nik_karyawan)
    {
        $this->db->where('nik_karyawan', $nik_karyawan);
        return $this->db->delete('karyawan');
    }
}
