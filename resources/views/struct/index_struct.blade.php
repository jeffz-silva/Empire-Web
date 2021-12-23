@php
    session_start();

    $ServerController = new App\Http\Controllers\ServerController();

    $IsOnline = (isset($_SESSION['IsOnline']) ? true : false);
    if($IsOnline){
        $AccountInfo = \App\Http\Controllers\AccountsController::getAccount($_SESSION['UserOrMail']);
        if(empty($AccountInfo)){
            session_destroy();
            Redirect()->route('web.app.home');
        }
    }
        
    
@endphp

@if(!$IsOnline)
    @include('authenticate.login')
@else
    @include('authenticate.serverlist')
@endif

<!DOCTYPE html>
<html lang="pt-br">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>DDTank Empire - O Verdadeiro DDtank antigo esta de volta!</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="description"
        content="The oldest version of DDTank that has tagged all gamers in the world is back in the most nostalgic and unique English version, Ancient Weapon Strengthening, Malaysian Chest, Magic Jug, SPA, Firing Range and more!">
    <meta name="image" content="../i.imgur.com/4zYWAvI.png">
    <meta name="author" content="7TEEN Games Games">
    <meta name="copyright" content="DDTank New Era" />
    <meta name="robots" content="index, follow, noodp, noydir" />
    <meta name="slurp" content="noydir" />
    <meta name="theme-color" content="#e31d43">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="index.html">
    <meta property="og:title" content="DDTank New Era">
    <meta property="og:site_name" content="DDTank New Era">
    <meta property="og:description"
        content="The oldest version of DDTank that has tagged all gamers in the world is back in the most nostalgic and unique English version, Ancient Weapon Strengthening, Malaysian Chest, Magic Jug, SPA, Firing Range and more!">
    <meta property="og:image" content="../i.imgur.com/4zYWAvI.png">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1000">
    <meta property="og:image:height" content="600">


    <base>

    <link rel="shortcut icon" href="assets/img/icon.ico">

    <!-- Arquivos de estilo. -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,900">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>



