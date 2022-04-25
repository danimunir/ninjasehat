<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
        $username = $this->session->userdata('username_user');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
	public function index(){
		$data['artikel'] = $this->db->query(" SELECT * from tbl_post");
		$data['comment'] = $this->db->query(" SELECT * from testi");
		$data['user'] = $this->db->query(" SELECT * from tbl_user");
		$data['title'] = 'Dashboard';
		// die(var_dump($data));
		$this->load->view('admin/index',$data);
	}
	public function tambah_artikel(){
		$data = array(
			'title' => 'Tambah Artikel',
			'category' => $this->db->query('select * from tbl_ctgry'),
			 );
		// die(print_r($data));
		$this->load->view('admin/tambah_artikel',$data);
	}
	public function insert_artikel(){
				// die(print_r($_POST));
				$this->load->helper('slug');
				$config['upload_path'] = './assets/images/artikel/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('userfile')){
					$upload_data = $this->upload->data();
					$featured_image = '/assets/images/artikel/'.$upload_data['file_name'];					
					$data = array(
							'title' => 	$this->input->post('title'),
							'author' => $this->input->post('author'),
							'date' => date('Y-m-d'),
							'content' => $this->input->post('contents'),
							'featured_image' => $featured_image,
							'slug' => 	slug($this->input->post('title')),
							'category' => implode(' ',$this->input->post('category'))
						);
					// die(print_r($data));
					$this->db->insert('tbl_post', $data);
					$this->session->set_flashdata('message', 'swal("Berhasil", "Artikel Baru Berhasil Di Tambah Kan", "success");');
					redirect('front/daftar_artikel','refresh');
					}else{
					$this->session->set_flashdata('message', 'swal("Gagal", "Artikel Gagal Di Tambah Kan", "error");');
					redirect('front/daftar_artikel','refresh');
					}
	}
	public function upload_image(){
	$this->load->library('upload');
    if(isset($_FILES["image"]["name"])){
        $config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('image')){
            $this->upload->display_errors();
            return FALSE;
        }else{
            $data = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '90%';
            $config['width']= 800;
            $config['height']= 800;
            $config['new_image']= './assets/images/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            echo base_url().'assets/images/'.$data['file_name'];
        }
    }
	}
	function delete_image(){
    $src = $this->input->post('src');
    $file_name = str_replace(base_url(), '', $src);
    if(unlink($file_name)){
        echo 'File Delete Successfully';
    }
	}
	public function daftar_artikel(){
		$this->load->model('Post_model');
		$this->load->library('pagination');

		$config['base_url'] = base_url('front/daftar_artikel/hal/');
		$config['total_rows'] = $this->Post_model->total_rows('tbl_post');
		$config['per_page'] = 10;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#">';
		$config['cur_tag_close']='</a></li>';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>';
		
		$this->pagination->initialize($config);		

		$limit = $config['per_page'];
		$offset = (int) $this->uri->segment(4);

		$data = array(
				'record' => $this->Post_model->read('tbl_post', $limit, $offset),
				'pagination' => $this->pagination->create_links(),
				'title' => 'List Artikel'
			);
		// die(print_r($data));7
		$this->load->view('admin/daftar_artikel', $data);
	}

	public function edit_artikel($id=0){
		$this->load->helper('form');
		$this->load->library('form_validation');		
		$this->load->model('Post_model');
		if ($this->form_validation->run() == false) {
			$data = array(
					'title' => 'Edit Artikel',
					'record' => $this->Post_model->edit($id, 'tbl_post')
				);
			// die(print_r($data));
			$this->load->view('admin/edit_artikel', $data);
		} else {
			# code...
		}
	}

	public function update_artikel(){

			$this->load->model('Post_model');

			$config['upload_path'] = './assets/images/artikel/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			// $config['max_size'] = 300;
			// $config['max_width'] = 1024;
			// $config['max_height'] = 768;

			$this->load->library('upload', $config);
			if($this->upload->do_upload('userfile')){
				$upload_data = $this->upload->data();
				$featured_image = '/assets/images/artikel/'.$upload_data['file_name'];
				$id = $this->input->post('ID');
				$data = array(
						'title' => 	$this->input->post('title'),
						'author' => $this->input->post('author'),
						'date' => date('Y-m-d'),
						'content' => $this->input->post('content'),
						'featured_image' => $featured_image
					);
				$this->Post_model->update($id,$data,'tbl_post');
				$this->session->set_flashdata('message', 'swal("Berhasil", "Terima Kasih Atas Kritiknya", "success");');
				redirect('front/daftar_artikel');
			}else{
				$this->session->set_flashdata('message', 'swal("Gagal", "Artikel Gagal Di Edit Kan", "error");');
				redirect('front/daftar_artikel');
		}

		
	}

	public function delete_artikel($id=0){
		$this->load->model('Post_model');
		$this->Post_model->delete($id,'tbl_post');
		$this->session->set_flashdata('message','swal("Berhasil", "Data Berhasil Di Hapus", "success");');
		redirect(base_url('front/daftar_artikel'));
	}

		public function daftar_testimoni(){
		$this->load->model('Post_model');
		$this->load->library('pagination');

		$config['base_url'] = base_url('front/daftar_testimoni/hal/');
		$config['total_rows'] = $this->Post_model->total_rows('testi');
		$config['per_page'] = 5;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#">';
		$config['cur_tag_close']='</a></li>';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>';
		
		$this->pagination->initialize($config);		

		$limit = $config['per_page'];
		$offset = (int) $this->uri->segment(4);

		$data = array(
				'record' => $this->Post_model->readtesti('testi', $limit, $offset),
				'pagination' => $this->pagination->create_links(),
				'title' => 'List Kritik'
			);

		$this->load->view('admin/daftar_testimoni', $data);
	}

	public function deletetesti($id=0){
		$this->load->model('Post_model');
		$this->Post_model->deletetesti($id,'testi');
		$this->session->set_flashdata('message','swal("Berhasil", "Data Berhasil Di Hapus", "success");');
		redirect(base_url('front/daftar_testimoni'));
	}
	public function daftar_user(){
		echo "Coming Soon";
	}
	public function daftar_tentang(){

		$data['tentang']= $this->db->query('select * from tentang');
		$data = array(
			'tentang' => $this->db->query('select * from tentang'),
			'title' => 'About Me'
			 );
		//die(print_r($data));
		$this->load->view('admin/daftar_tentang',$data);
	}
	public function edit_tentang($id=0){
		//die(print_r($data));
		$this->load->model('Post_model');
		$this->load->library('form_validation');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Edit tentang',
				'edit' => $this->Post_model->tentang($id),
				 );
			die(print_r($data));
			$this->load->view('admin/edit_tentang',$data);
		} else {
			# code...
		}				
	}
	public function update_tentang(){
	$config['upload_path'] = './assets/images/tentang/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	
	$this->load->library('upload', $config);
	if ( ! $this->upload->do_upload('userfile')){
		$error = array('error' => $this->upload->display_errors());
		$this->session->set_flashdata('message', 'swal("Gagal", "Perubahan Tentang Gagal", "error");');
		redirect('front/daftar_tentang','refresh');
	}
	else{
		$upload_data = $this->upload->data();
		$featured_image = '/assets/images/tentang/'.$upload_data['file_name'];
		$where = array('kd_tent' => $this->input->post('ID') );
		$data = array(
			'nama_tent' => $this->input->post('nama'),
			'desc_tent' => $this->input->post('desc'),
			'img_tent'  => $featured_image
		);
		$this->db->update('tentang',$data,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Perubahan Tentang Berhasil", "success");');
	  	redirect('front/daftar_tentang','refresh');					
	}
  }
  public function tambah_katagori(){
  	// echo print_r($_POST);
  	$data = array(
  		'ID' => "",
  		'category' => $this->input->post('katagori') 
  	);
  	$res = $this->db->insert('tbl_ctgry',$data);
  	if ($res >= 1) {
  		$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Tambah Katagori", "success");');
  		redirect('front/tambah_artikel');
  	}else{
  		echo "bangsatkau";
  	}
  }
}