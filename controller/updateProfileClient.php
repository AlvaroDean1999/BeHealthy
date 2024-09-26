<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión como cliente
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "client") {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Incluir el archivo de conexión a la base de datos
include '../model/connection.php';

// Obtener el ID del cliente desde la sesión
$user_id = $_SESSION["user_id"];

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $objetivos = $_POST['objetivos'];
    $otros_datos = $_POST['otros_datos'];

    // Procesar la imagen
    $foto = $_FILES['foto'];
    $foto_nombre = $foto['name'];
    $foto_tipo = $foto['type'];
    $foto_tmp = $foto['tmp_name'];
    $foto_error = $foto['error'];

    // Verificar que se haya subido la imagen correctamente
    if ($foto_error === UPLOAD_ERR_OK) {
        // Generar un nombre único para la imagen
        $foto_destino = '../fotoUser/' . uniqid('', true) . '_' . $foto_nombre;

        // Mover la imagen al directorio de fotos de usuarios
        if (move_uploaded_file($foto_tmp, $foto_destino)) {
            // La imagen se ha guardado correctamente, ahora actualizamos los datos en la base de datos

            // Preparar la consulta SQL
            $sql = "UPDATE cliente SET fecha_nacimiento = '$fecha_nacimiento', objetivos = '$objetivos', otros_datos = '$otros_datos', foto_path = '$foto_destino'";

            // Añadir nombre y apellido a la consulta solo si se proporcionan nuevos valores
            if (!empty($nombre)) {
                $sql .= ", nombre = '$nombre'";
            }
            if (!empty($apellido)) {
                $sql .= ", apellido = '$apellido'";
            }

            $sql .= " WHERE id_cliente = '$user_id'";

            // Ejecutar la consulta SQL
            if ($conn->query($sql) === TRUE) {
                header("Location: ../view/userProfile.php");
                exit(); 
            } else {
                echo "Error al actualizar el perfil: " . $conn->error;
            }
        } else {
            echo "Error al subir la imagen";
        }
    } else {
        echo "Error al subir la imagen: " . $foto_error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

