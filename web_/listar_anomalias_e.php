<html>
 <body>
<?php
$latit1 = $_REQUEST['latit1'];
$long1 = $_REQUEST['longitude1'];
$latit2 = $_REQUEST['latit2'];
$long2 = $_REQUEST['longitude2'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($latit1 < $latit2) {$latita = $latit1 and $latitb = $latit2;}
		else {$latita = $latit2 and $latitb = $latit1;}
		
	if ($long1 < $long2) {$longa = $long1 and $longb = $long2;}
		else {$longa = $long2 and $longb = $long1;}


 $sql = "Select anomalia.id,zona,lingua,anomalia.descricao, latitude, longitude, localizacao from anomalia, incidencia, item  where anomalia_id=anomalia.id and item_id=item.id and :latita <= latitude and :latitb >= latitude and :longa <= longitude and :longb >= longitude;";

$result = $db->prepare($sql);
$result->execute([':latita' => $latita, ':longa' => $longa, ':latitb' => $latitb, ':longb' => $longb]);


echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr><td>id</td><td>zona</td><td>lingua</td><td>descricao</td><td>latitude</td><td>longitude</td><td>localizacao</td></tr>\n");
 foreach($result as $row)
 {
 echo("<tr><td>");
 echo($row['id']);
 echo("</td><td>");
 echo($row['zona']);
 echo("</td><td>");
 echo($row['lingua']);
 echo("</td><td>");
 echo($row['descricao']);
 echo("</td><td>");
 echo($row['latitude']);
 echo("</td><td>");
 echo($row['longitude']);
  echo("</td><td>");
 echo($row['localizacao']);
 echo("</td></tr>\n");
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