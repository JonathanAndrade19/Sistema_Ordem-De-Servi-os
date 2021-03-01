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

<body>
	<div>
		<a href="listarOrdem.php" style="text-align:center;">VOLTAR</a>
		<hr>
		<form method="post" action="editarOrdem.php">
        <?php echo var_dump($editar);?>
            <input type="hidden" name="id" value="<?php echo $editar['id']; ?>">
            <?php $data = $editar['data'] ?>
            <h1>Editando Ordem de Serviço</h1>

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
	</div>
</body>