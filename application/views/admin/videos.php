<?php
				$config['base_url'] = base_url().'index.php/admin/videos/page';
				$config['total_rows'] = count_num_videos();
				$config['per_page'] = '10'; 
				$config['first_link']		= $this->lang->line('Inicio');
				$config['last_link']		= $this->lang->line('Final');
				$config['uri_segment']		= '4';
				$this->pagination->initialize($config);
				if(!$this->uri->segment(4))
				{
					$page = 0;
				}else
				{
					$page = $this->uri->segment(4);
				}
?>	
<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			<?php echo $this->lang->line('videoss'); ?>
		</div>
		<!-- End Small Nav -->
		
		<?php
		
		if($this->session->userdata('upload_data')){
		?>
		<!-- Message ok -->
		<div class="msg msg-ok">
			<p><strong><?php echo $this->lang->line('up_ok');?></strong></p>
		</div>
		<!-- End Message ok -->
		<?php
			$array_items = array('upload_data' => '');
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
		<!-- End Message Error -->
		<?php
			$array_items = array('error' => '');
			$this->session->unset_userdata($array_items);
		}
		?>
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
						<h2 class="left"><?php echo $this->lang->line('videos'); ?></h2>
						<!--<div class="right">
							<label>search articles</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>-->
					</div>
					<!-- End Box Head -->	

					<!-- Table --> 
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th><?php echo $this->lang->line('imagen');?></th>
								<th><?php echo $this->lang->line('fecha');?></th>
								<th><?php echo $this->lang->line('titulo_video');?></th>
								<th width="110" class="ac">Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM videos ORDER BY id DESC LIMIT  ".$page.", 10");
							foreach($query->result() as $item):?>

							<tr>
								<td></td>
								<td><img src="<?php echo base_url()."upload/".$item->imagen;?>" width="50px"></h3></td>
								<td><?php echo mdate('%d/%m/%Y', $item->fecha);?></td>
								<td><?php echo $item->titulo;?></td>
								<td><a href="#" class="ico del">Delete</a></td>
							</tr>
							<?php endforeach;?>
						</table>
						
						
						<!-- Pagging -->
						<div class="pagging">
							<div class="left"><?php echo 1+$this->uri->segment(4)?>-<?php if($config['total_rows']>10){ echo 10+$this->uri->segment(4); }else{ echo $config['total_rows']; }?> of <?php echo $config['total_rows']?></div>
							<div class="right">
								<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->


			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2><?php echo $this->lang->line('add_video')?></h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						
						<!-- Sort -->
						<div class="video">
							<form action="../service/upload/do_upload" method="POST" enctype="multipart/form-data">
								<label>Titulo</label>
									<input type="text" name="titulo" size="20" class="field" />
								<label>Enlace</label>
									<input type="text" name="link" size="20" class="field" />
								<label>Imagen</label>
									<div class="upload">
										<input type="file" name="userfile" size="10" class="butto" /></input>
										<div class="button">Seleccionar</div>
									</div>
								<div class="cl">&nbsp;</div>
								<input type="submit" value="upload" class="button" />
								</form>	
								
						</div>
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->