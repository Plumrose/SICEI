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
    <p class="Estilo41">Listado de Proveedores </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_proveedores.php">
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
          $opciones = array(01=>'Código Proveedor',02=>'Nombre',03=>'Código SAP');
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
        <td width="125" bgcolor="#003300"><span class="Estilo38">RIF</span></td>
        <td width="255" bgcolor="#003300"><div align="center"><span class="Estilo38">Denominaci&oacute;n Comercial </span></div></td>
        <td width="115" bgcolor="#003300"><span class="Estilo38">C&oacute;digo SAP </span></td>
        <td width="140" bgcolor="#003300"><div align="center"><span class="Estilo38">Estatus</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
            $sql01="select rif_prov as rif_prov, den_prov as den_prov, status_prov as status_prov,codigo_sap as 
	     		   codigo_sap, cod_tipo_prov as cod_tipo_prov, obser_prov as obser_prov from m_proveedores order by rif_prov";	
//            Código de proveedor		   
		   	  if($tipo_objeto=='01'){ 
                 $sql01="select rif_prov as rif_prov, den_prov as den_prov, status_prov as status_prov,codigo_sap as 
	     		   codigo_sap, cod_tipo_prov as cod_tipo_prov, obser_prov as obser_prov from m_proveedores where rif_prov like 
				   '%$nombre_busqueda%' order by rif_prov";	
              }
//            Nombre del Proveedor			  
		   	  if($tipo_objeto=='02'){ 
                 $sql01="select rif_prov as rif_prov, den_prov as den_prov, status_prov as status_prov,codigo_sap as 
	     		   codigo_sap, cod_tipo_prov as cod_tipo_prov, obser_prov as obser_prov from m_proveedores where den_prov like 
				   '%$nombre_busqueda%' order by rif_prov";	
              }
//            Por Código SAP			  
		   	  if($tipo_objeto=='03'){ 
                 $sql01="select rif_prov as rif_prov, den_prov as den_prov, status_prov as status_prov,codigo_sap as 
	     		   codigo_sap, cod_tipo_prov as cod_tipo_prov, obser_prov as obser_prov from m_proveedores where codigo_sap like 
				   '%$nombre_busqueda%' order by rif_prov";	
              }
           $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
				  $rif_prov=$registro['rif_prov'];
				  $rif_prov=str_replace(" ","&nbsp;",$rif_prov);
				  $Nomb_prov=$registro['den_prov'];
				  $Nomb_prov=str_replace(" ","&nbsp;",$Nomb_prov);
				  $codigo_sap=$registro['codigo_sap'];
				  $codigo_sap=str_replace(" ","&nbsp;",$codigo_sap);
				  if ($registro['status_prov']== '01'){
				      $estatus='Activo';
				  }
				  if ($registro['status_prov']== '02'){
				      $estatus='Inactivo';
				  }
   			      $estatus=str_replace(" ","&nbsp;",$estatus);
                  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$rif_prov','$Nomb_prov');\"><td>$rif_prov</td><td>$Nomb_prov</td><td>$codigo_sap</td><td>$estatus</td></tr>";		
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
function datos(rif_prov,Nomb_prov){
  if(opener.document.form1.rif_prov != null){
    opener.document.form1.rif_prov.value=rif_prov;
  }
  if(opener.document.form1.Nomb_prov != null){
    opener.document.form1.Nomb_prov.value=Nomb_prov;
  }
  
  if(opener.document.form1.codigo_prov != null){
    opener.document.form1.codigo_prov.value=rif_prov;
  }
  if(opener.document.form1.des_prov != null){
    opener.document.form1.des_prov.value=Nomb_prov;
  }
  window.close();
}
</script>
