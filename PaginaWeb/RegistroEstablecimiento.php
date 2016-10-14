<?php
error_reporting(0);
define('DBNAME', "a6251434_Comida");
$dbc = mysqli_connect("mysql6.000webhost.com","a6251434_soto","Ing012345",DBNAME);
if(!$dbc){
	die("Database connection failed :" .mysqli_error($dbc));
	exit();
}
$dbs =mysqli_select_db($dbc,DBNAME);
if (!$dbs) {
	die("Database selection failed : ". mysqli_error($dbc));
	exit();
}
?>

<html>
<head>
<title>
Ingenieria de sistemas y computacion 2016 beta  C.soto
</title>
</head>

<body>

  <form name="form3" method="post">

  <ul>
 	  <li>
 	  Nombre establecimiento <input type="text" name="nombre">
 	  </ul>
 </li>

 <ul>
 	  <li>
 	Descripcion <input type="text" name="descripcion">
 	  </ul>
 </li>

  <ul>
  	  <li>
  	Direccion <input type="text" name="direccion">
  	  </ul>
  </li>

   <ul>
   	  <li>
   	Tiempo Entrega <input type="text" name="tiempoEntrega">
   	  </ul>
   </li>

   <ul>
       <li>
     Pedido Minimo <input type="text" name="pedidoMinimo">
       </ul>
   </li>
 <input type= "submit" name="datos" value="Enviar" /><br /><br />
 </form>

</body>
</html>
<<?php

if ($_POST['datos'])
{
$NombreEspacio = $_POST ['NombreEspacio'];
$idEspacioAcademico= $_POST ['idEspacioAcademico'];
$Disponible= $_POST ['Disponible'];
$fecha= $_POST ['fecha'];

$query1 = "INSERT INTO Espacioacademico (NombreEspacio,idEspacioAcademico,Disponible,fecha) VALUES ('$NombreEspacio','$idEspacioAcademico','$Disponible',$fecha)";


mysqli_query($dbc,$query1)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));

mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>
