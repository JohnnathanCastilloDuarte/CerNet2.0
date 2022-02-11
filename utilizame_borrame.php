<?php 
    $sucia = 0;
for($i = 0; $i<=20; $i++){
    if($i==0){
        ?>
        name: 'V<?php echo $i;?>',
        <?php
    }else{
    ?>{name: 'V<?php echo $i;?>', <?php } ?>
    data:[<?php
    for($g = 1; $g<=15; $g++){
        if($i/2 == 0){
            $sucia=3;
        }else{
            $sucia=5;
        }
        if($g==15){
            echo (($g*$sucia)+$i);
        }else{
            echo ($g*$sucia).",";
        }
    
    }
    if($i == 20){
    ?>
    ]}
    <?php 
    }else{
    ?>
    ]},
    <?php
    }          
}

?>