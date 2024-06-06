<?php
class Conectar
{
    public static function connection_DataBase(){
        $server = "localhost";
        $user = "root";
        $password = "";
        $dataBase = "bd_aptitud_fisica";
    
        $connection = mysqli_connect($server, $user, $password, $dataBase);
    
        if(!$connection){
            die("Falló la Conexión...: ".mysqli_connect_error());
        }
        $connection-> set_charset('utf8');
        return $connection;
    }
   
    public static function validarDato($dato)
    {
        $dato = trim($dato); 
        $dato = stripslashes($dato); 
        $dato = htmlspecialchars($dato); 
        return $dato;
    }
}
?>
