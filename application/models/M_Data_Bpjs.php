<?php
class M_Data_Bpjs extends CI_Model
{
    function get_all_bpjs()
    {
        return $this->db->get('bpjs')->result();
    }

    function add_bpjs($data)
    {
        return $this->db->insert('bpjs', $data);
    }

    function get_bpjs_by_id($id_bpjs)
    {
        return $this->db->get_where('bpjs', array('id_bpjs' => $id_bpjs))->row();
    }

    function delete_bpjs($id_bpjs)
    {
        $this->db->where('id_bpjs', $id_bpjs);
        return $this->db->delete('bpjs');
    }
}
