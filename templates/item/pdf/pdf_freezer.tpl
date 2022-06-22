 <div class="row">
 	<div class="col-sm-12">
 		{foreach from=$array_freezer  item=freezer}
 		<div class="card">
 			<div class="card-header">
 				<h5>
 					Generar y enviar pdf <span>{$freezer.nombre_freezer}</span>
 				</h5>
 			</div>
 			<div class="card-body">
 					<div class="form-row">
						<div class="col-sm-6">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
							<br>
						<button class="btn btn-primary">enviar</button>
						<a href="templates/item/pdf/pdf/pdf_freezer.php"><button class="btn btn-danger">Ver PDF</button></a>
						</div>
					</div>		
			</div>
		</div>
				{/foreach}
			</div>
		</div>
		<script type="text/javascript" src="design/js/update_freezer.js"></script>