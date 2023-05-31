<?php
class M_Jabatan extends CI_Model
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

    function get_jabatan_gaji($id_karyawan)
    {
        $this->db->select('jabatan_gaji_pokok, jabatan_gaji_makan, jabatan_gaji_transportasi');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            return array(
                'jabatan_gaji_pokok' => $result->jabatan_gaji_pokok,
                'jabatan_gaji_makan' => $result->jabatan_gaji_makan,
                'jabatan_gaji_transportasi' => $result->jabatan_gaji_transportasi
            );
        } else {
            return array(
                'jabatan_gaji_pokok' => 0,
                'jabatan_gaji_makan' => 0,
                'jabatan_gaji_transportasi' => 0
            );
        }
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
