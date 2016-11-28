function MostarLogin()
{
	//alert("siempre");

	var nombre = $("#username").val();
	var password = $("#password").val();

    $.ajax({
        type: 'POST',
        url: "./nexoAdministracion.php",
        dataType: "json",
        data: {
			queHago : "mostrarLoginSession",
			nombre : nombre,
			password : password
		},
    }).then(function (objJson) {
		//alert(objJson);
		//console.info(objJson); //En herramienta para desa en la solapa console sale: Object {Exito: "oiuyt"}
		$("#principal").html(objJson);
		$("#informe").html("Correcto!!!");	
		/*if(!objJson.Exito){
			alert(objJson.Mensaje);
			return;
		}*/
		/*var usuario =JSON.parse(objJson);	
		$("#idusuario").val(usuario.id);
		$("#username").val(usuario.email);
		$("#password").val(usuario.password);
		$("#tipo").val(usuario.tipo);*/
	},function (error) {
        alert(error.responseText);
    });   

}


/*$(function() {

	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
});*/
