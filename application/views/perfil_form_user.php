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

<input type="hidden" name="id" value="">

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
    <td width="150"><?php echo $this->lang->line('nombre')?></td>
    <td width="550"><input class="field" name="name" type="text" id="name" size="50" value="<?php echo $name;?>"/></td>
  </tr>
  <tr>
    <td><?php echo $this->lang->line('apellidos')?></td>
    <td><input class="field" name="apellido" type="text" id="apellido" size="50" value="<?php echo $apellido;?>"/></td>
  </tr>
  <tr>
    <td><?php echo $this->lang->line('nom_user')?></td>
    <td><input class="field" name="user" type="text" id="usuario" size="50" value="<?php echo $user;?>"/></td>
  </tr>
  <tr>
    <td><?php echo $this->lang->line('email')?></td>
    <td><input class="field" name="email" type="text" id="email" size="50" value="<?php echo $email;?>"/></td>
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
</div>
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
    <td><?php echo $this->lang->line('nacimiento')?></td>
    <td colspan="3" width="550">
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
    <td width="150"><?php echo $this->lang->line('soy')?></td>
    <td colspan="3" width="550">
        <input type="radio" id="armario" name="soy" value="1" <?php if($soy==1) echo "checked"?>/> <?php echo $this->lang->line('0_0_1')?>
        <input type="radio" id="armario" name="soy" value="2" <?php if($soy==2) echo "checked"?>/> <?php echo $this->lang->line('0_0_2')?>
        <input type="radio" id="armario" name="soy" value="3" <?php if($soy==3) echo "checked"?>/> <?php echo $this->lang->line('0_0_3')?></td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('ori_sexual')?></td>
    <td colspan="3" width="550">
      <select class="field" style="width:200px" name="orientacion" id="orientacion">
      <option value="0"></option>
      <option value="1" <?php if($orientacion==1) echo "selected";?>><?php echo $this->lang->line('0_1_1')?></option>
      <option value="2" <?php if($orientacion==2) echo "selected";?>><?php echo $this->lang->line('0_1_2')?></option>
      <option value="3" <?php if($orientacion==3) echo "selected";?>><?php echo $this->lang->line('0_1_3')?></option>
      <option value="4" <?php if($orientacion==4) echo "selected";?>><?php echo $this->lang->line('0_1_4')?></option>
    </select></td>
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
    <td width="150"><?php echo $this->lang->line('idioma')?></td>
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
  <tr>
    <td width="150"><?php echo $this->lang->line('frasedia')?></td>
    <td colspan="3" width="550">
      <textarea class="field" rows="10" cols="60" name="frasedia" cols="50" rows="5"  id="frasedia"><?php echo $frasedia;?></textarea></td>
  </tr>
  </table>
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
    <td width="150"><?php echo $this->lang->line('look')?></td>
    <td colspan="2" width="550"><select class="field" style="width:200px" name="look" id="Look">
      
      <?php
        for ($i=0; $i < 10; $i++) { 
          echo '<option value="'.$i.'"';
           if($look==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_0_'.$i)."</option>";
        }
      ?>
    </select></td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('raza')?></td>
    <td colspan="2" width="550">
  
    <select class="field" style="width:200px" name="raza" id="raza">
       <?php
        for ($i=0; $i < 10; $i++) { 
          echo '<option value="'.$i.'"';
           if($raza==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('1_1_'.$i)."</option>";
        }
      ?>
      </select>
    
    </td>
  </tr>
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
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('lpolla')?> </td>
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
    </select>
 </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('gpolla')?> </td>
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
    </select>
  </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('circuns')?> </td>
    <td colspan="2" width="550">
    <input type="radio" name="circunci" id="Circunci" value="1" <?php if($circunci==1) echo "checked"?>/> <?php echo $this->lang->line('1_8_1')?> 
    <input type="radio" name="circunci" id="Circunci" value="2" <?php if($circunci==2) echo "checked"?>/> <?php echo $this->lang->line('1_8_2')?> 
    </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('pierci')?></td>
    <td colspan="2" width="550">
    <input type="radio" name="piercing" id="Piercing" value="1" <?php if($piercing==1) echo "checked"?>/> <?php echo $this->lang->line('1_9_1')?> 
    <input type="radio" name="piercing" id="Piercing" value="2" <?php if($piercing==2) echo "checked"?>/> <?php echo $this->lang->line('1_9_2')?> 
  </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('tatus')?></td>
    <td colspan="2" width="550">
    <input type="radio" name="tatus" id="tatus" value="1" <?php if($tatus==1) echo "checked"?>/> <?php echo $this->lang->line('1_10_1')?> 
    <input type="radio" name="tatus" id="tatus" value="2" <?php if($tatus==2) echo "checked"?>/> <?php echo $this->lang->line('1_10_2')?> 
  </td>
  </tr>
</table>  
</div>
        </div>
      </div>

          <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('msituacion')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
    <td width="150"><?php echo $this->lang->line('fueradel')?> </td>
    <td colspan="3">
        <input type="radio" name="armario" id="armario" value="1" <?php if($armario==1) echo "checked"?>/> <?php echo $this->lang->line('2_0_1')?>  <br/>
        <input type="radio" name="armario" id="armario" value="2" <?php if($armario==2) echo "checked"?>/> <?php echo $this->lang->line('2_0_2')?>  <br/>
        <input type="radio" name="armario" id="armario" value="3" <?php if($armario==3) echo "checked"?>/> <?php echo $this->lang->line('2_0_3')?>  <br/>
        <input type="radio" name="armario" id="armario" value="4" <?php if($armario==4) echo "checked"?>/> <?php echo $this->lang->line('2_0_4')?>  <br/>
   </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('spareja')?> </td>
    <td colspan="3">
        <input type="radio" name="situacion" id="situacion" value="1" <?php if($situacion==1) echo "checked"?>/> <?php echo $this->lang->line('2_2_1')?>  <br/>
        <input type="radio" name="situacion" id="situacion" value="2" <?php if($situacion==2) echo "checked"?>/> <?php echo $this->lang->line('2_2_2')?>  <br/>
        <input type="radio" name="situacion" id="situacion" value="3" <?php if($situacion==3) echo "checked"?>/> <?php echo $this->lang->line('2_2_3')?>  <br/>
    </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('actitud')?> </td>
    <td colspan="3">
        <input type="radio" name="actitud" id="actitud" value="1" <?php if($actitud==1) echo "checked"?>/> <?php echo $this->lang->line('2_3_1')?>  <br/>
        <input type="radio" name="actitud" id="actitud" value="2" <?php if($actitud==2) echo "checked"?>/> <?php echo $this->lang->line('2_3_2')?>  <br/>
        <input type="radio" name="actitud" id="actitud" value="3" <?php if($actitud==3) echo "checked"?>/> <?php echo $this->lang->line('2_3_3')?>  <br/>
        <input type="radio" name="actitud" id="actitud" value="4" <?php if($actitud==4) echo "checked"?>/> <?php echo $this->lang->line('2_3_4')?>  <br/>
    </td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('bgente')?> </td>
    <td colspan="3"><select class="field" style="width:200px" name="busco" id="busco">
      <option value="0"></option>
      <option value="1" <?php if($busco==1) echo "selected";?>> 18 - 25</option>
      <option value="2" <?php if($busco==2) echo "selected";?>> 25 - 30</option>
      <option value="3" <?php if($busco==3) echo "selected";?>> 30 - 40</option>
      <option value="5" <?php if($busco==4) echo "selected";?>> 45 - 55</option>
      <option value="6" <?php if($busco==5) echo "selected";?>> 55 - 100</option>

      </select></td>
  </tr>
  <tr>
    <td width="150"><?php echo $this->lang->line('qbusco')?> </td>
    <td width="141">
       <input type="checkbox" name="quebusco[1]" id="quebusco" value="1" <?php if(@in_array(1, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_1')?>  <br/>
       <input type="checkbox" name="quebusco[2]" id="quebusco" value="2" <?php if(@in_array(2, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_2')?>  <br/>
       <input type="checkbox" name="quebusco[3]" id="quebusco" value="3" <?php if(@in_array(3, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_3')?> <br/>
    </td>
    <td width="116">
      <input type="checkbox" name="quebusco[4]" id="quebusco" value="4" <?php if(@in_array(4, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_4')?> <br/>
      <input type="checkbox" name="quebusco[5]" id="quebusco" value="5" <?php if(@in_array(5, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_5')?>  <br/>       
      <input type="checkbox" name="quebusco[6]" id="quebusco" value="6" <?php if(@in_array(6, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_6')?>   <br/>
    </td>
    <td width="129">
       <input type="checkbox" name="quebusco[8]" id="quebusco" value="7" <?php if(@in_array(7, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_7')?>  <br/>
       <input type="checkbox" name="quebusco[9]" id="quebusco" value="8" <?php if(@in_array(8, $quebusco)) echo 'checked';?>/> <?php echo $this->lang->line('2_4_8')?>  </td>
  </tr>
  </table>
</div>
        </div>
      </div>

          <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('mgustos')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
    <td width="150"><?php echo $this->lang->line('tabaco')?></td>
    <td colspan="3" width="550">
    <select class="field" style="width:200px" name="tabaco" id="tabaco">
       <?php
        for ($i=0; $i < 5; $i++) { 
          echo '<option value="'.$i.'"';
           if($tabaco==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('3_0_'.$i)."</option>";
        }
      ?>
    </select>
    </td>
  <tr>
    <td width="150"><?php echo $this->lang->line('alcohol')?></td>
    <td colspan="3" width="550">
     <select class="field" style="width:200px" name="alcohol" id="Alcohol">
       <?php
        for ($i=0; $i < 5; $i++) { 
          echo '<option value="'.$i.'"';
           if($alcohol==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('3_1_'.$i)."</option>";
        }
      ?>
    </select>
    </td>
  <tr>
    <td width="150"><?php echo $this->lang->line('drogas')?></td>
    <td colspan="3" width="550">
    <select class="field" style="width:200px" name="drogas" id="Drogas">
       <?php
        for ($i=0; $i < 5; $i++) { 
          echo '<option value="'.$i.'"';
           if($drogas==$i) { echo "selected"; } 
           echo '>';
           echo $this->lang->line('3_2_'.$i)."</option>";
        }
      ?>
    </select>
    </td>
  <tr>
    <td width="150"><?php echo $this->lang->line('afici')?></td>
    <td width="124"> 
     <input type="checkbox" name="aficiones[1]" id="aficiones" value="1" <?php if(@in_array(1, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_1')?>  <br/>
     <input type="checkbox" name="aficiones[2]" id="aficiones" value="2" <?php if(@in_array(2, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_2')?>  <br/>
     <input type="checkbox" name="aficiones[3]" id="aficiones" value="3" <?php if(@in_array(3, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_3')?> <br/>
      </td>
    
    <td width="119">
    
     <input type="checkbox" name="aficiones[4]" id="aficiones" value="4" <?php if(@in_array(4, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_4')?> <br/>
     <input type="checkbox" name="aficiones[5]" id="aficiones" value="5" <?php if(@in_array(5, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_5')?> <br/>
     <input type="checkbox" name="aficiones[6]" id="aficiones" value="6" <?php if(@in_array(6, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_6')?>   <br/>
    </td>
    
    <td width="137">
     <input type="checkbox" name="aficiones[7]" id="aficiones" value="7" <?php if(@in_array(7, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_7')?> <br/>
     <input type="checkbox" name="aficiones[8]" id="aficiones" value="8" <?php if(@in_array(8, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_8')?>  <br/>
     <input type="checkbox" name="aficiones[9]" id="aficiones" value="9" <?php if(@in_array(9, $aficiones)) echo 'checked';?>/> <?php echo $this->lang->line('3_3_9')?> 
    </td>
  </table>
</div>
        </div>
      </div>

       <div class="box">
          
          <!-- Box Head -->
          <div class="box-head">
            <h2><?php echo $this->lang->line('msexual')?></h2>
          </div>
          <!-- End Box Head-->
          
          <div class="box-content">
            
            <!-- Sort -->
            <div class="form">
<table class="table" width="730" border="0">
  <tr>
    <td width="150"><?php echo $this->lang->line('fideli')?></td>
    <td colspan="3">
    <select class="field" style="width:200px" name="fidelidad" id="fidelidad">
      <option value="0"></option>
      <option value="1" <?php if($fidelidad==1) echo "selected";?>><?php echo $this->lang->line('4_0_1')?></option>
      <option value="2" <?php if($fidelidad==2) echo "selected";?>><?php echo $this->lang->line('4_0_2')?></option>
      <option value="3" <?php if($fidelidad==3) echo "selected";?>><?php echo $this->lang->line('4_0_3')?></option>
    </select>
    </td>
  <tr>
    <td><?php echo $this->lang->line('rol')?></td>
    <td colspan="3">
     <select class="field" style="width:200px" name="rol" id="rol">
      <option value="0"></option>
      <option value="1" <?php if($rol==1) echo "selected";?>><?php echo $this->lang->line('4_1_1')?></option>
      <option value="2" <?php if($rol==2) echo "selected";?>><?php echo $this->lang->line('4_1_2')?></option>
      <option value="3" <?php if($rol==3) echo "selected";?>><?php echo $this->lang->line('4_1_3')?></option>
      <option value="4" <?php if($rol==4) echo "selected";?>><?php echo $this->lang->line('4_1_4')?></option>
      <option value="5" <?php if($rol==5) echo "selected";?>><?php echo $this->lang->line('4_1_5')?></option>
    </select>
    </td>
  <tr>
    <td><?php echo $this->lang->line('sexsegur')?></td>
    <td colspan="3"><select class="field" style="width:200px" name="sexosegur" id="sexsegur">
      <option value="0"></option>
      <option value="1" <?php if($sexosegur==1) echo "selected";?>><?php echo $this->lang->line('4_2_1')?></option>
      <option value="2" <?php if($sexosegur==2) echo "selected";?>><?php echo $this->lang->line('4_2_2')?></option>
      <option value="3" <?php if($sexosegur==3) echo "selected";?>><?php echo $this->lang->line('4_2_3')?></option>
      <option value="4" <?php if($sexosegur==4) echo "selected";?>><?php echo $this->lang->line('4_2_4')?></option>
    </select></td>
  <tr>
    <td><?php echo $this->lang->line('chqmg')?></td>
    <td width="134">
      <?php
        for ($i=1; $i < 12; $i++) { 
          echo '<input type="checkbox" name="tipochico['.$i.']" id="tipochico" value="'.$i.'"'; if(@in_array($i, $tipochico)) echo 'checked'; echo '/> '.$this->lang->line('4_3_'.$i).'<br/>';
        }
      ?>
    
    </td>
    <td width="195">
      <?php
        for ($i=12; $i < 23; $i++) { 
          echo '<input type="checkbox" name="tipochico['.$i.']" id="tipochico" value="'.$i.'"'; if(@in_array($i, $tipochico)) echo 'checked'; echo '/> '.$this->lang->line('4_3_'.$i).'<br/>';
        }
      ?>
    
   </td>
    <td width="190"> 
    <?php
        for ($i=23; $i < 34; $i++) { 
          echo '<input type="checkbox" name="tipochico['.$i.']" id="tipochico" value="'.$i.'"'; if(@in_array($i, $tipochico)) echo 'checked'; echo '/> '.$this->lang->line('4_3_'.$i).'<br/>';
        }
      ?>	   
	   </td>
  <tr>
    <td><?php echo $this->lang->line('fetiches')?></td>
    <td>
<?php
        for ($i=1; $i < 11; $i++) { 
          echo '<input type="checkbox" name="fetiches['.$i.']" id="fetiches" value="'.$i.'"'; if(@in_array($i, $fetiches)) echo 'checked'; echo '/> '.$this->lang->line('4_4_'.$i).'<br/>';
        }
      ?>
    </td>
    <td>
<?php
        for ($i=11; $i < 21; $i++) { 
          echo '<input type="checkbox" name="fetiches['.$i.']" id="fetiches" value="'.$i.'"'; if(@in_array($i, $fetiches)) echo 'checked'; echo '/> '.$this->lang->line('4_4_'.$i).'<br/>';
        }
      ?>
    
    </td>
    <td>
<?php
        for ($i=21; $i < 30; $i++) { 
          echo '<input type="checkbox" name="fetiches['.$i.']" id="fetiches" value="'.$i.'"'; if(@in_array($i, $fetiches)) echo 'checked'; echo '/> '.$this->lang->line('4_4_'.$i).'<br/>';
        }
      ?>
     </td>
  <tr>
    <td><?php echo $this->lang->line('megusta')?></td>
    <td>
      <?php
        for ($i=1; $i < 17; $i++) { 
          echo '<input type="checkbox" name="psexuales['.$i.']" id="psexuales" value="'.$i.'"'; if(@in_array($i, $psexuales)) echo 'checked'; echo '/> '.$this->lang->line('4_5_'.$i).'<br/>';
        }
      ?>

    </td>
    <td>
      <?php
        for ($i=17; $i < 33; $i++) { 
          echo '<input type="checkbox" name="psexuales['.$i.']" id="psexuales" value="'.$i.'"'; if(@in_array($i, $psexuales)) echo 'checked'; echo '/> '.$this->lang->line('4_5_'.$i).'<br/>';
        }
      ?>
    </td>
    <td>
     <?php
        for ($i=33; $i < 49; $i++) { 
          echo '<input type="checkbox" name="psexuales['.$i.']" id="psexuales" value="'.$i.'"'; if(@in_array($i, $psexuales)) echo 'checked'; echo '/> '.$this->lang->line('4_5_'.$i).'<br/>';
        }
      ?>
    </td>
    
  </table>
</div>
        </div>
      </div>
<input type="submit" name="submit" value="<?php echo $this->lang->line('update')?>" class="ico del button" style="border: 1px solid #ccc">
       