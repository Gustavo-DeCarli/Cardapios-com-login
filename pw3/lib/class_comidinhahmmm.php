<?php

require "conn.php";

class Cardapio
{
    private $id = "";
    private $nome = "";
    private $tipo = "";
    private $data = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "nome" => $this->nome,
            "tipo" => $this->tipo,
            "data" => $this->data
        ]);
    }

    function setNome($v) {$this->nome = $v;}
    function setdata($v){$this->data = $v;}
    function settipo($v){$this->tipo = $v;}
    function getNome(){return $this->nome;}
    function getdata(){return $this->data;}
    function gettipo(){return $this->tipo;}

    static function findByPk($id){
        $connection = DB::getInstance();
        $consulta = $connection->prepare("SELECT * FROM cardapio WHERE id=:id");
        $consulta->execute([':id' => $id]);
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'cardapio');
        return $consulta->fetch();
    }

    function inserir()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("INSERT INTO cardapio(nome, tipo, data) VALUES(:nome,:tipo,:data)");
        $consulta->execute([
            ':nome' => $this->nome,
            ':tipo' => $this->tipo,
            ':data' => $this->data
        ]);
        $consulta = $connection->prepare("SELECT id FROM cardapio ORDER BY id DESC LIMIT 1");
        $consulta->execute();
        $dat = $consulta->fetch(PDO::FETCH_ASSOC);
        $this->id = $dat['id'];
    }

    function alterar()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("UPDATE cardapio SET nome = :nome, tipo = :tipo, data = :data WHERE id= :id");
        $consulta->execute([
            ':id' => $this->id,
            ':nome' => $this->nome,
            ':tipo' => $this->tipo,
            ':data' => $this->data
        ]);
    }

    function remover()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("DELETE FROM cardapio WHERE id= :id");
        $consulta->execute([':id' => $this->id]);
    }
}

class Ingrediente
{

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "descricao" => $this->descricao_ingr,
            "calorias" => $this->caloria_ingr,
        ]);
    }

    private $id = "";
    private $descricao_ingr = "";
    private $caloria_ingr = "";

    function setdescricao_ingr($v) {$this->descricao_ingr = $v;}
    function setcaloria_ingr($v){$this->caloria_ingr = $v;}
    function getdescricao_ingr(){return $this->descricao_ingr;}
    function getcaloria_ingr(){return $this->caloria_ingr;}

    static function findByPk($id){
        $connection = DB::getInstance();
        $consulta = $connection->prepare("SELECT * FROM ingredientes WHERE id=:id");
        $consulta->execute([':id' => $id]);
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'ingredientes');
        return $consulta->fetch();
    }

    function inserir()
    {
        try {
            
            $connection = DB::getInstance();
            $consulta = $connection->prepare("INSERT INTO ingredientes(descricao, calorias) VALUES(:descricao, :calorias)");
            $consulta->execute([
                ':descricao' => $this->descricao_ingr,
                ':calorias' => $this->caloria_ingr
            ]);
            $consulta = $connection->prepare("SELECT id FROM ingredientes ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            $dat = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->id = $dat['id'];
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro interno!");
        }
    }

    function alterar()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("UPDATE ingredientes SET tipo = descricao, calorias = :calorias WHERE id= :id");
            $consulta->execute([
                ':id' => $this->id,
                ':descricao_ingr' => $this->descricao_ingr,
                'caloria_ingr' => $this->caloria_ingr
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function remover()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("DELETE FROM ingredientes WHERE id= :id");
            $consulta->execute([':id' => $this->id]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


class Item
{

function __toString(){
        return json_encode([
            "id" => $this->id,
            "descricao" => $this->descricao_item,
            "calorias" => $this->calorias_item,
        ]);
    }

    private $id = "";
    private $descricao_item = "";
    private $calorias_item = "";

    function setdescricao_item($v) {$this->descricao_item = $v;}
    function setcaloria_item($v){$this->calorias_item = $v;}
    function getdescricao_item(){return $this->descricao_item;}
    function getcaloria_item(){return $this->calorias_item;}

    static function findByPk($id){
        $connection = DB::getInstance();
        $consulta = $connection->prepare("SELECT * FROM item WHERE id=:id");
        $consulta->execute([':id' => $id]);
        $consulta->setFetchMode(PDO::FETCH_CLASS, 'item');
        return $consulta->fetch();
    }

    function inserir()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("INSERT INTO item(descricao, calorias) VALUES(:descricao, :calorias)");
            $consulta->execute([
                ':descricao' => $this->descricao_item,
                ':calorias' => $this->calorias_item
            ]);
            $consulta = $connection->prepare("SELECT id FROM item ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            $dat = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->id = $dat['id'];
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro interno!");
        }
    }

    function alterar()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("UPDATE ingredientes SET descricao = :descricao, calorias = :calorias WHERE id= :id");
            $consulta->execute([
                ':id' => $this->id,
                ':descricao' => $this->descricao_item,
                ':calorias' => $this->calorias_item
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function remover()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("DELETE FROM item WHERE id= :id");
            $consulta->execute([':id' => $this->id]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
