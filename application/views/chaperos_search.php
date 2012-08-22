
<?php
        $config['base_url'] = site_url('chaperos/search');
        $config['total_rows'] = count_num_chaperos_find();
        $config['per_page'] = '9'; 
        $config['first_link']   = $this->lang->line('Inicio');
        $config['last_link']    = $this->lang->line('Final');
        $config['uri_segment']    = '3';
        $this->pagination->initialize($config);
        $this->perfil->buscar();

        $fields = json_decode($this->perfil->buscar(), true);

        if(!$this->uri->segment(3))
        {
          $page = 0;
        }else
        {
          $page = $this->uri->segment(3);
        }

        foreach ($fields as $key => $value) {
           if($value=='')
           { 
           }else{
            if(is_array($value))
            {
              foreach ($value as $key => $value) {
                $this->db->or_like('idiomas', $value, 'both');
              }
            }
            else{
              $this->db->or_like($key, $value, 'both'); 
            }
          }
        }

?>
<div class="table">
  
<p class="titulosficha pfinder">Busca y encuentra gente o amigos.</p>

<table width="100%">
  <tr>
    <td width="340px">
    <div class="finder">
    <table width="100%" border="1">
  <tr>
    <td width="35%">
     <p>Por nombre:</p>
      <form id="form1" name="form1" method="post" action="<?=site_url('chaperos/search')?>">
        <label for="nombre"></label>
        <input name="nombre" type="text" id="nombre" class="field" size="40" />

     </td>
  </tr>
  <tr>
    <td>
     <p>Pais:</p>
      <select class="field" style="width:200px" name="pais" id="pais">
        <option></option>
        <?php
        $query = $this->db->query('SELECT * FROM paises');
        foreach ($query->result() as $value) {
          echo '<option value="'.$value->id.'">'.$value->pais.'</option>';
        }
        ?>
      </select>
     </td>
   </tr>
   <tr>
    <td>
      <p>Provincia / Estado:</p>
      <select class="field" style="width:200px" name="estado" id="estado">
        <option></option>
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
    <td> 
       <p>Busco:</p>
       <input type="radio" id="armario" name="soy" value="1" /> Hombre
       <input type="radio" id="armario" name="soy" value="2" /> Mujer
       <input type="radio" id="armario" name="soy" value="3" /> Transexual
    </td>
  </tr>
  <tr>
    <td>
       <p>Orientación sexual:</p>
       <select class="field" style="width:200px" name="orientacion" id="orientacion">
       <option value="0"></option>
       <option value="1" >Gay</option>
       <option value="2" >Heterosexual</option>
       <option value="3" >Bisexual</option>
       <option value="4" >Bicurioso</option>
       </select>
    </td>
  </tr>
  <tr>
    <td>
        <p>Por idioma: </p>
        <table width="100%" border="1">
        <tr>
          <td width="33%"><input type="checkbox" name="idiomas[1]" id="idiomas" value="1" /> Español<br/>
            <input type="checkbox" name="idiomas[2]" id="idiomas" value="2" /> Ingles<br/>
            <input type="checkbox" name="idiomas[3]" id="idiomas" value="3" /> Aleman<br/>
          </td>
          <td width="33%"><input type="checkbox" name="idiomas[4]" id="idiomas" value="4" />Italiano<br/>
            <input type="checkbox" name="idiomas[5]" id="idiomas" value="5" /> Frances<br/>
            <input type="checkbox" name="idiomas[6]" id="idiomas" value="6" /> Noruego<br/>
          </td>
          <td width="34%"><input type="checkbox" name="idiomas[7]" id="idiomas" value="7" /> Ruso<br/>
            <input type="checkbox" name="idiomas[8]" id="idiomas" value="8" /> Catalan<br/>
            <input type="checkbox" name="idiomas[9]" id="idiomas" value="9" /> Valenciano<br/>
          </td>
        </tr>
      </table>
      <input type="submit" name="button" id="button" class="button-1" value="Buscar" />
    </td>
  </tr>      
</table>
</div>
    </td>
    <td>

<ul>

 <?

  $i = 1;
  //$sql = $this->db->query("SELECT * FROM usuarios WHERE status < 4 ORDER BY id DESC LIMIT  ".$page.", 9");

         $this->db->where('status >', 3);
  $sql = $this->db->get('usuarios', 9, $page);


  foreach ($sql->result() as $item) { 
   if($item->user=='Admin'){}else{
?>
<li style="border-bottom: 1px solid #eee;">
<table>
  <tr>
    <td>
       <?
      if( ! $item->fotoperfil)
      {
        echo '<img src="http://gayria.com/imagenodisp.jpg" width="75px">';
      }else
      {
        echo '<img src="'.base_url().'upload/'.img_perfil($item->fotoperfil).'" width="75px">';
      }
    ?>
    </td>
    <td width="275px">
    <?=anchor('chaperos/item/'.$item->id, $item->name.' '.$item->apellido, 'class="link-list"')?>
    <p> <?php
        $query = $this->db->query('SELECT * FROM estados WHERE id = "'.$item->estado.'"');
        foreach ($query->result() as $value) {
          echo $value->estado;
        }
        ?>,
       <?php
        $query = $this->db->query('SELECT * FROM paises WHERE id = "'.$item->pais.'"');
        foreach ($query->result() as $value) {
          echo $value->pais;
        }
        ?></p>
    </td>
    <td>
       <?
       if($this->session->userdata('status'))
      {
        $q = mysql_query("SELECT iduser,idfriend FROM friend WHERE iduser='".$this->session->userdata('id')."' AND idfriend='$item->id'") or die(mysql_error());
  $num=mysql_num_rows($q);
  if($num>0){
?>
  <div id="remove<? echo $item->id;?>"><a href="javascript:void(0);" class="remove" id="<? echo $item->id;?>"><span>Quitar Favorito</span></a></div>
    <div id="follow<? echo $item->id;?>" style="display:none"><a href="javascript:void(0);" class="follow" id="<? echo $item->id;?>"><span>Añadir Favorito</span></a></div>
<? }else{ ?>
    <div id="follow<? echo $item->id;?>"><a href="javascript:void(0);" class="follow" id="<? echo $item->id;?>"><span>Añadir Favorito</span></a></div>
    <div id="remove<? echo $item->id;?>" style="display:none"><a href="javascript:void(0);" class="remove" id="<? echo $item->id;?>"><span>Quitar Favorito</span></a></div>
<? } 
}
?>
    </td>
  </tr>
</table>
</li>

            
<?  
   /*if($i==2) 
    {
      echo "</tr><tr>";
      $i = 0;
    }

    $i++;*/
}
}
?>
</ul>
Total = <?=$config['total_rows']?>
    </td>
  </tr>
</table>
</form>
</div>
<div style="padding-left: 45%; position: relative; width: 70px;">
  <div class="pagging">
    <?php echo $this->pagination->create_links(); ?>
  </div>
</div>
