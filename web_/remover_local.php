<html>
 <body>
<?php
 $lat = $_REQUEST['latit'];
 $long = $_REQUEST['longitude'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 $sql = "DELETE FROM local_publico WHERE (latitude = :lat and longitude = :long);";
 
$result = $db->prepare($sql);

$result->execute([':lat' => $lat, ':long' => $long]);


echo("<p>local removido com sucesso :) </p>");

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