<?php 
session_start();
if(isset($_SESSION['usuario']))
{
	echo "<h2> Bienvenido: ". $_SESSION['usuario']."</h2>";
	if( $_SESSION['usuario']=='admin')
	{
 ?>
			<h4 class="widgettitle">Botones ABM</h4>
			<ul>
				<li><a value="Grilla" onclick="Mostrar('MostrarGrilla')" class=" btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-th">&nbsp;</span>Grilla CD</a></li>
				<li><a  value="Alta" onclick="Mostrar('MostrarFormAlta')" class="btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Alta CD</a></li>
			     <li><a  value="Perfil" onclick="Mostrar('MostrarPerfil')" class="btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Perfil</a></li>
			
			</ul>
		</section>
<?php
	}else if($_SESSION['usuario']=='user')
		{
?>
			<h4 class="widgettitle">Botones ABM</h4>
			<ul>
				<li><a onclick="Mostrar('MostrarGrilla')" class=" btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-th">&nbsp;</span>Grilla CD</a></li>
				<li><a class="btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Alta CD</a></li>			
			    <li><a  value="Perfil" onclick="Mostrar('MostrarPerfil')" class="btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Perfil</a></li>
			
			</ul>
		</section>
<?php
		}else
		{
			echo "<section class='widget'>
			<h4 No estas registrado</h4>";
		}
}


?>