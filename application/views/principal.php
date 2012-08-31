<?
date_default_timezone_set('UTC');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ES" lang="ES">
<head>
  	<title>Gayria.com</title>
  	<meta charset="utf-8">
    <meta name="description" content="gayra">
    <meta name="keywords" content="gay">
    <link rel="stylesheet" href="<?=base_url()?>static/css/style.css">
    <script src="<?=base_url()?>static/js/jquery-1.6.min.js"></script>


</head>
<body>
<div class="main-bg">

    <!-- Header -->
<header>
    	<div class="header-bg1">
            <?
              /*  if($this->session->userdata('status'))
                {
                    echo '<div id="header-mail" class="header-mail">';

                    if($this->perfil->msg_read($this->session->userdata('id'))==0)
                    {
                       
                    }else
                    {
                        echo anchor('perfil/me/mensajeria',$this->perfil->msg_read($this->session->userdata('id')));
                    }     

                     echo '</div>'; 

                }*/
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
        <nav>
        	<ul class="sf-menu">
                <li class="current">
                    <?=anchor('/', $this->lang->line('inicio'))?>
                </li>
                <li>
                    <?=anchor('/perfil/me', $this->lang->line('perfil'))?>
                </li>
                <li>
                    <?=anchor('perfiles/', $this->lang->line('perfiles'))?>
                </li>
                <li>
                    <?=anchor('chaperos', $this->lang->line('chaperos'))?>
                </li>
                <li>
                    <?=anchor('videos', $this->lang->line('videos'))?>
                </li>
                <li>
                    <?=anchor('webcams', $this->lang->line('webcams'))?>
                </li>
                <li>
                    <?=anchor('contacto', $this->lang->line('contacto'))?>
                </li>
            </ul>
            <div class="clear"></div>
        </nav>
    </header>
    <!-- Content -->
    <div class="content-bg">
        <section id="content">
            <div class="top-content">
                <div class="container_12">
                    <div class="wrapper">
                        <div class="grid_4">
                            <div class="pad-left-1 pad-right">
                                <h4 class="head-1"><?php echo $this->lang->line('titulo_reg')?></h4>
                                <p class="text-1"><?php echo $this->lang->line('text_reg')?></p>
                                <?php echo anchor('register', $this->lang->line('titulo_reg'), 'class="button-1"')?>
                            </div>
                        </div>
                        <div class="grid_4">
                            <div class="pad-left-2 pad-right">
                                <h4 class="head-1"><?=$this->lang->line('titulo_info')?></h4>
                                <p class="text-1">
                                <?php echo $this->lang->line('text_info')?>
                            </p> 
                            <?=anchor('perfiles', $this->lang->line('button_info'), 'class="button-1"');?>
                            </div>
                        </div>
                        <div class="grid_4">
                            <div class="pad-left-2 pad-right">
                                <?php
                                    if($this->session->userdata('status'))
                                    {
                                        $sql = $this->db->get_where('usuarios', array('id' => $this->session->userdata('id')));
                                        foreach ($sql->result() as $value) {
                                            echo '<h4 class="head-1">'.$value->name.' '.$value->apellido.'</h4>';
                                            if($value->fotoperfil)
                                            {
                                                 echo '<div class="right"><img src="'.base_url().img_perfil($value->fotoperfil).'" alt="" width="100"/></div>';                                               
                                            }else
                                            {
                                                echo '<div class="right"><img src="http://gayria.com/imagenodisp.jpg" alt="" width="100"/></div>';
                                            }
                                            echo '<div class="left"><p class="text-1">'.anchor('service/auth/logout', $this->lang->line('logout')).'</p></div>';
                                        }
                                    }else
                                    {
                                ?>
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
                                        <input type="submit" value="<?=$this->lang->line('button_entrar')?>" class="button-1"><?=anchor('perfil/pass_recovery',$this->lang->line('rec_pass'), 'class="link-1 right"')?></form>
                                    </p>
                                    
                                </div>
                                <?
                                    }
                                ?>
                            </div>
                        </div> 
                    </div>
                    <div class="vr-border-1"></div>
                    <div class="vr-border-2"></div>
                </div>
            </div>
            <div class="main-content">
                <div class="container_12">        		
                        <div>
                            <div class="grid_8">
                                <div class="pad-left-1 pad-right-1"> 	
                                    <h3><?=$this->lang->line('titulo_cont')?> </h3>
                                    <div class="wrapper">
                                        <img src="<?=base_url()?>static/images/page1-img1.jpg" alt="" class="img-indent">
                                        <div class="extra-wrap">
                                            <?=$this->lang->line('text_cont')?>
                                            <a href="more.html" class="button"><?=$this->lang->line('mas_cont')?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid_4">
                            	<div class="pad-left-2 pad-right-1">
                            		<h3 class="rss">
                                    	Noticias
                                        <a href="#" class="rss-link"></a>
                                    </h3>
                                    <dl class="news-list">
                                    	<dt>
                                        	<span>12-05-2012</span>
											<a href="more.html">Libro recomendado de hoy: Gay Terror</a>
                                        </dt>
                                        <dd>
											Quince adaptaciones gays de historias de terror de los mejores dibujantes de Comic gay de España. Humoristico y morboso...
                                        </dd>
                                        <dt>
                                        	<span>21-05-2012</span>
											<a href="more.html">Madonna homenajea a Lady Gaga</a>
                                        </dt>
                                        <dd>
											La Reina del Pop arrancó su nueva gira de conciertos "MDNA Tour" en Tel Aviv (Israel) y realizó un Mash-Up de "Express yourself" con "Born this way". 

                                        </dd>
                                    </dl>
                                    <a href="more.html" class="button">mas noticias</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="vr-border-3"></div>
                </div>
            </div>
        </section>
        <!-- Aside -->
        <aside>
        	<div class="container_12">
                <div class="wrapper">
                    <div class="grid_3">
                        <h6 class="head-2">
                            Redes Sociales
                        </h6>
                        <ul class="list-2">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Tuenti</a></li>
                            
                        </ul>
                    </div>
                    <div class="grid_6">
                    	<h6 class="head-2">
                        	Links Rapidos</h6>
                        <div class="wrapper">
                        	<div class="grid_3 alpha">
                            	<ul class="list-2">
                                	<li><a href="#">Reg&iacute;strate</a></li>
                                    <li><a href="#">Buscar usuarios normales</a></li>
                                    <li><a href="#">Servicios profesionales</a></li>
                                    <li><a href="#">Videos por SMS</a></li>
                                </ul>
                            </div>
                            <div class="grid_3 omega">
                            	<ul class="list-2">
                                	<li><a href="#">Webcam online</a></li>
                                    <li><a href="#">Mi perfil</a></li>
                                    <li><a href="#">Contacto</a></li>
                                    <li><a href="#">Ayuda sobre el funcionamiento</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_3">
                    	<h6 class="head-2">
                        	Suscribete a nuestro bolet&iacute;n</h6>
                        <form method="get" id="newsletter">
                     
                            <p>
                              <input type="text" name="newslttr">
                              </p>
                            <p><a onClick="document.getElementById('newsletter').submit()" class="button-1">subscribete</a></p>
                        </form>
                    </div>
            </div>
            </div>
        </aside>
    </div>
    </div>
    <!-- Footer -->
    <footer>
        Gayria.com &copy; <?=mdate('%Y', time())?>  <a href="index-7.html">Politica de privacidad</a>
        <div class="fright"><?=anchor('settings/lang/ES/'.$this->uri->slash_segment(1).$this->uri->segment(2), 'ES')?> - <?=anchor('settings/lang/EN/'.$this->uri->slash_segment(1).$this->uri->segment(2), 'EN')?> </div>
    </footer>

</body>
</html>