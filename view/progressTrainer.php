<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión como entrenador
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_type"]) || $_SESSION["user_type"] !== "trainer") {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Verificar si se ha pasado el id_cliente en la URL
if (!isset($_GET['id_cliente'])) {
    echo "Cliente no especificado.";
    exit();
}

// Obtener el id_cliente desde la URL
$id_cliente = $_GET['id_cliente'];

// Incluir el archivo de conexión a la base de datos
include '../model/connection.php';

// Consulta para obtener los datos de progreso del cliente
$sql = "SELECT fecha, peso, altura, medidas, medida_cintura, medida_cadera, medida_cuello
        FROM progreso
        WHERE id_cliente = $id_cliente
        ORDER BY fecha ASC";
$result = $conn->query($sql);

// Inicializar arrays para los datos del gráfico
$fechas = [];
$pesos = [];
$alturas = [];
$medidas_cintura = [];
$medidas_cadera = [];
$medidas_cuello = [];

// Extraer datos de progreso
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fechas[] = $row["fecha"];
        $pesos[] = $row["peso"];
        $alturas[] = $row["altura"];
        $medidas_cintura[] = $row["medida_cintura"];
        $medidas_cadera[] = $row["medida_cadera"];
        $medidas_cuello[] = $row["medida_cuello"];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progreso del Cliente</title>
    <link rel="stylesheet" href="../css/progressTrainer.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/landingPage/favicon.png" />
</head>
<body>
    <header>
        <!-- Aquí puedes incluir el encabezado común a todas las páginas -->
        <?php require '../includes/header.php'; ?>
    </header>
    <div class="main">

        <?php if (!empty($fechas)): ?>
            <canvas id="weightChart"></canvas>
            <canvas id="bmiChart"></canvas>
            <canvas id="fatChart"></canvas>
            
            <script>
                // Datos para los gráficos
                const fechas = <?php echo json_encode($fechas); ?>;
                const pesos = <?php echo json_encode($pesos); ?>;
                const alturas = <?php echo json_encode($alturas); ?>;
                const medidasCintura = <?php echo json_encode($medidas_cintura); ?>;
                const medidasCadera = <?php echo json_encode($medidas_cadera); ?>;
                const medidasCuello = <?php echo json_encode($medidas_cuello); ?>;

                // Función para calcular el IMC
                function calcularIMC(peso, altura) {
                    return peso / (altura * altura);
                }

                // Función para calcular el % de grasa corporal usando la fórmula de la Marina de los EE. UU.
                function calcularGrasaCorporal(cintura, cuello, altura) {
                    // La fórmula específica depende del género; aquí se supone que es para hombres
                    return 86.010 * Math.log10(cintura - cuello) - 70.041 * Math.log10(altura) + 36.76;
                }

                // Calcular IMC y % de grasa corporal para cada entrada
                const imc = pesos.map((peso, index) => calcularIMC(peso, alturas[index]));
                const grasaCorporal = medidasCintura.map((cintura, index) => calcularGrasaCorporal(cintura, medidasCuello[index], alturas[index]));

                // Gráfico de Peso
                new Chart(document.getElementById('weightChart'), {
                    type: 'line',
                    data: {
                        labels: fechas,
                        datasets: [{
                            label: 'Peso (kg)',
                            data: pesos,
                            borderColor: 'RGB(0, 128, 0)',
                            tension: 0.1
                        }]
                    }
                });

                // Gráfico de IMC
                new Chart(document.getElementById('bmiChart'), {
                    type: 'line',
                    data: {
                        labels: fechas,
                        datasets: [{
                            label: 'IMC',
                            data: imc,
                            borderColor: 'rgb(255, 99, 132)',
                            tension: 0.1
                        }]
                    }
                });

                // Gráfico de % de Grasa Corporal
                new Chart(document.getElementById('fatChart'), {
                    type: 'line',
                    data: {
                        labels: fechas,
                        datasets: [{
                            label: '% de Grasa Corporal',
                            data: grasaCorporal,
                            borderColor: 'rgb(54, 162, 235)',
                            tension: 0.1
                        }]
                    }
                });
            </script>
        <?php else: ?>
            <p>No hay datos de progreso disponibles para este cliente.</p>
        <?php endif; ?>
    </div>
</body>
</html>
