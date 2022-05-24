<?php
require "class_comidinhahmmm.php";

$id = $_GET['id'];

$p = item::findByPk($id);
if (!$p) throw new Exception("Usuário não encontrado!");
$p->remover();
print $p;

?>