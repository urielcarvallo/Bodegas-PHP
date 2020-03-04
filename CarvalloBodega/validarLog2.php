<?php
    $user = $_REQUEST['user'];
    $passwd = $_REQUEST['passwd'];
    $token = md5($passwd);
    
    if ( empty($user) || empty($password) ){
        print "Error! Ingrese los valores correspondientes";
    }

    $cons_usuario = "root";
    $cons_contra="";
    $cons_base_datos="carvallo"; //nombre
    $cons_equipo="localhost:3308";
    $obj_conexion = mysqli_connect( $cons_equipo, $cons_usuario, $cons_contra, $cons_base_datos ); // abre canal de comunicacion

    $var_consulta= "select * from users";
    $var_resultado = $obj_conexion->query($var_consulta);

     if($var_resultado->num_rows>0){ 
        while ($var_fila=$var_resultado->fetch_array()) {
            if( $user==$var_fila["user_name"] && $token==$var_fila["password"]){
                header("Location: viniedos.html");
            }
        }
    } 
?>