<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Dashboard extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
	}
    
	//halaman utama
	public function index()
    {
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Administrator' || $this->session->userdata('level') == 'Petugas') {
                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $data['user'] = $this->M_Admin->datauser();
                $data['siswa'] = $this->M_Admin->countSiswa();
                $data['petugas'] = $this->M_Admin->countPetugas();
                $data['transaksi'] = $this->M_Admin->countTransaksi();
                $this->template->load('admin/template', 'admin/dashboard', $data);
            }elseif($this->session->userdata('level') == 'Siswa'){
                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $nisn = $this->session->userdata('userid');
                $data['detail'] = $this->M_Admin->getAllSiswa($nisn);
                $data['datafilter'] = $this->M_Admin->getHistori($nisn);
                $this->template->load('admin/template', 'admin/dashboard_siswa', $data);
            }else{
                redirect('auth');
            }
        }else{
			redirect('auth');
		}
    }
	    
}
?>