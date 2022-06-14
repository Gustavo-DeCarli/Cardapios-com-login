<?php
require "class_comidinhahmmm.php";

try {
    $p = Cardapio::findByPk($_POST['idcardapio']);
    $p->remover();
    print $p;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
