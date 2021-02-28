<?php
    session_start();
    require_once('components/conexao.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

	$id = $_GET['id'];

    $consulta = "DELETE FROM Tb_OrdemServico WHERE id = $id";
    $deletarAgendamento = mysqli_query($link, $consulta);
    $deletarAgenda = mysqli_fetch_assoc($deletarAgendamento);

    if(mysqli_affected_rows($link)){
        // $_SESSION['msg'] = "<p style='color:green;'> Serviço Deletado com Sucesso! </p>";
        header("Location: listarOrdem.php");
    }
    else{
        // $_SESSION['msg'] = "<p style='color:red;'> Erro Ao Deletar Serviço! </p>";
        header("Location: listarOrdem.php");
    }

?>