<?php

class Personal{

    private $dataBase;
    private $personal;
    
    public function __construct()
    {
        try
        {
            $this->dataBase = Conectar::connection_DataBase();     
            $this->personal = array();   
        }
        catch(Exception $error)
        {
            die($error->getMessage());
        }
    }
    
    public function getAllPersonal()
    {
        $query = "SELECT @contador := @contador + 1 AS item, g.acronimo_grado,a.acronimo_arma, p.nombre, p.apellidos FROM (SELECT @contador := 0) AS inicializador, personalmil p, grado g, arma a where p.id_grado = g.id_grado and p.id_arma = a.id_arma ORDER BY p.id ASC;";

        $result = $this->dataBase->query($query);

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
                $this->personal[] = $row;
            }
            return $this->personal;
        }
        else{
            echo "<p class='flex text-red-400'>No se han encontrado registros</p>";
        }
    }
  
    public function insertar($nombre, $apellidos, $dni, $correo, $sexo, $talla, $fecha_nac, $id_grado, $id_arma)
    {
        $result = $this->dataBase->query("INSERT INTO personalmil (nombre, apellidos, dni, correo, sexo, talla, fecha_nac, id_grado, id_arma) VALUES ('$nombre', '$apellidos','$dni','$correo','$sexo','$talla','$fecha_nac','$id_grado', '$id_arma')");
    }

}
?>