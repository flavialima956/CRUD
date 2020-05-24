<?php

//Conexão com banco de dados

class Conexao
{
    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host=; dbname= " ,'','');
            $conn->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $exception){
            echo "Erro na conexão:" . $exception->getMessage();
        }
    }

}