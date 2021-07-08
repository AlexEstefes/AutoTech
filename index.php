<?php
include('classes/db_connect.php');
session_start();
?>




<html lang="pt-br">
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
          body{
            background-image: url("i.magens/abackground.jpg");
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

          .carros{
            transition: all 0.5s;
            cursor: pointer;

            max-width: 100%;
	        -moz-transition: all 0.3s;
	        -webkit-transition: all 0.3s;
	        transition: all 0.3s;
          }
          .carros:hover{
            -webkit-filter: blur(2px);
            filter: blur(2px);

            -moz-transform: scale(1.1);
        	-webkit-transform: scale(1.1);
	        transform: scale(1.1);
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



          <?php if($_SESSION['usuario_existe_login'] = true) {?>

          <?php
          $result_usuario = "select * from usuarios where id=".$_SESSION['id_usuario'];
          $resultado_usuario = mysqli_query($connect, $result_usuario);
          $dados = mysqli_fetch_array($resultado_usuario);
          ?>


          <div class="container">
          <h5 style="color:white;">Seja Bem Vindo <?= $dados['nome'] ?></h5>
          </div>
          
          <?php }?>
















                                                         <!-- Slide -->

          <div class="container">

            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="imagens/desapego.jpg" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="imagens/carousel2.jpg" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="imagens/carouselalunos.jpg" class="d-block w-100">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              
            </div>





<?php

$pagina = (isset ($_GET['pagina']))? $_GET['pagina'] : 1;


$result_usuario = "select * from carros order by id DESC";
$resultado_usuario = mysqli_query($connect, $result_usuario);

//total de carro
$total_carros = mysqli_num_rows($resultado_usuario);

//quantida por pagina
$quantidade_pg = 9;

//quantidade de paginas que precisará
$num_pagina = ceil ($total_carros/$quantidade_pg);

//Calcular inicio da visualização
$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

//selecionar os carros vap estar na pagina
$result_usuarios="SELECT * FROM carros order by id DESC limit $inicio, $quantidade_pg";
$resultado_usuarios = mysqli_query($connect, $result_usuarios);
$total_carros = mysqli_num_rows($resultado_usuarios);
?>















          
            <form action="mostrarcarro.php">   
            <div class="container">
                <h3 style="color: white; font-family: 'Lobster', serif; font-size: 48px;">Ultimos Cadastrados</h3>
              

              <div class="album py-5 ">  
                <div class="row">



<?php
while ($dados = mysqli_fetch_array($resultado_usuarios)) {
?>


                  <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <a href="mostrarcarro.php?id_carro=<?php echo $dados['id']; ?>"> <img src="fotos/<?= $dados['arquivo']?>" class="carros" style="height: 225px; width: 100%;"></a>
                      <div class="card-body">
                        <h5 class="card-text"><?= $dados['marca']?> <strong> <?= $dados['modelo']?> </strong> </h5>
                      
                      </div>
                    </div>
                  </div> 
            

</form>     
  <?php
  }
  ?>

                </div>
              </div>
            </div>
            















          
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