<body>
    <div style='display:none' id='sbbhscc'></div>
    <script type="text/javascript">
        var sbbvscc = '';
        var sbbgscc = '';

        function genPid() {
            return String.fromCharCode(84) + String.fromCharCode(111);
        };
    </script>
    <div id='sbbfrcc' style='position: absolute; top: -10px; left: 30px; font-size:1px'></div>
    <script type="text/javascript">
        (function(XHR) {
            var open = XHR.prototype.open;
            var send = XHR.prototype.send;
            var parser = document.createElement('a');
            XHR.prototype.open = function(method, url, async, user, pass) {
                if (typeof async =='undefined') {
                    async = true;
                }
                parser.href = url;
                if (parser.host == '') {
                    parser.href = parser.href;
                }
                this.ajax_hostname = parser.hostname;
                open.call(this, method, url, async, user, pass);
            };
            XHR.prototype.send = function(data) {
                if (location.hostname == this.ajax_hostname) this.setRequestHeader("X-MOD-SBB-CTYPE", "xhr");
                send.call(this, data);
            }
        })(XMLHttpRequest);
        if (typeof(fetch) != "undefined") {
            var nsbbfetch = fetch;
            fetch = function(url, init) {
                if (typeof(url) === "object" && typeof(url.url) === "string") {
                    init = {
                        method: url.method,
                        mode: url.mode,
                        cache: url.cache,
                        credentials: url.credentials,
                        headers: url.headers,
                        body: url.body
                    };
                    url = url.url;
                }

                function sbbSd(url, domain) {
                    var parser = document.createElement('a');
                    parser.href = url;
                    if (parser.host == '') {
                        parser.href = parser.href;
                    }
                    return parser.hostname == location.hostname;
                }
                if (sbbSd(url, document.domain)) {
                    init = typeof init !== 'undefined' ? init : {};
                    if (typeof(init.headers) === "undefined") {
                        init.headers = {};
                    }
                    init.headers['X-MOD-SBB-CTYPE'] = 'fetch';
                }
                return nsbbfetch(url, init);
            };
        }

        function sbbgc(check_name) {
            var start = document.cookie.indexOf(check_name + "=");
            var oVal = '';
            var len = start + check_name.length + 1;
            if ((!start) && (document.cookie.substring(0, check_name.length) != check_name)) {
                oVal = '';
            } else if (start == -1) {
                oVal = '';
            } else {
                var end = document.cookie.indexOf(';', len);
                if (end == -1) end = document.cookie.length;
                var oVal = document.cookie.substring(len, end);
            };
            return oVal;
        }

        function addmg(inm, ext) {
            var primgobj = document.createElement('IMG');
            primgobj.src = window.location.protocol + "//" + window.location.hostname + (window.location.port && window
                .location.port != 80 ? ':' + window.location.port : '') + "/sbbi/?sbbpg=" + inm + (ext ? "&" + ext : "");
            var sbbDiv = document.getElementById('sbbfrcc');
            sbbDiv.appendChild(primgobj);
        };

        function addprid(prid) {
            var oldVal = sbbgc("PRLST");
            if ((oldVal.indexOf(prid) == -1) && (oldVal.split('index.html').length < 5)) {
                if (oldVal != '') {
                    oldVal += 'index.html';
                }
                document.cookie = 'PRLST=' + oldVal + escape(prid) + ';path=/; SameSite=Lax;';
            }
        }
        var sbbeccf = function() {
            this.sp3 = "jass";
            this.sf1 = function(vd) {
                return sf2(vd) + 32;
            };
            var sf2 = function(avd) {
                return avd * 12;
            };
            this.sf4 = function(yavd) {
                return yavd + 2;
            };
            var strrp = function(str, key, value) {
                if (str.indexOf('&' + key + '=') > -1 || str.indexOf(key + '=') == 0) {
                    var idx = str.indexOf('&' + key + '=');
                    if (idx == -1) idx = str.indexOf(key + '=');
                    var end = str.indexOf('&', idx + 1);
                    var newstr;
                    if (end != -1) newstr = str.substr(0, idx) + str.substr(end + (idx ? 0 : 1)) + '&' + key + '=' +
                        value;
                    else newstr = str.substr(0, idx) + '&' + key + '=' + value;
                    return newstr;
                } else return str + '&' + key + '=' + value;
            };
            var strgt = function(name, text) {
                if (typeof text != 'string') return "";
                var nameEQ = name + "=";
                var ca = text.split(/[;&]/);
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return "";
            };
            this.sfecgs = {
                sbbgh: function() {
                    var domain = document.location.host;
                    if (domain.indexOf('www.') == 0) domain = domain.replace('www.', '');
                    return domain;
                },
                f: function(name, value) {
                    var fv = "";
                    if (window.globalStorage) {
                        var host = this.sbbgh();
                        try {
                            if (typeof(value) != "undefined") globalStorage[host][name] = value;
                            else {
                                fv = globalStorage[host][name];
                                if (typeof(fv.toString) != "undefined") fv = fv.toString();
                            }
                        } catch (e) {}
                    }
                    return fv;
                },
                name: "sbbrf"
            };
            this.sfecls = {
                f: function(name, value) {
                    var fv = "";
                    try {
                        if (window.localStorage) {
                            if (typeof(value) != "undefined") localStorage.setItem(name, value);
                            else {
                                fv = localStorage.getItem(name);
                                if (typeof(fv.toString) != "undefined") fv = fv.toString();
                            }
                        }
                    } catch (e) {}
                    return fv;
                },
                name: "sbbrf"
            };
            this.sbbcv = function(invl) {
                try {
                    var invalArr = invl.split("-");
                    if (invalArr.length > 1) {
                        if (invalArr[0] == "A" || invalArr[0] == "D") {
                            invl = invalArr[1];
                        } else invl = "";
                    }
                    if (invl == null || typeof(invl) == "undefined" || invl == "falseImgUT" || invl ==
                        "undefined" || invl == "null" || invl != encodeURI(invl)) invl = "";
                    if (typeof(invl).toLowerCase() == "string")
                        if (invl.length > 20)
                            if (invl.substr(0, 2) != "h4") invl = "";
                } catch (ex) {
                    invl = "";
                }
                return invl;
            };
            this.sbbsv = function(fv) {
                for (var elm in this) {
                    if (this[elm].name == "sbbrf") {
                        this[elm].f("altutgv2", fv);
                    }
                }
                document.cookie = "UTGv2=" + fv + ';expires=Tue, 07-Jun-22 00:20:41 GMT;path=/; SameSite=Lax;';
            };
            this.sbbgv = function() {
                var valArr = Array();
                var currVal = "";
                for (var elm in this) {
                    if (this[elm].name == "sbbrf") {
                        currVal = this[elm].f("altutgv2");
                        currVal = this.sbbcv(currVal);
                        if (currVal != "") valArr[currVal] = (typeof(valArr[currVal]) != "undefined" ? valArr[
                            currVal] + 1 : 1);
                    }
                }
                var lb = 0;
                var fv = "";
                for (var val in valArr) {
                    if (valArr[val] > lb) {
                        fv = val;
                        lb = valArr[val]
                    }
                }
                if (fv == "") fv = sbbgc("UTGv2");
                fv = this.sbbcv(fv);
                if (fv != "") this.sbbsv(fv);
                else this.sbbsv("D-h4caeab330356d2c7a402828e006f4a01823");
                return fv;
            };
        };

        function m2vr(m1, m2) {
            var i = 0;
            var rc = "";
            var est = "ghijklmnopqrstuvwyz";
            var rnum;
            var rpl;
            var charm1 = m1.charAt(i);
            var charm2 = m2.charAt(i);
            while (charm1 != "" || charm2 != "") {
                rnum = Math.floor(Math.random() * est.length);
                rpl = est.substring(rnum, rnum + 1);
                rc += (charm1 == "" ? rpl : charm1) + (charm2 == "" ? rpl : charm2);
                i++;
                charm1 = m1.charAt(i);
                charm2 = m2.charAt(i);
            }
            return rc;
        }

        function sbbls(prid) {
            try {
                var eut = sbbgc("UTGv2");
                window.sbbeccfi = new sbbeccf();
                window.sbbgs = sbbeccfi.sbbgv();
                if (eut != sbbgs && sbbgs != "" && typeof(sbbfcr) == "undefined") {
                    addmg('utMedia', "vii=" + m2vr("ffdf5f71d0188520d2f293ae856b6985", sbbgs));
                }
                var sbbiframeObj = document.createElement('IFRAME');
                var dfx = new Date();
                sbbiframeObj.id = 'SBBCrossIframe';
                sbbiframeObj.title = 'SBBCrossIframe';
                sbbiframeObj.tabindex = '-1';
                sbbiframeObj.lang = 'en';
                sbbiframeObj.style.visibility = 'hidden';
                sbbiframeObj.setAttribute('aria-hidden', 'true');
                sbbiframeObj.style.border = '0px';
                if (document.all) {
                    sbbiframeObj.style.position = 'absolute';
                    sbbiframeObj.style.top = '-1px';
                    sbbiframeObj.style.height = '1px';
                    sbbiframeObj.style.width = '28px';
                } else {
                    sbbiframeObj.style.height = '1px';
                    sbbiframeObj.style.width = '0px';
                }
                sbbiframeObj.scrolling = "NO";
                sbbiframeObj.src = window.location.protocol + "//" + window.location.hostname + (window.location.port &&
                        window.location.port != 80 ? ':' + window.location.port : '') + '/sbbi/?sbbpg=sbbShell&gprid=' +
                    prid + '&sbbgs=' + sbbgs + '&ddl=' + (Math.round(dfx.getTime() / 1000) - 1639009241) + '';
                var sbbDiv = document.getElementById('sbbfrcc');
                sbbDiv.appendChild(sbbiframeObj);
            } catch (ex) {
                ;
            }
        }
        try {
            var y = unescape(sbbvscc.replace(/^<\!\-\-\s*|\s*\-\->$/g, ''));
            document.getElementById('sbbhscc').innerHTML = y;
            var x = unescape(sbbgscc.replace(/^<\!\-\-\s*|\s*\-\->$/g, ''));
        } catch (e) {
            x = 'function genPid(){return "jser";}';
        }
        try {
            if (window.gprid == undefined) document.write('<' + 'script type="text/javascri' + 'pt">' + x +
                "var gprid=genPid();addprid(gprid);sbbls(gprid);<" + "/script>");
        } catch (e) {
            addprid("dwer");
        }
    </script>

    <header>
        <nav id="menu">
            <ul class="container">
                <li>
                    <a href="{{ Route('web.app.home') }}">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ Route('web.app.articlelist', ['article' => 'all']) }}" target="_blank">
                        Noticias
                    </a>
                </li>
                <li>
                    <a href="{{ Route('web.app.articlelist', ['article' => 'Anuncio']) }}" target="_blank">
                        Anuncios
                    </a>
                </li>
                <li>
                    <a href="{{ Route('web.app.articlelist', ['article' => 'Evento']) }}" target="_blank">
                        Eventos
                    </a>
                </li>
                <li>
                    <a href="{{ Route('web.app.recharge') }}" target="_blank">
                        Recarga
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        Suporte
                    </a>
                </li>
            </ul>
        </nav>

        <div class="container">
            <!-- <div class="logo animElement zoom-out tim-300">
    <a href="#">
     <img src="assets/img/logo.png" style="margin-top: -93px;">
    </a>
   </div> -->
        </div>

    </header>

    <main>
        <div class="container">


            <aside>
                <style>
                    .clearfix::after {
                        content: "";
                        display: block;
                        clear: both;
                    }

                </style>

                @yield('content-session')

                <script defer>
                    const signInForm = document.getElementById("sign-in-form");
                    const signInError = document.getElementById("sign-in-error");
                    const signInSuccess = document.getElementById("sign-in-success");
                    const signInProcess = document.getElementById("sign-in-process");

                    signInForm.addEventListener("submit", function(e) {

                        signInError.style.display = "none";
                        signInSuccess.style.display = "none";
                        signInProcess.style.display = "block";

                        fetch("/api/authentication/login", {
                                method: "POST",
                                body: new FormData(signInForm),
                                credentials: "include"
                            }).then(function(response) {
                                return response.json();
                            }).then(function(response) {

                                signInProcess.style.display = "none";

                                if (response.errors) {

                                    for (let fieldName in response.errors) {
                                        if (signInForm && fieldName) {
                                            const field = signInForm.querySelector(`[name="${fieldName}"]`);

                                            if (!field) {
                                                throw new Error(`Could not find a form field named '${fieldName}'.`);
                                            }
                                        }

                                        signInError.innerText = response.errors[fieldName][0];
                                        signInError.style.display = "block";

                                        break;
                                    }
                                } else if (response.detail) {

                                    signInSuccess.innerText = response.detail;
                                    signInSuccess.style.display = "block";
                                }

                                if (!response.errors) {
                                    if(response.alert != "" && response.alert != null){
                                        document.getElementById("sign-in-error").style.display = "block";
                                        document.getElementById("sign-in-error").innerText = response.alert;
                                    }else{
                                        document.getElementById("sign-in-error").style.display = "none";
                                        document.getElementById("sign-in-success").innerText = response.message;
                                        document.getElementById("sign-in-success").style.display = "block";

                                        window.location.reload(true);
                                    }
                                }
                            })
                            .catch(function() {

                                signInError.innerText = "There was an error request!";
                                signInError.style.display = "block";
                            });

                        e.preventDefault();
                    });
                </script>


                <div class="modal" id="dialog-create-account">

                    <div class="content">
                        <div class="title">Criando Conta</div>
                        <div class="box">

                            <form id="create-account-form" class="account">
                                <label>
                                    <span>Username</span>
                                    <input name="Username" placeholder="Ex.: username2019" autocomplete="off">
                                </label>
                                <label>
                                    <span>Email</span>
                                    <input type="email" name="Email" placeholder="Ex.: user@domain.com"
                                        autocomplete="off">
                                </label>
                                <label>
                                    <span>Password</span>
                                    <input type="password" name="Password" placeholder="• • • • • • • • • •"
                                        autocomplete="new-password">
                                </label>
                                <button class="button" type="submit">
                                    <span class="icon"></span>
                                    Cadastrar Conta
                                </button>
                            </form>
                            <p id="create-account-error" class="label-message" style="color: red;"></p>
                            <p id="create-account-success" class="label-message" style="color: green;"></p>
                            <p id="create-account-process" class="label-message" style="color: grey;">
                                Aguarde...
                            </p>

                        </div>
                    </div>

                    <div class="close">
                        <span></span>
                    </div>

                </div>
                <script>
                    function gtag_report_conversion() {
                        fbq('init', '263849571706471');
                        fbq('track', 'Lead');
                        var callback = function() {
                            if (typeof(url) != 'undefined') {
                                window.location = url;
                            }
                        };
                        gtag('event', 'conversion', {
                            'send_to': 'AW-851147814/99gPCOmjk9YBEKb47ZUD',
                            'event_callback': callback
                        });
                        return false;
                    }
                </script>


                <script defer>
                    const createAccountForm = document.getElementById("create-account-form");
                    const createAccountError = document.getElementById("create-account-error");
                    const createAccountSuccess = document.getElementById("create-account-success");
                    const createAccountProcess = document.getElementById("create-account-process");

                    createAccountForm.addEventListener("submit", function(e) {

                        createAccountError.style.display = "none";
                        createAccountSuccess.style.display = "none";
                        createAccountProcess.style.display = "block";

                        fetch("/api/authentication/register", {
                                method: "POST",
                                body: new FormData(createAccountForm),
                                credentials: "include"
                            }).then(function(response) {
                                return response.json();
                            }).then(function(response) {

                                createAccountProcess.style.display = "none";

                                if(response.alert != "" && response.alert != null){
                                    createAccountError.innerText = response.alert;
                                    createAccountError.style.display = "block";
                                }else{
                                    createAccountError.style.display = "none";
                                    createAccountSuccess.innerHTML = response.message;
                                    createAccountSuccess.style.display = "block";
                                }
                            })
                            .catch(function() {

                                createAccountProcess.style.display = "none";
                                createAccountError.innerText = "Não conseguimos processar sua solicitação!";
                                createAccountError.style.display = "block";
                            });

                        e.preventDefault();
                    });
                </script>

                <div class="widget">
                    <h3>Lista de servidores</h3>
                    <div class="inner">

                        <!-- Entrada para pesquisa de servidores. -->
                        {{-- <form id="frm-search-servers" class="search animElement slide-top">
                            <input placeholder="Search...">
                            <button type="submit">
                                <span class="icon-search"></span>
                            </button>
                        </form> --}}

                        <ul id="message-loading-servers" class="listtag animElement slide-left time-1200"
                            style="display: none;">
                            <li>
                                <span class="tag grey">WAIT</span>
                                Searching...
                            </li>
                        </ul>

                        <ul id="servers-list-container" class="listtag animElement slide-left time-1200">
                            @foreach($ServerController->getServers() as $Server)
                            <li>
                                <a href="{{ Route('web.app.playgame', ['ZoneID' => $Server->id]) }}">
                                    <span class='tag black'>N</span>
                                    {{ $Server->name }} </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <script defer>
                    /** Formulário de pesquisa de servidores. */
                    const frmSearchServers = document.getElementById("frm-search-servers");
                    /** Mensagem de carregamento da busca de servidores. */
                    const messageLoadingServers = document.getElementById("message-loading-servers");
                    /** Contêiner da lista de servidores. */
                    const serversListContainer = document.getElementById("servers-list-container");

                    frmSearchServers.addEventListener("submit", function(e) {
                        messageLoadingServers.style.display = "block";
                        serversListContainer.style.display = "none";

                        fetch('/api/servers_list.php?like_name='.frmSearchServers.querySelector("input").value)
                            .then(function(x) {
                                return x.text()
                            })
                            .then(function(response) {
                                messageLoadingServers.style.display = "none";
                                serversListContainer.style.display = "block";

                                // adiciona o conteúdo de resposta da solicitação HTTP ao contêiner da lista de servidores.
                                serversListContainer.innerHTML = response;
                            })
                            .catch(function(x) {
                                return console.error(x)
                            });

                        e.preventDefault();
                    });
                </script>

                <div class="widget">
                    <h3>Hall da Fama</h3>
                    <div class="inner">

                        <form id="frm-load-ranking" class="filter animElement slide-top">
                            <select name="server-id">
                                @foreach($ServerController->getServers() as $Server)
                                <option value="{{ $Server->id }}">{{ $Server->name }}</option>
                                @endforeach
                            </select>
                            <select name="type">
                                <option value="player" selected>Jogadores</option>
                                <option value="society">Sociedades</option>
                            </select>
                        </form>

                        <ul class="listtag small animElement slide-left time-600">

                            <li class="head">
                                <span class="tag transp">
                                    <i class="icon-trophy"></i>
                                </span>
                                <span>Personagem</span>
                                <span class="right">Poder</span>
                            </li>

                            <li id="load-ranking-message">
                                <span class="tag grey">W</span>
                                Carregando...
                            </li>

                            <span id="load-ranking-container" style="display: none;"></span>

                        </ul>

                    </div>
                </div>

                <script defer>
                    /** Formulário de carregamento da classificação. */
                    const frmLoadRanking = document.getElementById("frm-load-ranking");

                    frmLoadRanking.querySelectorAll("[name='type'], [name='server-id']")
                        .forEach(function(element) {
                            element.addEventListener("change", loadRanking)
                        });

                    window.addEventListener("load", loadRanking);

                    function loadRanking(event) {

                        const rankingFormData = new FormData(frmLoadRanking);

                        /** Contêiner do carregamento da classificação. */
                        const loadRankingContainer = document.getElementById("load-ranking-container");
                        /** Mensagem de carregamento da classificação. */
                        const loadRankingMessage = document.getElementById("load-ranking-message");

                        loadRankingContainer.style.display = "none";
                        loadRankingMessage.style.display = "block";

                        fetch(`/api/game/ranking?type=${rankingFormData.get("type")}&server-id=${rankingFormData.get("server-id")}`)
                            .then(function(x) {
                                return x.text()
                            })
                            .then(function(response) {
                                loadRankingContainer.innerHTML = response;

                                loadRankingMessage.style.display = "none";
                                loadRankingContainer.style.display = "block";
                            })
                            .catch(function(x) {
                                return console.error(x)
                            });

                        event.preventDefault();
                    }
                </script>

                <div class="widget">
                    <h3>Pagina do Facebook</h3>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fempireddtank%2F&amp;tabs=timeline&amp;width=298&amp;height=500&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1577984425814241"
                        width="298" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </aside>

          
            @yield('content')

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


        </div>
    </main>


    <!-- Arquivos de script. -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>

</body>


</html>
