<html>
 <body>
 <h3>Escolher anomalia associada a incidencia</h3>
<?php
 $em = $_REQUEST['email'];
 $it_id = $_REQUEST['id'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM anomalia as A WHERE A.id not in (SELECT anomalia_id from incidencia);";
 
 $result = $db->prepare($sql);
 $result->execute();

 echo("<table border=\"1\" cellspacing=\"15\">\n");
 foreach($result as $row)
 {
 echo("<tr>\n");
 echo("<td>{$row['id']}</td>\n");
 echo("<td>{$row['descricao']}</td>\n");
 echo("<td><a href=\"registar_incidencia.php?id={$row['id']}&it_id={$it_id}&email={$em}\">escolher anomalia</a></td>\n");
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