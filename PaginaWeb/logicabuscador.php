<?php
if ($_POST['buscador'])
{
// Tomamos el valor ingresado
$buscar = $_POST['palabra'];

// Si está vacío, lo informamos, sino realizamos la búsqueda
if(empty($buscar))
{
echo "No se ha ingresado una cadena a buscar";
}else{
// Conexión a la base de datos y seleccion de registros
define('a6251434_soft2', "a6251434_soft2");
$dbc = mysqli_connect("mysql6.000webhost.com","a6251434_camilo","012345",a6251434_soft2);
if(!$dbc){
	die("Database connection failed :" .mysqli_error($dbc));
	exit();
}
$dbs =mysqli_select_db($dbc, a6251434_soft2);
if (!$dbs) {
	die("Database selection failed : ". mysqli_error($dbc));
	exit();
}

//consulta para que funcione las expresiones regulares
$consulta= "SELECT * FROM libro WHERE autor like '%$buscar%' OR titulo LIKE '%$buscar%' OR ISBN LIKE '%$buscar%' ";
$resultado = mysqli_query($dbc,$consulta) or die ("error al procesar la consulta");

// Tomamos el total de los resultados
$total = mysqli_num_rows($resultado);

// Imprimimos los resultados
if ($row = mysqli_fetch_array($resultado)){
echo "Resultados para: <b>$buscar</b>";
do {
?>

<p><b><a href="libros.php?id=<?=$row['id'];?>"><?=$row['titulo'];?></a></b></p>
<br><br>
<form action=puntuar.php method="post">
Puntuación: <br><br><br>
<input type="radio" name="puntuacion" value="1"> 1
<input type="radio" name="puntuacion" value="2"> 2
<input type="radio" name="puntuacion" value="3"> 3
<input type="radio" name="puntuacion" value="4"> 4
<input type="radio" name="puntuacion" value="5"> 5
<br><br>
echo <?=$row['ISBN'];?>;

 <input type="hidden" name="variable1" value=<?=$row['ISBN'];?> />

<input type="submit" name="puntuacionBoton" value="Puntuar">

</form>
<form action="comentario.php" method="post">
Comentarios: <br><br><br>
<textarea name="comentario">  </textarea>

<br><br>
<input type="hidden" name="variableIsbn" value=<?=$row['ISBN'];?> />

<input type="submit" name="comentarioBoton" value="Publicar">

 <?php include("com.html");?>
</form>

<?php



} while ($row = mysqli_fetch_array($resultado));
echo "<p>Resultados: $total</p>";



} else {
// En caso de no encontrar resultados
echo "No se encontraron resultados para: <b>$buscar</b>";
}
}
}
?>
