<?php

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
	    $des_estatus2='Libre Utilización';
	if ($gv_estatus == '03')
	     $des_estatus2='Dañado';
	if ($gv_estatus == '04')
	     $des_estatus2='Proyecto';
	if ($gv_estatus == '02')
	    $des_estatus2='Bloqueado';
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
   cod_usuario,cod_alm as cod_alm,num_doc_ref as num_doc_ref,COD_SOL as COD_SOL,nota as nota,fecha as fecha, estatus as estatus 
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
?>
