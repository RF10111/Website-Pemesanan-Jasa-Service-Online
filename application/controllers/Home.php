<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Katalog_model');
        $this->load->model('Settings_model');
    }
    
    public function index() {
        $data['katalog'] = $this->Katalog_model->get_all();
        $data['settings'] = $this->Settings_model->get_settings();
        $this->load->view('user/home', $data);
    }
}
