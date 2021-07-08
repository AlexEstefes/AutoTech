<?php
//conexao
require_once 'classes/db_connect.php';

//sessao
session_start();
	$nome = mysqli_escape_string($connect, $_POST['name']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

$result_usuario = "select count(*) as total from usuarios where email = '$email'";
$resultado_usuario = mysqli_query($connect, $result_usuario);
$row = mysqli_fetch_assoc($resultado_usuario);

if($row['total'] == 1){
	$_SESSION['usuario_existe'] = true;
	header('location: site.php');
	exit;
} 

if(isset($nome,$telefone,$email,$senha)){


  $pasta = "fotos_user/";
  $foto = $_FILES['arquivo'];

  $arq_temporario = $foto['tmp_name'];
  $arq_original   = $foto['name'];
  $novo_nome      = time() . ".jpg";
  $destino        = $pasta . $novo_nome;


  move_uploaded_file($arq_temporario, $destino);



	$result_usuario = "INSERT INTO usuarios (nome, telefone,email, senha,arquivo_user) VALUES ('$nome','$telefone','$email','$senha','$novo_nome')";

	if($connect->query($result_usuario) === TRUE){
		$_SESSION['status_cadastro'] = true;
	}

	$connect->close();

	header("Location: site.php");
	exit;
}
else{
	$_SESSION['casdastro_incorreto'] = true;
	header('location: site.php');
	exit;
}
?>