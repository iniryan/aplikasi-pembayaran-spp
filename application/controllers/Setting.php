<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Setting extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('form_validation');
	}
    
    //halaman setting
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            $data['instansi'] = $this->Model->getInstansi();

            $this->template->load('page/template', 'page/setting/instansi', $data);
        }else{
            redirect('dashboard');
        }
    }

    //tambah instansi
    public function tambah_instansi()
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->form_validation->set_rules('nama_instansi', 'Nama_Instansi', 'required|trim|is_unique[instansi.nama_instansi]', [
                'required' => 'Nama Intansi diperlukan!',
                'is_unique' => 'Nama Instansi sudah tersedia, gunakan nama instansi lain!'
            ]);

            $this->form_validation->set_rules('alias', 'Alias', 'required|trim', [
                'required' => 'Alias diperlukan!',
            ]);
            
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
                'required' => 'Provinsi diperlukan!',
            ]);

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[instansi.email]', [
                'is_unique' => 'Email sudah digunakan, Masukkan email lain!',
                'required' => 'Email diperlukan!',
            ]);

            $this->form_validation->set_rules('website', 'Website', 'required|trim|is_unique[instansi.website]', [
                'is_unique' => 'Website sudah digunakan, Masukkan website lain!',
                'required' => 'Website diperlukan!',
            ]);
        
            if ($this->form_validation->run() == false) {

                $data['title'] = 'Bayar SPP';
                
                $data['user'] = $this->Model->datauser();

                $this->template->load('page/template', 'page/setting/tambah_instansi', $data);
            } 
            else {

                $this->Model->tambah_instansi();
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data Instansi berhasil ditambahkan!</div>');

                redirect('setting');
	    	}
        }else{
            redirect('dashboard');
        }
    }

    //ubah instansi
    public function ubah_instansi($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            $data['detail'] = $this->Model->getDataInstansi($id);

            $this->form_validation->set_rules('nama_instansi', 'Nama_Instansi', 'required|trim', [
                'required' => 'Nama Intansi diperlukan!',
            ]);

            $this->form_validation->set_rules('alias', 'Alias', 'required|trim', [
                'required' => 'Alias diperlukan!',
            ]);
            
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
                'required' => 'Provinsi diperlukan!',
            ]);

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
                'required' => 'Email diperlukan!',
            ]);

            $this->form_validation->set_rules('website', 'Website', 'required|trim', [
                'required' => 'Website diperlukan!',
            ]);
            
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                'required' => 'Alamat diperlukan!',
            ]);

            if ($this->form_validation->run() == false) {
                
                $this->template->load('page/template', 'page/setting/ubah_instansi', $data);
            } else {
                $data = [
                    'nama_instansi' => $this->input->post('nama_instansi'),
                    'alias' => $this->input->post('alias'),
                    'email' => htmlspecialchars($this->input->post('email', true)),            
                    'website' => htmlspecialchars($this->input->post('website', true)),            
                    'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),            
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                ];

                $where = [
                    'id_instansi' => $this->input->post('id_instansi')
                ];
                
                $this->Model->ubah_instansi($data, $where);
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data Instansi berhasil diubah!</div>');

                redirect('setting');
            }
        }else{
                redirect('dashboard');
        }
    }

    //delete instansi
    public function delete_instansi($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->Model->delete_instansi($id);
            $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data Instansi berhasil dihapus!</div>');

            redirect('setting');
        }else{
            redirect('dashboard');
        }
    }

    public function set_instansi($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->Model->set_instansi($id);
            $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data Instansi berhasil diset!</div>');

            redirect('setting');
        }else{
            redirect('dashboard');
        }
    }

}
?>