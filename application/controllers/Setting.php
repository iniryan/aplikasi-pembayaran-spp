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
    
    //halaman kelas
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            // $data['kelas'] = $this->Model->getAllKelas();
            $data['kelas'] = $this->db->query('call getAllKelas()')->result_array();


            $this->template->load('page/template', 'page/setting/setting', $data);
        }else{
            redirect('dashboard');
        }
    }

    //tambah kelas
    // public function tambah_kelas()
    // {
    //     if($this->session->userdata('level') == 'Administrator') {
    //         $this->form_validation->set_rules('nama_kelas', 'Nama_Kelas', 'required|trim|is_unique[kelas.nama_kelas]', [
    //             'required' => 'Nama Kelas diperlukan!',
    //             'is_unique' => 'Nama Kelas sudah tersedia, gunakan nama kelas lain!'
    //         ]);

    //         $this->form_validation->set_rules('kompetensi_keahlian', 'Kompetensi_Keahlian', 'required|trim', [
    //             'required' => 'Kompetensi Keahlian diperlukan!',
    //         ]);
        
    //         if ($this->form_validation->run() == false) {

    //             $data['title'] = 'Bayar SPP';
                
    //             $data['user'] = $this->Model->datauser();

    //             $this->template->load('page/template', 'page/kelas/tambahkelas', $data);
    //         } 
    //         else {

    //             $this->Model->tambah_kelas();
    //             $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data kelas berhasil ditambahkan!</div>');

    //             redirect('kelas');
	//     	}
    //     }else{
    //         redirect('dashboard');
    //     }
    // }

    //ubah kelas
    // public function ubah_kelas($id)
    // {
    //     if($this->session->userdata('level') == 'Administrator') {
    //         $data['title'] = 'Bayar SPP';
            
    //         $data['user'] = $this->Model->datauser();
    //         $data['detail'] = $this->Model->getDataKelas($id);

    //         $this->form_validation->set_rules('nama_kelas', 'Nama_Kelas', 'required|trim', [
    //             'required' => 'Nama Kelas diperlukan!'
    //         ]);

    //         $this->form_validation->set_rules('kompetensi_keahlian', 'Kompetensi_Keahlian', 'required|trim', [
    //             'required' => 'Kompetensi Keahlian diperlukan!',
    //         ]);

    //         if ($this->form_validation->run() == false) {
                
    //             $this->template->load('page/template', 'page/kelas/ubahkelas', $data);
    //         } else {
    //             $data = [
    //                 'kompetensi_keahlian' => htmlspecialchars($this->input->post('kompetensi_keahlian', true)),
    //                 'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas', true)),
    //             ];

    //             $where = [
    //                 'id_kelas' => $this->input->post('id_kelas')
    //             ];
                
    //             $this->Model->ubah_kelas($data, $where);
    //             $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data kelas berhasil diubah!</div>');

    //             redirect('kelas');
    //         }
    //     }else{
    //             redirect('dashboard');
    //     }
    // }

    //delete kelas
    // public function delete_kelas($id)
    // {
    //     if($this->session->userdata('level') == 'Administrator') {
    //         $this->Model->delete_kelas($id);
    //         $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data kelas berhasil dihapus!</div>');

    //         redirect('kelas');
    //     }else{
    //         redirect('dashboard');
    //     }
    // }

}
?>