<?php
// Incluir el archivo de conexión
include '../model/connection.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $type = $_POST["type"];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Determinar la tabla a la que insertar los datos
    $table = ($type == "trainer") ? "Entrenador" : "Cliente";

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO $table (nombre, apellido, correo, pass) VALUES ('$name', '$surname', '$mail', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Mostrar ventana emergente con el mensaje de registro completado y redirigir después de cerrar la ventana
        echo "<script>alert('¡Tu registro ha sido completado!'); window.location.href = '../view/login.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
