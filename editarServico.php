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
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Serviço Editado com <strong>Sucesso!</strong>
        <button type='button' class='btn-close alert-success' data-bs-dismiss='alert' aria-label='Close'>X</button>
        </div>";
        header("Location: listarServicos.php");
    }
    else{
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro</strong> ao Editar o Serviço
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header("Location: editarListarServico.php?id=$id");
    }

?>