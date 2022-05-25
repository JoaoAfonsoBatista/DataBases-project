<html>
 <body>
 <h3>Escolha um primeiro local, por favor</h3>
<?php
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
 echo("<tr>\n");
 echo("<td>Nome</td>\n");
 echo("<td>Latitude</td>\n");
 echo("<td>Longitude</td>\n");
 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['nome']}</td>\n");
 echo("<td>{$row['latitude']}</td>\n");
 echo("<td>{$row['longitude']}</td>\n");
 echo("<td><a href=\"escolher_local2.php?latit1={$row['latitude']}&longitude1={$row['longitude']}\">Escolher Local Publico</a></td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");
 
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");

 $db = null;
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }
?>
 </body>
 </html>
 