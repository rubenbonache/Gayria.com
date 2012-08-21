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
