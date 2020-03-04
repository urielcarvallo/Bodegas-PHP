<?php

    $cons_usuario = "root";
    $cons_contra="";
    $cons_base_datos="carvallo"; //nombre
    $cons_equipo="localhost:3308";

    $obj_conexion = mysqli_connect( $cons_equipo, $cons_usuario, $cons_contra, $cons_base_datos ); // abre canal de comunicacion

    if ( !$obj_conexion ){
        print "<h3> No se ha podido conectar PHP - MySQL </h3>";
    }else{
        print "<h3> Conexion exitosa PHP - MySQL </h3>";
    }

    foreach ($_REQUEST['wine'] as $value) { // Recibo el id del wine
        if ( !empty($value) ){ // pregunto por el array vacio
            $arrayIdWine[] = $value ; // lleno el vector con los ids
        }
    }
    foreach ($_REQUEST['cantidad'] as $value) { // Recibo el id del wine
        if ( !empty($value) ){ // pregunto por el array vacio
            $arrayCantidad[] = $value ; // lleno el vector con los ids
        }
    }
    
    $var_consulta= "SELECT cost, wine_id, on_hand from inventory";

    $var_resultado = $obj_conexion->query($var_consulta);

    global $total;

    if($var_resultado->num_rows>0) // sobre el resultado
      {
        while ($var_fila=$var_resultado->fetch_array()) 
        {
            for($i=0 ; $i<count($arrayCantidad) ; $i++){
                if ($var_fila["wine_id"]==$arrayIdWine[$i]){
                    print $arrayIdWine[$i];
                    print "<br>";
                    print $var_fila["cost"];
                    $obtenerMultiplicacion = $var_fila['cost']*$arrayCantidad[$i];
                    $total += $obtenerMultiplicacion;

                    $resultadoResta = $var_fila['on_hand'] - $arrayCantidad[$i];
                    echo "<br>".$resultadoResta."<br>";

                    $var_consulta2= "UPDATE inventory 
                                    SET on_hand = $resultadoResta.
                                    WHERE wine_id=".$var_fila['wine_id'];
                    $var_resultado2 = $obj_conexion->query($var_consulta);
                }
            } 
        }
    }

    print "<br>El total es: ".$total."<Br>";
    


    mysqli_close($obj_conexion);
?>