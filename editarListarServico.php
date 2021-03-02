<?php 
    session_start();
    require_once('components/conexao.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

	$id = $_GET['id'];

    $consulta = "SELECT * FROM Tb_Servico WHERE id = $id";
    $editarServico = mysqli_query($link, $consulta);
    $editar = mysqli_fetch_assoc($editarServico);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviço</title>

    <link rel="stylesheet" href="src/style/global.css">
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
            <div>
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif;?>
		<hr>
		<form method="post" action="editarServico.php">
            <input type="hidden" name="id" value="<?php echo $editar['id']; ?>">
        
			<div class="form-group descricao">
                <label class="form-label">Descricão: </label>
                <textarea class="form-control" rows="3" class="form-control" id="descricao" name="descricao" 
                required="requiored"><?php echo $editar['descricao'];?></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Valor: </label>
                <input type="text" class="form-control" id="valor" name="valor" required="requiored" 
                value="<?php echo $editar['valor']; ?>">
            </div>

			<a href="">
				<button type="submit" class="btn btn-danger form-control">EDITAR</button>
			</a>
            <div class="campoButton" style="text-align: center;">
                <a href="listarServicos.php">VOLTAR</a>
            </div>
		</form>
	</div>
</body>