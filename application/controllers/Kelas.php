<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Kelas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
	}
    
    //halaman kelas
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['kelas'] = $this->M_Admin->getAllKelas();

            $this->template->load('admin/template', 'admin/kelas/kelas', $data);
        }else{
            redirect('dashboard');
        }
    }

    //tambah kelas
    public function tambah_kelas()
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->form_validation->set_rules('nama_kelas', 'Nama_kelas', 'required|trim|is_unique[kelas.nama_kelas]', [
                'required' => 'Nama Kelas diperlukan!',
                'is_unique' => 'Nama Kelas sudah tersedia, gunakan nama kelas lain!'
            ]);

            $this->form_validation->set_rules('kompetensi_keahlian', 'Kompetensi_keahlian', 'required|trim', [
                'required' => 'Kompetensi Keahlian diperlukan!',
            ]);
        
            if ($this->form_validation->run() == false) {

                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $data['user'] = $this->M_Admin->datauser();

                $this->template->load('admin/template', 'admin/kelas/tambahkelas', $data);
            } 
            else {

                $this->M_Admin->tambah_kelas();
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data kelas berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('kelas');
	    	}
        }else{
            redirect('dashboard');
        }
    }

    //ubah kelas
    public function ubah_kelas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['detail'] = $this->M_Admin->getDataKelas($id);

            $this->form_validation->set_rules('nama_kelas', 'Nama_kelas', 'required|trim', [
                'required' => 'Nama Kelas diperlukan!'
            ]);

            $this->form_validation->set_rules('kompetensi_keahlian', 'Kompetensi_keahlian', 'required|trim', [
                'required' => 'Kompetensi Keahlian diperlukan!',
            ]);

            if ($this->form_validation->run() == false) {
                
                $this->template->load('admin/template', 'admin/kelas/ubahkelas', $data);
            } else {
                $data = [
                    'kompetensi_keahlian' => htmlspecialchars($this->input->post('kompetensi_keahlian', true)),
                    'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas', true)),
                ];

                $where = [
                    'id_kelas' => $this->input->post('id_kelas')
                ];
                
                $this->M_Admin->ubah_kelas($data, $where);
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data kelas berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('kelas');
            }
        }else{
                redirect('dashboard');
        }
    }

    //delete kelas
    public function delete_kelas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $this->M_Admin->delete_kelas($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data kelas berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('kelas');
        }else{
            redirect('dashboard');
        }
    }

}
?>