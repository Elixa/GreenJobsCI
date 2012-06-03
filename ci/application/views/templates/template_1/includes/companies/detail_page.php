<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr>
		<td>
<?php
	echo $company -> name;
?>	
		</td>	
	</tr>
	<tr>
		<td>
			[imagen]
		</td>
	</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td>
			Servicios:
			<br/>
			<table cellspacing="0" cellpadding="0" border="0">
<?php	
	foreach ($services->result() as $data)
	{
		echo '
		<tr>
			<td width="100">
				'.$data -> titulo. '
			</td>
			<td>
				'.$data -> ubicacion. '
			</td>
			<td>
				'.$data -> precio. '
			</td>
		</tr>			
		'; 
	}	
?>
		<tr>
			<td width="100">
				Primer titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Primer titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>		
		
			</table>
			<br/>
			<br/>
			
			Empleos:
			<br/>
			<table cellspacing="0" cellpadding="0" border="0">	
<?php	
	foreach ($jobs -> result() as $data)
	{
		echo '
		<tr>
			<td width="100">
				'.$data -> titulo. '
			</td>
			<td>
				'.$data -> ubicacion. '
			</td>
			<td>
				'.$data -> precio. '
			</td>
		</tr>			
		'; 		
	}
?>
		<tr>
			<td width="100">
				Primer titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Primer titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
		<tr>
			<td width="100">
				Segundo titulo
			</td>
			<td>
				Segunda ubicacion
			</td>
			<td>
				Precio
			</td>
		</tr>
			</table>	
		</td>
	</tr>
</table>