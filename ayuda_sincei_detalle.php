<?php
// Toma el código de la transacción
  session_start();
  $varri=$_GET['var'];
  if($varri!=''){
    $_SESSION['cod_trans']=$varri;
  }	 
  $codigo_transaction=$_SESSION['cod_trans'];
//---------------------------------------------------------------------------
// Toma los valores del formulario  
  $detalle_ayuda=$_POST['ayuda'];
  $tipo_objeto=$_POST['tipo_objeto'];
  if ($tipo_objeto!=''){
     if ($tipo_objeto!=$codigo_transaction){  
        $codigo_transaction=$tipo_objeto;
     }
  }
//---------------------------------------------------------------------------
//CONECTAR CON LA BASE DE DATOS DE MYSQL
$conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
     die("Problemas  con la conexión a la base de datos");
mysql_select_db('siceiplum',$conectar) or
     die("ERROR con la base de datos");
//---------------------------------------------------------------------------
// Busca el detalle de la ayuda
  $sql1="select detalle as detalle from m_ayuda_sicei where cod_opcion = '$codigo_transaction'"; 		
  $res1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
  if(mysql_num_rows($res1)>0) {
    $reg1=mysql_fetch_assoc($res1);
    $detalle_ayuda= $reg1["detalle"];
  }else{
    $detalle_ayuda='';
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Informaci&oacute;n para Control de Equipos Informaticos</title>
<style type="text/css">
<!--
#logo {
	position:absolute;
	width:675px;
	height:35px;
	z-index:17;
	left: 2px;
	top: 2px;
	background-color: #F4FEE9;
}
#Layer2 {
	position:absolute;
	width:348px;
	height:27px;
	z-index:18;
	left: 269px;
	top: -90px;
}
#busqueda {
	position:absolute;
	width:675px;
	height:46px;
	z-index:19;
	left: 4px;
	top: 65px;
	background-color: #C9E99E;
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
.estilo_ayuda {
	font-family: Arial;
	font-weight: normal;
	color: #666666;
	font-size: 14px;
	font-style: normal;
}
#resultado {
	position:absolute;
	width:677px;
	height:398px;
	z-index:1;
	left: -1px;
	top: 48px;
}
#Layer62 {	position:absolute;
	width:173px;
	height:28px;
	z-index:14;
	left: 851px;
	top: 2px;
}
.Estilo50 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; color: #CC3300; }
.Estilo8 {color: #993300;
	font-size: 12px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
#Layer65 {	position:absolute;
	width:34px;
	height:33px;
	z-index:24;
	left: 642px;
	top: 13px;
}
.ayuda_estilo1 {	font-size: 16px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
#imagen {
	position:absolute;
	width:71px;
	height:150px;
	z-index:19;
	left: 1px;
	top: 247px;
}
#c_documentacion {
	position:absolute;
	width:599px;
	height:398px;
	z-index:20;
	left: 77px;
	top: 0px;
}
.Estilo51 {font-family: Arial}
#Layer1 {
	position:absolute;
	width:77px;
	height:248px;
	z-index:21;
	background-color: #FFFFFF;
	overflow: visible;
}
-->
</style>
</head>
<body>
<div style="width: 660px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<div id="Layer65">
  <p><a href="regresar.php"><img src="imagenes/salirsistema.jpg" alt="regresar" width="29" height="29" border="0" title="Regresa a la opci&oacute;n donde fue llamada" longdesc="regresar" /></a></p>
  <p>&nbsp;</p>
</div>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="logo"><img src="imagenes/img_main.jpg" width="260" height="101" alt="logo1" /></div>
<form id="form1" name="form1" method="post" action="ayuda_sincei_detalle.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="busqueda">
  <div id="resultado">
    <div class="ayuda_estilo1" id="Layer2">
      <div align="center" class="Estilo50">
        <div align="right"><span class="titulo3 Estilo51">Aprendiendo a  Trabajar con SICEI</span>....</div>
      </div>
    </div>
    <div id="imagen"><img src="imagenes/interrogante.jpg" width="73" height="146" /></div>
    <div id="Layer1"></div>
    <div id="c_documentacion">
      <textarea name="ayuda" cols="90" rows="24" class="estilo_ayuda" id="ayuda" title="Descripci&oacute;n de la funcionalidad seleccionada"><?php echo $detalle_ayuda; ?>

</textarea>
    </div>
  </div>
  <table width="673" height="42">
    <tr>
      <td width="50" class="Estilo8">&nbsp;</td>
      <td width="496"><div align="right">
        <span class="Estilo8">Opci&oacute;n de Men&uacute;</span>
        <select name="tipo_objeto" size="1" id="tipo_objeto" title="Corresponde a la opci&oacute;n del men&uacute; sobre la cual desea consultar la documentaci&oacute;n" >
          <?php
              //CONECTAR CON LA BASE DE DATOS DE MYSQL
              $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                  die("Problemas  con la conexi&oacute;n a la base de datos");
              mysql_select_db('siceiplum',$conectar) or
                  die("ERROR con la base de datos");
              $sql01="select cod_opcion as id, desc_rol as des from m_roles order by cod_opcion";
              $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
              if(mysql_num_rows($resultado)>0) 
			  {
				while($registro=mysql_fetch_assoc($resultado)) 
                { 
				$valor=$registro["id"].' '.$registro["des"];
				$k=$registro["id"];
                ?>
          <option value="<?php echo $k; ?>" <?php if($codigo_transaction== $k) echo 'selected="selected"'?> > <?php echo $valor; 
				?> </option>
                <?php 

				}
			} 
            mysql_close($conectar);
			?>
        </select>
      </div></td>
      <td width="96"><div align="right">
        <input name="b_buscar" type="submit" id="b_buscar" title="Actualiza la informaci&oacute;n de la ayuda en base a la opci&oacute;n del men&uacute; seleccionada" value="     Buscar     " />
      </div></td>
      <td width="11">&nbsp;</td>
    </tr>
  </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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
