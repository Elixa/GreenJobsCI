<?php
	require_once("dompdf_config.inc.php");
	require_once('../../models/ModelAgents.php');
	
	$html =	'
		<link type="text/css" media="screen" href="../../style/web/css/pdfStyle.css">
		<table border="0" cellspacing="5" cellpadding="0" width="100%">
			<tr>
				<td width="60">
					<img src="logo.PNG" width="189">
				</td>
			</tr>
		</table>
		<hr style="background-color:#9ec500;border:0px;">
		<table border="0" cellspacing="5" cellpadding="0" width="100%" class="pdfContentStyle">
			<tr>
				<td width="60">
				</td>
				<td width="120">	
					Nombre
				</td>
				<td width="90">	
					Fecha de nacimiento
				</td>
				<td width="110">	
					Edad
				</td>
			</tr>
			';	
	$ModelAgents 			= new ModelAgents;
	
	$agents = $ModelAgents -> getBirthsByDate($_POST['optMonth']);
	if(mysql_num_rows($agents) > 0)
	{
		while($agent = mysql_fetch_assoc($agents))
		{
			$yearsOld = date('Y') - $agent['birthYear'];
			$html .= '
				<tr align="left" valign="top">
					<td>
						<img src="../../data/temp/'.$agent['identify'].'" width="90">
					</td>
					<td>	
						'.$agent['name'].' '.$agent['lname'].'
					</td>
					<td>	
						'.$agent['birthDay'].'
					</td>
					<td>	
						'.$yearsOld.' a&ntilde;os
					</td>
				</tr>
			';
		}	
	}

	$html .= '
		</table>
	';
						
	$nameFile = 'Cumpleaños-'.$_POST['optMonth'];				
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream($nameFile.'.pdf');

?>