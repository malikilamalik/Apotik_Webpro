<?php 
class obat_M extends CI_Model{
    
    public function Get_all_obat()
    {
        return $this->db->get('obat')->result_array();
    }

    public function Insert_new_obat($data){
		return $this->db->insert('obat', $data);
    }
    
    public function Get_obat_byId($id_obat)
    {
        $this->db->where('id_obat', $id_obat);
        return $this->db->get('obat')->row_array();
    }
    
    public function Hapus_obat($id_obat)
	{
		$this->db->where('id_obat', $id_obat);
        return $this->db->delete('obat'); 

    }
    
    public function Edit_obat($data,$id_obat)
	{
		$this->db->where('id_obat', $id_obat);
		return $this->db->update('obat', $data);
    }
}