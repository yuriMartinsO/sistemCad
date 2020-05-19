<div class="grupos-itens-container">
	<h3>Selecione o grupo de item para Cadastro</h3>
	<div class="row">
		<div class="col-4">
			<div class="list-group" id="list-tab" role="tablist">
				<?php CadastroController::listaItemGrupoLista()?>
			</div>
		</div>
		<div class="col-8">
			<div class="tab-content" id="nav-tabContent">
				<?php CadastroController::listaItemGrupoPainel()?>
			</div>
		</div>
	</div>
</div>