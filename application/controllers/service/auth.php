<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class auth extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url'));
		}
		
		function index()
		{
				
			if($_POST)
			{
				$this->load->model('admin/queries', 'admin_db');

				if($this->admin_db->login_query())
					{
						foreach ($this->admin_db->login_query() as $row)
						{
						    $user 	= $row->user;
						    $id 	= $row->id;
						    $status = $row->status;
						}
						
						$newdata = array(
							   'id'		   => $id,
			                   'username'  => $user,
			                   'status'    => $status
			               );
						
						$this->session->set_userdata($newdata);
						if($status==1)
						{
							redirect('admin');
						}else
						{
							redirect('/');
						}
					}else{
						$error['fail'] = $this->lang->line('error_login');
						$this->session->set_userdata($error);
						redirect($this->input->post('referer'));
						//$this->load->view('admin/header');
						$this->load->view('admin/login_form', $error);
						//$this->load->view('admin/footer');
					}
			}else
			{
				redirect('/');
			}
		}

		function logout()
		{
			$array_items = array('id' => '', 'username' => '', 'status' => '');
			$this->session->unset_userdata($array_items);
			redirect('/');
		}
		
	}
?>