function validarFormatoPatente()
{
	guardarAuto();
}

function eliminarAuto(autoAux){
	
	if(!confirm("Desea ELIMINAR el AUTO "+autoAux.patente+"??")){
		return;
	}
	
    $.ajax({
        type: 'POST',
        url: "nexoAdministracion.php",
        dataType: "json",
        data: {
			queHacer : "eliminarAuto",
			auto : autoAux
		},
        async: true
    }).done(function (objJson) {
		//alert("funciono funcion eliminarAuto de nexoAdministracion");
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		mostrarGrillaEstacionados();

	})
	.fail(function (jqXHR, textStatus, errorThrown) {
		alert("error en eliminarAuto de funcionesABMAutos");
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });      
	
}

function guardarAuto(){

	var patenteAux = $('#patente').val();
	patenteAux = patenteAux.trim();
	patenteAux = patenteAux.toUpperCase();
	if(patenteAux != ""){
		alert("AGREGANDO AUTO CON PATENTE: " + patenteAux);
	
	    $.ajax({
	        type: 'POST',
	        url: "nexoAdministracion.php",
	        dataType: "json",
	        data: {
				queHacer : "guardarAuto",
				patente : patenteAux
			},
	        async: true
	    }).done(function (objJson) {
			
			if(objJson != "DUPLICADO" && objJson != false ){
				alert("Se agrego exitosamente el auto con patente: " + objJson.patente);
				$('#patente').val("");
			}else{
				alert("EL AUTO: '" + patenteAux + "' YA ESTA EN LA PLAYA");
			}
			
			mostrarGrillaEstacionados();

		})
		.fail(function (jqXHR, textStatus, errorThrown) {
	        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
	        console.log(jqXHR);
	        console.log(textStatus);
	        console.log(errorThrown);
	    });      
	}else{
		alert("PATENTE VACIA!");
	}
}