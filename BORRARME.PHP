<html>
    <head>

    </head>

    <body>
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }

        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }

        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
        padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }
    </style>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container">
        </div>
    </figure> 

    <script>
        
    Highcharts.chart('container', {

        title: {
            text: 'Mapeo Termico'
        },

        subtitle: {
            text: 'Cercal Group'
        },

        yAxis: {
            title: {
                text: 'Temperatura'
            }
        },

        xAxis: {
            title: {
                text: 'Time'
            }
        },

        xAxis: {
            categories:[<?php 
                for($i=1;$i<=30;$i++){
                echo $i.",";
                }    
            ?>]

        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: 
            [
                <?php 
                    for($i=1;$i<=30;$i++){
                        echo $i.",";
                    }    
                ?>  
            ]

        },



        series: [{
        <?php 
        
            for($i = 0; $i<=20; $i++){
                if($i==0){
        ?>
                    name: 'V<?php echo $i;?>',
        <?php
                }else{
        ?>      
                {name: 'V<?php echo $i;?>', <?php } ?>
                data:[<?php
                
                for($g = 1; $g<=15; $g++){

                    if($g==15){

                        echo (($g*$i));
                    }else{

                        echo (($g*$i)).",";
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
        ],

        responsive: {
            rules: [{
                condition: {
                maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
    
    </script>
    </body>
</html>