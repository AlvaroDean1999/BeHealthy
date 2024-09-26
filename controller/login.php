<?php
// Incluir el archivo de conexión
include '../model/connection.php';

// Iniciar la sesión
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    // Consulta SQL para obtener las credenciales del entrenador
    $sql = "SELECT * FROM Entrenador WHERE correo='$mail'";
    $result = $conn->query($sql);

    // Verificar si se encontró un entrenador con el correo proporcionado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar si la contraseña proporcionada coincide con la contraseña hasheada
        if (password_verify($password, $row["pass"])) {
            // Iniciar sesión como entrenador
            $_SESSION["user_id"] = $row["id_entrenador"]; // Guardar el ID del entrenador en la sesión
            $_SESSION["user_type"] = "trainer";
            // Redirigir al entrenador a su página
            header("Location: ../view/entrenador.php");
            exit();
        }
    }

    // Consulta SQL para obtener las credenciales del cliente
    $sql = "SELECT * FROM Cliente WHERE correo='$mail'";
    $result = $conn->query($sql);

    // Verificar si se encontró un cliente con el correo proporcionado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar si la contraseña proporcionada coincide con la contraseña hasheada
        if (password_verify($password, $row["pass"])) {
            // Iniciar sesión como cliente
            $_SESSION["user_id"] = $row["id_cliente"]; // Guardar el ID del cliente en la sesión
            $_SESSION["user_type"] = "client";
            // Redirigir al cliente a su página
            header("Location: ../view/usuario.php");
            exit();
        }
    }

    // Si no se encuentra ningún usuario con las credenciales proporcionadas, mostrar un mensaje de error
    echo "<script> alert('La contraseña o usuario no son correctas'); window.location.href = '../view/login.php'; </script> ";
}

// Cerrar la conexión
$conn->close();
?>
