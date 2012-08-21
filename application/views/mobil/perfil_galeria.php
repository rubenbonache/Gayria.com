<div data-role="header" data-position="inline">
	<h1>Gayria.com</h1>
</div>

<div data-role="content">
	<div class="ui-grid-a">
		<div class="ui-block-a">
		</div>
		<div class="ui-block-b">
		</div>
		<?php 
			$query = $this->db->query("SELECT * FROM galeria WHERE author = '".$this->session->userdata('id')."' ORDER BY id DESC");
			foreach($query->result() as $item):?>
		<div class="ui-block-b">
			<?php echo anchor('perfil/me/galeria/view/'.$item->id, '<img src="'.base_url().'upload/'.$item->thumb.'" width="150px">');?>
		</div>
		<? endforeach;?>
	</div>
</div>

<div data-role="footer" data-position="fixed">		
	<div data-role="navbar" data-iconpos="top">
		<ul>
			<li><?php echo anchor('/', 'Home', 'data-icon="home"')?></li>
			<li><?php echo anchor('perfil/view/3', 'Mi perfil', 'data-icon="info"')?></li>
		</ul>
	</div><!-- /navbar -->
</div><!-- /footer -->  