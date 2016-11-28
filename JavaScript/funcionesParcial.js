$(document).ready(function(){
	
	MostrarGrilla();
	
});
function MostrarGrilla(){
	
    var pagina = "./nexoadministracion.php";

	$.ajax({
        type: 'POST',
        url: pagina,
		data : { queHago : "mostrarGrilla"},
        dataType: "html",
        async: true
    })
	.done(function (grilla) {

		$("#divGrilla").html(grilla);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
}

function SubirFoto(){
	
    var pagina = "./nexoadministracion.php";
	var foto = $("#archivo").val();
	
	if(foto === "")
	{
		return;
	}

	var archivo = $("#archivo")[0];
	var formData = new FormData();
	formData.append("archivo",archivo.files[0]);
	formData.append("queHago", "subirFoto");

	$.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true
    })
	.done(function (objJson) {

		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		$("#divFoto").html(objJson.Html);
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
}

function BorrarFoto(){

	var pagina = "./nexoadministracion.php";
	var foto = $("#hdnArchivoTemp").val();
	
	if(foto === "")
	{
		alert("No hay foto que borrar!!!");
		return;
	}
	
	$.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : "borrarFoto",
			foto : foto
		},
        async: true
    })
	.done(function (objJson) {

		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		$("#divFoto").html("");
		$("#hdnArchivoTemp").val("");
		$("#archivo").val("");
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   	
	
	return;
}

function Agregarmascota(){
    var pagina = "./nexoadministracion.php";
	var nombre = $("#nombre").val();
	var edad = $("#edad").val();
	var fechaNacimiento= $("#fechaNacimiento").val();
	var tipo = $("#tipo").val();
	var rdoSexo= $("#rdoSexo").val();
	var archivo = $("#hdnArchivoTemp").val();
	var queHago = $("#hdnQueHago").val(); //agregar

	var mascota = {};
	mascota.nombre = nombre;
	mascota.edad = edad;
	mascota.fechaNacimiento = fechaNacimiento;
	mascota.tipo = tipo;
	mascota.rdoSexo = rdoSexo;
	mascota.archivo = archivo;

	if(!Validar(mascota)){
		//alert("Debe completar TODOS los campos!!!");
		return;
	}
	
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : queHago,
			mascota : mascota
		},
        async: true
    })
	.then(function (objJson) {
		
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		BorrarFoto();
		

		$("#nombre").val("");
	$("#edad").val("");
		$("#fechaNacimiento").val("");
		$("#tipo").val("");
		$("#rdoSexo").val("");
		
		MostrarGrilla();

		if(queHago !== "agregar"){
			$("#hdnQueHago").val("agregar");
			$("#nombre").removeAttr("readonly");
		}
		
	},function (jqXHR, textStatus, errorThrown){
        alert("Error" + jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
		
}

function Eliminarmascota(mascota){
	
	if(!confirm("Desea ELIMINAR a la persona: "+mascota.nombre+"??")){
		return;
	}
	
    var pagina = "./nexoadministracion.php";
	
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
			queHago : "eliminar",
			mascota : mascota
		},
        async: true
    })
	.done(function (objJson) {
		
		if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}
		
		alert(objJson.Mensaje);
		
		MostrarGrilla();

	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
	
}
function Modificarmascota(objJson){
$("#nombre").val(objJson.nombre);
$("#edad").val(objJson.edad);
$("#fechaNacimiento").val(objJson.fechaNacimiento);
$("#tipo").val(objJson.tipo);
$("#rdoSexo").val(objJson.rdoSexo);
	$("#hdnQueHago").val("modificar");
	
	$("#nombre").attr("readonly", "readonly");

	
}

function Validar(objJson){

	//alert("implementar validaciones...");
	//aplicar validaciones
	var numero=objJson.edad;
	var letras=	objJson.nombre;
    if (!/^([0-9])*$/.test(numero))
    {
    	alert("La edad " + numero + " no es un número");
    	return false
    }else{
    	if(!/^([a-z\xc0-\xff]+)$/.test(letras))
    	{
    		alert("Nombre solo admite letras ");
    		return false
    	}
    }      
	return true;
}