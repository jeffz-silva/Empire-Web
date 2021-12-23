<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />

    <title>DDtank Empire</title>
    <link rel="shortcut icon" href="{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/money.png">
    <meta name="description"
        content="DDtank Empire." />

    <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
    <link href="{{ asset('recharge/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('recharge/css/responsive.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('recharge/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script type="text/javascript" src="{{ asset('recharge/js/function.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>


<body>
    <div style='display:none' id='sbbhscc'></div>
    <script type="text/javascript">
        var sbbvscc = '';
        var sbbgscc = '';

        function genPid() {
            return String.fromCharCode(103) + String.fromCharCode(90);
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
            if ((oldVal.indexOf(prid) == -1) && (oldVal.split('/').length < 5)) {
                if (oldVal != '') {
                    oldVal += '/';
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
                document.cookie = "UTGv2=" + fv + ';expires=Wed, 15-Jun-22 15:15:30 GMT;path=/; SameSite=Lax;';
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
                else this.sbbsv("D-h4e62c1f6d60a1417fad5d18339095a0cf83");
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
                    addmg('utMedia', "vii=" + m2vr("35405fa287208983a331229005d40d7d", sbbgs));
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
                    prid + '&sbbgs=' + sbbgs + '&ddl=' + (Math.round(dfx.getTime() / 1000) - 1639754130) + '';
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


        <div class="container">


            <div class="left">
                <a href="{{ Route('web.app.home') }}">
                    <i class="icon-back"></i> Voltar
                </a>
                <a href="{{ Route('web.app.home') }}/ }}" data-toggle="tooltip" data-title="Support" target="_blank">
                    <i class="icon-support"></i>
                </a>
            </div>

            <div class="logo">
                <img src="{{ asset('recharge/images/Logo.png') }}" alt="#" style="height: 120px;">
            </div>

            <div class="right">
                <a href="{{ Route('web.app.center.config') }}" data-toggle="tooltip" data-title="Central">
                    <i class="icon-user"></i>
                    {{ $AccountInfo->username }} </a>
            </div>

        </div>

    </header>


    <script type="text/javascript">
        var selectedPayment = 'paypal'


        function onRecharge(){
            var server = $("#server").val();
            var personagem = $("#personagem").val();
            var metodo = $("#metodo").val();
            var valor = $("#valor").val();

            if(server == "" || server == null || personagem == "" || personagem == null || metodo == "" || metodo == null || valor == "" || valor == null)
                return alert("você não preencheu todos os campos!");

            $.ajax({
                url: "{{ Route('api.recharge.createinvoice') }}",
                type: 'POST',
                data: {
                    'server': server,
                    'character': personagem,
                    'method': metodo,
                    'value': valor
                },
                success: function(data){
                    var dataInfo = JSON.parse(data);
                    if(dataInfo != null){
                        if(dataInfo['isFinish'] != null){
                            window.open(dataInfo.paymentUrl, '_blank');
                        }else{
                            alert(dataInfo['message']);
                        }
                    }
                }
            });
        }

        function getNicks() {
            let id = $("#server option:selected").attr('value');

            var request = $.ajax({
                url: "{{ Route('api.recharge.playercharacter') }}",
                type: 'GET',
                data: `id=${id}`,
                dataType: 'json'
            });

            request.done(function(resposta) {
                console.log(resposta);
                removeAll();
                resposta.forEach(function(item) {
                    addOption(item.UserID, item.NickName)
                });

            });

        }

        function removeAll() {
            document.getElementById("personagem").options.length = 0;
        }

        function addOption(userid, nick) {
            var option = new Option(nick, userid);
            var select = document.getElementById("personagem");
            select.add(option);
        }

        function atualiza(t) {
            let tag = $(t).attr('data-tag');
            if(tag != null){
                document.getElementById("metodo").value = tag;
            }
        }
    </script>
    <main>

        <div class="container">

            <div class="box pay">

                <div id="loading"><i></i></div>

                <form action="{{ Route('web.app.home') }}/ }}ddtank/en/proccess.php" method="post"
                    class="content">
                    <div class="block"></div>
                    <div class="alert alert-error">
                        Atenção! Selecione seu personagem antes de prosseguir.
                    </div>

                    <div class="account">
                        <div>Nome de usuário: <strong>{{ $AccountInfo->username }}</strong></div>
                        <div>Endereço de e-mail: <strong>{{ $AccountInfo->email }}</strong></div>
                        <img src="{{ asset('recharge/img/ddtank.png') }}">
                    </div>

                    <input type="hidden" name="usuario" value="{{ $AccountInfo->username }}">
                    <input type="hidden" name="email" value="{{ $AccountInfo->email }}">

                    <div class="title">
                        Selecione o servidor e personagem:
                    </div>
                    <div class="selects">
                        <select onchange="getNicks(this);" name="server" id="server">
                            <option selected disabled>Escolha seu servidor...</option>
                            @foreach($ServerList as $ServerInfo)
                            <option value="{{ $ServerInfo->id }}">{{ $ServerInfo->name }}</option>
                            @endforeach
                        </select>
                        <select name="personagem" id="personagem" disabled>
                            <option selected disabled>Escolha seu personagem...</option>
                        </select>
                    </div>

                    <div class="title">
                        Selecione o metodo de pagamento:
                    </div>

                    <div class="tags">








                        <a data-tag="freemerchant" onclick="atualiza(this);" href="#freemerchant">
                            <img src="{{ asset('recharge/img/mercadopago.png') }}" width="140" height="70">
                        </a>








                        <a data-tag="picpay" onclick="atualiza(this);" href="#picpay" rel="modal:open">
                            <img src="{{ asset('recharge/img/picpay.png') }}" width="140" height="70">
                        </a>
                        <input type="hidden" name="metodo" id="metodo" value="picpay">

                        <div id="ex1" class="modal">


                            <div class="mt-1-2">
                                <div class="mt-1-2">
                                    <input type="hidden" name="metodo-stripe" id="metodo-stripe" value="card" />
                                    <!--<a data-metodo="giropay" class="stripe-metodos" href="#">
          
                                        <div class="stripe-metodos-img"  style="background-image: url('{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/pgto/giropay.png')">
                                    
                                        </div>
                                        
                                </a>
                                <a data-metodo="eps" class="stripe-metodos" href="#">


                                        <div class="stripe-metodos-img"  style="background-image: url('{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/pgto/eps.png">
                                    
                                        </div>

        </a>

                                <a data-metodo="ideal" class="stripe-metodos" href="#">

                                        <div class="stripe-metodos-img"  style="background-image: url('{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/pgto/ideal.png">
                                    
                                        </div>
        </a>
                                <a data-metodo="przelewy24" class="stripe-metodos" href="#">
                                        <div class="stripe-metodos-img"  style="background-image: url('{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/pgto/prez.png">
                                    
                                         </div>
                                        
                                    </a>
                                <a data-metodo="fpx" class="stripe-metodos" href="#">

                                        <div class="stripe-metodos-img"  style="background-image: url('{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/pgto/fpx.png">
                                    
                                         </div>


        </a>
                                <a data-metodo="bacs_direct_debt" class="stripe-metodos" href="#">


                                        <div class="stripe-metodos-img"  style="background-image: url('{{ Route('web.app.home') }}/ }}ddtank/en/assets/img/pgto/bacs.png">
                                    
                                         </div>

        </a>-->
                                </div>

                            </div>



                        </div>


                        <!-- Link to open the modal -->

                    </div>

                    <div class="title">
                        SELECIONE O VALOR DA RECARGA
                    </div>

                    <div class="tags valoresa">
                        <input type="hidden" id="valor" name="valor" value="5">
                        <div id="cupons-price">
                            @foreach($RechargeInfos as $RechargeInfo)
                            <a href="#{{ $RechargeInfo->Price }}" class="" id="{{ $RechargeInfo->id }}" data-nome="{{ $RechargeInfo->Money }} cupons">
                                <div class="value">R${{ $RechargeInfo->Price }}.00</div>
                                <div class="qnt">{{ $RechargeInfo->Money }} <span>cupons</span></div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="button">
                        <button type="button" id="payButton" onclick="onRecharge();">Continuar</button>
                        <div id="paymentResponse"></div>
                    </div>

                </form>

                <aside>

                    <a href="#" target="_BLANK"><img src="{{ asset('recharge/images/3.png') }}" /></a>

                </aside>

            </div>

        </div>
    </main>





    <footer>
        <div class="container">
            <div class="text">Copyright © DDtank Empire - All Rights Reserved</div>
        </div>
    </footer>

</body>

</html>
