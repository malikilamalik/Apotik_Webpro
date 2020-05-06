<?php

class C_ObatV extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('obat_M');
	}
	
	
    public function ubah()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$data = [
                    "id_obat" => $this->input->post('id_obat', true),
                    "nama_obat" => $this->input->post('nama_obat', true),
                    "stok" => $this->input->post('stok', true),
            ];
		}
    }
    public function index(){
        $this->load->view('obatV/index');
    }
    public function Ambil_Semua_Obat()
    {
        $data = $this->obat_M->Get_all_obat(); // Menampung value return dari fungsi getData ke variabel data
        echo json_encode($data);
    }
}