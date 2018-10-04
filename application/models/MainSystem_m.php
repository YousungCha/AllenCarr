<?php if (!defined ('BASEPATH')) exit('No direct script access allowed');
class MainSystem_m extends CI_Model 
{
    function checkExist($table, $field, $data)
    {
        $this->db->select('*');
        $this->db->where($field,$data);
        $query = $this->db->get($table);
        return $query->num_rows();
    }
    function checkEmailExist($table, $email)
    {
        $this->db->select('email');
        $this->db->where('email', $email);
        $query = $this->db->get($table);
        $result = $query->result_array();
        foreach ($result as $row)
        {
            return true;
        }        
        return false;
    }
    function setData($table, $data)
    {        
        $errMsg = $this->db->set($data);
        $errMsg = $this->db->insert($table);
        return $errMsg;
    }
    function mMemberLogin($table, $auth) 
    {
        $this->db->select('email, password');
        $this->db->where('email', $auth['email']);
        $query = $this->db->get($table);
        $result = $query->row();

        if ($result)
        {
            return password_verify($auth['password'], $result->password);
        }
        else 
        {
            return false;
        }        
    }       
}
