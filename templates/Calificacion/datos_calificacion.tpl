<div class="card">
    <div class="card-header">
        Generación de informes para calificación
        
    </div>
    <div class="card-body">
        <label for="">Clickea el boton del informe que quieras generar:</label>
        <br> 
        <br>
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-info" id="crear_informe" value="URS">URS</button>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-info" id="crear_informe" value="DQ">DQ</button>
            </div>
        </div>
    </div>
</div>
<hr>
<label for="">Informes de calificación generados:</label>
<hr>

<div class="card">
    <div class="card-body">
        <table class="table" id="example" style="text-align: center;">
            <thead>
                <th>#</th>
                <th>Empresa</th>
                <th>Tipo Informe</th>
                <th>Nombre informe</th>
                <th>Fecha creación</th>
                <th>Opciones</th>
            </thead>
            <tbody id="trae_informes">

            </tbody>
        </table>
    </div>
</div>

<script src="design/js/controlador_calificaciones.js"></script>