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

  <form name="form3" method="post" action="RegistroCliente.php">

  <ul>
 	  <li>
 	  Nombre  <input type="text" name="nombre" >
 	  </ul>
 </li>

 <ul>
 	  <li>
 	Email <input type="text" name="email">
 	  </ul>
 </li>

  <ul>
  	  <li>
  	Password <input type="text" name="password">
  	  </ul>
  </li>


 <input type= "submit" name="datos" value="Enviar" /><br /><br />
 </form>

</body>
</html>
<?php


if ($_POST['datos'])
{
  # code...


$nombre = $_POST ['nombre'];
$email= $_POST ['email'];
$password= $_POST ['password'];

$query1 = "INSERT INTO cliente (nombre,email,password) VALUES ('$nombre','$email','$password')";


mysqli_query($dbc,$query1)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));

mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>
