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
    $var_consulta= "SELECT * from INVENTORY";
    $var_resultado = $obj_conexion->query($var_consulta);
    
     if($var_resultado->num_rows>0) // sobre el resultado
      {
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>wine_id</th>
            <th>inventory_id</th>
            <th>on_hand</th>
            <th>cost</th>
            <th>date_added</th>
        </tr>";
    while ($var_fila=$var_resultado->fetch_array()) 
    {
        echo "<tr>
        <td>".$var_fila["wine_id"]."</td>";
        echo "<td>".$var_fila["inventory_id"]."</td>";
        echo "<td>".$var_fila["on_hand"]."</td>";
        echo "<td>".$var_fila["cost"]."</td>";
        echo "<td>".$var_fila["date_added"]."</td></tr>";
     }
    }else
    {
      echo "No hay Registros";
    }

    mysqli_close($obj_conexion);
?>