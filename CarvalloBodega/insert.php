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

    //$file = fopen('insertWines.txt','r');
    //$file = fopen('insertWinery.txt','r');
    $file = fopen('winestore.data','r');
    set_time_limit(3600);
    while(!feof($file)){ // INSERTO LAS 10000 CONSULTAS
        $insert = fgets($file);
        if (mysqli_query($obj_conexion, $insert)){
            print "Filas ingresadas correctamente";
        }else{
            print "No se pudo ingresar este dato";
        }
        mysqli_query($obj_conexion, $insert);
    } 

    mysqli_close($obj_conexion);
?>