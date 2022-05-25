<html>
 <body>
<?php
 $email = $_REQUEST['email'];
 $it_id = $_REQUEST['it_id'];
 $an_id = $_REQUEST['id'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "insert into incidencia values(:an_id, :it_id, :email)";

$result = $db->prepare($sql);
$result->execute([':an_id' => $an_id, ':it_id' => $it_id, ':email' => $email]);

echo("<p>Incidencia inserido com sucesso :) </p>");

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

