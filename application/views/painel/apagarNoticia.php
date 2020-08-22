

<div class="modalApagar">
	
	<!-- Modal -->
	<div class="modal-apagar" id="modal-name">
	  <div class="modal-sandbox"></div>
	  <div class="modal-box">
	    <div class="modal-header">
	      <h1>Apagar Notícia</h1>
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
		$('#apagarLink').attr("href", "<?= base_url(); ?>painel/apagarNoticia?id="+id);
	}
	function closeApagarProduto(){
		$('.modal-apagar').css("display","none");
	}
</script>




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
						<div class="col-4 txC"><a onclick="apagarProduto(<?= $item['id_noticia'] ?>)"><button class="buttonApagar btn btn-primary">Apagar</button></a></div>
					</div> 

					<?php
				}
			 ?>

		</div>
	</div>
</div>


