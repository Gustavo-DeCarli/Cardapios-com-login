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

  <title>Relação de pessoas</title>
</head>

<body>

  <!-- Novo ingrediente -->
  <button id="novo" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
    Novo ingrediente
  </button>

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
          <button id="alterar" type="button" class="btn btn-success">Alterar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Novo item -->
  <button id="novo" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
    Novo item
  </button>

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
            <label for="ingrediente" class="form-label">Nome Item</label>
            <input type="text" class="form-control" id="item" placeholder="Entre com o nome do ingrediente">
          </div>
          <div class="mb-3">
            <label for="calorias" class="form-label">Calorias</label>
            <input type="text" class="form-control" id="calorias" placeholder="Insira as calorias do alimento">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button id="salvar2" type="button" class="btn btn-success">Salvar</button>
          <button id="alterar2" type="button" class="btn btn-success">Alterar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Novo cardápio -->
  <button id="novo" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Novo cardápio
  </button>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo cardápio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" />
          <div class="mb-3">
            <label for="cardapio" class="form-label">Nome cardápio</label>
            <input type="text" class="form-control" id="cardapio" placeholder="Entre com o nome do ingrediente">
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="tipo" placeholder="Insira o tipo do cardápio">
          </div>
          <div class="mb-3">
            <label for="calorias" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" placeholder="Insira as calorias do alimento">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button id="salvar3" type="button" class="btn btn-success">Salvar</button>
          <button id="alterar" type="button" class="btn btn-success">Alterar</button>
        </div>
      </div>
    </div>
  </div>



  



  <form method="POST">
    <button id="logout" name="logout" type="input" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Logout
    </button>
  </form>

  <script src="script.js"></script>
</body>

</html>