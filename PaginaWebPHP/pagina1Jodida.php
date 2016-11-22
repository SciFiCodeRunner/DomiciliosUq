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

<DOCTYPE! HTML>
<html>
<head>
 <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<link rel="stylesheet" href="css\plantilla.css" type="text/css" media="all">
<title>
  Ing sistemas y computacion Domicilios Uq
</title>
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
			milat.value=latPrecisa;
			milong.value=longPrecisa;
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
<!--codigo face-->

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '226371247784482',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
			<!--fin codigo face-->

			<!--codigo del popup-->


<script type="text/javascript">
			<!--
			    function toggle_visibility(id) {
			       var e = document.getElementById(id);
			       if(e.style.display == 'block')
			          e.style.display = 'none';
			       else
			          e.style.display = 'block';
			    }
			//-->
		</script>
</head>
<body   onLoad="localize()">


			<!--codigo popup-->

		<div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">

<div class="login" style="width: 330px; margin: 0 auto;">
	<h3 style="text-align:center;">Ingreso Administrativo</h3>
	<form method="post">
			<h5 >Cedula</h5> <input type="text" name="cedula"><br>
			<h5 >Contrasenia</h5> <input type="password" name="Password"><br><br>
			<input name="login" value="Iniciar sesion" type="submit"/><br><br>

	</div >
	</form>


					<p>Presione <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">aqui</a> para volver a la pagina principal.</p>
				</div>
			</div>
		</div>
<!-- codigo popup -->
	<div id="popupBoxTwoPosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">

<div class="login" style="width: 330px; margin: 0 auto;">
	<h3 style="text-align:center;">Ingreso Cliente</h3>
	<form method="post">
			<h5 >Cedula</h5> <input type="text" name="cedula"><br>
			<h5 >Contrasenia</h5> <input type="password" name="Password"><br><br>
			<input name="login2" value="Iniciar sesion" type="submit"/><br><br>
<body>
<script>
† // This is called with the results from from FB.getLoginStatus().
† function statusChangeCallback(response) {
† † console.log('statusChangeCallback');
† † console.log(response);
† † // The response object is returned with a status field that lets the
† † // app know the current login status of the person.
† † // Full docs on the response object can be found in the documentation
† † // for FB.getLoginStatus().
† † if (response.status === 'connected') {
† † †

 // Logged into your app and Facebook.
† † † testAPI();
       


† † } else if (response.status === 'not_authorized') {
† † † // The person is logged into Facebook, but not your app.
† † † document.getElementById('status').innerHTML = 'Ingresa usando ' +
† † † † 'tu Facebook.';
† † } else {
† † † // The person is not logged into Facebook, so we're not sure if
† † † // they are logged into this app or not.
† † † document.getElementById('status').innerHTML = 'Ingresa usando ' +
† † † † 'tu Facebook.';
† † }
† }




† // This function is called when someone finishes with the Login
† // Button. †See the onlogin handler attached to it in the sample
† // code below.
† function checkLoginState() {
† † FB.getLoginStatus(function(response) {
† † † statusChangeCallback(response);
† † });
† }




† window.fbAsyncInit = function() {
† FB.init({
† † appId † † †: '226371247784482',
† † cookie † † : true, †// enable cookies to allow the server to access†
† † † † † † † † † † † † // the session
† † xfbml † † †: true, †// parse social plugins on this page
† † version † †: 'v2.8' // use graph api version 2.8
† });




† // Now that we've initialized the JavaScript SDK, we call†
† // FB.getLoginStatus(). †This function gets the state of the
† // person visiting this page and can return one of three states to
† // the callback you provide. †They can be:
† //
† // 1. Logged into your app ('connected')
† // 2. Logged into Facebook, but not your app ('not_authorized')
† // 3. Not logged into Facebook and can't tell if they are logged into
† // † †your app or not.
† //
† // These three cases are handled in the callback function.




† FB.getLoginStatus(function(response) {
† † statusChangeCallback(response);
† });




† };




