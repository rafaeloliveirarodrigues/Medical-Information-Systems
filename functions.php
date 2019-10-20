<?php 

function connect_db($user,$pass,$db) {
	$connect = mysqli_connect('localhost', 'root', '','SIM') or die('Error connecting to the server: ');
	return $connect;
}

function login($username,$password,$connect){
	$sql = 'SELECT * FROM USERS WHERE (username = "'. $_POST['username'] .'" AND
		password = "'. $_POST['password'] .'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	$number = mysqli_num_rows($result); //if returns 1, then is a valid user 

	return $number;
}

function userinfo($username,$connect){
	$sql = 'SELECT * FROM USERS WHERE (username = "'. $username.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	$result = mysqli_fetch_array($result);
	return $result;
}
function usernameAvailable($username,$connect){
	$sql = 'SELECT * FROM USERS WHERE (username = "'. $username.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	$result= mysqli_num_rows($result);
	if ($result==0){
		$result=1;
	}
	if ($result==1){
		$result=0;
	}
	return $result;
}
function idinfo($id,$connect){
	$sql = 'SELECT * FROM USERS WHERE (id = "'. $id.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	$result = mysqli_fetch_array($result);
	return $result;
}
function utenteidinfo($id,$connect){
	$sql = 'SELECT * FROM UTENTE WHERE (id = "'.$id.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	$result = mysqli_fetch_array($result);
	return $result;

}
function deleteutente($id,$connect){
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	$result = mysqli_fetch_array($result);
	return $result;

}
function deleteuser($id,$connect){
	//problema com propagação da cena 
	$sql = 'UPDATE USERS SET eliminated = 1 WHERE (id= "'.$id.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	return $result;

}

function getutentes($connect){
	$sql = 'SELECT * FROM UTENTE';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	while ($rows = mysqli_fetch_array($result)){
		$userinfo[] = $rows;
	}
	return $userinfo;
}
function getstaff($connect){
	$sql = 'SELECT * FROM USERS WHERE ((role = "2" or role= "3") and eliminated="0")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	while ($rows = mysqli_fetch_array($result)){
		$userinfo[] = $rows;
	}
	return $userinfo;
}

function consultasmedico($id,$connect){
	$sql = 'SELECT * FROM consultas WHERE (medico ='.$id.')';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	while ($rows = mysqli_fetch_array($result)){
		$userinfo[] = $rows;
	}
	if(isset($userinfo)){
		return $userinfo;
	}
	else{
		return 0;
	}
}
function consultasuser($user,$connect){
	$sql = 'SELECT * FROM consultas WHERE (utente =' .$id.')';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	while ($rows = mysqli_fetch_array($result)){
		$userinfo[] = $rows;
	}
	if(isset($userinfo)){
		return $userinfo;
	}
	else{
		return 0;
	}
}

function updateuser($id,$name,$username,$password, $role,$connect){
	$query = 'UPDATE USERS SET name = "'.$name.'", username ="'.$username.'", password="'.$password.'",role="'.$role;
	echo $query;
}

function consultaid($id,$connect){
	$query = 'SELECT * FROM CONSULTAS where (id = '.$id.')';
	$results = mysqli_query($connect, $query) or die(mysqli_error($connect));
    while ($rows = mysqli_fetch_array($results)){
	$consulta = $rows;
	}
	return $consulta;
}



function newuser($name, $username,$password, $role,$connect){
	$sql ='INSERT INTO USERS (name, username,password, role) VALUES ("'.$name.'","'.$username.'","'.$password.'","'.$role.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');

	return $result;
}

function newutente($username,$nome,$morada,$localidade,$email,$contacto,$data_nascimento,$sexo,$nif,$cartao_saude,$alergias,$filetarget,$connect){
	$sql='INSERT INTO UTENTE (id,nome, morada, localidade, email, contacto, data_nascimento, sexo, nif, cartao_saude, alergias, image) VALUES ((select id from users where username ="'.$username.'"),"'.$nome.'","'.$morada.'","' .$localidade.'","'.$email.'",'.$contacto.',"'.$data_nascimento.'","'.$sexo.'",'.$nif.','.$cartao_saude.',"'.$alergias.'","'.$filetarget.'")';
	$result = mysqli_query ($connect ,$sql) or die('The query failed: ');
	return $result;
}
/*$hey= getutentes($connect);
	foreach ($hey as $user){
	echo $user['nome'];
}*/



 ?>