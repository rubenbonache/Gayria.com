<div class='cssmenu'>
<ul>
   <li><? echo anchor('perfil/me/', '<span>'.$this->lang->line('info').'</span>');?></li>
   <li><? echo anchor('perfil/me/galeria', '<span>'.$this->lang->line('galeria').'</span>');?></li>
   <li><? echo anchor('perfil/me/mensajeria', '<span>'.$this->lang->line('mensajeria').' '.$this->perfil->msg_read($this->session->userdata('id')).'</span>');?></li>
   <li><?php echo anchor('perfil/view/'.$this->session->userdata('id'), '<span>'.$this->lang->line('mi_perfil').'</span>');?></li>
   <li><? echo anchor('service/auth/logout', '<span>'.$this->lang->line('logout').'</span>');?></li>
   <? if($this->session->userdata('status')==2):?><li><? echo anchor('premium', '<span style="color: red;">Premium</span>');?></li><? endif;?>
</ul>
</div>
<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left"><?=$titulo?></h2>
						<div class="right">
							<a href="javascript:void(0);" class="mail-button" onclick="window.open('<?=site_url('service/mensajeria/responder')?>/<?=$de?>/<?=$id?>', '_blank', 'width=1000,height=400,scrollbars=no,status=no,resizable=no,screenx=200,screeny=200');">Responder</a>
						</div>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						
						<!-- Sort -->
						<div class="table">
						<table>
							<tr>
								<td>
									<p><?=nl2br($texto)?></p>
								</td>
							</tr>
						</table>
						
					</div>
						<!-- End Sort -->
						
					</div>
				</div>
