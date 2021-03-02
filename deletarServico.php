<?php
    session_start();
    require_once('components/conexao.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

	$id = $_GET['id'];

    $consulta = "DELETE FROM Tb_Servico WHERE id = $id";
    $deletarAgendamento = mysqli_query($link, $consulta);
    $deletarAgenda = mysqli_fetch_assoc($deletarAgendamento);

    if(mysqli_affected_rows($link)){
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Serviço deletado com <strong>Sucesso!</strong>
        <button type='button' class='btn-close alert-success' data-bs-dismiss='alert' aria-label='Close'>X</button>
        </div>";
        header("Location: listarServicos.php");
    }
    else{
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro</strong> ao deletar o Serviço
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header("Location: listarServicos.php");
    }

?>