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

    $var_consulta= "select * from users";
    $var_resultado = $obj_conexion->query($var_consulta);

    if($var_resultado->num_rows>0) // sobre el resultado
      { 
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>cust_id</th>
            <th>user</th>
            <th>Password</th>
        </tr>";
        /* <th>description</th> es la primer columna */
    while ($var_fila=$var_resultado->fetch_array()) 
    {
        echo "<tr>";
        echo "<td>".$var_fila["cust_id"]."</td>";
        echo "<td>".$var_fila["user_name"]."</td>
            <td>".$var_fila["password"]."</td>
        </tr>";
     }
    }
    else
      {
        echo "No hay Registros";
      }
    mysqli_close($obj_conexion);
?>