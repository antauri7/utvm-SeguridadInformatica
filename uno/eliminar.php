<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Eliminar ::</title>
</head>

<body>
<a href="insert.php"> :: Insertar :: </a><br/>
<a href="modificar.php"> :: Modificar :: </a><br/>
<a href="#"> :: Consultar :: </a><br/>
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

<a style="font-size:24px; color:#009; text-align:center">Consultar y Eliminar</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td colspan="2">Actualizar Datos</td>
    </tr>
    <tr>
      <td width="94">Nombre</td>
      <td width="90"><label for="cbxNombre"></label>
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
      </select>        <label for="txtproducto">
        <input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar" />
      </label></td>
      
      <?php
	  	if(isset($_POST["btnBuscar"]))
		{
			$recNombre = trim ($_POST["cbxNombre"]);
			$query2="select * from usuario where nombre='".$recNombre."'";
			$resultado2=mysql_query ($query2);
			$renglon2 = mysql_fetch_array($resultado2);

			?>
            
            </tr>
    <tr>
      <td>ApPaterno</td>
      <td><label for="txttipo"></label>
      <input name="txtPaterno" type="text" id="txttipo" value="<?php echo $valor2 = $renglon2['apPaterno']; ?>" /></td>
    </tr>
    <tr>
      <td>ApMaterno</td>
      <td><label for="txtcantidad"></label>
      <input name="txtMaterno" type="text" id="txtcantidad" value="<?php echo $valor2 = $renglon2['apMaterno']; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar" /></td>
    </tr>
  </table>
  
  
  <?php } ?>
  
  
  

      
    
</form>
</body>
</html>