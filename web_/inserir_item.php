<html>
 <body>
<?php
 $latitude = $_REQUEST['latitude'];
 $longitude = $_REQUEST['longitude'];
 $descricao = $_REQUEST['descricao'];
 $localizacao = $_REQUEST['localizacao'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

 $sql1 = "select id from item;";
 $result1 = $db->prepare($sql1);
 $result1->execute();
 $a = 0;
 foreach($result1 as $row)
 {
	 if($row['id']>$a) {$a = $row[id];};
 }
 $id = $a + 1;

 
 $sql = "insert into item values(:id, :descricao, :localizacao, :latitude, :longitude)";

$result = $db->prepare($sql);
$result->execute([':id' => $id, ':descricao' => $descricao, ':localizacao' => $localizacao, ':latitude' => $latitude, ':longitude' => $longitude]);
echo("<p>item inserido com sucesso :) </p>");

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