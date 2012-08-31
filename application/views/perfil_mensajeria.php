<?php
        $config['base_url'] = site_url('perfil/me/mensajeria');
        $config['total_rows'] = count_num_msg();
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
   <li><?php echo anchor('perfil/me/favoritos', '<span>'.$this->lang->line('').'Favoritos</span>');?></li>
   <li><?php echo anchor($link.$this->session->userdata('id'), '<span>'.$this->lang->line('mi_perfil').'</span>');?></li>
   <li><?php echo anchor('service/auth/logout', '<span>'.$this->lang->line('logout').'</span>');?></li>
   <?php if($this->session->userdata('status')==2):?><li><?php echo anchor('premium', '<span style="color: red;">Premium</span>');?></li><?php endif;?>
   <?php if($this->session->userdata('status')==4):?><li><?php echo anchor('premium', '<span style="color: red;">Premium</span>');?></li><?php endif;?>
</ul>
<?php
		
		if($this->session->userdata('delete')){
		?>
		<!-- Message ok -->
		<div class="msg msg-ok">
			<p><strong><?php echo $this->lang->line('msg_delete');?></strong></p>
		</div>
		<div class="cl">&nbsp;</div>
		<!-- End Message ok -->
		<?php
			$array_items = array('delete' => '');
			$this->session->unset_userdata($array_items);
		}
		?>		
<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Mensajeria</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						
						<!-- Sort -->
						<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th width="113"><?php echo $this->lang->line('from_ms'); ?></th>
								<th width="113"><?php echo $this->lang->line('title_ms'); ?></th>
								<th width="113"><?php echo $this->lang->line('fecha'); ?></th>
								<th width="110" class="ac">Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM mensajeria WHERE para = '".$this->session->userdata('id')."' ORDER BY id DESC LIMIT ".$page.",10");
							foreach($query->result() as $item):?>

							<tr>
								<td><?=msg_leido($item->leido)?></td>
								<td width="113"><strong style="font: bold;"><?=get_user($item->de)?></strong></td>
								<td width="113"><?=$item->titulo?></td>
								<td width="113"><?php echo mdate('%d/%m/%Y', $item->date);?></td>
								<td><?php echo anchor('perfil/me/mensajeria/view/'.$item->date, $this->lang->line('leer'), 'class="button1"'); ?> <?php echo anchor('service/delete/mensajeria/'.$item->id, $this->lang->line('borrar'), 'class="button1"'); ?></td>
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