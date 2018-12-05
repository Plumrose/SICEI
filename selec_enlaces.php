<?php
  session_start();
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
?>
<script language=javascript>
function datos(numero_enlace,nombre_enlace,estat,tipo_enlace,acceso,cir,cto,localidad,cod_unidad,pvc,dlci,rif_prov,uso_enlace,fecha_creacion,fecha_cambio,user_creacion,user_cambio,des_prov,des_localidad,cod_unidad,des_unidad){
  

  if(opener.document.form1.nombre_enlace != null){
  	opener.document.form1.nombre_enlace.value=nombre_enlace;
  }
  if(opener.document.form1.numero_enlace != null){
  	opener.document.form1.numero_enlace.value=numero_enlace;
  }

  if(opener.document.form1.estatus != null){
  	opener.document.form1.estatus.selectedIndex=estat;
  }
  if(opener.document.form1.tipo_enlace != null){
  	opener.document.form1.tipo_enlace.selectedIndex=tipo_enlace;
  }
  if(opener.document.form1.uso != null){
  	opener.document.form1.uso.selectedIndex=uso_enlace;
  }
  opener.document.form1.acceso.value=acceso;
  opener.document.form1.cir.value=cir;
  opener.document.form1.cod_localidad.value=localidad;
  opener.document.form1.cto.value=cto;
  opener.document.form1.pvc.value=pvc;
  opener.document.form1.dlci.value=dlci;
  opener.document.form1.codigo_prov.value=rif_prov;
  opener.document.form1.fecha_creado.value=fecha_creacion;
  opener.document.form1.fecha_mod.value=fecha_cambio;
  opener.document.form1.creado_por.value=user_creacion;
  opener.document.form1.mod_por.value=user_cambio;
  opener.document.form1.des_prov.value=des_prov;
  opener.document.form1.des_localidad.value=des_localidad;
  opener.document.form1.cod_unidad.value=cod_unidad;
  opener.document.form1.des_unidad.value=des_unidad;
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
	width:905px;
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
	width:905px;
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
	width:904px;
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
    <p class="Estilo41">Listado de Enlaces </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_enlaces.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="899">
    <tr>
      <td width="136">&nbsp;</td>
      <td width="342">&nbsp;</td>
      </tr>
    <tr>
      <td><div align="right">
        <select name="tipo_objeto" size="1" id="tipo_objeto" >
          <?php
          $opciones = array(01=>'Descripción              ',02=>'Código               ');
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
    <table width="903" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="75" bgcolor="#003300"><div align="center"><span class="Estilo38">C&oacute;digo</span></div></td>
        <td width="212" bgcolor="#003300"><span class="Estilo38">Descripci&oacute;n Enlace </span></td>
        <td width="301" bgcolor="#003300"><span class="Estilo38">Unidad Organizativa </span></td>
        <td width="287" bgcolor="#003300"><div align="left"><span class="Estilo38">Localidad</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
             Include ("rutinasphp.php");
	  		 $conectar=conectar_BD();
		   // SQL		
               $sql02="select  numero_enlace as numero_enlace, nombre_enlace as nombre_enlace, tipo_enlace as tipo_enlace, acceso as acceso,
			   cir as cir, cto as cto, pvc as pvc, dlci_vlan as dlci, rif_prov as rif_prov, cod_localidad as cod_localidad, usos_enlaces as               uso_enlace, cod_unidad as cod_unidad, estatus as estatus, fecha_creacion as fecha_creacion, fecha_cambio as fecha_cambio,  
			   user_creacion as  user_creacion, user_cambio as user_cambio from t_enlaces  order by numero_enlace";
			if($tipo_objeto=='01'){ 
               $sql02="select  numero_enlace as numero_enlace, nombre_enlace as nombre_enlace, tipo_enlace as tipo_enlace, acceso as acceso,
			   cir as cir, cto as cto, pvc as pvc, dlci_vlan as dlci, rif_prov as rif_prov, cod_localidad as cod_localidad, usos_enlaces as               uso_enlace, cod_unidad as cod_unidad, estatus as estatus, fecha_creacion as fecha_creacion, fecha_cambio as fecha_cambio,  
			   user_creacion as  user_creacion, user_cambio as user_cambio from t_enlaces where nombre_enlace like 
				'%$nombre_busqueda%' order by numero_enlace";
	       }
		   if($tipo_objeto=='02'){ 	
               $sql02="select  numero_enlace as numero_enlace, nombre_enlace as nombre_enlace, tipo_enlace as tipo_enlace, acceso as acceso,
			   cir as cir, cto as cto, pvc as pvc, dlci_vlan as dlci, rif_prov as rif_prov, cod_localidad as cod_localidad, usos_enlaces as               uso_enlace, cod_unidad as cod_unidad, estatus as estatus, fecha_creacion as fecha_creacion, fecha_cambio as fecha_cambio,  
			   user_creacion as  user_creacion, user_cambio as user_cambio from t_enlaces  where numero_enlace like 
				'%$nombre_busqueda%' order by numero_enlace";
           }	  
		   $resultado=mysql_query($sql02,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
				  $numero_enlace=$registro['numero_enlace'];
				  $numero_enlace=str_replace(" ","&nbsp;",$numero_enlace);
                  $nombre_enlace=$registro['nombre_enlace'];
				  $nombre_enlace=str_replace(" ","&nbsp;",$nombre_enlace);
                  $estatus=$registro['estatus'];
				  $estatus=str_replace(" ","&nbsp;",$estatus);
				  $tipo_enlace=$registro['tipo_enlace'];
				  $tipo_enlace=str_replace(" ","&nbsp;",$tipo_enlace);
				  $acceso=$registro['acceso'];
				  $acceso=str_replace(" ","&nbsp;",$acceso);
				  $cir=$registro['cir'];
				  $cir=str_replace(" ","&nbsp;",$cir);
				  $cto=$registro['cto'];
				  $cto=str_replace(" ","&nbsp;",$cto);
				  $localidad=$registro['cod_localidad'];
				  $localidad=str_replace(" ","&nbsp;",$localidad);
				  $cod_unidad=$registro['cod_unidad'];
				  $cod_unidad=str_replace(" ","&nbsp;",$cod_unidad);
				  $pvc=$registro['pvc'];
				  $pvc=str_replace(" ","&nbsp;",$pvc);
				  $dlci=$registro['dlci'];
				  $dlci=str_replace(" ","&nbsp;",$dlci);
				  $rif_prov=$registro['rif_prov'];
				  $rif_prov=str_replace(" ","&nbsp;",$rif_prov);
				  $uso_enlace=$registro['uso_enlace'];
				  $uso_enlace=str_replace(" ","&nbsp;",$uso_enlace);
				  $fecha_creacion=$registro['fecha_creacion'];
				  $fecha_creacion=str_replace(" ","&nbsp;",$fecha_creacion);
				  $fecha_cambio=$registro['fecha_cambio'];
				  $fecha_cambio=str_replace(" ","&nbsp;",$fecha_cambio);
				  $user_creacion=$registro['user_creacion'];
				  $user_creacion=str_replace(" ","&nbsp;",$user_creacion);
				  $user_cambio=$registro['user_cambio'];
				  $user_cambio=str_replace(" ","&nbsp;",$user_cambio);
//                Busca la descripción del proveedor
				  $sql2="select den_prov as den_prov from m_proveedores where rif_prov = '$rif_prov'";				  
                  $resul=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $reg1=mysql_fetch_assoc($resul);
				  $des_prov=$reg1['den_prov'];
				  $des_prov=str_replace(" ","&nbsp;",$des_prov);
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
                 
				  echo "<tr OnMouseOver='Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);'  OnClick=\"datos('$numero_enlace','$nombre_enlace','$estatus','$tipo_enlace','$acceso','$cir','$cto','$localidad','$cod_unidad','$pvc','$dlci','$rif_prov','$uso_enlace','$fecha_creacion','$fecha_cambio','$user_creacion','$user_cambio','$des_prov','$des_localidad','$cod_unidad','$des_unidad');\"><td>$numero_enlace</td><td>$nombre_enlace</td><td>$des_unidad</td><td>$des_localidad</td></tr>";		
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
