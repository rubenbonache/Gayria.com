<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>CPanel</title>
	<link rel="stylesheet" href="<?php echo base_url();?>static/css/style-admin.css" type="text/css" media="all" />
  <script type="text/javascript" 
   src="<?php echo base_url()?>static/js/jquery-1.6.min.js">
   </script>
<script>

function actualizar(){

   $('#activity').load('<?php echo site_url('admin/update')?>').fadeIn("slow");

}

setInterval( "actualizar()", 10000 );


$(document).ready(function(){
	$("#pais").change(function(){
		$.post("<?php echo site_url('service/estados/')?>",{ id:$(this).val() },function(data){$("#estado").html(data);})
	});
})

</script>

</script>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#"><img src="<?php echo base_url()?>static/images/logo-bg.png"></a></h1>
			<div id="top-navigation">
				<?php echo $this->lang->line('bienvenido'); ?> <a href="#"><strong><?php echo $this->session->userdata('username'); ?></strong></a>
				<span>|</span>
				<?php echo anchor('settings/lang/ES/admin/'.$this->uri->segment(2), 'ES') ?>
				<span>|</span>
				<?php echo anchor('settings/lang/EN/admin/'.$this->uri->segment(2), 'EN') ?>
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
				<?php echo anchor('service/auth/logout', $this->lang->line('logout')) ?>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		<?php
			$index = '';
			$videos = '';
			$usuarios = '';
			$galeria = '';
			$stats = '';
		if(!$this->uri->segment(2))
		{
			$index = 'class="active"';
		}
		if($this->uri->segment(2) == "videos")
		{
			$videos = 'class="active"';
		}
		if($this->uri->segment(2) == "usuarios")
		{
			$usuarios = 'class="active"';
		}			
		if($this->uri->segment(2) == "galeria")
		{
			$galeria = 'class="active"';
		}
		if($this->uri->segment(2) == "stats")
		{
			$stats = 'class="active"';
		}		
		?>
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><?php echo anchor('admin/','<span>Dashboard</span>', $index)?></li>
			    <li><?php echo anchor('admin/videos','<span>'.$this->lang->line('videoss').'</span>', $videos)?></li>
			    <li><?php echo anchor('admin/usuarios','<span>'.$this->lang->line('usuarios').'</span>', $usuarios)?></li>
			    <li><?php echo anchor('admin/galeria','<span>'.$this->lang->line('galeria').'</span>', $galeria)?></li>
			    <li><?php echo anchor('admin/stats','<span>'.$this->lang->line('stats').'</span>', $stats)?></li>
			    <li><?php echo anchor('admin/panel', '<span>Services Control</span>') ?></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->