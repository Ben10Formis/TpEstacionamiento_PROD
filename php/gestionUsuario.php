<?php 
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/usuario.php");

	$retorno;
	$objetoPDO;

	$cookieMail="mailUsr";
	$cookieTipo="mailtipo";
	//$cookieMailAux="mailUsrAux";
	$cookieTipoAux="mailtipoAux";
	$mail=$_POST['mail'];
	$clave=$_POST['clave'];
	$accion=$_POST['accion'];
	$recordar = $_POST['recordar'];

	try{

		$objetoPDO = AccesoDatos::dameUnObjetoAcceso();
	}
	catch (PDOException $e){
		print"Error".$e->getMessage();

	}

	if($accion == "validar"){

		$consulta = $objetoPDO->RetornarConsulta("SELECT id,mail,clave,tipo FROM usuario WHERE mail=:mail");

		$consulta->bindValue(":mail", $mail, PDO::PARAM_STR);
		$consulta->execute();

		$fila = $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");

		if(count($fila) > 0){
			if ($clave == $fila[0]->clave) {

				//switch ($fila[0]->mail) {
				switch ($fila[0]->tipo) {
					
					//case 'admin@admin':
					case 'admin':
						$retorno = "BIENVENIDO ADMINISTRADOR"; 
						break;
					default:
						$retorno = "Bienvenido : ".$fila[0]->mail;
						break;
				}

				if($recordar == "true"){
					setcookie($cookieMail, $fila[0]->mail , time() + (86400 * 30), "/");
					setcookie($cookieTipo, $fila[0]->tipo , time() + (86400 * 30), "/");
				}else{
					//setcookie($cookieMailAux, $fila[0]->mail , time() + (86400 * 30), "/");
					setcookie($cookieTipoAux, $fila[0]->tipo , time() + (86400 * 30), "/");
				}

			}else{
				$retorno="no-pas";
			}
		}else{
			$retorno = "no-registrado";
		}

		echo $retorno;
	}else if($accion == "registrar"){
		
		$usuario = new usuario();
		$usuario->mail = $mail;
		$usuario->clave = $clave;
		$usuario->tipo = 'user';
		$cantidad = $usuario->VerificarMailUsuario($usuario->mail);

		if($cantidad == 0){
		
			$respuesta = $usuario->GuardarUsuario();

			if($respuesta == "DUPLICADO"){
				echo $respuesta;
				return;
			}
			if(isset($respuesta) && count($respuesta)>0){
				echo "OK";
			}
		}else{
			echo "El mail ya está registrado. Intente con otro mail.";
			return;
		}
	}

?>