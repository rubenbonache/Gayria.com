<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ES" lang="ES">
<head>
  	<title>Gayria.com</title>
  	<meta charset="utf-8">
    <meta name="description" content="gayra">
    <meta name="keywords" content="gay">
    <link rel="stylesheet" href="<?=base_url()?>static/css/style.css">
    	<script>
function Cerrar(){
opener.location.href = '<?=site_url('perfil/me/mensajeria')?>';
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
<style>
body {
	background-color: transparent;
}
</style>
</head>
<body <?=$item?>>
				<div class="box" style="width: 100%; height: 100%; padding: 0px; background: #EEE;">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Nuevo mensaje</h2>
					</div>
					<!-- End Box Head -->
					
					 <?=form_open_multipart('service/mensajeria/'.$this->uri->segment(3).'/r')?>
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Titulo del mensaje <span>(Required Field)</span></label>
									<input type="text" name="titulo" class="field size1" />
									<input type="hidden" name="para" class="field size1" value="<?=$this->uri->segment(4)?>"/>
								</p>	
								<p>
									
									<label>Contenido <span>(Required Field)</span></label>
									<textarea class="field size1" name="texto" rows="10" cols="30"></textarea>
								</p>	
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons-2" style="button: 0px;">
							<input type="submit" class="button1" value="submit" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->
</body>
</html>