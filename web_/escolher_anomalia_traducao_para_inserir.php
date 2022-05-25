<html>
 <body>
 <h3>Por favor, descreva a anomalia em questao.</h3>
 <form action="inserir_anomalia_de_traducao.php" method="post">
  <p>Imagem: <input type="varchar(30)" name="imagem"/></p>
 
 <p>Zona: <input type="box" name="zona"/></p>
 
 <p>Zona2: <input type="box" name="zona2"/></p>
 
 <p>Lingua: <input type="varchar(30)" name="lingua"/></p>
 
 <p>Lingua2: <input type="varchar(30)" name="lingua2"/></p>
 
 <p>Timestamp: <input type="timestamp" name="ts"/></p>
 
 <p>Descricao: <input type="text not null" name="descricao"/></p>
 
 
 <p><input type="submit" value="Submit"/></p>
 
 <?PHP
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 ?>
 </form>
 </body>
</html>