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
	width:820px;
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
	width:823px;
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
	width:822px;
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
	left: 786px;
	top: 2px;
}
-->
</style>
</head>
<body>
<div style="width: 825px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Listado de Movimientos de Entradas </p>
    </div>
</div>
<form id="form1" name="form1" method="post" action="selec_movimientos.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="820">
    <tr>
      <td width="256" height="48">
        
            <div align="right">
                <select name="tipo_objeto" size="1" id="tipo_objeto" >
                  <?php
          $opciones = array(01=>'Número Movimiento',02=>'Fecha',03=>'Código Almacén',04=>'Documento Referencia',05=>
		  'Clase de Movimiento');
          foreach($opciones as $k=>$op) {
        ?>
                  <option value="<?php echo $k; ?>" <?php if($tipo_objeto== $k) echo 'selected="selected"'?> > <?php echo $op; ?> </option>
                  <?php } ?>
                  
        
          
        
        ?>
                </select>
          </div></td>
      <td width="394"><div align="right">
        <input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="35" maxlength="35" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " />
      </div></td>
      </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><div align="right"></div></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="823" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="110" bgcolor="#003300"><div align="center"><span class="Estilo38">Nro. Movimiento </span></div></td>
        <td width="58" bgcolor="#003300"><div align="center"><span class="Estilo38">Clase</span></div></td>
        <td width="71" bgcolor="#003300"><span class="Estilo38">Fecha</span></td>
        <td width="58" bgcolor="#003300"><span class="Estilo38">Hora</span></td>
        <td width="125" bgcolor="#003300"><span class="Estilo38">Usuario</span></td>
        <td width="120" bgcolor="#003300"><span class="Estilo38">C&oacute;d-Almac&eacute;n</span></td>
        <td width="100" bgcolor="#003300"><div align="center"><span class="Estilo38">Documento Referencia </span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
				$wg_fecha= date("Y-m-d");
               $sql01="select NUM_MOVI as NUM_MOVI, CLASE_MOVI as CLASE_MOVI,FEC_MOVI as FEC_MOVI,HORA_MOVI as 
			   HORA_MOVI,COD_USUARIO as COD_USUARIO,COD_ALM as COD_ALM, NUM_DOC_REF as NUM_DOC_REF, RIF_PROV as RIF_PROV, Nota as
			    Nota from T_MOVI_HEDER where TIPO_MOVI = 'E' and FEC_MOVI = '$wg_fecha' order by FEC_MOVI"; 		         
//            Numero de Movimiento		   
		   	  if($tipo_objeto=='01'){ 
               $sql01="select NUM_MOVI as NUM_MOVI, CLASE_MOVI as CLASE_MOVI,FEC_MOVI as FEC_MOVI,HORA_MOVI as 
			   HORA_MOVI,COD_USUARIO as COD_USUARIO,COD_ALM as COD_ALM, NUM_DOC_REF as NUM_DOC_REF, RIF_PROV as RIF_PROV, Nota as       	       Nota from T_MOVI_HEDER where TIPO_MOVI = 'E' and NUM_MOVI like '%$nombre_busqueda%' order by FEC_MOVI"; 		         
              }
//            Por Fecha			  
		   	  if($tipo_objeto=='02'){ 
               $sql01="select NUM_MOVI as NUM_MOVI, CLASE_MOVI as CLASE_MOVI,FEC_MOVI as FEC_MOVI,HORA_MOVI as 
			   HORA_MOVI,COD_USUARIO as COD_USUARIO,COD_ALM as COD_ALM, NUM_DOC_REF as NUM_DOC_REF, RIF_PROV as RIF_PROV, Nota as               Nota from T_MOVI_HEDER where TIPO_MOVI = 'E' and FEC_MOVI like '%$nombre_busqueda%' order by FEC_MOVI"; 		         
              }
