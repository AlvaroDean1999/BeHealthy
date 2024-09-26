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

// Incluir el archivo de conexión
include '../model/connection.php';

// Obtener los datos del cliente
$sql = "SELECT nombre, apellido, fecha_nacimiento, objetivos, otros_datos, foto_path FROM Cliente WHERE id_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron los datos del cliente
if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
} else {
    // Manejar el caso en el que no se encuentren datos del cliente (opcional)
    echo "No se encontraron datos del cliente.";
    exit();
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/clientsHome.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>

<body>
    <?php require '../includes/headerClient.php'; ?>

    <section class="div__content">
        <div class="left__content">
            <h1 class="content__tittle">Profile</h1>
            <p class="profile__subtittle"> Here you can change the data of your profile! </p>
        </div>
        <div class="right__content">
            <form class="content__form" action="../controller/updateProfileClient.php" method="POST"
                enctype="multipart/form-data">
                <div class="form__photo">
                    <?php if (!empty($cliente['foto_path'])): ?>
                        <img src="<?php echo htmlspecialchars($cliente['foto_path']); ?>" alt="Foto de perfil"
                            class="form__userImage" width="100">
                    <?php endif; ?>
                </div>

                <div class="form__data">
                    <div class="form__data1">
                        <label class="form__text" for="nombre">Name:</label>
                        <input class="form__input" type="text" id="nombre" name="nombre" required
                            value="<?php echo htmlspecialchars($cliente['nombre']); ?>">


                        <label class="form__text" for="apellido">Surname:</label>
                        <input class="form__input" type="text" id="apellido" name="apellido" required
                            value="<?php echo htmlspecialchars($cliente['apellido']); ?>">


                        <label class="form__text" for="fecha_nacimiento">Date:</label>
                        <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required
                            value="<?php echo htmlspecialchars($cliente['fecha_nacimiento']); ?>">
                    </div>

                    <div class="form__data2">
                        <label class="form__text" for="objetivos">Objetives:</label>
                        <textarea class="form__input" id="objetivos" required
                            name="objetivos"><?php echo htmlspecialchars($cliente['objetivos']); ?></textarea>


                        <label class="form__text" for="otros_datos">Other data:</label>
                        <textarea class="form__input" id="otros_datos" required
                            name="otros_datos"><?php echo htmlspecialchars($cliente['otros_datos']); ?></textarea>

                        <label class="form__text" for="foto">Change Profile Photo:</label>
                        <input class="form__fileinput" type="file" id="foto" name="foto" accept="image/*" required>
                    </div>
                </div>
                <input class="form__save" type="submit" value="SAVE">
            </form>
        </div>
    </section>

    <script src="../js/header.js"></script>
</body>

</html>