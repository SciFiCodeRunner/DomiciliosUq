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
				background-color: red; padding: 15px;
			}

		</style>
</head>
<body>


			<!--codigo popup-->

		<div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">

<div class="login" style="width: 330px; margin: 0 auto;">
	<h3 style="text-align:center;">Ingreso Administrativo</h3>
	<form method="post">
			<h5 >Cedula</h5> <input type="text" name="cedula"><br>
			<h5 >Contrase�a</h5> <input type="password" name="Password"><br><br>
			<input name="login" value="Iniciar sesi�n" type="submit"/><br><br>
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
			echo " Sesión iniciada para el usuario $obtener[0] ";
			echo "<script> window.location='pagina1.php'</script>";
		}
	}
	if($aux==0){
		echo " El usuario no existe o verificar la contraseña. ";
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
<a href="Establecimiento.php">Registrar/ModificarEstablecimiento</a>

<a href="Cliente.php"> Registrar Cliente  </a>
<a href="Administrador.php" > Registrar Administrador</a>


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

// Si estÃ¡ vacÃ­o, lo informamos, sino realizamos la bÃºsqueda
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
      </div>
   </div>
</body>

</html>
