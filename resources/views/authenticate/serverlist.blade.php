@section('content-session')
    <div id="login">
        <div class="clearfix" style="padding: 10px 0;">
            <div style="float: left; max-width: 70%; line-height: 1; overflow: hidden;">
                <p style="font-size: 35px; color: #555;">
                    <small style="font-size: .5em;">Bem-vindo, guerreiro!</small>
                    <span>{{ substr($AccountInfo[0]->username, 0, 7) }}</span>
                </p>
                <a id="sign-out" href="{{ Route('api.authentication.logout') }}" style="font-weight: bold;">
                    Sair
                </a>
            </div>

            <button class="login animElement slide-right in-view" onclick="location.href = '{{ Route('web.app.playgame', ['ZoneID' => ($AccountInfo[0]->zoneid == 0 ? \App\Http\Controllers\ServerController::getNewServer()->id : $AccountInfo[0]->zoneid)]) }}';"
                style="float: right;">
                Jogar
            </button>

        </div>
        <div class="buttonsSocial">
            <a class="social facebook animElement slide-left in-view" href="{{ Route('web.app.recharge') }}"
                target="_blank"
                style="display: inline-flex; background-color: rgb(245,98,0); border-color: rgb(250,83,0); justify-content: center; align-items: center;">
                <img src="assets/img/icon-recharge.png" alt="">&nbsp;&nbsp;
                Recarregar
            </a>
            <a class="social google animElement slide-right in-view" href="{{ Route('web.app.center.config') }}"
                style="display: inline-flex; text-align: center; background-color: #349517; border-color: #048507; align-items: center;">
                <img src="assets/img/icon-central.png" alt="" style="margin-left: 11px;">&nbsp;&nbsp;
                Configurações
            </a>
        </div>
    </div>
@endsection
