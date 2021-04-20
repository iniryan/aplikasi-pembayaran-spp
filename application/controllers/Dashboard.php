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
        $this->load->model('Model');
        $this->load->library('form_validation');
	}
    
	//halaman utama
	public function index()
    {
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Administrator' || $this->session->userdata('level') == 'Petugas') {
                $data['title'] = 'Bayar SPP';
                
                $data['user'] = $this->Model->datauser();
                $data['siswa'] = $this->Model->countSiswa();
                $data['petugas'] = $this->Model->countPetugas();
                $data['transaksi'] = $this->Model->countTransaksi();
                $data['histori'] = $this->Model->getAllLaporan();
                $data['last'] = $this->Model->lastTransaksi();
                $this->template->load('page/template', 'page/dashboard', $data);
            }elseif($this->session->userdata('level') == 'Siswa'){
                $data['title'] = 'Bayar SPP';
                
                $nisn = $this->session->userdata('userid');
                $data['detail'] = $this->Model->getAllSiswa($nisn);
                $data['datafilter'] = $this->Model->getHistori($nisn);
                $this->template->load('page/template', 'page/dashboard_siswa', $data);
            }else{
                redirect('auth');
            }
        }else{
			redirect('auth');
		}
    }
	    
}
?>