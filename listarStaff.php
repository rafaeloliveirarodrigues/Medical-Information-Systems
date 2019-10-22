
<?php  

/*

$users =  getutentes($connect);
	$chunkusers = array_chunk($users, 2);
	foreach ($chunkusers as $user){
		echo '<br>';
		foreach ($user as $a){
			echo $a['nome'];
		}
	}

*/
$users =  getstaff($connect);


if (isset($_GET['pageSize'])){
	if($_GET['pageSize']>0){
			$chunkusers = array_chunk($users, $_GET['pageSize']);
			
	}
}
else{
	$chunkusers = array_chunk($users,5);
}

if (!isset($_GET['pageNumber'])){
	$_GET['pageNumber']=0;
	}

echo '<div class="loginWrapper">
<div class="loginContainer">
';

if (isset($chunkusers[$_GET['pageNumber']])){
echo '
<table border="1">
	<thead>

	
		<tr style="border: 1px gray; text-align: center;background-color: #00FF00; font-weight: bold">
			<td>Id</td>
			<td>Nome</td>
			<td>Role</td>
			<td>Data de Criação</td>
		</tr>
	</thead>
	<tbody>
	';

	//pagesize 5 10 15 20
	
	
	foreach ($chunkusers[$_GET['pageNumber']] as $utente) {
    echo "

       <tr style='text-align: center;font-weight: bold; background-color: #FE2EF7;'>
			<td>
				<a href=index.php?operacao=consultarDados&id=".$utente['id'].">{$utente['id']}<a>
			</td>
			<td>
				<a>{$utente['name']}<a>
			</td>
			<td>";
			if($utente['role']==2){
				echo"Obstetra";
			}
			if($utente['role']==3){
				echo"Investigador";
			}
			echo"
			</td>
			<td>
				{$utente['creation_date']}
			</td>
		</tr>
		";
	}

	if(isset($chunkusers)){
		$number_of_pages=count($chunkusers);
		if(!isset($_GET['pageSize'])){
			$_GET['pageSize'] =5;
		}
		echo "<br>";
		if($number_of_pages>0){

		for ($k = 0 ; $k < $number_of_pages; $k++){ 
			echo ' <a href="index.php?operacao=listarStaff&pageNumber='.$k.'&pageSize='.$_GET['pageSize'].'">'.$k.'</a> '; }

		}
		}


    echo "
	</tbody>
</table>
" ;


}
else{
	echo "Page not defined";
}

echo '</div>
</div>
';


?>