//0 para ingresar
//1 para registrarse
function ejecutarAccion(seQuiereRegistrar){
	
	if($('#frmIngreso')[0].checkValidity() == true){
		var accionAux;
		if(seQuiereRegistrar){
			accionAux="registrar";
		}
		else{
			accionAux="validar";
		}

		var passwordAux;
		var mailAux;
		var recordarAux;

		passwordAux = $("#clave").val();
		mailAux = $("#mail").val();
		mailAux = mailAux.toLowerCase();
		recordarAux = $('#remember').is(':checked');

		var funcionAjax =$.ajax ({
			type: "post",
			url: "php/gestionUsuario.php",
			data:{
				clave: passwordAux,
				mail : mailAux,
				recordar: recordarAux ,
				accion: accionAux
			}
		});
		if(seQuiereRegistrar){
			funcionAjax.done(function (estaLogeado) {
				if(estaLogeado == "OK"){
					alert("USUARIO REGISTRADO CORRECTAMENTE!");
				}else if(estaLogeado == "DUPLICADO"){
					alert("EL USUARIO '" + mailAux + "' YA SE ENCUENTRA REGISTRADO");
				}else{
					//alert("EL USUARIO NO SE PUDO CREAR CORRECTAMENTE!");
					alert("El mail ya está registrado. Intente con otro mail.");
				}
			});
		}else{
			funcionAjax.done(function (estaLogeado) {

				switch (estaLogeado) {
					case "no-registrado":
						alert("EL USUARIO NO SE ENCUENTRA REGISTRADO!");
						break;
					case "no-pas":
						alert("PASSWORD INCORRECTO!");
						break;
					default:
						alert(estaLogeado);
						$('#mailUsrLogeado').html(mailAux);
						$('#BotonLogin').attr('hidden','');
						$('#BotonLogOut').removeAttr('hidden');
						mostrarAltaEstacionado();
						mostrarGrillaEstacionados();
					break;
				}
			});
		}
	}
	else{
		$('#frmIngreso').checkValidity();
	}
	// EVITAMOS QUE SE SUBMITEE EL FORMULARIO
	return false; 
}

function llenarAdmin(){
	
	$('#mail').val("admin@admin");
	$('#clave').val("admin");
}

function llenarUsuario(){
	
	$('#mail').val("user@user");
	$('#clave').val("user");
}