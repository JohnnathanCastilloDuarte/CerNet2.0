<?php 
	
	$correo =  $_POST['correo'];
    $id_item = $_POST['id_item'];
    $id_tipo = $_POST['id_tipo'];
    $pdf     = $_POST['pdf'];

    switch ($id_tipo) {
    	//bodega
    	case 1:
    		
    		
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

    	
    		break;
    	//Automovil	
    	case 7:

              header('location: update_automovil.php?item='.$id_item.'&pdf='.$pdf.'&correo='.$correo);  
    	
    		break;
    	//Sala limpia		
    	case 8:

    	
    		break;							
    	//HVAC		
    	case 10:

    	
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

    	
    		break;			



    	default:
    			echo "error";
    		break;

    }




 ?>