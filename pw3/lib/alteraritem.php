<?php
require "class_comidinhahmmm.php";

$id = $_GET['id'];

$p = Item::findByPk($id);
if (!$p) throw new Exception("Usuário não encontrado!");
$p->setdescricao_item($_POST['item']);
$p->setcalorias_item($_POST['caloriasitem']);
$p->alterar();
print $p;

?>