<html>
 <body>
<?php
$latit = $_REQUEST['latit'];
$long = $_REQUEST['long'];
$dlatit = $_REQUEST['dlatit'];
$dlong = $_REQUEST['dlong'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $diflatit1 = (($latit) - ($dlatit));
 $diflatit2 = (($latit) + ($dlatit));
 $diflong1 = (($long) - ($dlong));
 $diflong2 = (($long) + ($dlong));

 $sql = "Select anomalia.id,zona,lingua,anomalia.descricao from anomalia, incidencia, item  where anomalia_id=anomalia.id and item_id=item.id and $diflatit1 <= latitude and $diflatit2 >= latitude and $diflong1 <= longitude and $diflong2 >= longitude and ts between current_timestamp - interval '3 month' and current_timestamp;";

$result = $db->prepare($sql);
$result->execute();


echo("<table border=\"1\" cellspacing=\"15\">\n");
 echo("<tr><td>id</td><td>zona</td><td>lingua</td><td>descricao</td></tr>\n");
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