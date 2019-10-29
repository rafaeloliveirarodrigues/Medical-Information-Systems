
<?php  

//fazer tabela atraves de query

if(isset($_GET['id'])){
	$user=idinfo($_GET['id'],$connect);
	echo $user['role'];
}



?>

<style>
	<?php include 'main.css'; ?>
</style>



<div class="user_page">
    	<div class="personal_info_wrapper">
    		<div class="personal_info">
    			<?php  
    			if($user['role']==1){
					$utente= utenteidinfo($user['id'],$connect);

					echo '<div class="nome">
	    		<label>Nome:</label><br>';

					echo $utente['nome'];
					echo'<br>
	    		</div>
	    		<div class="personal_left">
	    		<label>Morada:</label><br>';
	    		echo $utente['morada'];
	    		echo '<br>
	    		<label>Email:</label><br>';
	    		echo $utente['email'];
	    		echo '<br>
	    		<label>Data-nascimento:</label><br>';
	    		echo $utente['data_nascimento'];
	    		echo '<br>
	    		<label>NIF:</label><br>';
	    		echo $utente['nif'];
	    		echo '<br><br>
	    		</div>
	    		<div class="personal_right">
	    		<label>Localidade:</label><br>';
				echo $utente['localidade'];
				echo '<br>
				<label>Contacto:</label><br>';
				echo $utente['contacto'];
				echo '<br>
	    		<label>Sexo:</label><br>';
	    		echo $utente['sexo'];
	    		echo '<br>
	    		<label>Cartão Saude:</label><br>';
	    		echo $utente['cartao_saude'];
	    		echo '<br>
	    		</div>
	    		<div class="alergias">
	    		<label>Alergias:</label><br>';
	    		echo  $utente['alergias'];
	    		echo '<br>
	    		</div>';

				}

				if($user['role']==2 || $user['role']==3){
				echo '<div class="nome">
	    		<label>Nome:</label><br>';

					echo $user['name'];
					echo'<br>
	    		</div>
	    		<div class="personal_left">
	    		<label>Username:</label><br>';
	    		echo $user['username'];
	    		echo '<br><br>
	    		<label>Data de registo:</label><br>';
	    		echo $user['creation_date'];
	    		echo '<br><br>
	    		</div>
	    		<div class="personal_right">
	    		<label>Role:</label><br>';
				echo $user['role'];
				echo '<br><br>
				<label>Tipo:</label><br>';
				if($user['role']==2){
					echo "Obstetra";
				}
				if($user['role']==3){
					echo "Investigador";
				}
				echo '<br><br><br><br><br><br><br><br><br></div>';

				}




				?>

	    		<div class="button_bar">
	 
	    		<div class="button">
	    			<?php 
	    			 echo "<a href='index.php?operacao=editar&id=".$user["id"]."'>Editar Dados</a>";
	    			 ?>
	    			
	    		</div>
	    	
	    			<?php 
	    			
	    				if($_SESSION['role']==2  && $user['role']==1){
	    					echo '<div class="button">';
	    			 echo "<a href='index.php?operacao=sendEmail&id=".$user["id"]."'>Email</a>";
	    			
	    			echo '</div>';}
	    			 ?>
	    			
	    		
	    		
	    			<?php 
	    			if($_SESSION['role']==2){
	    				echo '<div class="button">';
	    			 echo "<a href='index.php?operacao=deleteUser&id=".$user["id"]."'>Eliminar</a>";
	    			 echo '</div>';
	    			}
	    			 ?>
	    			

	    		</div>
	    		
    		</div>
    	</div>

    	
    		<?php 
    		if($user['role']==1){
    		echo '<div class="profile_pic_div">';
    		echo '<img src="img\avatar\1.jpg" class="profile_pic">' ;
    			echo '<br><label>Utente Registado em:</label><br>';
    			echo $user['creation_date'];
    			echo '</div>';}
    				?>

    	
    		

    	
    </div>
