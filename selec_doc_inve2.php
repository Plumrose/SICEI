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
	width:851px;
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
	width:852px;
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
	width:857px;
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
    <p class="Estilo41">Listado de Documentos de Inventarios </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_doc_inve.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="854">
    <tr>
      <td width="256">&nbsp;</td>
      <td width="394">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Número Documento',02=>'Fecha Documento',03=>'Código Almacén',04=>'Estatus');
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
    <table width="856" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="180" bgcolor="#003300"><span class="Estilo38">N&uacute;mero Documento </span></td>
        <td width="137" bgcolor="#003300"><div align="center"><span class="Estilo38">Fecha</span></div></td>
        <td width="101" bgcolor="#003300"><span class="Estilo38">Almac&eacute;n</span></td>
        <td width="183" bgcolor="#003300"><span class="Estilo38">Usuario</span></td>
        <td width="221" bgcolor="#003300"><div align="center"><span class="Estilo38">Estatus</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
           $sql01="select NUM_DOC as num_doc, FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as 
			   COD_ALM,STATUS_DOC as STATUS_DOC from T_HEDER_INV_FISICO"; 		         
//            Numero de Documento	   
		   	  if($tipo_objeto=='01'){ 
                $sql01="select NUM_DOC as NUM_DOC, FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as 
			   COD_ALM,STATUS_DOC as STATUS_DOC from T_HEDER_INV_FISICO where NUM_DOC like '%$nombre_busqueda%'"; 		              }
//            Por Fecha	 del documento		  
		   	  if($tipo_objeto=='02'){ 
                $sql01="select NUM_DOC as NUM_DOC, FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as 
			   COD_ALM,STATUS_DOC as STATUS_DOC from T_HEDER_INV_FISICO where FEC_DOC like '%$nombre_busqueda%'"; 		              }
//            Por número almacen			  
		   	  if($tipo_objeto=='03'){ 
                $sql01="select NUM_DOC as NUM_DOC, FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as 
			   COD_ALM,STATUS_DOC as STATUS_DOC from T_HEDER_INV_FISICO where COD_ALM like '%$nombre_busqueda%'"; 		              }
//           Estatus		  
		   	  if($tipo_objeto=='04'){ 
                $sql01="select NUM_DOC as NUM_DOC, FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as 
			   COD_ALM,STATUS_DOC as STATUS_DOC from T_HEDER_INV_FISICO where STATUS_DOC like '%$nombre_busqueda%'"; 		              }
            $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
				  $num_doc=$registro['num_doc'];
				  $num_doc=str_replace(" ","&nbsp;",$num_doc);
                  $FEC_DOC=$registro['FEC_DOC'];
				  $FEC_DOC=str_replace(" ","&nbsp;",$FEC_DOC);
				  if($registro['STATUS_DOC']=='01'){
				    $estatus = 'Pendiente';
				  } 
				  if($registro['STATUS_DOC']=='09'){
				    $estatus = 'Anulada';
				  } 
				  if($registro['STATUS_DOC']=='02'){
				    $estatus = 'En Recuento';
				  } 
				  if($registro['STATUS_DOC']=='03'){
				    $estatus = 'Contabilizado';
				  } 
				  $COD_USUARIO=$registro['COD_USUARIO'];
				  $COD_USUARIO=str_replace(" ","&nbsp;",$COD_USUARIO);
				  $COD_ALM=$registro['COD_ALM'];
				  $COD_ALM=str_replace(" ","&nbsp;",$COD_ALM);
//                Busca el nombre del almacén
                  $desc_almacen=consultar_almacen($COD_ALM,$conectar);
				  $desc_almacen=str_replace(" ","&nbsp;",$desc_almacen);
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' 
				  OnClick=\"datos('$num_doc','$FEC_DOC','$COD_ALM','$COD_USUARIO','$estatus','$desc_almacen');\"><td>$num_doc</td><td>$FEC_DOC</td><td>$COD_ALM</td><td>$COD_USUARIO</td><td>$estatus</td></tr>";		
		    
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
function datos(num_doc,FEC_DOC,COD_ALM,COD_USUARIO,estatus,desc_almacen){
  opener.document.form1.nro_inventario.value=num_doc;
  opener.document.form1.fecha_inv.value=FEC_DOC;
  opener.document.form1.estatus.value=estatus;
  opener.document.form1.desc_almacen.value=desc_almacen;
  window.close();
}
</script>
