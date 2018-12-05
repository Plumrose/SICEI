<?php
  session_start();
  error_reporting(E_ERROR);
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
?>
<script language=javascript>
function datos(dunidad,dgerencia,cunidad,cgerencia){
  opener.document.form1.des_unidad.value=dunidad;
  opener.document.form1.Des_gerencia.value=dgerencia;
  opener.document.form1.Cod_unidad.value=cunidad;
  opener.document.form1.Cod_gerencia.value=cgerencia;
  window.close();
}
</script>
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
	width:673px;
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
	width:673px;
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
	width:673px;
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
	left: 638px;
	top: 1px;
}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Estructura Organizativa  </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_estructura.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="673">
    <tr>
      <td width="136">&nbsp;</td>
      <td width="342">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Código Unidad Organizativa',02=>'Nombre Gerencia Organizativa');
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
    <table width="671" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="268" bgcolor="#003300"><div align="center"><span class="Estilo38">Unidad</span></div></td>
        <td width="234" bgcolor="#003300"><div align="center"><span class="Estilo38">Gerencia</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
               $sql01="select m_unidad_org.desc_unidad as desc_unidad, m_jerarquia_org.desc_gerencia as desc_gerencia, 
			   m_jerarquia_org.cod_unidad as cod_unidad, m_jerarquia_org.cod_gerencia as cod_gerencia from m_jerarquia_org, m_unidad_org 
			   where  m_jerarquia_org.cod_unidad = m_unidad_org.cod_unidad ";
		   	  if($tipo_objeto=='01'){ 
               $sql01="select m_unidad_org.desc_unidad as desc_unidad, m_jerarquia_org.desc_gerencia as desc_gerencia, 
			   m_jerarquia_org.cod_unidad as cod_unidad, m_jerarquia_org.cod_gerencia as cod_gerencia from m_jerarquia_org, m_unidad_org 
			   where  m_jerarquia_org.cod_unidad = m_unidad_org.cod_unidad and m_jerarquia_org.cod_unidad like '%$nombre_busqueda%'";
		      }
		   	  if($tipo_objeto=='02'){ 	
               $sql01="select m_unidad_org.desc_unidad as desc_unidad, m_jerarquia_org.desc_gerencia as desc_gerencia, 
			   m_jerarquia_org.cod_unidad as cod_unidad, m_jerarquia_org.cod_gerencia as cod_gerencia from m_jerarquia_org, m_unidad_org 
			   where  m_jerarquia_org.cod_unidad = m_unidad_org.cod_unidad and m_jerarquia_org.desc_gerencia like '%$nombre_busqueda%'";
		      }
              $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
              if(mysql_num_rows($resultado)>0) 
	          {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $i++;
				  $dunidad=$registro['desc_unidad'];
				  $dunidad=str_replace(" ","&nbsp;",$dunidad);
                  $dgerencia=$registro['desc_gerencia'];
				  $dgerencia=str_replace(" ","&nbsp;",$dgerencia);
				  $cunidad=$registro['cod_unidad'];
				  $cunidad=str_replace(" ","&nbsp;",$cunidad);
                  $cgerencia=$registro['cod_gerencia'];
				  $cgerencia=str_replace(" ","&nbsp;",$cgerencia);
				  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
				  OnClick=\"datos('$dunidad','$dgerencia','$cunidad','$cgerencia');\"><td>$dunidad</td><td>$dgerencia</td></tr>";
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
</body>
</html>
