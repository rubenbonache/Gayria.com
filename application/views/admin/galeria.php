<?php
				$config['base_url'] = base_url().'admin/galeria/page';
				$config['total_rows'] = count_num_galeria();
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
			<?php echo $this->lang->line('galeria'); ?>
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->
		<?php if($this->uri->segment(3)=="ok"){?>		
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
						<div class="right">
							<?php echo form_open('admin/galeria/buscar');?>
							<label><?php echo $this->lang->line('por_nombre')?></label>
							<input type="text" name="nombre" class="field small-field" />
							<input type="submit" class="button" value="<?php echo $this->lang->line('buscar');?>" />
						</from>
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table --> 
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th><?php echo $this->lang->line('imagen'); ?></th>
								<th><?php echo $this->lang->line('fecha'); ?></th>
								<th><?php echo $this->lang->line('add_por'); ?></th>
								<th><?php echo $this->lang->line('status'); ?></th>
								<th width="110" class="ac">Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM galeria ORDER BY id DESC LIMIT  ".$page.", 10");
							foreach($query->result() as $item):?>

							<tr>
								<td></td>
								<td><h3><?php echo anchor('admin/galeria/view/'.$item->id, '<img src="'.base_url().'upload/'.$item->thumb.'" width="50px">');?></h3></td>
								<td><?php echo mdate('%d/%m/%Y', $item->fecha);?></td>
								<td><?php echo anchor('admin/galeria/user/'.$item->author, get_user($item->author))?></td>
								<td><?php echo $this->lang->line('status_'.$item->active)?></td>
								<td>
								<?php echo form_open_multipart('admin/galeria/control');?>
										<select name="control" class="field" onchange="this.form.submit()">
										<option></option>
										<option value="2"><?=$this->lang->line('no_valido')?></option>
										<option value="1"><?=$this->lang->line('validar')?></option>
										<option value="3"><?=$this->lang->line('borrar')?></option>
									</select>
									<input type="hidden" name="id" value="<?=$item->id?>">
									<noscript><input type="submit" name="continuar" value="continuar"></noscript>
								</form>
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
			
			
			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->