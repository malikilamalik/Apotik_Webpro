<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->model('User_M');
        $this->load->model('apotek_M');
        $user = $this->session->userdata('user');
        if(($this->session->userdata('status') != "login") || ($user['role'] != 'admin')){
            $this->session->sess_destroy();
            redirect(base_url("C_Home/login"));
		}
	}
	
	public function index()
	{
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$this->load->view('Admin/home',$data);
	}
	public function user_profile()
	{
		$user = $this->session->userdata('user');
		$data['user'] = $this->User_M->Get_user_byUserId($user['user_id']);
		$this->load->view('Admin/user',$data);
	}
	public function edit_user($user_id)
	{
		$data['user'] = $this->User_M->Get_user_byUserId($user_id); // Menampung value return dari fungsi getDataByNoinduk ke variabel data
		$this->load->view('Admin/user_edit', $data);

	}
	public function ubah()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$user_id = $this->input->post('user_id', true);
			$data = [
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
			];
			$this->User_M->Edit_user($data,$user_id);
			redirect('Admin/user_profile');
		}
	}
	//data apotek
	public function Ambil_Semua_User()
	{
		$data = $this->User_M->Get_all_user(); // Menampung value return dari fungsi getData ke variabel data
        echo json_encode($data);
	}
	public function Ambil_User()
	{
		$user_id = $this->input->post('user_id'); //Menangkap inputan user_id
        $data = $this->User_M->Get_user_byUserId($user_id); // Menampung value return dari fungsi user ke variabel data
        echo json_encode($data); // Mengencode variabel data menjadi json format
	}
	function hapusUser(){
        $user_id = $this->input->post('user_id');
        $data = $this->User_M->Hapus_user($user_id);
	}
	function NonaktifkanUser(){
        $user_id = $this->input->post('user_id');
        $data = $this->User_M->Nonaktifkan_user($user_id);
	}
	function aktifkanUser(){
        $user_id = $this->input->post('user_id');
        $data = $this->User_M->Aktifkan_user($user_id);
	}
	function ResetPassword(){
        $user_id = $this->input->post('user_id');
        $data = $this->User_M->Reset_password($user_id);
	}
	function perbaruiPassword(){
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');
        $data = $this->User_M->Ganti_password($user_id,$password);
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
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
				"role" => $this->input->post('role', true),
				"obat_custom" => 'false',
				"aktif" => 'true',
			];
			$this->User_M->Insert_new_user($data);
			redirect('/Admin');
		}else {
			$this->load->view('/Admin/registrasi');
		}
	}

	function Apotek(){
		$this->load->view('Admin/apotek');
	}
	public function ambil_semua_apotek_admin(){
		$data = $this->apotek_M->Get_all_apotek();
		echo json_encode($data);
	}
	function hapusApotek(){
        $id_apotek = $this->input->post('id_apotek');
        $data = $this->apotek_M->Hapus_apotek($id_apotek);
	}

	public function ambil_apotek()
	{
		$id_apotek = $this->input->post('id_apotek'); 
        $data = $this->apotek_M->Get_apotek_byId_apotek($id_apotek); 
        echo json_encode($data); // 
	}

	public function daftar_apotek()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data = [
				"nama_apotek" => $this->input->post('nama_apotek', true),
				"jalan" => $this->input->post('jalan', true)
			];$this->apotek_M->Insert_new_apotek($data);
			redirect('/Admin/apotek');
		}else {
			$this->load->view('/Admin/daftar_apotek');
		}
	}
	public function edit_apotek($id_apotek)
	{
		$data['apotek'] = $this->apotek_M->Get_apotek_byId_apotek($id_apotek);
		$this->load->view('Admin/apotek_edit', $data);

	}
}
?>