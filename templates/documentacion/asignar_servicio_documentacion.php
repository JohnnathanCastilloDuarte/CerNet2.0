<?php 

//error_reporting(0);
include("../../config.ini.php");

$id_numot = $_POST['id_numot'];
$id_valida_usuario = $_POST['id_valida_usuario'];
$departmento = $_POST['departmento'];

$elaborador = 1;
$aprobador = 3;
$revisor = 2;





///////////////// PRIMER DEBO BUSCAR EL FLUJO SELECCIONADO

  $buscar_flujo = mysqli_prepare($connect,"SELECT id_flujo FROM flujo_documentacion WHERE nombre = ?");
  mysqli_stmt_bind_param($buscar_flujo, 's', $departmento);
  mysqli_stmt_execute($buscar_flujo);
  mysqli_stmt_store_result($buscar_flujo);
  mysqli_stmt_bind_result($buscar_flujo, $id_flujo);
  mysqli_stmt_fetch($buscar_flujo);


  if($departmento == "CSV" or $departmento == "SPOT" or $departmento == "GEP"){


    /*
    $orden1 = 1;
    $orden2 = 2;
    $orden3 = 3;
    $orden4 = 4;
    $orden5 = 5;

    $estructura = 1;
    */
   
    ///////////////////// INSERTO EL ID DEL FLUJO EN EL NUEVO PROCESO DOCUMENTAL
    $creando = mysqli_prepare($connect, "INSERT INTO documentacion (id_numot, id_flujo, id_usuario, estructura) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($creando, 'iisi', $id_numot, $id_valida_usuario, $id_flujo, $estructura);
    mysqli_stmt_execute($creando);
    $id_documentacion = mysqli_stmt_insert_id($creando); 

    
    //// SE INSERTA EL INSPECTOR
    $insertando_documentador = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_documentador, 'ii', $id_documentacion, $id_valida_usuario);
    mysqli_stmt_execute($insertando_documentador);

    $insertando_primer_parcipante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona,  id_usuario, orden, id_flujo) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_primer_parcipante, 'iiii', $id_valida_usuario,   $id_valida_usuario,  $orden1, $id_flujo);
    mysqli_stmt_execute($insertando_primer_parcipante);

    $insertando_tercer_parcipante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona,   id_usuario, orden, id_flujo) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_tercer_parcipante, 'iiii', $id_valida_usuario, $id_valida_usuario,  $orden3, $id_flujo);
    mysqli_stmt_execute($insertando_tercer_parcipante);
   

    $insertando_inspector = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_inspector, 'ii', $id_documentacion, $id_valida_usuario);
    mysqli_stmt_execute($insertando_inspector);
  
   
    ////////// BUSCO LOS PARTICIPANTES EN EL FLUJO
    $buscando_documentadores = mysqli_prepare($connect,"SELECT a.id_usuario FROM persona as a, cargo as b, departamento as c WHERE a.id_cargo = b.id_cargo AND b.id_departamento = c.id AND c.id = 6");
    mysqli_stmt_execute($buscando_documentadores);
    mysqli_stmt_store_result($buscando_documentadores);
    mysqli_stmt_bind_result($buscando_documentadores, $id_usuario);

    while($row = mysqli_stmt_fetch($buscando_documentadores)){
     
      
      $insertando_segundo = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona,   id_usuario, orden, id_flujo) VALUES (?, ?, ?, ?)");
      mysqli_stmt_bind_param($insertando_segundo, 'iiii', $id_usuario,  $id_usuario,  $orden2, $id_flujo);
      mysqli_stmt_execute($insertando_segundo);
      $insertando_document = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
      mysqli_stmt_bind_param($insertando_document, 'ii', $id_documentacion, $id_usuario);
      mysqli_stmt_execute($insertando_document);
      
   
    }

    ////////// BUSCANDO HEAD
    $buscando_head = mysqli_prepare($connect,"SELECT a.id_usuario FROM persona as a, cargo as b, departamento as c WHERE a.id_cargo = b.id_cargo AND b.id_departamento = c.id AND c.departamento = ? AND b.nombre = 'Head'");
    mysqli_stmt_bind_param($buscando_head, 's', $departmento);
    mysqli_stmt_execute($buscando_head);
    mysqli_stmt_store_result($buscando_head);
    mysqli_stmt_bind_result($buscando_head, $id_usuario);

    while($row = mysqli_stmt_fetch($buscando_head)){
      
      $insertando_segundo = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona,   id_usuario, orden) VALUES (?, ?, ?, ?)");
      mysqli_stmt_bind_param($insertando_segundo, 'iiii', $id_usuario, $id_usuario,  $orden4, $id_flujo);
      mysqli_stmt_execute($insertando_segundo);
      $insertando_head = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
      mysqli_stmt_bind_param($insertando_head, 'ii', $id_documentacion, $id_usuario);
      mysqli_stmt_execute($insertando_head);


      
    }

    ////////// BUSCANDO OPERACIONES
    $buscando_OP = mysqli_prepare($connect,"SELECT a.id_usuario FROM persona as a, cargo as b WHERE a.id_cargo = b.id_cargo AND b.nombre = 'Chief Operating Officer' ");
    mysqli_stmt_execute($buscando_OP);
    mysqli_stmt_store_result($buscando_OP);
    mysqli_stmt_bind_result($buscando_OP, $id_usuario);

    while($row = mysqli_stmt_fetch($buscando_OP)){

     
     
      $insertando_segundo = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_usuario, orden, id_flujo) VALUES (?, ?, ?, ?)");
      mysqli_stmt_bind_param($insertando_segundo, 'iiii', $id_usuario,  $id_usuario,  $orden4, $id_flujo);
      mysqli_stmt_execute($insertando_segundo);
      $insertando_op = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
      mysqli_stmt_bind_param($insertando_op, 'ii', $id_documentacion, $id_usuario);
      mysqli_stmt_execute($insertando_op);
      
      
    }


    ////////// BUSCANDO CALIDAD
    $buscando_calidad = mysqli_prepare($connect,"SELECT a.id_usuario FROM persona as a, cargo as b WHERE a.id_cargo = b.id_cargo AND b.nombre = 'Quality Controller' ");
    mysqli_stmt_execute($buscando_calidad);
    mysqli_stmt_store_result($buscando_calidad);
    mysqli_stmt_bind_result($buscando_calidad, $id_usuario);

    while($row = mysqli_stmt_fetch($buscando_calidad)){

          
      $insertando_segundo = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona,  id_usuario, orden, id_flujo) VALUES (?, ?, ?, ?)");
      mysqli_stmt_bind_param($insertando_segundo, 'iiii', $id_usuario,  $id_usuario,  $orden5, $id_flujo);
      mysqli_stmt_execute($insertando_segundo);
      $insertando_calidad = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
      mysqli_stmt_bind_param($insertando_calidad, 'ii', $id_documentacion, $id_usuario);
      mysqli_stmt_execute($insertando_calidad);
      
    }

    
    
  
  }///////// CIERRE DEL IF QUE COMPARA EL COMPORTAMIENTO DEL FLUJO CON LINK
 
  if($departmento == "Otro"){

     ///////////////////// INSERTO EL ID DEL FLUJO EN EL NUEVO PROCESO DOCUMENTAL
     $creando = mysqli_prepare($connect, "INSERT INTO documentacion (id_numot, id_usuario) VALUES (?,?)");
     mysqli_stmt_bind_param($creando, 'ii', $id_numot, $id_valida_usuario);
     mysqli_stmt_execute($creando);
     $id_documentacion = mysqli_stmt_insert_id($creando); 
     
  }




