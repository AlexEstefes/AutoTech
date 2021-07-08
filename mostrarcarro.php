<?php
session_start();

include('classes/db_connect.php');
$id_carro = $_GET['id_carro'];
$result_carro = "select * from carros where id='$id_carro'";
$resultado_carro = mysqli_query($connect, $result_carro);
$dados = mysqli_fetch_array($resultado_carro);
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>AutoTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>




    <style>
          body{
            background-image: url("imagens/backgrou.nd.jpg");
            background-color: #111111;
          }
          .menu{
            text-align: center;
            display: block;
          }
          .logo{
            right: 385px;
            font-size: 60pt;
            color: white;
            margin: .15em;
            background: -webkit-linear-gradient(left,white 51%, red 49%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline;
          }
          .nav-link{
            font-family: 'Courier New', Courier, monospace;
            position: relative;
            top: -50px;
            font-size: 14pt;
            color: white;
          }
          .text-muted{
            background-color: rgba(0, 0, 0, 0.637);
            color: white;
          }
          .container{
            right: 500px;
          }
          .compra{
            border-style: inset;
            padding: 7px;
            font-size: 20pt;
            height: 50px;
            width: 250px;
            color: black;
            background-col.or: rgba(255,40,0);
            border-radius: 10px;

            transition: all 0.5s;
            cursor: pointer;

            -webkit-transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
          }
          .compra:hover, .compra:focus{
            color: rgba(255,40,0);
            outline: 0;
            box-shadow: 0 0 40px 40px #e74c3c inset;
            color: white;
          }

        </style>
</head>







<body>
<br>
          <div class="container center">
            <div class="menu">
              <h1 class="logo">AutoTech</h1>
            </div>
          </div>

            </br></br>

            <div class="container">
              <ul class="nav justify-content-center">
                  <a class="nav-link active" href="index.php">| INÍCIO |</a>
                  <a class="nav-link" href="carros.php">| CARROS |</a>
                  <a class="nav-link" href="cadastrarcarro.php">|  VENDER  |</a>
                  <a class="nav-link" href="meuscarros.php">|  MEUS CARROS  |</a>
                  <a class="nav-link" href="site.php">|  LOGIN  |</a>
                  <a class="nav-link" href="logout.php">|  SAIR  |</a>
              </ul>
            </div>
















          
                                                         <!-- Slide -->

                                                         <div class="container">

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="fotos/<?= $dados['arquivo']?>" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
  
</div>


























<div class="container p-5 my-5 bg-light text-black">                      
<form>

  <div class="row">
    <div class="col">
        <h1><?= $dados['marca'] ?> <strong> <?= $dados['modelo'] ?> </strong></h1>
    </div>
    <div class="col">
    </div>
    <div class="col">
        <h1>R$ <?= $dados['valor']?> </h1>
        <a href="#telefone" class="compra">Whatsapp</a>
    </div>
  </div>

  <br><br>

  <div class="row">
    <div class="col">
        <h4>Ano</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['ano']?> </p>
    </div>
    <div class="col">
        <h4>Câmbio</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['cambio']?> </p>
    </div>
    <div class="col">
          <h4>Portas</h4>
          <p style="border-bottom: 2px solid"> <?= $dados['portas']?> </p>
    </div>
    <div class="col">
          <h4>Combustível</h4>
          <p style="border-bottom: 2px solid"> <?= $dados['combustivel']?> </p>
    </div>
  </div>

  <br><br>

  <div class="row">
    <div class="col">
        <h4>Cor</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['cor']?> </p>
    </div>
    <div class="col">
        <h4>Potência</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['potencia']?> cv </p>
    </div>
    <div class="col">
          <h4>Tração</h4>
          <p style="border-bottom: 2px solid"> <?= $dados['tracao']?> </p>
    </div>
    <div class="col">
          <h4>Velocidade Máxima</h4>
          <p style="border-bottom: 2px solid"> <?= $dados['velomaxima']?> </p>
    </div>
  </div>

<br><br>

<div class="row">
  <div class="col">
        <h4>Cilindrada</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['cilindrada']?> cm<sup>3</sup></p>
  </div>
  <div class="col">
        <h4>Rotação Máxima</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['rotacao']?> </p>
  </div>

  <div class="col">
        <h4>Final da Placa</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['placa']?> </p>
  </div>

  <div class="col"></div>
</div>

</form>

</div>




                      
<div class="container p-5 my-5 bg-light text-black"> 

<form>
<h2>Descrição do Vendedor</h2>
  <div class="row" style="border-style: inset;">
    <div class="col">
        <br>
        <p> <?= $dados['descricao']?> </p>
    </div>
  </div>

</form>
</div>


<div class="container p-5 my-5 bg-light text-black"> 

<form>
<h2>Sobre o Vendedor</h2>

<br>

  <div class="row">
    <div class="col">
        <h4>Cidade, Estado</h4>
        <p style="border-bottom: 2px solid"> <?= $dados['cidade']?> </p>
    </div>
    <div class="col"></div> <div class="col"></div>
  </div>

  <br>

  <div class="row">
    <div class="col">
        <h4>Telefone</h4>
        <p id="telefone" style="border-bottom: 2px solid"> <?= $dados['telefone']?> </p>
    </div>
    <div class="col"></div> <div class="col"></div> <div class="col"></div> <div class="col"></div> 
  </div>


















  <?php $_SESSION['criador'] = $dados['id_usuario']; 

  $id_user = $_SESSION['criador'];

  $result_usuario = "select id from usuarios where id='$id_user'";
  $resultado_usuario = mysqli_query($connect, $result_usuario);
  $dados5 = mysqli_fetch_array($resultado_usuario);

  $_SESSION['todos_id'] = $dados5;?>

<?php
$id_vendedor = $_SESSION['criador'][0];

$result_usuario = "select * from usuarios where id ='$id_vendedor'";
$resultado_usuario = mysqli_query($connect, $result_usuario);
$dados1 = mysqli_fetch_array($resultado_usuario);

?>




  <div class="row" style="border-style: solid;">
    <div class="col">
    <br>
    <img src="fotos_user/<?= $dados1['arquivo_user']?>" style="width:100px; border-radius:999px;">
    <h5 style="color:black;">Dono do carro: <?= $dados1['nome'] ?></h5>
    <h5 style="color:black;">Email do dono: <?= $dados1['email'] ?></h5>
    <h5 style="color:black;">Telefone do dono: <?= $dados1['telefone'] ?></h5>
    
    </div>
  </div>





</form>
</div>





</div>







  

            <br><br><br><br><br><br><br><br>

            <footer class="text-muted" style="background-color: #111111">
              <div class="container">
                <p class="float-right">
                  <a style="color:white; border-bottom: 2px solid;" href="#">Back to top</a>
                </p>
                <p style="color:white;">Copyright © 2003-2020</p>
                <p style="color:white;">site do grupo AutoTech.</p>
              </div>
            </footer>
</body>    

</html>