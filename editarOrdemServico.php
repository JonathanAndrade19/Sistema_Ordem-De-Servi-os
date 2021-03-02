<?php 
    session_start();
    require_once('components/conexao.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

	$id = $_GET['id'];

    $consulta = "SELECT * FROM Tb_OrdemServico WHERE id = $id";
    $editarServico = mysqli_query($link, $consulta);
    $editar = mysqli_fetch_assoc($editarServico);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem de Serviço</title>

    <link rel="stylesheet" href="src/style/global.css">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="campoCentral" style="padding: 4rem 2rem;">
        <img style="margin-bottom:1rem;" src="src/img/logoControl.png" alt="logo">
		<form method="post" action="editarOrdem.php">
            <input type="hidden" name="id" value="<?php echo $editar['id']; ?>">
            <?php $data = $editar['data'] ?>
    
			<div class="form-group descricao">
                <label class="form-label">Serviço: </label>
                <input class="form-control" rows="3" class="form-control" id="servico" name="servico" 
                required="requiored" value="<?php echo $editar['servico'];?>"></input>
                <span style="font-size: 12px; color: #888;"> *Serviço executado na ordem de serviço</span>
            </div>

            <div class="form-group">
                <label class="form-label">Quantidade: </label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required="requiored" 
                value="<?php echo $editar['quantidade']; ?>">
                <span style="font-size: 12px; color: #888;"> *Quantidade do serviço executado. Mínimo 1</span>
            </div>

            <div class="form-group">
                <label class="form-label">Nome do Funcionário: </label>
                <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" required="requiored" 
                value="<?php echo $editar['nomeFuncionario']; ?>">
                <span style="font-size: 12px; color: #888;"> *Nome do funcionário que executou a ordem de serviço</span>
            </div>

            <div class="form-group">
                <label class="form-label">Data: </label>
                <input type="date" class="form-control" id="data" name="data" value="<?php date('d/m/Y',strtotime($data)) ?> required="requiored">
                <span style="font-size: 12px; color: #888;"> *Data da execução da ordem de serviço</span>
                <br>
                <span style="font-size: 12px; color: red;"> * Insira a data novamente </span>
            </div>

            <div class="form-group">
                <label class="form-label">Hora Inicio: </label>
                <input type="time" class="form-control" id="horaInicio" name="horaInicio" 
                value="<?php echo $editar['horaInicio']; ?>" required="requiored">
                <span style="font-size: 12px; color: #888;">*Hora de início da execução da ordem de serviço</span>
            </div>

            <div class="form-group">
                <label class="form-label">Hora Inicio: </label>
                <input type="time" class="form-control" id="horaFim" name="horaFim" 
                value="<?php echo $editar['horaFim']; ?>" required="requiored">
                <span style="font-size: 12px; color: #888;">*Hora de término da execução da ordem de serviço</span>
            </div>

            <div class="form-group">
                <label class="form-label">Detalhe: </label>
                <textarea type="text" class="form-control" id="detalhe" name="detalhe" required="requiored"><?php echo $editar['detalhe']; ?></textarea>
                <span style="font-size: 12px; color: #888;">*Detalhes adicionais sobre a ordem de serviço</span>
            </div>

			<hr>
			<a href="">
				<button type="submit" class="btn btn-danger form-control">EDITAR</button>
			</a>
		</form>
        <div  style="text-align:center; margin-top: 1rem;">
            <a href="listarOrdem.php">VOLTAR</a>
        </div>
        
	</div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>
