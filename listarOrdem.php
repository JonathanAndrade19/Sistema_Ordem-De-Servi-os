<?php
    session_start();
    require_once('components/conexao.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $consulta = "SELECT * FROM Tb_OrdemServico";
    $consultaAgenda = mysqli_query($link, $consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listando Ordem de Serviços</title>

    <link rel="stylesheet" href="src/style/global.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div style="display: flex; align-items: center; flex-direction: column; margin-top:4rem;">
            <img style="width: 30rem;" src="src/img/logo-social.png" alt="logo">
        </div>
		<!-- MSG de cadastrado com sucesso! -->
        <?php if(isset($_SESSION['msg'])): ?>
            <div>
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif;?>
		<br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Nome Funcionário</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora Inicio</th>
                    <th scope="col">Hora Fim</th>
                    <th scope="col">Detalhe</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php while($dados = mysqli_fetch_assoc($consultaAgenda)): ?>
                    <tr>
                        <?php $data = $dados['data'] ?>
                        <td><?php echo $dados['servico']; ?></td>
                        <td><?php echo $dados['quantidade']; ?></td>
                        <td><?php echo $dados['nomeFuncionario']; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($data))?></td>
                        <td><?php echo $dados['horaInicio']; ?></td>
                        <td><?php echo $dados['horaFim']; ?></td>
                        <td><?php echo $dados['detalhe']; ?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-success" href="editarOrdemServico.php?id=<?php echo $dados['id']; ?>">EDITAR</a>
                            <a style="margin-top:0.2rem;" class="btn btn-danger" href="deletarOrdem.php?id=<?php echo $dados['id']; ?>">DELETAR</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>  
        <div style="display: flex; align-items: center; flex-direction: column; margin-bottom: 2rem;">
            <a href="ordemServico.php">VOLTAR</a>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>