<div class="bg-painel">
	<h1>Editar Notícia</h1>
</div>
<div class="widhtPadrao">	
	<div class="blocoDashboard">
		<div class="formDash formCadastro">
			<!-- <h2>Adicionar carro</h2> -->
			<form action="<?= base_url('painel/editarNoticia'); ?>" method="post" enctype="multipart/form-data">
				
				<input type="hidden"  name="id" value="<?= $noticia['id_noticia'] ?>">

				<div class="form-group">
				    <label>Título da notícia</label>
				    <input type="text" value="<?= $noticia['titulo'] ?>" class="form-control" placeholder="Título da notícia" name="titulo">
				</div>

				<div class="form-group">
				   <label>Descrição</label>
				   <textarea name="message"><?= $noticia['titulo'] ?></textarea>
				</div>


				<div>
					<?php
					 
					 	$diretoria = $_SERVER['DOCUMENT_ROOT'].$noticia['imagem'].'/';

					 	$dir = $diretoria;
						$files = scandir($dir,1);
						echo "<div class='row'>";
						$conteudo = '';
						foreach ($files as $file){
						 // diretório + nome do arquivo de imagem
						 $caminho_completo = $noticia['imagem'].'/'.$file;
						 // eliminando o '.' e '..'
						 if ($file != '.' && $file != '..'){
						 	$conteudo = true;
						 	echo "<div class='col-6 txC'>";
						    echo "<img src='{$caminho_completo}' alt='Fotos' class='fotoEdit' width='100%' />";
						    echo "<a href='".base_url('painel/removerImagemNoticia')."?caminho={$caminho_completo}&id={$_GET['id']}'><button type='button' class='button_remove'>Remover</button> </a>";
						    echo "</div>";
						 }	
						}
						echo "</div>";
					?>
				</div>

				<?php 
				if(empty($conteudo)){ ?>
				  <div class="form-group">
				    <label>Foto do carro</label>
				    <input  type="file" id="files" name="arquivo" class="form-control">
				  </div>
				<?php } ?>
			  
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
		</div>
	</div>
</div>

 <script>
        CKEDITOR.replace( 'message' );
</script>
