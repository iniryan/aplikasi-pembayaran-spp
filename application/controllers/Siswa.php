<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * author ryanadi
 */

class Siswa extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_Admin');
        $this->load->library('form_validation');
	}
    
    //halaman siswa
    public function index()
    {
	    if($this->session->userdata('level') == 'Administrator') {
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['siswa'] = $this->M_Admin->getSiswa();

            $this->template->load('admin/template', 'admin/siswa/siswa', $data);
        }else{
            redirect('dashboard');
        }
    }
    
    //tambah siswa    
    public function tambah_siswa()
    {
	    if($this->session->userdata('level') == 'Administrator') {
        
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['siswa'] = $this->M_Admin->getSiswa();
            $data['kelas'] = $this->M_Admin->getAllKelas();
            $data['spp'] = $this->M_Admin->getAllSpp();

            $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|integer|is_unique[siswa.nisn]|min_length[10]|max_length[10]', [
                'required' => 'NISN harus diisi!',
                'numeric'  => 'NISN harus berupa angka!',
                'is_unique' => 'NISN sudah terdaftar',
                'integer'  => 'NISN hanya berupa bilangan bulat',
    			'min_length' => 'NISN kurang lebih harus 10 character!',
    			'max_length' => 'NISN kurang lebih harus 10 character!',
            ]);

            $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|integer|is_unique[siswa.nis]|min_length[12]|max_length[12]', [
                'required' => 'NIS harus diisi!',
                'integer' => 'NIS hanya berupa bilangan bulat!',
                'is_unique' => 'NIS sudah terdaftar',
                'numeric'  => 'NIS harus berupa angka!',
    			'min_length' => 'NIS kurang lebih harus 12 character!',
    			'max_length' => 'NIS kurang lebih harus 12 character!',
            ]);

            $this->form_validation->set_rules('nama_siswa', 'Nama_Siswa', 'required|trim', [
                'required' => 'Nama siswa harus diisi!'
            ]);

            $this->form_validation->set_rules('no_telepon', 'No_Telepon', 'required|min_length[12]|max_length[13]', [
                'required' => 'No. Telepon harus diisi!',
    			'min_length' => 'No. Telepon harus lebih dari sama dengan 12 character!',
    			'max_length' => 'No. Telepon harus kurang dari sama dengan 13 character!',
            ]);

            $this->form_validation->set_rules('id_kelas', 'Kelas', 'required', [
                'required' => 'Kelas harus dipilih'
            ]);
            
            $this->form_validation->set_rules('id_spp', 'SPP', 'required', [
                'required' => 'SPP harus dipilih'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
                'required' => 'Alamat harus diisi!'
            ]);

            if ($this->form_validation->run() == false) {
                
                $this->template->load('admin/template', 'admin/siswa/tambahsiswa', $data);
            } 
            else {
                $this->M_Admin->tambah_siswa();
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data siswa berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('siswa');
            }
        }else{
            redirect('dashboard');
        }
    }

    //ubah siswa    
    public function ubah_siswa($nisn)
    {
	    if($this->session->userdata('level') == 'Administrator') {
        
            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['detail'] = $this->M_Admin->getAllSiswa($nisn);
            $data['siswa'] = $this->M_Admin->getSiswa();
            $data['kelas'] = $this->M_Admin->getAllKelas();
            $data['spp'] = $this->M_Admin->getAllSpp();
            
            $this->form_validation->set_rules('nisn', 'NISN', 'required|trim|numeric|integer|min_length[10]|max_length[10]', [
                'required' => 'NISN harus diisi!',
                'numeric'  => 'NISN harus berupa angka!',
                'integer'  => 'NISN hanya berupa bilangan bulat',
    			'min_length' => 'NISN kurang lebih harus 10 character!',
    			'max_length' => 'NISN kurang lebih harus 10 character!',
            ]);

            $this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|integer|min_length[12]|max_length[12]', [
                'required' => 'NIS harus diisi!',
                'integer' => 'NIS hanya berupa bilangan bulat!',
                'numeric'  => 'NIS harus berupa angka!',
    			'min_length' => 'NIS kurang lebih harus 12 character!',
    			'max_length' => 'NIS kurang lebih harus 12 character!',
            ]);

            $this->form_validation->set_rules('nama_siswa', 'Nama_Siswa', 'required|trim', [
                'required' => 'Nama siswa harus diisi!'
            ]);

            $this->form_validation->set_rules('no_telepon', 'No_Telepon', 'required|min_length[12]|max_length[13]', [
                'required' => 'No. Telepon harus diisi!',
    			'min_length' => 'No. Telepon harus lebih dari sama dengan 12 character!',
    			'max_length' => 'No. Telepon harus kurang dari sama dengan 13 character!',
            ]);

            $this->form_validation->set_rules('id_kelas', 'Kelas', 'required', [
                'required' => 'Kelas harus dipilih'
            ]);
            
            $this->form_validation->set_rules('id_spp', 'SPP', 'required', [
                'required' => 'SPP harus dipilih'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
                'required' => 'Alamat harus diisi!'
            ]);

            if ($this->form_validation->run() == false) {
                
                $this->template->load('admin/template', 'admin/siswa/ubahsiswa', $data);
            } 
            else {
                $data = [
                    'nis' => $this->input->post('nis', true),
                    'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
                    'no_telepon' => $this->input->post('no_telepon', true),
                    'id_kelas' => $this->input->post('id_kelas', true),
                    'id_spp' => $this->input->post('id_spp', true),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true))
                ];
                
                $where = [
                    'nisn' => $this->input->post('nisn', true),
                ];
                
                $this->M_Admin->ubah_siswa($data, $where);
                $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data siswa berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('siswa');
            }
        }else{
            redirect('dashboard');
        }
    }

    //detail siswa    
    public function detail_siswa($nisn)
    {   
	    if($this->session->userdata('level') == 'Administrator') {

            $data['title'] = 'Preparation SPP';
            $data['app'] = 'Bayar SPP';
            $data['user'] = $this->M_Admin->datauser();
            $data['detail'] = $this->M_Admin->getAllSiswa($nisn);
            $this->template->load('admin/template', 'admin/siswa/detailsiswa', $data);
        }else{
            redirect('dashboard');
        }
    }

    //delete siswa
    public function delete_siswa($nisn)
    {
	    if($this->session->userdata('level') == 'Administrator') {

            $this->M_Admin->delete_siswa($nisn);
            $this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Data siswa berhasil dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('siswa');
        }else{
            redirect('dashboard');
        }
    }

}
?>