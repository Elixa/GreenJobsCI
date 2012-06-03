
<div style="padding:20px;">
<div id="titleDesign">Listados de Nuevos Empleos</div>

<ul style="padding:10px">

<?php

foreach($jobs->result() as $job) {
?>
	<li style="padding:10px 0px">
		<h3 style="font-size:19px"><?=$job->activityinfo?></h3>
		<div style="float:lef;display:inline"><strong>Pais:</strong> <?=$job->country?></div>
		<div style="padding-left:10px;display:inline"><strong>Ciudad:</strong> <?=$job->city?></div>
		<div style="padding-left:10px;display:inline"><strong>Are&aacute;:</strong> <?=$job->principalArea?></div>
	</li>
<?php
}
?>
</ul>
</div>