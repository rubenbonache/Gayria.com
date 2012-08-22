<?
$mensaje = '';

		if($this->input->post('submit'))
		{
			if(!$this->input->post('email'))
			{
				$mensaje = '<p class="titulosvideo pfinder">El campo no puede estar vacio, especifique un correo electronico valido</p>';
			}else
			if($this->perfil->email()) //comprueba si el email existe
			{
				$pass_new = time();
				$this->perfil->pass_reset($pass_new);
                    $mensaje = "Su contraseña ha sido reseteada.<br>Su nueva contraseña es <b>".$pass_new."</b><br>Una vez acceda con ella es recomendable cambiarla por otra que recuerde bien desde el panel de control";

				if(get_magic_quotes_gpc())
                    {
                        $mensaje = stripslashes($mensaje);
                    }
                    
                    $to      = $this->input->post('email');
                    $name 	 = "Gayria.com";
                    $email 	 = "contacto@gayria.com";	 
                    $subject = '[Gayria.com]: Pass reset';

                    $msg     = "De : $name \r\nEmail : $email \r\nAsunto : $subject \r\n\n" . "Mensaje : \r\n$$mensaje";
                    
                    $this->email->from($email, $name);
                    $this->email->to($to); 
                    $this->email->subject($subject);
                    $this->email->message($msg);  

                    $this->email->send();
         
                   

				$mensaje = '<p class="titulosvideo pfinder">Se ha enviado un correo electronico con la contraseña a la direccion <b>'.$this->input->post("email").'</b></p>';
			}else
			{
				$mensaje = '<p class="titulosvideo pfinder">La dirección de correo electronico no existe</p>'; // Mensaje error si no existe
			}
		}
?>
<div class="table">

<p class="titulosficha pfinder">Recuperar contraseña</p>

<p class="titulosvideo pfinder">Para recuperar tu contraseña es necesario que especifiques el correo electronico con el que se registro.</p>
<? echo $mensaje?>
<form method="POST">
	<table width="650px"><tr><td class="titulosvideo" valign="middle">Introduce el correo electronico</td><td valign="middle"><input type="text" name="email" class="field2" size="50"> <input type="submit" name="submit" value="Recuperar" class="button-1"></td></tr></table>
</form>
</div>
