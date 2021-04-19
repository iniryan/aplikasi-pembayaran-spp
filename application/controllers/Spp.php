<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Spp extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
	}
    
    //halaman spp
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['spp'] = $this->M_Admin->getAllSpp();

            $this->template->load('admin/template', 'admin/spp/spp', $data);
        }else{
            redirect('dashboard');
        }
    }

    //tambah spp
    public function tambah_spp()
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|max_length[4]|integer', [
                'required' => 'Tahun harus diisi!',
                'integer' => 'Tahun harus berupa bilangan bulat',
    			'min_length' => 'Tahun kurang lebih harus 4 character!',
    			'max_length' => 'Tahun kurang lebih harus 4 character!',

            ]);

            $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim|numeric|integer', [
                'required' => 'Nominal harus diisi!',
                'numeric'  => 'Jumlah harus berupa angka bilangan bulat',
                'integer'  => 'Angka harus berupa bilangan bulat, tanpa karakter lainya'
            ]);
            
            if ($this->form_validation->run() == false) {

                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $data['user'] = $this->M_Admin->datauser();
                
                $this->template->load('admin/template', 'admin/spp/tambahspp', $data);
            } 
            else {
                $this->M_Admin->tambah_spp();
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data spp berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('spp');
            }
        }else{
            redirect('dashboard');
        }
    }

    //ubah spp
    public function ubah_spp($id)
    {
        if($this->session->userdata('level') == 'Administrator') {

            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['detail'] = $this->M_Admin->getDataSpp($id);

            $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|max_length[4]|integer', [
                'required' => 'Tahun harus diisi!',
                'integer' => 'Tahun harus berupa bilangan bulat',
    			'min_length' => 'Tahun kurang lebih harus 4 character!',
    			'max_length' => 'Tahun kurang lebih harus 4 character!',

            ]);

            $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim|numeric|integer', [
                'required' => 'Nominal harus diisi!',
                'numeric'  => 'Jumlah harus berupa angka bilangan bulat',
                'integer'  => 'Angka harus berupa bilangan bulat, tanpa karakter lainya'
            ]);

            if ($this->form_validation->run() == false) {
                
                $this->template->load('admin/template', 'admin/spp/ubahspp', $data);
            } else {
                $data = [
                    'tahun' => $this->input->post('tahun', true),
                    'nominal' => $this->input->post('nominal', true),
                ];

                $where = [
                    'id_spp' => $this->input->post('id_spp')
                ];
                
                $this->M_Admin->ubah_spp($data, $where);
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data spp berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('spp');
            }
        }else{
            redirect('dashboard');
        }
    }

    //delete spp
    public function delete_spp($id)
    {
        if($this->session->userdata('level') == 'Administrator') {

            $this->M_Admin->delete_spp($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data spp berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('spp');
        }else{
            redirect('dashboard');
        }
    }

}
?>