<?php 
class Transaksi_M extends CI_Model{
    
    public function Get_db_transaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function Get_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('transaksi')->row_array();
    }

    public function Insert_new_transaksi($data){
		return $this->db->insert('transaksi', $data);
    }
    
    public function Hapus_transaksi($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
        return $this->db->delete('transaksi'); 
    }
    
    public function Edit_transaksi($data,$id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->update('transaksi', $data);
    }

    public function Check_resep($data)
    {
        $this->db->where('id_resep', $data['id_resep']);
        if($this->db->get('resep')->row_array()){
            return true;
        }
        return false;
    }

}
?>