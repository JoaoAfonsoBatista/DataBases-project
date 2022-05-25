<html>
 <body>
<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM anomalia where tem_anomalia_redacao = True;";
 
 $result = $db->prepare($sql);
 $result->execute();
 
 $sql1 = "SELECT * FROM anomalia NATURAL JOIN anomalia_traducao;";
 
 $result1 = $db->prepare($sql1);
 $result1->execute();
 
 echo("<h3>Anomalias de redacao</h3>");

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>id</td>\n");
 echo("<td>zona</td>\n");
 echo("<td>imagem</td>\n");
 echo("<td>lingua</td>\n");
 echo("<td>timestamp</td>\n");
 echo("<td>descricao</td>\n");
 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['id']}</td>\n");
 echo("<td>{$row['zona']}</td>\n");
 echo("<td>{$row['imagem']}</td>\n");
 echo("<td>{$row['lingua']}</td>\n");
 echo("<td>{$row['ts']}</td>\n");
 echo("<td>{$row['descricao']}</td>\n");
 echo("<td><a href=\"remover_anomalia.php?id={$row[id]}\">Remover anomalia</a></td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");
 
 
 echo("<h3>Anomalias de traducao</h3>");
 
 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>id</td>\n");
 echo("<td>zona</td>\n");
 echo("<td>zona2</td>\n");
 echo("<td>imagem</td>\n");
 echo("<td>lingua</td>\n");
 echo("<td>lingua2</td>\n");
 echo("<td>timestamp</td>\n");
 echo("<td>descricao</td>\n");
 echo("</tr>\n");
 foreach($result1 as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['id']}</td>\n");
 echo("<td>{$row['zona']}</td>\n");
 echo("<td>{$row['zona2']}</td>\n");
 echo("<td>{$row['imagem']}</td>\n");
 echo("<td>{$row['lingua']}</td>\n");
 echo("<td>{$row['lingua2']}</td>\n");
 echo("<td>{$row['ts']}</td>\n");
 echo("<td>{$row['descricao']}</td>\n");
 echo("<td><a href=\"remover_anomalia.php?id={$row[id]}\">Remover anomalia</a></td>\n");
 echo("</tr>\n");
 }
 echo("</table>\n");

 $db = null;
 
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }
?>
 </body>
 </html>