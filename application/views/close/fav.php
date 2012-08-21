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
opener.location.href = '<?=site_url('perfil/view/'.$this->uri->segment(4))?>';
window.close();
}
</script>
</head>
<body onload="Cerrar()">
</body>
</html>