<?php
class M_Data_Gaji extends CI_Model
{
    function get_all_rekap_gaji()
    {
        $this->db->select('karyawan.id_karyawan, karyawan.*, jenis_kelamin.*, jabatan.*, status_karyawan.*, rekap_absen.rekap_absen_hadir, rekap_absen.rekap_absen_telat, rekap_absen.rekap_absen_izin, rekap_absen.rekap_absen_sakit, rekap_absen.rekap_absen_tidak_hadir, rekap_gaji.*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        $this->db->join('rekap_gaji', 'karyawan.id_karyawan = rekap_gaji.karyawan_id');
        $this->db->group_by('karyawan.id_karyawan, rekap_gaji.rekap_gaji_bulan, rekap_gaji.rekap_gaji_tahun');
        $query = $this->db->get();
        return $query->result();
    }

    function get_data_gaji_by_month_year($selectedMonth, $selectedYear)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        $this->db->join('rekap_gaji', 'karyawan.id_karyawan = rekap_gaji.karyawan_id');
        $this->db->where('rekap_gaji_bulan', $selectedMonth);
        $this->db->where('rekap_gaji_tahun', $selectedYear);
        $query = $this->db->get();

        return $query->result();
    }

    function check_data_existence($selectedMonth, $selectedYear)
    {
        $this->db->where('rekap_gaji_bulan', $selectedMonth);
        $this->db->where('rekap_gaji_tahun', $selectedYear);
        $query = $this->db->get('rekap_gaji');

        return $query->num_rows() > 0;
    }

    function search_data_gaji($search)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        $this->db->join('rekap_gaji', 'karyawan.id_karyawan = rekap_gaji.karyawan_id');
        $this->db->like('nik_karyawan', $search);
        $this->db->or_like('karyawan_nama', $search);
        $query = $this->db->get();

        return $query->result();
    }

    function add_rekap_gaji($data)
    {
        return $this->db->insert_batch('rekap_gaji', $data);
    }

    function delete_rekap_gaji($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun)
    {
        $this->db->where('rekap_gaji.karyawan_id', $id_karyawan);
        $this->db->where('rekap_gaji.rekap_gaji_bulan', $rekap_absen_bulan);
        $this->db->where('rekap_gaji.rekap_gaji_tahun', $rekap_absen_tahun);
        return $this->db->delete('rekap_gaji');
    }
}
