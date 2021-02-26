<?php
    session_start();
    require_once('components/conexao.php');

    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];


    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    //Criando Query de inserção de dados.

    $sqlinsert = "UPDATE Tb_Servico SET descricao='$descricao', valor='$valor' WHERE id='$id'";
    $resultEdite = mysqli_query($link, $sqlinsert);

    if(mysqli_affected_rows($link)){
        // $_SESSION['msg'] = "<p style='color:green;'> Usuario editado com Sucesso! </p>";
        header("Location: listarServicos.php");
    }
    else{
        // $_SESSION['msg'] = "<p style='color:red;'> Erro Ao editar Usuario! </p>";
        header("Location: editarListarServico.php?id=$id");
    }

?>