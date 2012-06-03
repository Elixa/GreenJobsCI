<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr>
		<td>
			[imagen usuario]
		</td>	
		<td>
			<?php
				echo $user -> name.'<br/>';
			?>		
			
			Informaciones personales:<br/>
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>		
					<td width="200">
						Tel:
					</td>
					<td>		
			<?php
				echo $user -> phone;
			?>		
					</td>
				</tr>
				<tr>		
					<td width="200">
						Ciudad:
					</td>
					<td>		
			<?php
				echo $user -> city;
			?>		
					</td>
				</tr>
				<tr>		
					<td width="200">
						Pais:
					</td>
					<td>		
			<?php
				echo $user -> country;
			?>		
					</td>
				</tr>
				<tr>		
					<td width="200">
						Email:
					</td>
					<td>		
			<?php
				echo $user -> email;
			?>		
					</td>
				</tr>
			</table>
		</td>	
	</tr>
</table>
		