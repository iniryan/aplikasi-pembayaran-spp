<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Laporan extends CI_Controller
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
			if($this->session->userdata('level') == 'Administrator') {
				$data['title'] = 'Bayar SPP';
				$data['kelas'] = $this->Model->getAllKelas();
				// $data['datafilter'] = $this->Model->getAllLaporan();

				$this->template->load('page/template', 'page/laporan/laporan', $data);
			}else{
				redirect('auth');
			}
		}else{
			redirect('auth');
		}
    }
	
    public function index_ajax($start = null)
	{
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Administrator') {
				$tgl = $this->input->post('tglPembayaran');
				$kelas = $this->input->post('kelas');

				if ($tgl != null) {
					$tglpecah = explode(" - ", $tgl);
					$start = $tglpecah[0];
					$end = $tglpecah[1];
					$awal = date('Y-m-d', strtotime($start));
					$akhir = date('Y-m-d', strtotime($end));
					$where1 = ['tgl_bayar >=' => $awal];
					$where2 = ['tgl_bayar <=' => $akhir];
				} elseif($kelas != null){
					$where1 = ['id_kelas' => $kelas];
					$where2 = '';
				} else {
					$where1 = '';
					$where2 = '';
				}
				
				$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				
				// config
				$config['base_url'] = 'laporan/index_ajax';
				$config['per_page'] = 5;
				$config['total_rows'] = $this->Model->getFilterLaporan($config['per_page'], $start, $count = true, $where1, $where2);
				
				$this->pagination->initialize($config);
				
				$data['total'] = $config['total_rows'];
				$data['datafilter'] = $this->Model->getFilterLaporan($config['per_page'], $start, $count = false, $where1, $where2);
				$data['pagelinks'] = $this->pagination->create_links();
				$this->load->view('page/laporan/table', $data);
			}else{
				redirect('auth');
			}
		}else{
			redirect('auth');
		}
	}

    public function cetak()
    {
		if($this->session->userdata('userid') != null) {
			if($this->session->userdata('level') == 'Administrator') {
				$tgl = $this->input->post('tglPembayaran');
				if ($tgl) {
					$tglpecah = explode(" - ", $tgl);
					$start = $tglpecah[0];
					$end = $tglpecah[1];
					$awal = date('Y-m-d', strtotime($start));
					$akhir = date('Y-m-d', strtotime($end));
					$where1 = ['tgl_bayar >=' => $awal];
					$where2 = ['tgl_bayar <=' => $akhir];

					$data['awal'] = $awal;
					$data['akhir'] = $akhir;
				} else {

					$data['awal'] = '';
					$data['akhir'] = '';
					$where1 = '';
					$where2 = '';
				}
				$data['title'] = "Laporan Pembayaran";
				$data['datafilter'] = $this->Model->getLaporan($where1, $where2)->result();
				$data['total'] = $this->Model->getLaporanTotal($where1, $where2)->row_array();

				$this->load->view('page/laporan/cetakLaporan', $data);

				$paper_size = 'A4';
				$orientation = 'potrait';
				$html = $this->output->get_output();
				$this->dompdf->set_paper($paper_size, $orientation);

				$this->dompdf->load_html($html);
				$this->dompdf->render();
				$this->dompdf->stream("Laporan Pembayaran.pdf", array('Attachment' => 0));
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
			if($this->session->userdata('level') == 'Administrator') {
				$data['title'] = "Kwitansi Pembayaran";
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