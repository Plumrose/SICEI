<?php
  session_start();
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
?>
<script language=javascript>
function datos(cod,nombre,tipo_serv,nomb_inst,modelo,serial,localidad,procesador,ram,hdd,serial_mon,Serial_teclad,Serial_mause,fecha_creado,fecha_mod,Creado_por,Mod_por,Descrip_serv,des_localidad,cod_unidad,des_unidad,grupo,estatus,fecha_compra,equipo_fisico,cod_software,nombre_sof){
  opener.document.form1.codigo_comp.value=cod;
  opener.document.form1.desc_comp.value=nombre;
  opener.document.form1.tipo_serv.value=tipo_serv;
  opener.document.form1.nomb_inst.value=nomb_inst;
  opener.document.form1.modelo.value=modelo;
  opener.document.form1.serial.value=serial;
  opener.document.form1.cod_localidad.value=localidad;
  opener.document.form1.procesador.value=procesador;
  opener.document.form1.RAM.value=ram;
  opener.document.form1.HDD.value=hdd;
  opener.document.form1.equipo_fisico.value=equipo_fisico;
  opener.document.form1.serial_mon.value=serial_mon;
  opener.document.form1.Serial_teclado.value=Serial_teclad;
  opener.document.form1.Serial_mause.value=Serial_mause;
  opener.document.form1.fecha_creado.value=fecha_creado;
  opener.document.form1.fecha_mod.value=fecha_mod;
  opener.document.form1.Creado_por.value=Creado_por;
  opener.document.form1.Mod_por.value=Mod_por;
  opener.document.form1.Descrip_serv.value=Descrip_serv;
  opener.document.form1.des_localidad.value=des_localidad;
  opener.document.form1.cod_unidad.value=cod_unidad;
  opener.document.form1.des_unidad.value=des_unidad;
  opener.document.form1.fecha_compra.value=fecha_compra;
  opener.document.form1.grupo.value=grupo;
  //opener.document.form1.estatus.value=estatus;
  opener.document.form1.estatus.selectedIndex=estatus;
  opener.document.form1.cod_software.value=cod_software;
  opener.document.form1.nombre_sof.value=nombre_sof;
   
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
	width:518px;
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
	width:517px;
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
	width:519px;
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
	left: 485px;
	top: 13px;
}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Servidores </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_servidores.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="519">
    <tr>
      <td width="136">&nbsp;</td>
      <td width="342">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Descripción',02=>'Código');
          foreach($opciones as $k=>$op) {
        ?>
        <option value="<?php echo $k; ?>" <?php if($tipo_objeto== $k) echo 'selected="selected"'?> > <?php echo $op; ?> </option>
        <?php } ?>
        
        ?>
      </select></td>
      <td><input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="35" maxlength="35" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " /></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="518" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
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
				$sql01="select cod_serv as cod_serv, desc_serv as desc_serv,nomb_serv as nomb_serv,serial_serv as 
 					serial_serv,fec_creado as fec_creado,usuario_creado as usuario_creado,status_serv as status_serv,cod_tipo_serv as 					cod_tipo_serv,cod_tipo_serv as cod_tipo_serv,cod_proce_serv as cod_proce_serv,ram as ram,hdd as hdd,disco as 
					disco, cod_localidad as cod_localidad,fec_modifi as fec_modifi, serial_mon as serial_mon, serial_tec as 
					serial_tec, serial_mou as serial_mou, ind_raid as ind_raid, modelo as modelo, grupo_servidor as grupo_servidor, 
					usuario_modifi as usuario_modifi, cod_unidad as cod_unidad, fecha_compra as fecha_compra, nombre_equipo_fisico as equipo_fisico,
					cod_software as cod_software from m_servidores order by cod_serv";		
			if($tipo_objeto=='01'){ 
					$sql01="select cod_serv as cod_serv, desc_serv as desc_serv,nomb_serv as nomb_serv,serial_serv as 
 					serial_serv,fec_creado as fec_creado,usuario_creado as usuario_creado,status_serv as status_serv,cod_tipo_serv as 					cod_tipo_serv,cod_tipo_serv as cod_tipo_serv,cod_proce_serv as cod_proce_serv,ram as ram,hdd as hdd,disco as 
					disco, cod_localidad as cod_localidad,fec_modifi as fec_modifi, serial_mon as serial_mon, serial_tec as 
					serial_tec, serial_mou as serial_mou, ind_raid as ind_raid, modelo as modelo, grupo_servidor as grupo_servidor, 
					usuario_modifi as usuario_modifi, cod_unidad as cod_unidad, fecha_compra as fecha_compra, nombre_equipo_fisico as equipo_fisico,
					cod_software as cod_software from 	m_servidores where desc_serv like 
					'%$nombre_busqueda%' order by cod_serv";		
	       }
		   if($tipo_objeto=='02'){ 	
					$sql01="select cod_serv as cod_serv, desc_serv as desc_serv,nomb_serv as nomb_serv,serial_serv as 
 					serial_serv,fec_creado as fec_creado,usuario_creado as usuario_creado,status_serv as status_serv,cod_tipo_serv as 					cod_tipo_serv,cod_tipo_serv as cod_tipo_serv,cod_proce_serv as cod_proce_serv,ram as ram,hdd as hdd,disco as 
					disco, cod_localidad as cod_localidad,fec_modifi as fec_modifi, serial_mon as serial_mon, serial_tec as 
					serial_tec, serial_mou as serial_mou, ind_raid as ind_raid, modelo as modelo, grupo_servidor as grupo_servidor, 
					usuario_modifi as usuario_modifi, cod_unidad as cod_unidad, fecha_compra as fecha_compra, nombre_equipo_fisico as equipo_fisico,
					cod_software as cod_software from m_servidores where cod_serv like 
					'%$nombre_busqueda%' order by cod_serv";		
           }	  
		   $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
				  $cod=$registro['cod_serv'];
				  $cod=str_replace(" ","&nbsp;",$cod);
                  $nombre=$registro['desc_serv'];
				  $nombre=str_replace(" ","&nbsp;",$nombre);
                  $estatus=$registro['status_serv'];
				  $estatus=str_replace(" ","&nbsp;",$estatus);
				  $tipo_serv=$registro['cod_tipo_serv'];
				  $tipo_serv=str_replace(" ","&nbsp;",$tipo_serv);
				  $nomb_inst=$registro['nomb_serv'];
				  $nomb_inst=str_replace(" ","&nbsp;",$nomb_inst);
				  $cod_software=$registro['cod_software'];
				  $cod_software=str_replace(" ","&nbsp;",$cod_software);
				  $modelo=$registro['modelo'];
				  $modelo=str_replace(" ","&nbsp;",$modelo);
				  $serial=$registro['serial_serv'];
				  $serial=str_replace(" ","&nbsp;",$serial);
				  $localidad=$registro['cod_localidad'];
				  $localidad=str_replace(" ","&nbsp;",$localidad);
				  $cod_unidad=$registro['cod_unidad'];
			  	  $equipo_fisico=$registro["equipo_fisico"];
				  $equipo_fisico=str_replace(" ","&nbsp;",$equipo_fisico);
				  $cod_unidad=str_replace(" ","&nbsp;",$cod_unidad);
				  $fecha_compra=$registro['fecha_compra'];
				  $fecha_compra=str_replace(" ","&nbsp;",$fecha_compra);
				  $procesador=$registro['cod_proce_serv'];
				  $procesador=str_replace(" ","&nbsp;",$procesador);
				  $ram=$registro['ram'];
				  $ram=str_replace(" ","&nbsp;",$ram);
				  $grupo=$registro['grupo_servidor'];
				  $grupo=str_replace(" ","&nbsp;",$grupo);
				  
				  $hdd=$registro['hdd'];
				  $hdd=str_replace(" ","&nbsp;",$hdd);
				  $serial_mon=$registro['serial_mon'];
				  $serial_mon=str_replace(" ","&nbsp;",$serial_mon);
				  $Serial_teclad=$registro['serial_tec'];
				  $Serial_teclad=str_replace(" ","&nbsp;",$Serial_teclad);
				  $Serial_mause=$registro['serial_mou'];
				  $Serial_mause=str_replace(" ","&nbsp;",$Serial_mause);
				  $ind_raid=$registro['ind_raid'];
				  $ind_raid=str_replace(" ","&nbsp;",$ind_raid);
				  $fecha_creado=$registro['fec_creado'];
				  $fecha_creado=str_replace(" ","&nbsp;",$fecha_creado);
				  $fecha_mod=$registro['fec_modifi'];
				  $fecha_mod=str_replace(" ","&nbsp;",$fecha_mod);
				  $Creado_por=$registro['usuario_creado'];
				  $Creado_por=str_replace(" ","&nbsp;",$Creado_por);
				  $Mod_por=$registro['usuario_modifi'];
				  $Mod_por=str_replace(" ","&nbsp;",$Mod_por);
				  $grupo=$registro['grupo_servidor'];
				  $grupo=str_replace(" ","&nbsp;",$grupo);
