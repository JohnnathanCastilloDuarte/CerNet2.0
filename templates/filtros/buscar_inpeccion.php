<?php 

include('../../config.ini.php');

$id_asignado_filtro = $_POST['id_asignado_filtro'];
$tipo = $_POST['tipo'];



switch ($tipo) {
    case 'buscar_si_existe':
        $consultar = mysqli_prepare($connect,"SELECT id_informe FROM informe_filtro WHERE id_asignado = ?");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $id_informe);
        mysqli_stmt_fetch($consultar);
    
        if(mysqli_stmt_num_rows($consultar) != 0){
            echo $id_informe;
        }else{
            echo "No";
        }
        break;

    case 'buscando_inf_parte_1':
    
        $array_datos1 = array();
        //echo "SELECT a.id_informe, a.concepto, a.conclusion, a.insp1, a.insp2, a.insp3, a.insp4, a.insp5 FROM informe_filtro as a WHERE  a.id_asignado =".$id_asignado_filtro;
        
        $consultar = mysqli_prepare($connect,"SELECT a.id_informe, a.concepto, a.conclusion, a.insp1, a.insp2, a.insp3, a.insp4, a.insp5, a.insp6 FROM informe_filtro as a WHERE  a.id_asignado = ?");
        mysqli_stmt_bind_param($consultar, 'i', $id_asignado_filtro);
        mysqli_stmt_execute($consultar);
        mysqli_stmt_store_result($consultar);
        mysqli_stmt_bind_result($consultar, $id_informe, $concepto, $conclusion, $insp1, $insp2, $insp3, $insp4, $insp5, $insp6);
        
        while($row = mysqli_stmt_fetch($consultar)){

            $array_datos1[]= array(
                'id_informe'=>$id_informe,
                'concepto'=>$concepto,
                'conclusion'=>$conclusion,
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

}

mysqli_close($connect);
?>