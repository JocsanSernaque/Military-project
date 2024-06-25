<div class="">
        <h2 class='font-bold text-lg text-textGray'>Personal Militar</h2>
        <div class="flex justify-between items-center pb-2">            
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 pb-2 ps-10 text-sm text-gray-800 border border-gray-300 rounded-lg w-80 bg-green-200 focus:outline-none focus:ring focus:ring-green-300  " placeholder="Ingrese DNI">
            </div>
            <div class="pr-4">
                <a href="dashboard.php?page=nuevoPersonal" class="flex justify-center items-center w-[40px] h-[40px] rounded-full bg-second gap-2">                   
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 2048 2048"><path fill="#ffffff" d="M1536 1536h-13q-23-112-81-206t-141-162t-187-106t-218-38q-88 0-170 23t-153 64t-129 100t-100 130t-65 153t-23 170H128q0-120 35-231t101-205t156-167t204-115q-113-74-176-186t-64-248q0-106 40-199t109-163T696 40T896 0t199 40t163 109t110 163t40 200q0 66-16 129t-48 119t-75 103t-101 83q112 43 206 118t162 176zM512 512q0 80 30 149t82 122t122 83t150 30q79 0 149-30t122-82t83-122t30-150q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149m1280 1152h256v128h-256v256h-128v-256h-256v-128h256v-256h128z"/></svg>
                </a>

            </div>
        </div>
        <table class='w-full text-sm text-left rtl:text-right border-2 rounded'>
            <thead class="text-xs text-gray-900 uppercase bg-green-300 dark:bg-green-300 dark:text-gray-900 p-5">
                <tr>
                    <!-- <th scope="col" class="px-2 py-3">Id</th> -->
                    <th scope="col" class="px-2 py-3">N°</th>
                    <th scope="col" class="px-2 py-3">Grado</th>
                    <th scope="col" class="px-2 py-3">Arma</th>
                    <th scope="col" class="px-2 py-3">Nombres</th>
                    <th scope="col" class="px-2 py-3">Apellidos</th>
                    <!-- <th scope="col" class="px-2 py-3">Sexo</th>
                    <th scope="col" class="px-2 py-3">Talla</th>
                    <th scope="col" class="px-2 py-3">F/Nac</th>
                    <th scope="col" class="px-2 py-3">Grado</th>
                    <th scope="col" class="px-2 py-3">Arma/Esp</th> -->
                    <th scope="col" class="px-2 py-3">Acciones</th>
                </tr>
            </thead>

            <?php            
            require_once("../config/dataBase.php");
            require_once("../controllers/PersonalController.php");
            require_once("../models/Personal.php");  

            $personal = new Personal();
            
            ?>

            <tbody>
                <?php
                foreach ($data["personal"] = $personal->getAllPersonal() as $dato ):

                    echo "<tr class='border-b border-gray-400 hover:bg-green-200'>";
                    echo "<th scope='row' class='px-2 py-2'>" . $dato["item"]. "</th>";                   
                    echo "<td class='px-1 py-1'>" . $dato["acronimo_grado"]. "</td>";
                    echo "<td class='px-1 py-1'>" . $dato["acronimo_arma"] . "</td>";
                    echo "<td class='px-1 py-1'>" . $dato["nombre"] . "</td>";
                    echo "<td class='px-1 py-1'>" . $dato["apellidos"] . "</td>";
                    // echo "<td class='px-1 py-1'>" . $row["sexo"] . "</td>";
                    // echo "<td class='px-1 py-1'>" . $row["talla"] . "</td>";
                    // echo "<td class='px-1 py-1'>" . $row["fecha_nac"] . "</td>";
                    // echo "<td class='px-1 py-1'>" . $row["grado"] . "</td>";
                    // echo "<td class='px-1 py-1'>" . $row["arma_esp"] . "</td>";
                    echo "<td class='px-1 py-1'><div class='flex justify-evenly'><a href=#><img src='../public/icons/edit.svg'/></a><a href=# ><img src='../public/icons/delete.svg'/></a></div></td>";
              
                endforeach; ?>
            </tbody>
        </table>
</div>
