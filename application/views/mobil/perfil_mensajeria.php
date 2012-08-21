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

?>
	<div data-role="header" data-position="inline">
		<h1>Gayria.com</h1>
	</div>
	<div data-role="content">   
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

		<ul data-role="listview" data-theme="d" data-divider-theme="d">
			<li data-role="list-divider">Mensajeria</li>

							<?php 
							$query = $this->db->query("SELECT * FROM mensajeria WHERE para = '".$this->session->userdata('id')."' ORDER BY id DESC LIMIT ".$page.",10");
							foreach($query->result() as $item):?>

			<li<? if($item->leido==1) echo ' data-theme="a"';?>><a href="<?php echo site_url('perfil/me/mensajeria/view/'.$item->date)?>" data-transition="slide">
				
					<h3><?=get_user($item->de)?></h3>
					<p><strong><?=$item->titulo?></strong></p>
					<p><?=character_limiter($item->texto, 20);?></p>
					<p class="ui-li-aside"><strong><?php echo mdate('%H:%i @ %d/%m/%Y', $item->date);?></strong></p>
				
			</a></li>
							<?php endforeach;?>
			</ul>			
</div>

	<div data-role="footer" data-position="fixed">		
		<div data-role="navbar" data-iconpos="top">
			<ul>
				<li><?php echo anchor('/', 'Home', 'data-icon="home"')?></li>
				<li><?php echo anchor('perfil/view/3', 'Enviar mensaje', 'data-icon="info"')?></li>
				<li><?php echo anchor('perfil/view/3', 'Mi perfil', 'data-icon="info"')?></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->