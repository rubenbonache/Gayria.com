
<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			<?php echo $this->lang->line('stats'); ?>
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
						<h2 class="left"><?php echo $this->lang->line('user_online'); ?></h2>
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
								<th>IP</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php 
							$query = $this->db->query("SELECT * FROM ci_sessions ORDER BY last_activity DESC");
							foreach($query->result() as $item):
								$custom_data = unserialize($item->user_data);
							?>
							<tr>
								<td></td>
								<td><?php echo get_user_activity($custom_data)?></td>
								<td><?php echo mdate('%d/%m/%Y-%H:%i', $item->last_activity)?></td>
								<td><?php echo $item->user_agent;?></td>
								<td><?php echo $item->ip_address;?></td>
								<td><a href="#" class="ico del">Delete</a></td>
							</tr>
							<?php endforeach;?>
						</table>
						
						
						<!-- Pagging -->
						<div class="pagging">
							<div class="left"></div>
							<div class="right"></div>
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