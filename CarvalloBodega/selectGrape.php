<?php
    $cons_usuario = "root";
    $cons_contra="";
    $cons_base_datos="carvallo"; //nombre
    $cons_equipo="localhost:3308";
    //$cons_equipo="localhost:3306";
    
    $obj_conexion = mysqli_connect( $cons_equipo, $cons_usuario, $cons_contra, $cons_base_datos ); // abre canal de comunicacion

    if ( !$obj_conexion ){
        print "<h3> No se ha podido conectar PHP - MySQL </h3>";
    }else{
        print "<h3> Conexion exitosa PHP - MySQL </h3>";
    }

    $file = fopen('insertWines.txt','r');
    
    $var_consulta= "select * from grape_variety order by variety_id ";
    $var_resultado = $obj_conexion->query($var_consulta);

    if($var_resultado->num_rows>0) // sobre el resultado
      {
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>variety_id</th>
            <th>variety</th>
        </tr>";
        /* <th>description</th> es la primer columna */
    while ($var_fila=$var_resultado->fetch_array()) 
    {
        echo "<tr>";
        //<td>".$var_fila["description"]."</td>";
        echo "<td>".$var_fila["variety_id"]."</td>";
        echo "<td>".$var_fila["variety"]."</td>";
        echo "</tr>";
     }
    }
    else
      {
        echo "No hay Registros";
      }

    mysqli_close($obj_conexion);
?>