//            Codigo almacen			  
		   	  if($tipo_objeto=='03'){ 
               $sql01="select NUM_MOVI as NUM_MOVI, CLASE_MOVI as CLASE_MOVI,FEC_MOVI as FEC_MOVI,HORA_MOVI as 
			   HORA_MOVI,COD_USUARIO as COD_USUARIO,COD_ALM as COD_ALM, NUM_DOC_REF as NUM_DOC_REF, RIF_PROV as RIF_PROV, Nota as
			   Nota from T_MOVI_HEDER where  TIPO_MOVI = 'E' and cod_alm like '%$nombre_busqueda%' order by FEC_MOVI"; 		              }
//           Documento Referencia			  
		   	  if($tipo_objeto=='04'){ 
               $sql01="select NUM_MOVI as NUM_MOVI, CLASE_MOVI as CLASE_MOVI,FEC_MOVI as FEC_MOVI,HORA_MOVI as 
			   HORA_MOVI,COD_USUARIO as COD_USUARIO,COD_ALM as COD_ALM, NUM_DOC_REF as NUM_DOC_REF, RIF_PROV as RIF_PROV, Nota as			
			   Nota from T_MOVI_HEDER where TIPO_MOVI = 'E' and num_doc_ref like '%$nombre_busqueda%' order by FEC_MOVI"; 		              }
//            Clase de Movimiento			  
		   	  if($tipo_objeto=='05'){ 
               $sql01="select NUM_MOVI as NUM_MOVI, CLASE_MOVI as CLASE_MOVI,FEC_MOVI as FEC_MOVI,HORA_MOVI as 
			   HORA_MOVI,COD_USUARIO as COD_USUARIO,COD_ALM as COD_ALM, NUM_DOC_REF as NUM_DOC_REF, RIF_PROV as RIF_PROV , Nota 
			   as Nota from T_MOVI_HEDER where TIPO_MOVI = 'E' and clase_movi like '%$nombre_busqueda%' order by FEC_MOVI"; 		              }
            $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
            if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $i++;
				  $NUM_MOVI=$registro['NUM_MOVI'];
				  $NUM_MOVI=str_replace(" ","&nbsp;",$NUM_MOVI);
                  $CLASE_MOVI=$registro['CLASE_MOVI'];
				  $CLASE_MOVI=str_replace(" ","&nbsp;",$CLASE_MOVI);
				  $FEC_MOVI=$registro['FEC_MOVI'];
				  $FEC_MOVI=str_replace(" ","&nbsp;",$FEC_MOVI);
				  $HORA_MOVI=$registro['HORA_MOVI'];
				  $HORA_MOVI=str_replace(" ","&nbsp;",$HORA_MOVI);
				  $COD_USUARIO=$registro['COD_USUARIO'];
				  $COD_USUARIO=str_replace(" ","&nbsp;",$COD_USUARIO);
				  $COD_ALM =$registro['COD_ALM'];
				  $COD_ALM =str_replace(" ","&nbsp;",$COD_ALM );
				  $NUM_DOC_REF=$registro['NUM_DOC_REF'];
				  $NUM_DOC_REF=str_replace(" ","&nbsp;",$NUM_DOC_REF);
				  $RIF_PROV=$registro['RIF_PROV'];
				  $RIF_PROV=str_replace(" ","&nbsp;",$RIF_PROV);
				  $nota=$registro['nota'];
				  $nota=str_replace(" ","&nbsp;",$nota);
			  	  $desc_almacen=consultar_almacen($COD_ALM,$conectar);
	              $Nomb_prov=consultar_proveedor($RIF_PROV,$conectar);
				  $desc_almacen=str_replace(" ","&nbsp;",$desc_almacen);
				  $Nomb_prov=str_replace(" ","&nbsp;",$Nomb_prov);
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
OnClick=\"datos('$NUM_MOVI','$CLASE_MOVI','$FEC_MOVI','$COD_ALM','$NUM_DOC_REF','$RIF_PROV','$nota','$desc_almacen','$Nomb_prov');\"><td>$NUM_MOVI</td><td>  $CLASE_MOVI</td><td>$FEC_MOVI</td><td>$HORA_MOVI</td><td>$COD_USUARIO</td><td>$COD_ALM</td><td>$NUM_DOC_REF
				  </td></tr>";		
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
function datos(NUM_MOVI,CLASE_MOVI,FEC_MOVI,COD_ALM,NUM_DOC_REF,RIF_PROV,nota,desc_almacen,Nomb_prov){
  opener.document.form1.nro_mov.value=NUM_MOVI;
  opener.document.form1.fecha_mov.value=FEC_MOVI;
  opener.document.form1.doc_ref.value=NUM_DOC_REF;
  opener.document.form1.cod_almacen.value=COD_ALM;
  opener.document.form1.clase_mov.value=CLASE_MOVI;
  opener.document.form1.rif_prov.value=RIF_PROV;
  opener.document.form1.detalle_sol.value=nota;
  opener.document.form1.desc_almacen.value=desc_almacen;
  opener.document.form1.Nomb_prov.value=Nomb_prov;
  
  window.close();
}
</script>
