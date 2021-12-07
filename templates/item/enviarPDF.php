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

    	
    		break;
    	//Freezer		
    	case 3:

    	
    		break;
    	//ultrafreezer			
    	case 4:

    	
    		break;
    	//Estufa		
    	case 5:

    	
    		break;
    	//Incubadora			
    	case 6:

    	
    		break;
    	//Automovil	
    	case 7:

    	
    		break;
    	//Sala limpia		
    	case 8:

    	
    		break;							
    	//HVAC		
    	case 10:

    	
    		break;
    	//Filtro		
    	case 11:

    	
    		break;
    	//Campana		
    	case 12:

    			header('location: update_campana_extraccion.php?item='.$id_item.'&pdf='.$pdf);
    			// http://localhost/CerNet2.0/templates/item/update_campana_extraccion.php?item=1&pdf=1

    		break;	
    	//Flujo laminal		
    	case 13:

    	
    		break;			



    	default:
    			echo "error";
    		break;

    }




 ?>