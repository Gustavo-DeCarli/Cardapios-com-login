<?php

require "conn.php";

class cardapio
{
    private $id = "";
    private $tipo = "";
    private $data = "";

    function inserir()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("INSERT INTO cardapio(tipo, data) VALUES(:tipo,:data)");
        $consulta->execute([
            ':tipo' => $this->nome,
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
        $consulta = $connection->prepare("UPDATE cardapio SET tipo = :tipo, data = :data WHERE id= :id");
        $consulta->execute([
            ':id' => $this->id,
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
class ingredientes
{

    private $id = "";
    private $descricao_ingr = "";
    private $caloria_ingr = "";

    function inserir()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("INSERT INTO ingredientes(descricao_ingr, caloria_ingr) VALUES(:descricao_ingr, :caloria_ingr)");
            $consulta->execute([
                ':descricao_ingr' => $this->descricao_ingr,
                ':caloria_ingr' => $this->caloria_ingr
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
            $consulta = $connection->prepare("UPDATE ingredientes SET tipo = descricao_ingr, caloria_ingr = :caloria_ingr WHERE id= :id");
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


class item
{

    private $id = "";
    private $descricao_item = "";
    private $calorias_item = "";

    function inserir()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("INSERT INTO item(calorias_item, calorias_item) VALUES(:calorias_item, :calorias_item)");
            $consulta->execute([
                ':calorias_item' => $this->calorias_item,
                ':calorias_item' => $this->calorias_item
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
            $consulta = $connection->prepare("UPDATE ingredientes SET descricao_item = :descricao_item, calorias_item = :calorias_item WHERE id= :id");
            $consulta->execute([
                ':id' => $this->id,
                ':descricao_item' => $this->descricao_item,
                ':calorias_item' => $this->calorias_item
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
