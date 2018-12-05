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
	width:659px;
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
	width:659px;
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
	width:663px;
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
	left: 465px;
	top: 2px;
}
-->
</style>
</head>
<body>
<div style="width: 510px; position: relative; margin-left: auto; margin-right: auto;"><div id="c_encabezado">
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">An&aacute;listas CTS </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_cts3.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="655">
    <tr>
      <td width="173">&nbsp;</td>
      <td width="477">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(01=>'Código Análista',02=>'Nombre Análista');
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
    <table width="661" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="64" bgcolor="#003300"><span class="Estilo38">C&oacute;digo</span></td>
        <td width="288" bgcolor="#003300"><span class="Estilo38">Nombre</span></td>
        <td width="213" bgcolor="#003300"><div align="center"><span class="Estilo38">Localidad</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=conectar_BD();
           $sql01="select cod_cts as cod_cts, nom_cts as nom_cts, status_cts as status_cts, cedula as cedula, cod_nivel as 
		   cod_nivel, foto as foto, cod_localidad as cod_localidad from m_analistas_cts";
//           Código de Analista		   
       	   if($tipo_objeto=='01'){ 
              $sql01="select cod_cts as cod_cts, nom_cts as nom_cts, status_cts as status_cts, cedula as cedula, cod_nivel as 
		      cod_nivel, foto as foto, cod_localidad as cod_localidad from m_analistas_cts where cod_cts like 
			   '%$nombre_busqueda%'";
           }
//            Nombre del Analista			  
		   if($tipo_objeto=='02'){ 
              $sql01="select cod_cts as cod_cts, nom_cts as nom_cts, status_cts as status_cts, cedula as cedula, cod_nivel as 
		      cod_nivel, foto as foto, cod_localidad as cod_localidad from m_analistas_cts where nom_cts like 
			   '%$nombre_busqueda%'";
           }
           $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) {
    		  while($registro=mysql_fetch_assoc($resultado)){ 
				  $cod_cts=$registro['cod_cts'];
				  $cod_cts=str_replace(" ","&nbsp;",$cod_cts);
				  $nom_cts=$registro['nom_cts'];
				  $nom_cts=str_replace(" ","&nbsp;",$nom_cts);
				  $cedula=$registro['cedula'];
				  $cedula=str_replace(" ","&nbsp;",$cedula);
				  $nivel=$registro['cod_nivel'];
				  $nivel=str_replace(" ","&nbsp;",$nivel);
		          $estatus= $registro["status_cts"];
				   $estatus=str_replace(" ","&nbsp;", $estatus);
				  $cod_localidad=$registro['cod_localidad'];
				  $cod_localidad=str_replace(" ","&nbsp;",$cod_localidad);
				  $foto=$registro['foto'];
				  $foto=str_replace(" ","&nbsp;",$foto);
                  $sql10="select desc_localidad as desc_localidad from m_localidades where cod_localidad  = '$cod_localidad' ";
                  $resul10=mysql_query($sql10,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
                  if(mysql_num_rows($resul10)>0) {
                    $reg10=mysql_fetch_assoc($resul10);
                    $desc_localidad= $reg10["desc_localidad"];
	              }
    			  $desc_localidad=str_replace(" ","&nbsp;",$desc_localidad);
	              echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod_cts','$nom_cts','$cedula','$nivel','$cod_localidad','$desc_localidad','$foto','$estatus');\"><td>$cod_cts</td><td>$nom_cts</td><td>$desc_localidad</td></tr>";		
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
function datos(analista_cts,nombre_cts,cedula,nivel,cod_localidad,desc_localidad,foto,estatus){
  opener.document.form1.cod_analista.value=analista_cts;
  opener.document.form1.nombre_analista.value=nombre_cts;
  opener.document.form1.cedula.value=cedula;
  opener.document.form1.tipo_nivel.value=nivel;
  opener.document.form1.cod_localidad.value=cod_localidad;
  opener.document.form1.des_localidad.value=desc_localidad;
  opener.document.form1.estatus.value=estatus;
 
//  opener.document.form1.foto_usuario.value=foto;
  window.close();
}
</script>
