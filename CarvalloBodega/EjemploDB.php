<?php
    $cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="carvallo"; //nombre de cada uno
    $cons_equipo="localhost:3308";

    $obj_conexion = 
    mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }

    /* ejemplo de una consulta */

    $var_consulta= "select * from wine";
    $var_resultado = $obj_conexion->query($var_consulta);

    if($var_resultado->num_rows>0)
      {
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>description</th>
            <th>winery_id</th>
            <th>wine_id</th>
            <th>wine_name</th>
            <th>wine_type</th>
            <th>year</th>
        </tr>";

    while ($var_fila=$var_resultado->fetch_array())
    {
        echo "<tr>
        <td>".$var_fila["description"]."</td>";
        echo "<td>".$var_fila["winery_id"]."</td>";
        echo "<td>".$var_fila["wine_id"]."</td>";
        echo "<td>".$var_fila["wine_name"]."</td>";
        echo "<td>".$var_fila["wine_type"]."</td>";
        echo "<td>".$var_fila["year"]."</td></tr>";
     }
    }
    else
      {
        echo "No hay Registros";
      }
      mysqli_close($obj_conexion);
    ?>