<?php
    $nombre = $_REQUEST['name'];
    $tipo = $_REQUEST['wine_type'];
    $anio = $_REQUEST['year'];
    $viniedo = $_REQUEST['winery_id'];
    $description = $_REQUEST['description'];
    
    if ( empty($nombre) || empty($tipo) ||empty($anio) ||empty($viniedo) ||empty($description) ){
        print "Ingrese los valores correspondientes";
    }else{
        print "$nombre, $tipo, $anio, $viniedo, $description";
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
    $var_consulta= "SELECT MAX(wine_id) from wine";
    $var_resultado = $obj_conexion->query($var_consulta);

    foreach ($var_resultado as  $value) {
      foreach ($value as $xd){
        $lastId = $xd;
      }
    }

    print $lastId;
    $lastId++;

     try{
        $insert = "INSERT INTO wine VALUES ('$lastId','$nombre', '$tipo', '$anio', '$viniedo', '$description')";
        mysqli_query($obj_conexion, $insert);
        print "Alta correcta";
    }catch(Exception $e){
            print "Error ".$e;
    } 
    mysqli_close($obj_conexion);
?>