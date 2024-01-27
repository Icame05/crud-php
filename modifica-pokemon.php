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
    $CodPok = $_POST["CodPok"];
    $Nombre = $_POST["Nombre"];
    $CodTipo = $_POST["CodTipo"];
    $CodGen = $_POST["CodGen"];
  ?>
  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">CRUD - Modifica un Pokemon</h1>

      <form action="pokemons.php" method="post">
        <input type="hidden" name="accion" value="modificar">
        <input type="hidden" name="CodPokAntiguo" value="<?= $CodPok ?>">
        <div class="mb-3 aire">
          <label for="CodPok" class="form-label">Codigo</label>
          <input
            type="text"
            class="form-control"
            id="CodPok"
            name="CodPok"
            value="<?= $CodPok ?>"
            size="10">
        </div>

        <div class="mb-3 aire">
          <label for="Nombre" class="form-label">Nombre</label>
          <input
            type="text"
            class="form-control"
            id="Nombre"
            name="Nombre"
            value="<?= $Nombre ?>">
        </div>

        <div class="mb-3 aire">
          <label for="CodTipo" class="form-label">Tipo</label>
          <input
            type="text"
            class="form-control"
            id="CodTipo"
            name="CodTipo"
            value="<?= $CodTipo ?>">
        </div>

        <div class="mb-3 aire">
          <label for="CodGen" class="form-label">Generación</label>
          <input
            type="tel"
            class="form-control"
            id="CodGen"
            name="CodGen"
            value="<?= $CodGen ?>">
        </div>

        <div class="mb-3 aire">
          <button type="submit" class="btn btn-success">
            Aceptar
          </button>

          <button class="btn btn-danger">
            <a href="pokemons.php">
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