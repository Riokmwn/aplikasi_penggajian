<?php
class M_Rekap_Absen extends CI_Model
{
    function get_all_rekap_absen()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_rekap_absen_by_id_bulan_tahun($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('rekap_absen.rekap_absen_bulan', $rekap_absen_bulan);
        $this->db->where('rekap_absen.rekap_absen_tahun', $rekap_absen_tahun);

        return $this->db->get()->row();
    }

    function add_rekap_absen($data)
    {
        return $this->db->insert_batch('rekap_absen', $data);
    }

    function delete_rekap_absen($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun)
    {
        $this->db->where('rekap_absen.karyawan_id', $id_karyawan);
        $this->db->where('rekap_absen.rekap_absen_bulan', $rekap_absen_bulan);
        $this->db->where('rekap_absen.rekap_absen_tahun', $rekap_absen_tahun);
        return $this->db->delete('rekap_absen');
    }
}
