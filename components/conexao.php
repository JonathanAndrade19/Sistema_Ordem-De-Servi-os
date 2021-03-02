<?php

class db{
    //Variaves que contem dados da conexão com o banco de dados.
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = 'acade123';
    private $database = 'Control';

    public function conecta_mysql()
    {
        //Criar Conexão com a base de dados.
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
        //ajustar o charset de comunicação entre a aplicação e o banco de dados
        mysqli_set_charset($con, 'utf8');
        //verificar se houve erro de conexão
        if (mysqli_connect_errno()) {
            echo 'Erro ao tentar se conectar com o BD MySQL: '. mysqli_connect_error();
        }
        
        return $con;
    }
}