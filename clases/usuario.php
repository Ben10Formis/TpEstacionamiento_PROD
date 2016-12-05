<?php
class usuario
{
	public $id;
 	public $mail;
 	public $clave;
 	public $tipo;
    public $cantidad; 

	public function GuardarUsuario()
	{
		try{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$stringConsulta = "INSERT into usuario (mail,clave,tipo)values('".$this->mail."','".$this->clave."','".$this->tipo."')";
			$consulta =$objetoAccesoDato->RetornarConsulta($stringConsulta);
			$consulta->execute();
		}catch(PDOException $e){
			if($e->errorInfo[1] == 1062){
				return "DUPLICADO";
			}
		}
			
		return $this->RetornarUltimoUsuarioCreado();
	}

	public static function VerificarMailUsuario($mail) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, mail as mail , clave as clave, tipo as tipo from usuario where mail = :mail");
			$consulta->bindValue(':mail',$mail, PDO::PARAM_STR);	
			$consulta->execute();
			//$usuarioBuscado= $consulta->RetornarConsulta('cantidad');
			//$usuarioBuscado= $consulta->fetchObject('usuario');
			$fila = $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
			return $fila;			
	}	

	public static  function BorrarUsuario()
	{
 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			delete 
			from usuario			
			WHERE id=:id");	
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	}

	public static function ModificarUsuario()
	{

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set mail='$this->mail',
				clave='$this->clave',
				WHERE id='$this->id'");
			return $consulta->execute();

	}

  	public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, mail as mail , clave as clave, tipo as tipo from usuario");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUnUsuario($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, mail as mail , clave as clave, tipo as tipo from usuario where id = $id");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;			
	}	

	public static function RetornarUltimoUsuarioCreado(){
			
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, mail as mail , clave as clave from usuario order by id desc");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;	
	}
}