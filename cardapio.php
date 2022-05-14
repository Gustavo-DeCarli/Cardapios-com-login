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
    <link type="text/css" href="estilo.css" rel="stylesheet"/>
    <title>Relação de pessoas</title>
  </head>
  <body>
    <button id="novo" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Nova Pessoa
    </button>
  
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>


  </body>
</html>