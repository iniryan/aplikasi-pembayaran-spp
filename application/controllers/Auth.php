<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim' );
		$this->form_validation->set_rules('password', 'Password', 'required|trim' );
		
		if ($this->form_validation->run() == false) {
			if($this->session->userdata('userid') == null) {
				$data['title'] = "Bayar SPP";

				$this->load->view('page/login', $data);
			} else {
				redirect('dashboard');
			} 
		} else {			
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->Model->getUsername($username);
		$nisn = $this->Model->getNisn($username);
		
			if ($user){
				if($user['level'] == 'Administrator' || $user['level'] == 'Petugas') {
					if ($user['status'] == 1){
						if (password_verify($password, $user['password'])){
							$data = [
								'userid' => $user['id_petugas'],
								'username' => $user['username'],
								'nama_petugas' => $user['nama_petugas'],
								'level' => $user['level'],
								'status' => $user['status'],
							];
							$this->session->set_userdata($data);
							redirect('dashboard');
						}else{
							$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Coba lagi!! Password salah!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('auth');
						}
					}else{
						if (password_verify($password, $user['password'])){
							$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">Akun Anda telah diblock oleh Administator!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('auth');
						}else{
							$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Coba lagi!! Password salah!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('auth');
						}
					}
				}else{
					redirect('auth');
				}
			}elseif($nisn){
				if ($nisn['dihapus'] == 0){
					if ($password == $nisn['nisn']){
						$data = [
							'userid' => $nisn['nisn'],
							'username' => $nisn['nis'],
							'nama_petugas' => $nisn['nama_siswa'],
							'level' => 'Siswa',
							'status' => $nisn['dihapus'],
						];
						$this->session->set_userdata($data);
						redirect('dashboard');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Coba lagi!! Password salah!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Akun tidak terdaftar!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('auth');
				}
			}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Akun tidak terdaftar!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('auth');
				}
	}	

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Berhasil Logout!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('auth');
	}
	
}
?>