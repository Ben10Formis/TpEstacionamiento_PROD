<?php
	session_start();	
?>
<input type="search" id="usuario" readonly placeholder=
											"<?php
 	echo isset($_SESSION['mailUsr'])?$_SESSION['mailUsr']:"No hay usuario";// muesta quien esta conectado
 											?>">