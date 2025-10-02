<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Katalog_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Settings_model');
        
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }
    
    public function index() {
        redirect('admin/dashboard');
    }
    
    public function dashboard() {
        $data['total_katalog'] = count($this->Katalog_model->get_all());
        $data['total_pesanan'] = count($this->Pesanan_model->get_all_with_katalog());
        $data['pesanan_terbaru'] = array_slice($this->Pesanan_model->get_all_with_katalog(), 0, 5);
        $this->load->view('admin/dashboard', $data);
    }
    
    // KATALOG MANAGEMENT
    public function katalog() {
        $data['katalog'] = $this->Katalog_model->get_all();
        $this->load->view('admin/katalog/index', $data);
    }
    
    public function katalog_add() {
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/katalog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
            
            $data = [
                'nama_layanan' => $this->input->post('nama_layanan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];
            
            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] = $this->upload->data('file_name');
            }
            
            if ($this->Katalog_model->create($data)) {
                $this->session->set_flashdata('success', 'Katalog berhasil ditambahkan!');
            }
            redirect('admin/katalog');
        }
        
        $this->load->view('admin/katalog/add');
    }
    
    public function katalog_edit($id) {
        $data['katalog'] = $this->Katalog_model->get_by_id($id);
        
        if (!$data['katalog']) {
            show_404();
        }
        
        if ($this->input->post()) {
            $update_data = [
                'nama_layanan' => $this->input->post('nama_layanan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];
            
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './uploads/katalog/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('gambar')) {
                    // Delete old image
                    if ($data['katalog']->gambar != 'default.jpg') {
                        unlink('./uploads/katalog/' . $data['katalog']->gambar);
                    }
                    $update_data['gambar'] = $this->upload->data('file_name');
                }
            }
            
            if ($this->Katalog_model->update($id, $update_data)) {
                $this->session->set_flashdata('success', 'Katalog berhasil diupdate!');
            }
            redirect('admin/katalog');
        }
        
        $this->load->view('admin/katalog/edit', $data);
    }
    
    public function katalog_delete($id) {
        $katalog = $this->Katalog_model->get_by_id($id);
        if ($katalog) {
            if ($katalog->gambar != 'default.jpg') {
                unlink('./uploads/katalog/' . $katalog->gambar);
            }
            
            if ($this->Katalog_model->delete($id)) {
                $this->session->set_flashdata('success', 'Katalog berhasil dihapus!');
            }
        }
        redirect('admin/katalog');
    }
    
    // PESANAN MANAGEMENT
    public function pesanan() {
        $data['pesanan'] = $this->Pesanan_model->get_all_with_katalog();
        $this->load->view('admin/pesanan/index', $data);
    }
    
    public function pesanan_edit($id) {
        $data['pesanan'] = $this->Pesanan_model->get_by_id($id);
        
        if (!$data['pesanan']) {
            show_404();
        }
        
        if ($this->input->post()) {
            $update_data = [
                'status_pesanan' => $this->input->post('status_pesanan'),
                'catatan' => $this->input->post('catatan')
            ];
            
            if ($this->Pesanan_model->update($id, $update_data)) {
                $this->session->set_flashdata('success', 'Status pesanan berhasil diupdate!');
            }
            redirect('admin/pesanan');
        }
        
        $this->load->view('admin/pesanan/edit', $data);
    }
    
    public function pesanan_delete($id) {
        if ($this->Pesanan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Pesanan berhasil dihapus!');
        }
        redirect('admin/pesanan');
    }
    
    // SETTINGS MANAGEMENT
    public function profil() {
        if ($this->input->post()) {
            $data = [
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'instagram' => $this->input->post('instagram'),
                'facebook' => $this->input->post('facebook'),
                'linkedin' => $this->input->post('linkedin'),
                'alamat' => $this->input->post('alamat')
            ];
            
            if ($this->Settings_model->update_settings($data)) {
                $this->session->set_flashdata('success', 'Profil website berhasil diupdate!');
            }
            redirect('admin/profil');
        }
        
        $data['settings'] = $this->Settings_model->get_settings();
        $this->load->view('admin/profil/index', $data);
    }
    
    // LAPORAN
    public function laporan() {
        $data['laporan_status'] = $this->Pesanan_model->get_laporan();
        $data['laporan_bulanan'] = $this->Pesanan_model->get_monthly_report();
        $this->load->view('admin/laporan/index', $data);
    }
}
