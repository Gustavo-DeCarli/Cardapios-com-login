<?php
require "class_comidinhahmmm.php";

try {
    $s = new Item();
    $s->setdescricao_item($_POST['item']);
    $s->remover();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>