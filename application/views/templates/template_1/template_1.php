<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
	<head>
		<title>GreenJobs - <?=$pageTitle?></title>
		<base href="<?=base_url()?>" />
 		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<script src="<?=$this->config->item("template")?>libs/jquery-1.7.1.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?=$this->config->item("template")?>style/css/webStyle.css" type="text/css">	
		<link rel="stylesheet" href="<?=$this->config->item("template")?>style/css/stylesheet.css" type="text/css">	
		
		<!--Plugins [Jfancy]-->
		<link href="<?=$this->config->item("template")?>plugins/Jfancy/css/Jfancy.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="<?=$this->config->item("template")?>plugins/Jfancy/css/JfancyExtra.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="<?=$this->config->item("template")?>plugins/Jfancy/js/Jfancy.js" type="text/javascript"></script>
		
		<!--DatePicker-->
		<link rel="stylesheet" href="<?=$this->config->item("template")?>plugins/autoComplete/css/jquery.ui.all.css">
		<script src="<?=$this->config->item("template")?>plugins/autoComplete/js/jquery.ui.core.js"></script>
		<script src="<?=$this->config->item("template")?>plugins/autoComplete/js/jquery.ui.widget.js"></script>
		<script src="<?=$this->config->item("template")?>plugins/autoComplete/js/jquery.ui.datepicker.js"></script>
		<link rel="stylesheet" href="<?=$this->config->item("template")?>plugins/autoComplete/css/demos.css">	
		
		<!--GoogleMap
	    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$("a[rel*=Jfancy]").Jfancy({
					loadingImage : "<?=$this->config->item("template")?>plugins/Jfancy/images/loading.gif",
					closeImage   : "<?=$this->config->item("template")?>plugins/Jfancy/images/closelabel.png"
				});		

				$( "#dateBirth" ).datepicker({
					dateFormat: 'dd/mm/yy',
					altField: "#txtBirthDate",
					altFormat: "mm/yy"
				});

				$( "#dateStart" ).datepicker({
					dateFormat: 'dd/mm/yy',
				});
				
			});

			function allChecks(chkbox, formName)
			{
				for (var i = 0 ; i < document.forms[formName].elements.length; i++)
				{ 
					var elemento = document.forms[formName].elements[i]; 
					if (elemento.type == "checkbox")
					{ 
						elemento.checked = chkbox.checked; 
					}  
				} 
			}			
			
		</script>		

	</head>
	<body>
		<div id="containerWeb">
			<div id="head">
				<div class="centralizer">
					<div style="height:30px;"></div>
					<div id="logo"></div>
					<div style="float:right;" class="contentStyle encBlackCss">
						 
					</div>					
				</div>	
			</div>


			<div id="body">
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tr>
						<td valign="top">
							<div id="menuLateral"></div>
						</td>
						<td valign="top" width="1021">
							<div id="principalMenu" class="centralizer">				
								<div id="menuLeft"></div>
								<div id="menuCenter">
									Listado de menu
								</div>		
								<div id="menuRight"></div>									
							</div>
						</td>
						<td valign="top">
							<div id="menuLateral"></div>
						</td>						
					</tr>	
				</table>	
				<div class="centralizer" id="centerStyle">				
					<div>
						<table border="0" cellspacing="0" cellpadding="0" id="compatibity" style="margin-left:15px;paddng-left:15px;">
							<tr>
								<td valign="top">
								
									<div id="compatibit">						
												
										<?=$content?>
										

									</div>
										
								</td>
							</tr>	
						</table>	
					</div>
				</div>
			</div>
			
			<div id="footer">

			</div>
		</div>
	</body>	
</html>				