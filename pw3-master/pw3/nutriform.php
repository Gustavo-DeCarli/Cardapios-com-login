<?php


session_start();
if (!isset($_SESSION['user_id'])) {
  echo '<script type="text/javascript">';
  echo 'alert("Login necessário");';
  echo 'window.location.href = "loginnutri.php";';
  echo '</script>';
  exit;
}

if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: index.php');
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link type="text/css" href="frontend/style.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>Cardapio RU</title>
</head>


<header>

  <nav>
    <ul class="nav__links">
      <a href="https://ifrs.edu.br "><img class="logo " src="frontend/image/ifrs.png"></a>
      <li></li>
      <li><button id="novo" type="button" class="btn-new btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1">
          Novo ingrediente
        </button></li>
      <li><button id="novo" type="button" class="btn-new btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal2">
          Novo item
        </button></li>
      <li><button id="novo" type="button" class="btn-new btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal3">
          Novo cardápio
        </button></li>
      <li></li>
      <li>
        <form method="POST">
          <button id="logout" name="logout" type="input" class="btn-logout btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Logout
          </button>
        </form>
      </li>
    </ul>
  </nav>
</header>


<!-- Novo ingrediente -->


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Ingrediente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" />

        <div class="mb-3">
          <label for="ingrediente" class="form-label">Nome Ingrediente</label>
          <input type="text" class="form-control" id="ingrediente" placeholder="Entre com o nome do ingrediente">
        </div>

        <div class="mb-3">
          <label for="calorias" class="form-label">Calorias</label>
          <input type="text" class="form-control" id="calorias" placeholder="Insira as calorias do alimento">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button id="salvar1" type="button" class="btn btn-success">Salvar</button>
        <button id="excluir1" type="button" class="btn btn-danger">Excluir</button>
      </div>

    </div>
  </div>
</div>


<!-- Novo item -->


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" />

        <div class="mb-3">
          <label for="item" class="form-label">Nome Item</label>
          <input type="text" class="form-control" id="item" placeholder="Entre com o nome do ingrediente">
        </div>

        <div class="mb-3">
          <label for="calorias1" class="form-label">Calorias</label>
          <input type="text" class="form-control" id="calorias1" placeholder="Insira as calorias do alimento">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button id="salvar2" type="button" class="btn btn-success">Salvar</button>
        <button id="excluir2" type="button" class="btn btn-danger">Excluir</button>
      </div>

    </div>
  </div>
</div>


<!-- Novo cardapio -->


<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo cardápio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" id="id" />
        <div class="mb-3">
          <label for="nome" class="form-label">Nome cardápio</label>
          <input type="text" class="form-control" id="nome" placeholder="Entre com o nome do ingrediente">
        </div>
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo</label>
          <input type="text" class="form-control" id="tipo" placeholder="Insira o tipo do cardápio">
        </div>
        <div class="mb-3">
          <label for="data" class="form-label ">Data</label>
          <input type="date" class="form-control" id="data" placeholder="Insira as calorias do alimento">
        </div>

        <div class="mb-3">
          <form id="form_produto" name="produto" method="POST" action="">
            <label class="form-label " for="">Selecione um item</label>
          </form>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button id="salvar3" type="button" class="btn btn-success">Salvar</button>
        <button id="excluir3" type="button" class="btn btn-danger">Excluir</button>
      </div>

    </div>
  </div>
</div>



<?php
require 'lib/conn.php';

$connection = DB::getInstance();
$stmt = $connection->query("SELECT * from cardapio");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$dados11 = $stmt->fetchAll();
$table = "";
foreach ($dados11 as $dados) {
  $table .= '<div class="container container-fluid">';
  $table .= '<table id="example" class="table table-strped table-bordered" style="width:100%">';
  $table .= '<thead>';
  $table .= '<tr>';
  $table .= "<td>{$dados['nome']}</td>";
  $table .= "<td>{$dados['tipo']}</td>";
  $table .= "<td>{$dados['data']}</td>";
  $table .= '</tr>';
  $table .= '</thead>';
  $table .= '<tbody>';
  $table .= '<table id="example" class="table table-striped table-bordered" style="width:100%">';
  $pesq2 = $connection->query("SELECT descricao, calorias FROM item INNER JOIN cardapioid ON item.id = cardapioid.iditem INNER JOIN cardapio ON cardapio.id = cardapioid.idcardapio");
  $dados2 = $pesq2->fetch(PDO::FETCH_ASSOC);
  $table .= '<tr>';
  $table .= "<td>Comida: {$dados2['descricao']}</td>";
  $table .= "<td>Calorias: {$dados2['calorias']}CAL</td>";
  $table .= '</tr>';
  $table .= '</tbody>';
  $table .= '</table>';
  $table .= '</div>';
}

echo $table;
?>





























<script src="frontend/script.js"></script>
</body>

</html>