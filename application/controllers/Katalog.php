<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Katalog_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Settings_model');
    }
    
    public function index() {
        $data['katalog'] = $this->Katalog_model->get_all();
        $data['settings'] = $this->Settings_model->get_settings();
        $this->load->view('user/katalog', $data);
    }
    
    public function pesan($id_katalog) {
        $data['katalog'] = $this->Katalog_model->get_by_id($id_katalog);
    
        if (!$data['katalog']) {
            show_404();
        }
    
        if ($this->input->post()) {
            $pesanan_data = [
                'id_katalog' => $id_katalog,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'kontak_pelanggan' => $this->input->post('kontak_pelanggan'),
                'catatan' => $this->input->post('catatan')
            ];
    
            if ($this->Pesanan_model->create($pesanan_data)) {
                // Set flashdata untuk notifikasi sekali tampil
                $this->session->set_flashdata('success', 'Pesanan berhasil dibuat! Kami akan segera menghubungi Anda.');
                // Redirect ke halaman home atau katalog
                redirect(base_url('katalog'));
            } else {
                $data['error'] = 'Terjadi kesalahan saat membuat pesanan.';
            }
        }
    
        $this->load->view('user/pesan', $data);
    }
}
