<?php
        $config['base_url'] = site_url('perfil/me/galeria/');
        $config['total_rows'] = count_num_galeria_user();
        $config['per_page'] = '10'; 
        $config['first_link']   = $this->lang->line('Inicio');
        $config['last_link']    = $this->lang->line('Final');
        $config['uri_segment']    = '4';
        $this->pagination->initialize($config);
        if(!$this->uri->segment(4))
        {
          $page = 0;
        }else
        {
          $page = $this->uri->segment(4);
        }

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

		<?php
		
		if($this->session->userdata('upload_data')){
		?>
		<!-- Message ok -->
		<div class="msg msg-ok">
			<p><strong><?php echo $this->lang->line('up_ok');?></strong></p>
		</div>
		<div class="cl">&nbsp;</div>
		<!-- End Message ok -->
		<?php
			$array_items = array('upload_data' => '');
			$this->session->unset_userdata($array_items);
		}
		?>
		<?php
		
		if($this->session->userdata('delete')){
		?>
		<!-- Message ok -->
		<div class="msg msg-ok">
			<p><strong><?php echo $this->lang->line('img_delete');?></strong></p>
		</div>
		<div class="cl">&nbsp;</div>
		<!-- End Message ok -->
		<?php
			$array_items = array('delete' => '');
			$this->session->unset_userdata($array_items);
		}
		?>		
		<?php
		if($this->session->userdata('error')){
		?>
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong><?php echo $this->session->userdata('error');?></strong></p>
		</div>
		<div class="cl">&nbsp;</div>
		<!-- End Message Error -->
		<?php
			$array_items = array('error' => '');
			$this->session->unset_userdata($array_items);
		}
		?>



			<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Lista de imagenes</h2>
						<div class="right">
							<a href="javascript:void(0);" class="up-button" onclick="window.open('<?php echo site_url('/service/upload/file');?>', '_blank', 'width=350,height=150,menubar=no, location=no ,status=no, titlebar=no,toolbar=no, scrolling=no, scrollbars=no,screenx=100,screeny=100');">Subir imagen</a>
						</div>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						
						<!-- Sort -->
						<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th><?php echo $this->lang->line('imagen'); ?></th>
								<th><?php echo $this->lang->line('fecha'); ?></th>
								<th><?php echo $this->lang->line('status'); ?></th>
								<th width="110" class="ac">Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM galeria WHERE author = '".$this->session->userdata('id')."' ORDER BY id DESC LIMIT ".$page.",10");
							foreach($query->result() as $item):?>

							<tr>
								<td></td>
								<td width="113"><h3><?php echo anchor('perfil/me/galeria/view/'.$item->id, '<img src="'.base_url().'upload/'.$item->thumb.'" width="100px">');?></h3></td>
								<td width="113"><?php echo mdate('%d/%m/%Y', $item->fecha);?></td>
								<td width="113"><?php echo $this->lang->line('status_'.$item->active)?></td>
								<td><?php echo img_perfil_exist($this->perfil->img_perfil(), $item->id)?>
								<?php echo anchor('service/delete/galeria/'.$item->id, $this->lang->line('borrar'), 'class="button1"'); ?></td>
							</tr>
							<?php endforeach;?>
						</table>
						
					</div>
						<!-- End Sort -->
						
					</div>
				</div>
<div style="padding-left: 45%; position: relative; width: 70px;">
  <div class="pagging">
    <?php echo $this->pagination->create_links(); ?>
  </div>
</div>

