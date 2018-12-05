<?php
  session_start();
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
?>
<script language=javascript>
function datos(solicit_sol,desc_solicit,cod_sap,cod_unidad,des_unidad,cod_gerencia,des_gerencia,cod_localidad,desc_localidad,cod_sociedad,des_sociedad,estatus,tiposoli,tipoasesor){
  opener.document.form1.cod_solicitante.value=solicit_sol;
  opener.document.form1.nomb_sol.value=desc_solicit;
  opener.document.form1.cod_sap.value=cod_sap;
  opener.document.form1.Cod_unidad.value=cod_unidad;
  opener.document.form1.des_unidad.value=des_unidad;
  opener.document.form1.Cod_gerencia.value=cod_gerencia;
  opener.document.form1.Des_gerencia.value=des_gerencia;
  opener.document.form1.cod_localidad.value=cod_localidad;
  opener.document.form1.des_localidad.value=desc_localidad;
  opener.document.form1.des_sociedad.value=des_sociedad;
  opener.document.form1.cod_sociedad.value=cod_sociedad;
  opener.document.form1.estatus.value=estatus;
  if(opener.document.form1.tipo_solicitante != null){
  	opener.document.form1.tipo_solicitante.selectedIndex=tiposoli;
  }
  if(opener.document.form1.tipo_asesor != null){
  	opener.document.form1.tipo_asesor.selectedIndex= tipoasesor;
  }
  
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
	width:1012px;
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
	width:1014px;
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
	width:909px;
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
	left: 626px;
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
    <p class="Estilo41">Listado de Solicitantes</p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_solicitantes2.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="886">
    <tr>
      <td width="353">&nbsp;</td>
      <td width="521">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Código Solicitante',02=>'Nombre del Solicitante',03=>'Descripción Unidad',04=>'Descripción  Gerencia');
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
    <table width="1016" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="80" bgcolor="#003300"><span class="Estilo38">C&oacute;digo</span></td>
        <td width="271" bgcolor="#003300"><div align="center"><span class="Estilo38">Nombre Solicitante </span></div></td>
        <td width="249" bgcolor="#003300"><span class="Estilo38">Unidad Organizativa </span></td>
        <td width="281" bgcolor="#003300"><span class="Estilo38">Gerencia</span></td>
        <td width="119" bgcolor="#003300"><div align="center"><span class="Estilo38">C&oacute;digo SAP </span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
             $sql01="select cod_sol as cod_sol, cod_sociedad as cod_sociedad, nomb_sol as 
			 nomb_sol,cod_unidad as 
			 cod_unidad,cod_gerencia as 
	     	 cod_gerencia, cod_localidad as cod_localidad, cod_sap_sol as cod_sap, estatus as estatus,
			 tipo_solicitante as tipo_solicitante, tipo_asesor as tipo_asesor
			 from m_solicitantes order by cod_sol";	
//            Código de Solicitante		   
		   	  if($tipo_objeto=='01'){
			     $nombre_busqueda = ltrim($nombre_busqueda,'0');
                 $sql01="select cod_sol as cod_sol, cod_sociedad as cod_sociedad, nomb_sol as 
				 nomb_sol,cod_unidad as 
				 cod_unidad,cod_gerencia as 
	     		 cod_gerencia, cod_localidad as cod_localidad, cod_sap_sol as cod_sap , estatus as estatus,
				 tipo_solicitante as tipo_solicitante, tipo_asesor as tipo_asesor
				 from m_solicitantes where cod_sol like 
				 '%$nombre_busqueda%' order by cod_sol";	
              }
//            Nombre del Solicitante			  
		   	  if($tipo_objeto=='02'){ 
                 $sql01="select cod_sol as cod_sol, cod_sociedad as cod_sociedad, nomb_sol as 
				 nomb_sol,cod_unidad as 
				 cod_unidad,cod_gerencia as 
	     		 cod_gerencia, cod_localidad as cod_localidad, cod_sap_sol as cod_sap, estatus as estatus,
				 tipo_solicitante as tipo_solicitante, tipo_asesor as tipo_asesor
				 from m_solicitantes where nomb_sol like
				  '%$nombre_busqueda%' order by cod_sol";	
              }
//            Por Unidad			  
		   	  if($tipo_objeto=='03'){ 
                 $sql01="select cod_sol as cod_sol, cod_sociedad as cod_sociedad, 
				   nomb_sol as nomb_sol,
				   m_solicitantes.cod_unidad as cod_unidad,cod_gerencia as 
	     		   cod_gerencia, cod_localidad as cod_localidad, cod_sap_sol as cod_sap, estatus as 
				   estatus, tipo_solicitante as tipo_solicitante, tipo_asesor as tipo_asesor
				   from m_solicitantes, M_UNIDAD_ORG 
				   where m_solicitantes.cod_unidad = M_UNIDAD_ORG.COD_UNIDAD and M_UNIDAD_ORG.DESC_UNIDAD like 
				   '%$nombre_busqueda%' order by cod_sol";	
              }
//           Por Gerencia			  
		   	  if($tipo_objeto=='04'){ 
                 $sql01="select cod_sol as cod_sol, cod_sociedad as cod_sociedad, nomb_sol as nomb_sol, 
				   m_solicitantes.cod_unidad as cod_unidad, 
				   m_solicitantes.cod_gerencia as 
	     		   cod_gerencia, cod_localidad as cod_localidad, cod_sap_sol as cod_sap, estatus as 
				   estatus, tipo_solicitante as tipo_solicitante, tipo_asesor as tipo_asesor  
				   from m_solicitantes, M_JERARQUIA_ORG 
				   where m_solicitantes.cod_gerencia = M_JERARQUIA_ORG.cod_gerencia and  
				   M_JERARQUIA_ORG.DESC_GERENCIA like '%$nombre_busqueda%' order by cod_sol";	
              }
            $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $solicit_sol=$registro['cod_sol'];
				  $solicit_sol=str_replace(" ","&nbsp;",$solicit_sol);
				  $desc_solicit=$registro['nomb_sol'];
				  $desc_solicit=str_replace(" ","&nbsp;",$desc_solicit);
				  $cod_unidad=$registro['cod_unidad'];
				  $cod_unidad=str_replace(" ","&nbsp;",$cod_unidad);
				  $cod_gerencia=$registro['cod_gerencia'];
				  $cod_gerencia=str_replace(" ","&nbsp;",$cod_gerencia);
				  $cod_localidad=$registro['cod_localidad'];
				  $cod_localidad=str_replace(" ","&nbsp;",$cod_localidad);
				  $cod_sociedad=$registro['cod_sociedad'];
				  $cod_sociedad=str_replace(" ","&nbsp;",$cod_sociedad);
				  $estatus=$registro['estatus'];
				  $estatus=str_replace(" ","&nbsp;",$estatus);
				  $cod_sap=$registro['cod_sap'];
				  $cod_sap=str_replace(" ","&nbsp;",$cod_sap);

				  $tipoasesor=$registro['tipo_asesor'];
				  $tipoasesor=str_replace(" ","&nbsp;",$tipoasesor);
				  
				  $tiposoli=$registro['tipo_solicitante'];
				  $tiposoli=str_replace(" ","&nbsp;",$tiposoli);

				  $sql02="select m_unidad_org.desc_unidad as desc_unidad, m_jerarquia_org.desc_gerencia as desc_gerencia
			      from m_jerarquia_org,m_unidad_org where m_jerarquia_org.cod_unidad = '$cod_unidad' and 
				  m_jerarquia_org.cod_gerencia = 
				  '$cod_gerencia' and  m_jerarquia_org.cod_unidad = m_unidad_org.cod_unidad";
			      $resul2=mysql_query($sql02,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
				  $reg2=mysql_fetch_assoc($resul2);
				  $des_unidad=$reg2['desc_unidad'];
				  $des_unidad=str_replace(" ","&nbsp;",$des_unidad);
				  $des_gerencia=$reg2['desc_gerencia'];
				  $des_gerencia=str_replace(" ","&nbsp;",$des_gerencia);
				  $sql03="select desc_localidad as desc_localidad from m_localidades where cod_localidad = '$cod_localidad'";
                  $resul3=mysql_query($sql03,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
				  $reg3=mysql_fetch_assoc($resul3);
				  $desc_localidad=$reg3['desc_localidad'];
				  $desc_localidad=str_replace(" ","&nbsp;",$desc_localidad);
				  $sql03="select nombre_sociedad as nombre_sociedad from m_sociedades where cod_sociedad = '$cod_sociedad'";
                  $resul3=mysql_query($sql03,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
				  $reg3=mysql_fetch_assoc($resul3);
				  $des_sociedad=$reg3['nombre_sociedad'];
				  $des_sociedad=str_replace(" ","&nbsp;",$des_sociedad);
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$solicit_sol','$desc_solicit','$cod_sap','$cod_unidad','$des_unidad','$cod_gerencia','$des_gerencia','$cod_localidad','$desc_localidad','$cod_sociedad','$des_sociedad','$estatus','$tiposoli','$tipoasesor');\"><td>$solicit_sol</td><td>$desc_solicit</td><td>$des_unidad</td><td>$des_gerencia</td><td>$cod_sap</td></tr>";		
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
