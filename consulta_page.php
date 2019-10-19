
<?php  

//fazer tabela atraves de query

$connect = mysqli_connect('localhost', 'root', '','SIM') or die('Error connecting to the server: ' . mysqli_error($connect));


if(isset($_GET['id'])){
	$consulta = consultaid($_GET['id'],$connect);
}



$user_utente =  idinfo($consulta['utente'],$connect);
$medico= idinfo($consulta['medico'],$connect);

?>

<style>
	
	.personal_info_wrapper{
		
		height: 100%;
		width: 100%;
		float: left;
		
	}
	.personal_info{
		margin:0px;
		padding: 20px;
		text-align: left;
		height: auto;

	}
	.email_box{
		width: 100%;
	}
	textarea{
		width: 100%;

	}
	.nome label {
		font-weight: bold;
		font-size: 15pt;
		text-align: left;
	}
	.nome{
		font-size: 20pt;
		width: 100%;
	}
	
	label {
		font-weight: bold;
		text-align: left;
	}
	
	.button_bar{
		width:100%;
		float: left;
	}
	.button{
		width:120px;
		height: 50px; 
		background-color: #4285F4; 
		border-radius: 25px;
		margin: 10px;
		margin-top: 20px;
		text-align: center;
		float: right;
		
	}
	.button a{
		line-height: 50px; 
		vertical-align: middle;
	}
	.subject{
		width: 100%;
	}

	.dados_consulta{
		width: 100%;
		min-height: 250px;
		float: left;
		text-align: left;
		height: 100px;
		border: 1px solid #000000;

	}
</style>

<div style="height: 95%;margin: 20px; border: 1px solid #CCC; padding: 0px;
    border-radius: 1em; text-align: left; background-color: green;">
    	<div class="personal_info_wrapper">
    		<div class="personal_info">
	    		<div class="nome">
	    		<label>Consulta nº</label><br>
	    		<?php echo $consulta['id'];?><br>
	    		</div>
	    		
	    			<label>
	    				Medico: 
	    			</label><br>
	    			<?php echo $medico['name'] ?><br>
	    			<label>
	    				Utente:
	    			</label><br>
	    			<?php echo $user_utente['name'] ?><br><br>
	    			


	    		<div class="dados_consulta">
	    		<label>Dados da Consulta:</label><br>
	    		<?php echo $consulta['dados'] ?><br>
	    		</div>
	    		
	    		
	    		<div class="button_bar">
	    		<div class="button">
	    			<?php 
	    			 echo "<a href='index.php?operacao=showConsultas&userId=".$user_utente["id"]."'>Consultas</a>";
	    			 //mail($utente["email"],,message,headers)

	    			 ?>
	    			
	    		</div>
	    		

	    			<?php

	    			if($_SESSION['role']==2){
	    			 echo '<div class="button">';
	    			 echo "<a href='index.php?operacao=showConsultas&userId=".$user_utente["id"]."'>Editar</a>";
	    			 //mail($utente["email"],,message,headers)
						echo '</div>';
					}
	    			 ?>
	    			
	    		
	    		
	    			<?php 
	    			if($_SESSION['role']==2){
	    			echo '<div class="button">';
	    			 echo "<a href='index.php?operacao=showConsultas&userId=".$user_utente["id"]."'>Nova Consulta</a>";
	    			 //mail($utente["email"],,message,headers)
	    			 echo '</div>';
}
	    			 ?>
	    			
	    		</div>
	    		</div>
    		</div>
    	</div>
</div>