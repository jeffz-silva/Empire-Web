@extends('struct.dashboard_struct')

@section('title', 'Configurações')

@section('content')
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Configurações da conta</strong>
            </h3>

        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="#" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Configurações">
                    <div class="form-group">
                        <label><strong>Endereço de e-mail</strong></label>
                        <input type="email" name="email" placeholder="Endereço de e-mail" data-form-field="newEmail" id="newEmail"
                            class="form-control" value="{{ $AccountInfo[0]->email }}">
                    </div>
                    <div class="form-group">
                        <label><strong>Nova senha</strong></label>
                        <input type="password" name="newPassword" placeholder="Nova senha" data-form-field="newPassword" id="newPassword"
                            class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label><strong>Confirme a nova senha</strong></label>
                        <input type="password" name="confirmPassword" placeholder="Confirme a nova senha" data-form-field="confirmPassword" id="confirmPassword"
                            class="form-control" value="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Digite sua senha atual</strong></label>
                        <input type="password" name="oldPassword" placeholder="Digite sua senha atual" data-form-field="oldPassword" id="oldPassword"
                            class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-block btn-outline-success" style="width: 100%;" onclick="onSaveConfigChanges();">Salvar Modificações</button>
                    </div>
                    <div class="form-group">
                        <a href="{{ url()->previous() }}" class="btn btn-block btn-outline-danger" style="width: 100%;">Voltar</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('/api/center/config.js') }}"></script>
@endsection
