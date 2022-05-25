<html>
 <body>
 <h3>Por favor, descreva o item em questao e indique a sua localizacao.</h3>
 <form action="escolher_local_para_inserir_item.php" method="post">
 <p>Descricao: <input type="text" name="descricao"/></p>
 
 <p>Localizacao: <input type="text" name="localizacao"/></p>

 
 <p><input type="submit" value="Submit"/></p>
 </form>
  <?php 
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 ?>
 </body>
</html>