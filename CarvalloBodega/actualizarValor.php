<?php
    $aumento = 1+($_REQUEST['valor']/100);

    if ( empty($aumento)){
        print "Ingrese el valor correspondiente";
    }else{
        print $aumento."<br>";
    }

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

    $query_select = "SELECT cost FROM INVENTORY";
    $selectCost = mysqli_query($obj_conexion, $query_select);
    for ($i=0; $arrayCost[$i] =mysqli_fetch_assoc($selectCost) ; $i++);

    $idAux=1;
    foreach ($arrayCost as $key) {
        foreach ((array)$key as $value) {
            $value = $aumento*$value;
            print "<br>$value<br>";
            $update = "UPDATE INVENTORY SET cost=$value where wine_id=$idAux";
            mysqli_query($obj_conexion, $update);
            $idAux++; 
        }
    }
    mysqli_close($obj_conexion);
?>