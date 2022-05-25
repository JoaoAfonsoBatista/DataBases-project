<html>
 <body>
 <h3>Itens</h3>
<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM item;";
 
 $result = $db->prepare($sql);
 $result->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>id</td>\n");
 echo("<td>descricao</td>\n");
 echo("<td>localizacao</td>\n");
 echo("<td>latitude</td>\n");
 echo("<td>longitude</td>\n");

 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['id']}</td>\n");
 echo("<td>{$row['descricao']}</td>\n");
 echo("<td>{$row['localizacao']}</td>\n");
 echo("<td>{$row['latitude']}</td>\n");
 echo("<td>{$row['longitude']}</td>\n");
 echo("<td><a href=\"remover_item.php?id=$row[id]\">Remover item</a></td>\n");
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
 