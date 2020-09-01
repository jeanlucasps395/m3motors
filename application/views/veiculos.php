<body class="veiculos">
    <main>
        <section>
            <div class="mm-back">
                <div class="mm-back__content">
                    <h1>Confira agora</h1>
                    <h1>Todos os nossos veículos</h1>
                </div>
            </div>
        </section>

        <section>
            <div class="mm-title">
                <h1>Todos os veículos</h1>
                <p>encontre o carro que é a sua cara</p>
            </div>
            <div class="mm-block mm-search">
                <div class="container_custom">
                    <div class="mm-veiculo">
                       


                          <?php foreach ($carros as $carro) { ?>
                                <div class="mm-veiculo__colection">
                                    <div class="mm-block-slick">
                                        <div class="mm-block-slick__img" style="background: url(<?= base_url('style/carros'); ?>/<?= $carro['id']; ?>/carro1.png) center center no-repeat;background-size: cover;height: 240px;border-top-left-radius: 15px;border-top-right-radius: 15px;">
                                            <!-- <img src="/m3motors/style/img/img_339x206.png" alt="Teste"> -->
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
                                                    <h6>Ano: 2018/2019</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mm-block-slick__price">
                                            <p class="mm-block-slick__price--number">R$<span><?= $carro['valor']; ?></span></p>
                                            <p class="mm-block-slick__price--km"><?= $carro['km']; ?> Km</p>
                                        </div>
                                    </div>
                                    <div class="mm-block-slick__btn">
                                        <a href="<?= base_url('home/product?id='); ?><?= $carro['id']; ?>">Ver mais</a>
                                    </div>
                                </div>
                        <?php } ?>

                       



                    <!--     <div class="mm-veiculo__colection">
                            <div class="mm-block-slick">
                                <div class="mm-block-slick__img">
                                    <img src="/m3motors/style/img/img_339x206.png" alt="Teste">
                                </div>
                                <div class="mm-block-slick__block">
                                    <div class="mm-block-slick__title">
                                        <h6>Volkswagem gol</h6>
                                    </div>
                                    <div class="mm-block-slick__content">
                                        <p class="mm-block-slick__content--title">1.6 MAIS TOTAL FLEX</p>
                                        <p class="mm-block-slick__content--description">AUTOMÁTICO</p>
                                    </div>
                                    <div class="mm-block-slick__end">
                                        <div class="mm-block-slick__end--title">
                                            <h6>Ano: 2018/2019</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="mm-block-slick__price">
                                    <p class="mm-block-slick__price--number">R$<span>50.000</span></p>
                                    <p class="mm-block-slick__price--km">7001 Km</p>
                                </div>
                            </div>
                            <div class="mm-block-slick__btn">
                                <a href="<?= base_url('home/product'); ?>">Ver mais</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>


    </main>

</body>