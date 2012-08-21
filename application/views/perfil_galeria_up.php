<?
	if($this->uri->segment(4)=='crop')
	{
		if($this->input->post('image'))
		{




		$targ_w = $targ_h = 150;
		$jpeg_quality = 90;

		$src 	= './upload/'.$this->input->post('image');
		//$src = "./file.jpg";
		$save 	= './upload/'.$this->input->post('image');
		if( ! file_exists($src))
			{
				die("no existe");
			}
		$img_r 	= imagecreatefromjpeg($src);
		$dst_r 	= ImageCreateTrueColor( $targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,$this->input->post('x'),$this->input->post('y'),
		$targ_w,$targ_h,$this->input->post('w'),$this->input->post('h'));

		//header('Content-type: image/jpeg');
		imagejpeg($dst_r,$save,$jpeg_quality);
?>
<html>
<head>
	<title></title>
	<script>
function Cerrar(){
opener.location.href = '<?=site_url('/perfil/me/galeria')?>';
window.close();
}
</script>
<?

		$item = 'onload="Cerrar()"';
	
?>
</head>
	<body <?=$item?>>
	</body>
</html>
<?
		exit;

		}

		//$sql = $this->db->get_where('galeria', array('id',$this->session->userdata('id')), 0, 1);

?>


<?
		$sql = $this->db->query('SELECT * FROM galeria WHERE author = "'.$this->session->userdata('id').'" ORDER by id DESC LIMIT 0, 1');
		foreach ($sql->result() as $value) {
		 	$image = $value->path;
		 	
		 } 

?>

<html>
	<head>

		<script src="<?php echo base_url()?>static/js/jquery-1.6.min.js"></script>
		<script src="<?php echo base_url()?>static/js/jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="<?php echo base_url()?>static/css/jquery.Jcrop.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url()?>static/css/Jcrop.css" type="text/css" />


		<script language="Javascript">

		$(function(){

				$('#cropbox').Jcrop({
					aspectRatio: 1,
					onSelect: updateCoords
				});

			});

			function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};

		</script>

	</head>

	<body style="background-color: #3e1f36;" onLoad="javascript:resizeTo(800,690)">

		<p align="center" class="head-1">Selecciona una zona para la miniatura<p>
		<p align="center"><img src="<?=base_url()?>upload/thumb_<?=$image?>" id="cropbox" /></p>
		
		<!-- This is the form that our event handler fills -->
		<form action="./crop" method="post" onsubmit="return checkCoords();">
			<input type="hidden" value="thumb_<?=$image?>" name="image" />
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<p align="center"><input type="submit" class="button-1" value="Guardar" /></p>
		</form>


	</body>
</html>

<?
	}else{

?><html>
<head>
	<title>Subir imagen</title>
	<script>
function Cerrar(){
opener.location.href = '<?=site_url('/perfil/me/galeria')?>';
window.close();
}
</script>
<?
	$item = '';
	if($this->uri->segment(4)=="r")
	{
		$item = 'onload="Cerrar()"';
	}
?>
<link rel="stylesheet" href="<?php echo base_url()?>static/css/Jcrop.css" type="text/css" />
</head>
	<body style="background-color: #3e1f36; color: #FFF;">

<?php echo form_open_multipart('service/upload/send_upload');?>
								
<div align="center">
	<p class="head-2">Selecciona una imagen de tu ordenador</p> 
	<input type="file" name="userfile" size="10" />
	<input type="submit" value="Subir" class="button-1" />
</div>
<div class="cl">&nbsp;</div>
</form>	
	</body>
</html>
<?
}
?>
								