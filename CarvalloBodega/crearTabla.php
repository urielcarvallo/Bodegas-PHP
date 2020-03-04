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

    // Crear tabla

  /*   $sql="CREATE TABLE wine (
        wine_id int(5) NOT NULL,
        wine_name varchar(50) NOT NULL,
        wine_type int(2) NOT NULL,
        year int(4) NOT NULL,
        winery_id int(4) NOT NULL,
        description blob,
        PRIMARY KEY (wine_id),
        KEY name (wine_name),
        KEY winery (winery_id)
      ) ";  
       $sql="CREATE TABLE winery (
        winery_id int(4) NOT NULL,
        winery_name varchar(100) NOT NULL,
        region_id int(4) NOT NULL,
        PRIMARY KEY (winery_id),
        KEY name (winery_name),
        KEY region (region_id)
      ) " ; 
      
    
    $sql="CREATE TABLE users (
    cust_id int(5) NOT NULL,
    user_name varchar(50) NOT NULL,
    password varchar(32) NOT NULL,
    PRIMARY KEY (user_name),
    KEY password (password),
    KEY cust_id (cust_id)
  ) ";*/

/*$sql="CREATE TABLE customer (
  cust_id int(5) NOT NULL,
  surname varchar(50),
  firstname varchar(50),
  initial char(1),
  title_id int(3),
  address varchar(50),
  city varchar(50),
  state varchar(20),
  zipcode varchar(10),
  country_id int(4),
  phone varchar(15),
  birth_date char(10),
  PRIMARY KEY (cust_id)
)" ;

$sql="CREATE TABLE grape_variety (
  variety_id int(3) NOT NULL,
  variety varchar(50) DEFAULT '' NOT NULL,
  PRIMARY KEY (variety_id),
  KEY var (variety)
) ";

  CREATE TABLE inventory (
  wine_id int(5) NOT NULL,
  inventory_id int(3) NOT NULL,
  on_hand int(5) NOT NULL,
  cost decimal(5,2) NOT NULL,
  date_added date,
  PRIMARY KEY (wine_id,inventory_id)
) ;

CREATE TABLE items (
  cust_id int(5) NOT NULL,
  order_id int(5) NOT NULL,
  item_id int(3) NOT NULL,
  wine_id int(4) NOT NULL,
  qty int(3),
  price decimal(5,2),
  PRIMARY KEY (cust_id,order_id,item_id)
) ;

CREATE TABLE orders (
  cust_id int(5) NOT NULL,
  order_id int(5) NOT NULL,
  date timestamp,
  instructions varchar(128),
  creditcard char(16),
  expirydate char(5),
  PRIMARY KEY (cust_id,order_id)
)  ;

CREATE TABLE region (
  region_id int(4) NOT NULL,
  region_name varchar(100) NOT NULL,
  PRIMARY KEY (region_id),
  KEY region (region_name)
)  ;

CREATE TABLE wine_type(
  wine_type_id int(2) NOT NULL,
  wine_type varchar(32) NOT NULL,
  PRIMARY KEY (wine_type_id)
) ;

CREATE TABLE wine_variety (
  wine_id int(5) DEFAULT '0' NOT NULL,
  variety_id int(3) DEFAULT '0' NOT NULL,
  id int(1) DEFAULT '0' NOT NULL,
  PRIMARY KEY (wine_id,variety_id),
  KEY wine (wine_id,variety_id)
)  ;


CREATE TABLE titles (
  title_id int(2) NOT NULL,
  title char(10),
  PRIMARY KEY (title_id)
) ;

CREATE TABLE countries (
  country_id int(4) NOT NULL,
  country char(30) NOT NULL,
  PRIMARY KEY (country_id),
  KEY (country)
) ;*/
  $file = fopen('create.txt','r');
  while(!feof($file)){ // INSERTO LAS 1000 CONSULTAS
    $insert = fgets($file);
    if (mysqli_query($obj_conexion, $insert)) {
      echo "Table MyGuests created successfully";
    }else {
      echo "Error creating table: " . mysqli_error($obj_conexion);
    }
    mysqli_query($obj_conexion, $insert);
  } 

    if (mysqli_query($obj_conexion, $sql)) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($obj_conexion);
    }
    
    mysqli_close($obj_conexion);
?>