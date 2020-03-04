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

      /*$sql="CREATE TABLE winery (
        winery_id int(4) NOT NULL,
        winery_name varchar(100) NOT NULL,
        region_id int(4) NOT NULL,
        PRIMARY KEY (winery_id),
        KEY name (winery_name),
        KEY region (region_id)
      ) " ; */

    $file = fopen('insertWines.txt','r');
    
    $var_consulta= "select * from winery where region_id=8";
    $var_resultado = $obj_conexion->query($var_consulta);

    if($var_resultado->num_rows>0) // sobre el resultado
      { 
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>winery_id</th>
            <th>winery_name</th>
            <th>region_id</th>
        </tr>";
        /* <th>description</th> es la primer columna */
    while ($var_fila=$var_resultado->fetch_array()) 
    {
        echo "<tr>";
        echo "<td>".$var_fila["winery_id"]."</td>";
        echo "<td>".$var_fila["winery_name"]."</td>";
        echo "<td>".$var_fila["region_id"]."</td></tr>";
     }
    }
    else
      {
        echo "No hay Registros";
      }

    mysqli_close($obj_conexion);
?>