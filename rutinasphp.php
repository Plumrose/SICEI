<?php

function fecha()
{
  $m=date('m');
  $mes=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo',
  '06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre'
   ,'12'=>'Diciembre');
  $vg_fecha= date("d")." ".$mes[$m]." ".date(" Y");
  return $vg_fecha;	 
}
// Función para convertir en mayuscula considerando carcateres especiales
function mayuscula($t)
	{
		return trim(addslashes(strtr(strtoupper($t),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ")));
	}
// Funcion que devuelve un flag indicando si el almacén se encuentra en inventario fisico
function verificar_almacen($cod_almacen,$conectar)
{
      $ind_flag  = '0';
//    Verifica si el alamcén se encuentra en inventario fisico
     $sql07="select NUM_DOC as NUM_DOC from T_HEDER_INV_FISICO where  COD_ALM= '$cod_almacen' and (STATUS_DOC <> '03' and 
	 STATUS_DOC 
	 <> '09')"; 		
     $resul1=mysql_query($sql07,$conectar) or die("Problemas en la Sentencia SQL 1. ".mysql_error());
     if(mysql_num_rows($resul1)>0) {
//      Error almacén en inventario
        $registro=mysql_fetch_assoc($resul1);
        $ind_flag  = '50';
     }  
	 return $ind_flag;	 
}
//------------------------------------------------------------------------------------------------------
//CONECTAR CON LA BASE DE DATOS DE MYSQL
function conectar_BD()
{
   $conectar=mysql_connect($_SESSION['servidor'],$_SESSION['usuario_adm'],$_SESSION['clave']) or
         die("Problemas  con la conexión a la base de datos");
   mysql_select_db('siceiplum',$conectar) or  die("ERROR con la base de datos");
   return $conectar;
}
//------------------------------------------------------------------------------------------------------
// Busca los detalles del componente
function componentes($cod_comp,$conectar){
   $sql21="select cod_comp as cod_comp, cod_grupo_art as cod_grupo_art, cod_marca as cod_marca, cod_modelo as cod_modelo, 
   desc_comp as  desc_comp, cod_tipo as cod_tipo, cod_procesa as cod_procesa, velocidad as velocidad, memoria as memoria, 
   disco as disco, tipo as tipo from m_componentes where cod_comp = '$cod_comp'"; 	
   $resul21=mysql_query($sql21,$conectar) or die("Problemas en la Sentencia SQL 1. ".mysql_error());
   if(mysql_num_rows($resul21)>0) {
		$registro21=mysql_fetch_assoc($resul21);
        $tipo=$registro21['tipo'];
        $cod_grupo_art=$registro21['cod_grupo_art'];
        $cod_marca=$registro21['cod_marca'];
        $cod_modelo=$registro21['cod_modelo'];
        $desc_comp=$registro21['desc_comp'];
        $cod_tipo=$registro21['cod_tipo'];
        $cod_procesa=$registro21['cod_procesa'];
        $velocidad=$registro21['velocidad'];
        $memoria=$registro21['memoria'];
        $disco=$registro21['disco'];
//      Busca las descripciones de los grupos
        $sql1="select desc_tipo as desc_tipo from m_tipo_componente where cod_tipo='$tipo_comp'";
        $sql2="select desc_procesa as desc_procesa from m_tipo_procesadores where cod_procesa='$cod_procesa'";
        $sql3="select desc_grupo_art as desc_grupo_art from m_grupo_articulos where cod_grupo_art='$grupo_art'";
        $sql4="select desc_marca as desc_marca from m_marcas where cod_marca='$cod_marca'";
        $sql5="select desc_modelo as desc_modelo from m_modelos where cod_modelo='$cod_modelo'";
        $resul1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL. ".mysql_error());
        $resul2=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL. ".mysql_error());
        $resul3=mysql_query($sql3,$conectar) or die("Problemas en la Sentencia SQL. ".mysql_error());
        $resul4=mysql_query($sql4,$conectar) or die("Problemas en la Sentencia SQL. ".mysql_error());
        $resul5=mysql_query($sql5,$conectar) or die("Problemas en la Sentencia SQL. ".mysql_error());
        $reg1=mysql_fetch_assoc($resul1);
        $des_tipo_comp= $reg1["desc_tipo"];
        $reg2=mysql_fetch_assoc($resul2);
        $des_procesa= $reg2["desc_procesa"];
        $reg4=mysql_fetch_assoc($resul4);
        $des_marca= $reg4["desc_marca"];
        $reg5=mysql_fetch_assoc($resul5);
        $des_modelo= $reg5["desc_modelo"]; 
		$valores_consul = array(
           0=>$desc_comp,
		   1=>$velocidad,
		   2=>$memoria,
		   3=>$disco,
		   4=>$des_procesa,
		   5=>$des_marca,
		   6=>$des_modelo,
       );
  }
  return $valores_consul;
}
//------------------------------------------------------------------------------------------------------
// Verifica el documento de inventario fisico
function verificar_doc_inv($nro_inventario,$conectar){
   $ind_flag = '0';
   if ($nro_inventario ==''){
//     Debe indicar el numero del documento
	   $ind_flag = '2';
   }else{
//     Verifica si el estatus del documento es valido
       $sql2="select STATUS_DOC as STATUS_DOC from T_HEDER_INV_FISICO where NUM_DOC='$nro_inventario'";		
	   $resul2=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
       if(mysql_num_rows($resul2)>0){
          $reg2=mysql_fetch_assoc($resul2);
          if($reg2["STATUS_DOC"]=='03'){
//             Documento ya contabilizado
  	           $ind_flag = '3';
		  }   
          if($reg2["STATUS_DOC"]=='09'){
//             Documento esta anulado
  	           $ind_flag = '4';
	      }   
	   }else{
//          Documento no existe 
	        $ind_flag = '1';
	   }
  }
  return $ind_flag;
}
//------------------------------------------------------------------------------------------------------
// Consulta los datos del documento de inventario
function consulta_doc_inv($nro_inventario,$conectar){
  $sql02="select FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as COD_ALM, STATUS_DOC as 
  STATUS_DOC from T_HEDER_INV_FISICO where NUM_DOC = '$nro_inventario'"; 		
  $resul2=mysql_query($sql02,$conectar) or die("Problemas en la Sentencia SQL 4".mysql_error());
  if(mysql_num_rows($resul2)>0) {
    $reg2=mysql_fetch_assoc($resul2);
	$fecha_inv=$reg2["FEC_DOC"];
	$cod_almacen=$reg2["COD_ALM"];
	if ($reg2["STATUS_DOC"]=='01'){
   	   $estatus = 'Pendiente';
	}
	if ($reg2["STATUS_DOC"]=='09'){
   	   $estatus = 'Anulado';
	}
	if ($reg2["STATUS_DOC"]=='02'){
   	   $estatus = 'En Recuento';
	}
	if ($reg2["STATUS_DOC"]=='03'){
   	   $estatus = 'Contabilizado';
	}
  }
// Busca la descripción del almacén
   $desc_almacen=consultar_almacen($cod_almacen,$conectar);
// Llena el arreglo con los datos   
   $valores_consul_inv = array(
    0=>$fecha_inv,
    1=>$cod_almacen,
    2=>$estatus,
    3=>$desc_almacen,
  );
  return $valores_consul_inv;;
}
//------------------------------------------------------------------------------------------------------
// VERIFICA ACCESO A LA TRANSACCIÓN
function verificar_acceso($transaccion,$user,$conectar){
  $flag_tran = '0';
  $sql0="SELECT * FROM m_asigna_roles where cod_opcion='$transaccion' AND cod_usuario='$user'";
  $resultado=mysql_query($sql0,$conectar) or die("Problemas en el select".mysql_error());
  if(mysql_num_rows($resultado)==0){
     $flag_tran = '1';
  }
  return $flag_tran;
}
//------------------------------------------------------------------------------------------------------
// Descripción del Componente
function nombre_componente($cod_comp,$conectar)	{
   $sql2="select desc_comp as desc_comp from m_componentes where cod_comp='$cod_comp'";						  		
   $resultado1=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
   $registro1=mysql_fetch_assoc($resultado1);
   $desc_comp=$registro1['desc_comp'];
   return $desc_comp;
}
//------------------------------------------------------------------------------------------------------
// Descripción del Estatus del Inventario
function estatus_stock($gv_estatus){
 	if ($gv_estatus == '01')
	    $des_estatus2='Disponible';
	if ($gv_estatus == '03')
	     $des_estatus2='Dañado';
	if ($gv_estatus == '04')
	     $des_estatus2='Proyecto';
	if ($gv_estatus == '02')
	    $des_estatus2='Bloqueado';
	if ($gv_estatus == '05')
	    $des_estatus2='Garantía';
	if ($gv_estatus == '06')
	    $des_estatus2='Reparado';
	if ($gv_estatus == '07')
	    $des_estatus2='Nuevo';
   return $des_estatus2;
}
//------------------------------------------------------------------------------------------------------
// Crea movimiento de stock
function crea_item_stock($nro_mov,$cod_comp,$nro_serial,$cod_almacen,$gv_estatus2,$cant_inve,$conectar){
// Busca el último numero del items
   $items = 0;
   $sql06="select max(items) as ultimo2 from t_movi_items where num_movi= '$nro_mov'";
   $resultado6=mysql_query($sql06,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
   if(mysql_num_rows($resultado6)>0){
      $regis06=mysql_fetch_assoc($resultado6);
      $items =(int)$regis06["ultimo2"];
 	  $items =(int)$items + 1;
   }else{
	 $items = 1;
   }	
   $sql04f="insert into t_movi_items (num_movi,cod_comp,num_serial,cantidad_movi,items,estatus) values 
	      ('$nro_mov','$cod_comp','$nro_serial','$cant_inve','$items', '$gv_estatus2')";			
   $resul04f=mysql_query($sql04f,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
}
//------------------------------------------------------------------------------------------------------
// DETERMINA EL SIGUIENTE CORRELATIVO DEL MOVIMIENTO
function correlativo_movimiento($conectar,$tipo){
 $sql01="select CORRELATIVO as ultimo from T_CORRELATIVOS WHERE TIPO = '$tipo'";
// Determina el siguiente correlativo
  $resul=mysql_query($sql01,$conectar) or die("Problemas en el select".mysql_error());
  if(mysql_num_rows($resul)>0){
      $registro=mysql_fetch_assoc($resul);
      $ult_cod =(int)$registro["ultimo"];
	  $ult_cod =(int)$ult_cod + 1;
      $nro_mov= $ult_cod;
      $sql03f="UPDATE T_CORRELATIVOS SET correlativo='$nro_mov' where tipo = '$tipo'";
   }else {
     $nro_mov= 1;
     $sql03f="insert into T_CORRELATIVOS(tipo,correlativo) values ('$tipo',$nro_mov)";
   }
// Reserva el correlativo
   $resul03f=mysql_query($sql03f,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
   return $nro_mov;
}
//------------------------------------------------------------------------------------------------------
// Crea movimiento de stock
function crea_heder_movimiento($cod_almacen,$user,$doc_ref,$conectar,$tipo,$cla_movi,$nota){
   $gvfecha= date("Y-m-d");
   $hora= date("G:H:s");
// Crea el movimiento a nivel de cabecera
   $nro_mov=correlativo_movimiento($conectar,'MI');
   $sql03f="insert into 
             t_movi_heder(num_movi,tipo_movi,clase_movi,fec_movi,hora_movi,cod_usuario,cod_alm,num_doc_ref,nota,fecha) values 
             ('$nro_mov','$tipo','$cla_movi','$gvfecha','$hora','$user','$cod_almacen','$doc_ref','$nota','$gvfecha')";
             $resul03f=mysql_query($sql03f,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
   return $nro_mov;
}
//------------------------------------------------------------------------------------------------------
// Consulta el movimiento de stock
function consultar_movimiento($nro_mov,$conectar){
   $sql02="select tipo_movi as tipo_movi ,clase_movi as clase_movi,fec_movi as fec_movi,hora_movi as hora_movi,cod_usuario as  
   cod_usuario,cod_alm as cod_alm,num_doc_ref as num_doc_ref,COD_SOL as COD_SOL,nota as nota,fecha as fecha, estatus as estatus, rif_prov as rif_prov 
   from t_movi_heder where num_movi = '$nro_mov'"; 		
   $resultado=mysql_query($sql02,$conectar) or die("Problemas en la Sentencia SQL I".mysql_error());
   if(mysql_num_rows($resultado)>0) {
     $reg=mysql_fetch_assoc($resultado);
     $fecha_mov=$reg["fec_movi"];
     $clase_movi=$reg["clase_movi"];
     $doc_ref=$reg["num_doc_ref"];
     $solicit_sol=$reg["COD_SOL"];
     $detalle_sol=$reg["nota"];
     $cod_almacen=$reg["cod_alm"];
	 $rif_prov=$reg["rif_prov"];
	 $desc_solicit=consultar_solicitante($solicit_sol,$conectar);
	 $desc_almacen=consultar_almacen($cod_almacen,$conectar);
	 $Nomb_prov=consultar_proveedor($rif_prov,$conectar);
// Llena el arreglo con los datos   
   $valores_consul_movi = array(
    0=>$fecha_mov,
    1=>$clase_movi,
    2=>$doc_ref,
    3=>$solicit_sol,
    4=>$detalle_sol,
    5=>$cod_almacen,
    6=>$desc_solicit,
    7=>$desc_almacen,
    8=>$Nomb_prov,
	9=>$rif_prov
  );
  return $valores_consul_movi;
  }
}
//------------------------------------------------------------------------------------------------------
// Consulta datos del solicitante
function consultar_solicitante($solicit_sol,$conectar){
   $sql1="select NOMB_SOL as NOMB_SOL from M_SOLICITANTES where COD_SOL = '$solicit_sol'";
   $resul1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL 1".mysql_error());
   if(mysql_num_rows($resul1)>0) {
     $reg1=mysql_fetch_assoc($resul1);
     $desc_solicit= $reg1["NOMB_SOL"];
   }
   return $desc_solicit;
}
//------------------------------------------------------------------------------------------------------
// Consulta datos del almacén
function consultar_almacen($cod_almacen,$conectar){
    $sql2="select desc_alm as desc_alm, ubi_alm as ubi_alm from m_almacenes where cod_alm='$cod_almacen'";
    $resul2=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL 2".mysql_error());
    if(mysql_num_rows($resul2)>0) {
      $reg2=mysql_fetch_assoc($resul2);
      $desc_almacen= $reg2["desc_alm"];
    }
   return $desc_almacen;
}
//------------------------------------------------------------------------------------------------------
// Consulta datos del proveedor
function consultar_proveedor($rif_prov,$conectar){
  $sql1="select den_prov as den_prov from m_proveedores where rif_prov = '$rif_prov'";
  $resul1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL 1".mysql_error());
  if(mysql_num_rows($resul1)>0) {
    $reg1=mysql_fetch_assoc($resul1);
    $Nomb_prov= $reg1["den_prov"];
  }
   return $Nomb_prov;
}
//------------------------------------------------------------------------------------------------------
// Consulta el movimiento de traspasos
function consultar_traspaso($nro_traspaso,$conectar){
   $sql02="select fec_movi as fec_movi, hora_movi as hora_movi, cod_usuario as cod_usuario, cod_alm_origen as cod_alm_origen, 
   num_doc_ref as num_doc_ref, nota as nota, cod_alm_destino as cod_alm_destino from t_traspaso_heder where NUM_TRASPASO = 
   '$nro_traspaso'"; 		
   $resultado=mysql_query($sql02,$conectar) or die("Problemas en la Sentencia SQL I".mysql_error());
   if(mysql_num_rows($resultado)>0) {
     $reg=mysql_fetch_assoc($resultado);
     $fecha_mov=$reg["fec_movi"];
     $doc_ref=$reg["num_doc_ref"];
     $detalle_sol=$reg["nota"];
     $cod_alm_origen=$reg["cod_alm_origen"];
	 $desc_almacen1=consultar_almacen($cod_alm_origen,$conectar);
     $cod_alm_destino=$reg["cod_alm_destino"];
	 $desc_almacen2=consultar_almacen($cod_alm_destino,$conectar);
// Llena el arreglo con los datos   
   $valores_consul_movi = array(
    0=>$fecha_mov,
    1=>$doc_ref,
    2=>$detalle_sol,
    3=>$cod_alm_origen,
    4=>$desc_almacen1,
    5=>$cod_alm_destino,
    6=>$desc_almacen2,
  );
  return $valores_consul_movi;
  }
}
//------------------------------------------------------------------------------------------------------
// Verifica solicitud
function verifi_solicitud($cod_sol,$conectar){
   $ind_flag = '0';
   if ($cod_sol ==''){
//    Debe indicar el numero de la solicitud
	  $ind_flag = '2';
   }else{
//    Verifica si el estatus del documento es valido
      $sql2="select cod_statu as cod_statu from t_cab_solicitud where num_solic='$cod_sol'";		
	  $resultado3=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
      if(mysql_num_rows($resultado3)>0){
         $reg3=mysql_fetch_assoc($resultado3);
         if($reg3["cod_statu"]=='02'){
//          Solicitud no tiene estatus para asignación
  	        $ind_flag = '3';
	     }   
         if($reg3["cod_statu"]=='04'){
//          Solicitud no tiene estatus para asignación
  	        $ind_flag = '3';
			}   
	     }else{
//          No existe la solicitud 
	        $ind_flag = '1';
	     }
	   } 
   return $ind_flag;
}
//------------------------------------------------------------------------------------------------------
// Busca los datos del solicitante
function buscar_datos_solicitante($cod_solicitante,$conectar){
//    Busca la descripción de la localidad
	  $sql2= "select m_localidades.desc_localidad as desc_localidad from M_SOLICITANTES, m_localidades where 
	  M_SOLICITANTES.cod_localidad = m_localidades.cod_localidad and COD_SOL =  $cod_solicitante ";
      $resul2=mysql_query($sql2,$conectar) or die("Problemas en la Sentencia SQL ".mysql_error());
      if(mysql_num_rows($resul2)>0) {
        $reg2=mysql_fetch_assoc($resul2);
        $desc_localidad=$reg2["desc_localidad"];
      }
//    Busca el nombre del solicitante y el descripción de la unidad
      $sql1="select M_UNIDAD_ORG.DESC_UNIDAD as desc_unidad, M_SOLICITANTES.NOMB_SOL as NOMB_SOL 
	  from M_SOLICITANTES, M_UNIDAD_ORG 
	  where M_SOLICITANTES.cod_unidad = M_UNIDAD_ORG.COD_UNIDAD and COD_SOL =  $cod_solicitante ";
      $resul1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
      if(mysql_num_rows($resul1)>0) {
        $reg1=mysql_fetch_assoc($resul1);
        $des_unidad=$reg1["desc_unidad"];
        $nom_sol=$reg1["NOMB_SOL"];
      }
//    Busca la Gerencia Organizativa del usuario
      $sql3="select M_JERARQUIA_ORG.DESC_GERENCIA as desc_gerencia from M_SOLICITANTES, M_JERARQUIA_ORG 
	  where COD_SOL =  $cod_solicitante and 
	  M_SOLICITANTES.cod_unidad = M_JERARQUIA_ORG.COD_UNIDAD and
	  M_SOLICITANTES.COD_GERENCIA = M_JERARQUIA_ORG.COD_GERENCIA";
      $resul3=mysql_query($sql3,$conectar) or die("Problemas en la Sentencia SQL".mysql_error());
      if(mysql_num_rows($resul3)>0) {
        $reg3=mysql_fetch_assoc($resul3);
        $des_gerencia=$reg3["desc_gerencia"];
      }
// Llena el arreglo con los datos   
   $valores_solicitante = array(
    0=>$desc_localidad,
    1=>$des_unidad,
    2=>$nom_sol,
    3=>$des_gerencia,
  );
   return $valores_solicitante;
}
//------------------------------------------------------------------------------------------------------

function formato_titulo_reporte(){
     $estiloTituloReporte = array(
         'font' => array(
        'name'      => 'Verdana',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>13,
        'color'     => array(
            'rgb' => '010101'
        )
     ),
//     'fill' => array(
//        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
//        'color' => array(
//        'argb' => 'FF220835')
//    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
       // 'wrap' => TRUE
    )
    );
	 return $estiloTituloReporte;	 
}

function formato_columnas_reporte(){
$estiloTituloColumnas = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),

    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
    'rotation'   => 90,
        'startcolor' => array(
 //           'rgb' => 'c47cf2'
            'rgb' => '00376F'
        ),
//        'endcolor' => array(
//            'argb' => 'FF431a5d'
//            'argb' => '401C7D'
//        )
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
       // 'wrap'      => TRUE
    )
);
	 return $estiloTituloColumnas;	 
}

function formato_datos_reporte(){
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'size' =>10,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
//    'color' => array(
//            'argb' => 'FFd9b7f4')
   ),
    'borders' => array(
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
        'color' => array(
                'rgb' => '3a2a47'
            )
        ),
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
        'color' => array(
                'rgb' => '3a2a47'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
        'color' => array(
                'rgb' => '3a2a47'
            )
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
        'color' => array(
                'rgb' => '3a2a47'
            )
        )

    )
));
	 return $estiloInformacion;	 
}

