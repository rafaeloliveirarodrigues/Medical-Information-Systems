<table class="menu" style="width:100%;">
					<tr>
						<td>

						<?php 
						if(isset($_SESSION['role'])){
							if($_SESSION['role']==1){
								echo "Bem-vindo utente, <br>";
								echo "<span class='nome_menu'>".$_SESSION['name']."</span>";
							}
							if($_SESSION['role']==2){
								echo "Bem-vindo obstetra, <br>";
								echo "<span class='nome_menu'>".$_SESSION['name']."</span>";
							}
							if($_SESSION['role']==3){
								echo "Bem-vindo investigador, <br>";
								echo "<span class='nome_menu'>".$_SESSION['name']."</span>";
							}
						} 
						?>
						</td>
					</tr>
					<tr>
						<td><p><strong>Opções</strong></p></td>
					</tr>

					<tr>
						<td><a href="index.php">Apresentacao</a></td>
					</tr>

					<?php 
						
					

					
					if(isset($_SESSION['role']) ){
						if($_SESSION['role'] == 1){
							
							echo '<tr>
							<td><a href="index.php?operacao=consultarDados&id='.$_SESSION['userid'].'">Consultar Dados</a></td>
							</tr>';


							echo '<tr>
							<td><a href="index.php?operacao=editar&id='.$_SESSION['userid'].'">Editar Dados</a></td>
							</tr>';
							echo '<tr>
							<td><a href="index.php?operacao=logout">Logout</a></td>
							</tr>';

						}
						if($_SESSION['role'] == 2){
							
							
							echo '<tr>
							<td ><a href="index.php?operacao=listarUtentes">Lista de Utentes</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=showRegisto">Registar Utente</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=listarStaff">Lista de Staff</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=showRegistoStaff">Registar Staff</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=showConsultas&userId='.$_SESSION['userid'].'">Consultas</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=logout">Logout</a></td>
							</tr>';		
						}
						if($_SESSION['role'] == 3){
							echo '<tr>
							<td ><a href="index.php?operacao=listarUtentes">Lista de Utentes</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=listarStaff">Lista de Staff</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=estatistica">Estatisticas</a></td>
							</tr>';
							echo '<tr>
							<td ><a href="index.php?operacao=logout">Logout</a></td>
							</tr>';	


						}
					}
					else{
						echo '<tr>
							<td><a href="index.php?operacao=showLogin">Login</a></td>
							</tr>';
							echo '<tr>
							<td><a href="index.php?operacao=showRegistoUtente">Registo Utente</a></td>
							</tr>';

					}
				

						?>
						
</table>