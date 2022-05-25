<html>
 <body>
 <h3>Escolha um segundo local, por favor</h3>
<?php
$latit1 = $_REQUEST['latit1'];
$longitude1 = $_REQUEST['longitude1'];

 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "SELECT * FROM local_publico where latitude != :latit1 and longitude != :longitude1;";
 
 $result = $db->prepare($sql);
 $result->execute([':latit1' => $latit1, ':longitude1' => $longitude1]);
 

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
 echo("<td><a href=\"listar_anomalias_e.php?latit2={$row['latitude']}&longitude2={$row['longitude']}&latit1=$latit1&longitude1=$longitude1\">Escolher Local Publico</a></td>\n");
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
 