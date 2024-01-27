<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tipos</title>
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
    $borra = "DELETE FROM tipo WHERE CodTipo=\"$_POST[CodTipo]\"";
    mysqli_query($conexion, $borra);
  }

  if ($_POST["accion"] == "insertar") {
    $inserta = "INSERT INTO tipo VALUES (\"$_POST[CodTipo]\", \"$_POST[Categoria]\")";
    mysqli_query($conexion, $inserta);
  }

  if ($_POST["accion"] == "modificar") {
    $modifica = "UPDATE tipo SET CodTipo=\"$_POST[CodTipo]\", Categoria=\"$_POST[Categoria]\" WHERE CodTipo=\"$_POST[CodTipoAntiguo]\"";
    mysqli_query($conexion, $modifica);
  }

  $consulta = mysqli_query($conexion, "SELECT * FROM tipo");
  ?>

  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">Tipos</h1>

      <table class="table table-striped">
        <tr>
          <th>Código</th>
          <th>Tipo</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>

        <?php

        while ($registro = mysqli_fetch_array($consulta)) {
        ?>
          <tr>
            <td><?= $registro['CodTipo'] ?></td>
            <td><?= $registro['Categoria'] ?></td>

            <!-- Botón para eliminar un cliente de la base de datos -->
            <td>
              <form action="tipos.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="CodTipo" value="<?= $registro['CodTipo'] ?>">
                <button type="submit" class="btn btn-danger">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </button>
              </form>
            </td>

            <!-- Botón para modificar datos de un cliente -->
            <td>
              <form action="modifica-tipo.php" method="post">
                <input type="hidden" name="CodTipo" value="<?= $registro['CodTipo'] ?>">
                <input type="hidden" name="Categoria" value="<?= $registro['Categoria'] ?>">
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
        <form action="tipos.php" method="post">
          <input type="hidden" name="accion" value="insertar">
          <tr>
            <td><input type="text" name="CodTipo" size="10" require></td>
            <td><input type="text" name="Categoria"></td>
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
