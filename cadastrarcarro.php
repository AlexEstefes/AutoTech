<?php
require_once 'classes/db_connect.php';
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

        <style>
          body{
            background-image: url("im.agens/background.jpg");
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
          .btn{
            height: 50px;
            width: 250px;
            color: white;
            background-color: black;
            border-radius: 10px;

            transition: all 0.5s;
            cursor: pointer;

            -webkit-transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
            transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
          }
          .btn:hover, .btn:focus{
            color: rgba(255,0,0);
            outline: 0;
            box-shadow: 0 0 40px 40px #e74c3c inset;
            color: white;
          }






          
          *{
  box-sizing: border-box;
  color: #272538;
  border: none;
}
input, label{
  display: block;
  outline: none;
  width: 100%;
}
#main-container {
  width: 500px;
  margin-left: auto;
  margin-right: auto;
  background-color: rgb(255, 255, 255);
  border-radius: 10px;
  padding: 25px;
}
#main-container h1 {
  text-align: center;
  margin-bottom: 25px;
  font-size: 1.6rem;
}
#main-container h2 {
  text-align: start;
  margin-bottom: 25px;
  font-size: 1.6rem;
}
label {
  font-weight: bold;
  font-size: .8rem;
}
input, select {
  border-bottom: 2px solid #323232;
  padding: 10px;
  font-size: 0.9rem;
  margin-bottom: 40px;
}
input:focus {
  border-color: #003cff;
}
textarea{
  width: 1040px;
  height: 150px;
  vertical-align: top;
  color: black;
  background-color:  rgb(232, 232, 232);
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










<form action="processacarro.php" method="POST" enctype="multipart/form-data">




                      
<div class="container p-5 my-5 bg-light text-black"> 






<h1>Venda Seu Veículo</h1><br><br>

  <div class="row">
    <div class="col">
      <label for="name">Marca do carro</label>
      <br>
      <input type="text" name="marca" placeholder="Marca do carro">
    </div>

    <div class="col">
      <label for="name">Modelo do carro</label>
      <br>
      <input type="text" name="modelo" placeholder="Nome do carro">
    </div>

    <div class="col"></div>

    <div class="col">
        <label for = "valor">Preço do veiculo</label>
        <br>
        <input type="number" name="valor" placeholder="Digite o valor">
    </div>
  </div>

  <br><br>

  <div class="row">
    <div class="col">
        <label for = "ano">Ano do veiculo</label>
        <br>
        <input type="number" name="ano" placeholder="Informe o ano">
     </div>

    <div class="col">
        <label class = "cambio">Câmbio</label>
        <br>
        <input type="text" name="cambio" placeholder="Digite o câmbio">
      </div>

    <div class="col">
        <label for = "Portas">Portas</label>
        <br>
        <input type="number" name="portas" placeholder="Digite o número de portas">
    </div>

    <div class="col">
        <label for ="combustivel">Tipo de combustivel</label>
        <br>
        <input type="text" name="combustivel" placeholder="Digite o tipo de compustivel">
      </div>
  </div>

  <br><br>

  <div class="row">
    <div class="col">
        <label for = "valor">Cor</label>
        <br>
        <input type="text" name="cor" placeholder="Digite a cor">
      </div>

    <div class="col">
        <label for = "valor">Potência</label>
        <br>
        <input type="number" name= "potencia" placeholder="Digite a Potência">
      </div>

    <div class="col">
        <label class = "Tracao">Tração</label>
        <br>
        <input type="text" name="tracao" placeholder="Digite a tração do carro">
    </div>
    <div class="col">
        <label for = "valor">Velocidade Máxima</label>
        <br>
        <input type="number" name="velomaxima" id ="valorveiculo" placeholder="Digite a Velocidade Máxima">
      </div>
  </div>

<br><br>

<div class="row">
  <div class="col">
        <label for= "cilindrada">Cilindrada</label> 
        <br>
        <input type="number" name="cilindrada" placeholder="Insira o número de cilindradas."> 
     </div>

  <div class="col">
        <label for= "rotacao">Rotação Máxima</label>
        <br>
        <input type="number" name="rotacao" placeholder="Digite a rotação máxima">
      </div>

  <div class="col">
  <div class="col">
        <label for= "rotacao">Final da Placa</label>
        <br>
        <input type="number" name="placa" placeholder="Digite o final da placa">
      </div>
  </div>
  <div class="col"></div>
</div>


</div>




                      
<div class="container p-5 my-5 bg-light text-black"> 


<h2>Descrição do Vendedor</h2>
<br>
  <div class="row">
    <div class="col">
    <textarea type="msg" name="descricao" placeholder="Descrição do veiculo"></textarea>
    </div>
  </div>


</div>


<div class="container p-5 my-5 bg-light text-black"> 

<h2>Sobre o Vendedor</h2>
<br>

  <div class="row">
    <div class="col">
        <h4 for="nome">Cidade, Estado</h4>
        <br>
        <input type="text" name="cidade" placeholder="Digite o nome da sua cidade">
    </div>
    <div class="col"></div> <div class="col"></div>
  </div>

  <div class="row">
    <div class="col">
      <h4 for="name">Telefone</h4>
      <br>
      <input type="text" name="telefone" placeholder="Digite o seu telefone">
    </div>
    <div class="col"></div> <div class="col"></div> <div class="col"></div> 
  </div>


























<form action="" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <h4 for="name">Fotos do carro</h4>
      <br>
      <div>Add Foto: <input type="file" name="arquivo" style="border-bottom"></div>
    </div>
  </div>


</div>



    <div class="container p-5 my-5 bg-light text-black" style="text-align: center;"> 



        <br><input name="btcad" value="CONFIRMAR" type="submit" class="btn">
</form>
</form>

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