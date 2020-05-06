<?php

class Apoteker extends CI_Controller {
    function __construct(){
		parent::__construct();
        $this->load->model('Resep_M');
        $this->load->model('obat_M');

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
    
    //
    public function Ambil_Semua_Obat()
    {
        $data = $this->obat_M->Get_all_obat(); // Menampung value return dari fungsi getData ke variabel data
        echo json_encode($data);
    }
    public function obat()
	{
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$this->load->view('resep/obat',$data);
    }
    public function Ambil_Obat()
    {
        $id_obat = $this->input->post('id_obat'); //Menangkap inputan user_id
        $data = $this->obat_M->Get_obat_byId($id_obat); // Menampung value return dari fungsi user ke variabel data
        echo json_encode($data); // Mengencode variabel data menjadi json format
    }
    function hapusObat(){
        $id_obat = $this->input->post('id_obat');
        $data = $this->obat_M->Hapus_obat($id_obat);
    }
    function TambahObat(){
        $id_obat = $this->input->post('id_obat');
        $stok = $this->input->post('stok');
        $data = array(
            'stok' => $stok + $this->input->post('tambah_stok') 
         );
        $data = $this->obat_M->Edit_obat($data,$id_obat);
        redirect('Apoteker/obat');
	}      
    public function TambahDataObat()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $data = array(
                'id_obat' => $this->input->post('id_obat'), 
                'nama_obat' => $this->input->post('nama_obat'), 
                'stok' => $this->input->post('stok') 
             );
			$this->obat_M->Insert_new_obat($data);
			redirect('/Apoteker/obat');
		}else {
			$this->load->view('/resep/tambah_data');
		}
	}
}