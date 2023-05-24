<?php
class M_Jabatan_Model extends CI_Model
{
    public function get_jabatan()
    {
        return $this->db->get('jabatan')->result();
    }

    function add_jabatan($data)
    {
        return $this->db->insert('jabatan', $data);
    }

    function get_jabatan_by_id($id_jabatan)
    {
        return $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan))->row();
    }

    function search_jabatan($search)
    {
        $this->db->like('jabatan_nama', $search);
        return $this->db->get('jabatan')->result();
    }

    function delete_jabatan($id_jabatan)
    {
        $this->db->where('id_jabatan', $id_jabatan);
        return $this->db->delete('jabatan');
    }
}
