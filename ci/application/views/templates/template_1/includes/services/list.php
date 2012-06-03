<div style="padding:20px;">
<div id="titleDesign">Listados de Servicios Recientes</div>

<ul style="padding:10px">

<?php

foreach($services->result() as $service) {
?>
	<li style="padding:10px 0px">
		<h3 style="font-size:19px"><?=$service->titulo?></h3>
		<div style="float:lef;display:inline"><strong>Precio:</strong> <?=$service->precio?></div>
		<div style="padding-left:10px;display:inline"><strong>Duraci&oacute;n:</strong> <?=$service->duracion?></div>
	</li>
<?php
}
?>
</ul>
</div>