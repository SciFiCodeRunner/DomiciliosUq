<html>
<body>
	<div class="login" style="width: 330px; margin: 0 auto;">
	<h3 style="text-align:center;">Ingreso Administrativo</h3>
	<form method="post">
			<h5 >Cedula</h5> <input type="text" name="cedula"><br>
			<h5 >Contraseña</h5> <input type="password" name="Password"><br><br>
			<input name="login" value="Iniciar sesión" type="submit"/><br><br>
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
</body>
</html>
