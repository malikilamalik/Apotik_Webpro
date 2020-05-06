<?php 
class User_M extends CI_Model{
    
    public function Get_all_user()
    {
        return $this->db->get('user')->result_array();
    }

    public function Get_user_byUsername($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user')->row_array();
    }

    public function Get_user_byUserId($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('user')->row_array();
    }

    public function Insert_new_user($data){
		return $this->db->insert('user', $data);
    }
    
    public function Check_user($data)
    {
        $this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		if($this->db->get('user')->row_array()){
            return true;
		}
		return false;
    }

    public function Hapus_user($User_id)
	{
		$this->db->where('user_id', $User_id);
        return $this->db->delete('user'); 

    }
    
    public function Edit_user($data,$User_id)
	{
		$this->db->where('user_id', $User_id);
		return $this->db->update('user', $data);
    }
    
    public function Nonaktifkan_User($User_id)
	{
        $data = array(
            'aktif' => 'false' 
         );
		$this->db->where('user_id', $User_id);
		return $this->db->update('user', $data);
    }
    public function Aktifkan_User($User_id)
	{
        $data = array(
            'aktif' => 'true' 
         );
		$this->db->where('user_id', $User_id);
		return $this->db->update('user', $data);
    }
    public function Reset_password($User_id)
	{
        $data = array(
            'password' => 'orcaninjagoesrambo' 
         );
		$this->db->where('user_id', $User_id);
		return $this->db->update('user', $data);
    }
    public function Ganti_password($User_id,$password)
	{
        $data = array(
            'password' => $password 
         );
		$this->db->where('user_id', $User_id);
		return $this->db->update('user', $data);
	}
}
?>