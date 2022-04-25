<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function user_register($input){
		$this->load->helper('site_helper');
		$encrypt_password = bCrypt($input['password'],12);
		$array_user = array(
				'username' => $input['username'],
				'password' => $encrypt_password,
				'active_since' => date('Y-m-d')
			);

		$this->db->insert('tbl_user', $array_user);
	}

	public function exist_row_check($field,$data){
		$this->db->where($field,$data);
		$this->db->from('tbl_user');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_user_detail($username){
		$this->db->where("username", $username);
		$query = $this->db->get('tbl_user');

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
                    $sess = array(
                        'username' => $row->username,
                        'password' => $row->password,
                        'nama'     => $row->nama,
                        'img_user'   => $row->img_user,
                        'user_id'   => $row->user_id
                    );
                    $this->session->set_userdata($sess);
                }
			$data = $query->row();
			$query->free_result();
		}
		else{
		redirect(base_url('front/index'));
		}

		return $data;
	}



}