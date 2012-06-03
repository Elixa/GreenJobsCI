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
		
		<!--GoogleMap-->
	    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		
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

		  <!--NivoSlide--> 
	  <!--NivoSlide--> 
  <link rel="stylesheet" href="<?=$this->config->item("template")?>plugins/nivoSlide/css/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?=$this->config->item("template")?>plugins/nivoSlide/css/nivo-slider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?=$this->config->item("template")?>plugins/nivoSlide/css/style.css" type="text/css" media="screen" />
  <script type="text/javascript" src="<?=$this->config->item("template")?>plugins/nivoSlide/js/jquery.nivo.slider.pack.js"></script> 
  <script type="text/javascript">
  $(window).load(function() {
   $('#slider').nivoSlider();
  });
  </script>
	</head>
	<body>
	
		
	
		<div id="containerWeb">
			<div id="head">
				<div class="centralizer">
					<br/>
					<div id="logo"></div>	
				</div>
			</div>
			<div id="body">
			
				<table cellspacing="0" cellpadding="0" border="0" width="920" class="centrar lnkStyle">
					<tr align="center">
						<td width="100">
							<a href="#">Inicio</a>
						</td>
						<td width="50">
						|
						</td>
						<td width="100">
							<a href="departamentsGoogleMap.php" rel="jFancy">Proyecto verde</a>
						</td>
						<td width="50">
						|
						</td>	
						<td width="100">
							<a href="jobs">Ofertas de empleo</a>
						</td>
						<td width="50">
						|
						</td>
						<td width="100">
							<a href="services">Servicios</a>
						</td>						
					</tr>
					<tr>
						<td colspan="7">
							<br>
							<hr color="#c8dd99">
						</td>
					</tr>
				</table>
				<br/>
				
				<?php 
					if(isset($slide) and $slide == 1) {
					?>
					
					<table cellspacing="0" cellpadding="0" border="0" width="920" class="centrar">
					 <tr>
					  <td width="100" align="left">
					   <img src="images/previous.png">
					  </td>
					  <td>
					   <div id="wrapper" width="600">
						<div class="slider-wrapper theme-default">         
						 <div id="slider" class="nivoSlider">     
						  <img src="<?=$this->config->item("template")?>plugins/nivoSlide/images/slide1.jpg" alt="" width="100%"/>        
						  <img src="<?=$this->config->item("template")?>plugins/nivoSlide/images/slide2.jpg" alt="" width="100%"/>        
						  <img src="<?=$this->config->item("template")?>plugins/nivoSlide/images/slide3.jpg" alt="" width="100%"/>        
						 </div>
						</div>
					   </div>      
					  </td>
					  <td width="100" align="right">
					   <img src="images/next.png">
					  </td>
					 </tr>
					</table>
					
					<?php
					}
					?>
				
				<div id="contentCentral" class="centralizer">
				
					
				
					<?=$content?>
				</div>
			</div>
			</div>
		</div>
		<div id="footer">
			<div class="centralizer" style="text-align:center;font-family: candara;font-size: 16px;text-decoration: none;yle="">
				GreenJobs &copy; Todos los Derechos Reservados, 2012
			</div>
		</div>
</div>		
		</body>	
</html>				