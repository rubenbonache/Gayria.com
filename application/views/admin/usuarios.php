<?php
				$config['base_url'] = base_url().'admin/usuarios/';
				$config['total_rows'] = count_num_usuarios();
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
			<?php echo $this->lang->line('usuarios'); ?>
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK 		
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		End Message OK -->		
		
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
						<h2 class="left"><?php echo $this->lang->line('usuarios'); ?></h2>
						<div class="right">
							<label></label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="<?php echo $this->lang->line('buscar'); ?>" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table --> 
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th>Usuario</th>
								<th>Date</th>
								<th>Tipo</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM usuarios ORDER BY id DESC LIMIT  ".$page.", 10");
							foreach($query->result() as $item):?>

							<tr>
								<td></td>
								<td><?php echo anchor('admin/usuarios/views/'.$item->id, $item->name.' '.$item->apellido)?></td>
								<td>12.05.09</td>
								<td><?php echo tipo_cuenta($item->status);?></td>
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
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<a href="#" class="add-button"><span>Add new Article</span></a>
						<div class="cl">&nbsp;</div>
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">Delete Selected</a></p>
						
						<!-- Sort -->
						<div class="sort">
							<label>Sort by</label>
							<select class="field">
								<option value="">Title</option>
							</select>
							<select class="field">
								<option value="">Date</option>
							</select>
							<select class="field">
								<option value="">Author</option>
							</select>
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