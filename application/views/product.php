<body class="mm-product">
    <main>
        <div class="container">
            <div class="mm-product__block-center">
                <div class="col-12 col-lg-6">
                    <div class="mm-product__block-left">
                        <!-- <h1>Mitsubishi Lancer Evolution X</h1> -->
                        <!-- <?php print_r($carros); ?> -->
                        <h1><?= ($carros['nome']); ?></h1>
                        <div class="mm-product__block-left--img">
                            <!-- <img src="<?= base_url('style/'); ?>img/600x600.png" alt="Teste">-->
                           
                            <?php
                                $diretoria = $_SERVER['DOCUMENT_ROOT'].$carros['imagem'].'/'; // esta linha não precisas é só um exemplo do 

                                  $dir = $diretoria;
                                  $files = scandir($dir,1);
                                  foreach ($files as $file){
                                     // diretório + nome do arquivo de imagem
                                     $caminho_completo = $carros['imagem'].'/'.$file;
                                     // eliminando o '.' e '..'
                                     if ($file != '.' && $file != '..'){
                                        echo "<img src='{$caminho_completo}' alt='Fotos' />";
                                     }  
                                   }
                            ?>

                        </div>

                        <ul>
                            <li>
                                <h2>Sobre este Carro</h2>
                            </li>
                            <li>
                                <p><?= ($carros['descricao']); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mm-product__block-right">
                        <div class="mm-background__form">
                            <form action="<?= base_url() ?>home/emailrodape" method="post">
                                <label for="" class="name">
                                    Nome
                                </label>
                                <input type="text" name="nomelCliente" id="" placeholder="Quem devemos procurar?">
                                <label for="" class="email">
                                    Email
                                </label>
                                <input type="email" name="emailCliente" id="" placeholder="nos diga seu melhor email">
                                <label for="" class="tel">
                                    Telefone
                                </label>
                                <input type="tel" name="telefone" id="" placeholder="Nos diga seu telefone">
                                <label for="">Mensagem</label>
                                <textarea style="resize: none" name="mensagem" id="" cols="30" rows="10" placeholder="Fale um pouco mais aqui..."></textarea>
                                <div class="mm-background__form-block">
                                    <button class="mm-background__form-block--btn" type="submit">Enviar
                                        Mensagem</button>
                                </div>
                            </form>
                        </div>
                        <div class="mm-background__content">
                            <div class="mm-background__line">
                            </div>
                            <div class="mm-background__text">
                                <h1>
                                    Diga<br>
                                    <strong>Olá!</strong>
                                    <p>Entre em contato para<br>
                                        mais informações</p>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>