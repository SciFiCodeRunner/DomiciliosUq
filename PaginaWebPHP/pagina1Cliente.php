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
<link rel="stylesheet" href="css\plantilla.css" type="text/css" media="all">
<title>
  Ing sistemas y computacion Domicilios Uq
</title>

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

			<!--tamanio de las ventanas-->


<style type="text/css">

			#popupBoxOnePosition{
				top: 0; left: 0; position: fixed; width: 100%; height: 120%;
				background-color: rgba(0,0,0,0.7); display: none;
			}
			
			.popupBoxWrapper{
				width: 550px; margin: 50px auto; text-align: left;
			}
			.popupBoxContent{
				background-color: #FFF; padding: 15px;
			}

		</style>
</head>
<body>
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

			<!--codigo popup-->

		<div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">
					
<div class="login" style="width: 330px; margin: 0 auto;">
	<h3 style="text-align:center;">Ingreso Administrativo</h3>
	<form method="post">
			<h5 >Cedula</h5> <input type="text" name="cedula"><br>
			<h5 >Contraseña</h5> <input type="password" name="Password"><br><br>
			<input name="login" value="Iniciar sesión" type="submit"/><br><br>
<body>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }




  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }




  window.fbAsyncInit = function() {
  FB.init({
    appId      : '226371247784482',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });




  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.




  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });




  };




  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));




  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>




<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->




<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>




<div id="status">
</div>




</body>
	</div >

	</form>


<?php
if($_POST['login']){
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
	$aux=0;
	$consulta = "SELECT cedula,Password  FROM Administrador";
	$resultado = mysqli_query($dbc,$consulta) or die ("error al procesar la consulta");
	while($obtener = mysqli_fetch_array($resultado)){

		// Recibir datos para login
		if(($obtener[0]==$_POST['cedula'])&&($_POST['Password']==$obtener[1])){
			session_start();
			$aux=1;
			$_SESSION['nombre']=$obtener[0];
			echo " SesiÃ³n iniciada para el usuario $obtener[0] ";
			echo "<script> window.location='pagina1.php'</script>";
		}
	}
	if($aux==0){
		echo " El usuario no existe o verificar la contraseÃ±a. ";
	}

}
?>

					<p>Presione <a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">aqui</a> para volver a la pagina principal.</p>
				</div>
			</div>
		</div>


		<div id="wrapper">

			<p><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">Login Administrador</a> </p>
				</div><!-- wrapper end -->


<!-- codigo popup -->


   <div id="global">
      <div id="cabecera">
				<font color="white">
						  <h1>Pagina Principal </h1>
<a href="Cliente.php"> Registrar Cliente  </a>


</font>
      </div>
      <div id="navegacion">
	  <form  action="pagina1.php" method="post">
			<font color="white">
	 <h2> Ingresa tu busqueda</h2> <input type="text" name="palabra" style="width:300px">
 </font>
    <input name="Buscar" value="Buscador" type="submit"/>
    </form>
         <?php
if ($_POST['Buscar'])
{
// Tomamos el valor ingresado
$buscar = $_POST['palabra'];

// Si estÃƒÂ¡ vacÃƒÂ­o, lo informamos, sino realizamos la bÃƒÂºsqueda
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
	<a href="Establecimiento.php?id=<?=$row['nombre'];?>">Establecimiento :<?=$row['nombre'];?><br>Descripcion :<?=$row['descripcion'];?>
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
	  <H1> Establecimientos: </H1>
	  <?php

	  //consulta que muestra todos los establecimientos registrados
     $queryConsulta= "Select id_establecimiento,nombre, descripcion, tiempoEntrega from Establecimiento ";

$resultado= mysqli_query($dbc,$queryConsulta)or die ("error al procesar la consulta");
	while($rows=mysqli_fetch_array($resultado)){
    $nombreEst=$rows[1];

echo " <b>"." ". $rows[1]."<br>"."</b>";
print" <img src='http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/$rows[1].jpg'>";
echo "<i>"." ". $rows[2]."<br>"."</i>";
echo " Entrega en: ". $rows[3]."<br>";

echo " <HR width=100% align='left'>";



}
		?>
      </div>
      <div class="anuncios1">
           ZONA ANUNCIOS
      </div>
      <div id="pie">
         PIE DE PAGINA

			<!--like face-->

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
      </div>
   </div>
</body>

</html>
