<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han proporcionado los archivos
    if (isset($_FILES['dieta']) && isset($_FILES['rutina'])) {
        // Obtener el ID del cliente
        $client_id = $_POST['client_id'];

        // Rutas de destino para los archivos
        $dieta_destino = '../userFiles/' . uniqid('', true) . '_' . basename($_FILES['dieta']['name']);
        $rutina_destino = '../userFiles/' . uniqid('', true) . '_' . basename($_FILES['rutina']['name']);

        // Mover los archivos a sus rutas de destino
        if (move_uploaded_file($_FILES['dieta']['tmp_name'], $dieta_destino) && move_uploaded_file($_FILES['rutina']['tmp_name'], $rutina_destino)) {
            // Incluir la conexión a la base de datos
            include '../model/connection.php';

            // Actualizar la tabla Cliente con las rutas de los archivos
            $sql = "UPDATE cliente SET dieta = ?, rutina = ? WHERE id_cliente = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $dieta_destino, $rutina_destino, $client_id);

            if ($stmt->execute()) {
                header("Location: ../view/clientsTrainer.php");
                exit(); 
            } else {
                echo "Error al actualizar la tabla Cliente: " . $conn->error;
            }

            // Cerrar la conexión
            $stmt->close();
            $conn->close();
        } else {
            echo "Error al mover los archivos a la carpeta de destino.";
        }
    } else {
        echo "Debe seleccionar archivos para cargar.";
    }
}

