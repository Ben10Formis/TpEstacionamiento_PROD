<?php
class Mascota
{
	private $nombre;
	private $edad;
	private $fechaNacimiento;
	private $tipo;
	private $sexo;
    private $pathFoto;

    public function  GetNombre()
	{

		return $this->nombre;
	}
	public function  GetEdad()
	{

		return $this->edad;
	}
		public function  GetFechaNacimiento()
	{

		return $this->fechaNacimiento;
	}
		public function  GetTipo()
	{

		return $this->tipo;
	}	
	public function  GetSexo()
	{

		return $this->sexo;
	}
	public function  GetFoto()
	{

		return $this->pathFoto;
	}
    public function  SetNombre($nombre)
	{

	 $this->nombre= $nombre;
	}
	public function  SetEdad($edad)
	{

		$this->edad= $edad;
	}
		public function  SetFechaNacimiento($edad)
	{

		$this->fechaNacimiento= $fechaNacimiento;
	}
		public function  SetTipo($edad)
	{

		$this->tipo= $tipo;
	}
	public function  SetSexo($sexo)
	{

	 $this->sexo= $sexo;
	}
	public function  SetFoto($foto)
	{

		$this->pathFoto=$foto;
	}

    
public function __construct($nombre=NULL,$edad=NULL,$fechaNacimiento=NULL,$tipo=NULL,$sexo=NULL, $pathFoto=NULL)
	{
		if($nombre !== NULL && $edad !== NULL && $fechaNacimiento!== NULL && $tipo!== NULL && $sexo !== NULL){
			
			$this->nombre = $nombre;
			$this->edad=$edad;
			$this->fechaNacimiento=$fechaNacimiento;
			$this->tipo=$tipo;
			$this->sexo=$sexo;
			$this->pathFoto = $pathFoto;
		}
	}

	public function ToString()
	{

		return $this->nombre." , ".$this->edad." , ".$this->fechaNacimiento." , ".$this->tipo." , ".$this->sexo." , ".$this->pathFoto."\r\n";
    }
    
    public static function Guardar($obj)
    {
    	$res=false;

    	$archivo= fopen("archivos/empleados.txt", "a");

    	$cant=fwrite($archivo, $obj->ToString());

    	if($cant >0)
    {
    	$res= true;

    }
    fclose($archivo);
    return $res;
    }

    public static function TraerTodosLosEmpleados()
    {
    	$ListaEmpleadosLeidos= array();

    	$archivo= fopen("archivos/empleados.txt", "r");

    	while (!feof($archivo)) 
    	{
    		$arcAux= fgets($archivo);
    		$empleados =explode(" , ", $arcAux );

    		$empleados[0]= trim($empleados[0]);
    		if($empleados[0]!= "")
    		{
    			$ListaEmpleadosLeidos[]=new mascota($empleados[0],$empleados[1],$empleados[2],$empleados[3],$empleados[4],$empleados[5]);
    		} 
    	}
    	fclose($archivo);
    	return $ListaEmpleadosLeidos;
    }

    public static function Modificar($obj)
    {
    	$res= true;

    	$ListaEmpleadosLeidos= Mascota::TraerTodosLosEmpleados();
    	$ListaEmpleados=array();
    	$imagenParaBorrar=NULL;

    	for ($i=0; $i<count($ListaEmpleadosLeidos) ; $i++) 
    	{ 
    		if( $ListaEmpleadosLeidos[$i]->nombre== $obj->nombre)
    		{
    			$imagenParaBorrar= trim($ListaEmpleadosLeidos[$i]->pathFoto);
    			continue;
    		}
    		$ListaEmpleados[$i]= $ListaEmpleadosLeidos[$i];
    	}
    	array_push($ListaEmpleados,$obj);

    	unlink("archivos/".$imagenParaBorrar);
         $archivo= fopen("archivos/empleados.txt", "w");

         foreach ($ListaEmpleados as  $item) {

         	$escribir= fwrite($archivo, $item->ToString());
         	if($escribir < 1)
         	{
         		$res=false;
         		break;
         	}
         }
             fclose($archivo);
             return $res;
    }
    public static function Eliminar($nombre)
    {
    	if($nombre === NULL)
			return FALSE;
			
		$res = TRUE;
		
		$ListaDeEmpleadosLeidos = Mascota::TraerTodosLosEmpleados();
		$ListaDeEmpleados = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeEmpleadosLeidos); $i++){
			if($ListaDeEmpleadosLeidos[$i]->nombre == $nombre){//encontre el borrado, lo excluyo
				$imagenParaBorrar = trim($ListaDeEmpleadosLeidos[$i]->pathFoto);
				continue;
			}
			$ListaDeEmpleados[$i] = $ListaDeEmpleadosLeidos[$i];
		}

		//BORRO LA IMAGEN ANTERIOR
		unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$archivo = fopen("archivos/empleados.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeEmpleados AS $item){
			$cant = fwrite($archivo, $item->ToString());
			
			if($cant < 1)
			{
				$res = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($archivo);
		
		return $res;
	}

    
}

?>
