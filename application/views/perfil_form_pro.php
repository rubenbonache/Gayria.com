<?php
  $idiomas = json_decode($idiomas,true);
  $fnacimiento = json_decode($fnacimiento,true);
  $quebusco = json_decode($quebusco,true);
  $aficiones = json_decode($aficiones,true);
  $tipochico = json_decode($tipochico,true);
  $fetiches = json_decode($fetiches,true);
  $psexuales = json_decode($psexuales,true);
?>
<div id="cssmenu" class='cssmenu'>
<ul>
   <li><?php echo anchor('perfil/me/', '<span>'.$this->lang->line('info').'</span>');?></li>
   <li><?php echo anchor('perfil/me/galeria', '<span>'.$this->lang->line('galeria').'</span>');?></li>
   <li><?php echo anchor('perfil/me/mensajeria', '<span>'.$this->lang->line('mensajeria').' '.$this->perfil->msg_read($this->session->userdata('id')).'</span>');?></li>
   <li><?php echo anchor('perfil/view/'.$this->session->userdata('id'), '<span>'.$this->lang->line('mi_perfil').'</span>');?></li>
   <li><?php echo anchor('service/auth/logout', '<span>'.$this->lang->line('logout').'</span>');?></li>
   <?php if($this->session->userdata('status')==2):?><li><?php echo anchor('premium', '<span style="color: red;">Premium</span>');?></li><?php endif;?>
</ul>
</div>
<?php echo form_open('perfil/me');?>
        <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('datos_conexion')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
    <td width="150">Nombre</td>
    <td width="550"><input class="field" name="name" type="text" id="name" size="50" value="<?=$name?>"/></td>
  </tr>
  <tr>
    <td>Apellidos</td>
    <td><input class="field" name="apellido" type="text" id="apellido" size="50" value="<?=$apellido?>"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input class="field" name="email" type="text" id="email" size="50" value="<?=$email?>" /></td>
  </tr>
  <tr>
    <td>Contraseña</td>
    <td><input class="field" name="pass" type="password" id="pass" size="50"/></td>
  </tr>
  <tr>
    <td>Repite contraseña</td>
    <td><input class="field" name="pass2" type="password" id="pass2" size="50"/></td>
  </tr>
</table>
 <!-- End Sort -->
            
          </div>
        </div>
      </div>

          <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('perfill')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
  <td>Soy</td>
  <td colspan="3">
        <input type="radio" id="armario" name="soy" value="1" <?php if($soy==1) echo "checked"?>/> <?php echo $this->lang->line('0_0_1')?>
        <input type="radio" id="armario" name="soy" value="2" <?php if($soy==2) echo "checked"?>/> <?php echo $this->lang->line('0_0_2')?>
        <input type="radio" id="armario" name="soy" value="3" <?php if($soy==3) echo "checked"?>/> <?php echo $this->lang->line('0_0_3')?></td>
