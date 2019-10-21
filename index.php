<?php 

	require "functions.php";

	session_start();

	$connect = connect_db('localhost', 'root', '','SIM');
	if($connect=='Error connecting to the server: '){
		header('Location: error_page.html');
	}

	include "op_checks.php";

?>



<!DOCTYPE html>
<html>
<head>
	<title>Hospital SIM</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<div class="wrapper">
	
	<table border="1" class="main">
		<tr>
			<th class="action" >
				<a href="http://www.fct.unl.pt"><img src="img/logo.png" style="align:left">
				</a>
			</th>		
			<th class="title"><h1>HOSPITAL SIM - FCT</h1></th>
		</tr>
		<tr>
			<td style="width:20%;" valign = "top" >
				<?php include "menu.php" ?>	
			</td>
				<td class="content">
					<?php 
					include 'content.php'

					/*
					if(isset($_GET['operacao'])) {
						if($_GET['operacao']=='showLogin'){
							include 'login.html';
						}
						if($_GET['operacao']=='showRegisto'){
							include 'registo.html';
						}
						if($_GET['operacao']=='novaConsulta'){
							include 'novaConsulta.php';
						}
						if($_GET['operacao']=='checkLogin'){
							if(isset($_SESSION['username'])){
								echo '<p> Login Successful!</p>';
							}

							else{
								echo 'Login Unsuccessful!s';
							}
						}

						if($_GET['operacao']=='checkRegisto'){
							if($registosucesso){
								echo '<p> Registo feito com sucesso! </p>';
								header('Refresh: 2; URL=index.php?operacao=showLogin');
							}
							else{
								echo '<p> Registo falhou, volte para trás para corrigir!</p>';
							}
						}
						if($_GET['operacao']=='sendEmail'){
							if(isset($_GET['id'])){
								include 'sendEmail.php';
							}

						}
						if($_GET['operacao']=='listarUtentes' || $_GET['operacao']=='listarStaff'){
							if(isset($_SESSION['username']) ) {
								include 'listar.php';
								
							}
							else {
								header('Location: index.php?operacao=showLogin');
							}

						}
						if($_GET['operacao']=='showConsultas'){
							include 'consultas_utente.php';
						}
						if($_GET['operacao']=='consultaPage'){
							include 'consulta_page.php';
						}

						if($_GET['operacao']=='user_page'){
							include 'user_page.php';
						}
						if($_GET['operacao']=='showRegistoStaff'){
							include 'registo_staff.html';
						}

						


						if($_GET['operacao']=='logout'){
							session_unset();

							header('Location: index.php');
						}


					}
					else {
						include 'bemvindo.html';
					}
					*/
					?>

				</td>
			</tr>
			<tr>
				<td  colspan = "2">

					<footer style="text-align: center; background-color: #C0C0C0">&copy; Alunos 2018/2019</footer>


				</td>	
			</tr>

		</table>
	</div>
	 

</body>
</html>