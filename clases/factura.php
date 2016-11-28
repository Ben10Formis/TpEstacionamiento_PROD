<?php
class factura
{
	public $id;
	public $patente;
 	public $ingreso;
 	public $egreso;
 	public $monto;

 	public $total;
 	public $fecha;
 
  	public function __construct(){

  	}

	public static function iniNuevaFactura($patente, $ingreso){
  			$ahora = getdate();
			/*$ahora["year"];
			$ahora["mon"];
			$ahora["mday"];
			$ahora["hours"];
			$ahora["minutes"];*/
			$fact = new factura();
			$fact->patente = $patente;
			$fact->ingreso = $ingreso;
			$fact->egreso = $ahora["year"]."-".$ahora["mon"]."-".$ahora["mday"]."-".$ahora["hours"]."-".$ahora["minutes"];
			$fact->monto = $fact->calcularMonto();

			return $fact;
  	}


  	public function calcularMonto(){
  		$horaIngreso = explode("-", $this->ingreso);
  		$horaEgreso = explode("-", $this->egreso);
  		$montoAguardar = 0;

  		$horaIngreso[0] = intval($horaIngreso[0]);
  		$horaIngreso[1] = intval($horaIngreso[1]);
  		$horaIngreso[2] = intval($horaIngreso[2]);
  		$horaIngreso[3] = intval($horaIngreso[3]);
  		$horaIngreso[4] = intval($horaIngreso[4]);


  		$horaEgreso[0] = intval($horaEgreso[0]);
  		$horaEgreso[1] = intval($horaEgreso[1]);
  		$horaEgreso[2] = intval($horaEgreso[2]);
  		$horaEgreso[3] = intval($horaEgreso[3]);
  		$horaEgreso[4] = intval($horaEgreso[4]);

  		/*if($horaIngreso[0] != $horaEgreso[0]){
  			// CALCULO DIF EN DIAS DEL ANIO
  		   $montoAguardar = ($horaEgreso[0] - $horaIngreso[0]) * 365;
  		}


  		$difMeses = $horaIngreso[1] != $horaEgreso[1];
  		if($difMeses > 1 && ){
  			// CALCULO DIF EN DIAS DEL MES - SE ASUMEN TODOS DE 30 DIAS
  		   $montoAguardar += ($horaEgreso[1] - $horaIngreso[1]) * 30;
  		}else{
  			
  		}

  		if($horaIngreso[2] != $horaEgreso[2]){
  			// CALCULO DIF EN DIAS
  		   $montoAguardar += $horaEgreso[2] - $horaIngreso[2];
  		}*/
/*
		if(($horaIngreso[0] == $horaEgreso[0]) &&
			($horaIngreso[1] == $horaEgreso[1]) && 
			($horaIngreso[2] == $horaEgreso[2]) ){

			if($horaIngreso[3] != $horaEgreso[3]){
				$montoAguardar += $horaEgreso[3] - $horaIngreso[3];	
  			}else{
  				$montoAguardar += 24 - $horaIngreso[3];
  			}
		}*/

		$strStart = $horaIngreso[0]."-".$horaIngreso[1]."-".$horaIngreso[2]." ".$horaIngreso[3].":".$horaIngreso[4];

		$strEnd = $horaEgreso[0]."-".$horaEgreso[1]."-".$horaEgreso[2]." ".$horaEgreso[3].":".$horaEgreso[4];

		$dteStart = new DateTime($strStart); 
   		$dteEnd   = new DateTime($strEnd); 
   		
		$dteDiff  = $dteStart->diff($dteEnd);

		$anios = $dteDiff->format("%Y"); 
		$meses = $dteDiff->format("%M"); 
		$dias = $dteDiff->format("%D"); 
		$hs = $dteDiff->format("%H");
		$mins = $dteDiff->format("%I");

		$montoAguardar += intval($anios) * 365 * 100;
		$montoAguardar += intval($meses) * 30 * 100;
		$montoAguardar += intval($dias)  * 100;
		$montoAguardar += intval($hs)  * 10;
		$montoAguardar += intval($mins) * 5;

		$montoAguardar = abs($montoAguardar);


		if ($montoAguardar == 0) 
		{
			$montoAguardar = 5;
		}

  		return $montoAguardar ;
  		
  	}

  	public static function BorrarFactura($idAux)
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from facturas 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$idAux, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }	
  
	public function InsertarFactura()
	 {
		try{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$stringConsulta = "INSERT into facturas (patente,ingreso,egreso,monto)values('".$this->patente."','".$this->ingreso."','".$this->egreso."','".$this->monto."')";
			$consulta =$objetoAccesoDato->RetornarConsulta($stringConsulta);
			$consulta->execute();
		}catch(PDOException $e){
			if($e->errorInfo[1] == 1062){
				return "DUPLICADO";
			}
		}
			
		return $this->RetornarUltimaFacturaCreada();
	 }

	public static function RetornarUltimaFacturaCreada(){
			
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente as patente , ingreso as ingreso , egreso as egreso , monto as monto from facturas order by id desc");
		$consulta->execute();
		$facturaBuscada= $consulta->fetchObject('factura');
		return $facturaBuscada;	
	}

  	public static function TraerTodasLasFacturas()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente as patente , ingreso as ingreso , egreso as egreso , monto as monto from facturas");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "factura");		
	}

	public static function TraerUnaFactura($id) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente as patente , ingreso as ingreso , egreso as egreso , monto as monto from facturas where id = $id");
		$consulta->execute();
		$facturaBuscada= $consulta->fetchObject('factura');
		return $facturaBuscada;		
	}
	  	public static function VentaTotalPorDia()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select sum(monto) as total, substring_index(egreso,'-',3) as fecha from facturas GROUP BY substring_index(egreso,'-',3) order by egreso");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "factura");		
	}	

}
