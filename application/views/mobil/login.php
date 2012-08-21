<!DOCTYPE html> 
<html> 
	<head> 
	<title>Gayria.com</title> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?php echo base_url()?>mobile/jquery.mobile-1.1.0.min.css" />
	<script type='text/javascript' src="<?php echo base_url()?>static/js/jquery-1.6.min.js"></script>
	<script src="<?php echo base_url()?>mobile/jquery.mobile-1.1.0.min.js"></script>
</head> 
<body> 

<div data-role="page" data-theme="a">
	<div data-role="content" data-content-theme="a">   
		<p align="center"><img src="<?php echo base_url()?>static/images/logo-bg.png" border="0"></p>
		<div style="padding-top: 30px;">
			<? if($this->session->userdata('fail')) { ?>
                   
             <font class="err-login"><?php echo $this->session->userdata('fail')?></font>                
             <?php 
             	$this->session->unset_userdata(array('fail' => ''));
             }
             ?>
			<?php echo form_open('service/auth');?>
			<p><label for="username" class="ui-hidden-accessible">Correo electronico :</label>
			<input type="text" data-mini="true" name="email" id="email" value="" placeholder="Correo electronico"/></p>


			<p><label for="username" class="ui-hidden-accessible">Contraseña:</label>
			<input type="password" data-mini="true" name="pass" id="pass" value="" placeholder="Contraseña"/></p>

			<p><label for="username" class="ui-hidden-accessible">Acceder</label>
			<input type="submit" data-mini="true" name="submit" id="acceder" value="Acceder" placeholder="Acceder"/></p>
		</form>
		</div>
		<center><?php echo anchor('re/re', 'Recuperar contraseña')?></center>
		<p style="text-align: center; padding-top: 50px;">2012 &copy; Gayria.com</p>
	</div><!-- /content -->	
</div><!-- /page -->
</body>
</html>