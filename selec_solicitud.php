<?php
  session_start();
  error_reporting(E_ERROR); //Oculta errores AR.
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
  $fec_inicio=date("Y-m-01");
  $fec_fin=date("Y-m-d");
 // Toma el valor del estatus
  $varri=$_GET['var'];
  if($varri!=''){
    $_SESSION['cod_estatus']=$varri;
  }	 
  $cod_estatus=$_SESSION['cod_estatus'];
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
	width:661px;
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
	width:661px;
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
	width:662px;
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
<div style="width: 660px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Solicitudes</p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_solicitud.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="662">
    <tr>
      <td width="256">&nbsp;</td>
      <td width="394">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Número Solicitud',02=>'Fecha',03=>'Código Analista CTS',04=>'Código Solicitante',05=>'Descripción',06=>
		  'Estatus');
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
    <table width="663" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="95" bgcolor="#003300"><span class="Estilo38">N&uacute;mero</span></td>
        <td width="95" bgcolor="#003300"><div align="center"><span class="Estilo38">Fecha</span></div></td>
        <td width="34" bgcolor="#003300"><span class="Estilo38">Cod.</span></td>
        <td width="166" bgcolor="#003300"><span class="Estilo38">Estatus</span></td>
        <td width="239" bgcolor="#003300"><div align="center"><span class="Estilo38">Descripci&oacute;n</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
           $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
			   num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
			   desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
			   where fec_solic between '$fec_inicio' and '$fec_fin' and cod_statu in ($cod_estatus)"; 		         
