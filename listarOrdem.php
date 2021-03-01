<?php
    session_start();
    require_once('components/conexao.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listando Serviços</title>
</head>
<body>
    <div>
        <a href="ordemServico.php">Voltar</a>
    </div>
<?php
    $consulta = "SELECT * FROM Tb_OrdemServico";
    $consultaAgenda = mysqli_query($link, $consulta);
    while($dados = mysqli_fetch_assoc($consultaAgenda)):  
?>
    <div class="campoListagem" id="campoListagem">
        <div class="row">
            <div class="col-6">
                <?php $data = $dados['data'] ?>
                <p hidden>Id: <?php echo $dados['id']; ?></p>
                <p>Descrição: <?php echo $dados['servico']; ?></p>
                <p>Quantidade: <?php echo $dados['quantidade']; ?></p>
                <p>Nome Funcionário: <?php echo $dados['nomeFuncionario']; ?></p>
                <p>Data: <?php echo date('d/m/Y',strtotime($data))?></p>
                <p>Hora Inicio: <?php echo $dados['horaInicio']; ?></p>
                <p>Hora Fim: <?php echo $dados['horaFim']; ?></p>
                <p>Detalhe: <?php echo $dados['detalhe']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="centralizarItem">
                <a class="btn btn-success" href="editarOrdemServico.php?id=<?php echo $dados['id']; ?>">Editar</a>
                <a class="btn btn-danger" href="deletarOrdem.php?id=<?php echo $dados['id']; ?>">Deletar</a>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</body>
</html>