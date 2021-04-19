<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Transaksi extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
	}
    
    //halaman transaksi
    public function index()
    {
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Administrator' || $this->session->userdata('level') == 'Petugas') {
                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $data['user'] = $this->M_Admin->datauser();
                $data['siswa'] = $this->M_Admin->getSiswa();
                $data['datafilter'] = $this->M_Admin->getAllLaporan();
                $this->template->load('admin/template', 'admin/transaksi/transaksi', $data);
            }else{
                redirect('auth');
            }
        }else{
			redirect('auth');
		}
    }

    public function proses_pembayaran()
    {
        if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Administrator' || $this->session->userdata('level') == 'Petugas') {
                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $data['user'] = $this->M_Admin->datauser();
                $data['siswa'] = $this->M_Admin->getSiswa();
                $data['kelas'] = $this->M_Admin->getAllKelas();
                $data['spp'] = $this->M_Admin->getAllSpp();

                $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|integer', [
                    'required' => 'NISN harus diisi!',
                    'numeric'  => 'NISN harus berupa angka!',
                    'integer'  => 'NISN hanya berupa bilangan bulat'
                ]);
                
                $this->form_validation->set_rules('bulan_dibayar', 'bulan_dibayar', 'required|trim', [
                    'required' => 'Bulan harus diisi!'
                ]);

                $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|integer', [
                    'required' => 'Tahun harus diisi!',
                    'integer' => 'Tahun harus berupa bilangan bulat'
                ]);

                $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim|numeric|integer', [
                    'required' => 'Nominal harus diisi!',
                    'numeric'  => 'Jumlah harus berupa angka bilangan bulat',
                    'integer'  => 'Angka harus berupa bilangan bulat, tanpa karakter lainya'
                ]);
                
                $this->form_validation->set_rules('id_spp', 'Id_spp', 'required', [
                    'required' => 'SPP harus dipilih'
                ]);

                if ($this->form_validation->run() == false) {
                    
                    $this->template->load('admin/template', 'admin/transaksi/transaksi', $data);
                } 
                else {
                    $nisn = $this->input->post('nisn', true);
                    $bulan = $this->input->post('bulan_dibayar', true);
                    $tahun = $this->input->post('tahun', true);

                    $query = $this->M_Admin->validasi($nisn, $bulan, $tahun);
                    if(!$query){
                        $this->M_Admin->proses_pembayaran($data['user']['id_petugas']);
                        $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data pembayaran berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Data pembayaran gagal ditambahkan! siswa sudah membayar!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    }
                    redirect('transaksi');

                }
            }else{
                redirect('auth');
            }
        }else{
            redirect('auth');
        }
    }
}
?>