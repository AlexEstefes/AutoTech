<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">

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

    <a id="voltar"href="site.php">Voltar</a>

    <label for="exampleInputEmail1"><strong>Cadastrar</strong></label>

    <form action="processa.php" name="form1" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
          <label for="exampleInputEmail1">Nome Completo</label>
          <input type="text" name="name" class="form-control"  maxlength="75">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Telefone</label>
          <input type="text" name="telefone" class="form-control"  maxlength="30">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  maxlength="40">
          <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com ninguém.</small>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" name="senha" class="form-control" id="exampleInputPassword1" maxlength="20">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Digite a sua senha novamente</label>
          <input type="password" name="senhaconfirm" class="form-control" id="exampleInputPassword1" maxlength="20">
        </div>

        <?php 
        $senha = $_POST['senha'];
        $senhaconf =  $_POST['senhaconfirm'];

        if ($senha != $senhaconf) {

        ?>  <p>As senhas não conferem</p>  <?php
        }?>




        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <h4 for="name">Adicionar foto do usuário</h4>
              <br>
              <div>Add Foto: <input type="file" name="arquivo" style="border-bottom"></div>
            </div>
          </div>





        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
      </form>

    </div>

</body>
</html>