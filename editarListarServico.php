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

<body>
	<div>
		<a href="listarServicos.php" style="text-align:center;">VOLTAR</a>
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

			<hr>
			<a href="">
				<button type="submit" class="btn btn-danger form-control">EDITAR</button>
			</a>
		</form>
	</div>
</body>