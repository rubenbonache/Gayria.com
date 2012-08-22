<div style="padding-top: 34px"></div>
<div class="wrapper">
	<div class="grid_6">
		<div class="pad-left-1 pad-right-1" style="padding-left: 20px;">
			<h3></h3>
			
    <h3 align="center">Miles de amigos y videos te esperan, inicia tu sesión y disfruta de lo mejor de la red.</h3>
		</div>
	</div>
	<div class="grid_6">
		<div class="pad-left-2 pad-right-1 curvas" style="background-color: #3e1f36;">
			
			                                <? if($this->session->userdata('fail')) { ?>
                                 <!--Message Error--> 
                                
                                   <font class="err-login"><?php echo $this->session->userdata('fail')?></font>
                                    
                             
                                <?php 
                                    $this->session->unset_userdata(array('fail' => ''));
                                } ?>
                                <?php echo form_open('service/auth');?>
                                <input type="hidden" name="referer" value="<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>">
                                <div class="login">
                                    <p class="text-1">
                                        <label><?=$this->lang->line('mail')?></label>
                                        <input type="text" name="email" class="field size1">
                                    </p>
                                    <p class="text-1">
                                        <label><?=$this->lang->line('pass')?></label>
                                        <input type="password" name="pass" class="field size1">
                                    </p>
                                    <p class="text-1">
                                        <input type="submit" value="<?=$this->lang->line('button_entrar')?>" class="button-1">
                                        <?=anchor('perfil/pass_recovery',$this->lang->line('rec_pass'), 'class="link-1 right"')?>/form>
                                    </p>
                                    
                                </div>
            
		</div>
	</div>
</div>
<div class="vr-border-r"></div>
