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
	width:779px;
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
	width:779px;
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
	width:779px;
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
	left: 743px;
	top: 1px;
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
    <p class="Estilo41">Listado de Equipos Instalados </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_equipos.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="780">
    <tr>
      <td width="173">&nbsp;</td>
      <td width="477">&nbsp;</td>
      </tr>
    <tr>
      <td><div align="right">
        <select name="tipo_objeto" size="1" id="tipo_objeto" >
          <?php
          $opciones = array(01=>'Nombre del Equipo',02=>'Número Configuración');
          foreach($opciones as $k=>$op) {
        ?>
          <option value="<?php echo $k; ?>" <?php if($tipo_objeto== $k) echo 'selected="selected"'?> > <?php echo $op; ?> </option>
          <?php } ?>
          
        
        ?>
        </select>
      </div></td>
      <td><div align="right">
        <input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="35" maxlength="35" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " />
      </div></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="778" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="121" height="35" bgcolor="#003300"><span class="Estilo38">Nombre del Equipo </span></td>
        <td width="143" bgcolor="#003300"><span class="Estilo38">N&uacute;mero Configuraci&oacute;n </span></td>
        <td width="243" bgcolor="#003300"><span class="Estilo38">Unidad Organizativa </span></td>
        <td width="243" bgcolor="#003300"><div align="left"><span class="Estilo38">Asignado a </span></div></td>
      </tr>
        <?php
          //CONECTAR CON LA BASE DE DATOS DE MYSQL
          $conectar=conectar_BD();
          $sql01="select num_conf as num_conf, nom_equipo as nom_equipo, m_solicitantes.nomb_sol as nomb_sol,  
		  m_unidad_org.desc_unidad as desc_unidad 
		  from t_conf_equipos, m_solicitantes, m_unidad_org 
		  where t_conf_equipos.cod_sol  = m_solicitantes.cod_sol  and m_solicitantes.cod_unidad = 
		   m_unidad_org.cod_unidad GROUP BY num_conf, nom_equipo";
//        Nombre Equipo		   
       	   if($tipo_objeto=='01'){ 
              $sql01="select num_conf as num_conf, nom_equipo as nom_equipo, m_solicitantes.nomb_sol as nomb_sol, 
			  m_unidad_org.desc_unidad as desc_unidad from t_conf_equipos, 
		      m_solicitantes, m_unidad_org where t_conf_equipos.cod_sol  = m_solicitantes.cod_sol  and 
			  m_solicitantes.cod_unidad =  m_unidad_org.cod_unidad and nom_equipo like '%$nombre_busqueda%' GROUP BY num_conf, nom_equipo";
           }
//         Número de configuración	  
		   if($tipo_objeto=='02'){ 
              $sql01="select num_conf as num_conf, nom_equipo as nom_equipo, m_solicitantes.nomb_sol as nomb_sol, 
			  m_unidad_org.desc_unidad as desc_unidad from t_conf_equipos, 
		      m_solicitantes, m_unidad_org where t_conf_equipos.cod_sol  = m_solicitantes.cod_sol  and 
			  m_solicitantes.cod_unidad =  m_unidad_org.cod_unidad and num_conf like '%$nombre_busqueda%' GROUP BY num_conf, nom_equipo";
           }
           $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)){ 
				  $num_conf=$registro['num_conf'];
				  $num_conf=str_replace(" ","&nbsp;",$num_conf);
				  $nom_equipo=$registro['nom_equipo'];
				  $nom_equipo=str_replace(" ","&nbsp;",$nom_equipo);
				  $nomb_sol=$registro['nomb_sol'];
				  $nomb_sol=str_replace(" ","&nbsp;",$nomb_sol);
				  $desc_unidad=$registro['desc_unidad'];
				  $desc_unidad=str_replace(" ","&nbsp;",$desc_unidad);
//                Verifica si no esta desincorporado  a fin de excluirlo
			      $sql04="select * from t_asignacion_equipos where NUM_CONF = '$num_conf'  AND NOM_EQUIPO = '$nom_equipo' AND STATUS = ''";
                  $resul04=mysql_query($sql04,$conectar) or die("Problemas en la Sentencia SQL 04".mysql_error());
                  if(mysql_num_rows($resul04)>0) {
                    echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
	  			  OnClick=\"datos('$nom_equipo','$num_conf','$desc_unidad','$nomb_sol');\"><td>$nom_equipo</td> <td>$num_conf</td>
				  <td>$desc_unidad</td><td>$nomb_sol</td></tr>";		
				 } 
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
function datos(nom_equipo,num_conf,desc_unidad,nomb_sol){
  opener.document.form1.nom_equipo.value=nom_equipo;
  opener.document.form1.num_conf.value=num_conf;
  opener.document.form1.asignado.value=nomb_sol;
  opener.document.form1.unidad.value=desc_unidad;
  window.close();
}
</script>
