@extends('struct.index_struct')

@php
$NoticeController = new \App\Http\Controllers\NoticeController();
@endphp

@section('content')
    <section>

        <div id="slideHome" class="owl-carousel animElement slide-left">
            <div class="item" data-hash="slide10">
                <a href="https://www.facebook.com/7teengames">
                    <img src="newimg/slider/aventura.png" alt="Prepare-se para novas aventuras!">
                </a>
            </div>
            <div class="item" data-hash="slide11">
                <a href="#">
                    <img src="newimg/slider/ferreiro.png" alt="Ferreiro classico">
                </a>
            </div>
            <div class="item" data-hash="slide12">
                <a href="#">
                    <img src="newimg/slider/laboratorio.png" alt="Retorno do laboratorio">
                </a>
            </div>
            <div class="item" data-hash="slide13">
                <a href="#">
                    <img src="newimg/slider/potencial].png" alt="Fortaleça sua energia">
                </a>
            </div>
        </div>

        <div id="slideHomeAnchor" class="animElement slide-right">
            <div class="item active">
                <a href="#slide10">
                    Prepare-se para novas aventuras! </a>
            </div>
            <div class="item active">
                <a href="#slide11">
                    Ferreiro classico </a>
            </div>
            <div class="item active">
                <a href="#slide12">
                    Retorno do laboratorio </a>
            </div>
            <div class="item active">
                <a href="#slide13">
                    Fortaleça sua energia </a>
            </div>
        </div>

        <script defer>
            window.onload = function() {
                const slideHome = $("#slideHome").owlCarousel({
                    items: 1,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    nav: false,
                    dots: false,
                    center: true,
                    loop: false,
                    URLhashListener: false
                });

                slideHome.on("changed.owl.carousel", function(property) {
                    const current = property.item.index;
                    const src = $(property.target).find(".owl-item").eq(current).find(".item").data("hash");

                    $("a[href*='#slide']").parent().removeClass("active");
                    $(`a[href="#${src}"`).parent().addClass("active");
                });
            };
        </script>

        <div class="box mid">

            <div class="render01"></div>

            <div class="tabsAnchor">
                <a href="#All" class="active">
                    Todos </a>
                <a href="#Announces">
                    Anúncios </a>
                <a href="#News">
                    Novidades </a>
                <a href="#Events">
                    Eventos </a>
            </div>

            <div class="tabsContent animElement slide-top">

                <div id="tabAll" class="active">

                    <ul class="listtag">
                        @forelse($NoticeController->getNewNotices() as $NoticeInfo)
                            <li>
                                <a href="{{ Route('web.app.article', ['id' => $NoticeInfo->id]) }}">
                                    <span class="tag orange  big">
                                        {{ $NoticeInfo->type }} </span>
                                    {{ $NoticeInfo->title . ' ' . $NoticeInfo->created_at }} </a>
                            </li>
                        @empty
                            <a href="/artitlce" class="seeall">
                                Não temos nenhuma noticia!
                            </a>
                        @endforelse
                    </ul>

                </div>
                <div id="tabAnnounces">

                    <ul class="listtag">
                        @foreach($NoticeController->getNoticesByType('Anuncio') as $NoticeInfo)
                            <li>
                                 <a href="{{ Route('web.app.article', ['id' => $NoticeInfo->id]) }}">
                                    <span class="tag orange  big">
                                        {{ $NoticeInfo->type }} </span>
                                    {{ $NoticeInfo->title . ' ' . $NoticeInfo->created_at }} </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="articles_list/ad.html" class="seeall">
                        Visualizar todos anuncios...
                    </a>

                </div>
                <div id="tabNews">

                     <ul class="listtag">
                        @foreach($NoticeController->getNoticesByType('Novidade') as $NoticeInfo)
                            <li>
                                 <a href="{{ Route('web.app.article', ['id' => $NoticeInfo->id]) }}">
                                    <span class="tag orange  big">
                                        {{ $NoticeInfo->type }} </span>
                                    {{ $NoticeInfo->title . ' ' . $NoticeInfo->created_at }} </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="articles_list/news.html" class="seeall">
                        Visualizar todas noticias...
                    </a>

                </div>
                <div id="tabEvents">

                     <ul class="listtag">
                        @foreach($NoticeController->getNoticesByType('Evento') as $NoticeInfo)
                            <li>
                                <a href="{{ Route('web.app.article', ['id' => $NoticeInfo->id]) }}">
                                    <span class="tag orange  big">
                                        {{ $NoticeInfo->type }} </span>
                                    {{ $NoticeInfo->title . ' ' . $NoticeInfo->created_at }} </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="articles_list/event.html" class="seeall">
                        Visualizar todos eventos...
                    </a>

                </div>

            </div>

        </div>

        <div class="cards animElement slide-bottom time-300">
            <a href="article/2056/divine-monthly-recharge.html" target="_BLANK" class="right">
                <img src="newimg/s31.png">
            </a>
            <br><br>
            <a href="http://ddt-launcher.7tgames.com/en/system/Installer/DDTankEN.zip" target="_BLANK"
                class="right">
                <img src="newimg/shop1.png">
            </a>
        </div>

        <section class="box guia">

            <div class="title">
                <h1>Guia de como jogar</h1>
            </div>

            <ul class="biglist animElement slide-left">
                <li>
                    <a href="#">
                        <i class="icon-controls"></i>
                        <strong>Controles</strong>
                        <p>Use as setas do teclado para mover o personagem e ajustar o ângulo, a barra de espaço
                            é usada
                            para definir a força de cada tiro.</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-fight-lab"></i>
                        <strong>Laboratório</strong>
                        <p>O Laboratório serve como para que novos jogadores aprendam as distancias e ângulos
                            mais comuns utilizados em combate</p>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="icon-consortia"></i>
                        <strong>Sociedade</strong>
                        <p>Faça amigos e obtenha vantagens dentro e fora do campo de batalha, juntando-se a uma
                            sociedade!</p>
                    </a>
                </li>
            </ul>

        </section>

        <section class="box itens">

            <div class="title">
                <h1>Lista de itens Items</h1>
            </div>

            <div class="tabsAnchor small">
                <a href="#Armas" class="active">Armas</a>
                <a href="#Roupas">Roupas</a>
                <a href="#Chapeus">Chapeus</a>
                <a href="#Ternos">Ternos</a>
                <a href="#Asas">Asas</a>
                <a href="#Acessorios">Acessorios</a>
            </div>

            <div class="tabsContent">
                <div id="tabArmas" class="active">
                    <ul class="listsquare">
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/machado-de-pedra.png">
                            <span>Hatchet</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/ak-48.png">
                            <span>AK—48</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/carro-voador.png">
                            <span>Hyper Car</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/deus-da-forca.png">
                            <span>Titan</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/super-workaholic.png">
                            <span>☆☆· White Collar</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/super-pistola-dagua.png">
                            <span>Mighty Water Gun</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/verdadeiro-chick-louco.png">
                            <span>True Crazy Chick</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/verdadeira-cabeca-de-boi.png">
                            <span>☆ Undead Axe</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/verdadeira-lanca-de-antiguidade.png">
                            <span>☆ Spear</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/verdadeiro-bumerangue-do-amor.png">
                            <span>☆ Boomerang</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="assets/img/itens/arm/super-ovo-de-pascoa.png">
                            <span>☆☆·Easter Egg</span>
                        </li>
                        <li class="animElement zoom-out">
                            <img src="../res1-ddt.7tgames.com/image/arm/Ssnowman2/00.png">
                            <span>☆☆·Love of Snow</span>
                        </li>
                    </ul>
                </div>

                <div id="tabRoupas">
                    <ul class="listsquare">
                        <li>
                            <img src="assets/img/itens/cloth/domador-do-dragao-de-bronze.png">
                            <span>Bronze Dragonia</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/domador-do-dragao-de-prata.png">
                            <span>Silver Dragonia</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/domador-do-dragao-de-ouro.png">
                            <span>Gold Dragonia</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/bravo-mago.png">
                            <span>Magic Warrior</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/mano.png">
                            <span>Bro</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/cavaleiro-dragao.png">
                            <span>Dragon Knight</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/guardiao-verde.png">
                            <span>Protector</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/capa-de-matias.png">
                            <span>Matias</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/admiravel-espadachim.png">
                            <span>Brave Warrior</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/guerreiro-demonio.png">
                            <span>Evil Warrior</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/raiva-de-solaan.png">
                            <span>Northern</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/cloth/armadura-de-matias.png">
                            <span>Matias</span>
                        </li>
                    </ul>
                </div>

                <div id="tabChapeus">
                    <ul class="listsquare">
                        <li>
                            <img src="assets/img/itens/head/chapeu-da-copa.png">
                            <span>Brazil Fans</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/chapeu-da-copa-1.png">
                            <span>Brazil Fans 1</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/chapeu-de-papagaio.png">
                            <span>Parrot Hat</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/chapeu-de-tucano.png">
                            <span>Woodpecker</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/ventos-do-sudeste-da-asia.png">
                            <span>Style of Southeast Asia</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/pequena-bola-amarela.png">
                            <span>Small Yellow Ball</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/cabelo-de-jarro.png">
                            <span>Jarhead</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/pequeno-gorro.png">
                            <span>Demon Hat</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/capacete-duende.png">
                            <span>Lion</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/chapeu-largo.png">
                            <span>Sombrero</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/chifre-de-minotauro.png">
                            <span>Minotaur Horn</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/head/ouvidos-de-lobo.png">
                            <span>Wolf Ear</span>
                        </li>
                    </ul>
                </div>

                <div id="tabTernos">
                    <ul class="listsquare">
                        <li>
                            <img src="assets/img/itens/suits/hulk.png">
                            <span>Hulk</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/o-motoqueiro-fantasma.png">
                            <span>Flame Dance</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/gemeos-de-ouro.png">
                            <span>Golden Gemini</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/aries-negro.png">
                            <span>Dark Aries</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/aries-dourado.png">
                            <span>Gold Aries</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/elwin.png">
                            <span>Elwin</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/pintinho-da-morte.png">
                            <span>Black Spirit</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/bebe-cabeca-de-boi.png">
                            <span>Ox-head Baby</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/bugou-das-profundezas-do-mar.png">
                            <span>Gulu Deep Sea</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/jardim-dos-bugous.png">
                            <span>Gulu Orchard</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/bugou-azul-agua.png">
                            <span>Gulu Water Blue</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/suits/parque-de-bugous.png">
                            <span>Gulu Amusement Park</span>
                        </li>
                    </ul>
                </div>

                <div id="tabAsas">
                    <ul class="listsquare">
                        <li>
                            <img src="assets/img/itens/wing/deus-da-guerra.png">
                            <span>Mars</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/wing/grinalda-olimpica.png">
                            <span>Olimpic Wing</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/wing/fantasma-magico.png">
                            <span>Illusion</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/wing/arrepio-dia-das-bruxas.png">
                            <span>Horror Night</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/wing/videira-colorida.png">
                            <span>Colored Vine</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/wing/boneco-de-neve.png">
                            <span>Snow Baby</span>
                        </li>
                    </ul>
                </div>

                <div id="tabAcessorios">
                    <ul class="listsquare">
                        <li>
                            <img src="assets/img/itens/unfrightprop/pedra-de-fortalecimento-nivel-5.png">
                            <span>Energy Stone Lv5</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/unfrightprop/pedra-de-fortalecimento-nivel-4.png">
                            <span>Energy Stone Lv4</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/unfrightprop/pedra-de-fortalecimento-nivel-3.png">
                            <span>Energy Stone Lv3</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/unfrightprop/pedra-de-fortalecimento-nivel-2.png">
                            <span>Energy Stone Lv2</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/unfrightprop/pedra-de-fortalecimento-nivel-1.png">
                            <span>Energy Stone Lv1</span>
                        </li>
                        <li>
                            <img src="assets/img/itens/unfrightprop/simbolo-dos-deuses.png">
                            <span>Divine Amulet</span>
                        </li>
                    </ul>
                </div>

            </div>

        </section>
    </section>

@endsection
