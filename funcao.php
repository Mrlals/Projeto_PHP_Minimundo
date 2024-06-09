<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost:3306; dbname=agencia_publicidade", "root", "");
        return $conexao;
    }

    function inserirClientes($nome, $telefone, $email,){
        try{ 
            $sql = "INSERT INTO clientes (nome, telefone, email)VALUES (:nome, :telefone, :email)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":e-mail", $email);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarClientes(){
        try {
            $sql = "SELECT p.*, c.nome as nome do cliente FROM clientes c";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function consultarClianetsId($id){
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
            $sql = "SELECT p.*, c.nome as nome do cliente FROM clientes c
                    INNER JOIN clientes c ON c.id = c.cliente_id";
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

