<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="DDtank Empire">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{ asset('mobirise/images/logo.png') }}" type="image/x-icon">
    <meta name="description" content="">


    <title>DDtank Empire - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('mobirise/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/dropdown/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/socicon/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/theme/css/style.css') }}">
    <link rel="preload"
        href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="{{ asset('mobirise/mobirise/css/mbr-additional.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/mobirise/css/mbr-additional.css') }}" type="text/css">


</head>

<body>

    <section data-bs-version="5.1" class="menu menu1 cid-sRGPsW2mcC" once="menu" id="menu1-t">


        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7" href="#">DDtank
                            Empire</a></span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse"
                    data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item"><a class="nav-link link text-black display-4"
                                href="{{ Route('web.app.home') }}">Página Inicial</a>
                        </li>
                        <li class="nav-item"><a class="nav-link link text-black display-4"
                                href="{{ Route('web.app.recharge') }}">Recarregar</a>
                        </li>
                         <li class="nav-item"><a class="nav-link link text-black display-4"
                                href="{{ Route('web.app.center.config') }}">Configurações</a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>
    </section>

    <section data-bs-version="5.1" class="form7 cid-sRGPjcIO3j" id="form7-s">
        @yield('content')
    </section>

    <section data-bs-version="5.1" class="share3 cid-sRGQaeksH6" id="share3-v">
        <div class="container">
            <div class="media-container-row">
                <div class="col-12">
                    <h3 class="mbr-section-title align-center mb-3 mbr-fonts-style display-2"><strong>Siga nosso
                            servidor!</strong>
                    </h3>
                    <div class="social-list align-center">

                        <a class="iconfont-wrapper bg-facebook m-2 " target="_blank"
                            href="https://www.facebook.com/empireddtank/">
                            <span class="socicon-facebook socicon"></span>
                        </a>
                        <a class="iconfont-wrapper bg-twitter m-2"
                            href="https://chat.whatsapp.com/C6ZxExBopyFILZmqb9FtIA" target="_blank">
                            <span class="socicon-whatsapp socicon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="footer7 cid-sRGQfH1mXr" once="footers" id="footer7-w">
        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                        © Copyright 2022 DDtank Empire - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('api/playgame/create_character.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

</html>
