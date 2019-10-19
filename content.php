<style>
<?php include "main.css"?>
</style>

<?php


if(isset($_GET['operacao'])) {
	if($_GET['operacao']=='showLogin'){
		include 'login.html';
	}
	if($_GET['operacao']=='checkLogin'){
		if(isset($_SESSION['authuser'])){
			if($_SESSION['authuser']==1){
				echo "<br><br><br><br>Login Sucessful!";
			}
			else{
				echo "<br><br><br><br>Login Uncessful!";
				
			}
		}
		else{
			echo "<br><br><br><br>Login Uncessful!";

		}
	}

	if($_GET['operacao']=='deleteUser'){
		if(isset($deleted)){
			echo "<br><br><br><br>User Deleted Sucessfully!";
		}
		else{
			echo "<br><br><br><br>User Deleted Uncessful!";
			if($yourselferror==1){
					echo "<br> You can't eliminate yourself!";
				}
		}
	}
	if($_GET['operacao']=='consultarDados'){
		include 'user_page.php';
	}
	if($_GET['operacao']=='listarUtentes'){
		include 'listarUtentes.php';
	}
	if($_GET['operacao']=='showRegisto'){
		include 'registo_utente.html';
	}
	if($_GET['operacao']=='listarStaff'){
		include 'listarStaff.php';
	}
	if($_GET['operacao']=='showRegistoStaff'){
		include 'registo_staff.html';
	}
	if($_GET['operacao']=='showConsultas'){
		include 'listarConsultas.php';
	}
	if($_GET['operacao']=='pageConsulta'){
		include 'consulta_page.php';
	}
	if($_GET['operacao']=='editar'){
		include 'editar_utente.php';
	}



	else{

		//include 'bemvindo.html';

	}



}
else{

	include 'bemvindo.html';

}
?>