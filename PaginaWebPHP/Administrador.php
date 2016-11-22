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
<link rel="stylesheet" href="css\prueba.css" type="text/css" media="all">
</head>

<body>

<div id="global">
<div id="cabecera">
<h1> Ventana Administrador</h1>
</div>
<div id="navegacion">
</div>

<div id ="principal">
<ul>
  <form name="form3" method="post" action="Administrador.php">
<div>
  <ul>
 	  <li>
 	 <p> Nombre</p><div>  <input type="text" name="nombre" >
 	  
 </li>

 
 	  <li>
 	<p>Telefono <input type="text" name="telefono"></p>
 	 
 </li>

 
  	  <li>
  	<p>Direccion <input type="text" name="direccion"></p>
  	  </li>


  	  <li>
    <p>Cedula <input type="text" name="cedula"></p>
  	 
  </li>

			<li>
	<p>Password <input type="password" name="password"></p>
	</li>

</ul>
 <input type= "submit" name="datos" value="Enviar" /><br /><br />
 </form>
 </div>
 
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

 <form name="form1" method="post" action="Administrador.php">

 	<ul>
  	  <li>
<p>  selecciona Nombre del Administrador e cedula a modificar:</p>
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
<input type='hidden' name='id_administrador' value='$row[id_administrador]'>
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
		<div class= "actualizar ">

<?php $query="Select id_establecimiento, nombre, descripcion,direccion, tiempoEntrega, pedidoMinimo, costoDomicilio from Establecimiento ";
$res2=mysqli_query($dbc,$query)or die ("error al procesar la consulta");
 
?>

					<h1>
						Actualizar Informacion Establecimiento
					</h1>
					<form name="form1" method="post" action="Administrador.php">
					 	  <li>
					<p> selecciona Nombre del Establecimiento a modificar:</p>
					 <select name="nombre" >

					 <option value=" "selected>Elige</option>
					 <?php while($row2=mysqli_fetch_array($res2)){
					 	$idestablecimiento='rows[0]';
						 ?>
					 	}

					 <option value="<?php echo $row2['nombre']?>">
					 <?php echo htmlentities($row2['nombre']);?>
					 </option>
					  </option>
					 <?php } ?>
					 </select>
					 </li>
					 <br>
					<input type= "submit" name="datos2" value="Modificar Establecimiento" > <br>
					<input type= "submit" name="datos3" value="Eliminar establecimiento" > <br>

					<!-- BOTON PARA AGREGAR PRODUCTOS-->
					<div>
					<form name="productos" method="post" action="Administrador.php">
					<input type= "submit" name="product" value="Agregar Productos" > <br>
					
<!-- FORMULARIO PARA AGREGAR UN PRODUCTO-->
<?php
if(isset($_REQUEST['product'])){
$nombre=$_REQUEST['nombre'];
$idEstable=$_REQUEST['id_establecimiento'];
?>
					<form name="AgregarProducto" method="post" action="Administrador.php" >
						<ul>
							   
							
                            <div> 
							<label for = "nombre">Nombre  :</label><input type="text" name="nombre" ><br>
							
							</div>
							<div>
							<label for = "descripcion">Descripcion  :</label><input type="text" name="descripcion" ><br>
							</div>
					 	    <div>
					 	    <label for = "precio">Precio  :</label> <input type="text" name="precio" ><br>
						    </div>
						    
					    
						</ul>
						
					 	<input type= "submit" name="datosproducto" value="Agregar" /><br /><br />
					 
					 </form>

 <?php  
}  
 ?> 
 <!-- INGRESAMOS LA INFORMACION DEL PRODUCTO A LA BASE DE DATOS-->
 <?php

if ($_POST['datosproducto'])
{
	//SE OBTIENEN LOS DATOS DEL FORMULARIO
$id_categoriafk= 1;
$nombre1 = $_POST ['nombre'];
echo"<input type=hidden name=nombreproducto value=$nombre1>";

$descripcion= $_POST ['descripcion'];
$precio= $_POST ['precio'];
$query4 = "INSERT INTO Producto (id_categoriafk,nombre,descripcion,precio) VALUES ('$id_categoriafk','$nombre1','$descripcion','$precio')";
mysqli_query($dbc,$query4)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));
mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>



					</form>
					</div>
					<div>
			<!--		<?php
					$v2=$_POST['nombreproducto'];
// CONSULTA PARA OBTENER LA ID DEL ESTABLECIMIENTO Y DEL PRODUCTO QUE SE ACABA DE INGRESAR
$query5="SELECT id_producto,nombre from Producto where nombre=$v2";
$res3=mysqli_query($dbc,$query5)or die ("error al procesar la consulta del producto nuevo");
while($rows=mysqli_fetch_array($res3)){

//INGRESAMOS LOS DATOS A LA TABLA ESTABLECIMIENTOPRODUCTO, PARA ASÍ ASIGNAR AL ESTABLECIMIENTO ELEGIDO EL PRODUCTO QUE SE INGRESA
$productfk='rows[0]';
}	
?>				
<form name="EnlaceProducto" method="post" action="Administrador.php" >
<input type= "submit" name="enlace" value="Asignar a Establecimiento" /><br /><br />
</form>
<?php 

if(isset($_REQUEST['enlace'])){
	$idEstable=$_REQUEST['id_establecimiento'];

$query6 = "INSERT INTO ProductoEstablecimiento (id_establecimientofk,id_productofk) VALUES ('$idEstable','$productfk')";
mysqli_query($dbc,$query6)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));
mysqli_close($dbc);
echo "Los datos han sido insertados en la tabla intermedia";
}
?>-->


</div>


					</form>
					

					
					<?php
if(isset($_REQUEST['datos2'])){
$nombre=$_REQUEST['nombre'];
$query3="select * from Establecimiento where nombre='$nombre'";
$obtener=$query[0];
$cierto=mysqli_query($dbc,$query3)or die ("error al procesar la consulta");
if(!$cierto){
echo "No existe!";
}
if($row=mysqli_fetch_array($cierto)){
echo  "<form action='Establecimiento.php' method='post'>
<input type='hidden' name='id_establecimiento' value='$row[id_establecimiento]'>
<input type='text' name='nombre' value='$row[nombre]'><a>nombre</a><br>
<input type='text' name='direccion' value='$row[direccion]'><a>direccion</a><br>
<input type='text' name='descripcion' value='$row[descripcion]'><a>descripcion</a><br>
<input type='text' name='tiempoEntrega' value='$row[tiempoEntrega]'><a>tiempoEntrega</a><br>
<input type='text' name='pedidoMinimo' value='$row[pedidoMinimo]'><a>pedidoMinimo</a><br>
<input type='text' name='costoDomicilio' value='$row[costoDomicilio]'><a>costoDomicilio</a><br><br>
<input type='submit' name='Modificar' value='Modificar'>
</form>";
}}
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
if(isset($_REQUEST['datos3'])){
$nombre=$_REQUEST['nombre'];
$query="DELETE  from Establecimiento where nombre='$nombre'";
mysqli_query($dbc,$query)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));
mysqli_close($dbc);
echo "Los datos han sido borrados en la base de datos";
}
?>



</div>
</div>
</div>
</body>
</html>	