<?php
// Toma el valor de las variables
  session_start();
  $gv_flag = '0';
  $varri=$_GET['var'];
  if($varri!=''){
    $_SESSION['codigo_unidad']=$varri;
  }	 
  $codi_unidad=$_SESSION['codigo_unidad'];
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
//CONECTAR CON LA BASE DE DATOS DE MYSQL
  $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
  die("Problemas  con la conexión a la base de datos");
  mysql_select_db('siceiplum',$conectar) or die("ERROR con la base de datos");
  $sql1="select desc_unidad as desc_unidad from M_UNIDAD_ORG where cod_unidad='$codi_unidad'";
  $resul1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
  if(mysql_num_rows($resul1)>0) {
     $reg1=mysql_fetch_assoc($resul1);
     $des_unidad=$reg1["desc_unidad"];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Informaci&oacute;n para Control de Equipos Informaticos</title>
<style type="text/css">
<!--
body {cursor: pointer}
#Layer1 {
	position:absolute;
	width:667px;
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
	width:667px;
	height:56px;
	z-index:19;
	left: 1px;
	top: 49px;
	background-color: #D5EDB3;
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
	width:668px;
	height:265px;
	z-index:1;
	left: -1px;
}
.Estilo38 {color: #FFFFFF; font-weight: bold; font-family: "Courier New", Courier, monospace; }
.Estilo41 {
	color: #009900;
	font-weight: bold;
}
#Layer65 {position:absolute;
	width:34px;
	height:33px;
	z-index:24;
	left: 631px;
	top: 1px;
}
.Estilo8 {color: #993300;
	font-size: 12px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body>
<div style="width: 650px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41"><span class="Estilo41">
      <?php 
  	  echo 'GERENCIAS ORGANIZATIVAS   : '.$des_unidad."\n";
	  ?>
    </span></p>
    </div>
</div>
<form id="form1" name="form1" method="post" action="selec_estructura2.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="663">
    <tr>
      <td width="200">&nbsp;</td>
      <td width="451">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Código Gerencia',02=>'Descripción Gerencia');
          foreach($opciones as $k=>$op) {
        ?>
        <option value="<?php echo $k; ?>" <?php if($tipo_objeto== $k) echo 'selected="selected"'?> > <?php echo $op; ?> </option>
        <?php } ?>
        
        ?>
      </select></td>
      <td>
        <div align="left">
          <input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="45" maxlength="35" />
          <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " />
          </div></td></tr>
  </table>
  <div id="resultado">
    <table width="664" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="157" bgcolor="#003300"><div align="center"><span class="Estilo38">Unidad</span></div></td>
        <td width="491" bgcolor="#003300"><div align="center"><span class="Estilo38">Gerencia</span></div></td>
      </tr>
        <?php
               $sql01="select desc_gerencia as desc_gerencia, cod_gerencia as cod_gerencia from m_jerarquia_org where 
			   cod_unidad = $codi_unidad order by cod_gerencia";
		   	  if($tipo_objeto=='01'){ 
                 $sql01="select desc_gerencia as desc_gerencia, cod_gerencia as cod_gerencia from m_jerarquia_org where 
 	  		     cod_unidad = $codi_unidad and cod_gerencia like '%$nombre_busqueda%'";
		      }
		   	  if($tipo_objeto=='02'){ 	
                 $sql01="select desc_gerencia as desc_gerencia, cod_gerencia as cod_gerencia from m_jerarquia_org where 
 	  		     cod_unidad = $codi_unidad and desc_gerencia like '%$nombre_busqueda%'";
		      }
              $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
              if(mysql_num_rows($resultado)>0) 
	          {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $dgerencia=$registro['desc_gerencia'];
				  $dgerencia=str_replace(" ","&nbsp;",$dgerencia);
                  $cgerencia=$registro['cod_gerencia'];
				  $cgerencia=str_replace(" ","&nbsp;",$cgerencia);
				  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
				  OnClick=\"datos('$dgerencia','$cgerencia');\"><td>$cgerencia</td><td>$dgerencia</td></tr>";
   		      }
		   } 
           mysql_close($conectar);
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
<script language=javascript>
function datos(dgerencia,cgerencia){
  opener.document.form1.Des_gerencia.value=dgerencia;
  opener.document.form1.Cod_gerencia.value=cgerencia;
  window.close();
}
</script>
