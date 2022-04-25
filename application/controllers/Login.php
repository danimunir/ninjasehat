<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function index(){
		$data['ipaddres'] = $this->getUserIP();
		$this->load->view('admin/login',$data);
	}
	public function cekuser(){
    $username = strtolower($this->input->post('username'));
    $ambil = $this->db->query('select * from tbl_user where username_user = "'.$username.'"')->row_array();
    $password = $this->input->post('password');
    if (password_verify($password,$ambil['password_user'])) {
    	$this->db->where('username_user',$username);
        $query = $this->db->get('tbl_user');
            foreach ($query->result() as $row) {
                $sess = array(
                	'kd_user' => $row->kd_user,
                    'username_user' => $row->username_user,
                    'password_user' => $row->password_user,
                    'nama_user'     => $row->nama_user,
                    'img_user'	=> $row->img_user,
                    'email_user'   => $row->email_user,
                    'telpon_user'   => $row->telpon_user,
                    'alamat_user'	=> $row->alamat_user,
                    'level'	=> $row->level_user
                );
                // die(print_r($sess));
                $this->session->set_userdata($sess);
                redirect('front');
            }
    }else{
    	$this->session->set_flashdata('message', 'swal("Gagal", "Email/Password Salah", "error");');
    	redirect('login');
    	}
	}
	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
        
    }
    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
    public function daftar(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_user.username_user]',array(
			'required' => 'Email Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
			'required' => 'Email Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah user';
			$this->load->view('tambahuser',$data);
		} else {
			// die(print_r($_POST));
			$kode = $this->get_kod();
			$data = array(
				'kd_user' => $kode,
				'nama_user' => $this->input->post('name'),
				'email_user'		 => $this->input->post('email'),
				'no_hp_user'	=> $this->input->post('no_hp'),
				'img_user'		=> 'assets/dist/img/default.png',
				'username_user' => strtolower($this->input->post('username')),
				'password_user' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_user'	=> $this->input->post('level'),
				'create_date_user' => time()
				 );
			// die(print_r($data));
			$this->db->insert('tbl_user', $data);
    		redirect('admin');
		}

	}
	function get_kod(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_user,3)) AS kd_max FROM tbl_user");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "A".$kd;
        }
}