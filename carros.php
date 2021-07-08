<?php
session_start();
include('classes/db_connect.php');

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
            background-image: url("ima.gens/background.jpg");
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
          



        <form action="mostrarcarro.php">   
            <div class="container">
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
              <?php
              //verificar a pagina anterior e posterior
              $pagina_anterior = $pagina - 1;
              $pagina_posterior = $pagina + 1;
              ?>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <?php 
          if($pagina_anterior !=0){ ?>
            <a class="page-link" href="carros.php?pagina= <?php echo $pagina_anterior; ?>" aria-disabled="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
      <?php } else{ ?>

<span aria-hidden="true">&laquo;</span>

<?php  }    ?>

    </li>

















    <?php
        //apresentar a paginação
        for($i = 1; $i<$num_pagina +1; $i++){?>
            <li class="page-item"><a class="page-link" href="carros.php?pagina= <?php echo $i; ?>"> <?php echo $i; ?> </a></li>
    <?php } ?>

    
















    <li class="page-item">
      <?php 
          if($pagina_posterior <= $num_pagina){ ?>
            <a class="page-link" href="carros.php?pagina= <?php echo $pagina_posterior; ?>" aria-disabled="Previous">
            <span aria-hidden="true">&raquo;</span>
            </a>
      <?php } else{ ?>

        <span aria-hidden="true">&raquo;</span>

<?php  }    ?>

    </li>
  </ul>
</nav>

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