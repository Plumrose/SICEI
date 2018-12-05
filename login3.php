<?php
// TOMA LOS DATOS DEL FORMULARIO
session_start();
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$btn=$_POST['Submit'];
$fecha_hoy= date("Y-m-d");
$hora= date("G:H:s");
$vg_fecha= date("F d, Y");
//----------------------------------------------------------
// Busca los datos de conexión de la BD
$servidor='localhost';
$usuario_adm='root';
$clave='';
//----------------------------------------------------------
// CREA LAS VARIABLES DE SESSION
$_SESSION['servidor']=$servidor;
$_SESSION['usuario_adm']=$usuario_adm;
$_SESSION['clave']=$clave;
//----------------------------------------------------------
// Si se ejecuto el boton para ingresar al sistema
if($btn=='Acceder al Sistema'){
  //Conectar con mysql
   $conectar=mysql_connect($servidor,$usuario_adm,$clave) or
     die("Problemas con la conexión a la base de datos");
  //SELECCIONAR BD
  mysql_select_db('siceiplum',$conectar) or
     die("ERROR con la base de datos");
  //CREAR CONSULTA(QUERY)
  $sql1="SELECT cod_usuario as cod_usuario, nom_usuario as nom_usuario, ape_usuario as ape_usuario, fec_ult_acceso as fec_ult_acceso, status_usuario as status_usuarios,fec_ult_cambio as fec_ult_cambio, tipo_usuario as tipo_usuario FROM m_usuarios where cod_usuario='$usuario' AND password='$password'";
  $sql2="SELECT cod_usuario as cod_usuario, nom_usuario as nom_usuario, ape_usuario as ape_usuario, fec_ult_acceso as fec_ult_acceso, status_usuario as status_usuarios,fec_ult_cambio as fec_ult_cambio, tipo_usuario as tipo_usuario FROM m_usuarios where cod_usuario='$usuario'";
  //Verifica si el usuario es correcto
  $resul=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
  if(mysql_num_rows($resul)>0){
//    Verifica si el usuario esta bloqueado por intentos fallidos
      $regis=mysql_fetch_assoc($resul);
      if ($regis['status_usuarios']=='02'){
         //Usuario bloqueado 
  	     $pasa = 0;
	  }else{
        //USUARIO CORRECTO - Verifica si la clave es correcta
        $resul2=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
	    if(mysql_num_rows($resul2)==0){
            //LA CLAVE INCORRECTA - Registra los errores de claves
           $sql3="insert into t_registro_ingreso(cod_usuario,password,fecha_registro,hora_reg) values      
		   ('$usuario','$password','$fecha_hoy','$hora')";
           $resul3=mysql_query($sql3,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
		   $pasa = 5;
	    }
	    else{
           //LA CLAVE CORRECTA - Verifica el estatus del usuario
           $registro=mysql_fetch_assoc($resul2);
           if ($registro['status_usuarios']=='02'){
              //Usuario bloqueado 
  	          $pasa = 0;
	       }
           if ($registro['status_usuarios']=='04'){
              //Usuario inactivo
  	          $pasa = 4;
	       }
           if ($registro['status_usuarios']=='03'){
              //Para cambio de clave
	          $pasa = 3;
	       }
           if ($registro['status_usuarios']=='01'){
            $usuario1=$registro['cod_usuario'];
            $nombre1=$registro['nom_usuario'];
            $apellido1=$registro['ape_usuario'];
	        $fecha_acceso1=$registro['fec_ult_acceso'];
			$tipo_usuario1=$registro['tipo_usuario'];
//          Verifica si el usuario requiere cambio de clave por tiempo
            $fec_inicio =$registro['fec_ult_cambio'];
		    $dias = (strtotime($fec_inicio)-strtotime($fecha_hoy))/86400;
	        $dias = abs($dias); 
		    $dias = floor($dias);		
     	    $tdias= 3 * 30;
		    if ( $dias > $tdias){
//             Para cambio de clave
	           $pasa = 3;
		   }
           else{
//             Usuario sin problemas...
               $pasa = 1;  
//             Actualiza la fecha y hora de ingreso en la tabla de usuarios
               $sql4="update m_usuarios set fec_ult_acceso='$fecha_hoy', hora_ult_acceso='$hora' where cod_usuario='$usuario1'";
	           $resul=mysql_query($sql4,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
	       }		
         }	
		} 	
      } 
  }
  else{
     // USUARIO INCORRECTO  
 	 $pasa = 2;
  }
// Verifica la cantidad de accesos incorrectos del día para el usuario a fin de bloquear en caso que no este bloqueado
//if ($pasa == 1){
  $sql5="SELECT count(*) as cantidad FROM t_registro_ingreso where cod_usuario='$usuario' AND fecha_registro='$fecha_hoy' and estatus =' '";
  $resul=mysql_query($sql5,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
  if(mysql_num_rows($resul)>0){
    $registro=mysql_fetch_assoc($resul);
    if ($registro['cantidad']>='03'){
//      Bloquea el usuario y envia mensaje  
        $sql6="update m_usuarios set status_usuario='02' where cod_usuario='$usuario'";
        $resul6=mysql_query($sql6,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
  	    if($resul6==true){
           $ind_flag='6';
		   $pasa = '6';
//           alert('El Usuario fue Bloqueado por Intentos Fallidos');
	    }
	} 
  }
//}
  $_SESSION['activa']=0;
  mysql_close($conectar);
  if($pasa == 1){
//   ACCESO AL SISTEMA  
     $_SESSION['activa']=1;
     $_SESSION['usuario']=$usuario1;
     $_SESSION['nombre']=$nombre1;
     $_SESSION['apellido']=$apellido1;
	 $_SESSION['fecha_acceso']=$fecha_acceso1;
     $_SESSION['tipo_user']=$tipo_usuario1;
     ?>
     <script>
     window.location='index.php';
     </script>
     <?php 
  }
  if($pasa ==0){
    $ind_flag='1';
//    alert("Usuario Bloqueado, Por favor Notificar al Administrador") 
  }
  if($pasa ==2){
    $ind_flag='2';
//   alert("Usuario Invalido, Por favor Verificar") 
  }
  if($pasa ==3){
    $ind_flag='3';
  }
  if($pasa ==4){
     $ind_flag='4';
//    alert("Usuario Inactivo, Por favor Notificar al Administrador")
  }
  if($pasa ==5){
    $ind_flag='5';
//    alert("Contraseña Invalida, al tercer intento fallido se bloqueará el Usuario")
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema para el Control de Equipos Inform&aacute;ticos</title>
<link href="siceiplum_estilos.css" rel="stylesheet" type="text/css" />

<script type="text/JavaScript">
<!--

//function MM_findObj(n, d) { //v4.01
//  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
//    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
//  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
//  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
//  if(!x && d.getElementById) x=d.getElementById(n); return x;
//}

//function MM_showHideLayers() { //v6.0
//  var i,p,v,obj,args=MM_showHideLayers.arguments;
//  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
//    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
//    obj.visibility=v; }
//}
//-->

function valida(){ //v4.0
  var errors='';
  if(document.form3.usuario.value==''){
  errors+='- Debe introducir usuario.\n';
   }
    if(document.form3.password.value==''){
  errors+='- Debe introducir contraseña.\n';
   }

  if (errors) alert('Los siguientes parámetros son requeridos:\n'+errors);
  document.MM_returnValue = (errors == '');
}

</script>

<style type="text/css">
<!--
.Estilo26 {font-size: 14px}

#Contenedor {
  width: 590px; 
  margin: 0 auto;
}

-->
</style>
</head>

<body>
<div id="hh" style="width: 680px; position: relative; margin-left: auto; margin-right: auto;">
  <div id="c_encabezado">
<div id="Contenedor">
  <div id="Layer43"></div>
  <p>&nbsp;</p>
    <div id="Layer44" title="Para ingresar al Sistema SICEI se deber&aacute; indicar el usuario y la Contrase&ntilde;a. Es importante indicar que al tercer intento fallido el usuario ser&aacute; bloqueado y deber&aacute; comunicarse con el Administrador del Sistema">
     <div id="Layer46"><img src="imagenes/img_main.jpg" alt="imagen" width="243" height="101" /></div>
  <form id="form3" name="form3" method="post" action="login.php">
    <p>&nbsp;</p>
    <div id="Layer57">
      <table width="325" height="106">
        <tr>
          <td width="188" height="65"><div align="left"><span class="estilo_usuario">Nombre de Usuario</span></div></td>
          <td width="125"><input name="usuario" type="text" class="Estilo24" id="usuario" title="Introduzca el usuario" value="<?php echo $usuario; ?>" size="15" maxlength="10" /></td>
        </tr>
        <tr>
          <td height="32"><div align="left"><span class="estilo_usuario">Contrase&ntilde;a</span></div></td>
          <td><input name="password" type="password" class="Estilo24" id="password" title="Introduzca la contrase&ntilde;a, al tercer intento fallido el usuario ser&aacute; bloqueado" size="15" maxlength="10" /></td>
        </tr>
      </table>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;     </p>
    <div id="Layer58">
      
          <div align="center">
            <input name="Submit" type="submit" class="estilos_botones" title="Entrada al Sistema SICEI en caso de ser correcto el Usuario y la Contrase&ntilde;a" onClick=" valida();return document.MM_returnValue " value="Acceder al Sistema"/>
            </div>
    </div>
    <p>&nbsp;</p>
  </form>
</div>
<div id="Layer45" onfocus="MM_showHideLayers('Layer44','','hide')"><img src="imagenes/logo_plum.png" alt="logo" width="125" height="113" /></div>
<div id="Layer48">
  <div align="center" class="Estilo1">Bienvenidos a SICEI-PLUM </div>
</div>
<div id="Layer49">
  <div align="center" class="e-etiquetas_clave">Sistema de Informaci&oacute;n para el Control de Equipos Inform&aacute;ticos </div>
</div>
<div class="efecha" id="Layer51">
  <div class="subHeader Estilo26" id="Layer53">
    <div align="center"><span class="Estilo26">Acceso al Sistema</span> 
      <!--Por favor introduzca su Usuario y Contraseña -->
    </div>
  </div>
  <div align="right" class="Estilo25">
    
    <div align="right"></div>
  </div>
  <div align="center">
    <?php 
  	  echo $vg_fecha;
	  ?>
  </div>
</div>
<div align="center"></div>
<div align="center"></div>
</div>
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
</div>
</body>
</html>
 <?php 
 if ($ind_flag == '1') { 
     ?>
    <script>
     alert('Usuario Bloqueado, Por favor Notificar al Administrador');
    </script>
    <?php 
 }
 if ($ind_flag == '2') { 
     ?>
    <script>
     alert('Usuario Invalido, Por favor Verificar');
    </script>
    <?php 
 }
 if ($ind_flag == '3') { 
     ?>
    <script>
     alert('Se ha venciado su clave de acceso por tanto debe ser cambiada');
    </script>
    <?php 
    $_SESSION['usuario']=$usuario1;
     $_SESSION['tipo_user']=$tipo_usuario1;
    $_SESSION['activa']=1;
    ?>
    <script>
    window.location='SICEI_PAG_027.php';
    </script>
    <?php 
 }
 if ($ind_flag == '4') { 
     ?>
    <script>
     alert('Usuario Inactivo, Por favor Notificar al Administrador');
    </script>
    <?php 
 }
 if ($ind_flag == '5') { 
     ?>
    <script>
     alert('Contraseña Invalida, al tercer intento fallido se bloqueará el Usuario');
    </script>
    <?php 
 }
if ($ind_flag == '6') { 
     ?>
    <script>
     alert('El Usuario fue Bloqueado por Intentos Fallidos');
    </script>
    <?php 
 }
  
?>

