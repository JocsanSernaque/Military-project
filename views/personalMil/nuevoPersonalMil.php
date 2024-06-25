<?php 
require_once "../config/dataBase.php";
$connection = Conectar::connection_DataBase();
$queryGrado = "SELECT id_grado, acronimo_grado FROM grado";
$queryArma = "SELECT id_arma, acronimo_arma FROM arma";
$resultGrado = $connection->query($queryGrado);
$resultArma = $connection->query($queryArma);

?>
<h2 class="font-bold text-lg text-textGray">Registro de nuevo Personal Militar</h2>
<form action="dashboard.php?a=guarda" method="post" class="flex flex-col border border-primary w-[450px] gap-2 p-5 mb-4 text-textGray" enctype="multipart/form-data">
    <div class="flex flex-col">
        <label for="nombre" class="font-bold">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="John DONE" class="bg-green-200 text-gray-800 p-2" required>
    </div>

    <div class="flex flex-col">
        <label for="apellidos" class="font-bold">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" placeholder="John DONE" class="bg-green-200 text-gray-800 p-2" required>
    </div>

    <div class="flex flex-col">
        <label for="dni" class="font-bold">DNI</label>
        <input type="text" inputmode="numeric" name="dni" id="dni" max="8" placeholder="00000000" class="bg-green-200 p-2" required>
    </div>

    <div class="flex flex-col">
        <label for="email" class="font-bold">Email</label>
        <input type="email" name="email" id="imail"  placeholder="johndone@example.com" minlength="3" maxlength="64" class="bg-green-200 text-gray-800 p-2" required>
    </div>

    <div class="flex flex-row justify-between gap-4">
        <div class="flex flex-col">
            <label for="sexo" class="font-bold pb-2">Sexo</label>
            <div class="flex flex-row gap-3">
                <div class=""">                
                        <label for=" sexo">Masculino</label>
                    <input type="radio" id="M" name="sexo" value="M" checked />
                </div>
                <div class="">
                    <label for="dni">Femenino</label>
                    <input type="radio" id="F" name="sexo" value="F" />
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <label for="talla" class="font-bold">Talla</label>
            <input type="text" inputmode="numeric" name="talla" id="talla" placeholder="1.5" class="bg-green-200 p-2" required>
        </div>
    </div>

    <div class="flex flex-col">
        <label for="fecha_nac" class="font-bold">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nac" id="fecha_nac" placeholder="" class="bg-green-200 text-gray-800 p-2" required>
    </div>

    <div class="flex flex-row justify-between gap-4">
        <div class="flex flex-col">
            <label for="grado" class="font-bold pb-2">Grado</label>
            <select name="" id="" required>Seleccione
                <option disabled selected>Seleccione...</option>
                <?php
                while($rowGrado = $resultGrado->fetch_assoc()){
                    echo '<option value='.$rowGrado["id_grado"].'>'.$rowGrado["acronimo_grado"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="arma" class="font-bold pb-2">Arma</label>
            <select name="" id="" required>Seleccione
                <option disabled selected>Seleccione...</option>
                <?php
                while($rowArma = $resultArma->fetch_assoc()){
                    echo '<option value='.$rowArma["id_arma"].'>'.$rowArma["acronimo_arma"].'</option>';
                }

                ?>
            </select>
        </div>
        </div>
        
        <div class="flex justify-center items-center h-12 bg-second text-white rounded mt-5 cursor-pointer">
            <input type="submit" value="Registrar :)">
        </div>

</form>