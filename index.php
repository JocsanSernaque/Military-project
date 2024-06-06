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
    <!-- <link rel="stylesheet" href="./public/css/login.css"> -->
</head>

<body>
    <main class="h-screen w-full flex justify-center items-center bg-[url('./public/img/military.webp')] bg-no-repeat bg-cover bg-center">
        <div class="flex flex-col justify-center items-center h-[480px] w-[350px] backdrop-blur-sm bg-white/30 p-3 gap-5">
            <img src="./public/img/logo-ejercito.png" width="65px" height="65px" alt="LOGO DEL EJERCITO DE PERÚ">
            <h1>Iniciar Sesión</h1>

            <?php if (isset($error_message)) { ?>
                <p style="color: #c21c1c; font-size: 12px;"><?php echo $error_message; ?></p>
            <?php } ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="flex flex-col w-full gap-5" method="POST" autocomplete="off">
                <input type="text" name="nombre" placeholder="Usuario" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <input type="password" name="password" placeholder="Contraseña" required="" >

                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </main>
</body>
</html>