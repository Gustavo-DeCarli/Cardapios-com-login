<?php
require "class_comidinhahmmm.php";

try {
    $p = new Cardapioid();
    $p->setiditem($_POST['itens']);
    $p->inserir();
    print $p;
    $s = new Cardapio();
    $s->setNome($_POST['nome']);
    $s->settipo($_POST['tipo']);
    $s->setdata($_POST['data']);
    $s->inserir();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>