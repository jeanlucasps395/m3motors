<body>
    <main>
        <section>
            <div class="mm-back">
                <!-- <img class="img-fluid" src="<?= base_url('style/'); ?>img/full-slider.png" alt="M3 Motors"> -->
                <div class="mm-back__content">
                    <h1>Encontre o carro</h1>
                    <h1>Perfeito para você</h1>
                    <p>Compre o seu carro hoje mesmo</p>
                    <a href="#veiculo">
                        <i class="fas fa-arrow-down"></i>
                    </a>
                    </a>
                </div>
            </div>
        </section>
        <section class="container">
            <section>
                <div class="mm-news">
                    <h1>Ultimas notícias</h1>
                    <div class="mm-news__bock">


                        <?php foreach ($noticias as $noticia) { ?>    

                            <div class="col-12 col-sm-6 mm-news__bock--left">
                                <a href="<?= base_url('home/newspaper?id='); ?><?= $noticia['id_noticia'] ?>">
                                    <div class="" style="background: url(<?= base_url('style/noticias'); ?>/<?= $noticia['id_noticia']; ?>/noticia.png) center center no-repeat;background-size: cover;height: 371px;width: 100%;border-radius: 15px;">   </div>
                                </a>
                                <!-- <img class="img-fluid" src="<?= base_url('style/'); ?>img/img_670x371.png" alt="News"> -->
                                <div class="mm-news__date">
                                    <p>
                                       <?= $noticia['dataCadastro']; ?>
                                    </p>
                                </div>
                                <div class="mm-news__title">
                                    <p>
                                        <?= $noticia['titulo']; ?>
                                    </p>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                    <div class="col-12 mm-news__block--btn">
                        <button><a href="#">Ver todas as notícias</a></button>
                    </div>

                </div>
            </section>
        </section>

        <section>
            <div class="mm-title">
                <a id="veiculo"></a>
                <h1>Todos os veículos</h1>
                <p>encontre o carro que é a sua cara</p>
            </div>
            <div class="mm-block">
                <div class="container">
                    <div class="mm-slider">

                        <?php foreach ($carros as $carro) { ?>
                            <a href="<?= base_url('home/product?id='); ?><?= $carro['id']; ?>">
                            <div class="mm-block-slick">
                                <div class="mm-block-slick__img" style="background: url(<?= base_url('style/carros'); ?>/<?= $carro['id']; ?>/carro1.png) center center no-repeat;background-size: cover;height: 240px;border-top-left-radius: 15px;border-top-right-radius: 15px;">
                                    <!-- <img src="" alt="Teste"> -->
                                </div>
                                <div class="mm-block-slick__block">
                                    <div class="mm-block-slick__title">
                                        <h6><?= $carro['nome']; ?></h6>
                                    </div>
                                    <div class="mm-block-slick__content">
                                        <!-- <p class="mm-block-slick__content--title">1.6 MAIS TOTAL FLEX</p> -->
                                        <p class="mm-block-slick__content--description"><?= $carro['descricao']; ?></p>
                                    </div>
                                    <div class="mm-block-slick__end">
                                        <div class="mm-block-slick__end--title">
                                            <h6>Ano: <?= $carro['ano']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="mm-block-slick__price">
                                    <p class="mm-block-slick__price--number">R$<span><?= $carro['valor']; ?></span></p>
                                    <p class="mm-block-slick__price--km"><?= $carro['km']; ?> Km</p>
                                </div>
                            </div>
                            </a>

                        <?php } ?>


                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mm-news__block--btn">
                    <button><a class="nav-link" href="<?= base_url('home/veiculos'); ?>">Ver todos os carros</a></button>
                </div>
            </div>
        </section>

        <section>
            <div class="container_custom">
                <div class="mm-brand">
                    <h1>Marcas</h1>
                    <p>Marcas dos veículos</p>
                    <ul class="mm-block__marcas">
                        <li>Chevrolet</li>
                        <li>Volkswagen</li>
                        <li>Fiat</li>
                        <li>Renault</li>
                        <li>Ford</li>
                        <li>Toyota</li>
                        <li>hyundai</li>
                        <li>Jeep</li>
                        <li>Honda</li>
                        <li>Nissan</li>
                        <li>Citroën</li>
                        <li>mitsubishi</li>
                    </ul>
                </div>
            </div>
        </section>

        <style type="text/css">
            a{
                text-decoration: none;
            }
            a:hover{
                text-decoration: none;
            }
            .mm-block .mm-slider .mm-block-slick__title h6{
                color: black;
            }
        </style>