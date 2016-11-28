<?php 
session_start();
	if (isset($_SESSION['usuario']))
	{require_once("clases/AccesoDatos.php");
	require_once("clases/cd.php");
		if($_SESSION['usuario']=='admin')
		{
	
	$arrayDeCds=cd::TraerTodoLosCds();

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>cantante</th><th>disco</th><th>año</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeCds as $cd) {
	echo"<tr>
			<td><a onclick='EditarCD($cd->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='BorrarCD($cd->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$cd->cantante</td>
			<td>$cd->titulo</td>
			<td>$cd->año</td>
		</tr>   ";
}

		 ?>
	</tbody>
</table>

<?php 
// sin login 
}else if($_SESSION['usuario']=='user')
{$arrayDeCds=cd::TraerTodoLosCds();

 ?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>cantante</th><th>disco</th><th>año</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeCds as $cd) {
	echo"<tr>
			<td><a class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$cd->cantante</td>
			<td>$cd->titulo</td>
			<td>$cd->año</td>
		</tr>   ";
}

		 ?>
	</tbody>
</table>

<?php 
}
}else
{
	echo "<h1>No esta logeado<h1>";
}
	 ?>