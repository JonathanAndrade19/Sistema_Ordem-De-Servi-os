<?php
    session_start();
    require_once('components/conexao.php');

    $servico = $_POST['servico'];
    $quantidade = $_POST['quantidade'];
    $nomeFuncionario = $_POST['nomeFuncionario'];
    $data = $_POST['data'];
    $horaInicio = $_POST['horaInicio'];
    $horaFim = $_POST['horaFim'];
    $detalhe = $_POST['detalhe'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    //Criando Query de inserção de dados.
    $sqlinsert = " insert into Tb_OrdemServico ( servico, quantidade, nomeFuncionario, data, horaInicio, horaFim, detalhe) 
        values ('$servico','$quantidade', '$nomeFuncionario', '$data', '$horaInicio', '$horaFim', '$detalhe') ";

    // executar a query
    if(mysqli_query($link, $sqlinsert)){
        echo 'Agendamento Realizado com Suesso!';
        header('Location: ordemServico.php');
    }else{
        echo 'Erro ao Agenda';
        header('Location: ordemServico.php');
    }

?>