//            Numero de solicitud		   
		   	  if($tipo_objeto=='01'){ 
                    $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
					num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
					desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
					where num_solic like '%$nombre_busqueda%' and cod_statu in ($cod_estatus)"; 		              }
//            Por Fecha			  
		   	  if($tipo_objeto=='02'){ 
                    $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
					num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
					desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
					where fec_solic like '%$nombre_busqueda%' and cod_statu in ($cod_estatus)"; 		
              }
//            Por analista CTS			  
		   	  if($tipo_objeto=='03'){ 
                    $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
					num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
					desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
					where cod_cts like '%$nombre_busqueda%' and cod_statu in ($cod_estatus)"; 		
              }
//           Código Solicitante			  
		   	  if($tipo_objeto=='04'){ 
                    $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
					num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
					desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
					where cod_sol like '%$nombre_busqueda%' and cod_statu in ($cod_estatus)"; 		
              }
//            Descripción			  
		   	  if($tipo_objeto=='05'){ 
                    $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
					num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
					desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
					where desc_solic like '%$nombre_busqueda%' and cod_statu in ($cod_estatus)"; 		
              }
//            Estatus			  
		   	  if($tipo_objeto=='06'){ 
                    $sql01="select num_solic as num_solic, fec_solic as fec_solic,cod_statu as cod_statu,num_ticket_cts as 
					num_ticket_cts,cod_sol as cod_sol,cod_cts as cod_cts,cod_tipo_solic as cod_tipo_solic,desc_solic as 
					desc_solic,cod_usuario as cod_usuario, COD_PLATAF as COD_PLATAF from t_cab_solicitud 
					where cod_statu like '%$nombre_busqueda%' and cod_statu in ($cod_estatus)"; 		
              }
            $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $i++;
				  $cod_sol=$registro['num_solic'];
				  $cod_sol=str_replace(" ","&nbsp;",$cod_sol);
                  $fecha=$registro['fec_solic'];
				  $fecha=str_replace(" ","&nbsp;",$fecha);
				  if($registro['cod_statu']=='01'){
				    $estatus = 'Pendiente';
				  } 
				  if($registro['cod_statu']=='02'){
				    $estatus = 'Anulada';
				  } 
				  if($registro['cod_statu']=='03'){
				    $estatus = 'Confirmada';
				  } 
				  if($registro['cod_statu']=='04'){
				    $estatus = 'Concluida';
				  } 
				  $cod_statu=$registro['cod_statu'];
				  $ticket_cts=$registro['num_ticket_cts'];
				  $ticket_cts=str_replace(" ","&nbsp;",$ticket_cts);
				  $plataforma=$registro['COD_PLATAF'];
				  $plataforma=str_replace(" ","&nbsp;",$plataforma);
				  $solicit_sol=$registro['cod_sol'];
				  $solicit_sol=str_replace(" ","&nbsp;",$solicit_sol);
				  $analista_cts=$registro['cod_cts'];
				  $analista_cts=str_replace(" ","&nbsp;",$analista_cts);
				  $tipo_sol=$registro['cod_tipo_solic'];
				  $tipo_sol=str_replace(" ","&nbsp;",$tipo_sol);
				  $detalle_sol=$registro['desc_solic'];
				  $detalle_sol=str_replace(" ","&nbsp;",$detalle_sol);
				  $sql2="select nomb_sol as nomb_sol from m_solicitantes where cod_sol='$solicit_sol'";
                  $sql3="select nom_cts as nom_cts from m_analistas_cts where cod_cts='$analista_cts'";
				  $sql4="select desc_solic as desc_solic from m_tipos_solicitudes where cod_tipo_solic='$tipo_sol'";
				  $sql5="select cod_sociedad as cod_sociedad from m_solicitantes where cod_sol='$solicit_sol'";
				  $sql6="select nombre_sociedad as nombre_sociedad from m_solicitantes where cod_sol='$solicit_sol'";
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

				  $desc_solicit=$registro1['nomb_sol'];
				  $desc_solicit=str_replace(" ","&nbsp;",$desc_solicit);
				  $nombre_cts=$registro2['nom_cts'];
				  $nombre_cts=str_replace(" ","&nbsp;",$nombre_cts);
				  $desc_solicitud=$registro3['desc_solic'];
				  $desc_solicitud=str_replace(" ","&nbsp;",$desc_solicitud);
				  $cod_sociedad=$registro4['cod_sociedad'];
				  $cod_sociedad=str_replace(" ","&nbsp;",$cod_sociedad);
				  $des_sociedad=$registro5['nom_sociedad'];
				  $des_sociedad=str_replace(" ","&nbsp;",$des_sociedad);
				  
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod_sol','$fecha','$estatus','$ticket_cts','$solicit_sol','$desc_solicit','$analista_cts','$nombre_cts','$tipo_sol','$detalle_sol','$desc_solicitud','$plataforma','$cod_sociedad','$des_sociedad');\"><td>$cod_sol</td><td>$fecha</td><td>$cod_statu</td><td>$estatus</td><td>$detalle_sol</td></tr>";		
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
function datos(cod_sol,fecha,estatus,ticket_cts,solicit_sol,desc_solicit,analista_cts,nombre_cts,tipo_sol,detalle_sol,desc_solicitud,plataforma,cod_sociedad,des_sociedad){
  opener.document.form1.cod_sol.value=cod_sol;
  opener.document.form1.fecha_sol.value=fecha;
  opener.document.form1.estatus.value=estatus;
  if(opener.document.form1.ticket_cts != null){
     opener.document.form1.ticket_cts.value=ticket_cts;
  }	 
  if(opener.document.form1.solicit_sol != null){
    opener.document.form1.solicit_sol.value=solicit_sol;
   }	 
  if(opener.document.form1.desc_solicit != null){
     opener.document.form1.desc_solicit.value=desc_solicit;
  }	 
  if(opener.document.form1.analista_cts != null){
    opener.document.form1.analista_cts.value=analista_cts;
   }	 
   if(opener.document.form1.nombre_cts != null){
     opener.document.form1.nombre_cts.value=nombre_cts;
  }	 
  if(opener.document.form1.tipo_sol != null){
    opener.document.form1.tipo_sol.value=tipo_sol;
  }	 
  if(opener.document.form1.detalle_sol != null){
     opener.document.form1.detalle_sol.value=detalle_sol;
  }	 
  if(opener.document.form1.desc_solicitud != null){
    opener.document.form1.desc_solicitud.value=desc_solicitud;
  }	 
  if(opener.document.form1.plataforma != null){
  	opener.document.form1.plataforma.value=plataforma;
  }
   if(opener.document.form1.cod_sociedad != null){
  	opener.document.form1.cod_sociedad.value=cod_sociedad;
  }
   if(opener.document.form1.des_sociedad != null){
  	opener.document.form1.des_sociedad.value=des_sociedad;
  }
  window.close();
}
</script>
