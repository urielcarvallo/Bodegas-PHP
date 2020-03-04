<?php
  //$mysqli = new mysqli('localhost', '', 'root', 'test');
  $cons_usuario="root";
  $cons_contra="";
  $cons_base_datos="carvallo"; //nombre de cada uno
  $cons_equipo="localhost:3308"; 

  $obj_conexion = 
  mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
  if(!$obj_conexion){ //$obj_conexion->connect_errno
      echo $obj_conexion->connect_errno;
      echo "<br>";
      echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
  }else{
      echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Demo de menú desplegable</title>
  <meta charset=utf-8" />
</head>
<body>
  <div align="center">                        
    <p>Seleccione una Region del siguiente menú:</p>
    <p>Regiones:
      <select>
        <option value="0">Seleccione:</option>
        <?php
        $sql="SELECT * FROM region";
          $query = mysqli_query($obj_conexion,$sql);
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[region_id].'">'.$valores[region_name].'</option>';
          }
          
        ?>
      </select>
      <button>Enviar</button>
    </p>
  </div>
</body>

</html>