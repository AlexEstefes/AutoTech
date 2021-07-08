<?php
session_start();
include('classes/db_connect.php');

$id= $_GET['id'];
$result_usuario = "DELETE FROM carros where id ='$id'";
$resultado_usuario = mysqli_query($connect, $result_usuario);

if(mysqli_affected_rows($connect)){
    header('location: meuscarros.php');
}

?>