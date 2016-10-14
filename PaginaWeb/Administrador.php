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
$query="SELECT nombre,cedula FROM Administrador";
$res=mysqli_query($dbc,$query)or die ("error al procesar la consulta");
$cliente=htmlentities($_REQUEST['nombre']);
?>

<html>
<head>
<title>
Administrador
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


 <form name="form1" method="post" action="Administrador.php">

 	<ul>
  	  <li>
  selecciona Nombre del Administrador e cedula a modificar:
  <select name="nombre" >
  <option value=" " selected>Elige</option>
  <?php while($row=mysqli_fetch_array($res)){?>
  <option value="<?php echo $row['nombre']?>"><?php echo htmlentities($row['nombre']);?>--<?php echo htmlentities($row['cedula']);?>
  </option>
   </option>
  <?php } ?>
  </select>
  </li>
  </ul>


 <input type= "submit" name="datos2" value="Modificar Administrador" /><br /><br />
 <input type= "submit" name="datos3" value="Eliminar Administrador" /><br /><br />
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
<?php


if(isset($_REQUEST['datos2'])){
$nombre=$_REQUEST['nombre'];
$query="SELECT * from Administrador where nombre='$nombre'";
$cierto=mysqli_query($dbc,$query)or die ("error al procesar la consulta ");

if(!$cierto){
echo "No existe!";
}

if($row=mysqli_fetch_array($cierto)){
echo  "<form action='Administrador.php' method='post'>
<input type='text' name='id_administrador' value='$row[id_administrador]'><a>id_administrador<a><br>
<input type='text' name='nombre' value='$row[nombre]'><a>nombre</a><br>
<input type='text' name='telefono' value='$row[telefono]'><a>telefono</a><br>
<input type='text' name='cedula' value='$row[cedula]'><a>cedula</a><br>
<input type='text' name='Password' value='$row[Password]'><a>password</a><br>

<input type='submit' name='Modificar' value='Modificar'>
</form>";

}
}
?>



<?php
if(isset($_REQUEST['Modificar'])){
$id_administrador=$_REQUEST['id_administrador'];
$nombre=$_REQUEST['nombre'];
$telefono=$_REQUEST['telefono'];
$password=$_REQUEST['Password'];
$direccion=$_REQUEST['direccion'];
$cedula=$_REQUEST['cedula'];


$queryi="UPDATE Administrador set nombre='$nombre',telefono='$telefono',Password='$password',direccion='$direccion',cedula='$cedula' WHERE id_administrador='$id_administrador'";//consulta sql
$val=mysqli_query($dbc,$queryi)or die ("error al procesar la consulta");
echo "Datos cliente Modificados Correctamente<br><br>";
echo "<a href='Principal1.html'>Regresar</a>";
}

?>
<?php
if(isset($_REQUEST['datos3'])){
$nombre=$_REQUEST['nombre'];

$query="DELETE  from Administrador where nombre='$nombre'";
mysqli_query($dbc,$query)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));

mysqli_close($dbc);
echo "Los datos  del Administrador han sido borrados en la base de datos";
}
?>
