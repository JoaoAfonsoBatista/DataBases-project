<html>
 <body>
<?php
 $nome = $_REQUEST['nome'];
 $latit = $_REQUEST['latit'];
 $long = $_REQUEST['long'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "insert into local_publico values(:latit, :long, :nome)";

$result = $db->prepare($sql);
$result->execute([':latit' => $latit, ':long' => $long, ':nome' => $nome]);

echo("<p>local inserido com sucesso :) </p>");

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