<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_settings() {
        return $this->db->get_where('settings', ['id_setting' => 1])->row();
    }
    
    public function update_settings($data) {
        $this->db->where('id_setting', 1);
        $check = $this->db->get('settings')->row();
        
        if ($check) {
            return $this->db->update('settings', $data);
        } else {
            $data['id_setting'] = 1;
            return $this->db->insert('settings', $data);
        }
    }
}
