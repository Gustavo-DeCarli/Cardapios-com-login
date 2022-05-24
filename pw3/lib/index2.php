<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=pw3", "root", "");
    $cardapio = [];
    foreach ($db->query("
        SELECT * FROM cardapio ") as $cardapio){
        $cardapio[] = [
            "id" => $cardapio['id'],
            "nome" => $cardapio['nome'],
            "tipo" => $cardapio['tipo'],
            "data" => $cardapio['data']
        ];
    }
    print json_encode($cardapio);
} catch(PDOException $e){
    die($e->getMessage());
}
?>