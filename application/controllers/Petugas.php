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
        $this->load->model('Model');
        $this->load->library('form_validation');
	}
    
    //halaman petugas
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            // $data['petugas'] = $this->Model->getPetugas();
            $data['petugas'] = $this->db->query('call getPetugas()')->result_array();


            $this->template->load('page/template', 'page/petugas/petugas', $data);
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

            $this->form_validation->set_rules('nama_petugas', 'Nama_Petugas', 'required|trim',[
                'required' => 'Nama Petugas diperlukan!'
            ]);

            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password_confirm]', [
                'min_length' => 'Password terlalu pendek! kurang lebih harus 8 character!',
                'matches' => 'Password tidak sama! coba lagi!'
            ]);

            $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'trim|matches[password]', [
                'matches' => 'Password tidak sama! coba lagi!'
            ]);
            
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Bayar SPP';
                
                $data['user'] = $this->Model->datauser();
                
                $this->template->load('page/template', 'page/petugas/tambahpetugas', $data);
            } 
            else {
                
                $this->Model->tambah_petugas();
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data petugas berhasil ditambahkan!</div>');
                
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
            $data['title'] = 'Bayar SPP';
            
            $data['user'] = $this->Model->datauser();
            $data['detail'] = $this->Model->getDataPetugas($id);
            if(!$data['detail']) {
                redirect('auth');
            }else{
                $this->form_validation->set_rules('username', 'Username', 'required|trim', [
                    'required' => 'Username diperlukan!'
                ]);
                    
                $this->form_validation->set_rules('nama_petugas', 'Nama_Petugas', 'required|trim',[
                    'required' => 'Nama Petugas diperlukan!'
                ]);
                            
                $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[password_confirm]', [
                    'min_length' => 'Password terlalu pendek! kurang lebih harus 8 character!',
                    'matches' => 'Password tidak sama! coba lagi!'
                ]);
                    
                $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'trim|matches[password]', [
                    'matches' => 'Password tidak sama! coba lagi!'
                ]);
                    
                if ($this->form_validation->run() == false) {
                    
                    $this->template->load('page/template', 'page/petugas/ubahpetugas', $data);
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
                    $this->Model->ubah_petugas($data, $where);
                    $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data petugas berhasil diubah!</div>');

                    redirect('petugas');
                }
            }
        }else{
            redirect('dashboard');
        }
    }

    //delete petugas
    public function delete_petugas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $data['detail'] = $this->Model->getDataPetugas($id);
            if(!$data['detail']) {
                redirect('auth');
            }else{
                $this->Model->delete_petugas($id);
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data petugas berhasil dihapus!</div>');

                redirect('petugas');
            }
        }else{
            redirect('dashboard');
        }
    }

    //blokir petugas
    public function block_petugas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $data['detail'] = $this->Model->getDataPetugas($id);
            if(!$data['detail']) {
                redirect('auth');
            }else{
                $this->Model->block_petugas($id);
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data petugas berhasil diblokir!</div>');

                redirect('petugas');
            }
        }else{
            redirect('dashboard');
        }
    }

    //aktifkan petugas
    public function active_petugas($id)
    {
        if($this->session->userdata('level') == 'Administrator') {
            $data['detail'] = $this->Model->getDataPetugas($id);
            if(!$data['detail']) {
                redirect('auth');
            }else{
                $this->Model->active_petugas($id);
                $this->session->set_flashdata('message', '<div id="pesan" class="alert alert-success mx-auto" role="alert">Data petugas berhasil diaktifkan!</div>');

                redirect('petugas');
            }
        }else{
            redirect('dashboard');
        }
    }

}
?>