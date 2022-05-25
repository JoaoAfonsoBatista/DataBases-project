<html>
 <body>
 <h3>Propostas de correcao</h3>
<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM proposta_de_correcao;";
 
 $result = $db->prepare($sql);
 $result->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>Email</td>\n");
 echo("<td>Numero</td>\n");
 echo("<td>Data e hora</td>\n");
 echo("<td>texto</td>\n");

 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['email']}</td>\n");
 echo("<td>{$row['nro']}</td>\n");
 echo("<td>{$row['data_hora']}</td>\n");
 echo("<td>{$row['texto']}</td>\n");
 echo("<td><a href=\"remover_proposta_de_correcao.php?email={$row['email']}&nro={$row['nro']}\">Remover Proposta</a></td>\n");

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