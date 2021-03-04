<?php 
session_start();
require_once('components/conexao.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$consulta = "SELECT * FROM Tb_Servico";
$consultaAgenda = mysqli_query($link, $consulta);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviços</title>
    <link rel="stylesheet" href="src/style/global.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="campoCentral">
    <img style="width: 30rem;" src="src/img/logo-social.png" alt="logo">
       
      <form method="post" action="agendarOrdem.php">
          <!-- MSG de cadastrado com sucesso! -->
          <?php if(isset($_SESSION['msg'])): ?>
            <div>
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>
          <?php endif;?>

          <div class="form-group">
            <label class="form-label">Serviço: </label>
            <select class="form-control" name="servico" class="form-select" aria-label="Default select example">
              <?php while($dados = mysqli_fetch_assoc($consultaAgenda)): ?>
                <option><?php echo $dados['descricao']; ?></option>
              <?php endwhile;?>
            </select>
          </div>
          
          <div class="form-group">
            <label class="form-label">Quantidade: </label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" 
            placeholder="1" required="requiored">
            <span style="font-size: 12px; color: #888;"> *Quantidade do serviço executado. Mínimo 1</span>
          </div>

          <div class="form-group">
            <label class="form-label">Nome do Funcionário: </label>
            <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" 
            placeholder="Jonathan Andrade" required="requiored">
            <span style="font-size: 12px; color: #888;"> *Nome do funcionário que executou a ordem de serviço</span>
          </div>

          <div class="form-group">
            <label class="form-label">Data: </label>
            <input type="date" class="form-control" id="data" name="data" 
            placeholder="19/10/1994" required="requiored">
            <span style="font-size: 12px; color: #888;"> *Data da execução da ordem de serviço</span>
          </div>

          <div class="form-group">
            <label class="form-label">Hora Inicio: </label>
            <input type="time" class="form-control" id="horaInicio" name="horaInicio" required="requiored">
            <span style="font-size: 12px; color: #888;">*Hora de início da execução da ordem de serviço</span>
          </div>

          <div class="form-group">
            <label class="form-label">Hora Inicio: </label>
            <input type="time" class="form-control" id="horaFim" name="horaFim" required="requiored">
            <span style="font-size: 12px; color: #888;">*Hora de término da execução da ordem de serviço</span>
          </div>

          <div class="form-group">
            <label class="form-label">Detalhe: </label>
            <textarea type="text" class="form-control" id="detalhe" name="detalhe" required="requiored"></textarea>
            <span style="font-size: 12px; color: #888;">*Detalhes adicionais sobre a ordem de serviço</span>
          </div>

          <!-- Opção -->
          <div style="text-align: center;">
              <button id="" type="submit" class="btn btn-primary">CADASTAR</button>
          </div>
          <div style="text-align: center; margin-top: 1rem;">
              <a href="listarOrdem.php" class="btn btn-primary">LISTAR ORDEM DE SERVIÇOS</a>
          </div>
          <div style="text-align: center; margin: 1rem;">
              <a class="voltar" href="index.php">VOLTAR</a>
          </div>
      </form>

    </div>

    <script src="src/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>