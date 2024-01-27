<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generaciones</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
</head>

<body>

  <?php
  $conexion = mysqli_connect("db", "root", "test", "pokemon");

  if (!isset($_POST["accion"])) {
    $_POST["accion"] = "";
  }

  if ($_POST["accion"] == "eliminar") {
    $borra = "DELETE FROM generacion WHERE CodGen=\"$_POST[CodGen]\"";
    mysqli_query($conexion, $borra);
  }

  if ($_POST["accion"] == "insertar") {
    $inserta = "INSERT INTO generacion VALUES (\"$_POST[CodGen]\", \"$_POST[Numero]\")";
    mysqli_query($conexion, $inserta);
  }

  if ($_POST["accion"] == "modificar") {
    $modifica = "UPDATE generacion SET CodGen=\"$_POST[CodGen]\", Numero=\"$_POST[Numero]\" WHERE CodGen=\"$_POST[CodGenAntiguo]\"";
    mysqli_query($conexion, $modifica);
  }

  $consulta = mysqli_query($conexion, "SELECT * FROM generacion");
  ?>

  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">Generaciones</h1>

      <table class="table table-striped">
        <tr>
          <th>Código</th>
          <th>Generaciones</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>

        <?php

        while ($registro = mysqli_fetch_array($consulta)) {
        ?>
          <tr>
            <td><?= $registro['CodGen'] ?></td>
            <td><?= $registro['Numero'] ?></td>

            <!-- Botón para eliminar un cliente de la base de datos -->
            <td>
              <form action="generaciones.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="CodGen" value="<?= $registro['CodGen'] ?>">
                <button type="submit" class="btn btn-danger">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </button>
              </form>
            </td>

            <!-- Botón para modificar datos de un cliente -->
            <td>
              <form action="modifica-generacion.php" method="post">
                <input type="hidden" name="CodGen" value="<?= $registro['CodGen'] ?>">
                <input type="hidden" name="Numero" value="<?= $registro['Numero'] ?>">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-pencil"></i>
                  Modificar
                </button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>

        <!-- Botón para añadir un nuevo Pokemon -->
        <form action="generaciones.php" method="post">
          <input type="hidden" name="accion" value="insertar">
          <tr>
            <td><input type="text" name="CodGen" size="10" require></td>
            <td><input type="text" name="Numero"></td>
            <td>
              <button type="submit" class="btn btn-success">
                <i class="bi bi-floppy"></i>
                Añadir
              </button>
            </td>
            <td></td>
          </tr>
        </form>
      </table>
      <a href="./index.html"> << Página Principal</a>
      <br>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
