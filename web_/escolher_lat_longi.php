<html>
 <body>
 <h3>Por favor, indique as coordenadas do ponto, bem como dx e dy. </h3>
 <form action="listar_anomalias.php" method="post">
 
 <p>Latitude: <input type="numeric(8,6)" name="latit"/> entre -90 e 90</p>
 
 <p>Longitude: <input type="numeric(9,6)" name="long"/> entre -180 e 180</p>

 <p>Erro Latitude: <input type="numeric(8,6)" name="dlatit"/></p>
 
 <p>Erro Longitude: <input type="numeric(9,6)" name="dlong"/></p>

 <p><input type="submit" value="Submit"/></p>
 </form>

<?php
echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 ?>
 </body>
</html>