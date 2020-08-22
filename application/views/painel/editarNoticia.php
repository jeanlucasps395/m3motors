<div class="bg-painel">
	<h1>Apagar Notícia</h1>
</div>
<div class="widhtPadrao">	
	<div class="blocoDashboard">
		<div class="listOptions">
			<div class="headerT">
				<div class="row">
					<div class="col-8 tH">Titulo</div>
					<div class="col-4 tH">Apagar</div>
				</div>
			</div>
			<?php
				foreach ($lista as $item) {
					?>

					<div class="row linhaTR">
						<div class="col-8"><p><?= $item['titulo'] ;?></p></div>
						<div class="col-4 txC"><a href="<?= base_url().'painel/editarNoticiaForm?id='?><?= $item['id_noticia'] ?>"><button class="buttonEditar btn btn-primary">Editar</button></a></div>
					</div> 

					<?php
				}
			 ?>

		</div>
	</div>
</div>


