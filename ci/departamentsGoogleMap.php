
	<script type="text/javascript">
    var departaments = [
		<?php
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Esperanza<br/>Empresa auspiciadora: Tricom<br/></div></div>\', 19.847053, -71.585433, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Planta un arbol<br/>Empresa auspiciadora: Claro<br/></div></div>\', 17.766507, -71.585433, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Vive el verde<br/>Empresa auspiciadora: Orange<br/></div></div>\', 18.283638, -71.585433, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Tierra sana<br/>Empresa auspiciadora: Planeta azul<br/></div></div>\', 18.283638, -71.585433, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Aire limpio<br/>Empresa auspiciadora: Google<br/></div></div>\', 18.257557, -68.693197, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Medio ambiente<br/>Empresa auspiciadora: Intellisys<br/></div></div>\', 19.136898, -70.88085, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Planeta verde<br/>Empresa auspiciadora: Microsoft dominicana<br/></div></div>\', 19.294457, -70.732535, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Embasadora de gas natural<br/>Empresa auspiciadora: Emprende<br/></div></div>\', 19.260753, -70.88085, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Itla verde<br/>Empresa auspiciadora: ITLA<br/></div></div>\', -69.312552, -70.88085, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Siembra un arbol<br/>Empresa auspiciadora: Imperio<br/></div></div>\', 19.809508, -70.78472, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Puerto plata renovable<br/>Empresa auspiciadora: Cereveceria nacional<br/></div></div>\', 19.04654145543356, -70.6228636796875, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Aeolica samana<br/>Empresa auspiciadora: Cocalola internacional<br/></div></div>\', 18.911483365526077, -69.66155996875, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Conservacion del suelo<br/>Empresa auspiciadora: Industria y comercio<br/></div></div>\', 18.667063335642737, -69.6890257890625, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Hidroelectrica norte<br/>Empresa auspiciadora: AES dominicana<br/></div></div>\', 18.99460899662259, -71.2271117265625, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Energia limpia<br/>Empresa auspiciadora: CDEEE<br/></div></div>\', 18.64624528640438, -70.84808340625, 4],';
			echo '[\'<div style="width:300px;"><div style="float:left;padding-right:5px;"></div><div style="text-align:left;">Proyecto: Proyecto recicla<br/>Empresa auspiciadora: INTEC<br/></div></div>\', 18.50044760233181, -69.9417113359375, 4],';
			
		?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(18.812718, -70.298767),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < departaments.length; i++) 
	{  
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(departaments[i][1], departaments[i][2]),
			map: map,
			icon: './tree.png'
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) 
		{
			return function() 
			{
			infowindow.setContent(departaments[i][0]);
			infowindow.open(map, marker);
			}
		})(marker, i));
    }
	
	function closeJfancy()
	{
		//Cerrar Jfancy
		$.Jfancy.close();	
		return false;
	}	
  </script>

	
	<table border="0" cellspacing="0" cellpadding="10" width="700">
		<tr>
			<td>
				<span class="titleStyle">Ubicaciones geograficas de todos proyectos verdes en el pais actualmente:</span>
			</td>
		</tr>
		<tr>
			<td align="center">
				<div id="map" style="width: 700px; height: 450px; border:1px #494949 solid;"></div>
			</td>
		</tr>
		<tr>
			<td align="left">
				<input type="submit" name="btmCalcel" value="Salir" class="btmStyle" onClick="return closeJfancy();">
			</td>
		</tr>
	</table>

