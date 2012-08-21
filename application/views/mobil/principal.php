<!DOCTYPE html> 
<html> 
	<head> 
	<title>Gayria.com</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?php echo base_url()?>mobile/jquery.mobile-1.1.0.min.css" />
	<script type='text/javascript' src="<?php echo base_url()?>static/js/jquery-1.6.min.js"></script>
	<script src="<?php echo base_url()?>mobile/jquery.mobile-1.1.0.min.js"></script>
	<script>
	    $(document).ready(function(){
        $("#pais").change(function(){
            $.post("<?php echo base_url()?>index.php/service/estados/",{ id:$(this).val() },function(data){$("#estado").html(data);})
        });
    })
    </script>
</head> 
<body> 

<div data-role="page">

	<div data-role="header" data-position="inline">
		<h1>Gayria.com</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview">
			<li>
			<a href="<?php echo site_url('perfil/me')?>" data-transition="slide">
				<h3>Informacion</h3>
				<p>mis datos personales.</p>
			</a>
			</li>
			<li>
			<a href="<?php echo site_url('perfil/me/mensajeria')?>" data-transition="slide">
				<h3>Mensajeria</h3>
				<p>Mis mensajes.</p>
				<?php if($this->perfil->msg_read($this->session->userdata('id'))>=1){ echo '<span class="ui-li-count">'.$this->perfil->msg_read($this->session->userdata('id')).'</span>'; }?>
			</a>
			</li>
			<li>
			<a href="<?php echo site_url('perfil/me/galeria')?>" data-transition="slide">
				<h3>Galeria</h3>
				<p>Mis fotos</p>
			</a>
			</li>
			<li>
			<a href="<?php echo site_url('service/auth/logout')?>">
				<h3>Cerrar sesión</h3>
				<p></p>
			</a>
			</li>
		</ul>

	</div>

	</div><!-- /page -->

</body>
</html>