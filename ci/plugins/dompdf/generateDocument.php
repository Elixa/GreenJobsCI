<?php
	require_once("dompdf_config.inc.php");
	require_once('../../models/ModelAgents.php');
	require_once('../../models/ModelContraventions.php');
	require_once('../../models/ModelFines.php');
	require_once('../../models/ModelRanges.php');
	
	$html =	'
		<link type="text/css" media="screen" href="../../style/web/css/pdfStyle.css">
		<table border="0" cellspacing="5" cellpadding="0" width="100%">
			<tr>
				<td width="60">
					<img src="logo.PNG" width="189">
				</td>
				<td align="right">
					N&oacute;mina '.$_POST['optMonth'].'/'.$_POST['optYear'].'
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
					C&eacute;dula
				</td>
				<td width="110">	
					# cuenta de banco
				</td>
				<td width="100">	
					Salario base
				</td>
				<td width="100">	
					Comisi&oacute;n(10%)
				</td>
				<td width="100">	
					Salario total
				</td>
			</tr>
			';	
	$ModelAgents 			= new ModelAgents;
	$ModelContraventions 	= new ModelContraventions;
	$ModelFines 			= new ModelFines;
	$ModelRanges 			= new ModelRanges;
	
	$agents = $ModelAgents -> getAgentsBySituation();
	if(mysql_num_rows($agents) > 0)
	{
		while($agent = mysql_fetch_assoc($agents))
		{
			$contraventionsMoney = 0;
			$contraventions = $ModelContraventions -> getContraventionsByDate($_POST['optMonth'], $_POST['optYear'], $agent['id_agents']);
			if(mysql_num_rows($contraventions) > 0)
			{
				while($contravention = mysql_fetch_assoc($contraventions))
				{				
					$contraventionsMoney += $ModelFines -> getPriceFine($contravention['id_fines']);
				}			
			}
			$money = $ModelRanges -> getMoneyRange($agent['id_ranges']);	
			$contraventionsMoney = $contraventionsMoney * 0.10; 
			$total = $money + $contraventionsMoney;	
			$html .= '
				<tr align="left" valign="top">
					<td>
						<img src="../../data/temp/'.$agent['identify'].'" width="90">
					</td>
					<td>	
						'.$agent['name'].' '.$agent['lname'].'
					</td>
					<td>	
						'.$agent['ced'].'
					</td>
					<td>	
						'.$agent['noAccount'].'
					</td>
					<td>	
						RD$'.number_format($money, 2).'
					</td>
					<td>	
						RD$'.number_format($contraventionsMoney, 2).'
					</td>
					<td>	
						RD$'.number_format($total, 2).'
					</td>
				</tr>
			';
		}	
	}

	$html .= '
		</table>
	';
						
	$nameFile = 'Nomina-'.$_POST['optMonth'].'-'.$_POST['optYear'];				
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream($nameFile.'.pdf');

?>