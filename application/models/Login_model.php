<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
Class Login_model extends CI_Model{
    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('users');

        $this->db->where('email',$data['username']);
        $this->db->where('password',$data['password']);
        $this->db->limit(1);

        $query=$this->db->get();
        //   echo $this->db->last_query; exit;
        if($query->num_rows()> 0){
            return true;

        }else{
            return false;
        }



    }
}