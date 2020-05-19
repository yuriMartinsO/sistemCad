<div class="grupos-itens-container">
	<div class="botao-container-adicionar-grupo">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddGrupo">
			Adicionar Grupo
		</button>
	</div>
	<h3>Grupos de itens</h3>
	<div class="row">
		<div class="col-4">
			<div class="list-group" id="list-tab" role="tablist">
				<?php GrupoController::listaItemGrupoLista()?>
			</div>
		</div>
		<div class="col-8">
			<div class="tab-content" id="nav-tabContent">
				<?php GrupoController::listaItemGrupoPainel()?>
			</div>
		</div>
	</div>
</div>