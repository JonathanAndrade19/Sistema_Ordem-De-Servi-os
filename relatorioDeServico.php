<?php
session_start();
require_once('components/conexao.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

// $consulta = "SELECT `servico`,`quantidade` FROM Tb_OrdemServico";

$consulta = "SELECT s.`id`, s.`valor`, SUM(s.`valor`) AS valorTotal , s.`descricao`, o.`servico`, 
SUM(o.`quantidade`)  AS qtdTotal
FROM `Tb_Servico` AS s
LEFT JOIN `Tb_OrdemServico` AS o ON s.`descricao` = o.`servico`
GROUP BY s.`id`
ORDER BY s.`descricao` ASC";

$consultaAgenda = mysqli_query($link, $consulta);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="src/style/global.css">
    <title>Relatório de Serviços</title>
  </head>
  <body>
    <div class="campoCentral">
        <img src="src/img/logoControl.png" alt="logo">
        <h2>Relatório de Serviços</h2>
        <a href="index.php">voltar</a>
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Serviço</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">Qtd</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Desconto</th>
                <th scope="col">Valor Final</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($dadosdaConsulta = mysqli_fetch_assoc($consultaAgenda)): ?>
            <tr>
                <td><?php echo $dadosdaConsulta['servico']; ?></td>
                <td>
                  <?php
                    // Transforma o valor em Reais Brasileiro.
                    $valorUnitario = $dadosdaConsulta['valor'];
                    $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
                    echo  $formatter->formatCurrency($valorUnitario, 'BRL');
                  ?>
                </td>
                <td><?php echo $dadosdaConsulta['qtdTotal']; ?></td>
                <td>
                  <?php 
                    // Transforma o valor em Reais Brasileiro.
                    $valorTotal = $dadosdaConsulta['valor'] * $dadosdaConsulta['qtdTotal'];
                    $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
                    echo $formatter->formatCurrency($valorTotal, 'BRL');
                  ?>
                </td>
                <td>
                <?php
                    // Condição para saber o quanto de porcentagem vai ser descontado, referente a quantidade. 
                    if ($dadosdaConsulta['qtdTotal'] < 10):
                      echo "0 %";
                    elseif ($dadosdaConsulta['qtdTotal'] >= 10 && $dadosdaConsulta['qtdTotal'] < 50):
                      echo "10 %";
                    else:
                      echo "50 %";
                    endif;
                ?>
                </td>
                <td>
                <?php 
                  // if ($dadosdaConsulta['qtdTotal'] >= 10):
                    // Calculo da Porcentagem.
                    // $vlServico = $dadosdaConsulta['valor'] * $dadosdaConsulta['qtdTotal'];
                    // $desconto = 100;
                    // $vlDescontado = ($vlServico * 10) / $desconto;
                    // Transforma o valor em Reais Brasileiro.
                    // $valorFinal = $vlDescontado;
                    // $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
                    // echo $formatter->formatCurrency($valorTotal - $valorFinal, 'BRL');
                  if ($dadosdaConsulta['qtdTotal'] >= 10 && $dadosdaConsulta['qtdTotal'] < 50):
                    // Calculo da Porcentagem.
                    $vlServico = $dadosdaConsulta['valor'] * $dadosdaConsulta['qtdTotal'];
                    $desconto = 500;
                    $vlDescontado = ($vlServico * 50) / $desconto;
                    // Transforma o valor em Reais Brasileiro.
                    $valorFinal = $vlDescontado;
                    $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
                    echo $formatter->formatCurrency($valorTotal - $valorFinal, 'BRL');
                  endif;
                
                ?>
                </td>
            </tr>
        </tbody>
        <?php endwhile; ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

  </body>
</html>