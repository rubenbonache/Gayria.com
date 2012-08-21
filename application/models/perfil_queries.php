<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class perfil_queries extends CI_Model {


        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }

        function msg_read($item)
		{
			$query = mysql_query("SELECT count(*) as total FROM mensajeria WHERE para = '".$item."' AND leido = '1'");
			while($value = mysql_fetch_array($query)) 
			{
				if($value['total']==0)
				{
					return " ";
				}else
				{
					return $value['total'];
				}
			}
		}

		function view_msg($item)
		{
			$query = $this->db->get_where('mensajeria', array('date' => $item, 'para' => $this->session->userdata('id')));
			return $query->result();
		}

		function view_msg_update($item)
		{
			$this->leido = 0;
			$this->db->update('mensajeria', $this, array('id' => $item));
		}

		function count_msg($item)
		{
			$query = mysql_query("SELECT count(*) total FROM `mensajeria` WHERE fecha = ".$item." group by para = ".$this->session->userdata('status'));
			while($query = mysql_fetch_array($query))
			{
				return $query["total"];
			}
		}

		function count_perfil($item)
		{

			$query = mysql_query("SELECT count(*) total FROM `perfil_visita` WHERE fecha = ".$item." group by id_padre = ".$this->session->userdata('status'));
			while($query = mysql_fetch_array($query))
			{
				return $query["total"];
			}
		}

		function es_visita()
		{
			$this->db->where('id_padre', $this->session->userdata('id'));
			$this->db->where('visita', $this->uri->segment(3), mdate('%d%m%Y', time()));
			$this->db->where('fecha', mdate('%d%m%Y', time()));
			$sql = $this->db->get('perfil_visita');

			if($sql->result())
			{
				return FALSE;
			}
			return TRUE;
		}

		function add_visita()
		{
			$this->id_padre = $this->session->userdata('id');
			$this->visita 	= $this->uri->segment('3');
			$this->fecha 	= mdate('%d%m%Y', time()); 
			$this->db->insert('perfil_visita', $this);
		}

		function send_msg()
		{
			$this->de 		= $this->session->userdata('id');
			$this->para 	= $this->input->post('para');
			$this->fecha 	= mdate('%d%m%Y', time());
			$this->date 	= time();
			$this->titulo 	= $this->input->post('titulo');
			$this->texto 	= $this->input->post('texto');
			$this->leido 	= 1;

			$this->db->insert('mensajeria', $this);

			activity_add($this->session->userdata('id'), 2, $this->input->post('para'));
		}

		function img_perfil()
		{
			$query = $this->db->get_where('usuarios', array('id' => $this->session->userdata('id')));
			foreach ($query->result() as $value) 
			{
				return $value->fotoperfil;
			}
		}

		function set_img()
		{
			$this->fotoperfil = $this->uri->segment(3);
			$this->db->update('usuarios', $this, array('id' => $this->session->userdata('id')));
		}

		function premium($item)
		{
			switch ($item) {
				case 'pagar':
					$this->id_padre = $this->session->userdata('id');
					$this->fecha 	= time()+2592000;
					$this->db->insert('premium', $this);
					$this->db->update('usuarios', array('status' => 3), array('id' => $this->id_padre));
					$this->session->set_userdata(array('status' => 3));
					break;
				
				case 'comprobar':
					if($this->session->userdata('status')==1)
					{

					}else{
						$sql = $this->db->get_where('premium', array('id_padre' => $this->session->userdata('id')));
						foreach ($sql->result() as $value)
						{
							if($value->fecha<time())
							{
								$this->status = 2;
								$this->db->update('usuarios', $this, array('id' => $value->id));
								$this->db->delete('premium', array('id' => $value->id));
								$this->session->set_userdata(array('status' => 2));
							}
						}						
					}
					break;
			}
		}

		function isFav()
		{
			$query = $this->db->get_where('favoritos', array('me' => $this->session->userdata('id'), 'mi_fav' => $this->uri->segment(3)));	
			return $query->result();
		}

		function favAdd()
		{
			$this->me 	= $this->session->userdata('id');
			$this->mi_fav 	= $this->uri->segment('4');
			$this->db->insert('favoritos', $this);
		}

		function favDel()
		{
			$this->db->delete('favoritos', array('me' => $this->session->userdata('id'), 'mi_fav' => $this->uri->segment(4)));
		}

		function buscar()
		{
			if($this->session->userdata('buscar'))
			{

				$query = $this->db->get_where('buscar', array('id' => $this->session->userdata('buscar')));
				foreach ($query->result() as $key) {
					return $key->params;
				}
				if($_POST)
				{
					$find = array('buscar' => '');
        			$this->session->unset_userdata($find);

        			$find = array('buscar' => md5(time()));
					$this->session->set_userdata($find);

					$search['name']			= $this->input->post('nombre');
					//$search['apellido'] 	= $this->input->post('nombre');
					$search['pais']			= $this->input->post('pais');
					$search['estado']		= $this->input->post('estado');
					$search['soy']			= $this->input->post('soy');
					$search['orientacion']	= $this->input->post('orientacion');
					$search['idiomas']		= $this->input->post('idiomas');

					$this->id 				= $this->session->userdata('buscar');
					$this->params 			= json_encode($search);

					$this->db->insert('buscar', $this);
				}

			}else{

				$find = array('buscar' => md5(time()));
				$this->session->set_userdata($find);

				$search['name']			= $this->input->post('nombre');
				//$search['apellido'] 	= $this->input->post('nombre');
				$search['pais']			= $this->input->post('pais');
				$search['estado']		= $this->input->post('estado');
				$search['soy']			= $this->input->post('soy');
				$search['orientacion']	= $this->input->post('orientacion');
				$search['idiomas']		= $this->input->post('idiomas');

				$this->id 				= $this->session->userdata('buscar');
				$this->params 			= json_encode($search);

				$this->db->insert('buscar', $this);
			}
		}

		function user_update()
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
													  WHERE id = '".$this->session->userdata('id')."'");
		}
    }
?>