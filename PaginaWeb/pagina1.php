<DOCTYPE! HTML>
<html>



<head>
<title>
  Ing sistemas y computacion UQ beta C.soto
</title>
</head>



<body>
<a href="Establecimiento.php">Establecimiento</a>

<a href="Cliente.php">  Cliente  </a>
<a href="Administrador.php" > Administrador</a>

<a href="LoginAdministrador.php"> login Administrador</a>
<br>

<form  action="pagina1.php" method="post">
	<h5 > Ingresa tu busqueda</h5> <input type="text" name="palabra">
  <input name="Buscar" value="Buscador" type="submit"/>

</form>

</body>


</html>



<?php
if ($_POST['Buscar'])
{
// Tomamos el valor ingresado
$buscar = $_POST['palabra'];

// Si estÃ¡ vacÃ­o, lo informamos, sino realizamos la bÃºsqueda
if(empty($buscar))
{
echo "No se ha ingresado una cadena a buscar";
}else{
// ConexiÃ³n a la base de datos y seleccion de registros
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
//consulta para que funcione las expresiones regulares
$consulta= "SELECT * FROM Establecimiento WHERE  nombre like '%$buscar%' OR descripcion LIKE '%$buscar%'";
$resultado = mysqli_query($dbc,$consulta) or die ("error al procesar la consulta");

// Tomamos el total de los resultados
$total = mysqli_num_rows($resultado);

// Imprimimos los resultados
if ($row = mysqli_fetch_array($resultado)){
echo "Resultados para: <b>$buscar</b>";
do {
?>

<p><b><a href="Establecimiento.php?id=<?=$row['nombre'];?>">Establecimiento :<?=$row['nombre'];?><br>Descripcion :<?=$row['descripcion'];?></a></b></p>
<br><br>
<?php
} while ($row = mysqli_fetch_array($resultado));
echo "<p>Resultados: $total</p>";



} else {
// En caso de no encontrar resultados
echo "No se encontraron resultados para: <b>$buscar</b>";
}
}
}
?>
