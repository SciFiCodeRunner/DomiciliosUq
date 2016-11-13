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
$query="SELECT * from Establecimiento";
$res=mysqli_query($dbc,$query)or die ("error al procesar la consulta");
?>
	<html>
	    <head>
				<link rel="stylesheet" href="css\plantilla2.css" type="text/css" media="all">
	        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	        <title>Pagina web Domicilios UQ </title>
	        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	        <style>
	        #map
	        {
	            width: 100%;
	            height: 300px;
	            border: 1px solid #d0d0d0;
	        }
	        </style>
	 <script>
	 function localize()
		{
		 	if (navigator.geolocation)
			{
                navigator.geolocation.getCurrentPosition(mapa,error);
            }
            else
            {
                alert('Tu navegador no soporta geolocalizacion.');
            }
		}
		function mapa(pos)
		{
			var latitud = pos.coords.latitude;
			var longitud =pos.coords.longitude;
			var precision = pos.coords.accuracy;
		
			var lng =document.getElementsByName("test2");
			long.value=longitud;
		var lat=document.getElementsByName("test");
			mitexto.value=latitud.toFixed(6);
			milat.value=latitud.toFixed(6);
			milong.value=longitud.toFixed(6);
			var contenedor = document.getElementById("map");
			var centro = new google.maps.LatLng(latitud,longitud);
			var propiedades =
			{
                zoom: 15,
                center: centro,
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(contenedor, propiedades);
			var marcador = new google.maps.Marker({
                position: centro,
                map: map,
                title: "Tu posicion actual"
            });
		}
		function error(errorCode)
		{
			if(errorCode.code == 1)
				alert("No has permitido buscar tu localizacion")
			else if (errorCode.code==2)
				alert("Posicion no disponible")
			else
				alert("Ha ocurrido un error")
		}
 </script>
	    </head>
	    <body onLoad="localize()">
		<div id= "cabecera">
		<h1>Registro Establecimiento</h1>
		</div>
			<div id="navegador">
	            <div id="map" ></div>
				</div>
		<div id="registro">
		<h1> formulario de registro</h1>
		
					<form name="form2" method="post" action="Establecimiento.php" >
						 <ul>
							   <li>
							   Longitud :<input type="text" value="" name="test" id="mitexto">					 
							  </li><br>
							   <li>
							   Latitud  : <input type="text" value=""  name="test2" id="long">
							    </li><br>
					 	   <li>
					 	  Nombre  : <input type="text" name="nombre" >
						  </li><br>
						    
					 	  <li>
					 	Descripcion  :<input type="text" name="descripcion">
						</li><br>
					  
					  	  <li>
					  	Direccion   : <input type="text" name="direccion">
						</li><br>
					   
					   	  <li>
					   	Tiempo Entrega: <input type="text" name="tiempoEntrega">
					   </li><br>
					       <li>
					     Pedido Minimo: <input type="text" name="pedidoMinimo">
					    </li><br>
					       <li>
					  Costo Domicilio: <input type="text" name="costoDomicilio">
					  </li><br>
					    </ul>
					 <input type= "submit" name="datos" value="Enviar Formulario Registro" /><br /><br />
					 </form>
					
					 <?php
if ($_POST['datos'])
{
  # code..
  $latitud=$_POST['test'];
  $longitud=$_POST['test2'];
$nombre = $_POST ['nombre'];
$descripcion= $_POST ['descripcion'];
$direccion= $_POST ['direccion'];
$tiempoEntrega= $_POST ['tiempoEntrega'];
$pedidoMinimo=$_POST['pedidoMinimo'];
$costoDomicilio=$_POST['costoDomicilio'];
echo $latitud;
$query4 = "INSERT INTO Establecimiento (nombre,descripcion,direccion,tiempoEntrega,pedidoMinimo,costoDomicilio,lat,lng) VALUES ('$nombre','$descripcion','$direccion','$tiempoEntrega',$pedidoMinimo,$costoDomicilio,$latitud,$longitud)";
mysqli_query($dbc,$query4)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));
mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>
					</div>
		<div class= "actualizar ">
					<h1>
						Actualizar Informacion Establecimiento
					</h1>
					<form name="form1" method="post" action="Establecimiento.php">
					 	  <li>
					 selecciona Nombre del Establecimiento a modificar:
					 <select name="nombre" >
					 <option value=" "selected>Elige</option>
					 <?php while($row=mysqli_fetch_array($res)){
						 ?>
					 <option value="<?php echo $row['nombre']?>">
					 <?php echo htmlentities($row['nombre']);?>
					 </option>
					  </option>
					 <?php } ?>
					 </select>
					 </li>
					 <br>
					<input type= "submit" name="datos2" value="Modificar Establecimiento" > <br>
					<input type= "submit" name="datos3" value="Eliminar establecimiento" >		<br>
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
<input type='text' name='costoDomicilio' value='$row[costoDomicilio]'><a>costoDomicilio</a>
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
			<div id="establecimiento">
			<h1> ver establecimientos cercanos a tu posicion </h1>
<form name="form3" method="post" >
<input type="hidden" value="" name ="test4" id="milat">
<input type="hidden" value ="" name="test5" id="milong">
<?php
if(isset($_REQUEST['datosVerCercano'])){
	$milat=$_REQUEST['test4'];
	$milong=$_REQUEST['test5'];
$lati= substr($milat, 0, 9);
$longi= substr($milong, 0, 9);

echo $lati;
echo $longi;
	//COORDENADAS POLARES PLANETA TIERRA
$query2= "SELECT  nombre, (6371 * ACOS(
																SIN(RADIANS(lat)) * SIN(RADIANS($lati))
																+ COS(RADIANS(lng - $longi)) * COS(RADIANS(lat))
																* COS(RADIANS($lati))
																)
									 ) AS distance
FROM Establecimiento
HAVING distance < 3
ORDER BY distance ASC    ";
$resultado= mysqli_query($dbc,$query2)or die ("error al procesar la consulta");
while($rows=mysqli_fetch_array($resultado)){
echo "Lugar: ". $rows[0]."<br>";
echo "Cercania Km:  ".  $rows[1]."<br>" ;
}
}
?>
<input type= "submit" name="datosVerCercano" value="Ver establecimientos cercanos" /><br /><br />
 </form>
 </div>
	    </body>
	</html>