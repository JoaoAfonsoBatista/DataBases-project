<html>
 <body>
 <h3>Escolher email associado a incidencia</h3>
<?php
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT email FROM utilizador;";
 
 $result = $db->prepare($sql);
 $result->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr>\n");
 echo("<td>Email</td>\n");
 echo("</tr>\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['email']}</td>\n");
 echo("<td><a href=\"escolher_incidencia_para_registar_item.php?email={$row['email']}\">escolher email</a></td>\n");
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