† // Load the SDK asynchronously
† (function(d, s, id) {
† † var js, fjs = d.getElementsByTagName(s)[0];
† † if (d.getElementById(id)) return;
† † js = d.createElement(s); js.id = id;
† † js.src = "//connect.facebook.net/en_US/sdk.js";
† † fjs.parentNode.insertBefore(js, fjs);
† }(document, 'script', 'facebook-jssdk'));




† // Here we run a very simple test of the Graph API after login is
† // successful. †See statusChangeCallback() for when this call is made.
† function testAPI() {
† † console.log('Welcome! †Fetching your information.... ');
† † FB.api('/me', function(response) {
† † † console.log('Successful login for: ' + response.name);
† † † document.getElementById('status').innerHTML =
† † † † 'Thanks for logging in, ' + response.name + '!';
† † });
† }
</script>




<!--
† Below we include the Login Button social plugin. This button uses
† the JavaScript SDK to present a graphical Login button that triggers
† the FB.login() function when clicked.
-->




<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>




<div id="status">

</div>




</body>

                        <h5> øNo tienes cuenta? Crea una cuenta <a href="Cliente.php">Aqui</a></h5>
     
			

			

	</div >
	</form>


					<p>Presione <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');">aqui</a> para volver a la pagina principal.</p>
				</div>
			</div>
		</div>
		
	
   <div id="global">
   
      <div id="cabecera">
	  
						  <h1 align="center">Domicilios UQ </h1>
						  <ul>
                         <li> <a href="Establecimiento.php">Establecimiento</a></li>
		                   <li style="float:right"><a class="active" href="javascript:void(0)" onclick="toggle_visibility('popupBoxTwoPosition');">Login Cliente</a> </li>
                        </ul>
	  
	  </div>
	  
      <div id="navegacion">
	  <form  action="pagina1.php" method="post">
	  <font color="white">
	 <h2 > Ingresa tu busqueda</h2> 
	 <p> <input type="text" name="palabra"style="height:30 ;width:400">  <input name="Buscar" value="Buscador" type="submit"/></p>
	 </font>
    </form>
         <?php
if ($_POST['Buscar'])
{
// Tomamos el valor ingresado
$buscar = $_POST['palabra'];

// Si est√É¬° vac√É¬≠o, lo informamos, sino realizamos la b√É¬∫squeda
if(empty($buscar))
{
echo "No se ha ingresado una cadena a buscar";
}else{

$consulta= "SELECT * FROM Establecimiento WHERE  nombre like '%$buscar%' ";
$resultado = mysqli_query($dbc,$consulta) or die ("error al procesar la consulta");

// Tomamos el total de los resultados
$total = mysqli_num_rows($resultado);

// Imprimimos los resultados
if ($row = mysqli_fetch_array($resultado)){


echo "<font color ='white'><h1> Resultados para:<b>$buscar</b></h1></font>";


do {
?>

<br>

<img src="http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/<?=$row['nombre'];?>.jpg">;

<p><b><font color="white">

	<!--

<a href="Establecimiento.php?id=<?=$row['nombre'];?>">Establecimiento :<?=$row['nombre'];?><br>Descripcion :<?=$row['descripcion'];?> -->

<form  action=Pedido.php method=post>
<b> <?=$row['nombre'];?><br></b>
<i> <?=$row['descripcion'];?><br></i>
<b> Entrega en: <?=$row['tiempoEntrega'];?><br>
<p align=left> <input  name=Pedido value=Pedido type=submit style=height:30 /></p>
<input type=hidden name=establecimiento value=<?=$row['id_establecimiento'];?>>
</form>

</font>
</a></b></p>

 <HR width=99% align='left' font color="white">;



<?php

} while ($row = mysqli_fetch_array($resultado));
echo "<p> <font color='white'> Resultados: $total</p>
</font> </ ";


} else {
// En caso de no encontrar resultados
echo "No se encontraron resultados para: <b>$buscar</b>";
}
}
}

