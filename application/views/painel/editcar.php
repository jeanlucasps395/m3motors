
<div class="bg-painel">
	<h1>Lista de carros</h1>
</div>
<div class="widhtPadrao">	
	<div class="blocoDashboard">
		<div class="listOptions">
			<div class="headerT">
				<div class="row">
					<div class="col-2 tH">Modelo</div>
					<div class="col-2 tH">Marca</div>
					<div class="col-2 tH">Ano</div>
					<div class="col-2 tH">Valor</div>
					<div class="col-2 tH">Data de cadastro</div>
					<div class="col-2 tH">Editar</div>
				</div>
			</div>
			<?php
				foreach ($lista as $item) {
					?>

					<div class="row linhaTR">
						<div class="col-2"><p><?= $item['nome'] ;?></p></div>
						<div class="col-2"><p><?= $item['marca'] ;?></p></div>
						<div class="col-2"><p><?= $item['ano'] ;?></p></div>
						<div class="col-2"><p>R$ <?= $item['valor'] ;?></p></div>
						<div class="col-2"><p><?= $item['nome'] ;?></p></div>
						<div class="col-2 txC"><a href="<?= base_url().'painel/editarVeiculo?id='?><?= $item['id'] ?>"><button class="buttonEditar btn btn-primary">Editar</button></a></div>
					</div>

					<?php
				}
			 ?>

		</div>
	</div>
</div>
