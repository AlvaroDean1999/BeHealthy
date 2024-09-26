<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario no ha iniciado sesión o si no es un entrenador
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "trainer") {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Aquí puedes obtener el ID del usuario desde $_SESSION["user_id"] y realizar las operaciones necesarias
$user_id = $_SESSION["user_id"];

// Incluir el archivo de conexión
include '../model/connection.php';

// Obtener los datos del entrenador
$sql = "SELECT nombre, apellido, fecha_nacimiento, descripcion, foto_path FROM Entrenador WHERE id_entrenador = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron los datos del entrenador
if ($result->num_rows > 0) {
    $entrenador = $result->fetch_assoc();
} else {
    // Manejar el caso en el que no se encuentren datos del entrenador (opcional)
    echo "No se encontraron datos del entrenador.";
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
    <title>Entrenador</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/trainersProfile.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>

<body>
    <div class="main">
        <?php require '../includes/header.php'; ?>

        <section class="div__content">
            <div class="content__left">
                <h1 class="content__tittle">Trainer Profile</h1>
                <h3 class="left__subtittle">Here you can change your trainer data</h3>
            </div>


            <div class="content__right">
                <form class="content__form" action="../controller/updateProfileTrainer.php" method="POST"
                    enctype="multipart/form-data">
                    <?php if (!empty($entrenador['foto_path'])): ?>
                        <img src="<?php echo htmlspecialchars($entrenador['foto_path']); ?>" alt="Foto de perfil"
                            class="form__userImage" width="100"><br><br>
                    <?php endif; ?>
                    <div class="content__rightZone">
                        <div class="content__right1">

                            <label class="form__text" for="nombre">Nombre:</label>
                            <input class="form__input" type="text" id="nombre" name="nombre" required
                                value="<?php echo htmlspecialchars($entrenador['nombre']); ?>">

                            <label class="form__text" for="apellido">Apellido:</label>
                            <input class="form__input" type="text" id="apellido" name="apellido" required
                                value="<?php echo htmlspecialchars($entrenador['apellido']); ?>">

                            <label class="form__text" for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento"required
                                value="<?php echo htmlspecialchars($entrenador['fecha_nacimiento']); ?>">

                        </div>

                        <div class="content__right2">

                            <label class="form__text" for="descripcion">Descripción:</label>
                            <textarea class="form__input" id="descripcion" required
                                name="descripcion"><?php echo htmlspecialchars($entrenador['descripcion']); ?></textarea>

                            <label class="form__text" for="foto">Foto:</label>
                            <input class="form__fileinput" type="file" id="foto" name="foto" accept="image/*" required>

                        </div>
                    </div>
                    <input class="form__save" type="submit" value="Guardar">
                </form>
            </div>
        </section>
    </div>

    <script src="../js/header.js"></script>
</body>

</html>