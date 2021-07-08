<?php
//conexao
require_once 'classes/db_connect.php';

//sessao                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
session_start();
	$email = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

$result_usuario = "select * from usuarios where email = '$email' AND senha = '$senha'";
$resultado_usuario = mysqli_query($connect, $result_usuario);
$total = mysqli_num_rows($resultado_usuario);

if($total== 0){
	$_SESSION['status_login'] = true;

	header("Location: site.php");
}

else{
	$dados = mysqli_fetch_array($resultado_usuario);
	$_SESSION['usuario_existe_login'] = true;
	$_SESSION['logado'] = 'ok';

	$_SESSION['nome'] = $dados['nome'];
	$_SESSION['email'] = $dados['email'];
	$_SESSION['id_usuario'] = $dados['id'];

	
	

	header('location: index.php');
}



?>