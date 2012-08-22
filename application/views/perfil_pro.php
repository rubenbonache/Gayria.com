<?
  $fnacimiento = json_decode($fnacimiento,true);
  $fnacimiento = mdate('%Y')-$fnacimiento['ano'];
  if($fnacimiento>100) $fnacimiento = '';
?>
        	  <h4 class="nombperfil"><?=$name?> <?=$apellido?></h4>
            <div class="right" style="padding-right: 20px;">
              <? if($this->uri->segment(3)==$this->session->userdata('id')){ }else{ ?> 
              <?  $q = mysql_query("SELECT iduser,idfriend FROM friend WHERE iduser='".$this->session->userdata('id')."' AND idfriend='".$this->uri->segment('3')."'") or die(mysql_error());
                  $num=mysql_num_rows($q);
                  if($num>0){
                ?>
                  <div id="remove<? echo $this->uri->segment('3');?>"><a href="javascript:void(0);" class="remove" id="<? echo $this->uri->segment('3');?>"><span>Quitar Favorito</span></a> <? if($this->uri->segment(3)==$this->session->userdata('id')){ }else{ ?><a href="javascript:void(0);" class="mail-button" onclick="window.open('<?=site_url('service/mensajeria/nuevo/'.$this->uri->segment(3))?>', '_blank', 'width=1000,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=200,screeny=200');"><span>Enviar mensaje</span></a><? } ?></div>
                    <div id="follow<? echo $this->uri->segment('3');?>" style="display:none"><a href="javascript:void(0);" class="follow" id="<? echo $this->uri->segment('3');?>"><span>Añadir Favorito</span></a> <? if($this->uri->segment(3)==$this->session->userdata('id')){ }else{ ?><a href="javascript:void(0);" class="mail-button" onclick="window.open('<?=site_url('service/mensajeria/nuevo/'.$this->uri->segment(3))?>', '_blank', 'width=1000,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=200,screeny=200');"><span>Enviar mensaje</span></a><? } ?></div>
                <? }else{ ?>
                    <div id="follow<? echo $this->uri->segment('3');?>"><a href="javascript:void(0);" class="follow" id="<? echo $this->uri->segment('3');?>"><span>Añadir Favorito</span></a> <? if($this->uri->segment(3)==$this->session->userdata('id')){ }else{ ?><a href="javascript:void(0);" class="mail-button" onclick="window.open('<?=site_url('service/mensajeria/nuevo/'.$this->uri->segment(3))?>', '_blank', 'width=1000,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=200,screeny=200');"><span>Enviar mensaje</span></a><? } ?></div>
                    <div id="remove<? echo $this->uri->segment('3');?>" style="display:none"><a href="javascript:void(0);" class="remove" id="<? echo $this->uri->segment('3');?>"><span>Quitar Favorito</span></a> <? if($this->uri->segment(3)==$this->session->userdata('id')){ }else{ ?><a href="javascript:void(0);" class="mail-button" onclick="window.open('<?=site_url('service/mensajeria/nuevo/'.$this->uri->segment(3))?>', '_blank', 'width=1000,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=200,screeny=200');"><span>Enviar mensaje</span></a><? } ?></div>
                <? } ?>
                <? } ?>
            </div>
              <em class="frasedia"><?=$frasedia?></em> 
              </br>       	  
        	  <div>
        	    <div class="clear">
                </br>    
                </div>
                <div id="slot-machine-tabs">

			<ul class="tabs">
				<li><?=anchor($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/', 'Perfil', navigation($this->uri->segment(4), FALSE));?></li>
				<li><?=anchor($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/descripcion', 'Descripción', navigation($this->uri->segment(4), 'descripcion'));?></li>
        <li><?=anchor($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/galeria', 'Galeria', navigation($this->uri->segment(4), 'galeria'));?></li>
			</ul>

			<div class="box-wrapper">
        <? if( ! $this->uri->segment(4)): ?>
				<div id="one" class="content-box current">
					<div class="col-one col">
            <?
                if($fotoperfil)
                {
                   echo '<img src="'.base_url().'upload/'.img_perfil($fotoperfil).'" alt="" width="200"/>';                                               
                 }else
                 {
                    echo '<img src="http://gayria.com/imagenodisp.jpg" alt="" width="200"/>';
                  }
            ?>
					</div>
					<div class="col-two col">
                    <p class="titulosficha">Mis datos</p>
						<table width="395" border="0">
                          <tr>
                            <td width="120" class="datos">Nombre:</td>
                            <td colspan="6" class="datosresp"><?=$name?> </td>
                          </tr>
                          <tr>
                            <td class="datos">Apellidos:</td>
                            <td colspan="6" class="datosresp"><?=$apellido?></td>
                          </tr>
                          <tr>
                            <td class="datos">Email:</td>
                            <td colspan="6" class="datosresp"><?=$email?></td>
                          </tr>
                          <tr>
                            <td class="datos">Soy:</td>
                            <td colspan="6" class="datosresp"><?=$this->lang->line('0_0_'.$soy)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Edad:</td>
                            <td colspan="6" class="datosresp"><?=$fnacimiento?></td>
                          </tr>
                          <tr>
                            <td class="datos">Orientación sexual:</td>
                            <td colspan="6" class="datosresp" ><?=$this->lang->line('0_1_'.$orientacion)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Vivo en:</td>
                            <td colspan="6" class="datosresp" ><?=pais($pais)?>, <?=estado($estado)?></td>
                          </tr>
                          <tr>
                            <td rowspan="3" class="datos">Hablo: </td>
                            <td width="20" class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(1, $idiomas)?>.png"/></td>
                            <td width="65" class="datosresp"><?=$this->lang->line('0_2_1')?></td>
                            <td width="20" class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(4, $idiomas)?>.png"/></td>
                            <td width="65" class="datosresp"><?=$this->lang->line('0_2_4')?></td>
                            <td width="20" class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(7, $idiomas)?>.png"/></td>
                            <td width="65" class="datosresp"><?=$this->lang->line('0_2_7')?></td>
                          </tr>
                          <tr>
                            <td class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(2, $idiomas)?>.png"/></td>
                            <td class="datosresp"><?=$this->lang->line('0_2_2')?></td>
                            <td class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(5, $idiomas)?>.png"/></td>
                            <td class="datosresp"><?=$this->lang->line('0_2_5')?></td>
                            <td class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(8, $idiomas)?>.png"/></td>
                            <td class="datosresp"><?=$this->lang->line('0_2_8')?></td>
                          </tr>
                          <tr>
                            <td class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(3, $idiomas)?>.png"/></td>
                            <td class="datosresp"><?=$this->lang->line('0_2_3')?></td>
                            <td class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(6, $idiomas)?>.png"/></td>
                            <td class="datosresp"><?=$this->lang->line('0_2_6')?></td>
                            <td class="datosresp"><img src="<?=base_url()?>static/images/<?=comprobar(9, $idiomas)?>.png"/></td>
                            <td class="datosresp"><?=$this->lang->line('0_2_9')?></td>
                          </tr>
                          </table>
                    </div>

					<div class="col-three col">
						
					</div>
				</div>
        <? endif; ?>
        <? if($this->uri->segment(4)=="descripcion"): ?>
				<div id="two" class="content-box current">
					<div class="col-four col">
						<p class="titulosficha">Mi fisico</p>
                        <table width="195" border="0">
                          <tr>
                            <td class="datos">Estatura:</td>
                            <td class="datosresp"><?=$this->lang->line('1_2_'.$estatura)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Peso:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_3_'.$peso)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Complexion:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_2_'.$complexion)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Color de ojos:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_3_'.$ojos)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Pelo:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_4_'.$pelo)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Vello corporal:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_5_'.$vello)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Largo de polla:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_6_'.$largopolla)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Grosor de polla:</td>
                            <td class="datosresp" ><?=$this->lang->line('1_7_'.$grosopolla)?></td>
                          </tr>
                          </table>
					</div>
					<div class="col-five col">
                        <p class="titulosficha">Servicios</p>
                        <table width="395" border="0">
                          <tr>
                            <td class="datos">Tengo sitio:</td>
                            <td  class="datosresp" ><?=$this->lang->line('2_0_'.$tsitio)?></td>
                          </tr>
                          <tr>
                           <td width="130" class="datos">Tarifa en mi sitio:</td>
                           <td width="255"  class="datosresp"><?=$ttsitio?></td>
                          </tr>
                          <tr>
                            <td class="datos">Hotel y domicilio:</td>
                            <td  class="datosresp"><?=$this->lang->line('2_0_'.$hotel)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Tarifa hotel y domicilio:</td>
                            <td  class="datosresp"><?=$thotel?></td>
                          </tr>
                          <tr>
                            <td class="datos">Acompaño viajes:</td>
                            <td  class="datosresp" ><?=$this->lang->line('2_0_'.$viajes)?></td>
                          </tr>
                          <tr>
                            <td class="datos">Rol:</td>
                            <td  class="datosresp"><?=$roll?></td>
                          </tr>
                        </table>
						
					</div>
                    <div class="col-five col">
                        <p class="titulosficha"> </p>
                        <table width="395" border="0">
                          <tr>
                            <td class="datos" width="110px">Especialidades:</td>
                            <td  class="datosresp" ><?=$especial?></td>
                          </tr>
                         
                        </table>
            
          </div>
				</div>
        <? endif; ?>
        <? if($this->uri->segment(4)=="galeria"): ?>      
        <? if($this->uri->segment(5)=="img"){ ?>      
        <div id="four" class="content-box current">
          <div class="col-one col" style="width: 100%">
          <p class="titulosficha">Mis fotos</p>

          <?
              $query = $this->db->get_where('galeria', array('id' => $this->uri->segment(6), 'active' => '1'));
              foreach ($query->result() as $value) {
                echo '<div style="padding-top: 5px"><img style="border: 2px solid #FFF;" src="'.base_url().'/upload/'.$value->path.'" width="885px"></div>';
              
              }
          ?>
           
          </div>
        </div>
      <? }else{ ?>
      <div id="four" class="content-box current">
					<div class="col-one col" style="width: 100%">
					<p class="titulosficha">Mis fotos</p>
            
          <?
              $this->db->order_by('id','DESC');
              $query = $this->db->get_where('galeria', array('author' => $this->uri->segment(3), 'active' => '1'));
              foreach ($query->result() as $value) {
                echo '<div style="float: left; padding: 20px 20px 20px 20px;">'.anchor('perfil/view/'.$this->uri->segment(3).'/galeria/img/'.$value->id, '<img style="border: 2px solid #FFF;" src="'.base_url().'/upload/'.$value->thumb.'" width="100px">').'</div>';
              
              }
          ?>
           
					</div>
				</div>
      <? } ?>
      <? endif; ?>
      
			</div>

		</div> <!-- END Box Wrapper -->

	<!-- END Slot Machine Tabs -->
               