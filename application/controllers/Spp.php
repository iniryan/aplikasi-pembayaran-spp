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
        $this->load->model('Model');
        $this->load->library('form_validation');
	}
    
    //halaman spp
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            // $data['spp'] = $this->Model->getAllSpp();
            $data['spp'] = $this->db->query('call getAllSpp()')->result_array();


            $this->template->load('page/template', 'page/spp/spp', $data);
        }else{
            redirect('dashboard');
        }
    }

    //tambah spp
    public function tambah_spp()
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|max_length[4]|integer|is_unique[spp.tahun]', [
                'required' => 'Tahun harus diisi!',
                'integer' => 'Tahun harus berupa bilangan bulat',
    			'min_length' => 'Tahun kurang lebih harus 4 character!',
    			'max_length' => 'Tahun kurang lebih harus 4 character!',
                'is_unique' => 'Tahun sudah tersedia, gunakan tahun lain!'
            ]);

            $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim|numeric|integer', [
                'required' => 'Nominal harus diisi!',
                'numeric'  => 'Jumlah harus berupa angka bilangan bulat',
                'integer'  => 'Angka harus berupa bilangan bulat, tanpa karakter lainya'
            ]);
            
            if ($this->form_validation->run() == false) {

                $data['title'] = 'Bayar SPP';
                
                $data['user'] = $this->Model->datauser();
                
                $this->template->load('page/template', 'page/spp/tambahspp', $data);
            } 
            else {
                $this->Model->tambah_spp();
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data spp berhasil ditambahkan!</div>');

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

            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            $data['detail'] = $this->Model->getDataSpp($id);
            if(!$data['detail']) {
                redirect('auth');
            }else{
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
                    
                    $this->template->load('page/template', 'page/spp/ubahspp', $data);
                } else {
                    $data = [
                        'tahun' => $this->input->post('tahun', true),
                        'nominal' => $this->input->post('nominal', true),
                    ];

                    $where = [
                        'id_spp' => $this->input->post('id_spp')
                    ];
                    
                    $this->Model->ubah_spp($data, $where);
                    $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data spp berhasil diubah!</div>');

                    redirect('spp');
                }
            }
        }else{
            redirect('dashboard');
        }
    }

    //delete spp
    public function delete_spp($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $data['detail'] = $this->Model->getDataSpp($id);
            if(!$data['detail']) {
                redirect('auth');
            }else{
                $this->Model->delete_spp($id);
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data spp berhasil dihapus!</div>');

                redirect('spp');
            }
        }else{
            redirect('dashboard');
        }
    }

}
?>