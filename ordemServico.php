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
      <img src="src/img/logoControl.png" alt="logo">
       
      <form method="post" action="agendarOrdem.php">

          <div class="form-group descricao">
            <label class="form-label">Serviço: </label>
            <input class="form-control" rows="3" class="form-control"
            id="servico" name="servico" placeholder="informe o serviço" required="requiored"></input>
            <span style="font-size: 12px; color: #888;"> *Serviço executado na ordem de serviço</span>
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
              <button id="" type="submit" class="btn btn-primary">AGENDAR</button>
          </div>
          <div style="text-align: center;">
              <a href="listarOrdem.php" class="btn btn-primary">Listar Ordem de Serviços</a>
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