<html>
 <body>
<?php
 $id_it1 = $_REQUEST['id_it1'];
 $id_it2 = $_REQUEST['id_it2'];

 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 


 $sql = "insert into duplicado values(:id1, :id2)";

$result = $db->prepare($sql);
$result->execute([':id1' => $id_it1, ':id2' => $id_it2]);

echo("<p>duplicado registado com enorme sucesso :) </p>");

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