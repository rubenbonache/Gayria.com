<?php



function validatePassword1($password1){
	//NO tiene minimo de 5 caracteres o mas de 12 caracteres
	if(strlen($password1) < 5 || strlen($password1) > 12)
		return false;
	// SI longitud, NO VALIDO numeros y letras
	else if(!preg_match("/^[0-9a-zA-Z]+$/", $password1))
		return false;
	// SI rellenado, SI email valido
	else
		return true;
}

function validatePassword2($password1, $password2){
	//NO coinciden
	if($password1 != $password2)
		return false;
	else
		return true;
}

function validateEmail($email){
	//NO hay nada escrito
	$sql = mysql_query("SELECT * FROM usuarios WHERE email = '".$email."'");
	if(strlen($email) == 0)
		return false;
	// SI escrito, NO VALIDO email
	else if(!filter_var($_POST['email'], FILTER_SANITIZE_EMAIL))
		return false;
	else if(mysql_num_rows($sql)==1)
		return false;
	// SI rellenado, SI email valido
	else
		return true;
}

//Comprobacion de datos
//variables valores por defecto
$password1 		= "";
$password2 		= "";
$email 			= "";
$emailValue 	= "";
$nombreValue 	= "";
$apellidosValue = "";
$fechaValue		= "";
$user_exist 	= FALSE;



//Validacion de datos enviados
if(isset($_POST['send'])){
	if(!validateEmail($this->input->post('email')))
		$email = "error";
		$user_exist = TRUE;
	if(!validatePassword1($_POST['password1']))
		$password1 = "error";
	if(!validatePassword2($_POST['password1'], $_POST['password2']))
		$password2 = "error";
	
	//Guardamos valores para que no tenga que reescribirlos
	$emailValue = $_POST['email'];
	$nombreValue = $_POST['nombre'];
	$apellidosValue = $_POST['apellidos'];
	
	
	//Comprobamos si todo ha ido bien
	if($password1 != "error" && $password2 != "error" && $email != "error")
		$status = 1;
}


		
?>


			
			  <?php if(!isset($status)): ?>
		  <link rel="stylesheet" href="<?php echo base_url()?>static/css/main.css">
	<div class="reg">
		<div class="section">
			<p>	
			  <h4 class="head-3">Datos de acceso</h4>
		  </p>
			<form id="form1" action="" method="post">
			  
			   <p>
			    <label for="email">E-mail (<span id="req-email" class="requisites <?php echo $email ?>">
			    	<? if($user_exist) 
			    		{ 
					  		echo "Este correo electronico ya existe"; 
					  	}else{
					  		echo "Un e-mail válido por favor";
			  			} 
			  		?>
			  	</span>):</label>
				<input tabindex="1" name="email" id="email" type="text" class="text <?php echo $email ?>" value="<?php echo $emailValue ?>" />
				<label for="password1">Contraseña (<span id="req-password1" class="requisites <?php echo $password1 ?>">Mínimo 5 caracteres, máximo 12 caracteres, letras y números</span>):</label>
				<input tabindex="2" name="password1" id="password1" type="password" class="text <?php echo $password1 ?>" value="" />
				<label for="password2">Repetir Contraseña (<span id="req-password2" class="requisites <?php echo $password2 ?>">Debe ser igual a la anterior</span>):</label>
				<input tabindex="3" name="password2" id="password2" type="password" class="text <?php echo $password2 ?>" value="" />
			</p>
			<p>
				<h4 class="head-3">Datos personales</h4>
			</p>
                
              <label for="nombre">Nombre:</label>
                <input tabindex="4" name="nombre" id="nombre" type="text" class="text" value="<?=$nombreValue?>" />
                <label for="apellidos">Apellidos:</label>
                <input tabindex="5" name="apellidos" id="apellidos" type="text" class="text" value="<?=$apellidosValue?>" />
                <label for="fecha">Fecha Nacimiento:</label>
                <p>
                <select class="field4" name="fnacimiento[dia]" id="dia">
      <option></option>
      <?php
        for ($i=1; $i < 32; $i++) { 
          echo '<option value="'.$i.'">'.$i."</option>";
        }
      ?>
    </select>
    <select class="field4" name="fnacimiento[mes]" id="mes">
      
      <?php
        for ($i=0; $i < 13; $i++) { 
          echo '<option value="'.$i.'">'.$this->lang->line('mes_'.$i)."</option>";
        }
      ?>
    </select>
    <select class="field4" name="fnacimiento[ano]" id="ano">
      <option></option>
      <?php
        for ($i=mdate('%Y')-18; $i > mdate('%Y')-70; $i--) { 
          echo '<option value="'.$i.'">'.$i."</option>";
        }
      ?>
    </select></p>
    <p>
    	<label for="vivo">Pais:</label>
    	<select class="field4" style="width:200px" name="pais" id="pais">
        <option></option>
        <?php
        $query = $this->db->query('SELECT * FROM paises');
        foreach ($query->result() as $value) {
          echo '<option value="'.$value->id.'">'.$value->pais.'</option>';
        }
        ?>
      </select>
      <label for="vivo">Provincia / Estado:</label>
      <select class="field4" style="width:200px" name="estado" id="estado">
        <option></option>
        <?php
        $query = $this->db->query('SELECT * FROM estados WHERE relacion = "'.$pais.'"');
        foreach ($query->result() as $value) {
          echo '<option value="'.$value->id.'">'.$value->estado.'</option>';
        }
        ?>
      </select>
    </p>
                
				<p>
					<input tabindex="7" name="send" id="send" type="submit" class="button-1" value="Registrarse" />
				</p>
		  </form>
			  </div>
	</div>
			  <?php else: ?>
			  <?php		

	  				$usuario = array('id'=>'','user'=>'none','pass'=>md5($this->input->post('password1')),'fecha'=>time(),'status'=>'2','fotoperfil'=>0,'name'=>$this->input->post('nombre'),'apellido'=>$this->input->post('apellidos'),'fnacimiento'=>json_encode($this->input->post('fnacimiento')),'email'=>$this->input->post('email'),'soy'=>0,'orientacion'=>0,'pais'=>$this->input->post('pais'),'estado'=>$this->input->post('estado'),'idiomas'=>'','frasedia'=>'','look'=>0,'raza'=>0,'estatura'=>0,'peso'=>0,'complexion'=>0,'ojos'=>0,'pelo'=>0,'vello'=>0,'largopolla'=>0,'grosopolla'=>0,'circunci'=>0,'piercing'=>0,'tatus'=>0,'armario'=>0,'situacion'=>0,'actitud'=>0,'busco'=>0,'quebusco'=>'','tabaco'=>0,'alcohol'=>0,'drogas'=>0,'aficiones'=>'','fidelidad'=>0,'rol'=>0,'sexosegur'=>0,'tipochico'=>'','fetiches'=>'','psexuales'=>'');

					$this->db->insert('usuarios', $usuario);
			?>
		  
