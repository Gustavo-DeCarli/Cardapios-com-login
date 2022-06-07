<?php


session_start();
if (!isset($_SESSION['user_id'])) {
  echo '<script type="text/javascript">';
  echo 'alert("Login necessário");';
  echo 'window.location.href = "login.php";';
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
  <title>Cardapio RU</title>
</head>

<body>


  <header>

    <nav>
      <ul class="nav__links">
        <a href="https://ifrs.edu.br "><img class="logo " src="frontend/image/ifrs.png"></a>
        <li></li>
        <li class="h1">Cardápio</li>
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

  <?php
  require 'lib/conn.php';

  $connection = DB::getInstance();
  $stmt = $connection->query("SELECT * from cardapio");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $dados11 = $stmt->fetchAll();
  $table = "";
  foreach ($dados11 as $dados) {
    $table .= '<div class="container container-fluid ">';
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


</body>

</html>