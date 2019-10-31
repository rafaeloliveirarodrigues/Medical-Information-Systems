<?php 

if(isset($_GET['operacao'])) {

	if($_GET['operacao']=='checkLogin' && isset($_POST['username']) &&isset($_POST['password']) ){
		$result  = login($_POST['username'],$_POST['password'],$connect);

		if($result==1){
			$_SESSION['authuser'] = 1;

			$user = userinfo($_POST['username'],$connect);

			$_SESSION['username'] = $_POST['username'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['userid']=$user['id'];
			$_SESSION['role']= $user['role'];
			$_SESSION['creation_date'] = $user['creation_date'];
			
		}
	}
	if($_GET['operacao']=='logout'){
		$_SESSION['authuser']=0;
		session_unset();
		session_destroy() ;
		header("Location: /sim/index.php");


	}

	if($_GET['operacao']=='checkRegisto'){
		
		if(!usernameAvailable($_POST['username'],$connect)){
			if($_GET['tipo']=="utente"){
				$result= newuser($_POST['nome'], $_POST['username'],$_POST['password'], '1',$connect);
				$target_dir = "img/avatar/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);
				move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
				$result = newutente($_POST['username'],$_POST['nome'],$_POST['morada'],$_POST['localidade'],$_POST['email'],$_POST['contacto'],$_POST['data_nascimento'],$_POST['sexo'],$_POST['nif'],$_POST['cartao_saude'],$_POST['alergias'],$target_file,$connect);
			}
			if($_GET['tipo']=="staff"){
				$result= newuser($_POST['nome'], $_POST['username'],$_POST['password'], $_POST['role'],$connect);
				
			}
		}

	}

	if($_GET['operacao']=='deleteUser'){
		if(isset($_GET['id'])){
			if($_SESSION['userid']==$_GET['id']){
				$yourselferror =1; 
				return;
			}
			$user=idinfo($_GET['id'],$connect);
			
			
			
			if($user['role']==1){
				$utente= utenteidinfo($user['id'],$connect);
				deleteutente($utente['id'],$connect);
				deleteuser($user['id'],$connect);
				$deleted =1; 

			}
			if($user['role']==2 || $user['role']==3){
				deleteuser($user['id'],$connect);
				$deleted =1;
			}


		}

	}

}


 ?>