<?php
    session_start();
    require_once('components/conexao.php');

    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    //Criando Query de inserção de dados.
    $sqlinsert = " insert into Tb_Servico ( descricao, valor) values ('$descricao','$valor') ";

    // executar a query
    if(mysqli_query($link, $sqlinsert)){
        $_SESSION['msg'] = "<p>Serviço Cadastrado com sucesso</p>";
        header('Location: servicos.php');
    }else{
        $_SESSION['msg'] = "<p>Erro, Serviço não cadastrado</p>";
        header('Location: servicos.php');
    }

?>