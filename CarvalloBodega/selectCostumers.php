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
    
    $var_consulta= "SELECT * from CUSTOMER";
    $var_resultado = $obj_conexion->query($var_consulta);


     if($var_resultado->num_rows>0) // sobre el resultado
      {
        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>cust_id</th>
            <th>surname</th>
            <th>firstname</th>
            <th>initial</th>
            <th>title_id</th>
            <th>address</th>
            <th>city</th>
            <th>state</th>
            <th>zipcode</th>
            <th>country_id</th>
            <th>phone</th>
            <th>birth_date</th>
        </tr>";
    while ($var_fila=$var_resultado->fetch_array()) 
    {
        echo "<tr>
        <td>".$var_fila["cust_id"]."</td>";
        echo "<td>".$var_fila["surname"]."</td>";
        echo "<td>".$var_fila["firstname"]."</td>";
        echo "<td>".$var_fila["initial"]."</td>";
        echo "<td>".$var_fila["title_id"]."</td>";
        echo "<td>".$var_fila["address"]."</td>";
        echo "<td>".$var_fila["city"]."</td>";
        echo "<td>".$var_fila["state"]."</td>";
        echo "<td>".$var_fila["zipcode"]."</td>";
        echo "<td>".$var_fila["country_id"]."</td>";
        echo "<td>".$var_fila["phone"]."</td>";
        echo "<td>".$var_fila["birth_date"]."</td></tr>";
     }
    }else
    {
      echo "No hay Registros";
    }

    mysqli_close($obj_conexion);
?>