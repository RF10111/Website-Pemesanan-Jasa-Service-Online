<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_with_katalog() {
        $this->db->select('p.*, k.nama_layanan, k.harga');
        $this->db->from('pesanan p');
        $this->db->join('katalog k', 'p.id_katalog = k.id_katalog');
        $this->db->order_by('p.created_at', 'DESC');
        return $this->db->get()->result();
    }
    
    public function get_by_id($id) {
        return $this->db->get_where('pesanan', ['id_pesanan' => $id])->row();
    }
    
    public function create($data) {
        return $this->db->insert('pesanan', $data);
    }
    
    public function update($id, $data) {
        $this->db->where('id_pesanan', $id);
        return $this->db->update('pesanan', $data);
    }
    
    public function delete($id) {
        return $this->db->delete('pesanan', ['id_pesanan' => $id]);
    }
    
    public function get_laporan() {
        $this->db->select('status_pesanan, COUNT(*) as jumlah');
        $this->db->group_by('status_pesanan');
        return $this->db->get('pesanan')->result();
    }
    
    public function get_monthly_report() {
        $this->db->select('
            MONTH(p.created_at) as bulan,
            YEAR(p.created_at) as tahun,
            COUNT(*) as jumlah,
            SUM(k.harga) as total_penghasilan
        ');
        $this->db->from('pesanan p');
        $this->db->join('katalog k', 'k.id_katalog = p.id_katalog');
        $this->db->where('p.status_pesanan', 'Selesai'); // hanya pesanan selesai yang dihitung penghasilannya
        $this->db->group_by('YEAR(p.created_at), MONTH(p.created_at)');
        $this->db->order_by('tahun DESC, bulan DESC');
        $results = $this->db->get()->result();
    
        // Konversi angka ke nama bulan Indonesia
        $bulanIndo = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
    
        foreach ($results as $r) {
            $r->nama_bulan = $bulanIndo[(int)$r->bulan] . ' ' . $r->tahun;
        }
    
        return $results;
    }
    
    
}
