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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/entrenadorHome.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>

<body>
    <div class="main">
        <?php require '../includes/header.php'; ?>

        <main class="main__content">
        

            <h1 class="home__tittle"> Welcome to your trainer profile! usuario</h1>

            <h3 class="home__subtittle"> What can you do here? </h3>
            <section class="home__itemSection">
                <div class="home__item">
                    <p class="itemHome__tittle"> See your metrics</p>
                    <img src="../img/metrica.png" alt="" class="itemHome__icon">
                </div>

                <div class="home__item">
                    <p class="itemHome__tittle"> Follow up on your clints</p>
                    <img src="../img/cliente.png" alt="" class="itemHome__icon">
                </div>

                <div class="home__item">
                    <p class="itemHome__tittle"> Edit your profile</p>
                    <img src="../img/usuario.png" alt="" class="itemHome__icon">
                </div>

                <div class="home__item">
                    <p class="itemHome__tittle">
                        adjust the application to your liking</p>
                    <img src="../img/configuraciones.png" alt="" class="itemHome__icon">
                </div>
            </section>



        </main>
    </div>

    <script src="../js/header.js"></script>
</body>

</html>