?>
      </div>
      <div id="principal">
	  <H2 align="center"> Establecimientos </H2>
	  
	  <?php

	  //consulta que muestra todos los establecimientos registrados
     $queryConsulta= "Select id_establecimiento,nombre, descripcion, tiempoEntrega from Establecimiento ";

$resultado= mysqli_query($dbc,$queryConsulta)or die ("error al procesar la consulta");
	while($rows=mysqli_fetch_array($resultado)){
    $nombreEst=$rows[1];



echo "<div>";
echo "<form  action=Pedido.php method=post>";
echo "<h3 style='color:red'> <b>"." ". $rows[1]."<br>"."</b></h3>" ;
echo"<input type=hidden name=establecimiento value=". $rows[0].">";
print"<div><div id ='posicion'> <img src='http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/$rows[1].jpg'>
 <div id='posiciondentrobtn'> <input  name=Pedido value=Pedido type=submit  style='background-color: #FF9900; width:200; height:50'/></div> 
</div></div>";
echo "<i>"." ". $rows[2]."<br>"."</i>";
echo " Entrega en: ". $rows[3]."<br>";
echo "<HR size=6 width=98% align=center>";
echo "</form>";
echo "</div>";
}
		?>
      </div>
      <div class="anuncios1"  >
	  	<div id="navegador">
		<h1>tu posicion</h1>
	            <div id="map" ></div>
				</div>
							<div id="establecimiento">
			<h3> ver establecimientos cercanos </h3>
<form name="form3" method="post" >
<input type="hidden" value="" name ="test4" id="milat">
<input type="hidden" value ="" name="test5" id="milong">
<?php
if(isset($_REQUEST['datosVerCercano'])){
	$milat=$_REQUEST['test4'];
	$milong=$_REQUEST['test5'];
$lati= substr($milat, 0, 9);
$longi= substr($milong, 0, 9);
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
   <div id ="anuncio1">
   </div>
      </div>
	  
      <div id="pie">
	   <font color="white">
	
<h3>

       <li><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');"> Login Administrador </a> </li>



</h3>
		    </font>
      </div>
	  
   </div>
</body>

</html>

<?php
if($_POST['login']){
	$aux=0;
	$consulta = "SELECT cedula,Password  FROM Administrador";
	$resultado = mysqli_query($dbc,$consulta) or die ("error al procesar la consulta");
	while($obtener = mysqli_fetch_array($resultado)){

		// Recibir datos para login
		if(($obtener[0]==$_POST['cedula'])&&($_POST['Password']==$obtener[1])){
			session_start();
			$aux=1;
			$_SESSION['nombre']=$obtener[0];
			echo " Sesi√≥n iniciada para el usuario $obtener[0] ";
			echo "<script> window.location='Administrador.php'</script>";
		}
	}
	if($aux==0){
		echo " El usuario no existe o verificar la contrase√±a. ";
	}

}
if($_POST['login2']){
	$aux=0;
	$consulta = "SELECT email,password  FROM cliente";
	$resultado = mysqli_query($dbc,$consulta) or die ("error al procesar la consulta");
	while($obtener = mysqli_fetch_array($resultado)){

		// Recibir datos para login
		if(($obtener[0]==$_POST['email'])&&($_POST['password']==$obtener[1])){
			session_start();
			$aux=1;
			$_SESSION['email']=$obtener[0];
			$sesionCliente=$obtener[0];
			echo " Sesi√≥n iniciada para el usuario $obtener[0] ";
			echo "<script> window.location='Administrador.php'</script>";
		}
	}
	if($aux==0){
		echo " El usuario no existe o verificar la contrase√±a. ";
	}
	
}
?>

<?php


if ($_POST['datos'])
{
  # code...

$email= $_POST ['email'];
$password= $_POST ['password'];

$query1 = "INSERT INTO cliente (nombre,email,password) VALUES ('$email','$password')";


mysqli_query($dbc,$query1)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));

mysqli_close($dbc);
echo "Los datos han sido insertados en la base de datos";
}
?>
		