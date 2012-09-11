<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Insertar ::</title>
</head>

<body>
<a href="insert.php"> :: Insertar :: </a><br/>
<a href="modificar.php"> :: Modificar :: </a><br/>
<a href="eliminar.php"> :: Consultar :: </a><br/>
<a href="consultar.php"> :: Eliminar :: </a><br/><br/>

<a style="font-size:24px; color:#009; text-align:center">Insertar</a>

<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center" style="text-align:center; font-size:16px">
    <tr>
      <td colspan="2">Insertar Nuevo Usuario</td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="textfield"></label>
      <input type="text" name="txtNombre" id="txtNombre" /></td>
    </tr>
    <tr>
      <td>ApPaterno</td>
      <td><input type="text" name="txtPaterno" id="txtPaterno" /></td>
    </tr>
    <tr>
      <td>ApMaterno</td>
      <td><input type="text" name="txtMaterno" id="txtMaterno" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnAlmacenar" id="btnAlmacenar" value="Almacenar" /></td>
    </tr>
  </table>
</form>
<?php 
		if (isset($_POST["btnAlmacenar"]))
		{
			$nombre = trim ($_POST["txtNombre"]);
			$paterno = trim ($_POST["txtPaterno"]);
			$materno = trim ($_POST["txtMaterno"]);
			
			$conexion = mysql_connect ('localhost','root','') 
			or die ("Imposible conectarse a la base de datos...");
			mysql_select_db("10mo",$conexion);
				
				$insertar = "Insert into usuario (nombre, apPaterno, apMaterno) values ('".$nombre."', '".$paterno."', '".$materno."')";
				$query = mysql_query($insertar);
				?>
				<script language="javascript" type="text/javascript">
                alert('Los datos fueron actualizados correctamente');
                </script>
                
                <?php
				
			
		}	
?>
</body>
</html>