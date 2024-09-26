<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Entrenador</title>
    <link rel="stylesheet" href="../css/clientsTrainer.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>

<body>
    <header>
        <!-- Aquí puedes incluir el encabezado común a todas las páginas -->
        <?php require '../includes/header.php'; ?>
    </header>
    <div class="main">
        

        <?php
        // Iniciar la sesión
        session_start();

        // Verificar si el usuario ha iniciado sesión como entrenador
        if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "trainer") {
            // Redirigir al usuario a la página de inicio de sesión
            header("Location: login.php");
            exit();
        }

        // Incluir el archivo de conexión a la base de datos
        include '../model/connection.php';

        // Obtener el ID del entrenador desde la sesión
        $user_id = $_SESSION["user_id"];

        // Consulta para obtener los clientes conectados al entrenador actual
        $sql = "SELECT c.id_cliente, c.foto_path, c.nombre, c.apellido, c.correo, c.fecha_nacimiento, c.objetivos, c.otros_datos
                FROM cliente c
                INNER JOIN entrenador e ON c.id_entrenador = e.id_entrenador
                WHERE e.id_entrenador = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos de cada cliente conectado al entrenador
            while ($row = $result->fetch_assoc()) {
                echo "<div class='clientContainter'>";
                echo "<img src='" . $row["foto_path"] . "' alt='Foto de perfil' class='client__img'>";
                echo "<p class='client__text'>Nombre: " . $row["nombre"] . "</p>";
                echo "<p class='client__text'>Apellido: " . $row["apellido"] . "</p>";
                echo "<p class='client__text'>Correo: " . $row["correo"] . "</p>";
                echo "<p class='client__text'>Fecha de nacimiento: " . $row["fecha_nacimiento"] . "</p>";
                echo "<p class='client__text'>Objetivos: " . $row["objetivos"] . "</p>";
                echo "<p class='client__text'>Otros datos: " . $row["otros_datos"] . "</p>";

                // Formulario para cargar la dieta
                echo "<form class='client__form' action='../controller/agregarRutina.php' method='post' enctype='multipart/form-data'>";
                echo "<input class='client__input' type='hidden' name='client_id' value='" . $row["id_cliente"] . "'>";
                echo "<label class='client__text' for='dieta'>Cargar Dieta:</label>";
                echo "<input class='client__input'type='file' id='dieta' name='dieta' required>";
                echo "<label class='client__text' for='rutina'>Cargar Rutina:</label>";
                echo "<input class='client__input'type='file' id='rutina' name='rutina' required>";
                echo "<button class='client__button' type='submit'>Actualizar</button>";
                echo "</form>";

                echo "<a class='client__link' href='progressTrainer.php?id_cliente=" . $row["id_cliente"] . "'>Ver Progreso</a>";


                echo "</div>";
            }
        } else {
            echo "No hay clientes conectados a este entrenador";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </div>

</body>

</html>
