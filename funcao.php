<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost:3306; dbname=agencia_publicidade", "root", "");
        return $conexao;
    }

    function inserirAnuncios($nome, $tipo, $campanha_id){
        try{ 
            $sql = "INSERT INTO anuncios (nome, tipo, campanha_id)VALUES (:nome, :tipo, :cammpanha_id)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":tipo", $tipo);
            $stmt->bindValue(":campanha_id", $campanha_id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarAnuncios(){
        try {
            $sql = "SELECT anuncios.*, campanhas.nome AS campanha 
                    FROM anuncios 
                    LEFT JOIN campanhas ON anuncios.campanha_id = campanhas.id";
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
            $sql = "UPDATE anuncios SET nome = :nome, tipo = :tipo WHERE id = :id";
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

    function inserirRelatorios($data, $metricas){
        try{ 
            $sql = "INSERT INTO relatoriosdesempenho (data, metricas)VALUES (:data, :metricas)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data", $data);
            $stmt->bindValue(":metricas", $metricas);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarRelatorios(){
        try {
            $sql = "SELECT * FROM relatoriosdesempenho";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch (Exception $e) {
            return 0;
        }
    }

    function consultarRelatoriosId($id){
        try {
            $sql = "SELECT * FROM relatoriosdesempenho WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return 0;
        }
    }

    function alterarRelatorios($data, $metrica, $id)
    {
        try {
            $sql = "UPDATE relatoriosdesempenho SET data = :data, metricas = :metricas WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data", $data);
            $stmt->bindValue(":metricas", $metrica);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    function excluirRelatorios($id)
    {
        try {
            $sql = "DELETE FROM relatoriosdesempenho WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id" , $id);
            return $stmt->execute();
        } catch (Exception $e) {
            return 0;
        }
    }
    