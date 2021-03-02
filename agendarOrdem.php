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
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Ordem de Serviço cadastrado com <strong>Sucesso!</strong>
        <button type='button' class='btn-close alert-success' data-bs-dismiss='alert' aria-label='Close'>X</button>
        </div>";
        header('Location: ordemServico.php');
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Erro ao Cadastar Ordem de Serviço!
        <button type='button' class='btn-close alert-success' data-bs-dismiss='alert' aria-label='Close'>X</button>
        </div>";
        header('Location: ordemServico.php');
    }

?>