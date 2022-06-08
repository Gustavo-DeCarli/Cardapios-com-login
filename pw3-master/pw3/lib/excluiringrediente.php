<?php
require "class_comidinhahmmm.php";

try {
    $s = new ingrediente();
    $s->setdescricao_ingr($_POST['ingrediente']);
    $s->remover();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>