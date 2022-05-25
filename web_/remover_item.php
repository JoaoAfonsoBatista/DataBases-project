<html>
 <body>
<?php
 $id = $_REQUEST['id'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 $sql = "DELETE FROM item WHERE id = :id;";

 
$result = $db->prepare($sql);

$result->execute([':id' => $id]);


echo("<p>item removido com sucesso :) </p>");

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