<?php
require_once '../../vendor/autoload.php';
require_once '../../modelo/id.php';
require_once '../../control/Admid.php';
require_once '../../utiles/funciones.php';

$datos = data_submitted();

// Verificar que el ID ha sido enviado
if (isset($datos['id'])) {
    $id = $datos['id'];
    // Instanciar la clase id y Abmid
    $id1 = new Modelo\Id($id); 
    $abmid = new Control\Abmid();
    // Generar el Hash ID
    $hashID = $abmid->generarHash($id1);
    
    // Asignar el hash al objeto id1
    $id1->setHash($hashID);
    // Llamar al método para insertar en la base de datos
    if ($id1->insertar()) {
        $mensaje = "Hash insertado correctamente en la base de datos.";
    } else {
        $mensaje = "Error al insertar el hash en la base de datos.";
    }
} else {
    $mensaje = "ID no proporcionado.";
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hash ID Generado</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h1 class="text-center mb-4">Hash ID Generado</h1>
            <?php if (isset($hashID)) { ?>
                <p><strong>ID Original:</strong> <?php echo htmlspecialchars($id); ?></p>
                <p><strong>Hash ID:</strong> <?php echo htmlspecialchars($hashID); ?></p>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php } ?>
            <div class="text-center mt-4">
                <a href="../home/index.php" class="btn btn-primary">Volver al Inicio</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
