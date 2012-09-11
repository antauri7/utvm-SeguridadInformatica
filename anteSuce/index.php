<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Antecesor Sucesor</title>
<style>
table
{
	color:#000;
	background-color:#B4E7FA;
	font-family:"Arial";
}
form
{
	margin-top:40px;
}
</style>
</head>

<body>
<table width="200" border="1" align="center" bgcolor="#CCC" style="color:#F00; font-family:'Arial Black';">
  <tr>
    <th scope="col"><a href="#">Resgistrar</a></th>
    <th scope="col"><a href="desencriptar.php">Consultar</a></th>
  </tr>
</table>
<br/><br/><br/>
  <form id="frmNvoUser" name="frmNvoUser" method="post" action="">
    <table width="281" border="0" align="center">
      <tr>
        <td colspan="2" align="center">Agregar Usuario</td>
      </tr>
      <tr>
        <td width="114"> User:</td>
        <td width="151"><input style="border-bottom-right-radius: 20px" type="text" name="txtUser" id="txtUser" /></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input style="border-bottom-right-radius: 20px" type="text" name="txtPass1" id="txtPass1" /></td>
      </tr>
      <tr>
        <td>Rep. Password: </td>
        <td><input style="border-bottom-right-radius: 20px" type="text" name="txtPass2" id="txtPass2" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input style="color:#FFF; background-color:#06F; font-size:16px; border:none" type="submit" name="btnRegistro" id="btnRegistro" value="Registrar" /></td>
      </tr>
    </table>
    <br/>
  </form>
  </body>
</html>

<?php
if(isset($_POST["btnRegistro"]))
{
	$user = trim($_POST["txtUser"]);
	$pass1 = trim($_POST["txtPass1"]);
	$pass2 = trim($_POST["txtPass2"]);
	
	if($pass1 == $pass2)
	{
		$count=strlen($pass1);
		$canv="";
		for ( $a = 0 ; $a < $count ; $a ++) 
		{
			$letra= ord(substr($pass1,$a,1));
			$canv=$canv.chr($letra+1);
		}
		$conexion = mysql_connect ('localhost','root','') 
			or die ("Imposible conectarse a la base de datos...");
			mysql_select_db("10mo",$conexion);
			session_start();
		
		$Insertar="insert into anteSuce (usuario, password) Values ('".$user."','".$canv."')";
		mysql_query($Insertar);
		?>
			<script language="javascript" type="text/javascript">
                alert('Felicidades, ahora te encuentras registrado...');
			</script>	
		<?php
	}
	else
	{
		?>
			<script language="javascript" type="text/javascript">
                alert('Las contraseñas no coinciden, por favor verifica tus datos');
			</script>	
		<?php
	}
}
?>