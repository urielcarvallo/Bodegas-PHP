<?php

/* Mostrar todos los vinos con su varietal (grape variety)
 y la región a la que pertenecen */ 

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

 $var_consulta= "SELECT wine_name, variety, region_name 
                from ((((WINE as W 
                INNER JOIN WINERY as WI ON W.winery_id = WI.winery_id)
                INNER JOIN REGION as RE ON WI.region_id = RE.region_id)
                INNER JOIN WINE_VARIETY as WV ON WV.wine_id = W.wine_id)
                INNER JOIN GRAPE_VARIETY as GP ON WV.variety_id = GP.variety_id)
                ORDER BY wine_name";
 $var_resultado = $obj_conexion->query($var_consulta);


 
  if($var_resultado->num_rows>0) // sobre el resultado
   {
     echo"<table border='1' align='center'>
      <tr bgcolor='#E6E6E6'>
         <th>wine_name</th>
         <th>variety</th>
         <th>region_name</th>
     </tr>";
 while ($var_fila=$var_resultado->fetch_array()) 
 {
     echo "<tr>
     <td>".$var_fila["wine_name"]."</td>";
     echo "<td>".$var_fila["variety"]."</td>";
     echo "<td>".$var_fila["region_name"]."</td></tr>";
  }
 }else
 {
   echo "No hay Registros";
 }


 mysqli_close($obj_conexion);
?>