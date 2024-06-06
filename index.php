<?php
session_start();
require_once("./config/dataBase.php");

$connection = Conectar::connection_DataBase();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nameUser = Conectar::validarDato($_POST["nombre"]);
    $passUser = Conectar::validarDato($_POST["password"]);

    $hashed_password = password_hash($passUser, PASSWORD_DEFAULT);

    $stmt = $connection->prepare("SELECT id, nombre, password FROM admin WHERE nombre = ?");
    $stmt->bind_param("s", $nameUser);
    $stmt->execute();
    $stmt->bind_result($id, $nameUser, $passUser);

    if ($stmt->fetch()) {

        if (password_verify($passUser, $hashed_password)) {

            $_SESSION["id"] = $id;
            $_SESSION["nombre"] = $nameUser;
            header("Location: ./views/dashboard.php");
            exit();
        } else {
            $error_message = "Contraseña incorrecta. Verifica y vuelve a intentarlo";
        }
    } else {
        $error_message = "No se ha podido encontrar este nombre de usuario";
    }

    $stmt->close();
}
$connection->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="./public/img/logo-ejercito.png">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="./public/js/tailwind.config.jsx"></script>

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./public/css/login.css"> -->
</head>

<body>
    <!-- <main class="h-screen w-full flex justify-center items-center bg-[url('./public/img/military.webp')] bg-no-repeat bg-cover bg-center"> -->
    <main class="h-screen w-full flex justify-center items-center bg-verde dark:bg-primary">
        <div class="flex flex-col justify-center items-center h-[520px] w-[350px] backdrop-blur-sm bg-white/30 p-3 gap-8 text-white shadow-2xl">
            <img src="./public/img/logo-ejercito.png" width="65px" height="65px" alt="LOGO DEL EJERCITO DE PERÚ">
            <h1 class="text-2xl">Bienvenido</h1>

            <?php if (isset($error_message)) { ?>
                <p style="color: #c21c1c; font-size: 12px;"><?php echo $error_message; ?></p>
            <?php } ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="flex flex-col w-full gap-5" method="POST" autocomplete="off">

                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-secon bg-second text-gray-400 border-second">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <input type="text" name="nombre" id="nombre" class="outline-none bg-second border-l text-gray-900 block flex-1 min-w-0 w-full text-sm  p-2.5 placeholder-gray-300 text-white focus:ring-white focus:border-white " placeholder="Usuario" required>
                </div>

                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-secon bg-second text-gray-400 border-second">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path fill="#ffffff" d="M21 2a8.998 8.998 0 0 0-8.612 11.612L2 24v6h6l10.388-10.388A9 9 0 1 0 21 2m0 16a7 7 0 0 1-2.032-.302l-1.147-.348l-.847.847l-3.181 3.181L12.414 20L11 21.414l1.379 1.379l-1.586 1.586L9.414 23L8 24.414l1.379 1.379L7.172 28H4v-3.172l9.802-9.802l.848-.847l-.348-1.147A7 7 0 1 1 21 18" />
                            <circle cx="22" cy="10" r="2" fill="#ffffff" />
                        </svg>
                    </span>
                    <input type="password" name="password" id="password" class="outline-none bg-second border-l text-gray-900 block flex-1 min-w-0 w-full text-sm  p-2.5 placeholder-gray-300 text-white focus:ring-white focus:border-white " placeholder="Password" required>
                </div>

                <button type="submit" value="Iniciar Sesión" class="w-full bg-primary dark:bg-primary dark:hover:bg-thirth h-12 cursor-pointer mt-5">
                    Iniciar Sessión
                </button>
               
    </main>
</body>

</html>