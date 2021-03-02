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
    <title>Listando Serviços</title>
    <link rel="stylesheet" href="src/style/global.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="campoCentral">
    <img style="margin-bottom: 1rem;" src="src/img/logoControl.png" alt="logo">
     <!-- MSG de cadastrado com sucesso! -->
     <?php if(isset($_SESSION['msg'])): ?>
        <div>
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif;?>
    <table class="table table-hover">
        <thead>
            <tr style="text-align:center;">
            <th scope="col">Id</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
            <th scope="col">Opção</th>
            </tr>
        </thead>
    <tbody>
        <?php while($dados = mysqli_fetch_assoc($consultaAgenda)):?>
            <tr style="text-align: center; align-items: center;">
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['descricao']; ?></td>
                <td><?php echo $dados['valor']; ?></td>
                <td>
                    <a class="btn btn-success" href="editarListarServico.php?id=<?php echo $dados['id']; ?>">Editar</a> 
                    <a style="margin-top:0.2rem;" class="btn btn-danger" href="deletarServico.php?id=<?php echo $dados['id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
    <div>
        <a href="servicos.php">VOLTAR</a>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>