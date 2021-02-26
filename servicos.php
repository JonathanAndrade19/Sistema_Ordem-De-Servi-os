<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    <link rel="stylesheet" href="src/style/global.css">
    <link rel="stylesheet" href="src/style/servicos.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="campoCentral">
      <img src="src/img/logoControl.png" alt="logo">
    
      <!-- MSG de cadastrado com sucesso! -->
      <?php if(isset($_SESSION['msg'])): ?>
          <div class="notification is-success is-light">
              <button class="delete">x</button>
              <?php
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
              ?>
          </div>
        <?php endif;?>

      <form method="post" action="agendarServico.php">
          <div class="form-group descricao">
            <label class="form-label">Descricão: </label>
            <textarea class="form-control" rows="3" class="form-control"
            id="descricao" name="descricao" placeholder="Descrição do serviço ..." required="requiored"></textarea>
          </div>

          <div class="form-group">
            <label class="form-label">Valor: </label>
            <input type="text" class="form-control" id="valor" name="valor" placeholder="00,00" required="requiored">
          </div>

          <div style="text-align: center;">
              <button id="agendaServico" type="submit" class="btn btn-primary">AGENDAR</button>
          </div>
          <div style="text-align: center;">
              <a href="listarServicos.php" class="btn btn-primary">Listar Serviços</a>
          </div>
          <div style="text-align: center;">
              <a class="voltar" href="index.php">VOLTAR</a>
          </div>
      </form>

    </div>
    <script src="src/js/main.js"></script>
    <script src="src/js/notify.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>

