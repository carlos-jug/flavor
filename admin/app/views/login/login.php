<form name="login" id="login" method="post">
    <table>
        <tr>
            <td style="border-right: 1px solid #D3D3D3;padding-right: 30px;">
                <a href="<?=Path_front?>"><img width="300px" src="<?=Path_front?>/images/logo_labestia.png"></a>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>
                <label>Usuario:</label>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-user" style="top: 0;"></span>
                    <input name="user" type="text" class="form-control">
                </div>
                <br>
                <label>Contraseña:</label>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-lock" style="top: 0;"></span>
                    <input name="pass" type="password" class="form-control">
                </div>
                <br>
                <input type="submit" class="btn_entrar" value="Entrar">
            </td>
        </tr>
    </table>
</form>