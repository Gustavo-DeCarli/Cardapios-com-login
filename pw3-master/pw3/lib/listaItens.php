<?php
require ("class_comidinhahmmm.php");
$lista = Item::listar();
print json_encode($lista);
?>