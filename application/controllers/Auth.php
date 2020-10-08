<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if($this->form_validation->run()== false){
			$data['title'] = 'login page';
			$this->load->view('include/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('include/auth_footer');
		}else{
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
	
		$user = $this->db->get_where('user',['email'=> $email])->row_array();
		
		if($user){
			echo"hallo";
			if($user['is_active'] == 1){
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'id_role' => $user['id_role']
					];
					$this->session->set_userdata($data);
					redirect('user');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" 
					role="alert">Wrong Password!');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" 
				role="alert">this email has not been activated!');
				redirect('auth');
		
			}
		}
	}

	public function register()
	{
		//perhatikan baik-baik cara membuat aturan validasi
		$this->form_validation->set_rules('nama attribute name yang ada di form', 'alias nya', 'aturannya' );
		//ini contoh input Full Name
		$this->form_validation->set_rules('name', 'Name', 'required|trim' );
		//ini contoh input Email
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]' );
		//ini contoh input Password
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[repeat_password]' );
		//ini contoh input Repeat Password
		$this->form_validation->set_rules('repeat_password', 'Repeat password', 'required|trim|matches[password]' );
		
		if($this->form_validation->run() == false){
			$this->load->view('include/auth_header');
			$this->load->view('auth/register');
			$this->load->view('include/auth_footer');
			
		}else{
			$data = [
				'name' => htmlspecialchars($this->input->post('name',TRUE)),
				'email' => htmlspecialchars($this->input->post('email',TRUE)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'id_role' => 2,
				'is_active' => 1,
				'date_created' => time(),
				'date_modified' => NULL
			];

			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation! Your account has been created!');
			redirect('auth');
		}
	}

	function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');
		
		$this->session->set_flashdata('message','<div class="alert alert-danger" 
		role="alert">this email has not been activated!');
		redirect('auth');
	}


}