</td>
</tr>
<tr>
    <td>Fecha de nacimiento</td>
    <td colspan="3">
             <select class="field" name="fnacimiento[dia]" id="dia">
      <option></option>
      <?php
        for ($i=1; $i < 32; $i++) { 
          echo '<option value="'.$i.'"';
           if($fnacimiento['dia']==$i) { echo "selected"; } 
           echo '>';
           echo $i."</option>";
        }
      ?>
    </select>
    <select class="field" name="fnacimiento[mes]" id="mes">
      
      <?php
        for ($i=0; $i < 13; $i++) { 
          echo '<option value="'.$i.'"';
           if($fnacimiento['mes']==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('mes_'.$i)."</option>";
        }
      ?>
    </select>
    <select class="field" name="fnacimiento[ano]" id="ano">
      <option></option>
      <?php
        for ($i=mdate('%Y')-18; $i > mdate('%Y')-70; $i--) { 
          echo '<option value="'.$i.'"';
           if($fnacimiento['ano']==$i) { echo "selected"; } 
           echo '>';
           echo $i."</option>";
        }
      ?>
    </select>
    </td>
</tr>
<tr>
  <td width="150"><?php echo $this->lang->line('vivo')?></td>
    <td colspan="3" width="550">
      <select class="field" style="width:200px" name="pais" id="pais">
        <option value="<?php echo $pais?>"><?php echo pais($pais)?></option>
        <?php
        $query = $this->db->query('SELECT * FROM paises');
        foreach ($query->result() as $value) {
          echo '<option value="'.$value->id.'">'.$value->pais.'</option>';
        }
        ?>
      </select>
      <select class="field" style="width:200px" name="estado" id="estado">
        <option value="<?php echo $estado?>"><?php echo estado($estado)?></option>
        <?php
        $query = $this->db->query('SELECT * FROM estados WHERE relacion = "'.$pais.'"');
        foreach ($query->result() as $value) {
          echo '<option value="'.$value->id.'">'.$value->estado.'</option>';
        }
        ?>
      </select>
      </td>
  </tr>
<tr>
  <td>Orientacion sexual</td>
  <td colspan="3">
      <select class="field" style="width:200px" name="orientacion" id="orientacion">
      <option value="0"></option>
      <option value="1" <?php if($orientacion==1) echo "selected";?>><?php echo $this->lang->line('0_1_1')?></option>
      <option value="2" <?php if($orientacion==2) echo "selected";?>><?php echo $this->lang->line('0_1_2')?></option>
      <option value="3" <?php if($orientacion==3) echo "selected";?>><?php echo $this->lang->line('0_1_3')?></option>
      <option value="4" <?php if($orientacion==4) echo "selected";?>><?php echo $this->lang->line('0_1_4')?></option>
    </select></td>
  </tr>
<tr>
  <td>Idioma</td>
      <td width="182">
     <input type="checkbox" name="idiomas[1]" id="idiomas" value="1" <?php if(@in_array(1, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_1')?><br/>
     <input type="checkbox" name="idiomas[2]" id="idiomas" value="2" <?php if(@in_array(2, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_2')?><br/>
     <input type="checkbox" name="idiomas[3]" id="idiomas" value="3" <?php if(@in_array(3, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_3')?><br/>
    </td>
    <td width="182"> 
     <input type="checkbox" name="idiomas[4]" id="idiomas" value="4" <?php if(@in_array(4, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_4')?><br/>
     <input type="checkbox" name="idiomas[5]" id="idiomas" value="5" <?php if(@in_array(5, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_5')?><br/>  
     <input type="checkbox" name="idiomas[6]" id="idiomas" value="6" <?php if(@in_array(6, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_6')?><br/>
    </td>
    <td width="182">
     <input type="checkbox" name="idiomas[7]" id="idiomas" value="7" <?php if(@in_array(7, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_7')?><br/>
     <input type="checkbox" name="idiomas[8]" id="idiomas" value="8" <?php if(@in_array(8, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_8')?><br/>
     <input type="checkbox" name="idiomas[9]" id="idiomas" value="9" <?php if(@in_array(9, $idiomas)) echo 'checked';?>/> <?php echo $this->lang->line('0_2_9')?><br/>
    </td>
  </tr>
<td width="150">Descripción</td>
    <td colspan="3">
      <label for="descripcion"></label>
      <textarea class="field" rows="10" cols="60" name="frasedia" cols="50" rows="5"  id="frasedia"><?php echo $frasedia;?></textarea></td>
    </form>
    </td>
    </tr>
</table>
 <!-- End Sort -->
            
          </div>
        </div>
      </div>

          <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('fisico')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
    <td width="150"><?php echo $this->lang->line('estatura')?></td>
    <td width="224">
    <input type="radio" name="estatura" id="estatura" value="1" <?php if($estatura==1) echo "checked"?>/> 1.50 - 1.60 <br/>
    <input type="radio" name="estatura" id="estatura" value="2" <?php if($estatura==2) echo "checked"?>/> 1.60 - 1.70 <br/>
    <input type="radio" name="estatura" id="estatura" value="3" <?php if($estatura==3) echo "checked"?>/> 1.70 - 1.80 <br/>
    </td>
    <td width="224">
    <input type="radio" name="estatura" id="estatura" value="4" <?php if($estatura==4) echo "checked"?>/> 1.80 - 1.90 <br/>
    <input type="radio" name="estatura" id="estatura" value="5" <?php if($estatura==5) echo "checked"?>/> 1.90 - 2.00 <br/>
    <input type="radio" name="estatura" id="estatura" value="6" <?php if($estatura==6) echo "checked"?>/> 2.00 - ... <br/></td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('peso')?></td>
    <td width="224">
    <input type="radio" name="peso" id="peso" value="1" <?php if($peso==1) echo "checked"?>/> 50 - 60 <br/>
    <input type="radio" name="peso" id="peso" value="2" <?php if($peso==2) echo "checked"?>/> 60 - 70 <br/>
    <input type="radio" name="peso" id="peso" value="3" <?php if($peso==3) echo "checked"?>/> 70 - 80 <br/>
    </td>
    
    <td width="224">
    <input type="radio" name="peso" id="peso" value="4" <?php if($peso==4) echo "checked"?>/> 80 - 90 <br/>
    <input type="radio" name="peso" id="peso" value="5" <?php if($peso==5) echo "checked"?>/> 90 - 100 <br/>
    <input type="radio" name="peso" id="peso" value="6" <?php if($peso==6) echo "checked"?>/> 100 - ... <br/>
    </td>
  
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('complexion')?></td>
    <td colspan="2" width="550">
    
    <select class="field" style="width:200px" name="complexion" id="complexion">
 <?php
        for ($i=0; $i < 7; $i++) { 
          echo '<option value="'.$i.'"';
           if($complexion==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_2_'.$i)."</option>";
        }
      ?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('ojos')?></td>
    <td colspan="2" width="550"> 
    <select class="field" style="width:200px" name="ojos" id="ojos">
       <?php
        for ($i=0; $i < 7; $i++) { 
          echo '<option value="'.$i.'"';
           if($ojos==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_3_'.$i)."</option>";
        }
      ?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('pelo')?></td>
    <td colspan="2" width="550">
    <select class="field" style="width:200px" name="pelo" id="pelo">
       <?php
        for ($i=0; $i < 8; $i++) { 
          echo '<option value="'.$i.'"';
           if($pelo==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_4_'.$i)."</option>";
        }
      ?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('vello')?></td>
    <td colspan="2" width="550">
    <select class="field" style="width:200px" name="vello" id="vello">
             <?php
        for ($i=0; $i < 5; $i++) { 
          echo '<option value="'.$i.'"';
           if($vello==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_5_'.$i)."</option>";
        }
      ?>
    </select>
    </td>
  <tr>
    <td width="150"><?php echo $this->lang->line('lpolla')?>  </td>
    <td colspan="2" width="550"> 
      
      <select class="field" style="width:200px" name="largopolla" id="largopolla">
       <?php
        for ($i=0; $i < 6; $i++) { 
          echo '<option value="'.$i.'"';
           if($largopolla==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_6_'.$i)."</option>";
        }
      ?>
    </select> </td>
  </tr>
  <tr>
    <td width="150">Grosor polla </td>
    <td colspan="2" width="550">

    <select class="field" style="width:200px" name="grosopolla" id="grosopolla">
       <?php
        for ($i=0; $i < 6; $i++) { 
          echo '<option value="'.$i.'"';
           if($grosopolla==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_7_'.$i)."</option>";
        }
      ?>
    </select>  </td>
  </tr>
</table>
 <!-- End Sort -->
            
          </div>
        </div>
      </div>

          <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('servicios')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
    <td width="150">Tengo sitio</td>
    <td><input type="radio" name="tsitio" id="tsitio" value="1" <?php if($tsitio==1) echo "checked"?>/>Si tengo
  <input type="radio" name="tsitio" id="tsitioi" value="2"<?php if($tsitio==2) echo "checked"?> />No tengo</td>
  </tr>
  <tr>
    <td>Tarifa en mi sitio</td>
    <td><input class="field" name="ttsitio" type="text" id="tsitio" size="50" value="<?=$ttsitio?>"/></td>
  </tr>
  <tr>
    <td>Hotel y domicilio:</td>
    <td><input type="radio" name="hotel" id="hotel" value="1" <?php if($hotel==1) echo "checked"?>/>Si
  <input type="radio" name="hotel" id="hotel" value="2" <?php if($hotel==2) echo "checked"?>/>No
  </td>
  </tr>
  <tr>
    <td>Tarifa Hotel y domicilio</td>
    <td><input class="field" name="thotel" type="text" id="thotel" size="50" value="<?=$thotel?>"/>
    </td>
  </tr>
  <tr>
    <td height="24">Acompaño a viajes:</td>
    <td><input type="radio" name="viajes" id="viajes" value="1" <?php if($viajes==1) echo "checked"?>/>Si
  <input type="radio" name="viajes" id="viajes" value="2" <?php if($viajes==2) echo "checked"?>/>No
  </td>
  </tr>
  <tr>
    <td height="24">Rol</td>
    <td><input class="field" name="roll" type="text" id="rol" size="50" value="<?=$roll?>"/></td>
  </tr>
  <tr>
    <td height="24">Especialidades</td>
    <td><textarea name="especial" id="especialidades" cols="45" rows="5"><?=$especial?></textarea></td>
  </tr>
</table>
</div>
        </div>
      </div>
<input type="submit" name="submit" value="<?php echo $this->lang->line('update')?>" class="ico del button" style="border: 1px solid #ccc">
    