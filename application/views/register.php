<div style="padding-top: 34px"></div>
<div class="wrapper">
	<div class="grid_6">
		<div class="pad-left-1 pad-right-1" style="padding-left: 20px;">
			<h3><? echo $this->lang->line('titulo_usuarios')?></h3>
			<p><?=$this->lang->line('text_usuarios')?></p>
			 <div class="wrapper">
                 <img src="<?=base_url()?>static/images/normal.jpg" alt="" class="img-indent">
                 <div class="extra-wrap">
	                 
	                 <p><?php echo anchor('/register/user', $this->lang->line('registro'), 'class="button"')?></p>
                 </div>
            </div>
		</div>
	</div>
	<div class="grid_6">
		<div class="pad-left-2 pad-right-1">
			<h3><? echo $this->lang->line('titulo_chaperos')?></h3>
			<p><?=$this->lang->line('text_chaperos')?></p>
				<div class="wrapper">
                 <img src="<?=base_url()?>static/images/profesional.jpg" alt="" class="img-indent">
                 <div class="extra-wrap">
	                 
	                 <p><?php echo anchor('/register/pro', $this->lang->line('registro'), 'class="button"')?></p>
                 </div>
            </div>
		</div>
	</div>
</div>
<div class="vr-border-r"></div>