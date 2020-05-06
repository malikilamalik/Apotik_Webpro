<?php 
class obat_M extends CI_Model{
    
    public function Get_all_obat()
    {
        return $this->db->get('obat')->result_array();
    }


}