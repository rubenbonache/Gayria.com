<?php
				$config['base_url'] = base_url().'admin/galeria/';
				$config['total_rows'] = count_num_galeria();
				$config['per_page'] = '10'; 
				$config['first_link']		= $this->lang->line('Inicio');
				$config['last_link']		= $this->lang->line('Final');
				$config['uri_segment']		= '3';
				$this->pagination->initialize($config);
				if(!$this->uri->segment(3))
				{
					$page = 0;
				}else
				{
					$page = $this->uri->segment(3);
				}
?>	
<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			<?php echo $this->lang->line('galeria'); ?>
			<span>&gt;</span>
			<?php echo get_user_img($this->uri->segment(4)); ?>
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->
		<?php if($this->uri->segment(3)=="delete"){?>		
		<div class="msg msg-ok">
			<p><strong>El archivo ha sido borrado</strong></p>
			<!--<a href="#" class="close">close</a>-->
		</div>
		<?php } ?>
	<!--	End Message OK -->		
		
		<!-- Message Error 
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left"><?php echo $this->lang->line('fotos_recientes'); ?></h2>
						<!--<div class="right">
							<?php echo form_open('admin/galeria/buscar');?>
							<label><?php echo $this->lang->line('por_nombre')?></label>
							<input type="text" name="nombre" class="field small-field" />
							<input type="submit" class="button" value="<?php echo $this->lang->line('buscar');?>" />
						</from>
						</div>-->
					</div>
					<!-- End Box Head -->	

					<!-- Table --> 
					<div class="form">
						
							<?php 
							$query = $this->db->query("SELECT * FROM galeria WHERE id = '".$this->uri->segment(4)."'");
							foreach($query->result() as $item):?>

							<img src="<?php echo base_url().'upload/'.$item->path;?>" width="725px">

							<?php endforeach;?>
						
						
						
						<!-- Pagging 
						<div class="pagging">
							<div class="left"><?php echo 1+$this->uri->segment(3)?>-<?php if($config['total_rows']>10){ echo 10+$this->uri->segment(3); }else{ echo $config['total_rows']; }?> of <?php echo $config['total_rows']?></div>
							<div class="right">
								<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>
						 End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->