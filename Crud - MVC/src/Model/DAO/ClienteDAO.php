<?php

namespace App\Model\DAO;

use App\Model\Domain\Cliente;

class ClienteDAO{

    private DAO $dao;

    public function __construct()
    {
        $this->dao = new DAO();
    }

    public function inserir(Cliente $cliente){
        try{
            $sql = "INSERT INTO cliente (nome, sobrenome, idade, email) VALUES (:nome, :sobrenome, :idade, :email)";
            $p = $this->dao->getConn()->prepare($sql);
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":sobrenome", $cliente->getSobrenome());
            $p->bindValue(":idade", $cliente->getIdade());
            $p->bindValue(":email", $cliente->getEmail());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultar(){
        try{
            $sql = "SELECT * FROM cliente ORDER BY id";
            return $this->dao->getConn()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultarPorId($id){
        try{
            $sql = "SELECT * FROM cliente WHERE id=".$id;
            return $this->dao->getConn()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir(Cliente $cliente){
        try{
            $sql = "DELETE FROM cliente WHERE id=:id";
            $p = $this->dao->getConn()->prepare($sql);
            $p->bindValue(":id", $cliente->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Cliente $cliente){
        try{
            $sql = "UPDATE cliente SET nome=:nome, sobrenome=:sobrenome, idade = :idade, email=:email WHERE id=:id";
            $p = $this->dao->getConn()->prepare($sql);
            $p->bindValue(":id", $cliente->getId());
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":sobrenome", $cliente->getSobrenome());
            $p->bindValue(":idade", $cliente->getIdade());
            $p->bindValue(":email", $cliente->getEmail());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

}