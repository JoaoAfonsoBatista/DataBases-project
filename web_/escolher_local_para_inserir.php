<html>
 <body>
 <h3>Por favor, nomeie o novo local, indicando as suas coordenadas geograficas. </h3>
 <form action="inserir_local.php" method="post">
 <p>Nome: <input type="varchar(255)" name="nome"/></p>
 
 <p>Latitude: <input type="numeric(8,6)" name="latit"/></p>
 
 <p>Longitude: <input type="numeric(9,6)" name="long"/></p>
 <p><input type="submit" value="Submit"/></p>
 </form>
 <?PHP
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 ?>
 </body>
</html>