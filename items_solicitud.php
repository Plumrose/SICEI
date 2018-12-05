<?php
// Toma el valor del número de Solicitud
  session_start();
  $gv_flag = '0';
  $varri=$_GET['var'];
  if($varri!=''){
    $_SESSION['numsolicitud']=$varri;
  }	 
  $solicitud=$_SESSION['numsolicitud'];
//---------------------------------------------------------------------------
//CONECTAR CON LA BASE DE DATOS DE MYSQL
  $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
           die("Problemas  con la conexión a la base de datos");
  mysql_select_db('siceiplum',$conectar) or
           die("ERROR con la base de datos");
//---------------------------------------------------------------------------
// VERIFICA VALIDEZ DE LA SOLICITUD
$sql0="SELECT cod_statu as cod_statu FROM T_CAB_SOLICITUD where NUM_SOLIC = $solicitud";
$resultado=mysql_query($sql0,$conectar) or die("Problemas en el select".mysql_error());
if(mysql_num_rows($resultado)==0){
   mysql_close($conectar);
   ?>
   <script>
   alert('Nro. de Solicitud no Existe en la Base de Datos');
   window.close();
  </script>
   <?php
}else{
   $reg1=mysql_fetch_assoc($resultado);
   $cod_statu= $reg1["cod_statu"];
}
//---------------------------------------------------------------------------
// Toma los valores del formulario  
  $cod_comp=$_POST['cod_comp'];
  $cantidad=$_POST['cantidad'];
//BOTON NUEVO REGISTRO 
  if (isset($_REQUEST['b_nuevo'])){ 
    if ($cod_statu!='01'){ 
      $gv_flag = '4';
	}else{
	if ($cod_comp !=''){
      $gv_flag = '0';
//    VERIFICACIONES DE LOS DATOS
      $sql2="select desc_grupo_art as desc_grupo_art from m_grupo_articulos where cod_grupo_art = '$cod_comp'";						      $resultado3=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL Grupo Articulo".mysql_error());
      if(mysql_num_rows($resultado3)==0){
	     $gv_flag = '1';
	  }
     if($gv_flag=='0'){;
        if($cantidad==''){
	     $cantidad = '1';
	    }
//    ACTUALIZACIONES
      $sql04="insert into  
      t_det_solicitud (num_solic,cod_grupo_art,cantidad) values ('$solicitud','$cod_comp','$cantidad')";
	  $sql05="select * from t_det_solicitud where num_solic = '$solicitud' and cod_grupo_art = '$cod_comp'";
	  $resultado=mysql_query($sql05,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
      if(mysql_num_rows($resultado)>0){
	     $gv_flag = '2';
      }else {
//       Crea un NUEVO Registro	
         $resultado1=mysql_query($sql04,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
	     if($resultado1!=true){
   	       $gv_flag = '3';
         }
      }    
    }  
  }
}
}
//BOTON ACTUALIZAR 
if (isset($_REQUEST['b_actualizar'])){ 
  if ($cod_statu!='01'){ 
      $gv_flag = '4';
  }else{
   if(!empty($_POST['inddele'])) {
    foreach($_POST['inddele'] as $check) {
        $del = $check;
        $sql = "DELETE from T_det_solicitud where num_solic = '$solicitud' and cod_grupo_art = $del";
        $resultado2=mysql_query($sql,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
    }
  }
}
}
mysql_close($conectar);
?>
<script type="text/JavaScript">
function seleccion(){ 
  mipopup=window.open('selec_grupo_articulo2.php','form1','width= 800,height=300,scrollbars=yes');
  mipopup=focus();
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Informaci&oacute;n para Control de Equipos Informaticos</title>
<style type="text/css">
<!--
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
	width:663px;
	height:46px;
	z-index:19;
	left: 1px;
	top: 49px;
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
	top: 48px;
}
.Estilo38 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#Layer62 {	position:absolute;
	width:173px;
	height:28px;
	z-index:14;
	left: 851px;
	top: 2px;
}
.Estilo45 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF;}
#Layer4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:20;
}
.Estilo50 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; color: #CC3300; }
.Estilo54 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #CC3300; font-size: 12px; }
.Estilo8 {color: #993300;
	font-size: 12px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
#Layer65 {	position:absolute;
	width:34px;
	height:33px;
	z-index:24;
	left: 625px;
	top: 13px;
}
#Layer5 {
	position:absolute;
	width:115px;
	height:32px;
	z-index:25;
	left: 362px;
	top: 14px;
}
#Layer6 {
	position:absolute;
	width:21px;
	height:17px;
	z-index:1;
	left: 12px;
	top: 11px;
}
#Layer7 {
	position:absolute;
	width:70px;
	height:75px;
	z-index:25;
	left: 62px;
	top: 72px;
}
#Layer8 {
	position:absolute;
	width:24px;
	height:22px;
	z-index:25;
	left: 51px;
	top: 11px;
}
-->
</style>
</head>
<body>
<div id="Layer65"><a href="regresar.php"><img src="imagenes/salirsistema.jpg" alt="regresar" width="29" height="29" border="0" longdesc="regresar" /></a></div>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1"><span class="Estilo8">
  <?php 
  	  echo 'Solicitud Nro: '.$solicitud."\n";
	  ?>
