<html>
 <body>
 <h3>Escolher item associado a incidencia</h3>
<?php
 $em = $_REQUEST['email'];
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
 echo("<td>Id</td>\n");
 echo("<td>Descricao</td>\n");
 echo("<td>Localizacao</td>\n");

 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['id']}</td>\n");
 echo("<td>{$row['descricao']}</td>\n");
 echo("<td>{$row['localizacao']}</td>\n");
 echo("<td><a href=\"escolher_incidencia_para_registar_anomalia.php?id={$row['id']}&email={$em}\">escolher item</a></td>\n");
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
 
 