<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - Modifica un Pokemon</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
  <style>
    .aire {
      padding: 10px 60px 10px 60px;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <?php
    $CodGen = $_POST["CodGen"];
    $Numero = $_POST["Numero"];
  ?>
  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">CRUD - Modifica una Generación</h1>

      <form action="generaciones.php" method="post">
        <input type="hidden" name="accion" value="modificar">
        <input type="hidden" name="CodGenAntiguo" value="<?= $CodGen ?>">
        <div class="mb-3 aire">
          <label for="CodGen" class="form-label">Codigo</label>
          <input
            type="text"
            class="form-control"
            id="CodGen"
            name="CodGen"
            value="<?= $CodGen ?>"
            size="10">
        </div>

        <div class="mb-3 aire">
          <label for="Numero" class="form-label">Generación</label>
          <input
            type="tel"
            class="form-control"
            id="Numero"
            name="Numero"
            value="<?= $Numero ?>">
        </div>

        <div class="mb-3 aire">
          <button type="submit" class="btn btn-success">
            Aceptar
          </button>

          <button class="btn btn-danger">
            <a href="generaciones.php">
              Cancelar
            </a>
          </button>
          
        <div>
      </form>

    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>