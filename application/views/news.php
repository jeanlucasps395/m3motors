<body class="mm-news-principal">
    <main>
        <section>
            <div class="mm-back">
                <div class="mm-back__content">
                    <h1>Confira agora</h1>
                    <h1>As principais Noticias</h1>
                </div>
            </div>
        </section>
        <section class="container">
            <section>
                <div class="mm-news">
                    <h1>Principais notícias</h1>
                    <div class="mm-news__bock row">

                        <?php
                            foreach ($news as $item) {
                                ?>
                                <div class="col-12 col-sm-6 mm-news__bock--left">
                                    <a href="<?= base_url('home/newspaper?id='); ?><?= $item['id_noticia'] ?>">
                                        <img class="img-fluid block-zoom" src="<?= base_url() ?>/style/noticias/<?= $item['id_noticia'] ?>/noticia.png" alt="News">
                                    </a>
                                    <div class="mm-news__date">
                                        <p>
                                            <?= $item['dataCadastro'] ;?>
                                        </p>
                                    </div>
                                    <div class="mm-news__title">
                                        <p>
                                            <?= $item['titulo'] ;?>
                                        </p>
                                    </div>
                                </div>

                                <?php
                            }
                         ?>


                      <!--   <div class="col-12 col-sm-6 mm-news__bock--right">
                            <a href="<?= base_url('home/newspaper'); ?>">
                                <img class="img-fluid block-zoom" src="<?= base_url('style/'); ?>img/img_670x371.png" alt="News">
                            </a>
                            <div class="mm-news__date">
                                <p>
                                    01/08/2020
                                </p>
                            </div>
                            <div class="mm-news__title">
                                <p>
                                    Petrobrás:nova gasolina 93 RON já está sendo produzida no Brasil
                                </p>
                            </div>
                        </div> -->



                    </div>
                </div>
            </section>
        </section>
    </main>
</body>