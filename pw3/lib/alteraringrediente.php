<?php
require "class_comidinhahmmm.php";

$id = $_GET['id'];

$p = Ingrediente::findByPk($id);
if (!$p) throw new Exception("Usuário não encontrado!");
$p->setdescricao_ingr($_POST['ingrediente']);
$p->setcaloria_ingr($_POST['caloriasingrediente']);
$p->alterar();
print $p;

?>