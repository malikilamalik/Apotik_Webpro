<?php

class Apoteker extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->model('Resep_M');

    }
    
    public function ubah()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$id_resep = $this->input->post('id_resep', true);
			$data = [
                    "id_resep" => $this->input->post('id_resep', true),
                    "isi_resep" => $this->input->post('isi_resep', true),
                    "status" => 'selesai',
			];
			$this->Resep_M->Edit_resep($data,$id_resep);
		}
    }
    
    public function index()
	{
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$this->load->view('resep/index',$data);
	}
    public function Ambil_Semua_Resep()
    {
        $data = $this->Resep_M->Get_db_resep(); // Menampung value return dari fungsi getData ke variabel data
        echo json_encode($data);
    }
    public function Ambil_User()
    {
        $id_resep = $this->input->post('id_resep'); //Menangkap inputan user_id
        $data = $this->Resep_M->Get_user_byUserId($id_resep); // Menampung value return dari fungsi user ke variabel data
        echo json_encode($data); // Mengencode variabel data menjadi json format
    }
        
    
}