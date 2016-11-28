function iniciar()
{
	var funcionAjax=$.ajax({
		url:"nexoAdministracion.php",
		type:"post",
		data:{queHacer:"iniciar"}
	});
	funcionAjax.done(function(retorno)
	{
		//alert(retorno);
		//console.log(retorno);
		//if(retorno == "NO-LOGEADO"){
		if(retorno == false)
		{
			$('#mailUsrLogeado').html("-");
			mostrarLogin();
			//alert("funcion iniciar. no esta logeado");
		}else{
			$('#mailUsrLogeado').html(retorno);
			$('#BotonLogin').attr('hidden','');
			$('#BotonLogOut').removeAttr('hidden');
			//alert("funcion iniciar. esta logeado");
			//alert("mostrarAltaEstacionado()");
			//mostrarAltaEstacionado();
			//mostrarGrillaEstacionados();
		}

	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( error iniciar");
		$("#informe").html(retorno.responseText);	
		//alert("Salio por error de la funcion iniciar");
	});
	funcionAjax.always(function(retorno){
		
	});
}

function mostrarLogin(){

	var funcionAjax=$.ajax({
	url:"nexoAdministracion.php",
	type:"post",
	data:{queHacer:"mostrarLogin"}
	});
	funcionAjax.done(function(retorno){
		//alert("funcion mostrarLogin cargo html de frmlogin.php");
		$("#divIzquierda").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( error mostrarLogin");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		
	});
	
}

function logout(){
	var funcionAjax=$.ajax({
		url:"nexoAdministracion.php",
		type:"post",
		data:{queHacer:"deslogear"}
	});
	funcionAjax.done(function(retorno){
		$('#BotonLogOut').attr('hidden','');
		$('#BotonLogin').removeAttr('hidden');
		$('#mailUsrLogeado').html('-');
		$("#divDerecha").html("");
		iniciar();
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( error logout");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		
	});
}

function mostrarGrillaEstacionados(){

	var funcionAjax=$.ajax({
		url:"nexoAdministracion.php",
		type:"post",
		data:{queHacer:"mostrarGrillaEstacionados"}
	});
	funcionAjax.done(function(retorno){
		//if(retorno != "NO-LOGEADO"){
		if(retorno != false){
			$("#divDerecha").html(retorno);
		}else{
			alert("PARA UTILIZAR ESTA FUNCION DEBE ESTAR LOGEADO!");
		}
		
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( mostrarGrillaEstacionados");
		$("#informe").html(retorno.responseText);	
	});
	
}

function mostrarAltaEstacionado(){

	var funcionAjax=$.ajax({
		url:"nexoAdministracion.php",
		type:"post",
		data:{queHacer:"mostrarAltaEstacionado"}
	});
	funcionAjax.done(function(retorno){
		//if(retorno != "NO-LOGEADO"){
		if(retorno != false){
			$("#divIzquierda").html(retorno);
			//alert("Estoy en funcion mostrarAltaEstacionado y esta logeado");
		}else{
			alert("PARA UTILIZAR ESTA FUNCION DEBE ESTAR LOGEADO!");
		}
		
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( mostrarAltaEstacionado");
		$("#informe").html(retorno.responseText);	
	});
}

function mostrarGrillaUsuarios(){

	var funcionAjax=$.ajax({
		url:"nexoAdministracion.php",
		type:"post",
		data:{queHacer:"mostrarGrillaUsuarios"}
	});
	funcionAjax.done(function(retorno){
		//if(retorno != "NO-ADMIN"){
		if(retorno != false){
			$("#divDerecha").html(retorno);		
		}else{
			alert("USTED NO ES UN ADMINISTRADOR!!");
		}
		
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( mostrarGrillaUsuarios");
		$("#informe").html(retorno.responseText);	
	});
}

function mostrarGrillaImportes(){

	var funcionAjax=$.ajax({
	url:"nexoAdministracion.php",
	type:"post",
	data:{queHacer:"mostrarGrillaImportes"}
	});
	funcionAjax.done(function(retorno){
		//if(retorno != "NO-ADMIN"){
		if(retorno != false){
			$("#divDerecha").html(retorno);		
		}else{
			alert("USTED NO ES UN ADMINISTRADOR!!");
		}
		
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( mostrarGrillaImportes");
		$("#informe").html(retorno.responseText);	
	});
	
}
function mostrarInforme(){

	var funcionAjax=$.ajax({
	url:"nexoAdministracion.php",
	type:"post",
	data:{queHacer:"mostrarInforme"}
	});
	funcionAjax.done(function(retorno){
		//if(retorno != "NO-ADMIN"){
		if(retorno != false){
			$("#divDerecha").html(retorno);		
		}else{
			alert("USTED NO ES UN ADMINISTRADOR!!");
		}
		
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":( mostrarInforme");
		$("#informe").html(retorno.responseText);	
	});
	
}
