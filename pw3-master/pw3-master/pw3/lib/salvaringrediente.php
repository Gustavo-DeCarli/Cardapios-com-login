<?php
require "class_comidinhahmmm.php";

try {
    $p = new Ingrediente();
    $p->setdescricao_ingr($_POST['ingrediente']);
    $p->setcaloria_ingr($_POST['calorias']);
    $p->inserir();
    print $p;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>