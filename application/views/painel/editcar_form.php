<div class="bg-painel">
	<h1>Editar carro</h1>
</div>
<div class="widhtPadrao">	
	<div class="blocoDashboard">
		<div class="formDash">
			<!-- <h2>Adicionar carro</h2> -->
			<form action="<?= base_url('painel/editarCarroForm'); ?>" method="post" enctype="multipart/form-data">
			<!-- <?php
				print_r($veiculo);
				?> -->
			  <input type="hidden"  name="id" value="<?= $veiculo['id'] ?>">
			  <div class="form-group">
			    <label>Nome</label>
			    <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?= $veiculo['nome'] ?>">
			  </div>

			  <div class="form-group">
			    <label>Marca</label>
			    <input type="text" class="form-control" placeholder="Marca" name="marca" value="<?= $veiculo['marca'] ?>">
			  </div>

			  <div class="form-group">
			    <label>Ano</label>
			    <input type="text" class="form-control" placeholder="ano" name="ano" value="<?= $veiculo['ano'] ?>">
			  </div>

			  <div class="form-group">
			    <label>Valor</label>
			    <input type="text" class="form-control" placeholder="R$ 00.000,00" name="valor" value="<?= $veiculo['valor'] ?>">
			  </div>

			  <div class="form-group">
			    <label>KM</label>
			    <input type="number" class="form-control" placeholder="Kilometragem rodada" name="km" value="<?= $veiculo['km'] ?>">
			  </div>

			  <div class="form-group">
			    <label>Descrição</label>
			    <textarea name="message"><?= $veiculo['descricao'] ?></textarea>
			  </div>


			  <div>
			  	<?php
			  	 
			  	 	$diretoria = $_SERVER['DOCUMENT_ROOT'].$veiculo['imagem'].'/'; // esta linha não precisas é só um exemplo do 

			  	 	 $dir = $diretoria;
					  $files = scandir($dir,1);
					  echo "<div class='row'>";
					  foreach ($files as $file){
					     // diretório + nome do arquivo de imagem
					     $caminho_completo = $veiculo['imagem'].'/'.$file;
					     // eliminando o '.' e '..'
					     if ($file != '.' && $file != '..'){
					     	echo "<div class='col-6 txC'>";
					        echo "<img src='{$caminho_completo}' alt='Fotos' class='fotoEdit' width='100%' />";
					        echo "<a href='".base_url('painel/removerImagem')."?caminho={$caminho_completo}&id={$_GET['id']}'><button type='button' class='button_remove'>Remover</button> </a>";
					        echo "</div>";
					     }	
					   }
					   echo "</div>";
			  	?>
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