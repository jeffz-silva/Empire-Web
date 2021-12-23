function onSaveConfigChanges(){
    var email = $("#newEmail").val();
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();
    var oldPassword = $("#oldPassword").val();

    $.ajax({
        url: '../api/config/savechanges',
        type: 'POST',
        data: {
            Email: email,
            NewPassword: newPassword,
            ConfirmPassword: confirmPassword,
            OldPassword: oldPassword
        },
        success: function(data){
            var dataInfo = JSON.parse(data);
            if(dataInfo != null){
                if(dataInfo.finish){
                    window.location.reload(true);
                }
                alert(dataInfo.message);
            }
        }
    });
}