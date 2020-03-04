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

    $wine_type = $_REQUEST['wine_type'];
    print $wine_type;
    
    if ($wine_type=="All"){
        $var_consulta= "SELECT wine.wine_id, wine_type.wine_type, wine_name, max(cost), on_hand 
        from (wine 
        inner join wine_type 
            on wine.wine_type=wine_type.wine_type_id)
        inner join inventory 
            on wine.wine_id=inventory.wine_id
        WHERE on_hand>0 
        GROUP BY wine_type.wine_type, wine_name 
        ORDER BY wine_type.wine_type, wine_name;";
    }else{
        $var_consulta= "SELECT wine.wine_id, wine_type.wine_type, wine_name, max(cost), on_hand
                    from (wine 
                    inner join wine_type 
                        on wine.wine_type=wine_type.wine_type_id)
                    inner join inventory 
                        on wine.wine_id=inventory.wine_id 
                    WHERE wine_type.wine_type='$wine_type' and on_hand>0 
                    GROUP BY wine_type.wine_type, wine_name 
                    ORDER BY wine_type.wine_type, wine_name;";
    }

    $var_resultado = $obj_conexion->query($var_consulta);

    if($var_resultado->num_rows>0){ // sobre el resultado
        echo "<form action='comprar.php' method='POST'>";
            echo"<table border='1' align='center'>
            <tr bgcolor='#E6E6E6'>
                <th>Seleccionar</th>
                <th>wine_type</th>
                <th>wine_name</th>
                <th>max(cost)</th>
                <th>Cantidad</th>
                <th> Disponibles</th>
            </tr>";
            while ($var_fila=$var_resultado->fetch_array()) {
                echo "<tr>";
                echo "<td> <input type='checkbox' name='wine[]' value='".$var_fila['wine_id']."' > </td>";
                echo "<td>".$var_fila["wine_type"]."</td>";
                echo "<td>".$var_fila["wine_name"]."</td>";
                echo "<td>".$var_fila["max(cost)"]."</td>";
                echo "<td> <input type='text' name='cantidad[]'>  </td>";
                echo "<td>".$var_fila['on_hand']."</td>";
                echo "</tr>";
            }
            print "<p> Seleccione y presione Comprar para realizar la compra</p>";
            echo "<input type='submit' value='Comprar'>";
        echo "</form>";
    }
    else{
        echo "No hay Registros";
    }

    mysqli_close($obj_conexion);
?>