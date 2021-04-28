<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Histori extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('form_validation');
	}
    
    //halaman laporan
	public function index()
    {
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator') {
				$data['title'] = 'Bayar SPP';			
				$data['datafilter'] = $this->Model->getAllLaporan();

				$this->template->load('page/template', 'page/transaksi/histori', $data);
			}else{
				redirect('auth');
			}
		}else{
			redirect('auth');
		}
    }

	public function cetak_nota($id)
    {
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Petugas' || $this->session->userdata('level') == 'Administrator') {
				$data['title'] = "Kwitansi Pembayaran";
				$data['sekolah'] = "SEKOLAH MENENGAH KEJURUAN NEGERI 4 MALANG";
				$data['kwitansi'] = $this->Model->cetakNota($id);
				$this->load->view('page/laporan/kwitansi', $data);

				$paper_size = 'A5';
				$orientation = 'landscape';
				$html = $this->output->get_output();
				$this->dompdf->set_paper($paper_size, $orientation);

				$this->dompdf->load_html($html);
				$this->dompdf->render();
				$this->dompdf->stream("Kwitansi Pembayaran.pdf", array('Attachment' => 0));
			}else{
				redirect('auth');
			}
		}else{
			redirect('auth');
		}  
	}
    
}
?>