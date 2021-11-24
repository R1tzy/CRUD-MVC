<?php

namespace App\Controller;

use App\Model\DAO\ClienteDAO;
use App\Model\Domain\Cliente;

class CrudController{
    public function index(){
        $clienteDAO = new ClienteDAO();
        $dados = $clienteDAO->consultar();
        require "../src/View/Crud/index.php";
    }

    public function create(){
        require "../src/View/Crud/create.php";
    }

    public function store(){
        $cliente = new Cliente();
        $cliente->setNome($_POST["nome"]);
        $cliente->setSobrenome($_POST["sobrenome"]);
        $cliente->setIdade($_POST["idade"]);
        $cliente->setEmail($_POST["email"]);
        $clienteDAO = new ClienteDAO();
        if($clienteDAO->inserir($cliente)){
            $resultado = "Registro inserido com sucesso!";
        }else{
            $resultado = "Não foi possível inserir o registro!";
        }
        session_start();
        $_SESSION["resultado"] = $resultado;
        header('Location: /cliente');
        exit;   
    }

    public function edit($parametro){
        $clienteDAO = new ClienteDAO();
        $dados = $clienteDAO->consultarPorId($parametro[1]);
        require "../src/View/Crud/edit.php";
    }

    public function delete($parametro){
        $clienteDAO = new ClienteDAO();
        $dados = $clienteDAO->consultarPorId($parametro[1]);
        require "../src/View/Crud/delete.php";
    }

    public function update($parametro){
        $cliente = new Cliente();
        $cliente->setId($parametro[1]);
        $cliente->setNome($_POST["nome"]);
        $cliente->setSobrenome($_POST["sobrenome"]);
        $cliente->setIdade($_POST["idade"]);
        $cliente->setEmail($_POST["email"]);
        $clienteDAO = new ClienteDAO();
        if($clienteDAO->alterar($cliente)){
            $resultado = "Registro alterado com sucesso";
        }else{
            $resultado = "Não foi possível alterar o registro!";
        }
        session_start();
        $_SESSION["resultado"] = $resultado;
        header("Location: /cliente");
        exit;
    }

    public function remove($parametro){
        $cliente = new Cliente();
        $cliente->setId($parametro[1]);
        $clienteDAO = new ClienteDAO();
        if($clienteDAO->excluir($cliente)){
            $resultado = "Registro excluído com sucesso!";
        }else{
            $resultado = "Não foi possível excluir o registro!";
        }
        session_start();
        $_SESSION["resultado"] = $resultado;
        header("Location:/cliente");
        exit;
    }
}