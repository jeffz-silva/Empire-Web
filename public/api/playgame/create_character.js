function onCreateCharacter(){
    var NickName = $("#cNickName").val();
    var Gener = $("#cGener").val();
    var ZoneID = $("#cZone").val();

    if(NickName == null || NickName == "")
        return alert("Você não deu um apelido para seu personagem!");
        
    if(Gener == null || Gener == "-1")
        return alert("Você não selecionou o gênero do seu personagem!");

    if(NickName.length < 3 || NickName.length > 12)
        return alert("O nome do seu personagem deve ter entre 3 a 12 caracteres!");

    if(ZoneID == null || ZoneID == "")
        return alert("Servidor não encontrado!");

    $.ajax({
        url: '../api/game/createcharacter',
        type: 'POST',
        data: {
            'NickName': NickName,
            'Gener': Gener,
            'ZoneID': ZoneID
        },
        success: function(data){
            var dataInfo = JSON.parse(data);
            if(dataInfo != null){
                alert(dataInfo.message);
                if(dataInfo.message == "personagem criado com sucesso!"){
                    window.location.reload(true);
                }
            }           
        }
    });
}