<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario no ha iniciado sesión o si no es un cliente
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "client") {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Aquí puedes obtener el ID del usuario desde $_SESSION["user_id"] y realizar las operaciones necesarias
$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers</title>
    <link rel="stylesheet" href="../css/userTrainers.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>
<body>
<header>
<?php
include '../includes/headerClient.php'; 
?>
</header>
<?php
include '../model/connection.php';
?>
<section class="main">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['contratar'])) {
        $id_entrenador = $_POST['id_entrenador'];
        $id_cliente = $_SESSION["user_id"];

        // Preparar la sentencia SQL
        $stmt = $conn->prepare("UPDATE cliente SET id_entrenador = ? WHERE id_cliente = ?");
        $stmt->bind_param("ii", $id_entrenador, $id_cliente);

        if ($stmt->execute()) {
            echo "<script>alert('¡Entrenador contratado con éxito!');</script>";
        } else {
            echo "<script>alert('Error al contratar al entrenador: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

// Consulta para obtener todos los entrenadores junto con la información de si están contratados por el cliente actual
$sql = "SELECT e.id_entrenador, e.nombre, e.apellido, e.correo, e.fecha_nacimiento, e.descripcion, e.foto_path,
        (CASE WHEN c.id_entrenador = e.id_entrenador THEN 1 ELSE 0 END) AS contratado
        FROM entrenador e
        LEFT JOIN cliente c ON c.id_cliente = $user_id AND c.id_entrenador = e.id_entrenador";

$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

if ($result->num_rows > 0) {
    // Mostrar datos de cada entrenador
    while($row = $result->fetch_assoc()) {
        echo "<div class='trainer'>"; 
        echo "<img class='img__trainer' src='" . $row["foto_path"] . "' alt='Foto de perfil'>";
        echo "<h2 class='tittle__trainer' >" . $row["nombre"] . " " . $row["apellido"] . "</h2>";
        echo "<p class='text__trainer' >Correo: " . $row["correo"] . "</p>";
        echo "<p class='text__trainer' >Fecha de nacimiento: " . $row["fecha_nacimiento"] . "</p>";
        echo "<p class='text__trainer' >Descripción: " . $row["descripcion"] . "</p>";
        if ($row["contratado"]) {
            echo "<p class='text__trainer'><strong>¡Entrenador contratado!</strong></p>";
        } else {
            echo "<form method='post'>";
            echo "<input type='hidden' name='id_entrenador' value='" . $row["id_entrenador"] . "'>";
            echo "<button class='button__trainer' type='submit' name='contratar'>Contratar</button>"; 
            echo "</form>";
        }
        echo "</div>"; 
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
</section>
</body>
</html>
