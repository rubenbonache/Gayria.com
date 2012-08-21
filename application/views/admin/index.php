<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
		</div>
		<!-- End Small Nav -->
		
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
							$query = $this->db->query("SELECT * FROM galeria WHERE active = '0' ORDER BY id DESC LIMIT 0,5");
							foreach($query->result() as $item):?>

							<tr>
								<td></td>
								<td><h3><?php echo anchor('admin/galeria/view/'.$item->id, '<img src="'.base_url().'upload/'.$item->thumb.'" width="50px">');?></h3></td>
								<td><?php echo mdate('%d/%m/%Y', $item->fecha);?></td>
								<td><?php echo anchor('admin/usuarios/views/'.$item->author, get_user($item->author))?></td>
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
							</td>
							</tr>
							<?php endforeach;?>
						</table>
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left"><?php echo $this->lang->line('ult_usuarios'); ?></h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table --> 
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"></th>
								<th><?php echo $this->lang->line('usuario');?></th>
								<th><?php echo $this->lang->line('fecha');?></th>
								<th><?php echo $this->lang->line('tipo');?></th>
								<th width="110" class="ac">Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM usuarios ORDER BY id DESC LIMIT  0, 5");
							foreach($query->result() as $item):?>
							<tr>
								<td></td>
								<td><?php echo anchor('admin/usuarios/views/'.$item->id, $item->name.' '.$item->apellido)?></td>
								<td><?php echo mdate('%d/%m/%Y', $item->fecha);?></td>
								<td><?php echo tipo_cuenta($item->status);?></td>
								<td><?php echo anchor('admin/delete/user/'.$item->id, $this->lang->line('borrar'), 'class="ico del"'); ?></td>
							</tr>
							<?php endforeach;?>
						</table>
						
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
						<h2>Actividad</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<!-- Actividad -->
						<div id="activity">
							<?php
								$query = $this->db->query("SELECT * FROM actividad ORDER BY id DESC LIMIT 0,10");
							foreach ($query->result() as $item):
						echo '
						<div class="activity">
							<label>'; echo mdate('%d/%m/%Y', $item->fecha); echo '</label>
							<div style="display: inline;">'; echo anchor('admin/usuarios/views/'.$item->autor, get_user($item->autor)); echo '</div>
							<div style="display: inline;">'; echo $this->lang->line("activity_".$item->action); echo '</div>';
							
								if($item->alter!=0):
							
							echo '<div style="display: inline;"> '; echo anchor('admin/usuarios/views/'.$item->alter, get_user($item->alter)); echo '</div>';
							endif;
						
								if($item->status!=0):
							
							echo '<div style="display: inline;" class="status"> '; echo tipo_cuenta($item->status); echo ' </div>';
							endif;
						echo '</div>';
						endforeach;
							?></div>
						<!-- End Actividad -->						
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