//                Busca la descripción del tipo de servidor
				  $sql2="select des_tipo_serv as des_tipo_serv from m_tipo_servidores where cod_tipo_serv='$tipo_serv'";
                  $resul=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $reg1=mysql_fetch_assoc($resul);
				  $Descrip_serv=$reg1['des_tipo_serv'];
				  $Descrip_serv=str_replace(" ","&nbsp;",$Descrip_serv);
//                Busca la descripción de la localidad
				  $sql03="select desc_localidad as desc_localidad from m_localidades where cod_localidad = '$localidad'";
                  $resul3=mysql_query($sql03,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
				  $reg3=mysql_fetch_assoc($resul3);
				  $des_localidad=$reg3['desc_localidad'];
				  $des_localidad=str_replace(" ","&nbsp;",$des_localidad);
//                Busca la descripción de la Unidad
				  $sql04="select desc_unidad as desc_unidad from m_unidad_org where cod_unidad = '$cod_unidad'";
                  $resul4=mysql_query($sql04,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
				  $reg4=mysql_fetch_assoc($resul4);
				  $des_unidad=$reg4['desc_unidad'];
				  $des_unidad=str_replace(" ","&nbsp;",$des_unidad);
//                Busca el nombre del sotfware
                  $sql2="select version as version from M_SOFTWARE where cod_software='$cod_software'";
                  $resul2=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL sql2".mysql_error());
                  $reg2=mysql_fetch_assoc($resul2);
                  $nombre_sof= $reg2["version"];
				  $nombre_sof=str_replace(" ","&nbsp;",$nombre_sof);
				  
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod','$nombre','$tipo_serv','$nomb_inst','$modelo','$serial','$localidad','$procesador','$ram','$hdd','$serial_mon','$Serial_teclad','$Serial_mause','$fecha_creado','$fecha_mod','$Creado_por','$Mod_por','$Descrip_serv','$des_localidad','$cod_unidad','$des_unidad','$grupo','$estatus','$fecha_compra','$equipo_fisico', '$cod_software', '$nombre_sof');\"><td>$cod</td><td>$nombre</td></tr>";		
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
