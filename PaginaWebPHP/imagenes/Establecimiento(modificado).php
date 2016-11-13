<DOCTYPE! html>

<html>
<head>
<title>
Domicilios UQ
</title>
<link rel="stylesheet" href="css\plantilla2.css" type="text/css" media="all">
</head>
<body>


<div id="global">
  <div id ="cabecera">
  </div>
  <div id="contenido">

    <html>
        <head>
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
        var longitud = pos.coords.longitude;
        var precision = pos.coords.accuracy;
        var lng =document.getElementsByName("test2");
        long.value=longitud;
      var lat=document.getElementsByName("test");
        mitexto.value=latitud;
        milat.value=latitud;
        milong.value=longitud;

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
            <h1>Registrar establecimiento</h1>
                <div id="map" ></div>


        </body>

    </html>
    <html>
    <head>
    <title>DomiciliosUQ
    </title>
    </head>


    <body>

    		<?php
    $varLatitud= "<script> document.getElementsByName(latitud)</script>";
    echo $varLatitud;
    $varLongitud= "<script> document.getElementsByName(longitud)</script>";
    echo $varLongitud;

    ?>
    <form name="form2" method="post" action="Establecimiento.php" >
    <h1>Formulario Registro</h1>

    	 <ul>
    		   <li>
    		   Longitud:<input type="text" value="" name="test" id="mitexto">
    		   <?php
    		   $varLt="<script>document.getElementById(mitexto)</script>";
    		   echo $varLt;
    		   ?>

    		   </li>
    </ul>
    <ul>
    		   <li>
    		   Latitud: <input type="text" value=""  name="test2" id="long">
    		   </li>
    		</ul>

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
         Pedido Minimo(entero <input type="text" name="pedidoMinimo">
           </ul>
       </li>

       <ul>
           <li>
      Costo Domicilio (deci <input type="text" name="costoDomicilio">
           </ul>
       </li>
     <input type= "submit" name="datos" value="Enviar Formulario Registro" /><br /><br />
     </form>

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

    <input type= "submit" name="datos2" value="Modificar Establecimiento" /><br /><br />
    <input type= "submit" name="datos3" value="Eliminar establecimiento" /><br /><br />
    </form>
     </body>
     </html>
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


    <h1>ver establecimientos cercanos a tu posicion</h1>
    <form name="form3" method="post" >
    <input type="hidden" value="" name ="test4" id="milat">
    <input type="hidden" value ="" name="test5" id="milong">


    <?php

    if(isset($_REQUEST['datosVerCercano'])){
    	$milat=$_REQUEST['test4'];
    	$milong=$_REQUEST['test5'];
    echo $milat;
    echo $milong;
    	//COORDENADAS POLARES PLANETA TIERRA

    $query2= "SELECT  nombre, (6371 * ACOS(
    																SIN(RADIANS(lat)) * SIN(RADIANS($milat))
    																+ COS(RADIANS(lng - $milong)) * COS(RADIANS(lat))
    																* COS(RADIANS($milat))
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
</div>


</body>

</html>
