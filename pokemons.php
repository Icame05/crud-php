<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokemons</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
</head>

<body>

  <?php
  $conexion = mysqli_connect("localhost", "root", "test", "pokemon");

  if (!isset($_POST["accion"])) {
    $_POST["accion"] = "";
  }

  if ($_POST["accion"] == "eliminar") {
    $borra = "DELETE FROM pokemons WHERE CodPok=\"$_POST[CodPok]\"";
    mysqli_query($conexion, $borra);
  }

  if ($_POST["accion"] == "insertar") {
    $inserta = "INSERT INTO pokemons VALUES (\"$_POST[CodPok]\", \"$_POST[Nombre]\", \"$_POST[CodTipo]\", \"$_POST[CodGen]\")";
    mysqli_query($conexion, $inserta);
  }

  if ($_POST["accion"] == "modificar") {
    $modifica = "UPDATE pokemons SET CodPok=\"$_POST[CodPok]\", Nombre=\"$_POST[Nombre]\", CodTipo=\"$_POST[CodTipo]\", CodGen=\"$_POST[CodGen]\" WHERE CodPok=\"$_POST[CodPokAntiguo]\"";
    mysqli_query($conexion, $modifica);
  }

  $consulta = mysqli_query($conexion, "SELECT * FROM pokemons");
  ?>

  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">Pokemons</h1>

      <table class="table table-striped">
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Generación</th>
          <th>Tipo</th>
          <th></th>
          <th></th>
        </tr>

        <?php

        while ($registro = mysqli_fetch_array($consulta)) {
        ?>
          <tr>
            <td><?= $registro['CodPok'] ?></td>
            <td><?= $registro['Nombre'] ?></td>
            <td><?= $registro['CodTipo'] ?></td>
            <td><?= $registro['CodGen'] ?></td>

            <!-- Botón para eliminar un cliente de la base de datos -->
            <td>
              <form action="pokemons.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="CodPok" value="<?= $registro['CodPok'] ?>">
                <button type="submit" class="btn btn-danger">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </button>
              </form>
            </td>

            <!-- Botón para modificar datos de un cliente -->
            <td>
              <form action="modifica-pokemon.php" method="post">
                <input type="hidden" name="CodPok" value="<?= $registro['CodPok'] ?>">
                <input type="hidden" name="Nombre" value="<?= $registro['Nombre'] ?>">
                <input type="hidden" name="CodTipo" value="<?= $registro['CodTipo'] ?>">
                <input type="hidden" name="CodGen" value="<?= $registro['CodGen'] ?>">
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
        <form action="pokemons.php" method="post">
          <input type="hidden" name="accion" value="insertar">
          <tr>
            <td><input type="text" name="CodPok" size="10" require></td>
            <td><input type="text" name="Nombre"></td>
            <td><input type="text" name="CodTipo"></td>
            <td><input type="text" name="CodGen" size="10"></td>
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
