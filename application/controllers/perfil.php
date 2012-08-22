<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class perfil extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('session', 'pagination', 'user_agent'));
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'custom', 'date', 'string', 'text'));
			$this->load->database();
			$this->load->model('perfil_queries', 'perfil');
			$this->perfil->premium('comprobar');
			date_default_timezone_set('UTC');
			

		}
		
		function index()
		{

		}

		function pass_recovery()
		{
			$this->load->view('header');
			$this->load->view('pass_recovery');
			$this->load->view('footer');
		}

		function view()
		{
			$mobile = '';
				if($this->agent->is_mobile())
				{
					$mobile = "mobil/";
				}
			
			$this->load->view('header');
			if( ! $this->session->userdata('status'))
			{
				echo  "no se ha logueado";
			}else
			{
				if($this->perfil->count_perfil(mdate('%d%m%Y', time()))>="20" && $this->session->userdata('status')==2)
				{
					echo "Supero el limite de perfiles visitados";
				}else
				{
					$query = $this->db->get_where('usuarios', array('id' => $this->uri->segment(3)));
					foreach ($query->result() as $item) 
					{
						if($item->id==1 OR $item->id=='')
						{
							$this->load->view('perfil_no', $item);
						}else
						{
							
							$this->load->view('perfil', $item);

							if($this->perfil->es_visita())
							{
								$this->perfil->add_visita();
							}

						}
					}
				}
			}
			$this->load->view('footer');
		}

		function menu()
		{
			
			echo '<ul>
				  <li>' . anchor('perfil/me/', '<span>'.$this->lang->line('info').'</span>') . '</li>
				  <li>' . anchor('perfil/me/galeria', '<span>'.$this->lang->line('galeria').'</span>') . '</li>
				  <li>' . anchor('perfil/me/mensajeria', '<span>'.$this->lang->line('mensajeria').' '.$this->perfil->msg_read($this->session->userdata('id')).'</span>') . '</li>
				  <li>' . anchor('service/auth/logout', '<span>'.$this->lang->line('logout').'</span>') . '</li>
				  <li>'; 
			if($this->session->userdata('status')==2)
			{
				 echo anchor('premium', '<span style="color: red;">Premium</span>');
			} 
			echo '</li>
				</ul>';
		}
		function mail()
		{
			echo anchor('perfil/me/mensajeria', $this->perfil->msg_read($this->session->userdata('id')));
		}
		function me()
		{
			$mobile = '';
				if($this->agent->is_mobile())
				{
					$mobile = "mobil/";
				}
			
				$this->load->view('header');
					if($this->session->userdata('status'))
					{
						if($this->uri->segment(3)=="galeria")
						{
							if($this->uri->segment(4)=="view")
							{
								$this->load->view('perfil_galeria_view');
							}else
							if($this->uri->segment(4)=="up")
							{
								$this->load->view('perfil_galeria_up');
							}else
							{
								$this->load->view('perfil_galeria');
							}
						}elseif($this->uri->segment(3)=="mensajeria")
						{
							if($this->uri->segment(4)=="view")
							{
								if($this->perfil->view_msg($this->uri->segment(5)))
								{
									foreach ($this->perfil->view_msg($this->uri->segment(5)) as $item)
									{
										$this->perfil->view_msg_update($item->id);
										$this->load->view('perfil_mensajeria_view', $item);
									}
								}else
								{
									redirect('perfil/me/mensajeria');
								}
							}else
							{
								$this->load->view('perfil_mensajeria');
							}
						}else
						{
							if($this->input->post('submit'))
							{
							
								$this->perfil->user_update();
							}
							$query = $this->db->get_where('usuarios', array('id' => $this->session->userdata('id')));
							foreach ($query->result() as $item) 
							{
								if( $this->session->userdata('status') < 4)
								{
									$thme = 'user';
								}else
								{
									$thme = 'pro';
								}

								$this->load->view('perfil_form_'.$thme, $item);
							}
						}
					}else
					{
						$error['fail'] = '';
						$this->load->view('login_form', $error);
					}
				$this->load->view('footer');
		}
	}
?>