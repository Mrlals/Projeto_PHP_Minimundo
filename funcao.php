<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost:3306; dbname=agencia_publicidade", "root", "");
        return $conexao;
    }

    function inserirAnuncios($nome, $tipo, ){
        try{ 
            $sql = "INSERT INTO clientes (nome, tipo)VALUES (:nome, :tipo)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":tipo", $tipo);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarAnuncios(){
        try {
            $sql = "SELECT * FROM anuncios";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function consultarAnunciosId($id){
        try {
            $sql = "SELECT * FROM anuncios WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return 0;
        }
    }

    function alterarAnuncios($nome, $tipo, $id)
    {
        try {
            $sql = "UPDATE anuncios SET nome = :nome, tipo = :tipo, where id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":tipo", $tipo);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    function excluirAnuncios($id)
    {
        try {
            $sql = "DELETE FROM anuncios WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    function inserirCampanhas($nome, $descricao, $data_inicio,){
        try{ 
            $sql = "INSERT INTO campanhas (nome, descricao, data_inicio)VALUES (:nome, :descricao, :data_inicio)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":descricao", $descricao);
            $stmt->bindValue(":data_inicio", $data_inicio);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }

    }

    function retornarCampanhas(){
        try {
            $sql = "SELECT * FROM campanhas";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function consultarCampanhasId($id){
        try {
            $sql = "SELECT * FROM campanhas WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return 0;
        }
    }

    function alterarCampanhas($nome, $descricao, $data_inicio, $id)
    {
        try {
            $sql = "UPDATE campanhas SET nome = :nome, descricao = :descricao, data_inicio = :data_inicio WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":descricao", $descricao);
            $stmt->bindValue(":data_inicio", $data_inicio);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    function excluirCampanhas($id)
    {
        try {
            $sql = "DELETE FROM campanhas WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    function inserirClientes($nome, $telefone, $email,){
        try{ 
            $sql = "INSERT INTO clientes (nome, telefone, email)VALUES (:nome, :telefone, :email)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":email", $email);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarClientes(){
        try {
            $sql = "SELECT * FROM clientes";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function consultarClientesId($id){
        try {
            $sql = "SELECT * FROM clientes WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return 0;
        }
    }

    function alterarClientes($nome, $telefone, $email, $id)
    {
        try {
            $sql = "UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    function excluirClientes($id)
    {
        try {
            $sql = "DELETE FROM clientes WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }
