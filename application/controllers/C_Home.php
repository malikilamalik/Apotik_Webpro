<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('User_M');
		$this->load->model('apotek_M');
	}
	
	public function index()
	{
		$this->load->view('Home/home');
	}
	
	public function login()
	{

		$data['error_message'] = '';
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$login = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
			if($this->User_M->Check_user($login)){
				$user = $this->User_M-> Get_user_byUsername($login['username']);
				if($user['aktif']){
					if($user['role'] == 'admin'){
						$this->session->set_userdata('user', $user);
						$this->session->set_userdata('status', 'login');
						redirect('Admin/index');
					}
					else if($user['role'] == 'pemilik'){
						$this->session->set_userdata('user', $user);
						redirect('Pemilik/index');
					}
					else if($user['role'] == 'apoteker'){
						$this->session->set_userdata('user', $user);
						redirect('Apoteker/index');
					}
					else if($user['role'] == 'pelayan'){
						$this->session->set_userdata('user', $user);
						$this->session->set_userdata('status', 'login');
						redirect('Pelayan/index');
					}
					else if($user['role'] == 'storage'){
						$this->session->set_userdata('user', $user);
						redirect('Storage/index');
					}
					else if($user['role'] == 'kasir'){
						$this->session->set_userdata('user', $user);
						redirect('Kasir/index');
					}
					else if($user['role'] == 'pelanggan'){
						print('pantex');
						$this->session->set_userdata('user', $user);
						redirect('Pelangan/index');
					}
				}
				else{
					$data['error_message'] = 'User Tidak Aktif';
					$this->load->view('/Home/login', $data);
				}
			}else{
				$data['error_message'] = 'Username Atau Password Salah';
				$this->load->view('/Home/login', $data);
			}
		}else {
			$this->load->view('/Home/login', $data);
		}
		
	}
	
	public function registrasi()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data = [
				"username" => $this->input->post('Username', true),
				"password" => $this->input->post('Password', true),
				"nama_depan" => $this->input->post('nama_depan', true),
				"nama_belakang" => $this->input->post('nama_belakang', true),
				"nama_tambahan" => $this->input->post('nama_tambahan', true),
				"no_telp1" => $this->input->post('no_telp1', true),
				"no_telp2" => $this->input->post('no_telp2', true),
				"alamat" => $this->input->post('alamat', true),
				"alamat_tambahan" => $this->input->post('alamat_tambahan', true),
				"kelurahan" => $this->input->post('kelurahan', true),
				"kecamatan" => $this->input->post('kecamatan', true),
				"kota" => $this->input->post('kota', true),
				"role" => 'pelanggan',
				"obat_custom" => 'false',
				"aktif" => 'true',
			];
			$this->User_M->Insert_new_user($data);
			redirect('/C_Home/login');
		}else {
			$this->load->view('/Home/registrasi');
		}
	}

	public function obat_vitamin()
	{
		$this->load->view('Home/home');
	}

	public function produk_kedokteran()
	{
		$this->load->view('Home/home');
	}

	public function produk_medis()
	{
		$this->load->view('Home/home');
	}

	public function apotek_terdekat()
	{
		$this->load->view('/Home/apotek_terdekat');
	}
	public function ambil_semua_apotek(){
		$data = $this->apotek_M->Get_all_apotek();
		echo json_encode($data);
	}
}
?>