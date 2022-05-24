<?php
if (isset($_POST['funcionario'])) {
  header('Location: login.php');
}
if (isset($_POST['nutricionista'])) {
  header('Location: loginnutri.php');
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
  <link type="text/css" href="stylae.css" rel="stylesheet" />
  <title>Relação de pessoas</title>
</head>

<body class="container-fluid">


  <form class="card container position-absolute top-50 start-50 translate-middle w-25 p-4" method="post">
    <h2 style="text-align: center;">Voce é:</h2>
    <button type="submit" name="nutricionista" class="btn btn-primary p-4 btn-block mb-4">Nutricionista</button>
    <button type="submit" name="funcionario" class="btn btn-primary p-4 btn-block mb-4">Funcionário</button>
  </form>

</body>

</html>