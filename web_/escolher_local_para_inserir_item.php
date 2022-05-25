<html>
 <body>
 <h3>Locais Publicos</h3>
<?php
 $descricao = $_REQUEST['descricao'];
 $localizacao = $_REQUEST['localizacao'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM local_publico;";
 
 $result = $db->prepare($sql);
 $result->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
  echo("<tr><td>Nome</td><td>Latitude</td><td>Longitude</td></tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['nome']}</td>\n");
 echo("<td>{$row['latitude']}</td>\n");
 echo("<td>{$row['longitude']}</td>\n");
 echo("<td><a href=\"inserir_item.php?latitude={$row['latitude']}&longitude={$row['longitude']}&descricao={$descricao}&localizacao={$localizacao}\">Escolher Local Publico</a></td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");

 $db = null;
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }

 
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 
?>
 </body>
 </html>
 