function formato_subtitulo_reporte(){
     $estilosubtituloReporte = array(
         'font' => array(
        'name'      => 'Verdana',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>9,
        'color'     => array(
            'rgb' => '010101'
        )
     ));
	 return $estilosubtituloReporte;	 
}

function formato_columnas_reporte2(){
$estiloTituloColumnas = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
    'rotation'   => 90,
        'startcolor' => array(
 //           'rgb' => 'c47cf2'
            'rgb' => 'B8B8BE'
        ),
        'endcolor' => array(
//            'argb' => 'FF431a5d'
            'argb' => '95959A'
        )
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            'color' => array(
                'rgb' => '143860'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        //'wrap'      => TRUE
    )
);
	 return $estiloTituloColumnas;	 
}
function formato_nombre_sistema(){
	  $estilos = array(
    'font' => array('bold' => true,'color' => array('argb' => PHPExcel_Style_Color::COLOR_BLACK)),
    'borders' => array( 'allborders' => array( 'style' => PHPExcel_Style_Border::BORDER_NONE)),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE));
	 return $estilos;	 
}
function formato_blanco(){
	$estilos = array(
		'fill' => array(
		   'type'       => PHPExcel_Style_Fill::FILL_SOLID,
		   'startcolor' => array( 'rgb' => 'FFFFFF' )
    	)
	);
	return $estilos;	
}

