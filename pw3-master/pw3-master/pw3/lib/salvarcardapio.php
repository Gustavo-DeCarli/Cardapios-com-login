<?php
require "class_comidinhahmmm.php";

try {
    
    $s = new Cardapio();
    $s->setNome($_POST['nome']);
    $s->settipo($_POST['tipo']);
    $s->setdata($_POST['data']);
    $s->setItens($_POST['itens']);
    $s->inserir();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>