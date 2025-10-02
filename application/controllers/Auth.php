<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    
    public function admin_login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
        
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->Admin_model->login($username, $password);
            
            if ($user) {
                $session_data = [
                    'admin_id' => $user->id_admin,
                    'admin_username' => $user->username,
                    'admin_nama' => $user->nama_lengkap,
                    'admin_logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                redirect('admin');
            } else {
                $data['error'] = 'Username atau password salah!';
            }
        }
        
        $this->load->view('auth/login', isset($data) ? $data : []);
    }

    public function admin_register() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    
        if ($this->input->post()) {
            $nama = $this->input->post('nama_lengkap');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $konfirmasi = $this->input->post('konfirmasi');
    
            // Validasi
            if ($password !== $konfirmasi) {
                $data['error'] = 'Password dan konfirmasi tidak cocok!';
            } else {
                // Cek apakah username sudah dipakai
                $existing = $this->db->get_where('admin', ['username' => $username])->row();
                if ($existing) {
                    $data['error'] = 'Username sudah digunakan!';
                } else {
                    $this->Admin_model->create_admin([
                        'nama_lengkap' => $nama,
                        'username' => $username,
                        'password' => $password
                    ]);
                    $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                }
            }
        }
    
        $this->load->view('auth/register', isset($data) ? $data : []);
    }
    
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
