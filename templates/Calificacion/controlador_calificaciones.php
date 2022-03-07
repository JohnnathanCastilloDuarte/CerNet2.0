<?php 
include('../../config.ini.php');

$movimiento = $_POST['movimiento'];
$id_asignado = $_POST['id_asignado_calificaciones'];
$id_usuario = $_POST['id_usuario'];
$seguir = 0;

$consultar_datos_para_nombre_informe = mysqli_prepare($connect,"SELECT c.sigla_empresa, c.sigla_pais, b.codigo_interno FROM item_asignado as a, item as b, empresa as c WHERE a.id_asignado = ? AND a.id_item = b.id_item AND b.id_empresa = c.id_empresa");
mysqli_stmt_bind_param($consultar_datos_para_nombre_informe, 'i', $id_asignado);
mysqli_stmt_execute($consultar_datos_para_nombre_informe);
mysqli_stmt_store_result($consultar_datos_para_nombre_informe);
mysqli_stmt_bind_result($consultar_datos_para_nombre_informe, $sigla_empresa, $sigla_pais, $codigo_interno);
mysqli_stmt_fetch($consultar_datos_para_nombre_informe);



if($sigla_empresa == ""){
    $seguir-1;
}else{
    $seguir++;
}

if($sigla_pais == ""){
    $seguir-1;
}else{
    $seguir++;
}


if($seguir > 0){


    if($movimiento == "URS" || $movimiento == "DQ"){

        $tipo_informe = $movimiento;
        $a_n = date("Y");
        $nombre_informe = $sigla_pais."-".$movimiento."-".$a_n."-".$sigla_empresa."-".$a_n."-".$codigo_interno;
        //VALIDACIÓN QUE NO EXISTA EL MISMO INFORME RELACIÓNADO AL MISMO SERVICIO.


        $validar = mysqli_prepare($connect,"SELECT id_informe FROM calificacion_control_informe WHERE id_asignado = ? AND tipo_informe = ?");
        mysqli_stmt_bind_param($validar, 'is', $id_asignado, $tipo_informe);
        mysqli_stmt_execute($validar);
        mysqli_stmt_store_result($validar);
        mysqli_stmt_bind_result($validar, $id_informe);
        mysqli_stmt_fetch($validar);

        if(mysqli_stmt_num_rows($validar) > 0){
            echo "Existe";
        }else{
            $crear = mysqli_prepare($connect,"INSERT INTO calificacion_control_informe (id_asignado, nombre_informe, tipo_informe, id_usuario) VALUES (?,?,?,?)");
            mysqli_stmt_bind_param($crear, 'issi', $id_asignado, $nombre_informe, $tipo_informe, $id_usuario);
            mysqli_stmt_execute($crear);
            if($crear){
             
                $id_informe = mysqli_stmt_insert_id($crear);
                ////////// Realizo el registro backend de lo información que acompaña el informe.
                if($tipo_informe == "DQ"){
                    $recolectando_informacion = mysqli_prepare($connect,"SELECT d.nombre, c.nombre, c.codigo_interno, e.nombre, e.direccion, c.direccion, c.ubicacion_interna, a.id_asignado, c.funcion_item FROM
                    calificacion_control_informe as a, item_asignado as b, item as c, tipo_item as d, empresa as e WHERE a.id_informe = ? AND
                    a.id_asignado = b.id_asignado AND b.id_item = c.id_item AND c.id_tipo = d.id_item AND c.id_empresa = e.id_empresa");
                    mysqli_stmt_bind_param($recolectando_informacion, 'i', $id_informe);
                    mysqli_stmt_execute($recolectando_informacion);
                    mysqli_stmt_store_result($recolectando_informacion);
                    mysqli_stmt_bind_result($recolectando_informacion, $tipo_item, $nombre_item, $codigo_interno, $empresa, $direccion_empresa, $direccion_equipo, $ubicacion_equipo, $id_asignado, $funcion_item);
                    mysqli_stmt_fetch($recolectando_informacion);

                    $consultando_informes = mysqli_prepare($connect,"SELECT nombre_informe FROM calificacion_control_informe WHERE id_asignado = ? AND tipo_informe = 'URS' or tipo_informe = 'QPP'");
                    mysqli_stmt_bind_param($consultando_informes, 'i', $id_asignado);
                    mysqli_stmt_execute($consultando_informes);
                    mysqli_stmt_store_result($consultando_informes);
                    mysqli_stmt_bind_result($consultando_informes, $nombre_informe);

                    $array_informes = array();
                    $informe_QPP="";

                    while($row = mysqli_stmt_fetch($consultando_informes)){
                    $array_informes[] = array($nombre_informe);
                    }

                    $informe_URS =  $array_informes[0][0];

                    if($array_informes[1][0] != ""){
                        $informe_QPP = "y ".$array_informes[1][0];
                    }else{
                        $informe_QPP = $array_informes[1][0];
                    }


                    $objetivo = "<p>Establecer la metodología para realizar la calificación de diseño de $tipo_item denominado $nombre_item
                    identificado con el código Interno $codigo_interno, ubicado en $direccion_equipo en $ubicacion_equipo.
                    $direccion_empresa en las instalaciones de $empresa, con la
                    finalidad de evaluar los accesorios instalados para que cumplan con las especificaciones de diseño
                    detalladas en la documentación técnica con código $informe_URS $informe_QPP
                    provista por el fabricante y las definidas por $empresa .</p>"; 

                    $introduccion = "<p>Este documento es generado para $empresa con el fin de verificar que el
                    diseño contemple los requerimientos de usuario para el $nombre_item de su operación logística ubicado en $direccion_equipo en $ubicacion_equipo . $direccion_empresa en las instalaciones de $empresa.</p>La función de la $tipo_item será: <p>$funcion_item.</p>";

                    $alcance = "<p>Este documento aplica al protocolo de calificación de diseño a realizar con base a los requerimientos de
                    usuario del $nombre_item con código Interno $codigo_interno, ubicado en $direccion_equipo en $ubicacion_equipo . de uso exclusivo para la operación logística de $empresa.</p>";

                    $descripcion_del_sistema = "<p>El $tipo_item de 2°C a 8°C para la operación de $empresa, destinado al almacenamiento
                    temporal de productos tipo dispositivos médicos y reactivos de diagnóstico, se encuentra ubicado en  $direccion_equipo en $ubicacion_equipo . de uso exclusivo para la operación logística de $empresa.</p><p>El $tipo_item cuenta con sistemas de apoyo para mantener las condiciones establecidas en los requerimientos de usuario.</p>";
                    
                    $insertando_en_datos_1 = mysqli_prepare($connect,"INSERT INTO calificacion_dq_datos_1 (id_informe, objetivo, introduccion, alcance, descripcion_sistema) VALUES (?,?,?,?,?)");
                    mysqli_stmt_bind_param($insertando_en_datos_1, 'issss', $id_informe, $objetivo, $introduccion, $alcance, $descripcion_del_sistema);
                    mysqli_stmt_execute($insertando_en_datos_1);
                    if($insertando_en_datos_1){
                        echo "Listo";
                    }else{
                        echo "Error";
                    }
                
                }
            }
        }

    }else{
        echo "No existe seleccion";
    }
    
}/////////// CIERRE DEL IF QUE VALIDA QUE EXISTA LA SIGLA DE EMPRESA O DEL PAIS 
else{
    echo "Sin siglas";
}   
mysqli_close($connect);
?>