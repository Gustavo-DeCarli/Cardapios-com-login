<?php
require "class_comidinhahmmm.php";

try {
    $p = new Item();
    $p->setdescricao_item($_POST['item']);
    $p->setcaloria_item($_POST['calorias1']);
    $p->inserir();
    print $p;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>