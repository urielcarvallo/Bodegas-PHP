<?php
    $title = $_REQUEST['title'];

    if ( empty($title) ){
        print "Ingrese los valores correspondientes";
    }else{
        print "$title";
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
    // 1048 el ultimo vino ingresado


    try{
        $delete = "DELETE FROM TITLES WHERE title='$title'";
        mysqli_query($obj_conexion, $delete);
        print "Deleteado";
    }catch(Exception $e){
            print "Error ".$e;
    }
    mysqli_close($obj_conexion);
?>