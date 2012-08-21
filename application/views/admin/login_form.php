<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Login - Gayria.com</title>
	<link rel="stylesheet" href="<?php echo base_url();?>static/css/style-admin.css" type="text/css" media="all" />
</head>
<body>


<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK 		
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		End Message OK -->		
		<? if($fail) { ?>
		 <!--Message Error--> 
		<div class="msg msg-error">
			<p><strong><?php echo $fail?></strong></p>
			
		</div>
		<?php } ?>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="login">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Login</h2>
					</div>
					<!-- End Box Head -->
					
					
					<?php echo form_open('service/auth');?>
						<!-- Form -->
						<div class="form">
							
								<p>
									<label id="usuario" value="Usuario">
										<?php echo $this->lang->line('usuario'); ?></label>
									<input type="text" value="" name="user" class="field">
								</p>
								<p>
									<label id="passw" value="passw">
										<?php echo $this->lang->line('pass'); ?></label>
									<input type="password" value="" name="pass" class="field">
								</p>	
							
						</div>
						<!-- End Form -->
					
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" value="<?php echo $this->lang->line('enviar'); ?>" name="submit" class="button">
						</div>
						<!-- End Form Buttons -->
					</form>
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

	
</body>
</html>
