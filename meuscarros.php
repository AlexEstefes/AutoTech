<?php
include('classes/db_connect.php');
session_start();
																					//Verificação
if(!isset($_SESSION['logado'])){
  ?>
	<script>
		alert('Você não tem permissão de acessar esta página');
		location.href='site.php';
	</script>
	<?php

}
?>




<html lang="pt-br">
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <style>
          o{
            color:white;
          }
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
          <h3 style="color:white;">Veículos do "<?= $dados['nome'] ?>" a venda</h3>
          </div>
          
          <?php }?>













<?php

$result_usuario1 = "select * from carros where id_usuario =".$_SESSION['id_usuario']." order by id DESC";
$resultado_usuario1 = mysqli_query($connect, $result_usuario1);

?>




<div class="container p-5 my-5 bg-light text-black">

<?php
while ($dados1 = mysqli_fetch_array($resultado_usuario1)) {
?>


            <div style="border-style:solid;">
                    <img src="fotos/<?= $dados1['arquivo']?>" style="width:205px; padding:20px;"> <?= $dados1['marca']?> <strong> <?= $dados1['modelo']?> </strong>
                    </br>
                    <o>aa</o>
                    <a href="deletarcarro.php?id=<?php echo $dados1['id']; ?> "> DELETAR </a>               
            </div>
            </br>

<?php } ?>

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