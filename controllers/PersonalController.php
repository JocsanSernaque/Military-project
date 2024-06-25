<?php
// require_once "models/Personal.php";
class PersonalController
{
    private $personalModel;

    public function __construct($personalModel)
    {
        $this->personalModel = $personalModel;
        
    }

    public function Listar(){
        $personal = $this->personalModel->getAllPersonal();
        require_once "views/personalMil/personalMil.php";
    }

    public function guarda()
    {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $email = $_POST["email"];
        $sexo = $_POST["sexo"];
        $talla = $_POST["talla"];
        $fecha_nac = $_POST["fecha_nac"];
        $id_grado = $_POST["id_grado"];
        $id_arma = $_POST["id_arma"];

        $personal = new Personal();
        $personal->insertar($nombre, $apellidos, $dni, $email, $sexo, $talla, $fecha_nac, $id_grado, $id_arma);

        // $this->Listar();
    }

}


?>