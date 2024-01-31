<?php
class M_User extends CI_Model
{
    // Fungsi untuk memeriksa apakah pengguna dengan username tertentu ada di database
    function check_user($username)
    {
        $this->db->where('username', $username);
        $this->db->order_by('users_name', 'ASC');
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk mengambil data pengguna berdasarkan username
    function get_user($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }

    function get_akun_karyawan()
    {
        $this->db->where('role_id', 2);
        $this->db->order_by('users_name', 'ASC');
        return $this->db->get('users')->result();
    }

    function get_user_by_id($id_users)
    {
        return $this->db->get_where('users', array('id_users' => $id_users))->row();
    }

    function search_user_karyawan($search)
    {
        $this->db->where('role_id', 2);
        $this->db->like('users_name', $search);
        $this->db->order_by('users_name', 'ASC');
        return $this->db->get('users')->result();
    }

    function add_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function delete_users($id_users)
    {
        $this->db->where('id_users', $id_users);
        return $this->db->delete('users');
    }

    function update_password($id_users, $new_password)
    {
        $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->where('id_users', $id_users);
        $this->db->update('users', array('password' => $hash_password));
    }
}