<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Modulo de mapeos
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>OT</th>
                        <th>Item</th>
                        <th>Empresa</th>
                        <th>Usuario asignado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        {if $conteo_mapeo == 0}
                        <tr>
                            <td>
                            
                                    Sin resultados
                                
                            </td>	
                        </tr>	
                        {else}
                        {foreach from=$array_mapeo item=mapeo}
                        <tr>
                            <td>{$mapeo.numot}</td>
                            <td>{$mapeo.item}</td>
                            <td>{$mapeo.empresa}</td>
                            <td>{$mapeo.nombre_usuario} {$mapeo.apellido_usuario}</td>
                            <td>
                                <a href="index.php?module={$modulo[6]}&page={$page[9]}&asignado={$mapeo.id_asignado}&type={$id_servicio_mapeo}" class="btn btn-outline-success">Informe</a>
                            </td>
                        </tr>
                        {/foreach}
                        {/if}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>