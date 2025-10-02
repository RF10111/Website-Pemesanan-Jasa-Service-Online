<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all() {
        return $this->db->get('katalog')->result();
    }
    
    public function get_by_id($id) {
        return $this->db->get_where('katalog', ['id_katalog' => $id])->row();
    }
    
    public function create($data) {
        return $this->db->insert('katalog', $data);
    }
    
    public function update($id, $data) {
        $this->db->where('id_katalog', $id);
        return $this->db->update('katalog', $data);
    }
    
    public function delete($id) {
        return $this->db->delete('katalog', ['id_katalog' => $id]);
    }
}
