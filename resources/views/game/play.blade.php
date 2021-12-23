<head>
    <title>{{ $ServerName }}</title>
    <style>
        body {
            margin: 0px auto;
            padding: 0px;
            background-image: url( @php echo asset('images/background.jpg'); @endphp );
            background-repeat: repeat;
            background-position: center center;
            cursor: url(http://s2-ddt.337.com/images/cursors/default.cur), default;
        }

    </style>
</head>

<body>
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">
                <table border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class-id="7road-ddt-game"
                                codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
                                name="Main" id="Main">
                                <param name="allowScriptAccess" value="always" />
                                <param name="movie"
                                    value="{{ $AuthInfo->Game->Flash }}Loading.swf?user={{ $Username }}&key={{ $AuthInfo->PublicKey }}&v={{ $AuthInfo->Version }}&rand={{ $AuthInfo->CreateKeyTime }}&config={{ Route('api.config.zone', [
                                        'GameHash' => ($AuthInfo->GameHash)
                                    ]) }}" />
                                <param name="quality" value="medium" />
                                <param name="menu" value="true">
                                <param name="bgcolor" value="#000000" />
                                <param name="FlashVars" value="editby=" />
                                <param name="wmode" value="direct" />
                                <param name="allowScriptAccess" value="always" />
                                <embed flashvars="editby="
                                    src="{{ $AuthInfo->Game->Flash }}Loading.swf?user={{ $Username }}&key={{ $AuthInfo->PublicKey }}&v={{ $AuthInfo->Version }}&rand={{ $AuthInfo->CreateKeyTime }}&config={{ Route('api.config.zone', [
                                        'GameHash' => $AuthInfo->GameHash
                                    ]) }}"
                                    width="1000" height="600" align="middle" quality="medium" name="Main"
                                    allowscriptaccess="always" type="application/x-shockwave-flash"
                                    pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="direct" />
                            </object>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
