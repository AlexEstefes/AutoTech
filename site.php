<?php
require_once 'classes/db_connect.php';
session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <style>
      body{
    background-image: url("imagens/estradalogin.jpg"); }
    </style>
</head>
<body>
    <br><br><br><br>
    <div class="container p-5 my-5 bg-dark text-white">
        <a href="index.php">Voltar</a><br>
    <label for="exampleInputEmail1"><strong>Login</strong></label>

    <form action="processaLogin.php" name="form1" method="POST">

        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"    name="email">
          <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com ninguém.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1"   name="senha">
        </div>

        <button type="submit" class="btn btn-primary" value="ACESSAR">Acessar</button>

        <br><br>
        
        <a href="cadastrar.php">Ainda não é cadastrado?<strong>Cadastre-se!</strong></a>
      </form>

    </div>






    <div class="container">

                                                                                              <!--Verificar Cadastro-->
    <?php
    if (isset($_SESSION['status_cadastro'])):
    ?>
      <br>
        <div class="alert alert-success" role="alert"> 
        <strong>Cadastro Efetuado! <br>Faça o Login </strong>
        </div>
    <?php
    endif;
    unset($_SESSION['status_cadastro']);
    ?>

                                                                                                <!--Cadastro Efetuado-->
    <?php
    if (isset($_SESSION['usuario_existe'])):
    ?>
      <br>
        <div class="alert alert-danger" role="alert"> 
        <strong>O usuário já existe!</strong>
        </div>
        <p on="alerta"></p>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>

                                                                                              <!--Login Incorreto-->
    <?php
    if (isset($_SESSION['status_login'])):
    ?>
      <br>
        <div class="alert alert-danger" role="alert"> 
        <strong>Email/senha incorretos <br>Faça o Login Novamente  </strong>
        </div>
    <?php
    endif;
    unset($_SESSION['status_login']);
    ?>

                                                                                              <!--Cadastro sem informações-->
    <?php
    if (isset($_SESSION['casdastro_incorreto'])):
    ?>
      <br>
        <div class="alert alert-danger" role="alert"> 
        <strong>Cadastro inválido <br>Faça o Cadastro Novamente  </strong>
        </div>
    <?php
    endif;
    unset($_SESSION['casdastro_incorreto']);
    ?>
</div>
</body>
</html>