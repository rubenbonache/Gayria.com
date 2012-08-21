
<?php
        $config['base_url'] = site_url('videos/');
        $config['total_rows'] = count_num_videos();
        $config['per_page'] = '9'; 
        $config['first_link']   = $this->lang->line('Inicio');
        $config['last_link']    = $this->lang->line('Final');
        $config['uri_segment']    = '2';
        $this->pagination->initialize($config);
        if(!$this->uri->segment(2))
        {
          $page = 0;
        }else
        {
          $page = $this->uri->segment(2);
        }

?>
<div class="table">

<p class="titulosficha pfinder">Busca y encuentra los mejores videos de la red.</p>

<style>

.table {}
.table th{ background:#fffdfa url(../images/th.gif) repeat-x 0 0; color:#818181; text-align: left; padding:7px 10px; border-bottom:solid 1px #d2d1cb;}
.table td{ padding:4px 0px }
.table a.ico{ }
</style>					
<table width="940px">
	<tr>

 <?
	$atts = array(
              'width'      => '800',
              'height'     => '300',
              'scrollbars' => 'no',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '100%',
              'screeny'    => '100%'
            );

  $i = 1;
	$sql = $this->db->query("SELECT * FROM videos  ORDER BY id DESC LIMIT  ".$page.", 9");
	foreach ($sql->result() as $item) { 
   
?>
<td align="center">
<table width="250" border="0">
    <tr>
    <td width="190" valign="middle" class="tablevideos"><p class="titulosvideo"><?=$item->titulo;?></p></td>
  </tr>
  <tr>
    <td>
      <a href="javascript:void(0);" onclick="window.open('<?=$item->link?>', '_blank', 'width=800,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" ><img class="videoimg" src="<?=base_url()?>upload/<?=$item->imagen?>"></a>
    </td>
  </tr>

  <tr>
    <td width="190" valign="middle" class="texvideos">ssssss</td>
  </tr>
</table>
</td>
 	  
      	    
<?	
		if($i==3) 
		{
			echo "</tr><tr>";
			$i = 0;
		}

		$i++;
}
?>
</tr>
</table>
</div>
<div style="padding-left: 45%; position: relative; width: 70px;">
  <div class="pagging">
    <?php echo $this->pagination->create_links(); ?>
  </div>
</div>
