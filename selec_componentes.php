<?php
  session_start();
  error_reporting(E_ERROR); //Oculta errores AR.
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
?>
<script language=javascript>
function datos(cod,nombre,estatus,art,marca,modelo,comp,velo,memo,disco,procesa,fcreado,fmodi,creadop,modifip,dart,dmodelo,dcomp,dproce,dmarca,cod_grupo,des_grupo,tipo,ind_serial,rvram,ram,flash,csociedad,dsociedad){
  opener.document.form1.codigo_comp.value=cod;
  opener.document.form1.desc_comp.value=nombre;
  opener.document.form1.estatus.value=estatus;
  opener.document.form1.grupo_art.value=art;
  opener.document.form1.cod_marca.value=marca;
  opener.document.form1.cod_modelo.value=modelo;
  opener.document.form1.tipo_comp.value=comp;
  opener.document.form1.velo_comp.value=velo;
  opener.document.form1.memo_comp.value=memo;
  opener.document.form1.disco.value=disco;
  opener.document.form1.procesa_comp.value=procesa;
  opener.document.form1.fecha_creado.value=fcreado;
  opener.document.form1.fecha_mod.value=fmodi;
  opener.document.form1.Creado_por.value=creadop;
  opener.document.form1.Mod_por.value=modifip;
  opener.document.form1.des_articulo.value=dart;
  opener.document.form1.des_marca.value=dmarca;
  opener.document.form1.des_modelo.value=dmodelo;
  opener.document.form1.des_tipo_comp.value=dcomp;
  opener.document.form1.des_procesa.value=dproce;
  opener.document.form1.cod_grupo.value=cod_grupo;
  opener.document.form1.des_grupo.value=des_grupo;
  opener.document.form1.ind_tipo.value=tipo;
  opener.document.form1.ind_serial.value=ind_serial;
  opener.document.form1.rvram.value=rvram;
  opener.document.form1.ram.value=ram;
  opener.document.form1.flash.value=flash;
  opener.document.form1.cod_sociedad.value=csociedad;
  opener.document.form1.des_sociedad.value=dsociedad;


  
  window.close();
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Informaci&oacute;n para Control de Equipos Informaticos</title>
<style type="text/css">

body {cursor: pointer}
#Layer1 {
	position:absolute;
	width:778px;
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
	width:780px;
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
	width:782px;
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
	left: 746px;
	top: 12px;
}

