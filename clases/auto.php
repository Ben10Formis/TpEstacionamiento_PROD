<?php
class auto
{
	public $id;
	public $patente;
 	public $ingreso;
  
/*
function resta($inicio, $fin)
  {
  $dif=date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio) );
  return $dif;
  }
*/
  	public static function BorrarAuto($idAux)
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from autos 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$idAux, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }


	public function ModificarPatente()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update autos 
				set marca='$this->patente'
				WHERE id='$this->id'");
			return $consulta->execute();
	 }
	
  
	public function InsertarElAuto()
	 {
		try{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$stringConsulta = "INSERT into autos (patente,ingreso)values('".$this->patente."','".$this->ingreso."')";
			$consulta =$objetoAccesoDato->RetornarConsulta($stringConsulta);
			$consulta->execute();
		}catch(PDOException $e){
			if($e->errorInfo[1] == 1062){
				return "DUPLICADO";
			}
		}
			
		return $this->RetornarUltimoAutoCreado();
	 }

	public static function RetornarUltimoAutoCreado(){
			
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente as patente , ingreso as ingreso from autos order by id desc");
		$consulta->execute();
		$autoBuscado= $consulta->fetchObject('auto');
		return $autoBuscado;	
	}

  	public static function TraerTodosLosAutos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente as patente, ingreso as ingreso from autos");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "auto");		
	}

	public static function TraerUnAuto($id) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente as patente, ingreso as ingreso from autos where id = $id");
		$consulta->execute();
		$autoBuscado= $consulta->fetchObject('auto');
		return $autoBuscado;		
	}
}