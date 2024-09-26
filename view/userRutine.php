<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rutas de Dieta y Rutina</title>
    <link rel="stylesheet" href="../css/userRutine.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>

<body>
    <header>
        <?php require '../includes/headerClient.php'; ?>
    </header>
    <section class="main">


        <?php
        // Iniciar la sesión
        session_start();

        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"])) {
            // Redirigir al usuario a la página de inicio de sesión
            header("Location: login.php");
            exit();
        }

        // Obtener el ID del usuario desde la sesión
        $user_id = $_SESSION["user_id"];

        // Incluir el archivo de conexión a la base de datos
        include '../model/connection.php';

        // Consulta para obtener las rutas de la dieta y la rutina del cliente
        $sql = "SELECT dieta, rutina FROM cliente WHERE id_cliente = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar las rutas de la dieta y la rutina
            while ($row = $result->fetch_assoc()) {
                echo "<div class='container__a'>";
                echo "<h2 class='tittle__a'>Diets & Rutine</h2>";
                echo "<h4 class='subtittle__a'>Here you can see the diets and rutine than your trainer have done</h4>";
                echo "<p class='text__a'>Diet: <a href='" . $row["dieta"] . "' target='_blank'>" . $row["dieta"] . "</a></p>";
                echo "<p class='text__a'>Rutin: <a href='" . $row["rutina"] . "' target='_blank'>" . $row["rutina"] . "</a></p>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron rutas asociadas a este usuario.";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
   
        <div class="followUp__container">
            <h1 class="followUp__tittle"> Follow Up </h1>
            <form action="../controller/insertTraking.php" method="POST" class="followUp__form">
                <label class="form__text" for="peso">Peso (kg):</label>
                <input class="form__input" type="number" id="peso" name="peso" step="0.01" required><br><br>

                <label class="form__text" for="altura">Altura (cm):</label>
                <input class="form__input" type="number" id="altura" name="altura" required><br><br>

                <label class="form__text" for="medida_cintura">Medida de cintura (cm):</label>
                <input class="form__input" type="number" id="medida_cintura" name="medida_cintura" required><br><br>

                <label class="form__text" for="medida_cadera">Medida de cadera (cm):</label>
                <input class="form__input" type="number" id="medida_cadera" name="medida_cadera" required><br><br>

                <label class="form__text" for="medida_cuello">Medida del cuello (cm):</label>
                <input class="form__input" type="number" id="medida_cuello" name="medida_cuello" required><br><br>

                <button class="form__button" type="submit">Save</button>
            </form>
        </div>
    </section>

</body>

</html>