</style>
</head>
<body>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Componentes </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_componentes.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="776">
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
        <input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="50" maxlength="50" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " />
      </div></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="784" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
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
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion, grupo_comp as grupo_comp, tipo as tipo, 
					ind_serial as ind_serial, NVRAM as NVRAM, RAM as RAM, bytes_flash as bytes_flash, cod_sociedad as cod_sociedad FROM m_componentes order by cod_comp";		         
		   if($tipo_objeto!=''){
		   	  if($tipo_objeto=='01'){ 
  		         if($nombre_busqueda==''){		
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion, grupo_comp as grupo_comp, tipo as tipo, 
					ind_serial as ind_serial, NVRAM as NVRAM, RAM as RAM, bytes_flash as bytes_flash, cod_sociedad as cod_sociedad FROM  m_componentes order by cod_comp";		         
				}else{
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion, grupo_comp as grupo_comp, tipo as tipo, 
					ind_serial as ind_serial, NVRAM as NVRAM, RAM as RAM, bytes_flash as bytes_flash, cod_sociedad as cod_sociedad FROM m_componentes where desc_comp like '%$nombre_busqueda%' order by cod_comp";		         
		         }	  
		      }
		   	  if($tipo_objeto=='02'){ 	
  		         if($nombre_busqueda==''){		
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion, grupo_comp as grupo_comp, tipo as tipo,					 					ind_serial as ind_serial, NVRAM as NVRAM, RAM as RAM, bytes_flash as bytes_flash, cod_sociedad as cod_sociedad FROM m_componentes order by cod_comp";		         
		         }else{
                    $sql01="SELECT cod_comp as cod_comp, desc_comp as desc_comp,cod_grupo_art as cod_grupo_art,cod_marca as 
					cod_marca,cod_modelo as cod_modelo,fec_modif as fec_modif,usuario_modif as usuario_modif,status_comp as 
					status_comp,cod_tipo as cod_tipo,cod_procesa as cod_procesa,velocidad as velocidad,memoria as memoria,disco as 
					disco, fec_creacion as fec_creacion,usuario_creacion as usuario_creacion, grupo_comp as grupo_comp, tipo as tipo, 
					ind_serial as ind_serial, NVRAM as NVRAM, RAM as RAM, bytes_flash as bytes_flash, cod_sociedad as cod_sociedad FROM m_componentes where cod_comp like '%$nombre_busqueda%' order by cod_comp";		         
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
				  $ind_serial=$registro['ind_serial'];
				  $ind_serial=str_replace(" ","&nbsp;",$ind_serial);
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
				  $cod_grupo=$registro['grupo_comp'];
				  $cod_grupo=str_replace(" ","&nbsp;",$cod_grupo);
				  $tipo=$registro['tipo'];
				  $tipo=str_replace(" ","&nbsp;",$tipo);
				  $rvram= $registro["NVRAM"];
                  $ram= $registro["RAM"];
                  $flash= $registro["bytes_flash"];
                  $csociedad=$registro["cod_sociedad"];
                  $csociedad=str_replace(" ","&nbsp;",$csociedad);

				  $sql2="select desc_tipo as desc_tipo from m_tipo_componente where cod_tipo='$comp'";
                  $sql3="select desc_procesa as desc_procesa from m_tipo_procesadores where cod_procesa='$procesa'";
                  $sql4="select desc_grupo_art as desc_grupo_art from m_grupo_articulos where cod_grupo_art='$art'";
                  $sql5="select desc_marca as desc_marca from m_marcas where cod_marca='$marca'";
                  $sql6="select desc_modelo as desc_modelo from m_modelos where cod_modelo='$modelo'";
                  $sql7="select descripcion as descripcion  from m_grupo_componentes where grupo_comp='$cod_grupo'";
                  $sql8="select nombre_sociedad as nombre_sociedad  from m_sociedades where cod_sociedad='$cod_sociedad'";
                  $resultado1=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado2=mysql_query($sql3,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado3=mysql_query($sql4,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado4=mysql_query($sql5,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado5=mysql_query($sql6,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado7=mysql_query($sql7,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $resultado8=mysql_query($sql8,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $reg3=mysql_fetch_assoc($resultado8);
				  $des_sociedad=$reg3['nombre_sociedad'];
				  $des_sociedad=str_replace(" ","&nbsp;",$des_sociedad);
                  $registro1=mysql_fetch_assoc($resultado1);
				  $registro2=mysql_fetch_assoc($resultado2);
				  $registro3=mysql_fetch_assoc($resultado3);
				  $registro4=mysql_fetch_assoc($resultado4);
				  $registro5=mysql_fetch_assoc($resultado5);
				  $registro7=mysql_fetch_assoc($resultado7);
				  $registro8=mysql_fetch_assoc($resultado8);

				  
				

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
                  $des_grupo= $registro7["descripcion"]; 
                  //$dsociedad=$registro8["nom_sociedad"];
                  $dsociedad=str_replace(" ","&nbsp;",$dsociedad);

                  
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod','$nombre','$estatus','$art','$marca','$modelo','$comp','$velo','$memo','$disco','$procesa','$fcreado','$fmodi','$creadop','$modifip','$dart','$dmodelo','$dcomp','$dproce','$dmarca','$cod_grupo','$des_grupo','$tipo','$ind_serial','$rvram','$ram','$flash','$csociedad','$dsociedad');\"><td>$cod</td><td>$nombre</td></tr>";		
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
