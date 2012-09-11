<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Consultar ::</title>
</head>

<body>
<a href="insert.php"> :: Insertar :: </a><br/>
<a href="modificar.php"> :: Modificar :: </a><br/>
<a href="eliminar.php"> :: Consultar :: </a><br/>
<a href="#"> :: Eliminar :: </a>
<br/><br/>
<center><form id="form1" name="form1" method="post" action="">
  <select name="cbxNombre" id="cbxNombre">
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
  </select>
  <input type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar" />
</form>
</body>
</html>
<?php
  if(isset($_POST["btnEliminar"]))
  {
	  $recupera = trim ($_POST["cbxNombre"]);
	  $eliminar = "delete from usuario where nombre='".$recupera."'";
	  $result = mysql_query($eliminar);
	  ?>
				<script language="javascript" type="text/javascript">
                alert('El registro se elimino');
				document.location.href = "insert.php";
                </script>
      <?php
  }
  ?>