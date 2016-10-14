<?php
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
Ingenieria de sistemas y computacion 2016 beta  C.sotodd
</title>
</head>

<body>
<ul>
  <form name="form3" method="post" action="Administrador.php">

  <ul>
 	  <li>
 	  Nombre  <input type="text" name="nombre" >
 	  </ul>
 </li>

 <ul>
 	  <li>
 	Telefono <input type="text" name="telefono">
 	  </ul>
 </li>

  <ul>
  	  <li>
  	Direccion <input type="text" name="direccion">
  	  </ul>
  </li>

	<ul>
  	  <li>
  	Cedula <input type="text" name="cedula">
  	  </ul>
  </li>
	<ul>
			<li>
	Password <input type="text" name="password">
			</ul>
	</li>

</ul>
 <input type= "submit" name="datos" value="Enviar" /><br /><br />
 </form>

</body>
</html>
<?php


if ($_POST['datos'])
{
  # code...


$nombre = $_POST ['nombre'];
$telefono= $_POST ['telefono'];
$direccion= $_POST ['direccion'];
$cedula=$_POST['cedula'];
$password=$_POST['password'];
$query1 = "INSERT INTO Administrador (nombre,telefono,direccion,cedula,password) VALUES ('$nombre','$telefono','$direccion','$cedula','$password')";


mysqli_query($dbc,$query1)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));

mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>
