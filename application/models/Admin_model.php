<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('admin')->row();
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
    
    public function get_admin($id) {
        return $this->db->get_where('admin', ['id_admin' => $id])->row();
    }
    
    public function update_admin($id, $data) {
        $this->db->where('id_admin', $id);
        return $this->db->update('admin', $data);
    }
    
    public function create_admin($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->insert('admin', $data);
    }
}
