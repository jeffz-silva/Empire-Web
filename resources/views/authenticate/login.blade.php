@section('content-session')
    <div id="login">
        <form id="sign-in-form">
            <input class="animElement slide-left time-300" name="UsernameOrEmail" placeholder="Nome de usuário ou email"
                autocomplete="off">
            <input class="animElement slide-left time-300" name="Password" type="password" placeholder="Senha"
                autocomplete="new-password">
            <button class="login animElement slide-right" type="submit">Entrar</button>
        </form>
        <p id="sign-in-error" class="label-message" style="color: red;"></p>
        <p id="sign-in-success" class="label-message" style="color: green;"></p>
        <p id="sign-in-process" class="label-message" style="color: grey;">
            Processando, por favor aguarde...
        </p>
        <div class="footer">
            <a class="left animElement just-show" href="#" target="_blank">
                Esqueci a minha senha
            </a>
            <a class="right animElement just-show" href="#" data-toggle="modal" data-target="#dialog-create-account">
                Criar Conta
            </a>
        </div>
    </div>
@endsection
