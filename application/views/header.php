<?php
date_default_timezone_set('UTC');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ES" lang="ES">
<head>
  	<title>Gayria.com</title>
  	<meta charset="utf-8">
    <meta name="description" content="gayra">
    <meta name="keywords" content="gay">
    <link rel="stylesheet" href="<?php echo base_url()?>static/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>static/css/styles-menu.css">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="http://www.gayra.com/apple.png"/>
    <script type='text/javascript' src="<?php echo base_url()?>static/js/jquery-1.6.min.js"></script>
	<script type='text/javascript' src="<?php echo base_url()?>static/js/slotmachine.js"></script>
    <script>

function actualizar(){
   $('#cssmen').load('<?php echo base_url()?>index.php/perfil/menu').fadeIn("slow");
   $('#header-mail').load('<?php echo site_url('perfil/mail')?>').fadeIn("slow");
    }

setInterval( "actualizar()", 10000 );

    $(document).ready(function(){
        $("#pais").change(function(){
            $.post("<?php echo site_url('service/estados/')?>",{ id:$(this).val() },function(data){$("#estado").html(data);})
        });
    })


$(document).ready(function()
{
    $(".follow").click(function()
    {
        var id=$(this).attr("id");
        var dataString = 'id='+ id;
        
        $.ajax
        ({
            type: "POST",
            url: "<?=site_url('service/favorito/add')?>",
            data: dataString,
            cache: false,
            success: function(html)
            {   
                $("#follow"+id).hide();
                $("#remove"+id).show();
            }
        });
    });

    $(".remove").click(function()
    {
        var id=$(this).attr("id");
        var dataString = 'id='+ id;
        
        $.ajax
        ({
            type: "POST",
            url: "<?=site_url('service/favorito/del')?>",
            data: dataString,
            cache: false,
            success: function(html)
            {   
                $("#remove"+id).hide();
                $("#follow"+id).show();
            }
        });
    });
});
    </script>

    
    


</head>

<body>
<div class="main-bg">
    <!-- Header -->
<header>
    	<div class="header-bg1">
            <?php
                if($this->session->userdata('status')):
            ?>
            <div id="header-mail" class="header-mail">
            <?php
                if($this->perfil->msg_read($this->session->userdata('id'))==0)
                {
                    echo anchor('perfil/me/mensajeria',$this->perfil->msg_read($this->session->userdata('id')));
                }else
                {
                    echo anchor('perfil/me/mensajeria',$this->perfil->msg_read($this->session->userdata('id')));
                }
            ?>
            </div>
            <?php
            endif;
            ?>
        	<div class="header-bg2">
            	<div class="inner">
                	<ul class="header-meta">
                    	<li><a href="index.php" class="meta-1"></a></li>
                        <li><a href="perfiles.php" class="meta-2"></a></li>
                        <li><a href="full.php" class="meta-3"></a></li>
                    </ul>
            		<a href="index.html" class="logo">Gayria.com</a>	
                </div>
            </div>
        </div>
        <div class="slider-holder">
            <div id="mp_slider">
                
            </div>
            
        </div>
        <nav style="padding: 0px;">
        	<ul class="sf-menu">
            	<li>
                	<?php echo anchor('/',$this->lang->line('inicio'))?>
                </li>
                <li <?php echo navigation($this->uri->segment(2), 'me')?>>
                	<?php echo anchor('/perfil/me',$this->lang->line('perfil'))?>
                </li>
                <li <?php echo navigation($this->uri->segment(2), 'view')?> <?php echo navigation($this->uri->segment(1), 'perfiles')?>>
                	<?php echo anchor('perfiles/', $this->lang->line('perfiles'))?>
                </li>
                <li  <?php echo navigation($this->uri->segment(1), 'chaperos')?>>
                    <?php echo anchor('chaperos', $this->lang->line('chaperos'))?>
                </li>
                <li  <?php echo navigation($this->uri->segment(1), 'videos')?>>
                    <?php echo anchor('videos', $this->lang->line('videos'))?>
                </li>
                <li  <?php echo navigation($this->uri->segment(1), 'webcams')?>>
                    <?php echo anchor('webcams', $this->lang->line('webcams'))?>
                </li>
                <li <?php echo navigation($this->uri->segment(1), 'contacto')?>>
                    <?php echo anchor('contacto', $this->lang->line('contacto'))?>
                </li>
            </ul>
            <div class="clear"></div>
        </nav>
    </header>
    <!-- Content -->
  <div class="content-bg">
<section id="content">
                    <div class="main-content-2">

                    <div class="container_12" style="width: 100%">