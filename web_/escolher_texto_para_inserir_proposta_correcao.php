<html>
 <body>
 <h3>Por favor, descreva a nova proposta de correcao. </h3>
 <form action="escolher_proposta_correcao_para_inserir_anomalia.php" method="post">
 
 <p>Texto: <input type="text" name="texto"/></p>
 
 <p> <input type="hidden" name="email" value=<?=$_REQUEST['email']?> /></p>
 
 <p><input type="submit" value="Submit"/></p>
 </form>
 
 
 <?php
echo("<p><td><a href=\"interface.php\">home</a></td>\n");
?>
 
 

 </body>
</html>