<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Red Social Emprendedores</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="feed.php">
                <img src="./images/logo.png" alt="Logo" class="logo">
                Red Social Emprendedores
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emprendedores.php">Emprendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="grupos.php">Grupos</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="notificaciones.php">Notificaciones
                            <span class="badge rounded-pill bg-danger badge-counter ms-2">99+</span>
                        </a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="messages.php">Mensajes
                            <span class="badge rounded-pill bg-danger badge-counter ms-2">99+</span>
                        </a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="salir.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>

            <!-- <form class="d-flex search-container">
                <input class="form-control me-2 search-bar" type="search" placeholder="Buscar..." aria-label="Buscar">
                <button class="btn btn-outline-success" type="submit">
                    <img src="https://cdn1.iconfinder.com/data/icons/search-43/512/20_lense_search_tool_scan-512.png" alt="Buscar" class="search-icon">
                </button>
            </form> -->

        </div>
    </nav>
</body>
</html>