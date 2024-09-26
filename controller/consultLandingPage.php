<?php

include '../model/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $consult = $_POST["consulta"];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO Consulta (nombre, correo, consulta ) VALUES ('$name', '$mail', '$consult')";

    if ($conn->query($sql) === TRUE) {
        // Mostrar ventana emergente con el mensaje de registro completado y redirigir después de cerrar la ventana
        echo "<script>alert('¡Tu consulta ha sido envíada!'); window.location.href = '../index.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}