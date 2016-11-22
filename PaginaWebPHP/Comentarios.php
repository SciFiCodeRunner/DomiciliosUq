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
			#popupBoxTwoPosition{
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
			<h3>Aqui ponga el boton de facebook juliaan y ponga otro pop up para en caso de no tener cuenta que cree una acuerdese de guardar los datos de la sesion</h3>
			
		<h5>no tienes cuenta crea una</h5><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxTresPosition');">Crear</a>
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

	  <div>
<?php
$v1=$_POST['establecimiento'];
	  //consulta que muestra todos los establecimientos registrados
     $queryConsulta= "Select id_establecimiento, nombre, descripcion, tiempoEntrega, pedidoMinimo, costoDomicilio from Establecimiento where id_establecimiento=$v1 ";

$resultado= mysqli_query($dbc,$queryConsulta)or die ("error al procesar la consulta no se encuentran los datos");
while($rows=mysqli_fetch_array($resultado)){


echo "<div>";
	
 echo " <b style=color:white>". $rows[1]."<br>"."</b>" ;
print" <img src='http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/$rows[1].jpg'>"."<br>";

echo "<i style=color:white>"." ". $rows[2]."<br>"."</i>";
echo " <b style=color:white> Entrega en: ". $rows[3]. "  ||  "."Pedido Minimo: ".$rows[4]."  ||  "."Costo Domicilio: $".$rows[5]."<br>"."</b>";

echo "</div>";
}
		?>

</div>
	  
      
      <div id="principal">
	  <H1 align="center"> Productos </H1>
	  <?php

//	  consulta que muestra todos los productos de un establecimiento
    $queryConsulta1= "Select c.id_cliente,c.nombre,co.id_comentario,co.id_establecimientofk,co.id_clientefk,co.descripcion,co.fecha from cliente c join comentario co on c.id_cliente=co.id_clientefk join Establecimiento e on co.id_establecimientofk=e.id_establecimiento where e.id_establecimiento=$v1 ";

$resultado1= mysqli_query($dbc,$queryConsulta1)or die ("error al procesar la consulta");
	while($rows=mysqli_fetch_array($resultado1)){
    



echo "<div>";
	 echo "<form  action=Pedido.php method=post>";
	 echo " <b>".$rows[9]."</b>"."<br>"."<br>"."<br>" ;

	 print" <img src='http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/$rows[6].jpg'>"."<br>";
	 echo " <b>"." ". $rows[6]."<br>"."</b>" ;
	  echo " <b>"." ". $rows[7]."<br>"."</b>" ;
	   echo " <b>"."$". $rows[8]."<br>"."</b>" ;


echo "<p align=left>"."<input name=Ingresar value='Ingresar' type=submit style=height:30  />"."</p>";
echo "<HR size=6 width=95% align=center>";
 echo "</form>";
echo "</div>";

//echo "Hector y quezada aqui coloquen los botones de Pedir online que redireccione a la pagina de compras y gestionen las compras guiesen de domicilios.com";
//echo " <HR width=100% align='left'>";



}
		?>
      </div>
      <div class="anuncios1">
        ZONA ANUNCIOS
      </div>
	  
      <div id="pie">
	   <font color="white">
    <h1>     PIE DE PAGINA</h1>
	
<h3>
Aqui va el link login admin
       <li><a href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');"> Login Administrador julian este redirecciona a la pagina de administradory el de arriba a la misma pagina1.php solo es mantener la secion para comprar los productos</a> </li>

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
			echo " Sesión iniciada para el usuario $obtener[0] ";
			echo "<script> window.location='Administrador.php'</script>";
		}
	}
	if($aux==0){
		echo " El usuario no existe o verificar la contraseña. ";
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
			echo " Sesión iniciada para el usuario $obtener[0] ";
			echo "<script> window.location='Administrador.php'</script>";
		}
	}
	if($aux==0){
		echo " El usuario no existe o verificar la contraseña. ";
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
