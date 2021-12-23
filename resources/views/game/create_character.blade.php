@extends('struct.dashboard_struct')

@section('title', 'Criação de Personagem')

@section('content')
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Criação de
                    Personagem</strong></h3>

        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="#" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name"><input
                        type="hidden" name="email" data-form-email="true"
                        value="HfLXHQ+vG3Nk7GuxzvzRiFGHHr4bU/B1qLNlFBXWXPh5NPWY2WTaLxA0QNi5K0Kbb6ZriYGiRPHDTNbTI7RyJ+PNJNZPQ6844WH3fs6CdA1kh0iX4+59acYhABk4rca/">
                    <p class="mbr-text mbr-fonts-style align-center mb-4 display-7">Não utilize frases especiais <br> Criando
                        personagem no servidor:<br>
                        {{ $ServerName }}</p>
                    <div class="dragArea row">
                        <input type="hidden" id="cZone" value="{{ $ZoneID }}">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="name">
                            <input type="text" name="name" placeholder="Apelido do personagem" data-form-field="name"
                                class="form-control" value="" id="cNickName">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="name">
                            <select class="form-control" id="cGener">
                                <option value="-1" selected disabled>Selecione o gênero do personagem</option>
                                <option value="1">Masculino</option>
                                <option value="0">Feminino</option>
                            </select>
                        </div>

                        <div class="col-auto mbr-section-btn align-center"><button type="button"
                                onclick="onCreateCharacter();" class="btn btn-success display-4">Criar Personagem</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