/*



if($creando){
  
 


 
  $query_departamento = mysqli_prepare($connect,"SELECT a.id_usuario FROM control_departamento as a, departamento as b, persona as c WHERE a.id_departamento = b.id AND b.departamento = ? AND a.id_usuario = c.id_usuario AND c.cargo = 'Head'");
  mysqli_stmt_bind_param($query_departamento, 's', $departmento);
  mysqli_stmt_execute($query_departamento);
  mysqli_stmt_store_result($query_departamento);
  mysqli_stmt_bind_result($query_departamento, $usuarios);

  while($row = mysqli_stmt_fetch($query_departamento)){

    //// INSERTO EL HEAD
    $insertando_documentador = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_documentador, 'ii', $id_documentacion, $usuarios);
    mysqli_stmt_execute($insertando_documentador);

    $insertando_head_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_head_participante, 'iiii', $usuarios, $id_documentacion, $revisor, $id_valida_usuario);
    mysqli_stmt_execute($insertando_head_participante);
      
  }

 
  //// INSERTO CALIDAD 
  $consultar_calidad = mysqli_prepare($connect,"SELECT a.id_usuario FROM usuario as a, persona as b WHERE a.id_usuario = b.id_usuario AND cargo = 'Calidad' LIMIT 1");
  mysqli_stmt_execute($consultar_calidad);
  mysqli_stmt_store_result($consultar_calidad);
  mysqli_stmt_bind_result($consultar_calidad, $id_calidad);

  while($row = mysqli_stmt_fetch($consultar_calidad)){
    $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_calidad);
    mysqli_stmt_execute($insertando_gerentes);

    $insertando_calidad_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_calidad_participante, 'iiii', $id_calidad, $id_documentacion, $revisor, $id_valida_usuario);
    mysqli_stmt_execute($insertando_calidad_participante);
  }



 //// INSERTO CEO 
 $consultar_gerentes = mysqli_prepare($connect,"SELECT a.id_usuario FROM usuario as a, persona as b WHERE a.id_usuario = b.id_usuario AND cargo = 'CEO'");
 mysqli_stmt_execute($consultar_gerentes);
 mysqli_stmt_store_result($consultar_gerentes);
 mysqli_stmt_bind_result($consultar_gerentes, $id_gerentes);

 while($row = mysqli_stmt_fetch($consultar_gerentes)){
   $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
   mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_gerentes);
   mysqli_stmt_execute($insertando_gerentes);

   $insertando_ceo_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_ceo_participante, 'iiii', $id_gerentes, $id_documentacion, $aprobador, $id_valida_usuario);
    mysqli_stmt_execute($insertando_ceo_participante);
 }


  //// INSERTO COO 
  $consultar_gerentes2 = mysqli_prepare($connect,"SELECT a.id_usuario FROM usuario as a, persona as b WHERE a.id_usuario = b.id_usuario AND cargo = 'COO'");
  mysqli_stmt_execute($consultar_gerentes2);
  mysqli_stmt_store_result($consultar_gerentes2);
  mysqli_stmt_bind_result($consultar_gerentes2, $id_gerentes);
 
  while($row = mysqli_stmt_fetch($consultar_gerentes2)){
    $insertando_gerentes = mysqli_prepare($connect,"INSERT INTO firmantes_documentacion (id_documento, id_usuario) VALUES (?,?)");
    mysqli_stmt_bind_param($insertando_gerentes, 'ii', $id_documentacion, $id_gerentes);
    mysqli_stmt_execute($insertando_gerentes);

    $insertando_ceo_participante = mysqli_prepare($connect,"INSERT INTO participante_documentacion(id_persona, id_documentacion, rol,  id_usuario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($insertando_ceo_participante, 'iiii', $id_gerentes, $id_documentacion, $aprobador, $id_valida_usuario);
    mysqli_stmt_execute($insertando_ceo_participante);
  }
  
} */

echo "Si";

  mysqli_close($connect);
?>