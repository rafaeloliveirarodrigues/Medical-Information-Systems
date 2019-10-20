<style>
.registo input{
	width: 100%;

}
.registo select{
	width: 100%;
	margin:5px;
	
}
.registo textarea{
	
	margin:5px;

	
}


</style>

<?php
//EDITAR UTENTE SÓ PODE UTENTE

if(isset($_GET['id'])){
	$user=idinfo($_GET['id'],$connect);
	if ($user['role']==1){
	$utente= utenteidinfo($user['id'],$connect);


?>

<div class="registo" style="width:100%;display: inline-block;">

	<form method="post"  enctype="multipart/form-data"  action="index.php?operacao=checkRegisto&tipo=utente"style="margin: 15px; border: 1px solid #CCC; padding: 30px;
    border-radius: 1em; text-align: left; background-color: green;">

    <div class="div_left">
	<label>Nome:   </label><br>
	<input type="text" name="nome" value=<?php echo '"'.$utente['nome'].'"'?>> <br>
	<label>Telefone: </label><br>
	<input type="tel" name="contacto" maxlength="9" value=<?php echo '"'.$utente['contacto'].'"'?>><br>
	<label>Data Nascimento: </label><br>
	<input type="date" name="data_nascimento" value=<?php echo '"'.$utente['data_nascimento'].'"'?>> <br>
	<label>Sexo: </label><br>
	<select name="sexo" selected=<?php echo '"'.$utente['sexo'].'"'?>><option>Masculino</option><option>Feminino</option></select> <br>
	<label>Cartao Saude: </label>
	<input type="text" name="cartao_saude"  maxlength="9" value=<?php echo '"'.$utente['cartao_saude'].'"'?>> <br> 
	</div>

	<div class="div_right">
	<label>Morada:   </label><br>
	<input type="text" name="morada" value=<?php echo '"'.$utente['morada'].'"'?>> <br>
	<label>Localidade:   </label><br>
	<input type="text" name="localidade"  value=<?php echo '"'.$utente['localidade'].'"'?>> <br>
	<label>Email: </label><br>
	<input type="email" name="email" value=<?php echo '"'.$utente['email'].'"'?>><br>
	<label>NIF: </label><br>
	<input type="text" name="nif"  maxlength="9" value=<?php echo '"'.$utente['nif'].'"'?>> <br><br>
	</div>
	<div class="alergias"><label>Alergias</label><br>
	<textarea rows="4" cols="100" name="alergias"> <?php echo $utente['alergias']?></textarea>
    </div>
  
	<input type="password" name="pass" style="visibility:hidden"> <br><br>
	<input type="submit" name="submit" value="Atualizar"  align="right" style="float:right;width: 150px;">
   </form>
</div>
<?php
}

if ($user['role']==2 || $user['role']==3){
?>


<div class="registo" style="width:100%;display: inline-block;">

	<form method="post"  enctype="multipart/form-data"  action="index.php?operacao=checkRegisto&tipo=staff"style="margin: 15px; border: 1px solid #CCC; padding: 30px;
    border-radius: 1em; text-align: left; background-color: green;">

    <div class="div_left">
	<label>Nome:   </label><br>
	<input type="text" name="nome" value = <?php echo'"'.$user['name'].'"'; ?> > <br>
	<label>Username:</label>
	<input type="username" name="username" value = <?php echo'"'.$user['username'].'"'; ?>>
	</div>
	 <div class="div_right">
	 	<label>Role:</label>
	    <select name="role" ><option value="2" <?php if($user['role']==2){ echo "selected";}?>>Obstetra</option><option value="3"  <?php if($user['role']==3){ echo'selected';} ?>>Investigador</option></select> <br>
	    <label>Password:</label>
	    <input type="password" name="password" value = <?php echo $user['password'];?>> <br>
	 </div>
	
	<input type="password" name="pass" style="visibility:hidden"> <br><br>
	<input type="submit" name="submit" value="Editar"  align="right" style="float:right;width: 150px;">
   </form>
</div>

<?php
}
} ?>

