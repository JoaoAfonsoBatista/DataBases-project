<html>
 <body>

 <h3>Por favor, elabore o texto a editar. </h3>
 <form action="alterar_texto.php" method="post">
 
 <p><input type="hidden" name="email" value=<?=$_REQUEST['email1']?> /></p>
 
 <p><input type="hidden" name="nro" value=<?=$_REQUEST['nro']?> /></p>
 
  <p>Texto <input type="text" name="texto"/></p>
  
 <p><input type="submit" value="Submit"/></p>
 </form>
 <?PHP
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 ?>
 </body>
</html>