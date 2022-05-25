<html>
 <body>
 <h3>Por favor, descreva a anomalia em questao.</h3>
 <form action="inserir_anomalia_de_redacao.php" method="post">
  <p>Imagem: <input type="varchar(30)" name="imagem"/></p>
 
 <p>Zona: <input type="box" name="zona"/></p>
 
 <p>Lingua: <input type="varchar(30)" name="lingua"/></p>
 
 <p>Timestamp: <input type="timestamp" name="ts"/></p>
 
 <p>Descricao: <input type="text not null" name="descricao"/></p>
 
 
 <p><input type="submit" value="Submit"/></p>
 
 <?PHP
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 ?>
 </form>
 </body>
</html>