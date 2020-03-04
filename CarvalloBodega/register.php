<?php
    $user = $_REQUEST['user'];
    $password = $_REQUEST['passwd'];
    $token = md5($password);

    
    echo "<form action='principal.html'>";
    echo     "<input type='submit' value='Volver'>";
    echo "</form>";
    
    if ( empty($user) || empty($password) ){
        print "Error! Ingrese los valores correspondientes";
    }
    else{
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

        $var_consulta= "select * from users";
        $var_resultado = $obj_conexion->query($var_consulta);

        if($var_resultado->num_rows>0){ 
            while ($var_fila=$var_resultado->fetch_array()) {
                if( $user==$var_fila["user_name"]){
                    print "El usuario ya existe";
                    break;
                }
            }
        }
            
        $cust_id = rand(1,650); //customer random del 1 al 650
        $insert= "INSERT INTO USERS VALUES ($cust_id,'$user','$token');";

            if ( mysqli_query($obj_conexion, $insert) ){
                print "Usuario ingresado correctamente";
                mysqli_query($obj_conexion, $insert);
            }else{
                print "No se pudo ingresar este dato";
            }
/*         print "<form action="'principal.html'">";
        print     "<input type='submit' value='Volver'>";
        print    "</form>"; */
        
        mysqli_close($obj_conexion);
    }
?>