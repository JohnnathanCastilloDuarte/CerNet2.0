<?php 
	
	$correo =  $_POST['correo'];
    $id_item = $_POST['id_item'];
    $id_tipo = $_POST['id_tipo'];
    $pdf     = $_POST['pdf'];

    switch ($id_tipo) {
    	//bodega
    	case 1:
    		
    		 header('location: update_bodega.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);
         // echo "update_bodega.php?item=".$id_item."&pdf=".$pdf."&correo=".$correo;
    		break;
    	//Refrigerador	
    	case 2:

    	    header('location: update_refrigerador.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);
    		break;
    	//Freezer		
    	case 3:

    	    header('location: update_freezer.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    		break;
    	//ultrafreezer			
    	case 4:

    	     header('location: update_ultrafreezer.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    		break;
    	//Estufa		
    	case 5:

    	      header('location: update_estufa.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);   
    		break;
    	//Incubadora			
    	case 6:
              header('location: update_incubadora.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);
    	
    		break;
    	//Automovil	
    	case 7:

              header('location: update_automovil.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    	
    		break;
    	//Sala limpia		
    	case 8:

              header('location: update_sala_limpia.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    	
    		break;							
    	//HVAC		
    	case 10:

    	      //header('location: update_h.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
              echo "Sin acceso"; 

    		break;
    	//Filtro		
    	case 11:

    	      header('location: update_filtro.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    		break;
    	//Campana		
    	case 12:

    		    header('location: update_campana_extraccion.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);

    		break;	
    	//Flujo laminal		
    	case 13:

                header('location: update_flujo_laminar.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    	
    		break;			
        //Camara congelada
      case 14:

    	      header('location: update_camara_congelada.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);
        
    		break;			



    	default:
    			echo "error";
    		break;

    }




 ?>