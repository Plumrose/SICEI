<?php
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
	width:700px;
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
	width:700px;
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
	width:701px;
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
	left: 667px;
	top: 13px;
}
-->
</style>
</head>
<body>
<div style="width: 700px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
  <p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Componentes </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_componentes2.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="697">
    <tr>
      <td width="136">&nbsp;</td>
      <td width="342">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Descripción Componente',02=>'Código Componente');
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
    <table width="698" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="90" bgcolor="#003300"><div align="center"><span class="Estilo38">C&oacute;digo</span></div></td>
        <td width="380" bgcolor="#003300"><div align="center"><span class="Estilo38">Descripci&oacute;n</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion FROM m_componentes order by cod_comp";		         
		   if($tipo_objeto!=''){
		   	  if($tipo_objeto=='01'){ 
  		         if($nombre_busqueda==''){		
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion FROM m_componentes order by cod_comp";		         
				}else{
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion FROM m_componentes where desc_comp like 
					'%$nombre_busqueda%' order by cod_comp";		         
		         }	  
		      }
		   	  if($tipo_objeto=='02'){ 	
  		         if($nombre_busqueda==''){		
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion FROM m_componentes order by cod_comp";		         
		         }else{
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion FROM m_componentes where cod_comp = 
					'$nombre_busqueda' order by cod_comp";		         
		         }	  
		      }
           }
		   $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $i++;
				  $cod=$registro['cod_comp'];
				  $cod=str_replace(" ","&nbsp;",$cod);
                  $nombre=$registro['desc_comp'];
				  $nombre=str_replace(" ","&nbsp;",$nombre);
				  if ($registro['status_comp']=='01'){
				     $estatus='Activo';
				  }else{
				     $estatus='Inactivo';
				  }	 
				  $estatus=str_replace(" ","&nbsp;",$estatus);
				  $art=$registro['cod_grupo_art'];
				  $art=str_replace(" ","&nbsp;",$art);
				  $marca=$registro['cod_marca'];
				  $marca=str_replace(" ","&nbsp;",$marca);
				  $modelo=$registro['cod_modelo'];
				  $modelo=str_replace(" ","&nbsp;",$modelo);
				  $comp=$registro['cod_tipo'];
				  $comp=str_replace(" ","&nbsp;",$comp);
				  $velo=$registro['velocidad'];
				  $velo=str_replace(" ","&nbsp;",$velo);
				  $memo=$registro['memoria'];
				  $memo=str_replace(" ","&nbsp;",$memo);
				  $disco=$registro['disco'];
				  $disco=str_replace(" ","&nbsp;",$disco);
				  $procesa=$registro['cod_procesa'];
				  $procesa=str_replace(" ","&nbsp;",$procesa);
				  $fcreado=$registro['fec_creacion'];
				  $fcreado=str_replace(" ","&nbsp;",$fcreado);
				  $fmodi=$registro['fec_modif'];
				  $fmodi=str_replace(" ","&nbsp;",$fmodi);
				  $creadop=$registro['usuario_creacion'];
				  $creadop=str_replace(" ","&nbsp;",$creadop);
				  $modifip=$registro['usuario_modif'];
				  $modifip=str_replace(" ","&nbsp;",$modifip);
				  $sql2="select desc_tipo as desc_tipo from m_tipo_componente where cod_tipo='$comp'";
                  $sql3="select desc_procesa as desc_procesa from m_tipo_procesadores where cod_procesa='$procesa'";
                  $sql4="select desc_grupo_art as desc_grupo_art from m_grupo_articulos where cod_grupo_art='$art'";
                  $sql5="select desc_marca as desc_marca from m_marcas where cod_marca='$marca'";
                  $sql6="select desc_modelo as desc_modelo from m_modelos where cod_modelo='$modelo'";
                  $resultado1=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado2=mysql_query($sql3,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado3=mysql_query($sql4,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado4=mysql_query($sql5,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado5=mysql_query($sql6,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $registro1=mysql_fetch_assoc($resultado1);
				  $registro2=mysql_fetch_assoc($resultado2);
				  $registro3=mysql_fetch_assoc($resultado3);
				  $registro4=mysql_fetch_assoc($resultado4);
				  $registro5=mysql_fetch_assoc($resultado5);
				  $dart=$registro3['desc_grupo_art'];
				  $dart=str_replace(" ","&nbsp;",$dart);
				  $dmodelo=$registro5['desc_modelo'];
				  $dmodelo=str_replace(" ","&nbsp;",$dmodelo);
				  $dcomp=$registro1['desc_tipo'];
				  $dcomp=str_replace(" ","&nbsp;",$dcomp);
				  $dproce=$registro2['desc_procesa'];
				  $dproce=str_replace(" ","&nbsp;",$dproce);
				  $dmarca=$registro4['desc_marca'];
				  $dmarca=str_replace(" ","&nbsp;",$dmarca);
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod');\"><td>$cod</td><td>$nombre</td></tr>";		
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
function datos(cod){
  opener.document.form1.cod_comp.value=cod;
  window.close();
}
</script>
