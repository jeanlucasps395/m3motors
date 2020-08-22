

<div class="modalApagar">
	
	<!-- Modal -->
	<div class="modal-apagar" id="modal-name">
	  <div class="modal-sandbox"></div>
	  <div class="modal-box">
	    <div class="modal-header">
	      <h1>Apagar Carro</h1>
	    </div>
	    <div class="modal-body txC">
	    	
	      <button class="close-modal button-modal button-modal--cancelar" onclick="closeApagarProduto()">Cancelar</button>
	      <a href="" id="apagarLink"><button class="close-modal button-modal">Apagar</button></a>
	    </div>
	  </div>
	</div>

</div>

<script type="text/javascript">
	function apagarProduto(id){
		$('.modal-apagar').css("display","block");
		$('#apagarLink').attr("href", "<?= base_url(); ?>painel/apagarVeiculo?id="+id);
	}
	function closeApagarProduto(){
		$('.modal-apagar').css("display","none");
	}
</script>




<div class="bg-painel">
	<h1>Apagar carros</h1>
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
						<div class="col-2 txC"><a onclick="apagarProduto(<?= $item['id'] ?>)"><button class="buttonApagar btn btn-primary">Apagar</button></a></div>
					</div>

					<?php
				}
			 ?>

		</div>
	</div>
</div>


