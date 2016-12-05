
      <form method="post" id="frmAltaEstacionado">
       <h1 >Ingrese Patente</h1>
        <div class="inset">
       		<p>
            	<input type="text" id="patente" name="patente" minlength="6" placeholder="Patente" required>
        	</p>
			<table style="border-collapse: separate; border-spacing: 10px;">
				<tr>
				<td>
					<input class="btn btn-lg btn-primary btn-block" type="button" value="Ingresar Patente" onclick="return validarFormatoPatente()">
				</td>
				</tr>
			</table>
        </div>
      </form>
    