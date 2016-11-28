

<?php
session_start();

?>



 
 <?php
   if (!isset($_SESSION['usuario']))
   {
        

?> 

    <div class="container">

      <form  enctype="multipart/form-data" onsubmit="validarLogin();return false; ">
        <h1 class="sign-up-title">Iniciar Sesión</h1>
        <label for="correo" class="sr-only">Correo electrónico</label>
        <input type="email" id="correo" name="txtCorreo" class="form-control" placeholder="Correo electrónico" required="" autofocus="" value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>">
        <label for="clave" class="sr-only">Clave</label>
        <input type="password" id="clave" minlength="4" class="form-control" placeholder="clave" required="">
      <input type="file" name="foto" id="foto" required="required" accept="image/*"/>
               <img  src="Fotos/pordefecto.png" class="fotoform" id="foto"/>
        <p style="  color: black;">*La foto se actualiza al guardar.</p>
         <input readonly   type="hidden"    id="idusuario" class="fotoform" >
       
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" OnClick="GuardarUsuario()" >Ingresar</button>
      <p></p>
      <p></p>
      </form>

        </div>
    
    <div id="divFoto" style="height:350px;overflow:auto">
              
              </div>
      

 <?php }else{    echo"<h3>usted '".$_SESSION['usuario']."' esta logeado. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 MostarBotones();</script>
  <?php  }  ?>
  
