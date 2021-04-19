<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim' );
		$this->form_validation->set_rules('password', 'Password', 'required|trim' );
		
		if ($this->form_validation->run() == false) {
			if($this->session->userdata('userid') == null) {
				$data['title'] = "Preparation SPP";
				$data['app'] = "Bayar SPP";
				$this->load->view('login/login_header', $data);
				$this->load->view('login/login');
				$this->load->view('login/login_footer');
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
		$user = $this->M_Admin->getUsername($username);
		$nisn = $this->M_Admin->getNisn($username);
		
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

	public function registration()
	{
		
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
					
					$data['title'] = "Preparation SPP";
					$data['app'] = "Bayar SPP";
					$this->load->view('login/login_header', $data);
			$this->load->view('login/register');
			$this->load->view('login/login_footer');
		} 
		else {
			$this->M_Admin->registration();
			$this->session->set_flashdata('message', '<div class="alert alert-success mx-auto alert-dismissible fade show" role="alert">Selamat, akun telah dibuat! Silahkan login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('auth');
		}
	}
}

?>