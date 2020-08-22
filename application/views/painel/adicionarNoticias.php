
<div class="bg-painel">
	<h1>Nova notícia</h1>
</div>


<div class="widhtPadrao">	
	<div class="blocoDashboard">
		<div class="formDash formCadastro">
			<!-- <h2>Adicionar carro</h2> -->
			<form action="<?= base_url('painel/adicionarNoticiaCadastro'); ?>" method="post" enctype="multipart/form-data">

			  <div class="form-group">
			    <label>Título da notícia</label>
			    <input type="text" class="form-control" placeholder="Título da notícia" name="titulo">
			  </div>

			  <div class="form-group">
			    <label>Descrição</label>
			    <textarea name="message"></textarea>
			  </div>

			  <div class="form-group">
			    <label>Foto para capa da notícia</label>
			    <input  type="file" id="files" name="arquivo" class="form-control">
			 </div>


			  
			  
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</div>

 <script>
        CKEDITOR.replace( 'message' );
</script>
