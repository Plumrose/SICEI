<?php
Include ("rutinasphp.php");
  session_start();
  $nombre_busqueda=$_POST['nombre_busqueda'];
?>
<script language=javascript>
function datos(cod,nombre,tmp,tmp2){
  opener.document.form1.cod_categoria.value=cod;
  opener.document.form1.des_categoria.value=nombre;
  opener.document.form1.tmp.value=tmp;
  opener.document.form1.tmp2.value=tmp2;
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
	width:491px;
	height:35px;
	z-index:17;
	left: 1px;
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
	width:492px;
	height:52px;
	z-index:19;
	left: 0px;
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
	width:493px;
	height:265px;
	z-index:1;
	left: 0px;
}
.Estilo38 {color: #FFFFFF; font-weight: bold; font-family: "Courier New", Courier, monospace; }
.Estilo41 {
	color: #FF9900;
	font-weight: bold;
}
.Estilo42 {color: #009900}
#Layer65 {position:absolute;
	width:34px;
	height:33px;
	z-index:24;
	left: 456px;
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
    <p class="Estilo41 Estilo42">Lista de Selecci&oacute;n - Tipos Tablas </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_categorias.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="466">
    <tr>
      <td width="76">&nbsp;</td>
      <td width="387">&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="nombre_busqueda" type="text" id="nombre_busqueda" value="<?php echo $nombre_busqueda; ?>" size="35" maxlength="35" />
        <input name="b_buscar" type="submit" id="b_buscar" value="     Buscar     " /></td>
      </tr>
  </table>
  <div id="resultado">
    <table width="493" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="68" bgcolor="#003300"><div align="center"><span class="Estilo38">C&oacute;digo</span></div></td>
        <td width="379" bgcolor="#003300"><div align="center"><span class="Estilo38">Descripci&oacute;n</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
			$conectar=conectar_BD();
		   if($nombre_busqueda==''){		
              $sql01="select cod_cate as id, nomb_cate as des, tmp as tmp, tmp2 as tmp2 from m_vu_categorias order by cod_cate ";
		   }else{
              $sql01="select cod_cate as id, nomb_cate as des, tmp as tmp, tmp2 as tmp2 from m_vu_categorias where nomb_cate like '%$nombre_busqueda%' 
			  order by cod_cate ";
		   }	  
           $resultado=mysql_query($sql01,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
           if(mysql_num_rows($resultado)>0) 
	       {
    		  while($registro=mysql_fetch_assoc($resultado)) 
              { 
                  $i++;
				  $cod=$registro['id'];
				  $cod=str_replace(" ","&nbsp;",$cod);
                  $nombre=$registro['des'];
				  $nombre=str_replace(" ","&nbsp;",$nombre);
                  $tmp=$registro['tmp'];
				  $tmp=str_replace(" ","&nbsp;",$tmp);
                  $tmp2=$registro['tmp2'];
				  $tmp2=str_replace(" ","&nbsp;",$tmp2);
				  
				  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod','$nombre','$tmp','$tmp2');\"><td>$cod</td><td>$nombre</td></tr>";
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
