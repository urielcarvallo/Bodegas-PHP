<?php
    $cons_usuario = "root";
    $cons_contra="";
    $cons_base_datos="carvallo"; //nombre
    $cons_equipo="localhost:3308";
    
    $obj_conexion = mysqli_connect( $cons_equipo, $cons_usuario, $cons_contra, $cons_base_datos ); // abre canal de comunicacion
    
    echo "<form action='viniedos.html'>";
    echo     "<input type='submit' value='Volver'>";
    echo "</form>";

    if ( !$obj_conexion ){
        print "<h3> No se ha podido conectar PHP - MySQL </h3>";
    }else{
        print "<h3> Conexion exitosa PHP - MySQL </h3>";
    }

    $file = fopen('insertWines.txt','r');
    
    $var_consulta= "SELECT * from wine";
    $var_resultado = $obj_conexion->query($var_consulta);

 
    
     if($var_resultado->num_rows>0) // sobre el resultado
      {
        echo"<table border='1' align='center'>
         <tr bgcolor='red'>
            <th width='120px'>description</th>
            <th>winery_id</th>
            <th>wine_id</th>
            <th>wine_name</th>
            <th>wine_type</th>
            <th>year</th>
        </tr>";
    while ($var_fila=$var_resultado->fetch_array()) 
    {
        echo "<tr>
        <td width='200px'>".$var_fila["description"]."</td>";
        echo "<td>".$var_fila["winery_id"]."</td>";
        echo "<td>".$var_fila["wine_id"]."</td>";
        echo "<td>".$var_fila["wine_name"]."</td>";
        echo "<td>".$var_fila["wine_type"]."</td>";
        echo "<td>".$var_fila["year"]."</td></tr>";
     }
    }else
    {
      echo "No hay Registros";
    }

    mysqli_close($obj_conexion);
?>