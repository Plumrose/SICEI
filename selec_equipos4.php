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
	width:1136px;
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
	width:1140px;
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

<div style="width: 900px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Componentes Asignados </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_equipos4.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="1142">
    <tr>
      <td width="375">&nbsp;</td>
      <td width="755">&nbsp;</td>
      </tr>
    <tr>
      <td><div align="right">
        <select name="tipo_objeto" size="1" id="tipo_objeto" >
          <?php
          $opciones = array(01=>'Solicitante',02=>'Descripción Componente',03=>'Número Serial');
          foreach($opciones as $k=>$op) {
        ?>
          <option value="<?php echo $k; ?>" <?php if($tipo_objeto== $k) echo 'selected="selected"'?> > <?php echo $op; ?> </option>
          <?php } ?>
          
        
        ?>
        </select>
      </div></td>
      <td><div align="right">
        <input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="60" maxlength="60" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " />
      </div></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="1153" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="93" height="35" bgcolor="#003300"><span class="Estilo38">C&oacute;digo Comp.  </span></td>
        <td width="320" bgcolor="#003300"><span class="Estilo38">Descripci&oacute;n </span></td>
        <td width="141" bgcolor="#003300"><span class="Estilo38">N&uacute;mero Serial</span></td>
        <td width="314" bgcolor="#003300"><span class="Estilo38">Unidad Organizativa</span></td>
        <td width="251" bgcolor="#003300"><div align="left"><span class="Estilo38">Asignado a </span></div></td>
      </tr>
        <?php
          //CONECTAR CON LA BASE DE DATOS DE MYSQL
          $conectar=conectar_BD();
          $sql01="select m_solicitantes.nomb_sol as nomb_sol, m_unidad_org.desc_unidad as desc_unidad,
		  t_asig_comp_items.num_serial as num_serial,
		  m_componentes.cod_comp as cod_comp, m_componentes.desc_comp as desc_comp  
		  from t_asig_comp_items, m_solicitantes, m_unidad_org, m_componentes  
		  where t_asig_comp_items.status <> '01' and t_asig_comp_items.cod_comp = m_componentes.cod_comp and
		   t_asig_comp_items.cod_sol  = m_solicitantes.cod_sol  and m_solicitantes.cod_unidad = 
		   m_unidad_org.cod_unidad ";
//         Solicitante	  
		   if($tipo_objeto=='01') {
              $sql01="select m_solicitantes.nomb_sol as nomb_sol, m_unidad_org.desc_unidad as desc_unidad,
		      t_asig_comp_items.num_serial as num_serial,
		      m_componentes.cod_comp as cod_comp, m_componentes.desc_comp as desc_comp  
		      from t_asig_comp_items, m_solicitantes, m_unidad_org, m_componentes  
		      where t_asig_comp_items.status <> '01' and t_asig_comp_items.cod_comp = m_componentes.cod_comp and
		      t_asig_comp_items.cod_sol  = m_solicitantes.cod_sol  and m_solicitantes.cod_unidad = 
		      m_unidad_org.cod_unidad and m_solicitantes.nomb_sol like '%$nombre_busqueda%'";
           }
//         Descripcion Componente	  
		   if($tipo_objeto=='02'){ 
              $sql01="select m_solicitantes.nomb_sol as nomb_sol, m_unidad_org.desc_unidad as desc_unidad,
		      t_asig_comp_items.num_serial as num_serial,
		      m_componentes.cod_comp as cod_comp, m_componentes.desc_comp as desc_comp  
		      from t_asig_comp_items, m_solicitantes, m_unidad_org, m_componentes  
		      where t_asig_comp_items.status <> '01' and t_asig_comp_items.cod_comp = m_componentes.cod_comp and
		      t_asig_comp_items.cod_sol  = m_solicitantes.cod_sol  and m_solicitantes.cod_unidad = 
		      m_unidad_org.cod_unidad and m_componentes.desc_comp like '%$nombre_busqueda%'";

           }
