 <section>
     <div class="mm-background">
         <div class="container">
             <div class="row">
                 <div class="mm-background__block">
                     <div class="mm-background__form">
                         <form action="<?= base_url() ?>home/emailrodape" method="post">
                             <label for="" class="name">
                                 Nome
                             </label>
                             <input type="text" id="" placeholder="Quem devemos procurar?" name="nomelCliente">
                             <label for="" class="email">
                                 Email
                             </label>
                             <input type="email"  id="" placeholder="nos diga seu melhor email" name="emailCliente">
                             <label for="" class="tel">
                                 Telefone
                             </label>
                             <input type="tel" id="" placeholder="Nos diga seu telefone" name="mensagem">
                             <label for="">Mensagem</label>
                             <textarea style="resize: none" id="" cols="30" rows="10" placeholder="Fale um pouco mais aqui..." name="telefone"></textarea>
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
 </section>

 <section>
     <div class="mm-social-media">
         <i class="fab fa-instagram"></i>
         <i class="fab fa-facebook-f"></i>
         <i class="fab fa-twitter"></i>
     </div>
 </section>
 </main>


 <!-- <div class="overlay"></div> -->


 <footer>
     <div class="container">
         <div class="mm-footer">
             <div class="col-12 col-md-5">
                 <ul>

                     <li><img class="img-fluid" src="<?= base_url('style/'); ?>img/logo.png" alt="logo"></li>

                     <div class="mm-footer__block">
                         <li class="mm-footer__block--title">Receber notícias por email</li>
                         <li class="mm-footer__block--btn">
                             <input placeholder="Digite seu email aqui" type="email" name="" id="">
                             <button>ok</button>
                         </li>
                     </div>
                 </ul>
             </div>
             <div class="col-12 col-md">
                 <ul class="mm-footer__block-two">
                     <li>
                         <a href="">
                             Artigos</li>
                     </a>
                     <li>
                         <a href="">
                             Marcas
                         </a>
                     </li>
                     <li>
                         <a href="">
                             Contato
                         </a>
                     </li>
                     <li>
                         <a href="">
                             Precisa de ajuda?
                         </a>
                     </li>
                     <li>
                         <a href="">
                             Veículos
                         </a>
                     </li>
                 </ul>
             </div>
             <div class="col-12 col-md-5">
                 <ul class="mm-footer__block--info">
                     <li>Rua para testes 123, Arujá - São Paulo 07425-000</li>
                     <li>(11) 90000 - 0000</li>
                     <li>m3motors@m3otors.com.br</li>
                     <li>Segunda a sexta das 10h00 as 19h00</li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="mm-block-end">
         © 2020 Todos os direitos reservados.
     </div>

 </footer>