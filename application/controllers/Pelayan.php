<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('Transaksi_M');
        $this->load->model('Resep_M');
        $this->load->model('User_M');
        $user = $this->session->userdata('user');
        if(($this->session->userdata('status') != "login") || ($user['role'] != 'pelayan')){
            $this->session->sess_destroy();
            redirect(base_url("C_Home/login"));
		}
	}
	
	public function index()
	{
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$this->load->view('Pelayan/home',$data);
	}

	public function profile()
	{
		$user = $this->session->userdata('user');
		$data['user'] = $this->User_M->Get_user_byUserId($user['user_id']);
		$this->load->view('Pelayan/profile',$data);
	}

	public function Get_dbuser()
	{
		$data = $this->User_M->Get_all_user();
        echo json_encode($data);
	}
	public function Get_user()
	{
		$user_id = $this->input->post('user_id');
        $data = $this->User_M->Get_user_byUserId($user_id);
        echo json_encode($data);
	}

	public function edit_profile($user_id)
	{
		$data['user'] = $this->User_M->Get_user_byUserId($user_id);
		$this->load->view('Pelayan/edit_profile', $data);

	}

	public function UpdateProfile()
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
			redirect('Pelayan/profile');
		}
	}

	function ResetPassword(){
        $user_id = $this->input->post('user_id');
        $data = $this->User_M->Reset_password($user_id);
	}

	function UpdatePassword(){
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');
        $data = $this->User_M->Ganti_password($user_id,$password);
	}

	public function InsertResep()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data = [
				"id_resep" => $this->input->post('id_resep', true),
				"isi_resep" => $this->input->post('isi_resep', true),
				"status" => "Sedang Diracik",
			];
			$this->Resep_M->Insert_new_resep($data);
			$this->load->view('/Pelayan/list_resep');
		}else {
			$this->load->view('/Pelayan/input_resep');
		}
	}



	public function EditResep($id_resep)
	{	
		$data['resep'] = $this->Resep_M->Get_resep($id_resep);
		$this->load->view('Pelayan/edit_resep', $data);
	}

	public function UpdateResep()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$id_resep = $this->input->post('id_resep', true);
			$data = [
				"isi_resep" => $this->input->post('isi_resep', true),
				"status" => $this->input->post('status', true),
			];
			$this->Resep_M->Edit_resep($data,$id_resep);
			redirect('Pelayan/ShowResep');
		}
		
	}

	public function Get_dbresep()
	{
		$data = $this->Resep_M->Get_db_resep();
        echo json_encode($data);
	}

	public function Get_idresep()
	{
		$id_resep = $this->input->post('id_resep');
        $data = $this->Resep_M->Get_resep($id_resep); 
        echo json_encode($data); 
	}

	function DeleteResep(){
        $id_resep = $this->input->post('id_resep');
        $data = $this->Resep_M->Hapus_resep($id_resep);
	}

	public function ShowResep(){
		$this->load->view('/Pelayan/list_resep');
	}

	public function InsertTransaksi()
	{
		$data['error_message'] = '';
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$validate_resep = array(
				'id_resep' => $this->input->post('id_resep'),
			);
			if($this->Transaksi_M->Check_resep($validate_resep)){
				$idresep = $this->input->post('id_resep');
		        $dataresep = $this->Resep_M->Get_resep($idresep);  				
				$isiresep = $dataresep['isi_resep'];
				$data = [
					"id_transaksi" => $this->input->post('id_transaksi', true),
					"id_resep" => $this->input->post('id_resep', true),
					"isi_resep" => $isiresep,
					"harga" => $this->input->post('harga', true),
					"status_transaksi" => $this->input->post('status_transaksi', true),
				];
				$this->Transaksi_M->Insert_new_transaksi($data);
				$this->load->view('/Pelayan/list_transaksi');
			}else{
				$data['error_message'] = 'ID Resep tidak ditemukan';
				$this->load->view('/Pelayan/error_transaksi', $data);
			}
		}else {
			$this->load->view('/Pelayan/input_transaksi');
		}
	}

	public function EditTransaksi($id_transaksi)
	{
		$data['transaksi'] = $this->Transaksi_M->Get_transaksi($id_transaksi);
		$this->load->view('Pelayan/Edit_transaksi', $data);

	}

	public function UpdateTransaksi()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$validate_resep = array(
				'id_resep' => $this->input->post('id_resep'),
			);
			$id_transaksi = $this->input->post('id_transaksi', true);
			if($this->Transaksi_M->Check_resep($validate_resep)){
				$idresep = $this->input->post('id_resep');
		        $dataresep = $this->Resep_M->Get_resep($idresep);  				
				$isiresep = $dataresep['isi_resep'];				
				$data = [
					"id_resep" => $this->input->post('id_resep', true),
					"isi_resep" => $isiresep,
					"harga" => $this->input->post('harga', true),
					"status_transaksi" => $this->input->post('status_transaksi', true),
				];
				$this->Transaksi_M->Edit_transaksi($data,$id_transaksi);
				redirect('Pelayan/ShowTransaksi');
			}else{
				$transaksi = $this->session->userdata('transaksi');
				$data['transaksi'] = $this->Transaksi_M->Get_transaksi($id_transaksi);
				$this->load->view('Pelayan/error_edit_transaksi', $data);
			}
		}
	}

	public function Get_dbtransaksi()
	{
		$data = $this->Transaksi_M->Get_db_transaksi();
        echo json_encode($data);
	}

	public function Get_idtransaksi()
	{
		$id_transaksi = $this->input->post('id_transaksi');
        $data = $this->Transaksi_M->Get_transaksi($id_transaksi); 
        echo json_encode($data); 
	}

	function DeleteTransaksi()
	{
        $id_transaksi = $this->input->post('id_transaksi');
        $data = $this->Transaksi_M->Hapus_transaksi($id_transaksi);
	}

	public function ShowTransaksi()
	{
		$this->load->view('/Pelayan/list_transaksi');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

}
?>