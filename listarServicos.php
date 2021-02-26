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
        <a href="servicos.php">Voltar</a>
    </div>
<?php
    $consulta = "SELECT * FROM Tb_Servico";
    $consultaAgenda = mysqli_query($link, $consulta);
    while($dados = mysqli_fetch_assoc($consultaAgenda)):
?>
    <div class="campoListagem" id="campoListagem">
        <div class="row">
            <div class="col-6">
                <p>Id: <?php echo $dados['id']; ?></p>
                <p>Descrição: <?php echo $dados['descricao']; ?></p>
                <p>Valor: <?php echo $dados['valor']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="centralizarItem">
                <a class="btn btn-success" href="editarListarServico.php?id=<?php echo $dados['id']; ?>">Editar</a>
                <a class="btn btn-danger" href="deletarServico.php?id=<?php echo $dados['id']; ?>">Deletar</a>
            </div>
        </div>
    </div>
    
<?php endwhile; ?>
</body>
</html>