<?php 
class Resep_M extends CI_Model{
    
    public function Get_db_resep()
    {
        return $this->db->get('resep')->result_array();
    }

    public function Get_resep($id_resep)
    {
        $this->db->where('id_resep', $id_resep);
        return $this->db->get('resep')->row_array();
    }

    public function Insert_new_resep($data){
		return $this->db->insert('resep', $data);
    }
    
    public function Hapus_resep($id_resep)
	{
		$this->db->where('id_resep', $id_resep);
        return $this->db->delete('resep'); 
    }
    
    public function Edit_resep($data,$id_resep)
	{
		$this->db->where('id_resep', $id_resep);
		return $this->db->update('resep', $data);
    }
}
?>