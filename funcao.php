<?php

    function conectarBanco(){
        try{
        $conexao = new PDO("mysql:host=localhost:3306; dbname=agencia_publicidade", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
        } catch(PDOException $e) {
            echo "Erro ao conectar no banco de dados: ". $e->getMessage() . "<br>";
        }

    }

    function inserirAnuncios($nome, $tipo, $campanha_id){
        try{ 
            $sql = "INSERT INTO anuncios (nome, tipo, campanha_id)VALUES (:nome, :tipo, :campanha_id)";
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

    function alterarAnuncios($nome, $tipo, $campanha_id, $id)
    {
        try {
            $sql = "UPDATE anuncios SET nome = :nome, tipo = :tipo, campanha_id = :campanha_id WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":tipo", $tipo);
            $stmt->bindValue(":campanha_id", $campanha_id);
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

    function inserirCampanhas($nome, $descricao, $data_inicio, $cliente_id){
        try{ 
            $sql = "INSERT INTO campanhas (nome, descricao, data_inicio, cliente_id)VALUES (:nome, :descricao, :data_inicio, :cliente_id)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":descricao", $descricao);
            $stmt->bindValue(":data_inicio", $data_inicio);
            $stmt->bindValue(":cliente_id", $cliente_id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }

    }

    function retornarCampanhas(){
        try {
            $sql = "SELECT c.*, cl.nome AS cliente 
                    FROM campanhas c
                    INNER JOIN clientes cl ON c.cliente_id = cl.id";
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
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erro ao consultar campanha: ". $e->getMessage());
            return 0;
        }
    }

    function alterarCampanhas($nome, $descricao, $data_inicio, $cliente_id, $id)
    {
        try {
            $sql = "UPDATE campanhas SET nome = :nome, descricao = :descricao, data_inicio = :data_inicio, cliente_id = :cliente_id  WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":descricao", $descricao);
            $stmt->bindValue(":data_inicio", $data_inicio);
            $stmt->bindValue(":cliente_id", $cliente_id);
            $stmt->bindValue(":id" , $id);
            $result = $stmt->execute();
            return $result;

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

    function inserirRelatorios($data, $metricas, $campanha_id){
        try{ 
            $sql = "INSERT INTO relatoriosdesempenho (data, metricas, campanha_id) VALUES (:data, :metricas, :campanha_id)";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data", $data);
            $stmt->bindValue(":metricas", $metricas);
            $stmt->bindValue(":campanha_id", $campanha_id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function retornarRelatorios(){
        try {
            $sql = "SELECT r.*, c.nome AS campanha 
            FROM relatoriosdesempenho r
            LEFT JOIN campanhas c ON r.campanha_id = c.id";
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

    function alterarRelatorios($data, $metrica, $campanha_id, $id)
    {
        try {
            $sql = "UPDATE relatoriosdesempenho SET data = :data, metricas = :metricas, campanha_id = :campanha_id WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data", $data);
            $stmt->bindValue(":metricas", $metrica);
            $stmt->bindValue(":campanha_id", $campanha_id);
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
    