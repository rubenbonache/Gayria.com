<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_user'))
{
	function get_user($item)
	{
		$sql = mysql_query("SELECT * FROM usuarios WHERE id = '".$item."'");
		while($row = mysql_fetch_array($sql))
		{
			return $row['name'].' '.$row['apellido'];
		}
	}
}

if ( ! function_exists('get_user_img'))
{
	function get_user_img($item)
	{
		$sql = mysql_query("SELECT * FROM galeria WHERE id = '".$item."'");
		while($row = mysql_fetch_array($sql))
		{
			$sql = mysql_query("SELECT * FROM usuarios WHERE id = '".$row['author']."'");
			while($row = mysql_fetch_array($sql))
			{
				return $row['user'];
			}
		}
	}
}

if( ! function_exists('tipo_cuenta'))
{
	function tipo_cuenta($item)
	{
		$tipo_cuenta = array('1' => "Admin", '2' => "Usuario normal", '3' => "VIP Mensual", '4' => 'Chapero');
		return $tipo_cuenta[$item];
	}
}

if( ! function_exists('count_num_videos'))
{
	function count_num_videos()
	{
		$sql = mysql_query("SELECT count(id) as total FROM videos");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_usuarios'))
{
	function count_num_usuarios()
	{
		$sql = mysql_query("SELECT count(id) as total FROM usuarios WHERE status < 4");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_usuarios_find'))
{
	function count_num_usuarios_find()
	{
		$sql = mysql_query("SELECT count(id) as total FROM usuarios WHERE status < 4");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_chaperos_find'))
{
	function count_num_chaperos_find()
	{
		$sql = mysql_query("SELECT count(id) as total FROM usuarios WHERE status > 3");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_chaperos'))
{
	function count_num_chaperos()
	{
		$sql = mysql_query("SELECT count(id) as total FROM usuarios WHERE status > 3");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_chaperos'))
{
	function count_num_chaperos()
	{
		$sql = mysql_query("SELECT count(id) as total FROM usuarios WHERE status > 3");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_msg'))
{
	function count_num_msg()
	{
		$ci =& get_instance();
		$sql = mysql_query("SELECT count(*) as total FROM mensajeria WHERE para = '".$ci->session->userdata('id')."'");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_galeria_user'))
{
	function count_num_galeria_user($item = FALSE)
	{
		if($item==FALSE)
		{
			$ci =& get_instance();
			$item = $ci->session->userdata('id');
		}
		
		$sql = mysql_query("SELECT count(*) as total FROM galeria WHERE author = '".$item."'");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if( ! function_exists('count_num_galeria'))
{
	function count_num_galeria()
	{
		$sql = mysql_query("SELECT count(id) as total FROM galeria");
		while($row = mysql_fetch_array($sql))
		{
			return $row['total'];
		}
	}
}

if(	! function_exists('action_activity'))
{
	function action_activity($item)
	{
		$activity = array('0' => '', '1' => $this->lang->line("user_register"), '2' => $this->lang->line("up_photo"));
		return $activity[$item];
	}
}

if( ! function_exists('remove_image'))
{
	function remove_image($item)
	{
		$query = mysql_query("SELECT * FROM galeria WHERE id = '".$item."'");
		while ($row = mysql_fetch_array($query))
		 {
			unlink('./upload/'.$row["path"]);
			unlink('./upload/'.$row["thumb"]); 
			mysql_query('DELETE FROM galeria WHERE id = "'.$item.'"');
		}
	}
}

if( ! function_exists('activity_add'))
{
	function activity_add($id, $message, $alter = 0, $status = 0)
	{
		$fecha = time();
		mysql_query("INSERT INTO actividad VALUES ('', $id, $message, $alter, $status, $fecha)");
	}
}

if( ! function_exists('pais'))
{
	function pais($item)
	{
		$sql = mysql_query("SELECT * FROM paises WHERE id = '".$item."'");
		while($row = mysql_fetch_array($sql))
			return $row['pais'];
	}
}

if( ! function_exists('estado'))
{
	function estado($item)
	{
		$sql = mysql_query("SELECT * FROM estados WHERE id = '".$item."'");
		while($row = mysql_fetch_array($sql))
			return $row['estado'];
	}
}

if( ! function_exists('comprobar'))
{
	function comprobar($item, $array)
	{
		$array = json_decode($array, true);
		if(@in_array($item, $array))
		{
			return "si";
		}else
		{
			return "no";
		}
	}
}

if( ! function_exists('msg_leido'))
{
	function msg_leido($item)
	{
		
		if($item==1){
			return '<img src="'.base_url().'static/images/si.png"/>';
		}
	}
}

if( ! function_exists('lista'))
{
  function lista($item, $file)
  {
  	$ci =& get_instance();
    $a = json_decode($item, TRUE);
        if($a==TRUE)
          {
            foreach ($a as $value) {
              $sid = $file.$value;
              $string[] = $ci->lang->line($sid);
            }                              
            return implode(', ', $string);
          }
  }
}

if( ! function_exists('img_perfil'))
{
	function img_perfil($item)
	{
		$query = mysql_query("SELECT * FROM galeria WHERE id = '".$item."'");
		while($row = mysql_fetch_array($query)) {
			
			return $row['thumb'];
		}
	}
}

if( ! function_exists('img_perfil_exist'))
{
	function img_perfil_exist($item, $value)
	{
  		$ci =& get_instance();
  		$query = $ci->db->get_where('galeria', array('id' => $value, 'active' => 1));
  		if(!$query->result())
  		{
  			
  		}
		elseif($item==$value)
		{
			
		}else
		{
			return anchor('settings/set_img/'.$value, 'Imagen perfil', 'class="button1"');
		}
	}
}

if( ! function_exists('navigation'))
{
	function navigation($param, $item)
	{
		if($param == $item)
		{
			return 'class="current"';
		}
	}
}

if( ! function_exists('item_post'))
{

	function item_post($value, $param = '')
	{
		$ci =& get_instance();
		if($param == "json")
		{
			return $value." = '".json_encode($ci->input->post($value))."'";
		}else
		{
			if(@$ci->input->post($value))
			{
				return $value." = '".$ci->input->post($value)."'";
			}else
			{
				return $value." = ''";
			}
		}
	}
}

if( ! function_exists('get_user_activity'))
{

	function get_user_activity($value)
	{
		if( ! @$value['username'])
		{
			return anchor('#', 'Invitado');
		}else
		{
			return anchor('admin/usuarios/views/'.$value['id'], $value['username']);
		}
	}
}

if ( ! function_exists('save_image'))
{
	function save_image()
	{
		$ci =& get_instance();

		$targ_w = $targ_h = 150;
		$jpeg_quality = 90;

		$src = $ci->input->post('image');
		$img_r = imagecreatefromjpeg($src);
		$dst_r = "./uploads/".$src; //ImageCreateTrueColor( $targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,$ci->input->post('x'),$ci->input->post('y'),
		$targ_w,$targ_h,$ci->input->post('w'),$ci->input->post('h'));

		exit;
	}
}

