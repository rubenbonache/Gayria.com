<div data-role="header" data-position="inline">
	<?php echo anchor('perfil/me/mensajeria', ' ', 'data-transition="slide" data-direction="reverse" data-icon="arrow-l" data-iconpos="notext"');?>
	<h1>Gayria.com</h1>
</div><div data-role="content">   
	<ul data-role="listview" data-theme="d" data-divider-theme="d">
		<li data-role="list-divider"><?=$titulo?></li>
		<li><?=nl2br($texto)?></li>
	</ul>
</div>
