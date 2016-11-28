
 <form method="post" id="frmIngreso">
      <h1 >INGRESE SUS DATOS</h1>
      <div class="inset">
        <p>
          <label for="email">MAIL</label>
          <input type="email" placeholder="Correo electrónico" name="mail" id="mail" required>
        </p>
        <p>
          <label for="password">CLAVE</label>
          <input minlength="4" type="password" name="clave" id="clave" placeholder="Ingrese Clave" required>
        </p>
        <p>
          <input type="checkbox" name="remember" id="remember"> 
          <label for="remember">Recordarme</label> 
        </p>
        <table style="border-collapse: separate; border-spacing: 10px;">
          <tr>
            <td>
              <input type="submit" name="go" value="Test Admin" onclick="llenarAdmin();return false;">
            </td>
            <td><input type="submit" name="go" value="Test Usuario" onclick="llenarUsuario();return false;"></td>
          </tr>
          <tr>
            <td>
              <input type="submit" id="botonIngresar" name="go" value="Ingresar" onclick="return ejecutarAccion(0);"> 
            </td>
            <td><input type="submit" name="go" value="Registrar" onclick="return ejecutarAccion(1);" ></td>
          </tr>
        </table>
      </div>

    </form>