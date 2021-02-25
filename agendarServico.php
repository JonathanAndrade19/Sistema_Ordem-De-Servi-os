<?php

require_once('components/conexao.php');

    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    //Criando Query de inserção de dados.
    $sqlinsert = " insert into Tb_Servico ( descricao, valor) values ('$descricao','$valor') ";

    // executar a query
    if(mysqli_query($link, $sqlinsert)){
        echo 'Agendamento Realizado com Suesso!';
        header('Location: '.'index.php');
    }else{
        echo 'Erro ao Agenda';
        header('Location: '.'index.php');
    }

?>