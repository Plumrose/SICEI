<?php
  session_start();
  $nombre_busqueda=$_POST['nombre_busqueda'];
  $tipo_objeto=$_POST['tipo_objeto'];
?>
<script language=javascript>
function datos(cod,nombre){
  opener.document.form1.cod_atributo.value=cod;
  opener.document.form1.desc_atributo2.value=nombre;
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
	width:518px;
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
	width:517px;
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
	width:519px;
	height:265px;
	z-index:1;
	left: -1px;
}
.Estilo38 {color: #FFFFFF; font-weight: bold; font-family: "Courier New", Courier, monospace; }
.Estilo41 {
	color: #009900;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<p class="efecha">&nbsp;</p>
<div id="Layer1">
  <div align="center" class="Estilo28">
    <p class="Estilo41">Lista de Atributos de Componentes </p>
  </div>
</div>
<form id="form1" name="form1" method="post" action="selec_atributos.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<div id="busqueda">
  <table width="519">
    <tr>
      <td width="136">&nbsp;</td>
      <td width="342">&nbsp;</td>
      </tr>
    <tr>
      <td><select name="tipo_objeto" size="1" id="tipo_objeto" >
        <?php
          $opciones = array(00=>'Seleccione',01=>'Tipos de Componentes',02=>'Tipos de Procesadores',04=>'Marcas',05=>'Modelos');
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
    <table width="518" border="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="Estilo28">
      <tr>
        <td width="90" bgcolor="#003300"><div align="center"><span class="Estilo38">C&oacute;digo</span></div></td>
        <td width="380" bgcolor="#003300"><div align="center"><span class="Estilo38">Descripci&oacute;n</span></div></td>
      </tr>
        <?php
           //CONECTAR CON LA BASE DE DATOS DE MYSQL
           $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
                die("Problemas  con la conexi�n a la base de datos");
           mysql_select_db('siceiplum',$conectar) or
                die("ERROR con la base de datos");
		   if($tipo_objeto!=''){
		   	  if($tipo_objeto=='01'){ 
  		         if($nombre_busqueda==''){		
                    $sql01="select cod_tipo as id, desc_tipo as des from m_tipo_componente";
		         }else{
                    $sql01="select cod_tipo as id, desc_tipo as des from m_tipo_componente where cod_tipo like '%$nombre_busqueda%'";
		         }	  
		      }
		   	  if($tipo_objeto=='02'){ 	
  		         if($nombre_busqueda==''){		
                    $sql01="select cod_procesa as id, desc_procesa as des from m_tipo_procesadores";
		         }else{
                    $sql01="select cod_procesa as id, desc_procesa as des from m_tipo_procesadores where cod_procesa like '%$nombre_busqueda%'";
		         }	  
		      }
		   	  if($tipo_objeto=='04'){ 	
  		         if($nombre_busqueda==''){		
                    $sql01="select cod_marca as id, desc_marca as des from m_marcas";
		         }else{
                    $sql01="select cod_marca as id, desc_marca as des from m_marcas where desc_marca like '%$nombre_busqueda%'";
		         }	  
		      }
		   	  if($tipo_objeto=='05'){ 	
  		         if($nombre_busqueda==''){		
                    $sql01="select cod_modelo as id, desc_modelo as des from m_modelos";
		         }else{
                    $sql01="select cod_modelo as id, desc_modelo as des from m_modelos where desc_modelo like '%$nombre_busqueda%'";
		         }	  
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
				  echo "<tr OnMouseOver=Resaltar_On(this);' OnMouseOut='Resaltar_Off(this);' OnClick=\"datos('$cod','$nombre');\"><td>$cod</td><td>$nombre</td></tr>";
   		      }
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
