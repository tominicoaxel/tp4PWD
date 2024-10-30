<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Proyecto Hashids</title>
    <!-- Cargar Bootstrap desde un CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4 text-primary">Bienvenido al Proyecto de Generación de Hash IDs con Hashids</h1>
            <p class="lead">
                Este proyecto utiliza la librería <strong>Hashids</strong> para generar IDs enmascarados a partir de números enteros. 
                Es útil para proteger datos sensibles o enmascarar información, como IDs de usuario o de productos, en URLs.
            </p>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">¿Cómo funciona la librería Hashids?</h2>
                <p class="card-text">
                Hashids utiliza un algoritmo de enmascaramiento que convierte un número entero en una cadena alfanumérica basada en un "salt" (sal). Un salt es una cadena aleatoria que se añade a los datos para hacer más difícil que alguien pueda adivinar o revertir el proceso de generación del hash. Al incluir este salt, aunque dos sistemas utilicen el mismo número como entrada, si tienen salts distintos, los hashes resultantes serán diferentes. Además, puedes especificar la longitud mínima del hash generado para mayor seguridad.
                </p>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">¿Porque es importante hacerlo?</h2>
                <p class="card-text">
                    Es una medida importante que se tiene que tomar ya que te permite enmascarar ID en aplicaciones web para que no se expongan datos internos si se muestran en la URL de una app.
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Pasos para utilizar Hashids en este proyecto</h2>
                <ol class="list-group">
                    <li class="list-group-item">Instalamos Composer y usamos el comando <code>composer require hashids/hashids</code> para incluir la librería.</li>
                    <li class="list-group-item">Creamos un archivo PHP que usa la librería para convertir un número entero en un Hash ID.</li>
                    <li class="list-group-item">Incluimos <code>vendor/autoload.php</code> para cargar automáticamente las dependencias.</li>
                    <li class="list-group-item">Usamos el método <code>encode</code> de la clase <code>Hashids</code> para enmascarar el ID y mostrarlo al usuario.</li>
                </ol>
            </div>
        </div>

        <div class="text-center">
            <p>Haz clic en el enlace a continuación para comenzar la demostración:</p>
            <a href="../form.php" class="btn btn-primary btn-lg">Ir al Generador de Hash ID</a>
        </div>
    </div>

    <!-- Cargar Bootstrap y jQuery desde un CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
