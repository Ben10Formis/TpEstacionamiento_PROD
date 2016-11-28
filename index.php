<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title>TP ESTACIONAMIENTO</title>
	  
		<!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
        </script> esta comentado porque uso la version 1.9.1-->
		<script type="text/javascript" src="JavaScript/FuncionesAjax.js">
		</script>
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="css/estilo.css" rel="stylesheet" type="text/css">-->

		<link href="css/estilos.css" rel="stylesheet" type="text/css" >
		<link href="css/media-queries.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="JavaScript/jquery-1.9.1.min.js">
		</script>
		<script type="text/javascript" src="JavaScript/funcionesBarraTareas.js">
		</script>
		<!--Se usa para el frmLoginEst -->
		<script type="text/javascript" src="JavaScript/funcionesUsuarioLogin.js">
		</script>
		<!--Se usa para el frmAltaEstacionado -->
		<script type="text/javascript" src="JavaScript/funcionesABMAutos.js">
		</script>
		<!--Se usa para el mostrarGrillaImportes -->
		<script type="text/javascript" src="JavaScript/funcionesABMFacturas.js">
		</script>

		<style>
table#t01, th#th01, td#td01 {
    border: 5px solid #333399;
    background:#333399;
    color: white;
}
</style>

		<script type="text/javascript">
			$( document ).ready(function() {
			iniciar(); //Esta en funcionesBarraTareas.js Se ejecuta para setcookie
			});
		</script>
</head>
<body>
	<center>
		<div id="botones">
			<div class="page-header">
				<h1>ESTACIONAMIENTO</h1>    
			</div>
			<nav>
				<ul id="main-nav" class="clearfix">
					<li id="BotonLogin"><a onclick="mostrarLogin();"  class="btn btn-primary" >Login</a> </li>
					<li id="BotonLogOut" hidden><a onclick="logout();"  class="btn" style="background-color:red">Logout</a> </li>
					<!-- <li><a onclick="MostrarError()" class="btn">Ajax<br> Error!!!</a></li> -->
					<li><a onclick="mostrarAltaEstacionado()" class="btn">Ingresar Vehiculo</a> </li>
					<li><a onclick="mostrarGrillaEstacionados()" class="btn">Grilla Vehiculos</a> </li>
					<li><a onclick="mostrarGrillaImportes()" class="btn">Grilla Importes</a> </li>
					<li><a onclick="mostrarGrillaUsuarios()" class="btn">Grilla Usuarios</a> </li>
					<li><a onclick="mostrarInforme()" class="btn">Informe</a> </li>
				</ul>
			</nav>
		</div>
	</center>
	<br>
	<!--Tabla de bienvenida-->
	<table id="t01">	
		<tr>
			<th id="th01">Bienvenido usuario</th>
			<th id="th01"><a id="mailUsrLogeado"></a></th>
		</tr>
	</table>
	<!--fin tabla de bienvenida-->
	<br>
	<!--Tabla de precios-->
	<table id="t01">	
		<tr>
		<th id="th01">Estad&iacute;a</th>
		<th id="th01">Precio</th>
		</tr>
		<tr>
		<td id="td01">D&iacute;a</td>
		<td id="td01">$100.-</td>
		</tr>
		<tr>
		<td id="td01">Hora</td>
		<td id="td01">$10.-</td>
		</tr>
		<tr>
		<td id="td01">M&iacute;n</td>
		<td id="td01">$5.-</td>
		</tr>
	</table>
    <!--Fin tabla de precios-->
	<!--Bienvenido usuario: <a id="mailUsrLogeado"></a>-->
	<br>
	<table WIDTH="100%" CELLSPACING="3" CELLPADDING="2"> 
		<tr>
			<td WIDTH="30%">
				<div id="divIzquierda">
				</div>
			</td>
			<td WIDTH="70%">
				<div id="divDerecha" style="overflow:auto;height:500px;">
				</div>
			</td>
		</tr>
	</table>
	<div id="informe">
	</div>
	<div id="botonesABM">
	</div>

	<!--<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-12">
								<h1>Ingrese sus datos</h1>   
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">-->
								<!--<form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">-->
							<!--	<form id="login-form" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Correo Electronico" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Clave">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Recordarme</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="button" onclick="MostarLogin()" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Ingresar">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6">								
													<input type="button" onclick="MostarLogin()" name="login-test" id="login-test" tabindex="4" class="form-control btn btn-test" value="Test Usuario"> 
											</div>
											<div class="col-xs-6">
													<input type="submit" name="login-test" id="login-test" tabindex="4" class="form-control btn btn-test" value="Test Adm">
												
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
</body>
</html>