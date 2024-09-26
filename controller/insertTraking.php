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

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $medida_cintura = !empty($_POST['medida_cintura']) ? $_POST['medida_cintura'] : null;
    $medida_cadera = !empty($_POST['medida_cadera']) ? $_POST['medida_cadera'] : null;
    $medida_cuello = !empty($_POST['medida_cuello']) ? $_POST['medida_cuello'] : null;

    // Obtener la fecha actual
    $fecha_actual = date("Y-m-d");

    // Incluir el archivo de conexión a la base de datos
    include '../model/connection.php';

    // Preparar la consulta SQL para insertar el seguimiento
    $sql = "INSERT INTO progreso (id_cliente, fecha, peso, altura, medida_cintura, medida_cadera, medida_cuello)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error al preparar la consulta: " . $conn->error;
        exit();
    }

    // Vincular los parámetros
    $stmt->bind_param("isdssss", $user_id, $fecha_actual, $peso, $altura, $medida_cintura, $medida_cadera, $medida_cuello);

    // Ejecutar la consulta
    $result = $stmt->execute();
    if ($result === false) {
        echo "Error al insertar el seguimiento: " . $stmt->error;
    } else {
        // Mostrar mensaje de seguimiento insertado correctamente
        echo "<script>alert('Seguimiento insertado correctamente.'); window.location.href = '../view/userRutine.php';</script>";
        exit();
    }

    // Cerrar la declaración
    $stmt->close();

    // Cerrar la conexión a la base de datos
    $conn->close();
}