//         Número de Serial	  
		   if($tipo_objeto=='03'){ 
              $sql01="select m_solicitantes.nomb_sol as nomb_sol, m_unidad_org.desc_unidad as desc_unidad,
		      t_asig_comp_items.num_serial as num_serial,
		      m_componentes.cod_comp as cod_comp, m_componentes.desc_comp as desc_comp  
		      from t_asig_comp_items, m_solicitantes, m_unidad_org, m_componentes  
		      where t_asig_comp_items.status <> '01' and t_asig_comp_items.cod_comp = m_componentes.cod_comp and
		      t_asig_comp_items.cod_sol  = m_solicitantes.cod_sol  and m_solicitantes.cod_unidad = 
		      m_unidad_org.cod_unidad and  t_asig_comp_items.num_serial like '%$nombre_busqueda%'";
           }


           $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)){ 
				  $nomb_sol=$registro['nomb_sol'];
				  $nomb_sol=str_replace(" ","&nbsp;",$nomb_sol);
				  $desc_unidad=$registro['desc_unidad'];
				  $desc_unidad=str_replace(" ","&nbsp;",$desc_unidad);
				  $cod_comp=$registro['cod_comp'];
				  $cod_comp=str_replace(" ","&nbsp;",$cod_comp);
				  $desc_comp=$registro['desc_comp'];
				  $desc_comp=str_replace(" ","&nbsp;",$desc_comp);
				  $num_serial=$registro['num_serial'];
				  $num_serial=str_replace(" ","&nbsp;",$num_serial);
// Busca los datos
       $sql25="select cod_comp as cod_comp,num_serial as num_serial,ind_bes as ind_bes,COD_SOL as COD_SOL,imei as imei,macaddress 
		as macaddress, pin as pin,ip as ip,nroaso as nroaso,SIMCARD as SIMCARD,PUK as PUK,ind_la as ind_la,
		Ind_lc as Ind_lc,ind_ec as ind_ec,Operadora as Operadora,capacidad as 
		capacidad,SO as SO,cod_ubi as cod_ubi,estatus_comp as estatus_comp
	    from t_asig_comp_items where cod_comp  = '$cod_comp' and  num_serial = '$num_serial'";			   
		$resul2=mysql_query($sql25,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
        $regis2=mysql_fetch_assoc($resul2);
		 
        $cod_solicitante=$regis2["COD_SOL"];
        $bes=$regis2["ind_bes"];
        $imei=$regis2["imei"];
        $macaddress=$regis2["macaddress"];
        $pin=$regis2["pin"];
        $nrocelular=$regis2["nroaso"];
        $simcard=$regis2["SIMCARD"];
        $puk=$regis2["PUK"];
        $largoalcance = $regis2["ind_la"];
		$linea=$regis2["Ind_lc"];
        $tipoequipo=$regis2["ind_ec"];
        $operadora=$regis2["Operadora"];
        $capacidad=$regis2["capacidad"];
        $so=$regis2["SO"];
        $cod_ubicacion=$regis2["cod_ubi"];
        $estatus_comp=$regis2["estatus_comp"];
        $sql4="select nombre_ubi as nombre from m_ubicaciones where cod_ubi='$cod_ubicacion'";
	    $resul4=mysql_query($sql4,$conectar) or die("Problemas en la Sentencia SQL 3. ".mysql_error());
        $regis4=mysql_fetch_assoc($resul4);
        $nom_ubicacion=$regis4["nombre"];

                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
				 OnClick=\"datos('$cod_comp','$num_serial','$bes','$imei','$macaddress','$pin','$nrocelular','$simcard','$puk','$largoalcance','$linea','$tipoequipo','$operadora','$capacidad','$so','$cod_ubicacion','$estatus_comp','$nom_ubicacion','$cod_solicitante','$nomb_sol');\"><td>$cod_comp</td><td>$desc_comp</td><td>$num_serial</td>
				  <td>$desc_unidad</td><td>$nomb_sol</td></tr>";		
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
function datos(cod_comp,num_serial,bes,imei,macaddress,pin,nrocelular,simcard,puk,largoalcance,linea,tipoequipo,operadora,capacidad,so,cod_ubicacion,estatus_comp,nom_ubicacion,cod_solicitante,nomb_sol){
  opener.document.form1.cod_comp.value=cod_comp;
  opener.document.form1.nro_serial.value=num_serial;
  opener.document.form1.cod_solicitante.value=cod_solicitante;
  opener.document.form1.imei.value=imei;
  opener.document.form1.macaddress.value=macaddress;
  opener.document.form1.pin.value=pin;
  opener.document.form1.nrocelular.value=nrocelular;
  opener.document.form1.simcard.value=simcard;
  opener.document.form1.puk.value=puk;
  opener.document.form1.operadora.value=operadora;
  opener.document.form1.capacidad.value=capacidad;
  opener.document.form1.so.value=so;
  opener.document.form1.cod_ubicacion.value=cod_ubicacion;
  opener.document.form1.nom_ubicacion.value=nom_ubicacion;
  opener.document.form1.estatus_comp.value=estatus_comp;
  opener.document.form1.desc_solicit.value=nomb_sol;
  
  if(bes == 1)
  	opener.document.form1.bes.checked=true;
  else
  	opener.document.form1.bes.checked=false;
  if(largoalcance == 1)
  	opener.document.form1.largoalcance.checked=true;
  else
  	opener.document.form1.largoalcance.checked=false;
  if(linea == 1)
  	opener.document.form1.linea.checked=true;
  else
  	opener.document.form1.linea.checked=false;
  if(tipoequipo == 1)
  	opener.document.form1.tipoequipo.checked=true;
  else
  	opener.document.form1.tipoequipo.checked=false;

  window.close();
}
</script>
