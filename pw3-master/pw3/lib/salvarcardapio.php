<?php
require "class_comidinhahmmm.php";

var_dump($_POST);
try {
    $p = new Cardapio();
    $p->setNome($_POST['nome']);
    $p->settipo($_POST['tipo']);
    $p->setdata($_POST['data']);
    $p->setcardapio($_POST['itens']);
    $p->inserir();
    print $p;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>