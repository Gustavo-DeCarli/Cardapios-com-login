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
include 'navbar.html';

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
<body>


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
  $stmt = $connection->query("SELECT cardapio.id, cardapio.nome, DATE_FORMAT(cardapio.data, '%d/%m/%Y') as data, cardapio.tipo, item.descricao, item.calorias from cardapio, item, cardapioid where cardapioid.idcardapio = cardapio.id AND item.id = cardapioid.iditem;");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $dados11 = $stmt->fetchAll();

  $cardapios = [];
  foreach($dados11 as $d){
    if (array_key_exists($d['id'], $cardapios)){
      $cardapios[$d['id']]['itens'][] = ['descricao' => $d['descricao'], 'calorias' => $d['calorias']]; 
      continue;
    }

    $cardapios[$d['id']] = [
      'id' => $d['id'],
      'nome' => $d['nome'],
      'data' => $d['data'],
      'tipo' => $d['tipo'],
      'itens' => [
        ['descricao' => $d['descricao'], 'calorias' => $d['calorias']]
      ]
    ];
  }
  

  $table = "";
  foreach ($cardapios as $dados) {
    $table .= '<div class="container container-fluid">';
    $table .= '<table id="tabela" class="table table-strped table-bordered" style="width:100%">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= "<td>{$dados['nome']}</td>";
    $table .= "<td>{$dados['tipo']}</td>";
    $table .= "<td>{$dados['data']}</td>";
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    $table .= '<table id="example" class="table table-striped table-bordered" style="width:100%">';
    foreach($dados['itens'] as $item){
      $table .= '<tr>';
      $table .= "<td>Comida: {$item['descricao']}</td>";
      $table .= "<td>Calorias: {$item['calorias']}CAL</td>";
      $table .= '</tr>';
    }
    $table .= '</tbody>';
    $table .= '</table>';
    $table .= '</div>';
  }
  echo $table;
  ?>

  <script src="frontend/script.js"></script>
  </body>

</html>