<?php
  Include ("rutinasphp.php");
  session_start();
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
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
	width:783px;
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
	width:783px;
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
	width:587px;
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
	left: 747px;
	top: 0px;
}
-->
</style>
</head>
<body>

<div style="width: 800px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Software </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_software.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="780">
    <tr>
      <td width="173">&nbsp;</td>
      <td width="477">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Código Software',02=>'Versión Software');
          foreach($opciones as $k=>$op) {
        ?>
        <option value="<?php echo $k; ?>" <?php if($tipo_objeto== $k) echo 'selected="selected"'?> > <?php echo $op; ?> </option>
        <?php } ?>
        
        ?>
      </select></td>
      <td><div align="right">
        <input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="35" maxlength="35" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " />
      </div></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="786" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="66" height="35" bgcolor="#003300"><span class="Estilo38">C&oacute;digo</span></td>
        <td width="273" bgcolor="#003300"><span class="Estilo38">Tipo</span></td>
        <td width="291" bgcolor="#003300"><span class="Estilo38">Versi&oacute;n</span></td>
        <td width="128" bgcolor="#003300"><div align="left"><span class="Estilo38">Estatus </span></div></td>
      </tr>
        <?php
          //CONECTAR CON LA BASE DE DATOS DE MYSQL
          $conectar=conectar_BD();
          $sql01="select cod_software as cod_software, version as version, estatus as estatus, descripcion as 
		  descripcion, m_software.tipo_software as tipo_software from m_software, M_TIPO_SOFTWARE where 
		  m_software.tipo_software 
		  = M_TIPO_SOFTWARE.tipo_software";
//        Código 		   
       	   if($tipo_objeto=='01'){ 
              $sql01="select cod_software as cod_software, version as version, estatus as estatus, descripcion as 
		      descripcion, m_software.tipo_software as tipo_software  from m_software, M_TIPO_SOFTWARE where 
			  m_software.tipo_software = M_TIPO_SOFTWARE.tipo_software and cod_software like '%$nombre_busqueda%'";
           }
//         Versión			  
		   if($tipo_objeto=='02'){ 
              $sql01="select cod_software as cod_software, version as version, estatus as estatus, descripcion as 
		      descripcion, m_software.tipo_software as tipo_software  from m_software, M_TIPO_SOFTWARE where 
			  m_software.tipo_software = M_TIPO_SOFTWARE.tipo_software and version like '%$nombre_busqueda%'";
           }
           $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)){ 
				  $cod_software=$registro['cod_software'];
				  $cod_software=str_replace(" ","&nbsp;",$cod_software);
				  $version=$registro['version'];
				  $version=str_replace(" ","&nbsp;",$version);
				  $tipo_software=$registro['tipo_software'];
				  $tipo_software=str_replace(" ","&nbsp;",$tipo_software);
				  $tipo=$registro['descripcion'];
				  $tipo=str_replace(" ","&nbsp;",$tipo);
				  $estatus=$registro['estatus'];
				  $estatus=str_replace(" ","&nbsp;",$estatus);
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
				  OnClick=\"datos('$cod_software','$tipo_software','$version','$estatus','$tipo');\"><td>$cod_software</td> <td>$tipo</td><td>$version</td><td>$estatus</td></tr>";		
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
function datos(cod_software,tipo_software,version,estatus,$tipo){
  opener.document.form1.cod_soft.value=cod_software;
  opener.document.form1.codigo.value=tipo_software;
  opener.document.form1.version.value=version;
  opener.document.form1.estatus.value=estatus;
  opener.document.form1.nombre.value=$tipo;
  window.close();
}
</script>
