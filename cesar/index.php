<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polibyos</title>
</head>
<?php 
	$conexion = mysql_connect ('localhost','root','') or die ("Imposible conectarse a la base de datos...");
	mysql_select_db("10mo",$conexion);
	session_start();
?>
<table width="200" border="1" align="center" bgcolor="#CCC" style="color:#F00; font-family:'Arial Black';">
  <tr>
    <th scope="col"><a href="#">Resgistrar</a></th>
    <th scope="col"><a href="desencriptar.php">Consultar</a></th>
  </tr>
</table>
<br /><br /><br /><br />
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" align="center" bgcolor="#EEEEEE">
    <tr>
      <th colspan="2" scope="col">Nuevo Usuario</th>
    </tr>
    <tr>
      <td>Usuario</td>
      <td><input type="text" name="txtUser" id="txtUser" /></td>
    </tr>
    <tr>
      <td>Contraseña</td>
      <td><input type="text" name="txtPass" id="txtPass" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="btnNuevo" id="btnNuevo" value="Nuevo" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php
if (isset($_POST["btnNuevo"]))
{
	$user = trim ($_POST["txtUser"]);
	$caracter = trim ($_POST["txtPass"]);
	
	$conver="";
	$con=strlen($caracter);
	
	for ( $i = 0 ; $i < $con ; $i ++) 
	{
		$imprime= substr($caracter,$i,1);
		
		$select = "select cesar from cesar where normal ='".$imprime."'";
		$query = mysql_query($select);
		
		while($renglon = mysql_fetch_array($query))
		{
			$conver = $conver.$renglon['cesar'];
		}
	}
	
	$insert = "insert into usercesar VALUES ('".$user."','".$conver."')";
	$quInsert = mysql_query ($insert) or die ("Error al insertar");
}
?>