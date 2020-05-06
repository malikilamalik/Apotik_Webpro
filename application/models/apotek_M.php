<?php 
class apotek_M extends CI_Model{
	public function Get_all_apotek(){
		return $this->db->get('apotek')->result_array();
	}
	public function Get_apotek_byNama($nama_apotek)
    {
        $this->db->where('nama_apotek', $nama_apotek);
        return $this->db->get('apotek')->row_array();
    }

    public function Get_apotek_byId_apotek($id_apotek)
    {
        $this->db->where('id_apotek', $id_apotek);
        return $this->db->get('apotek')->row_array();
    }

    public function Insert_new_apotek($data){
		return $this->db->insert('apotek', $data);
    }
    
    public function Check_data_apotek($data)
    {
        $this->db->where('nama_apotek', $data['nama_apotek']);
		if($this->db->get('apotek')->row_array()){
            return true;
		}
		return false;
    }

    public function Hapus_apotek($id_apotek)
	{
		$this->db->where('id_apotek', $id_apotek);
        return $this->db->delete('apotek'); 

    }
    
    public function Edit_apotek($data,$id_apotek)
	{
		$this->db->where('id_apotek', $id_apotek);
		return $this->db->update('apotek', $data);
    }
}
?>