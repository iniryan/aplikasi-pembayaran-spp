<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Petugas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
	}
    
    //halaman petugas
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['petugas'] = $this->M_Admin->getPetugas();

            $this->template->load('admin/template', 'admin/petugas/petugas', $data);
        }else{
            redirect('dashboard');
        }
    }
    
    //tambah petugas
    public function tambah_petugas()
    {
        if($this->session->userdata('level') == 'Administrator') {
            
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[petugas.username]', [
                'required' => 'Username diperlukan!',
                'is_unique' => 'Username sudah tersedia, gunakan username lain!'
            ]);

            $this->form_validation->set_rules('nama_petugas', 'Nama_Petugas', 'required|trim');

            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password_confirm]', [
                'min_length' => 'Password terlalu pendek! kurang lebih harus 8 character!',
                'matches' => 'Password tidak sama! coba lagi!'
            ]);

            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|matches[password]', [
                'matches' => 'Password tidak sama! coba lagi!'
            ]);
            
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Preparation SPP';
                $data['app'] = 'Bayar SPP';
                $data['user'] = $this->M_Admin->datauser();
                
                $this->template->load('admin/template', 'admin/petugas/tambahpetugas', $data);
            } 
            else {
                
                $this->M_Admin->tambah_petugas();
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data petugas berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                
                redirect('petugas');
            }
        }else{
            redirect('dashboard');
        }
    }
    
    //ubah petugas
    public function ubah_petugas($id)
    {
        
        if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['detail'] = $this->M_Admin->getDataPetugas($id);
            
            $this->form_validation->set_rules('username', 'Username', 'required|trim', [
                'required' => 'Username diperlukan!'
                ]);
                
            $this->form_validation->set_rules('nama_petugas', 'Nama_Petugas', 'required|trim');
            
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[password_confirm]', [
                'min_length' => 'Password terlalu pendek! kurang lebih harus 8 character!',
                'matches' => 'Password tidak sama! coba lagi!'
                ]);
                
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|matches[password]', [
                'matches' => 'Password tidak sama! coba lagi!'
                ]);
                
            if ($this->form_validation->run() == false) {
                
                $this->template->load('admin/template', 'admin/petugas/ubahpetugas', $data);
            } else {
                $pass = $this->input->post('password');
                if($pass == null){
                    $data = [
                        'username' => htmlspecialchars($this->input->post('username', true)),
                        'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                    ];
                } else{
                    $data = [
                        'username' => htmlspecialchars($this->input->post('username', true)),
                        'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
                        'password' => password_hash($pass, PASSWORD_DEFAULT),
                    ];
                }

                $where = [
                    'id_petugas' => $this->input->post('id_petugas')
                ];
                $this->M_Admin->ubah_petugas($data, $where);
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data petugas berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('petugas');
            }
        }else{
            redirect('dashboard');
        }
    }

    //delete petugas
    public function delete_petugas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {

            $this->M_Admin->delete_petugas($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data petugas berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('petugas');
        }else{
            redirect('dashboard');
        }
    }

    //blokir petugas
    public function block_petugas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {

            $this->M_Admin->block_petugas($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data petugas berhasil diblokir!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('petugas');
        }else{
            redirect('dashboard');
        }
    }

    //aktifkan petugas
    public function active_petugas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {

            $this->M_Admin->active_petugas($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data petugas berhasil diaktifkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('petugas');
        }else{
            redirect('dashboard');
        }
    }

}
?>