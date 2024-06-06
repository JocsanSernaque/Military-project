<?php
session_start();
// require 'conexion.php';
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];
// $tipo = $_SESSION['tipo'];
// $avatar = $_SESSION['avatar'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="../public/img/logo-ejercito.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./src/style.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <script src="../public/js/tailwind.config.jsx"></script>
</head>
<body class="bg-text text-sm font-ibmPlex">
    <div class="flex">
        <!-- Navbar Izquierda -->
        <div class="w-56 h-screen bg-primary text-white fixed">
            <div class="p-4">
                <a href="./dashboard.php">
                    <img src="../public/img/logo-ejercito.png" class="w-16 h-16 ml-12" alt="Logo del EP/">
                </a>
            </div>
            <nav class="mt-5">
                <ul class="flex justify-start flex-col text-sm mb-10 pt-8 gap-3">
                    <li class="">
                        <a href="dashboard.php?page=enlace1" class="block py-2 px-4 rounded-md hover:bg-fourth hover:text-primary">Dashboard</a>
                    </li>
                    <li class="">
                        <a href="dashboard.php?page=enlace2" class="block py-2 px-4 rounded-md hover:bg-fourth hover:text-primary">Personal Militar</a>
                    </li>
                    <li class="">
                        <a href="dashboard.php?page=enlace3" class="block py-2 px-4 rounded-md hover:bg-fourth hover:text-primary">Exámen de Control Físico</a>
                    </li>
                    <li class="">
                        <a href="dashboard.php?page=enlace4" class="block py-2 px-4 rounded-md hover:bg-fourth hover:text-primary">Enlace 4</a>
                    </li>
                    <li class="">
                        <a href="dashboard.php?page=enlace5" class="block py-2 px-4 rounded-md hover:bg-fourth hover:text-primary">Enlace 5</a>
                    </li>
                </ul>
            </nav>
            <div class="flex justify-end items-end">
                <a href="../models/logout.php" class="flex w-8 h-8 bg-rose-800 rounded ml-5 p-1 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1188 1000">
                        <path fill="#ffffff" d="m912 236l276 266l-276 264V589H499V413h413zM746 748l106 107q-156 146-338 146q-217 0-365.5-143.5T0 499q0-135 68-250T251.5 67.5T502 1q184 0 349 148L746 255Q632 151 503 151q-149 0-251.5 104T149 509q0 140 105.5 241T502 851q131 0 244-103" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Sección Principal -->
        <div class="flex-1 ml-56 bg-text h-screen">
            <div class="flex justify-end items-center bg-fourth h-16 gap-2 pr-4">
                <picture class="h-12 w-12 rounded-full bg-second">
                    <img src="" alt="">
                </picture>
                <div class="flex flex-col">
                    <h3 class=""><i><?php echo $id . ' ' . $nombre ?></i></h3>
                    <h2>ADMIN</h2>
                </div>
            </div>
            <div class="grid bg-white gap-6 p-3 ">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'enlace1':
                            echo "<div>";
                            require_once "admin/main.php";
                            echo "</div>";
                            break;
                        case 'enlace2':
                            echo "<div class=''>";
                            require_once "personalMil/personalMil.php";
                            echo "</div>";
                            break;
                        case 'enlace3':
                            echo "<div class='bg-white p-6 rounded-lg shadow-lg'>
                                    <h2 class='text-2xl font-bold mb-2'>Contenido Enlace 4</h2>
                                    <p>Este es el contenido del Enlace 3</p>
                                  </div>";
                            break;

                        case 'enlace4':
                            echo "<div class='bg-white p-6 rounded-lg shadow-lg'>
                                    <h2 class='text-2xl font-bold mb-2'>Contenido Enlace 4</h2>
                                    <p>Este es el contenido del Enlace 4.</p>
                                  </div>";
                            break;
                        case 'enlace5':

                            echo "<div class='bg-white p-6 rounded-lg shadow-lg'>";
                            require_once "admin/admin.php";
                            echo "</div>";
                            break;

                        default:
                            echo "<div class=''>";
                            require_once "admin/main.php";
                            echo "</div>";
                            break;
                    }
                } else {
                    echo "<div class=''>";
                    require_once "admin/main.php";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>