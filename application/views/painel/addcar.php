
<div class="bg-painel">
	<h1>Adicionar carro</h1>
</div>
<div class="widhtPadrao">	
	<div class="blocoDashboard">
		<div class="formDash">
			<!-- <h2>Adicionar carro</h2> -->
			<form action="<?= base_url('painel/cadastrarCarro'); ?>" method="post" enctype="multipart/form-data">

			  <div class="form-group">
			    <label>Modelo</label>
			    <input type="text" class="form-control" placeholder="Nome" name="Modelo">
			  </div>

			  <div class="form-group">
			    <label>Marca</label>
			    <input type="text" class="form-control" placeholder="Marca" name="marca">
			  </div>

			  <div class="form-group">
			    <label>Ano</label>
			    <input type="text" class="form-control" placeholder="ano" name="ano">
			  </div>

			  <div class="form-group">
			    <label>Valor</label>
			    <input type="text" class="form-control" placeholder="R$ 00.000,00" name="valor">
			  </div>

			  <div class="form-group">
			    <label>KM</label>
			    <input type="number" class="form-control" placeholder="Kilometragem rodada" name="km">
			  </div>

			  <div class="form-group">
			    <label>Descrição</label>
			    <textarea name="message"></textarea>
			  </div>

			  <div class="form-group">
			    <label>Foto do carro</label>
			    <input  type="file" id="files" name="arquivo1" class="form-control">
			 </div>

			 <input type="hidden" id="contFotos" name="contFotos" value="1">

			 <div class="maisfotos">

			 </div>

			 <p class="maisCarrosP" onclick="maisfotos()">Mais fotos</p>
			  
			  
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</div>

 <script>
        CKEDITOR.replace( 'message' );
</script>

<script >
	var cont = 1
	function maisfotos(){
		cont++;

		$('#contFotos').val(cont);

		$('.maisfotos').append(
        	$('<input/>').attr('type', 'file').attr('name', 'arquivo'+cont)
    	);

	}
</script>