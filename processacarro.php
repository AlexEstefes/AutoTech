<?php
session_start();
include('classes/db_connect.php');


$id = $_SESSION['id_usuario'];


	$marca = mysqli_escape_string($connect, $_POST['marca']);
	$modelo = mysqli_escape_string($connect, $_POST['modelo']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
    
    $ano = mysqli_escape_string($connect, $_POST['ano']);
    $cambio = mysqli_escape_string($connect, $_POST['cambio']);
    $portas = mysqli_escape_string($connect, $_POST['portas']);
    $combustivel = mysqli_escape_string($connect, $_POST['combustivel']);

    $cor = mysqli_escape_string($connect, $_POST['cor']);
    $potencia = mysqli_escape_string($connect, $_POST['potencia']);
    $tracao = mysqli_escape_string($connect, $_POST['tracao']);
    $velomaxima = mysqli_escape_string($connect, $_POST['velomaxima']);

    $cilindrada = mysqli_escape_string($connect, $_POST['cilindrada']);
    $rotacao = mysqli_escape_string($connect, $_POST['rotacao']);
    $placa = mysqli_escape_string($connect, $_POST['placa']);

    $descricao = mysqli_escape_string($connect, $_POST['descricao']);

    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);


    

$result_usuario = "select count(*) as total from carros where email = '$email'";
$resultado_usuario = mysqli_query($connect, $result_usuario);
$row = mysqli_fetch_assoc($resultado_usuario);

if($row['total'] == 1){
	$_SESSION['usuario_existe'] = true;
	header('location: site.php');
	exit;
} 

if(isset($marca,$modelo,$valor, $ano,$cambio,$portas,$combustivel, $cor,$potencia,$tracao,$velomaxima, $cilindrada,$rotacao,$placa, $descricao, $cidade,$telefone)){


  $pasta = "fotos/";
  $foto = $_FILES['arquivo'];

  $arq_temporario = $foto['tmp_name'];
  $arq_original   = $foto['name'];
  $novo_nome      = time() . ".jpg";
  $destino        = $pasta . $novo_nome;


  move_uploaded_file($arq_temporario, $destino);



$result_usuario = "INSERT INTO carros (marca,modelo,valor,ano,cambio,portas,combustivel,cor,potencia,tracao,velomaxima,cilindrada,rotacao,placa,descricao,cidade,telefone,arquivo,id_usuario) VALUES ('$marca','$modelo','$valor','$ano','$cambio','$portas','$combustivel','$cor','$potencia','$tracao','$velomaxima','$cilindrada','$rotacao','$placa','$descricao','$cidade','$telefone','$novo_nome','$id')";

	if($connect->query($result_usuario) === TRUE){
		$_SESSION['status_cadastrocarro'] = true;
	}

	$connect->close();

	header("Location: index.php");
    exit;

    

}
else{
	$_SESSION['casdastro_incorreto'] = true;
	header('location: cadastrocarro.php');
	exit;
}







?>