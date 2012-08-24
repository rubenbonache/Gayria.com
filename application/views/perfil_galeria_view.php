<?
  if($this->session->userdata('status')<4)
  {
    $link = 'perfil/view/';
  }else
  {
    $link = 'chaperos/item/';
  }
?>
<div id="cssmenu" class='cssmenu'>
<ul>
   <li><?php echo anchor('perfil/me/', '<span>'.$this->lang->line('info').'</span>');?></li>
   <li><?php echo anchor('perfil/me/galeria', '<span>'.$this->lang->line('galeria').'</span>');?></li>
   <li><?php echo anchor('perfil/me/mensajeria', '<span>'.$this->lang->line('mensajeria').' '.$this->perfil->msg_read($this->session->userdata('id')).'</span>');?></li>
   <li><?php echo anchor($link.$this->session->userdata('id'), '<span>'.$this->lang->line('mi_perfil').'</span>');?></li>
   <li><?php echo anchor('service/auth/logout', '<span>'.$this->lang->line('logout').'</span>');?></li>
   <?php if($this->session->userdata('status')==2):?><li><?php echo anchor('premium', '<span style="color: red;">Premium</span>');?></li><?php endif;?>
   <?php if($this->session->userdata('status')==4):?><li><?php echo anchor('premium', '<span style="color: red;">Premium</span>');?></li><?php endif;?>
</ul>
</div>
			<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Lista de imagenes</h2>
						<div class="right">
							<a href="javascript:void(0);" class="up-button" onclick="window.open('<?=site_url('index.php/service/upload/file')?>', '_blank', 'width=300,height=100,scrollbars=yes,status=yes,resizable=yes,screenx=500,screeny=400');">Subir imagen</a>
						</div>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						
		
							<?php 
							$query = $this->db->query("SELECT * FROM galeria WHERE id = '".$this->uri->segment(5)."'");
							foreach($query->result() as $item):?>

							<img src="<?=base_url()?>upload/<?=$item->path?>" width="940px">
							
							<?php endforeach;?>
						
					</div>
				</div>

