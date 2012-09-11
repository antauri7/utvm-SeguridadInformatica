<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Modificar ::</title>
</head>

<body>
<a href="insert.php"> :: Insertar :: </a><br/>
<a href="#"> :: Modificar :: </a><br/>
<a href="eliminar.php"> :: Consultar :: </a><br/>
<a href="consultar.php"> :: Eliminar :: </a><br/><br/>
<style type="text/css">
centrar {
	text-align: center;
}
#form1 table tr td {
	text-align: center;
}
#form1 table {
	text-align: center;
}
</style>
</head>


<body>
<a style="font-size:24px; color:#009; text-align:center">Modificar</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td colspan="2">Actualizar Datos</td>
    </tr>
    <tr>
      <td width="94">Nombre</td>
      <td width="90"><label for="cbxProducto"></label>
        <select name="cbxNombre" id="cbxProducto">
        <?php
		$conexion = mysql_connect ('localhost','root','') 
			or die ("Imposible conectarse a la base de datos...");
			mysql_select_db("10mo",$conexion);
		/*Declarar variables para el select de la columna producto*/
		$query = "select nombre from usuario";
		$resultado = mysql_query ($query);
		
		if ($resultado){
			/*La variable renglon ejecuta tota la consulta solo de producto con mysql_fetch_array*/
			while($renglon = mysql_fetch_array($resultado)){
				
				/*La variable valor va a recuperar el valor de nuestro select*/
				$valor = $renglon['nombre'];
				echo "<option value='$valor'> $valor </option> \n";
				
				}
			}
	
		?>
      </select>        <label for="txtproducto"></label></td>
    </tr>
    <tr>
      <td>ApPaterno</td>
      <td><label for="txttipo"></label>
      <input type="text" name="txtPaterno" id="txttipo" /></td>
    </tr>
    <tr>
      <td>ApMaterno</td>
      <td><label for="txtcantidad"></label>
      <input type="text" name="txtMaterno" id="txtcantidad" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnActualizar" id="btnActualizar" value="Actualizar" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php

if (isset($_POST["btnActualizar"])){
	$recuperarNombre = trim ($_POST["cbxNombre"]);
	$recuperarPaterno = trim ($_POST["txtPaterno"]);
	$recuperarMaterno = trim ($_POST["txtMaterno"]);
	$update = "update usuario set nombre = '".$recuperarNombre."', apPaterno =  '".$recuperarPaterno."', apMaterno = '".$recuperarMaterno."' where nombre = '".$recuperarNombre."'";
	$query = mysql_query ($update) or die ("Error al actualizar datos");
	
	?>
    <script language="javascript" type="text/javascript">
	alert('Los datos fueron actualizados correctamente');
	</script>
    
    <?php
	}

?>

</body>
</html>