<?php
class M_Karyawan_Model extends CI_Model
{
    function get_all_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $query = $this->db->get();
        return $query->result();
    }

    function get_karyawan_by_id($id_karyawan)
    {
        return $this->db->get_where('karyawan', array('id_karyawan' => $id_karyawan))->row();
    }

    function add_karyawan($data)
    {
        return $this->db->insert('karyawan', $data);
    }

    function delete_karyawan($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->delete('karyawan');
    }
}
