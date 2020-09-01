<body class="mm-noticie">
    <main>
        <div class="container">
            <section>
                <div class="mm-news">
                    <h1><?= $new['titulo'] ;?></h1>
                    <div class="mm-news__bock">
                        <div class="col-12">
                            <img class="img-fluid block-zoom" src="<?= base_url() ?>/style/noticias/<?= $new['id_noticia'] ?>/noticia.png" alt="News">
                            <div class="mm-news__date">
                                <p>
                                    <?= $new['dataCadastro'] ;?>
                                </p>
                            </div>
                            <div class="mm-news__title">
                                <p>
                                   Notícia
                                </p>
                            </div>
                            <div class="mm-news__text">
                                <p>
                                   <?= $new['conteudo'] ;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>