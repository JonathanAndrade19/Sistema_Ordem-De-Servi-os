<?php
    session_start();
    require_once('components/conexao.php');

    $id = $_POST['id'];
    $servico = $_POST['servico'];
    $quantidade = $_POST['quantidade'];
    $nomeFuncionario = $_POST['nomeFuncionario'];
    $datas = $_POST['data'];
    $horaInicio = $_POST['horaInicio'];
    $horaFim = $_POST['horaFim'];
    $detalhe = $_POST['detalhe'];


    $objDb = new db();
    $link = $objDb->conecta_mysql();

    //Criando Query de inserção de dados.
    $sqlinsert = "UPDATE Tb_OrdemServico SET servico='$servico', quantidade='$quantidade', 
    nomeFuncionario='$nomeFuncionario', `data`='$datas', horaInicio='$horaInicio', 
    horaFim='$horaFim', detalhe='$detalhe' WHERE id='$id'";

    $resultEdite = mysqli_query($link, $sqlinsert);

    if(mysqli_affected_rows($link)){
        // $_SESSION['msg'] = "<p style='color:green;'> Usuario editado com Sucesso! </p>";
        header("Location: listarOrdem.php");
    }
    else{
        // $_SESSION['msg'] = "<p style='color:red;'> Erro Ao editar Usuario! </p>";
        header("Location: listarOrdem.php?id=$id");
    }

?>