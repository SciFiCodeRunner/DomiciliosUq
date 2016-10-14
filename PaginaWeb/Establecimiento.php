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
$query="SELECT nombre,descripcion,direccion,tiempoEntrega,pedidoMinimo,costoDomicilio FROM Establecimiento";
$res=mysqli_query($dbc,$query)or die ("error al procesar la consulta");
$Profesor=htmlentities($_REQUEST['nombre']);

?>

<html>
<head>
<title>
Ingenieria de sistemas y computacion 2016 beta  C.soto
</title>
</head>

<body>

  <form name="form3" method="post" action="Establecimiento.php">

  <ul>
 	  <li>
 	  Nombre establecimiento <input type="text" name="nombre" >
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

   <ul>
       <li>
  Costo Domicilio <input type="text" name="costoDomicilio">
       </ul>
   </li>
 <input type= "submit" name="datos" value="Enviar" /><br /><br />
 </form>

<h3>

	Actualizar Informacion Establecimiento
</h3>



<html>
<form name="form1" method="post" action="Establecimiento.php">

	<ul>
 	  <li>
 selecciona Nombre del Establecimiento a modificar:
 <select name="nombre" >
 <option value=" " selected>Elige</option>
 <?php while($row=mysqli_fetch_array($res)){?>
 <option value="<?php echo $row['nombre']?>"><?php echo htmlentities($row['nombre']);?>
 </option>
  </option>
 <?php } ?>
 </select>
 </li>
 </ul>


<input type= "submit" name="datos2" value="Modificar Establecimiento" /><br /><br />
<input type= "submit" name="datos23" value="Eliminar establecimiento" /><br /><br />
</form>

</html>


<?php


if(isset($_REQUEST['datos2'])){
$nombre=$_REQUEST['nombre'];

$query="select * from Establecimiento where nombre='$nombre'";
$obtener=$query[0];
$cierto=mysqli_query($dbc,$query)or die ("error al procesar la consulta");

if(!$cierto){
echo "No existe!";
}

if($row=mysqli_fetch_array($cierto)){
echo  "<form action='Establecimiento.php' method='post'>
<input type='text' name='nombre' value='$row[id_establecimiento]'><a>id_establecimiento<a><br>
<input type='text' name='nombre' value='$row[nombre]'><a>nombre</a><br>
<input type='text' name='direccion' value='$row[direccion]'><a>direccion</a><br>
<input type='text' name='descripcion' value='$row[descripcion]'><a>descripcion</a><br>
<input type='text' name='tiempoEntrega' value='$row[tiempoEntrega]'><a>tiempoEntrega</a><br>
<input type='text' name='pedidoMinimo' value='$row[pedidoMinimo]'><a>pedidoMinimo</a><br>
<input type='text' name='costoDomicilio' value='$row[costoDomicilio]'><a>costoDomicilio</a>

<input type='submit' name='Modificar' value='Modificar'>
</form>";

}
}
?>


<?php
if(isset($_REQUEST['Modificar'])){
$id_establecimiento=$_REQUEST['id_establecimiento'];
$nombre=$_REQUEST['nombre'];
$direccion=$_REQUEST['direccion'];
$descripcion=$_REQUEST['descripcion'];
$tiempoEntrega=$_REQUEST['tiempoEntrega'];
$pedidoMinimo=$_REQUEST['pedidoMinimo'];
$costoDomicilio=$_REQUEST['costoDomicilio'];

$queryi="UPDATE Establecimiento set nombre='$nombre',direccion='$direccion',descripcion='$descripcion',tiempoEntrega='$tiempoEntrega',pedidoMinimo='$pedidoMinimo',costoDomicilio='$costoDomicilio' WHERE id_establecimiento='$id_establecimiento'";//consulta sql
$val=mysqli_query($dbc,$queryi)or die ("error al procesar la consulta");
echo "Datos Modificados Correctamente<br><br>";
echo "<a href='Principal1.html'>Regresar</a>";
}

?>






<?php

if ($_POST['datos'])
{
  # code...


$nombre = $_POST ['nombre'];
$descripcion= $_POST ['descripcion'];
$direccion= $_POST ['direccion'];
$tiempoEntrega= $_POST ['tiempoEntrega'];
$pedidoMinimo=$_POST['pedidoMinimo'];
$costoDomicilio=$_POST['costoDomicilio'];
$query1 = "INSERT INTO Establecimiento (nombre,descripcion,direccion,tiempoEntrega,pedidoMinimo,costoDomicilio) VALUES ('$nombre','$descripcion','$direccion','$tiempoEntrega',$pedidoMinimo,$costoDomicilio)";


mysqli_query($dbc,$query1)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));

mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>
<?php
if(isset($_REQUEST['datos3'])){
$nombre=$_REQUEST['nombre'];

$query="DELETE* from Establecimiento where nombre='$nombre'";
$obtener=$query[0];
?>
