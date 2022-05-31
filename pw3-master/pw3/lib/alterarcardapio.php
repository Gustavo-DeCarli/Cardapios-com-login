<?php
require "class_comidinhahmmm.php";

$id = $_GET['id'];

$p = Cardapio::findByPk($id);
if (!$p) throw new Exception("Usuário não encontrado!");
$p->setNome($_POST['cardapio']);
$p->settipo($_POST['tipo']);
$p->setdata($_POST['data']);
$p->alterar();
print $p;

?>