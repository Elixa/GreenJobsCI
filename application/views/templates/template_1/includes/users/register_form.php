<div class="pageTitle">
	<h2>Registro de Usuario</h2>
</div>

<form method="post" action="user/register_post">

		<div class="errors">
		<?php echo validation_errors(); ?>
		</div>
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>											
				<td>
					<div id="cpanelUp">
						<div id="cpanelTitle" style="margin-bottom:10px;margin-left:10px;">Nuevo <font color="#ced817">usuario:</font></div>
						<div id="separatorOne"></div>
						<div id="separatorTwo"></div>
						<table border="0" cellpadding="5" cellspacing="0" class="letterStyle" width="100%">
											<tr align="left">
												<td>
													Nombre de usuario:
												</td>							
											</tr>
											<tr align="left">
												<td>
													<input type="text" name="txtUser">
												</td>							
											</tr>
											<tr align="left">
												<td>
													Clave:
												</td>							
											</tr>
											<tr align="left">
												<td>
													<input type="password" name="txtPass">
												</td>							
											</tr>
											<tr align="left">
												<td>
													Repetir clave:
												</td>							
											</tr>
											<tr align="left">
												<td>
													<input type="password" name="txtPassTwo">
												</td>							
											</tr>
											<tr>
												<td align="left">
													<input type="submit" name="btmCreate" value="Crear">&nbsp;<a href="./" class="encCss">Volver</a>
												</td>							
											</tr>
						</table>
					</div>
					<div id="cpanelDown"></div>								
				</td>							
			</tr>											
		</table>								
	</form>	