function formato_unidad(){
	$estilos = array(
    	'font' => array('bold' => true,'color' => array('argb' => PHPExcel_Style_Color::COLOR_BLACK)),
    	'borders' => array( 'allborders' => array( 'style' => PHPExcel_Style_Border::BORDER_NONE)),
		'fill' => array(
			'type'       => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array( 'rgb' => 'FFFFFF' ))
	);
	 return $estilos;	 
}
function formato_datos(){
	$estilos = array(
    	'borders' => array(
			'allborders' => array( 'style' => PHPExcel_Style_Border::BORDER_THIN))
	);
	 return $estilos;	 
}

function aliniar_izquierda(){
	$estilos = array(
    	'alignment' => array(
        	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        	'rotation' => 0)
	);
	return $estilos;	 
}

function aliniar_centrado(){
	$estilos = array(
    	'alignment' => array(
        	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        	'rotation' => 0)
	);
	return $estilos;	 
}

function formato_gris(){
  $estilos = array(
    'font' => array('bold' => true,'color' => array('argb' => PHPExcel_Style_Color::COLOR_BLACK)),
    'fill' => array(
       'type'       => PHPExcel_Style_Fill::FILL_SOLID,
       'startcolor' => array( 'rgb' => 'dcdcdc' )
      )
  );
  return $estilos;  
}

function formato_datos_peque(){
  $estilos = array(
    'font' => array('size'=>'9'),
    'borders' => array(
    'allborders' => array( 'style' => PHPExcel_Style_Border::BORDER_THIN))
  );
   return $estilos;  
}
?>
