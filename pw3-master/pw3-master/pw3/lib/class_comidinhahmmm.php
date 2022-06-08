<?php
require "conn.php";

class Cardapioid{
    private $id = "";
    private $iditem = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "iditem" => $this->iditem,
        ]);
    }

    function setiditem($v) {$this->iditem = $v;}
    function getiditem(){return $this->iditem;}


    function inserir()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("INSERT INTO cardapioid (iditem) VALUES(:iditem)");
        $consulta->execute([
            ':iditem' => $this->iditem,
        ]);
        $consulta = $connection->prepare("SELECT id FROM cardapioid ORDER BY id DESC LIMIT 1");
        $consulta->execute();
        $dat = $consulta->fetch(PDO::FETCH_ASSOC);
        $this->id = $dat['id'];
    }


}

class Cardapio
{
    private $id = "";
    private $nome = "";
    private $tipo = "";
    private $data = "";
    private $itens = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "nome" => $this->nome,
            "tipo" => $this->tipo,
            "data" => $this->data,
            "itens" => $this->itens
        ]);
    }

    function setNome($v) {$this->nome = $v;}
    function setdata($v){$this->data = $v;}
    function settipo($v){$this->tipo = $v;}
    function getNome(){return $this->nome;}
    function getdata(){return $this->data;}
    function gettipo(){return $this->tipo;}

    function setItens($itens){
        $this->itens = explode(",", $itens);
    }

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
        try{
            
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("INSERT INTO cardapio(nome, tipo, data) VALUES(:nome,:tipo,:data)");
            $consulta->execute([
                ':nome' => $this->nome,
                ':tipo' => $this->tipo,
                ':data' => $this->data,
            ]);
            $consulta = $connection->prepare("SELECT id FROM cardapio ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            $dat = $consulta->fetch(PDO::FETCH_ASSOC);
            $this->id = $dat['id'];
            foreach($this->itens as $item){
                $consulta = $connection->prepare("INSERT INTO cardapioid(iditem, idcardapio) VALUES(:iditem,:idcardapio)");
                $consulta->execute([
                    ':iditem' => $item,
                    ':idcardapio' => $this->id,
                ]); 
            }
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
        
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
        $consulta = $connection->prepare("DELETE FROM cardapio WHERE nome= :nome");
        $consulta->execute([':nome' => $this->nome]);
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
            $consulta = $connection->prepare("DELETE FROM ingredientes WHERE descricao= :descricao");
            $consulta->execute([':descricao' => $this->descricao_ingr]);
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
            $consulta = $connection->prepare("DELETE FROM item WHERE descricao= :descricao");
            $consulta->execute([':descricao' => $this->descricao_item]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    static function listar()
    {
        try {
            $connection = DB::getInstance();
            $consulta = $connection->prepare("SELECT id, descricao, calorias FROM item");
            $consulta->execute();
            return  $consulta->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}