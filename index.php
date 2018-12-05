<?php
Include ("rutinasphp.php");
session_start();
//$vg_fecha= date("F d, Y");
$vg_fecha = fecha();
if($_SESSION['activa']!=1){
 ?>
  <script>
   window.location='login.php';
   </script>
   <?php
   return;
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<title>Home Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
<!--

function mmLoadMenus() {
  if (window.mm_menu_0607202158_0) return;
  window.mm_menu_0607202158_0 = new Menu("root",151,18,"",12,"#000000","#FFFFFF","#CCCCCC","#003300","left","middle",3,0,1000,-5,7,true,false,true,0,true,true);
  mm_menu_0607202158_0.addMenuItem("Maestro de Roles","location='pagina prueba.html'");
  mm_menu_0607202158_0.addMenuItem("Maestro de Usuarios","location='pagina prueba.html'");
   mm_menu_0607202158_0.hideOnMouseOut=true;
   mm_menu_0607202158_0.bgColor='#555555';
   mm_menu_0607202158_0.menuBorder=1;
   mm_menu_0607202158_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0607202158_0.menuBorderBgColor='#777777';

  window.mm_menu_0607202818_0 = new Menu("root",151,18,"",12,"#000000","#FFFFFF","#CCCCCC","#003300","left","middle",3,0,1000,-5,7,true,false,true,0,true,true);
  mm_menu_0607202818_0.addMenuItem("Maestro&nbsp;de&nbsp;Roles","location='pagina prueba.html'");
  mm_menu_0607202818_0.addMenuItem("Maestro&nbsp;de&nbsp;Usuarios","location='pagina prueba.html'");
   mm_menu_0607202818_0.hideOnMouseOut=true;
   mm_menu_0607202818_0.bgColor='#555555';
   mm_menu_0607202818_0.menuBorder=1;
   mm_menu_0607202818_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0607202818_0.menuBorderBgColor='#777777';

                                                                                                                                                                    window.mm_menu_0629223241_0_1 = new Menu("Componentes",240,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0629223241_0_1.addMenuItem("Maestro&nbsp;de&nbsp;Componentes","location='SICEI_PAG_006.php'");
    mm_menu_0629223241_0_1.addMenuItem("Atributos","location='SICEI_PAG_007.php'");
    mm_menu_0629223241_0_1.addMenuItem("Grupos&nbsp;de&nbsp;Artículos","location='SICEI_PAG_049.php'");
     mm_menu_0629223241_0_1.hideOnMouseOut=true;
     mm_menu_0629223241_0_1.bgColor='#FFFFFF';
     mm_menu_0629223241_0_1.menuBorder=1;
     mm_menu_0629223241_0_1.menuLiteBgColor='#FFFFFF';
     mm_menu_0629223241_0_1.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0629223241_0_2 = new Menu("Servidores",240,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0629223241_0_2.addMenuItem("Maestro&nbsp;de&nbsp;Servidores","location='SICEI_PAG_008.php'");
    mm_menu_0629223241_0_2.addMenuItem("Atributos","location='SICEI_PAG_009.php'");
     mm_menu_0629223241_0_2.hideOnMouseOut=true;
     mm_menu_0629223241_0_2.bgColor='#FFFFFF';
     mm_menu_0629223241_0_2.menuBorder=1;
     mm_menu_0629223241_0_2.menuLiteBgColor='#FFFFFF';
     mm_menu_0629223241_0_2.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0629223241_0_3 = new Menu("Solicitantes",240,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0629223241_0_3.addMenuItem("Solicitantes","location='SICEI_PAG_010.php'");
    mm_menu_0629223241_0_3.addMenuItem("Jerarquía&nbsp;Organizativa","location='SICEI_PAG_011.php'");
    mm_menu_0629223241_0_3.addMenuItem("Localidades","location='SICEI_PAG_030.php'");
    mm_menu_0629223241_0_3.addMenuItem("Ubicaciones","location='SICEI_PAG_050.php'");
     mm_menu_0629223241_0_3.hideOnMouseOut=true;
     mm_menu_0629223241_0_3.bgColor='#FFFFFF';
     mm_menu_0629223241_0_3.menuBorder=1;
     mm_menu_0629223241_0_3.menuLiteBgColor='#FFFFFF';
     mm_menu_0629223241_0_3.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0629223241_0_4 = new Menu("Proveedores",240,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0629223241_0_4.addMenuItem("Provedores","location='SICEI_PAG_012.php'");
    mm_menu_0629223241_0_4.addMenuItem("Atributos&nbsp;de&nbsp;Proveedores","location='SICEI_PAG_013.php'");
     mm_menu_0629223241_0_4.hideOnMouseOut=true;
     mm_menu_0629223241_0_4.bgColor='#FFFFFF';
     mm_menu_0629223241_0_4.menuBorder=1;
     mm_menu_0629223241_0_4.menuLiteBgColor='#FFFFFF';
     mm_menu_0629223241_0_4.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0629223241_0_5 = new Menu("Softwares",240,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0629223241_0_5.addMenuItem("Tipos&nbsp;de&nbsp;Software","location='SICEI_PAG_038.PHP'");
    mm_menu_0629223241_0_5.addMenuItem("Listas&nbsp;de&nbsp;Software","location='SICEI_PAG_039.PHP'");
    mm_menu_0629223241_0_5.addMenuItem("Maestro&nbsp;de&nbsp;Software","location='SICEI_PAG_037.PHP'");
     mm_menu_0629223241_0_5.hideOnMouseOut=true;
     mm_menu_0629223241_0_5.bgColor='#FFFFFF';
     mm_menu_0629223241_0_5.menuBorder=1;
     mm_menu_0629223241_0_5.menuLiteBgColor='#FFFFFF';
     mm_menu_0629223241_0_5.menuBorderBgColor='#FFFFFF';
  window.mm_menu_0629223241_0 = new Menu("root",240,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
  mm_menu_0629223241_0.addMenuItem(mm_menu_0629223241_0_1);
  mm_menu_0629223241_0.addMenuItem(mm_menu_0629223241_0_2);
  mm_menu_0629223241_0.addMenuItem(mm_menu_0629223241_0_3);
  mm_menu_0629223241_0.addMenuItem(mm_menu_0629223241_0_4);
  mm_menu_0629223241_0.addMenuItem(mm_menu_0629223241_0_5);
  mm_menu_0629223241_0.addMenuItem("Almacenes","location='SICEI_PAG_014.php'");
  mm_menu_0629223241_0.addMenuItem("Analistas&nbsp;CTS","location='SICEI_PAG_015.php'");
  mm_menu_0629223241_0.addMenuItem("Tipos&nbsp;de&nbsp;Solicitudes","location='SICEI_PAG_029.php'");
  mm_menu_0629223241_0.addMenuItem("Maestro&nbsp;de&nbsp;Proyectos","location='SICEI_PAG_036.php'");
   mm_menu_0629223241_0.hideOnMouseOut=true;
   mm_menu_0629223241_0.childMenuIcon="arrows.gif";
   mm_menu_0629223241_0.bgColor='#FFFFFF';
   mm_menu_0629223241_0.menuBorder=1;
   mm_menu_0629223241_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0629223241_0.menuBorderBgColor='#FFFFFF';
window.mm_menu_0630132004_0_1 = new Menu("Gestión&nbsp;de&nbsp;Asignación&nbsp;PC-Impres.",235,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630132004_0_1.addMenuItem("Asignar&nbsp;Instalación","location='SICEI_PAG_005.php'");
    mm_menu_0630132004_0_1.addMenuItem("Desincorporación&nbsp;","location='SICEI_PAG_004.php'");
    mm_menu_0630132004_0_1.addMenuItem("Cambio&nbsp;en&nbsp;Asignación&nbsp;de&nbsp;Equipos","location='SICEI_PAG_041.php'");
    mm_menu_0630132004_0_1.addMenuItem("Cambios&nbsp;en&nbsp;Nombre&nbsp;de&nbsp;Instalación","location='SICEI_PAG_043.php'");
     mm_menu_0630132004_0_1.hideOnMouseOut=true;
     mm_menu_0630132004_0_1.bgColor='#FFFFFF';
     mm_menu_0630132004_0_1.menuBorder=1;
     mm_menu_0630132004_0_1.menuLiteBgColor='#FFFFFF';
     mm_menu_0630132004_0_1.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0630132004_0_2 = new Menu("Gestión&nbsp;Asignación&nbsp;Otros&nbsp;Activos",235,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630132004_0_2.addMenuItem("Asignación&nbsp;de&nbsp;Componentes","location='SICEI_PAG_046.php'");
    mm_menu_0630132004_0_2.addMenuItem("Desincorporación&nbsp;de&nbsp;Componentes","location='SICEI_PAG_055.php'");
    mm_menu_0630132004_0_2.addMenuItem("Actualización&nbsp;de&nbsp;Asignaciones","location='SICEI_PAG_056.php'");
     mm_menu_0630132004_0_2.hideOnMouseOut=true;
     mm_menu_0630132004_0_2.bgColor='#FFFFFF';
     mm_menu_0630132004_0_2.menuBorder=1;
     mm_menu_0630132004_0_2.menuLiteBgColor='#FFFFFF';
     mm_menu_0630132004_0_2.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0630132004_0_3 = new Menu("Telecomunicaciones",235,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630132004_0_3.addMenuItem("Asignación&nbsp;de&nbsp;Enlaces","location='SICEI_PAG_051.php'");
    mm_menu_0630132004_0_3.addMenuItem("Tipos&nbsp;de&nbsp;Enlaces","location='SICEI_PAG_052.php'");
    mm_menu_0630132004_0_3.addMenuItem("Gestión&nbsp;de&nbsp;Telefonía","location='SICEI_PAG_053.php'");
     mm_menu_0630132004_0_3.hideOnMouseOut=true;
     mm_menu_0630132004_0_3.bgColor='#FFFFFF';
     mm_menu_0630132004_0_3.menuBorder=1;
     mm_menu_0630132004_0_3.menuLiteBgColor='#FFFFFF';
     mm_menu_0630132004_0_3.menuBorderBgColor='#FFFFFF';
  window.mm_menu_0630132004_0 = new Menu("root",235,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
  mm_menu_0630132004_0.addMenuItem("Aperturar&nbsp;Solicitud","location='SICEI_PAG_001.php'");
  mm_menu_0630132004_0.addMenuItem("Confirmar&nbsp;Solicitud","location='SICEI_PAG_002.php'");
  mm_menu_0630132004_0.addMenuItem("Cancelar&nbsp;Solicitud","location='SICEI_PAG_003.php'");
  mm_menu_0630132004_0.addMenuItem(mm_menu_0630132004_0_1,"location='SICEI_PAG_005.php'");
  mm_menu_0630132004_0.addMenuItem("Devolución&nbsp;de&nbsp;Componentes","location='SICEI_PAG_054.php'");
  mm_menu_0630132004_0.addMenuItem(mm_menu_0630132004_0_2);
  mm_menu_0630132004_0.addMenuItem("Asignación&nbsp;de&nbsp;Software&nbsp;a&nbsp;Equipos","location='SICEI_PAG_040.php'");
  mm_menu_0630132004_0.addMenuItem(mm_menu_0630132004_0_3);
   mm_menu_0630132004_0.hideOnMouseOut=true;
   mm_menu_0630132004_0.childMenuIcon="arrows.gif";
   mm_menu_0630132004_0.bgColor='#FFFFFF';
   mm_menu_0630132004_0.menuBorder=1;
   mm_menu_0630132004_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0630132004_0.menuBorderBgColor='#FFFFFF';
                window.mm_menu_0630133114_0_1 = new Menu("Traspasos",229,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630133114_0_1.addMenuItem("Traspasos&nbsp;entre&nbsp;Almacenes","location='SICEI_PAG_018.php'");
    mm_menu_0630133114_0_1.addMenuItem("Cambios&nbsp;de&nbsp;Estatus&nbsp;de&nbsp;Stock","location='SICEI_PAG_058.php'");
     mm_menu_0630133114_0_1.hideOnMouseOut=true;
     mm_menu_0630133114_0_1.bgColor='#FFFFFF';
     mm_menu_0630133114_0_1.menuBorder=1;
     mm_menu_0630133114_0_1.menuLiteBgColor='#FFFFFF';
     mm_menu_0630133114_0_1.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0630133114_0_2 = new Menu("Inventario&nbsp;Fisíco",229,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630133114_0_2.addMenuItem("Documento&nbsp;de&nbsp;Inventario","location='SICEI_PAG_019.php'");
    mm_menu_0630133114_0_2.addMenuItem("Registro&nbsp;de&nbsp;Diferencias","location='SICEI_PAG_020.php'");
    mm_menu_0630133114_0_2.addMenuItem("Contabilizar&nbsp;Diferencias","location='SICEI_PAG_021.php'");
     mm_menu_0630133114_0_2.hideOnMouseOut=true;
     mm_menu_0630133114_0_2.bgColor='#FFFFFF';
     mm_menu_0630133114_0_2.menuBorder=1;
     mm_menu_0630133114_0_2.menuLiteBgColor='#FFFFFF';
     mm_menu_0630133114_0_2.menuBorderBgColor='#FFFFFF';
  window.mm_menu_0630133114_0 = new Menu("root",229,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
  mm_menu_0630133114_0.addMenuItem("Movimientos&nbsp;de&nbsp;Entradas","location='SICEI_PAG_016.php'");
  mm_menu_0630133114_0.addMenuItem("Movimientos&nbsp;de&nbsp;Salida","location='SICEI_PAG_017.php'");
  mm_menu_0630133114_0.addMenuItem("Entradas&nbsp;en&nbsp;Masa","location='SICEI_PAG_059.php'");
  mm_menu_0630133114_0.addMenuItem(mm_menu_0630133114_0_1);
  mm_menu_0630133114_0.addMenuItem(mm_menu_0630133114_0_2);
   mm_menu_0630133114_0.hideOnMouseOut=true;
   mm_menu_0630133114_0.childMenuIcon="arrows.gif";
   mm_menu_0630133114_0.bgColor='#FFFFFF';
   mm_menu_0630133114_0.menuBorder=1;
   mm_menu_0630133114_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0630133114_0.menuBorderBgColor='#FFFFFF';
                                                          window.mm_menu_0630133459_0_1 = new Menu("Fotos&nbsp;Tecnológicas",213,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630133459_0_1.addMenuItem("Foto&nbsp;Tecnológica","location='SICEI_PAG_022.php'");
    mm_menu_0630133459_0_1.addMenuItem("Foto&nbsp;Tecnológica&nbsp;Foods","location='SICEI_PAG_034.php'");
    mm_menu_0630133459_0_1.addMenuItem("Laptops&nbsp;Foods","location='SICEI_PAG_047.php'");
    mm_menu_0630133459_0_1.addMenuItem("Foto&nbsp;Consolidada","location='SICEI_PAG_063.php'");
     mm_menu_0630133459_0_1.hideOnMouseOut=true;
     mm_menu_0630133459_0_1.bgColor='#FFFFFF';
     mm_menu_0630133459_0_1.menuBorder=1;
     mm_menu_0630133459_0_1.menuLiteBgColor='#FFFFFF';
     mm_menu_0630133459_0_1.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0630133459_0_2 = new Menu("Gestión&nbsp;de&nbsp;Stock",213,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630133459_0_2.addMenuItem("Componentes&nbsp;en&nbsp;Tránsitos","location='SICEI_PAG_065.php'");
    mm_menu_0630133459_0_2.addMenuItem("Stock&nbsp;de&nbsp;Almacén","location='SICEI_PAG_023.php'");
    mm_menu_0630133459_0_2.addMenuItem("Movimientos&nbsp;de&nbsp;Stock","location='SICEI_PAG_024.php'");
     mm_menu_0630133459_0_2.hideOnMouseOut=true;
     mm_menu_0630133459_0_2.bgColor='#FFFFFF';
     mm_menu_0630133459_0_2.menuBorder=1;
     mm_menu_0630133459_0_2.menuLiteBgColor='#FFFFFF';
     mm_menu_0630133459_0_2.menuBorderBgColor='#FFFFFF';
    window.mm_menu_0630133459_0_3 = new Menu("Gestión&nbsp;Ciclo&nbsp;de&nbsp;Vida",213,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
    mm_menu_0630133459_0_3.addMenuItem("Indicador&nbsp;Ciclo&nbsp;de&nbsp;Vida","location='SICEI_PAG_060.php'");
    mm_menu_0630133459_0_3.addMenuItem("Configuración&nbsp;de&nbsp;Indicador","location='SICEI_PAG_061.php'");
    mm_menu_0630133459_0_3.addMenuItem("Verificación&nbsp;Fecha&nbsp;de&nbsp;Compras","location='SICEI_PAG_067.php'");
     mm_menu_0630133459_0_3.hideOnMouseOut=true;
     mm_menu_0630133459_0_3.bgColor='#FFFFFF';
     mm_menu_0630133459_0_3.menuBorder=1;
     mm_menu_0630133459_0_3.menuLiteBgColor='#FFFFFF';
     mm_menu_0630133459_0_3.menuBorderBgColor='#FFFFFF';
  window.mm_menu_0630133459_0 = new Menu("root",213,30,"Arial, Helvetica, sans-serif",14,"#000000","#FFFFFF","#E1FDA2","#CC6600","left","middle",3,0,1000,-5,7,true,true,true,2,false,false);
  mm_menu_0630133459_0.addMenuItem(mm_menu_0630133459_0_1);
  mm_menu_0630133459_0.addMenuItem("Inventario&nbsp;Consolidado","location='SICEI_PAG_045.php'");
  mm_menu_0630133459_0.addMenuItem("Inventarios&nbsp;Otros&nbsp;Activos","location='SICEI_PAG_048.php'");
  mm_menu_0630133459_0.addMenuItem(mm_menu_0630133459_0_2,"location='SICEI_PAG_065.php'");
  mm_menu_0630133459_0.addMenuItem("Historial&nbsp;de&nbsp;Asignaciones","location='SICEI_PAG_057.php'");
  mm_menu_0630133459_0.addMenuItem("Consulta&nbsp;de&nbsp;Asignaciones","location='SICEI_PAG_062.php'");
  mm_menu_0630133459_0.addMenuItem("Consulta&nbsp;de&nbsp;Desincorporaciones","location='SICEI_PAG_066.php'");
  mm_menu_0630133459_0.addMenuItem(mm_menu_0630133459_0_3);
   mm_menu_0630133459_0.hideOnMouseOut=true;
   mm_menu_0630133459_0.childMenuIcon="arrows.gif";
   mm_menu_0630133459_0.bgColor='#FFFFFF';
   mm_menu_0630133459_0.menuBorder=1;
   mm_menu_0630133459_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0630133459_0.menuBorderBgColor='#FFFFFF';

mm_menu_0630133459_0.writeMenus();
} // mmLoadMenus()
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("Enero","Febrero","Marzo","April","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
//-->
</script>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	font-weight: bold;
	color: #FF9900;
}
#Layer1 {
	position:absolute;
	width:565px;
	height:45px;
	z-index:1;
	left: 431px;
	top: 26px;
}
#Layer2 {
	position:absolute;
	width:145px;
	height:106px;
	z-index:1;
	left: 35px;
	top: 3px;
}
#ideusuario {
	position:absolute;
	width:225px;
	height:21px;
	z-index:2;
	left: 3px;
	top: 460px;
}
#Layer4 {
	position:absolute;
	width:257px;
	height:227px;
	z-index:3;
	left: 1014px;
	top: 404px;
}
.Estilo6 {
	font-size: 14px;
	color: #3F6547;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo7 {font-size: 12px}
#Layer5 {
	position:absolute;
	width:56px;
	height:23px;
	z-index:4;
	left: 1198px;
	top: 215px;
}
.Estilo8 {
	color: #993300;
	font-size: 14px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
#Layer6 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:5;
	left: 989px;
	top: 179px;
}
#c_baner {
	position:absolute;
	width:903px;
	height:186px;
	z-index:5;
	left: 253px;
	top: 420px;
}
#nombre {
	position:absolute;
	width:227px;
	height:29px;
	z-index:6;
	left: 3px;
	top: 482px;
}
#acceso {
	position:absolute;
	width:225px;
	height:33px;
	z-index:7;
	left: 3px;
	top: 512px;
}
#Layer3 {
	position:absolute;
	width:72px;
	height:64px;
	z-index:8;
	left: 1175px;
	top: 197px;
}
#Layer7 {
	position:absolute;
	width:71px;
	height:23px;
	z-index:9;
	left: 1177px;
	top: 266px;
}
#capa_fecha {
	position:absolute;
	width:204px;
	height:23px;
	z-index:10;
	left: 386px;
	top: 333px;
}
#Layer8 {
	position:absolute;
	width:93px;
	height:29px;
	z-index:11;
	left: 1051px;
	top: 174px;
}
#Layer9 {
	position:absolute;
	width:338px;
	height:151px;
	z-index:8;
	left: 820px;
	top: 233px;
}
#Layer10 {
	position:absolute;
	width:331px;
	height:220px;
	z-index:9;
	left: 533px;
	top: 142px;
}
.Estilo11 {
	color: #FF8204;
	font-weight: bold;
	font-size: 16px;
}
.Estilo12 {
	font-family: Arial;
	font-size: 12px;
}
.Estilo13 {font-size: 14px; }
#Layer11 {
	position:absolute;
	width:671px;
	height:27px;
	z-index:8;
	left: 356px;
	top: 53px;
}
#Layer12 {
	position:absolute;
	width:219px;
	height:35px;
	z-index:9;
	left: 4px;
	top: 546px;
}
-->
</style>
<script language="JavaScript" src="mm_menu.js"></script>
</head>
<body bgcolor="#F4FFE4">
<script language="JavaScript1.2">mmLoadMenus();</script>
<table width="113%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td colspan="3" rowspan="2">&nbsp;</td>
    <td height="50" colspan="3" align="center" valign="bottom" nowrap="nowrap" bgcolor="#D5EDB3" id="logo"><div align="center"><strong>SICEI-PLUM</strong> </div></td>
    <td width="428" rowspan="2"><div id="Layer2"><img src="imagenes/logo_plum.png" alt="logo_plum" width="155" height="109" longdesc="Logo Plumrose" /></div>    
    <img src="imagenes/img_main.png" alt="logo2" width="246" height="84" longdesc="Logo Sistema" /></td>
  </tr>
  <tr bgcolor="#D5EDB3">
    <td height="19" colspan="3" align="center" valign="middle" bgcolor="#D5EDB3" id="tagline"><p class="Estilo6">Sistema para el Control de Equipos Inform&aacute;ticos</p>
      <p align="center" class="Estilo11">PLUMROSE LATINOAMERICANA C.A </p></td>
  </tr>
  <tr bgcolor="#99CC66">
    <td height="20" colspan="7" bgcolor="#99CC66" id="dateformat">
        <table width="1276">
          <tr>
            <th width="199" height="36" bgcolor="#99CC66" scope="col"><span class="efecha Estilo12">
              <?php 
  	  echo $vg_fecha;
	  ?>
            </span></th>
            <th width="204" bgcolor="#99CC66" scope="col"><img src="imagenes/IMENU_01.jpg" alt="modulo01" name="image2" width="206" height="34" border="0" id="image2" onMouseOver="MM_showMenu(window.mm_menu_0629223241_0,0,29,null,'image2')" onMouseOut="MM_startTimeout();" /></th>
            <th width="246" bgcolor="#99CC66" scope="col"><img src="imagenes/IMENU_02.jpg" alt="modulo02" name="image1" width="246" height="33" id="image1" onMouseOver="MM_showMenu(window.mm_menu_0630132004_0,0,30,null,'image1')" onMouseOut="MM_startTimeout();" /></th>
            <th width="246" bgcolor="#99CC66" scope="col"><img src="imagenes/IMENU_03.jpg" alt="modulo03" name="image3" width="246" height="32" id="image3" onMouseOver="MM_showMenu(window.mm_menu_0630133114_0,0,33,null,'image3')" onMouseOut="MM_startTimeout();" /></th>
            <th width="245" bgcolor="#99CC66" scope="col"><img src="imagenes/IMENU_04.jpg" alt="modulo04" name="image4" width="245" height="34" id="image4" onMouseOver="MM_showMenu(window.mm_menu_0630133459_0,0,31,null,'image4')" onMouseOut="MM_startTimeout();" /></th>
            <th width="108" bgcolor="#99CC66" scope="col"><a href="finsesion.php"><img src="imagenes/IMENU_05.jpg" alt="salir_01" width="107" height="33" border="0" title="Salir del Sistema" longdesc="salir" /></a></th>
          </tr>
      </table></td>
  </tr>
  
  <tr>
    <td height="2" colspan="7" bgcolor="#5C743D"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>
  <tr>
    <td width="181" height="209" valign="top" bgcolor="#5C743D"><table border="0" cellspacing="0" cellpadding="0" width="181" id="navigation">
      <tr>
        <td width="184" height="36">&nbsp;<br />
        <br /></td>
      </tr>
      <tr>
        <td width="184"><div align="left" class="Estilo13"><a href="ayuda_sincei_detalleii.php" class="navText ">Funcionalidades SICEI </a></div></td>
      </tr>
      <tr>
        <td width="184"><div align="left" class="Estilo13"><a href="sicei_pag_027.php" class="navText">Cambio de Clave  </a></div></td>
      </tr>
<?php
	  if($_SESSION['tipo_user']=='01'){
?>
      <tr>
        <td width="184"><div align="left" class="Estilo13"><a href="sicei_pag_028.php" class="navText">Administraci&oacute;n Roles </a></div></td>
      </tr>
      <tr>
        <td width="184"><div align="left" class="Estilo13"><a href="sicei_pag_026.php" class="navText">Administraci&oacute;n  Usuario </a></div></td>
      </tr>
      <tr>
        <td width="184"><div align="left" class="Estilo13"><a href="sicei_pag_031.php" class="navText">Mantenimiento BD </a></div></td>
      </tr>
<?php
	  }
?>      
    </table>     </td>
    <td width="79">&nbsp;</td>
    <td colspan="2" valign="top"><p><br />
  &nbsp;</p>
      <table border="0" cellspacing="0" cellpadding="0" width="350">
        <tr>
          <td width="350" class="pageName"><p><strong>BIENVENIDOS A SICEI-PLUM</strong></p></td>
        </tr>
        <tr>
          <td class="bodyText"><p align="justify" class="Estilo7">Es un sistema de informaci&oacute;n bajo ambiente WEB, que le permitir&aacute; llevar el  control de las solicitudes de asignaciones y desincorporaciones de Hardware&nbsp; y&nbsp;  Software por parte del &aacute;rea de Operaciones. </p>
              <p align="right" class="Estilo1"><a href="acerca_de.php" class="subHeader">&nbsp;Acerca de SICEI...</a></p></td>
        </tr>
      </table>
      <div align="right"><br />    
    </div></td>
    <td width="80">&nbsp;</td>
    <td colspan="2" valign="top"><p>&nbsp;</p>
      <p><br />
      &nbsp;</p>
      <table width="200" height="120">
        <tr>
          <td><table border="0" cellspacing="0" cellpadding="0" width="332" id="leftcol">
            <tr>
              <td width="10" height="110">&nbsp;</td>
              <td width="177" class="smallText"><p align="justify"><span class="subHeader Estilo7">FUNCIONALIDADES PRINCIPALES </span><br />
                      <span class="Estilo7">Registro y control de las solicitudes de los usuarios. Asignaci&oacute;n de equipos y componentes. Control del Inventario de equipos inform&aacute;ticos. Generaci&oacute;n de la foto tecnol&oacute;gica </span></p></td>
              <td width="10">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <p><br />
      </p>
      <div class="Estilo8" id="ideusuario">
        <div align="center">
          <?php 
  	  echo 'Usuario: '.$_SESSION['usuario']."\n";
	  ?>
        </div>
      </div>
      <div class="Estilo8" id="nombre">
        <div align="center"><span class="subHeader">
          <?php 
 	  echo ' '.$_SESSION['nombre']. ' '.$_SESSION['apellido']."\n";
	  ?>
          </span></div>
      </div>      <div class="subHeader" id="acceso">
        <div align="center">
          <?php 
 	  echo '&Uacute;ltimo Acceso: '.$_SESSION['fecha_acceso']."\n";
	  ?>
        </div>
      </div></td>
  </tr>
  <tr>
    <td width="181">&nbsp;</td>
    <td width="79">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="398"><div align="right"></div></td>
    <td width="80">&nbsp;</td>
    <td width="157">&nbsp;</td>
    <td width="428">&nbsp;</td>
  </tr>
</table>
<div id="c_baner"></div>
<div class="Estilo8" id="Layer12">
  <div align="center">
    <?php 
	  if($_SESSION['tipo_user']=='01'){
 	  echo 'Administrador SICEI-PLUM';
	  }else{
	  echo '';
	  }
	  ?>
  </div>
</div>
</body>
</html>
