<?php
require ("class_comidinhahmmm.php");

$p = item::findByPk($id);
if (!$p) throw new Exception("Error!");
$p->listar();
print $p;
?>