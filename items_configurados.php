<?php
// Toma el valor del número de Solicitud
  session_start();
  $gv_flag = '0';
  $varri=$_GET['var'];
  if($varri!=''){
    $_SESSION['numsolicitud']=$varri;
  }	 
  $solicitud=$_SESSION['numsolicitud'];
//---------------------------------------------------------------------------
//CONECTAR CON LA BASE DE DATOS DE MYSQL
$conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
die("Problemas  con la conexión a la base de datos");
mysql_select_db('siceiplum',$conectar) or die("ERROR con la base de datos");
$sql30="select * from t_cab_solicitud where  num_solic = '$solicitud'"; 	
$resul30=mysql_query($sql30,$conectar) or die("Problemas en la Sentencia SQL 2. ".mysql_error());
if(mysql_num_rows($resul30)==0){
   mysql_close($conectar);
   ?>
   <script>
   alert('Nro. de Solicitud no Existe en la Base de Datos');
   window.close();
  </script>
   <?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Informaci&oacute;n para Control de Equipos Informaticos</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:661px;
	height:35px;
	z-index:17;
	left: 2px;
	top: 12px;
	background-color: #FFFFFF;
}
#botonera {	position:absolute;
	width:137px;
	height:77px;
	z-index:17;
	left: 6px;
	top: -123px;
	background-color: #FFFFFF;
}
#Layer2 {
	position:absolute;
	width:52px;
	height:55px;
	z-index:18;
	left: 153px;
	top: 15px;
}
#Layer3 {
	position:absolute;
	width:39px;
	height:43px;
	z-index:1;
}
#Layer17 {
	position:absolute;
	width:49px;
	height:48px;
	z-index:1;
}
#busqueda {
	position:absolute;
	width:663px;
	height:46px;
	z-index:19;
	left: 1px;
	top: 49px;
	background-color: #C9E99E;
}
#Layer60 {
	position:absolute;
	width:139px;
	height:48px;
	z-index:20;
	left: 11px;
	top: 66px;
	background-color: #FFFFFF;
}
body {
	background-color: #F4FEE9;
}
.Estilo28 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: normal;
	color: #003300;
}
#resultado {
	position:absolute;
	width:662px;
	height:265px;
	z-index:1;
	left: -1px;
	top: 48px;
}
.Estilo38 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#Layer62 {	position:absolute;
	width:173px;
	height:28px;
	z-index:14;
	left: 851px;
	top: 2px;
}
.Estilo45 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF;}
#Layer4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:20;
}
.Estilo50 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; color: #CC3300; }
.Estilo54 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #CC3300; font-size: 12px; }
.Estilo8 {color: #993300;
	font-size: 12px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
#Layer65 {	position:absolute;
	width:34px;
	height:33px;
	z-index:24;
	left: 625px;
	top: 13px;
}
#Layer5 {
	position:absolute;
	width:115px;
	height:32px;
	z-index:25;
	left: 362px;
	top: 14px;
}
#Layer6 {
	position:absolute;
	width:21px;
	height:17px;
	z-index:1;
	left: 12px;
	top: 11px;
}
#Layer7 {
	position:absolute;
	width:70px;
	height:75px;
	z-index:25;
	left: 62px;
	top: 72px;
}
#Layer8 {
	position:absolute;
	width:24px;
	height:22px;
	z-index:25;
	left: 51px;
	top: 11px;
}
.Estilo41 {	color: #009900;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div style="width: 660px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<div id="Layer65"><a href="regresar.php"><img src="imagenes/salirsistema.jpg" alt="regresar" width="29" height="29" border="0" longdesc="regresar" /></a></div>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1"><span class="Estilo8">
  <?php 
  	  echo 'Solicitud Nro: '.$solicitud."\n";
	  ?>
</span></div>
<form id="form1" name="form1" method="post" action="items_solicitud.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
<div id="layer">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Lista de Componentes Asignados </p>
  </div>
</div>
<div id="resultado">
    <table width="664" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      
      <tr>
        <td width="45" height="34" bgcolor="#3E5B15"><div align="center"><span class="Estilo38">Items</span></div></td>
        <td width="80" bgcolor="#3E5B15"><div align="left"><span class="Estilo38">Componente</span></div></td>
        <td width="306" bgcolor="#3E5B15" class="Estilo45"><span class="Estilo38">Descripci&oacute;n</span></td>
        <td width="128" bgcolor="#3E5B15"><span class="Estilo38">N&uacute;mero Serial </span></td>
        <td width="71" bgcolor="#3E5B15"><div align="left"><span class="Estilo38">Cantidad</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
           $sql01="select cod_comp as cod_comp, items as items, num_serial as num_serial,cant_conf as cant_conf from 
		   t_solicitud_confirmadas where num_solic = $solicitud and ind_asignado<>'1'"; 	           
		   $res=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($res)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($res)) 
              { 
				  $items=$registro['items'];
				  $items=str_replace(" ","&nbsp;",$items);
				  $cod_comp=$registro['cod_comp'];
				  $cod_comp=str_replace(" ","&nbsp;",$cod_comp);
				  $num_serial=$registro['num_serial'];
				  $num_serial=str_replace(" ","&nbsp;",$num_serial);
				  $cantidad=$registro['cant_conf'];
				  $cantidad=str_replace(" ","&nbsp;",$cantidad);
                  $sql2="select desc_comp as desc_comp from m_componentes where 
				  cod_comp='$cod_comp'";		
				  $resultado1=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $registro1=mysql_fetch_assoc($resultado1);
				  $desc=$registro1['desc_comp'];
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
				  OnClick=\"datos('$cod_comp','$num_serial','$cantidad');\"><td>$items
				  </td><td>$cod_comp</td><td>$desc</td><td>$num_serial</td><td>$cantidad</td></tr>";		
		    }
		   }
		   ?>
    </table>
    </div>
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</div>
</body>
</html>
<script type="text/JavaScript">
function datos(cod_comp,nro_serial,cantidad){
  opener.document.form1.cod_comp.value=cod_comp;
  opener.document.form1.nro_serial.value=nro_serial;
  window.close();
}
</script>