<div style="padding-top: 34px"></div>
<div class="wrapper">
	<div class="grid_6">
		<div class="pad-left-1 pad-right-1" style="padding-left: 20px;">
			<h3></h3>
			
    <h3 align="center">¡Ya formas parte de Gayria, el siguiente paso será completar tu perfil!</h3>
		</div>
	</div>
	<div class="grid_6">
		<div class="pad-left-2 pad-right-1 curvas" style="background-color: #3e1f36;">
			
			                                <? if($this->session->userdata('fail')) { ?>
                                 <!--Message Error--> 
                                
                                   <font class="err-login"><?php echo $this->session->userdata('fail')?></font>
                                    
                             
                                <?php 
                                    $this->session->unset_userdata(array('fail' => ''));
                                } ?>
                                <?php echo form_open('service/auth');?>
                                <input type="hidden" name="referer" value="<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>">
                                <div class="login">
                                    <p class="text-1">
                                        <label><?=$this->lang->line('mail')?></label>
                                        <input type="text" name="email" class="field size1">
                                    </p>
                                    <p class="text-1">
                                        <label><?=$this->lang->line('pass')?></label>
                                        <input type="password" name="pass" class="field size1">
                                    </p>
                                    <p class="text-1">
                                        <input type="submit" value="<?=$this->lang->line('button_entrar')?>" class="button-1">
                                        <a href="" class="link-1 right"><?=$this->lang->line('rec_pass')?></a></form>
                                    </p>
                                    
                                </div>
            
		</div>
	</div>
</div>
<div class="vr-border-r"></div>
			<?php endif; ?>
	

	<script type="text/javascript" src="<?=base_url()?>static/js/main.js"></script>
