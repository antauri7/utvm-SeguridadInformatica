<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polybios</title>
</head>

<body>
<table width="200" border="1" align="center" bgcolor="#CCC" style="color:#F00; font-family:'Arial Black';">
  <tr>
    <th scope="col"><a href="index.php">Resgistrar</a></th>
    <th scope="col"><a href="#">Consultar</a></th>
  </tr>
</table>
<br/><br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table width="611" style="text-align:center; font-size:14px; font:Arial, Helvetica, sans-serif; color:#000" align="center" >
    <tr bgcolor="#0066FF">
      <td colspan="3" style="font-size:18px"> :: Polibyos :: </td>
    </tr>
    <tr bgcolor="#94D2EB">
      <td width="205" style="font-size:16px" >Usuario</td>
      <td width="216" style="font-size:16px">Sucesor</td>
      <td width="174" style="font-size:16px">Antecesor</td>
    </tr>
    <tr bgcolor="#C7EBFC">
      <td>
        <select name="cbxNombre" id="select">
          <option>- Seleccionar -</option>
           <?php
				$conexion = mysql_connect ('localhost','root','') 
				or die ("Imposible conectarse a la base de datos...");
				mysql_select_db("10mo",$conexion);
				
				$query = "select usuario from polibyosuser";
				$resultado = mysql_query ($query);
		
				if ($resultado)
				{
					while($renglon = mysql_fetch_array($resultado))
					{
						$valor = $renglon['usuario'];
						echo "<option value='$valor'> $valor </option> \n";
					}
				}
			?>
        </select>
        <input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar" />
      </td>
      <?php
	  	if(isset($_POST["btnBuscar"]))
		{
			$recNombre = trim ($_POST["cbxNombre"]);
			$query="select * from polibyosuser where usuario='".$recNombre."'";
			$resultado=mysql_query ($query);
			$renglon = mysql_fetch_array($resultado);
			
			/************************************************/
			$select = "select * from polibyosuser where usuario='".$recNombre."'";
			$querySelect = mysql_query($select);
			$valores = mysql_fetch_array ($querySelect);	
		
			$bin=$valores['password'];
			$nw="";
			$x=strlen($bin);
			
			
			for ( $i = 0 ; $i < $con ; $i ++) 
			{
				$imprime= substr($bin,$i,1);
				
				$select = "select letra from polibyos where cambio ='".$imprime."'";
				$query = mysql_query($select);
				
				while($renglon = mysql_fetch_array($query))
				{
					$nw = $nw.$renglon['cambio'];
				}
			}
			echo $nw;
			/************************************************/
		}

	  ?>
      <td>
      	<input type="text" name="txtSucesor" id="txtSucesor" value="<?php echo $valor = $renglon['password']; ?>" />
      </td>
      <td>
      	<input type="text" name="txtAntecesor" id="txtAntecesor" value="<?php if (isset($_POST["btnBuscar"])) { echo  $nw; } ?>" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>