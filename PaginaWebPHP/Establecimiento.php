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
		
			var latPrecisa=latitud.toFixed(6);
			var longPrecisa=longitud.toFixed(6);
			long.value=longPrecisa;
	
			mitexto.value=latPrecisa;
			var contenedor = document.getElementById("map");
			var centro = new google.maps.LatLng(latPrecisa,longPrecisa);
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
							   
							
                                                          <div> 
							  <label for = "longitud"> Longitud : </label><input type="text" value=""  name="test" id="mitexto">
							     </div>
							 <div>
							 <label for = "latitud">  Latitud  :</label> <input type="text" value=""  name="test2" id="long">
							  </div>
					 	   <div>
					 	  <label for = "nombre"> Nombre  :</label> <input type="text" name="nombre" >
						  </div>
						    
					 	  <div>
					 	  <label for = "Descripcion">Descripcion  :</label><input type="text" name="descripcion">
						 </div>
					  
					  	   <div>
					  	<label for = "Direccion">Direccion   :</label> <input type="text" name="direccion">
						 </div>
					   
					   	     <div>
					   	<label for = "Tiempo ">Tiempo Entrega:</label> <input type="text" name="tiempoEntrega">
					    </div>
					        <div>
					     <label for = "Pedido ">Pedido Minimo:</label> <input type="text" name="pedidoMinimo">
					  </div>
					        <div>
					 <label for = "Costo "> Costo Domicilio:</label> <input type="text" name="costoDomicilio">
					  </div>
					    
</ul>
						
					 <input type= "submit" name="datos" value="Enviar Formulario Registro" /><br /><br />
					 
					 </form>
					 
	 <form  method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" id="archivo"></input>
            <input type="submit" value="Subir archivo"></input>
        </form>
<?php
if ($_FILES['archivo']["error"] > 0)

  {

  echo "Error: " . $_FILES['archivo']['error'] . "<br>";

  }

else
  {
move_uploaded_file($_FILES['archivo']['tmp_name'],"imagenes/" . $_FILES['archivo']['name']);
  }
?>
					
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

	    </body>
	</html>