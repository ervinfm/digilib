<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

	function email($post){
        $this->db->from('tbl_user');
        $this->db->where('email_user', $post['email']);
        $query = $this->db->get();
        return $query;
    }

    function pass($post){
        $this->db->from('tbl_user');
        $this->db->where('email_user', $post['email']);
        $this->db->where('password_user', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    function tokens($token){
        $this->db->from('tbl_user');
        $this->db->where('_tokens', $token);
        $query = $this->db->get();
        return $query;
    }

    function user($id){
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query;
    }

    function new($post)
    {
        $params = [
            'email_user' => $post['email'],
            'password_user' => sha1($post['password'])
        ];
        $this->db->where('id_user', $post['id']);
        $this->db->update('tbl_user', $params);
    }

    function get_anggota($post)
    {
        $this->db->from('tbl_anggota');
        $this->db->where('nik_anggota', $post['id']);
        $query = $this->db->get();
        return $query;
    }

    function register($post)
    {
        $params = [
            'id_user' => $post['id_user'],
            'nama_user' => $post['nama'],
            'email_user' => $post['email'],
            'password_user' => sha1($post['password']),
            'level_user' => 2,
            'status_user' => 0,
            'is_online' => 0,
            '_tokens' => sha1($post['email']),
        ];
        $this->db->insert('tbl_user', $params);
    }

    function update_anggota($post)
    {
        $params['id_user'] = $post['id_user'];
        $this->db->where('id_anggota', $post['id_anggota']);
        $this->db->update('tbl_anggota', $params);
    }

    function aktivasi($id)
    {
        $params['status_user'] = 1;
        $this->db->where('id_user', $id);
        $this->db->update('tbl_user', $params);
    }

}