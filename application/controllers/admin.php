<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class admin extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library(array('session', 'pagination'));
			$this->lang->load('admin', $this->session->userdata('idioma'));
			$this->load->helper(array('form', 'url', 'custom', 'date'));
			$this->load->database();
			date_default_timezone_set('GMT');
		}
		
		function index()
		{
				$this->load->model('admin/queries', 'admin_db');

			if($this->session->userdata('status') == 1)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/index');
				$this->load->view('admin/footer');				
			}else
			{
				$error['fail'] = '';
				$this->load->view('admin/login_form', $error);
				
			}

		}

		function videos()
		{
			
			if($this->session->userdata('status') == 1)
			{	
				$this->load->view('admin/header');
				$this->load->view('admin/videos');
				$this->load->view('admin/footer');
				
			}else
			{
				$error['fail'] = '';
				$this->load->view('admin/login_form', $error);
				
			}

		}

		function usuarios()
		{
			if($this->session->userdata('status') == 1)
			{	
				if($this->uri->segment(3)=="views")
				{
					
					$this->load->view('admin/header');
					$query = $this->db->query("SELECT * FROM usuarios WHERE id = '".$this->uri->segment(4)."'");
					foreach ($query->result() as $row) 
					{
						if($row->status < 4)
						{
							$thme = "user";
						}else{
							$thme = "pro";
						}

						$this->load->view('admin/usuarios_form_'.$thme, $row);
					}
					$this->load->view('admin/footer');
				}
				elseif($this->uri->segment(3)=="buscar")
				{

				}else
				{
					$this->load->view('admin/header');
					$this->load->view('admin/usuarios');
					$this->load->view('admin/footer');
				}
				
			}else
			{
				$error['fail'] = '';
				$this->load->view('admin/login_form', $error);
				
			}
		}
		
		function galeria()
		{
			if($this->session->userdata('status') == 1)
			{	
				if($this->uri->segment(3)=="view")
				{
					$this->load->view('admin/header');
					$this->load->view('admin/galeria_view');
					$this->load->view('admin/footer');
				}
				elseif($this->uri->segment(3)=="user")
				{
					$this->load->view('admin/header');
					$this->load->view('admin/galeria_user');
					$this->load->view('admin/footer');
				}
				elseif($this->uri->segment(3)=="control")
				{
					if($this->input->post('control')==3)
					{
						remove_image($this->input->post('id'));
						redirect('admin/galeria/ok');
					}else
					{
						$this->active = $this->input->post('control');
						$this->db->update('galeria', $this, array('id' => $this->input->post('id')));
						redirect('admin/galeria/');
					}
					
				}
				elseif($this->uri->segment(3)=="buscar")
				{
					$this->load->view('admin/header');
					$this->load->view('admin/galeria_buscar');
					$this->load->view('admin/footer');
				}else
				{
					$this->load->view('admin/header');
					$this->load->view('admin/galeria');
					$this->load->view('admin/footer');
				}
				
			}else
			{
				$error['fail'] = '';
				$this->load->view('admin/login_form', $error);
				
			}
		}

		function stats()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/stats');
			$this->load->view('admin/footer');
		}

		function panel()
		{
			//$this->load->view('admin/header');
			$this->load->view('admin/panel');
			//$this->load->view('admin/footer');
		}

		function delete()
		{
			if($this->uri->segment(3)=="user")
			{
				$this->db->query("DELETE FROM `usuarios` WHERE `id` = '".$this->uri->segment(4)."'");
				@$this->db->query('DELETE FROM galeria WHERE author = "'.$this->uri->segment(4).'"');
				@$this->db->query('DELETE FROM actividad WHERE autor = "'.$this->uri->segment(4).'"');
				@$this->db->query('DELETE FROM mensajeria WHERE para = "'.$this->uri->segment(4).'"');
				@$this->db->query('DELETE FROM friend WHERE iduser = "'.$this->uri->segment(4).'" OR idfriend = "'.$this->uri->segment(4).'"');
				@$this->db->query('DELETE FROM perfil_visita WHERE id_padre = "'.$this->uri->segment(4).'"');
				redirect('/admin');
				//$this->db->query("DELETE FROM `webcam`.`galeria` WHERE `author` = '".$this->uri->segment(4)."'");				
			}
		}

		function user()
		{
			if($this->uri->segment(3))
			{
				

				$this->db->query("UPDATE usuarios SET ".item_post('user').",
													  ".item_post('name').",
													  ".item_post('apellido').",
													  ".item_post('fnacimiento', 'json').",
													  ".item_post('email').",
													  ".item_post('soy').",
													  ".item_post('orientacion').",
													  ".item_post('pais').",
													  ".item_post('estado').",
													  ".item_post('idiomas', 'json').",
													  ".item_post('frasedia').",
													  ".item_post('look').",
													  ".item_post('raza').",
													  ".item_post('estatura').",
													  ".item_post('peso').",
													  ".item_post('complexion').",
													  ".item_post('ojos').",
													  ".item_post('pelo').",
													  ".item_post('vello').",
													  ".item_post('largopolla').",
													  ".item_post('grosopolla').",
													  ".item_post('circunci').",
													  ".item_post('piercing').",
													  ".item_post('tatus').",
													  ".item_post('armario').",
													  ".item_post('situacion').",
													  ".item_post('actitud').",
													  ".item_post('busco').",
													  ".item_post('quebusco', 'json').",
													  ".item_post('tabaco').",
													  ".item_post('alcohol').",
													  ".item_post('drogas').",
													  ".item_post('aficiones', 'json').",
													  ".item_post('fidelidad').",
													  ".item_post('rol').",
													  ".item_post('sexosegur').",
													  ".item_post('tipochico', 'json').",
													  ".item_post('fetiches', 'json').",
													  ".item_post('psexuales', 'json').",
													  ".item_post('tsitio').",
													  ".item_post('ttsitio').",
													  ".item_post('hotel').",
													  ".item_post('thotel').",
													  ".item_post('viajes').",
													  ".item_post('roll').",
													  ".item_post('especial')."
													  WHERE id = '".$_POST['id']."'");
				redirect('admin/usuarios/views/'.$_POST['id']);
			}
		}

		function update()
		{

							$query = $this->db->query("SELECT * FROM actividad ORDER BY id DESC LIMIT 0,10");
							foreach ($query->result() as $item):
						echo '
						<div class="activity">
							<label>'; echo mdate('%d/%m/%Y', $item->fecha); echo '</label>
							<div style="display: inline;">'; echo anchor('admin/usuarios/views/'.$item->autor, get_user($item->autor)); echo '</div>
							<div style="display: inline;">'; echo $this->lang->line("activity_".$item->action); echo '</div>';
							
								if($item->alter!=0):
							
							echo '<div style="display: inline;"> '; echo anchor('admin/usuarios/views/'.$item->alter, get_user($item->alter)); echo '</div>';
							endif;
						
								if($item->status!=0):
							
							echo '<div style="display: inline;" class="status"> '; echo tipo_cuenta($item->status); echo ' </div>';
							endif;
						echo '</div>';
						endforeach;
		}
	}
?>