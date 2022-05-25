<html>
 <body>
 <h3>Propostas para Alterar</h3>
<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql1 = "SELECT * FROM proposta_de_correcao;";
 
 $result1 = $db->prepare($sql1);
 $result1->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>Email</td>\n");
 echo("<td>Numero</td>\n");
 echo("<td>Data e hora</td>\n");
 echo("<td>Texto</td>\n");

 echo("</tr>\n");
 foreach($result1 as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['email']}</td>\n");
 echo("<td>{$row['nro']}</td>\n");
 echo("<td>{$row['data_hora']}</td>\n");
 echo("<td>{$row['texto']}</td>\n");
 echo("<td><a href=\"escolher_email.php?email1={$row['email']}&nro={$row['nro']}\">Alterar e-mail</a></td>\n");
 echo("<td><a href=\"escolher_a_alteracao_texto.php?email1={$row['email']}&nro={$row['nro']}\">Alterar texto</a></td>\n");

 echo("</tr>\n");
 }
 echo("</table>\n");
 
 $sql2 = "SELECT * FROM correcao;";
 
 $result2 = $db->prepare($sql2);
 $result2->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>Email</td>\n");
 echo("<td>Numero</td>\n");
 echo("<td>Id Anomalia</td>\n");
 echo("</tr>\n");
 
 foreach($result2 as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['email']}</td>\n");
 echo("<td>{$row['nro']}</td>\n");
 echo("<td>{$row['anomalia_id']}</td>\n");
 echo("<td><a href=\"escolher_email.php?email1={$row['email']}&nro={$row['nro']}\">Alterar e-mail</a></td>\n");
 echo("<td><a href=\"escolher_id.php?email={$row['email']}&nro={$row['nro']}&anomalia_id={$row['anomalia_id']}\">Alterar id</a></td>\n");

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