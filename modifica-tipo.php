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
    $CodTipo = $_POST["CodTipo"];
    $Categoria = $_POST["Categoria"];
  ?>
  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">CRUD - Modifica un Pokemon</h1>

      <form action="tipos.php" method="post">
        <input type="hidden" name="accion" value="modificar">
        <input type="hidden" name="CodTipoAntiguo" value="<?= $CodTipo ?>">
        <div class="mb-3 aire">
          <label for="CodTipo" class="form-label">Codigo</label>
          <input
            type="text"
            class="form-control"
            id="CodTipo"
            name="CodTipo"
            value="<?= $CodTipo ?>"
            size="10">
        </div>

        <div class="mb-3 aire">
          <label for="Categoria" class="form-label">Generación</label>
          <input
            type="tel"
            class="form-control"
            id="Categoria"
            name="Categoria"
            value="<?= $Categoria ?>">
        </div>

        <div class="mb-3 aire">
          <button type="submit" class="btn btn-success">
            Aceptar
          </button>

          <button class="btn btn-danger">
            <a href="tipos.php">
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