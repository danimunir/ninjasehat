<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('Post_model');	
	}
	
	
	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = base_url('home/index/');
		$config['total_rows'] = $this->Post_model->total_rows('tbl_post');
		$config['per_page'] = 4;

		/* config 
		//$config['full_tag_open'] = '<ul class="pagination">';
		//$config['full_tag_close'] = '</ul>';
		$config['first_url'] = '';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		*/
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>&nbsp;';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>&nbsp;';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>&nbsp;';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#">';
		$config['cur_tag_close']='</a></li>&nbsp;';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>&nbsp;';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>&nbsp;';
		
		$this->pagination->initialize($config);		

		$limit = $config['per_page'];
		$offset = (int) $this->uri->segment(3);

		$data = array(
				'record' => $this->Post_model->read('tbl_post', $limit, $offset),
				'komentar' => $this->Post_model->read_komen('comment'),
				'pagination' => $this->pagination->create_links(),
				'katagori' => $this->db->order_by('category', 'asc')->get('tbl_ctgry')->result_array(),
				'title' => 'Ninja Sehat'
			);
		// die(print_r($data));
		$this->load->view('home',$data);
	}

	public function read($id){
		$visit = $this->db->query("select visit from tbl_post where id = '".$id."' ")->row_array();
		// implode($visit);
		$insertvisit = array(
			'visit' => $visit['visit']+1,
			);
		// die(print_r($insertvisit));
		$this->db->where('ID',$id);
		$this->db->update('tbl_post',$insertvisit);
		$data['record']=$this->Post_model->baca_artikel($id);
		$data['komentar']=$this->Post_model->read_komen($id);
		//extract($data['record']);
		$data['title'] = "Baca Selanjutnya" ;
		$data['visit'] = $this->db->query("select visit from tbl_post where id = '".$id."' ")->row_array();
		$data['katagori'] = $this->db->order_by('category', 'asc')->get('tbl_ctgry')->result_array();
		//die(print_r($data['record']));
		$this->load->view('v_single',$data);
	}

	
	public function tambah_kontak($param=NULL){
		if($param=='kirim_kontak'){
			$post = $this->input->post();			

			if(!empty($post['name_testi']) && !empty($post['email_testi']) && !empty($post['testi'])){
				$this->load->model('Post_model');

				$data = array(
						'name_testi' => $post['name_testi'],
						'email_testi' => $post['email_testi'],
						'testi' => $post['testi']
					);
				$subject = 'Hello '.$post['name_testi'];
				$message = '<h3 align="center">Terima Kasih Atas Masukan nya</h3>
				<table width="349" cellspacing="0" cellpadding="0" border="0"> <tr> <td style="vertical-align: top; text-align:left;color:#000000;font-size:12px;font-family:helvetica, arial;; text-align:left"> <span><span style="margin-right:5px;color:#000000;font-size:15px;font-family:helvetica, arial">Kelompok 3</span> </span> <br><br><br> <table cellpadding="0" cellpadding="0" border="0"><tr><td style="padding-right:5px"><a target="_blank" href="https://instagram.com/ninjasehat" style="display: inline-block"><img width="40" height="40" src="https://s1g.s3.amazonaws.com/9bfb4e4bee7656580b2a5d1a7c18c355.png" alt="Instagram" style="border:none"></a></td><td style="padding-right:5px"><a target="_blank" href="https://wa.me/+6289682261128" style="display: inline-block"><img width="40" height="40" src="https://s1g.s3.amazonaws.com/370c956cb92063dfbc131b5393411f78.png" alt="WhatsApp" style="border:none"></a></td><td style="padding-right:5px"><a target="_blank" href="https://github.com/ninjasehat" style="display: inline-block"><img width="40" height="40" src="https://s1g.s3.amazonaws.com/b0cd8b19b62e6e47e490fa93d073d360.png" alt="Github" style="border:none"></a></td><td style="padding-right:5px"><a target="_blank" href="https://facebook.com/ninjasehat" style="display: inline-block"><img width="40" height="40" src="https://s1g.s3.amazonaws.com/29bbe451b56a1f277d73dcff49b75935.png" alt="Facebook" style="border:none"></a></td><td style="padding-right:5px"><a target="_blank" href="https://twitter.com/bhysnck" style="display: inline-block"><img width="40" height="40" src="https://s1g.s3.amazonaws.com/dabe53a8cd7f2fc1b45e84fd559d8c0a.png" alt="Twitter" style="border:none"></a></td><td style="padding-right:5px"><a target="_blank" href="https://www.youtube.com/channel/UC8ThW1lZr-6_BU0nD1dvxmw" style="display: inline-block"><img width="40" height="40" src="https://s1g.s3.amazonaws.com/4cb73cdd183cb4316e8462d2caf06656.png" alt="LinkedIn" style="border:none"></a></td></tr></table><a target="_blank" href="" style="text-decoration:none;color:#3388cc">Ninja Sehat</a> </td> </tr> </table> <table width="349" cellspacing="0" cellpadding="0" border="0" style="margin-top:10px"> <tr> <td style="text-align:left;color:#aaaaaa;font-size:10px;font-family:helvetica, arial"><p>Hello World</p></td> </tr> </table>';
				$config = Array(
		      	'protocol' 	=> 'smtp',
		      	'smtp_host' => 'ssl://smtp.googlemail.com',
		      	'smtp_port' => 465,
		      	'smtp_user' => 'ninjasehat@bsi.ac.id', 
		      	'smtp_pass' => '', 
		      	'mailtype' 	=> 'html',
		      	'charset' 	=> 'iso-8859-1',
			    );
				//$file_path = 'uploads/' . $file_name;
			    $this->load->library('email', $config);
			    $this->email->set_newline("\r\n");
			    $this->email->from('cbahyu@gmail.com');
			    $this->email->to($post['email_testi']);
			    $this->email->subject($subject);
		        $this->email->message($message);
		        $this->email->send();
		        $this->session->set_flashdata('message','swal("Berhasil", "Terima Kasih Atas Kritiknya", "success");');
		        // $this->email->attach($file_data['full_path']);
		        // die(var_dump($message));

				$this->Post_model->create('testi',$data);
				redirect(base_url('home/kontak'));
			}
			else{
				$this->load->view('tambah_kontak',$data);
			}

		}
		else{
			$this->load->view('tambah_kontak');
		}		
	}
  
  	public function kontak()
	{
		$this->load->library('pagination');

		$config['base_url'] = base_url('home/testimoni/hal');
		$config['total_rows'] = $this->Post_model->total_rows('testi');
		$config['per_page'] = 5;

		/* config */
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_url'] = '';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);		

		$limit = $config['per_page'];
		$offset = (int) $this->uri->segment(3);

		$data['kontak'] = array(
				'record' => $this->Post_model->readtesti('testi', $limit, $offset),
				'pagination' => $this->pagination->create_links()
			);
		$data['title'] = "Kontak";
		$data['katagori'] = $this->db->order_by('category', 'asc')->get('tbl_ctgry')->result_array();
		$this->load->view('kontak',$data);
	}
	

	public function tambah_komentar($param=NULL){
		if($param=='kirim_komentar'){
			$post = $this->input->post();			
			$id_artikel = $this->input->post('ID');
			$data = array(
					'ID' => $id_artikel,
					'comment_name' => $post['comment_name'],
					'comment_email' => $post['comment_email'],
					'comment_body' => $post['comment_body'],
					'comment_date' => date('Y-m-d')
				);
				$this->Post_model->create('comment',$data);
				redirect(base_url('home/read/'.$id_artikel.'#komentar'));
		}
		else{
			
		}	
		
	} 
	public function tentang(){
		$data['title'] = "Tentang" ;
		$data['tentang']= $this->db->query('select * from tentang')->result_array();
		//die(print_r($data));
		$data['katagori'] = $this->db->order_by('category', 'asc')->get('tbl_ctgry')->result_array();
		$this->load->view('tentang',$data);
	}
	public function search(){
		if (isset($_GET['keyword'])) {
		  	$result = $this->Post_model->search_post($_GET['keyword']);
		   	if (count($result) > 0) {
		    foreach ($result as $row) {
		     	$data['record'][] = array(
		     		'title' => $row->title,
		     		'author' => $row->author,
		     		'content' => $row->content,
		     		'slug' => $row->slug,
		     		'date' => $row->date,
		     		'id' => $row->ID,
		     		'featured_image' => $row->featured_image,
		     		'category' => $row->category
		     	);
		 		}
		 	$data['title'] = "Search";
		 		// die(print_r($data));
		 	$data['katagori'] = $this->db->order_by('category', 'asc')->get('tbl_ctgry')->result_array();
		     $this->load->view('search', $data);
		   	}else{
		   		$this->session->set_flashdata('message','swal("Gagal Mencari", "Artikel Yang kamu cari tidak ada", "error");');
		   	 	redirect('home');
		   	}
		}
	}
	public function katagori($id){
		    $katagori = str_replace('%20', ' ', $id);
		  	$data['record'] = $this->Post_model->search($katagori);
		 	$data['title'] = "Kategori";
		 	if (count($data['record']) > 0 ) {
		 		$data['katagori'] = $this->db->order_by('category', 'asc')->get('tbl_ctgry')->result_array();
		 		$this->load->view('category', $data);
		 	}else{
		   		$this->session->set_flashdata('message','swal("Gagal Mencari", "Artikel Yang kamu cari tidak ada", "error");');
			redirect('home');		 	 
				}
		 	}
	public function getcURL($url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result,true);
	}

	

}
