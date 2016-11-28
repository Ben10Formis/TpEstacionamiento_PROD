function validarFormatoPatente()
{
	guardarAuto();
}

function eliminarFactura(factAux){
	
	if(!confirm("Desea ELIMINAR FACT. del AUTO "+factAux.patente+"??")){
		return;
	}
	
    $.ajax({
        type: 'POST',
        url: "nexoAdministracion.php",
        dataType: "json",
        data: {
			queHacer : "eliminarFactura",
			factura : factAux
		},
        async: true
    }).done(function (objJson) {
		
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		mostrarGrillaEstacionados();

	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });      
	
}