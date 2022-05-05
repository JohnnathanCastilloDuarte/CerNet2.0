<?php 

include('../../config.ini.php');

$id_asignado_filtro = $_POST['id_asignado_filtro'];
$tipo = $_POST['tipo'];

$null = 'NA';
switch ($tipo) {
    case 'buscar_si_existe':
        
        $consultar_nombre = mysqli_prepare($connect,"SELECT id_informe FROM informe_filtro WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar_nombre, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar_nombre);
        mysqli_stmt_store_result($consultar_nombre);
        mysqli_stmt_bind_result($consultar_nombre, $id_informe);
        mysqli_stmt_fetch($consultar_nombre);
        
        $query1 = mysqli_prepare($connect,"SELECT c.numot, d.sigla_pais, d.sigla_empresa, e.servicio
                    FROM item_asignado as a, servicio as b, numot as c, empresa as d, servicio_tipo e 
                    WHERE a.id_asignado = ?
                    AND a.id_servicio = b.id_servicio 
                    AND b.id_numot = c.id_numot 
                    AND c.id_empresa = d.id_empresa
                    AND e.id_servicio_tipo = b.id_servicio_tipo");

        mysqli_stmt_bind_param($query1, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($query1);
        mysqli_stmt_store_result($query1);
        mysqli_stmt_bind_result($query1, $ot, $sigla_pais, $sigla_empresa, $servicio);
        mysqli_stmt_fetch($query1);

        $num_ot = substr($ot, 2);
        $nombre_info = $sigla_pais."-".$num_ot."-".$sigla_empresa."-INF";                         
    
        echo $id_informe."-";
        if($id_informe != 0){
            echo $id_informe;
        }elseif($id_informe == ''){
          //echo "No";
          $insertar = mysqli_prepare($connect, "INSERT INTO informe_filtro(nombre_informe, concepto, conclusion, 
                                                solicitante, insp1,insp2, insp3, insp4, insp5, insp6, id_asignado) 
                                                VALUES (?,?,?,?,?,?,?,?,?,?,?) ");
          mysqli_stmt_bind_param($insertar,'ssssssssssi',$nombre_info,$null,$null,$null,$null,$null,$null,$null,$null,$null,$id_asignado_filtro);
          mysqli_stmt_execute($insertar);
          
          $id_informe = mysqli_stmt_insert_id($insertar);
          
          echo $id_informe;
          
        }else{
          echo"es rodo";
        }
        break;

    case 'buscando_inf_parte_1':
    
        $array_datos1 = array();
        //echo "SELECT a.id_informe, a.concepto, a.conclusion, a.insp1, a.insp2, a.insp3, a.insp4, a.insp5 FROM informe_filtro as a WHERE  a.id_asignado =".$id_asignado_filtro;
        
        $consultar = mysqli_prepare($connect,"SELECT a.id_informe, a.concepto, a.conclusion, a.insp1, a.insp2, a.insp3, a.insp4, a.insp5, a.insp6, a.nombre_informe, a.solicitante,a.usuario_responsable FROM informe_filtro as a WHERE  a.id_asignado = ?");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $id_informe, $concepto, $conclusion, $insp1, $insp2, $insp3, $insp4, $insp5, $insp6, $nombre_informe, $solicitante, $usuario_responsable);
        
        while($row = mysqli_stmt_fetch($consultar)){

            $array_datos1[]= array(
                'id_informe'=>$id_informe,
                'concepto'=>$concepto,
                'conclusion'=>$conclusion,
                'nombre_informe'=>$nombre_informe,
                'solicitante'=>$solicitante,
                'responsable'=>$usuario_responsable,
                'insp1'=>$insp1,
                'insp2'=>$insp2,
                'insp3'=>$insp3,
                'insp4'=>$insp4,
                'insp5'=>$insp5,
                'insp6'=>$insp6

            );
        }


        $convert = json_encode($array_datos1);
        echo $convert;
    
        break;

    case 'contar_filtros':

        $consultar = mysqli_prepare($connect,"SELECT a.cantidad_filtro FROM item_filtro as a, item_asignado as b WHERE b.id_asignado = ? AND b.id_item = a.id_item");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $cantidad);
        mysqli_stmt_fetch($consultar);
    
        echo $cantidad;
        
        
        break;

         
    case 'buscando_inf_parte_2':

        $array_datos2 = array();

        $consultar = mysqli_prepare($connect,"SELECT b.id_medicion_1, b.valor_obtenido, b.veredicto, b.nombre_filtro FROM informe_filtro as a, filtro_mediciones_1 as b WHERE  a.id_asignado = ? AND a.id_informe = b.id_informe ORDER BY b.nombre_filtro ASC");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $id_medicion_1, $valor_obtenido, $veredicto, $nombre_filtro);
        
        while($row = mysqli_stmt_fetch($consultar)){

            $array_datos2[] = array(
                'id_medicion_1'=>$id_medicion_1,
                'valor_obtenido'=>$valor_obtenido,
                'veredicto'=>$veredicto,
                'nombre_filtro'=>$nombre_filtro
            );

        }

        $convert = json_encode($array_datos2);

        echo $convert;


        break;
    case 'buscando_inf_parte_3':

        $array_datos3 = array();

        $consultar = mysqli_prepare($connect,"SELECT  c.id_medicion_2, c.nombre_filtro, c.zonaA, c.zonaAA, c.zonaB, c.zonaBB, c.zonaC, c.zonaCC, c.zonaD, c.zonaDD
                                            FROM informe_filtro as a, filtro_mediciones_2 as c WHERE  a.id_asignado = ? AND a.id_informe = c.id_informe");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $id_medicion_2, $nombre_filtro, $zonaA, $zonaAA, $zonaB, $zonaBB, $zonaC, $zonaCC, $zonaD, $zonaDD);
        

        while($row = mysqli_stmt_fetch($consultar)){

            
            $array_datos3[] = array(
                'id_medicion_2'=>$id_medicion_2,
                'nombre_filtro'=>$nombre_filtro,
                'zonaA'=>$zonaA,
                'zonaAA'=>$zonaAA,
                'zonaB'=>$zonaB,
                'zonaBB'=>$zonaBB,
                'zonaC'=>$zonaC,
                'zonaCC'=>$zonaCC,
                'zonaD'=>$zonaD,
                'zonaDD'=>$zonaDD
            );
        }

        $convert = json_encode($array_datos3);

        echo $convert;


        break;
      
    case 'buscar_si_ifo_p3':      
      
      
        $consultar = mysqli_prepare($connect,"SELECT a.id_informe FROM filtro_mediciones_2 a, informe_filtro b  WHERE a.id_informe = b.id_informe AND b.id_asignado = ?");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $id_medicion_2);
        mysqli_stmt_fetch($consultar);
        
       // $nnn = mysqli_stmt_num_rows($consultar); 
        
        if(mysqli_stmt_num_rows($consultar) >0){
          echo "SI";
        }else{
          echo "NO";
        }


        break;
    
    
    

}

mysqli_close($connect);
?>