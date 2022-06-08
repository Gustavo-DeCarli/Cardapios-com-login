<?php
require "class_comidinhahmmm.php";

try {
    $s = new cardapio();
    $s->setnome($_POST['nome']);
    $s->remover();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>