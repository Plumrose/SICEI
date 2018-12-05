<?php
// Toma el número del documento
     session_start();
     $nro_inventario=$_SESSION['documento_inv'];
     Include ("rutinasphp.php");
//   CONECTAR CON LA BASE DE DATOS DE MYSQL
     $conectar=conectar_BD();
//   Verifica si ya existe el documento de inventario
     $sql22="select * from T_HEDER_INV_FISICO where NUM_DOC = '$nro_inventario'"; 		
     $resul22=mysql_query($sql22,$conectar) or die("Problemas en la Sentencia SQL 4".mysql_error());
     if(mysql_num_rows($resul22)==0) {
        ?>
        <script>
        alert('El documento de inventario no ha sido creado en la BD. Por favor verificar');
        window.location='SICEI_PAG_019.php';
        </script>
        <?php
        return;
	 }
     $fecha=date("d-m-Y h:i:s A");
     require_once("/fpdf/fpdf.php");
//   Se genera una instancia de la clase */
     $myPDF = new FPDF('L','mm','Letter');
     $myPDF->SetXY(0,10);
	 $ind= 1;
     $sql02="select FEC_DOC as FEC_DOC, COD_USUARIO as COD_USUARIO, COD_ALM as COD_ALM, STATUS_DOC as 
     STATUS_DOC from T_HEDER_INV_FISICO where NUM_DOC = '$nro_inventario'"; 		
     $resul2=mysql_query($sql02,$conectar) or die("Problemas en la Sentencia SQL 4".mysql_error());
     if(mysql_num_rows($resul2)>0) {
       $reg2=mysql_fetch_assoc($resul2);
	   $fecha_inv=$reg2["FEC_DOC"];
	   $cod_almacen=$reg2["COD_ALM"];
       $sql09="select COD_COMP as COD_COMP, NUM_SERIAL as NUM_SERIAL,CANT_STOCK as CANT_STOCK,STATUS_STOCK as 
	   STATUS_STOCK from T_ITEM_INV_FISICO where NUM_DOC = '$nro_inventario' ";
       $resultado=mysql_query($sql09,$conectar) or die("Problemas en la Sentencia SQL 2".mysql_error());
       if(mysql_num_rows($resultado)>0) {
  		  while($registro=mysql_fetch_assoc($resultado)) {
	         $COD_COMP   = $registro["COD_COMP"];
			 $NUM_SERIAL = $registro["NUM_SERIAL"];
			 if ($registro["STATUS_STOCK"]=='01'){
   			    $STATUS     = 'Libre';
			 }
			 if ($registro["STATUS_STOCK"]=='02'){
   			    $STATUS     = 'Bloqueado';
			 }
			 if ($registro["STATUS_STOCK"]=='03'){
   			    $STATUS     = 'Dañado';
			 }
			 if ($registro["STATUS_STOCK"]=='04'){
   			    $STATUS     = 'Proyecto';
			 }
			 $STOCK      = $registro["CANT_STOCK"];
//           Busca la descripción del almacén
             $sql1="select DESC_ALM as DESC_ALM from M_ALMACENES where COD_ALM='$cod_almacen'";
             $resul1=mysql_query($sql1,$conectar) or die("Problemas en la Sentencia SQL 9".mysql_error());
             if(mysql_num_rows($resul1)>0) {
                $reg1=mysql_fetch_assoc($resul1);
                $desc_almacen= $reg1["DESC_ALM"];
             }
		     list($des_comp, $velocidad, $memoria, $disco, $des_procesa, $des_marca, $des_modelo)=componentes($COD_COMP,$conectar);
             if ($ind==1){
			   $subtitulo= 'Documento de Inventario Nro.'.' '.$nro_inventario;
               $flag_pdf = 1;
   	           $ind=2;
               $myPDF->AddPage();
               $myPDF->Image('imagenes/logo_plum.png',5,0,30,30); 
               $myPDF->SetFont('Arial','B',11);
			   $myPDF->SetTextColor(0,0,83); 
               $titulo = "Inventario Físico ".' -  '.$desc_almacen;
               $myPDF->Cell(0,06,$titulo,0,0,'C');
               $myPDF->Ln();
               $myPDF->Ln();
               $myPDF->Cell(0,09,$subtitulo,0,0,'C');
               $myPDF->SetFont('Arial','B',8);
               $myPDF->Cell(0,07,$fecha,0,0,'R');
               $myPDF->Ln();
  			   $myPDF->SetTextColor(255,255,255); 
               $myPDF->SetFont('Arial','B',9);
			   $myPDF->SetFillColor(0,47,94);
	           $myPDF->Cell(21,07,"Componente",1,0,'C',True);
	           $myPDF->Cell(60,07,"Descripción",1,0,'C',True);
	           $myPDF->Cell(25,07,"Serial",1,0,'C',True);
//	           $myPDF->Cell(25,07,"Modelo",1,0,'C',True);
	           $myPDF->Cell(30,07,"Procesador",1,0,'C',True);
	           $myPDF->Cell(25,07,"Velocidad",1,0,'C',True);
	           $myPDF->Cell(20,07,"Memoria",1,0,'C',True);
	           $myPDF->Cell(15,07,"Disco",1,0,'C',True);
	           $myPDF->Cell(15,07,"Stock",1,0,'C',True);
	           $myPDF->Cell(25,07,"Estatus.",1,0,'C',True);
	           $myPDF->Cell(22,07,"Stock Físico",1,0,'C',True);
			   $myPDF->SetTextColor(0,0,0); 
               $myPDF->Ln();
             }
                $myPDF->SetFont('Arial','',9);
                $myPDF->Cell(21,07,$COD_COMP,0,0,'L');
	            $myPDF->Cell(60,07,$des_comp,0,0,'L');
	            $myPDF->Cell(25,07,$NUM_SERIAL,0,0,'L');
//	            $myPDF->Cell(25,07,$des_modelo,0,0,'L');
	            $myPDF->Cell(30,07,$des_procesa,0,0,'L');
	            $myPDF->Cell(25,07,$velocidad,0,0,'L');
	            $myPDF->Cell(20,07,$memoria,0,0,'L');
	            $myPDF->Cell(15,07,$disco,0,0,'L');
	            $myPDF->Cell(15,07,$STOCK,0,0,'R');
	            $myPDF->Cell(25,07,$STATUS,0,0,'L');
	            $myPDF->Cell(22,07,'__________',0,0,'R');
                $myPDF->Ln();
          }
       }
    }
   if ($flag_pdf == 1){
        $nomb_archivo = 'Inventario_fisico_nro_'.$nro_inventario.'.pdf'; 
        $myPDF->Output($nomb_archivo, 'D');
   }else{
      $ind_flag ='1';  
   }	
?>