</span></div>
<form id="form1" name="form1" method="post" action="items_solicitud.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="662">
    
    <tr>
      <td width="94" height="41"><span class="Estilo54">Componente</span></td>
      <td width="162"><div align="right"><a href="javascript:void(0)" title="Buscar" onClick="seleccion();"><img src="imagenes/buscar.jpg" alt="garticulo" width="20" height="18" border="0" /></a>
          <input name="cod_comp" type="text" id="cod_comp" value="<?php echo $cod_comp; ?>" size="15" maxlength="4" />
      </div></td>
      <td width="72"> <span class="Estilo54">Cantidad </span></td>
      <td width="90"><input name="cantidad" type="text" id="cantidad" value="<?php echo $cantidad; ?>" size="15" maxlength="15" /></td>
      <td width="112"><div align="center">
        <input name="b_nuevo" type="submit" class="Estilo8" id="b_nuevo" value="    A&ntilde;adir     " />
      </div></td>
      <td width="104"><div align="center">
        <input name="b_actualizar" type="submit" class="Estilo8" id="b_actualizar" value="   Eliminar  " />
      </div></td>
    </tr>
  </table>
  <div id="resultado">
    <table width="663" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      
      <tr>
        <td width="35" height="34" bgcolor="#3E5B15"><div align="center"></div></td>
        <td width="73" bgcolor="#3E5B15"><div align="left"><span class="Estilo38">C&oacute;digo</span></div></td>
        <td width="338" bgcolor="#3E5B15" class="Estilo45"><span class="Estilo38">Descripci&oacute;n</span></td>
        <td width="149" bgcolor="#3E5B15"><div align="left"><span class="Estilo38">Cantidad</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexión a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
           $sql01="select num_solic as num_solic, cod_grupo_art as cod_grupo_art,cantidad as cantidad from t_det_solicitud 
		   where num_solic = $solicitud"; 	           
		   $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
				  $ind;
				  $ind2;
				  $cod_grupo_art=$registro['cod_grupo_art'];
				  $cod_grupo_art=str_replace(" ","&nbsp;",$cod_grupo_art);
				  $cantidad=$registro['cantidad'];
				  $cantidad=str_replace(" ","&nbsp;",$cantidad);
                  $sql2="select desc_grupo_art as desc_grupo_art from m_grupo_articulos where 
				  cod_grupo_art='$cod_grupo_art'";					  
				  $resultado1=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  $registro1=mysql_fetch_assoc($resultado1);
				  $desc_grupo_art=$registro1['desc_grupo_art'];
				  $desc_grupo_art=str_replace(" ","&nbsp;",$desc_grupo_art);
//                  echo "<tr><td>$ind</td><td>$cod_grupo_art</td><td>$desc_grupo_art</td><td>$cantidad</td></tr>";		
		   ?>
           <tr>
             <td><?php echo $ind; ?><input type="checkbox" name="inddele[]"  id="inddele[]"  value="<?php echo $cod_grupo_art; ?>"/></td>
             <td><?php echo $cod_grupo_art; ?></td>
					<td><?php echo $desc_grupo_art; ?></td>
					<td><?php echo $cantidad;?></td>
           </tr>
           <?php
		    }
		   }
		   ?>
    </table>
    <div id="Layer6"><img src="imagenes/borrar.jpg" alt="borrar" width="20" height="18" /></div>
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
<?php
if ($gv_flag == '1'){
   $cod_comp='';
   $cantidad='';
   ?>
   <script>
   alert('Error. Componente no Existe');
   </script>
  <?php
}
if ($gv_flag == '2'){
   $cod_comp='';
   $cantidad='';
   ?>
   <script>
   alert('Error. Componente ya Asignado');
   </script>
   <?php
}
if ($gv_flag == '3'){
   $cod_comp='';
   $cantidad='';
   ?>
   <script>
   alert('Error. No se puedo incluir el Componente');
   </script>
   <?php
}
if ($gv_flag == '4'){
   ?>
   <script>
   alert('Error.Las Solicitudes solo pueden ser modicadas en estatus Pendiente');
   </script>
   <?php
}
?>
