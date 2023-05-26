<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    // Controller methods will go here
    public function activity(){
        try{
            $this->load->library('session');
            $userId = $this->input->post('userId');
            $email = $this->input->post('email');
            
            $info = ["last_activity" => date("Y-m-d H:i:s")];
            
            $this->load->database();
            $this->db->where('email' , $email);
            $this->db->where('user_id' , $userId);
            $this->db->update('tbl_users' , $info);
            $data = ["success" => true ,"msg"=>"Successfully updated last activity"];
            $webuserdata = $this->session->userdata('webuserdata');
            $webuserdata['last_activity'] = date("Y-m-d H:i:s");
            $this->session->set_userdata('webuserdata', $webuserdata);

        $this->Return['data'] =  $data;
        }catch(Exception $e)
        {
           print_r($e->getMessage());
        }
    }
}