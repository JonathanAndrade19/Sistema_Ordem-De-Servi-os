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
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Serviço cadastrado com <strong>Sucesso!</strong>
        <button type='button' class='btn-close alert-success' data-bs-dismiss='alert' aria-label='Close'>X</button>
        </div>";
        header('Location: servicos.php');
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Erro ao Cadastrar Serviço
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header('Location: servicos.php');
    }

?>