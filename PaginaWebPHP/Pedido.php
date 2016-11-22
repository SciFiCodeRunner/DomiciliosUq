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
	
 echo  "<font size=5>"."<h2><b style=color:white>". $rows[1]."<br></h2>"."</b>"."</font>" ;
print" <img src='http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/$rows[1].jpg'>"."<br>"."<br>";;

echo "<i style=color:white>"." ". $rows[2]."<br>"."</i>";
echo " <b style=color:white> Entrega en: ". $rows[3]. "  ||  "."Pedido Minimo: ".$rows[4]."  ||  "."Costo Domicilio: $".$rows[5]."<br>"."</b>";

echo "</div>";
}
		?>

<a href=Pedido.php >Productos</a> <a href=Comentarios.php>Comentarios</a>.


</div>
	  
      
      <div id="principal">
      
	  <H1 align="center"> Productos </H1> 
	  <?php

//	  consulta que muestra todos los productos de un establecimiento
    $queryConsulta1= "Select e.id_establecimiento, e.nombre, e.descripcion, e.tiempoEntrega, e.pedidoMinimo, e.costoDomicilio, p.nombre, p.descripcion, p.precio,p.id_producto, c.descripcion from Establecimiento e join ProductoEstablecimiento pe on id_establecimiento=id_establecimientofk join Producto p on id_productofk=id_producto join categoria c on id_categoriafk=id_categoria where e.id_establecimiento=$v1 ";

$resultado1= mysqli_query($dbc,$queryConsulta1)or die ("error al procesar la consulta");
	while($rows=mysqli_fetch_array($resultado1)){
    

echo "<div>";
	 echo "<form  action=Pedido.php method=post>";
	 echo "<font size=5>"."<b>".$rows[10]."</b>"."<br>"."<br>"."</font>" ;
$variable=$rows[9];
echo"<input type=hidden name=producto value=". $rows[9].">";
echo"<input type=hidden name=establecimiento value=".$v1.">";
	 print" <img src='http://ingsoft2016uq.comli.com/proyectosoft2/PaginaPhp/imagenes/$rows[6].jpg'>"."<br>"."<br>";;
	 echo " <b>"." ". $rows[6]."<br>"."</b>" ;
	  echo "<i>"."<b>"." ". $rows[7]."<br>"."</b>"."</i>";

	   echo " <b>"."$". $rows[8]."<br>"."</b>" ;


echo "<p align=left>"."<input name=Ingresar value='Agregar al carrito' type=submit style='height:30;background-color: #FF9900'  />"."</p>";
echo "<HR size=6 width=95% align=center>";
 echo "</form>";
echo "</div>";

}
		?>
      </div>
      <div class="anuncios1">
	  
	  
	  
	  <?php
	  if($_POST['Ingresar']){ 
		  $obtener1=$_POST['producto'];
	  $sql = "CREATE TABLE IF NOT EXISTS carrito (
id INT(6) NOT NULL, 
nombre VARCHAR(30) NOT NULL,
precio int(10) NOT NULL
)";
  if (mysqli_query($dbc, $sql)) {
    echo "<h3>Carrito de compras creado </h3>";
} else {
    echo "Error creating carrito: " . mysqli_error($dbc);
}


$consultaProducto="SELECT   id_producto, nombre,precio   FROM Producto where id_producto=$obtener1";
$resultado = mysqli_query($dbc,$consultaProducto) or die ("error al procesar la consulta id no valido");
while($obt = mysqli_fetch_array($resultado)){

	$query1 = "INSERT INTO carrito (id,nombre,precio) VALUES ('$obt[0]','$obt[1]','$obt[2]')";
	

mysqli_query($dbc,$query1)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));


		
	}
	

	
$consultacarro="SELECT    id, nombre,precio   FROM  carrito ";
$resultado2 = mysqli_query($dbc,$consultacarro) or die ("error al procesar la consulta id no valido");
	
//tomamos los datos del archivo conexion.php   
//se envia la consulta  
	echo "<table>";  
echo "<tr>";  
echo "<th><h2>Nombre</h2></th>";  
echo "<th><h2>Precio</h2></th>";  

echo "</tr>";  
 
    $total = 0;
while ($obt = mysqli_fetch_row($resultado2)){  
  $total = $total + $obt[2]; 
    echo "<tr>";  
    echo "<td><h3>$obt[1]></h3></td>";  
    echo "<td><h3>$obt[2]</h3></td>";  
	
    echo "</tr>";  
}  
echo"<h1>Total $total</h1>";
echo "</table>";  




echo" <form action=Pedido.php method=post>";
echo"<input type=text name=establecimiento value=".$v1.">";
echo $v1;
 echo"<input name='Comprar' value='Comprar' type=submit style='height:60;width:100 ;background-color: #FF9900'  />
</form> ";






 

	  }
	  ?>
	  
	  
	  <?php
	    if($_POST['Comprar']){ 
		echo"<h1>Compra Realizada con Exito $total </h1> ";
		$borrar ="DROP TABLE IF EXISTS carrito";
		
	  mysqli_query($dbc,$borrar)or die("Query MYSQL ERROR : ".
mysqli_error($dbc));
	  
		}
	  
	  ?>

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
			echo "<script> window.location='Administrador.php'</script>"  ;
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

