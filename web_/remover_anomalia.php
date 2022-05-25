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
 
 
 $sql1 = "BEGIN TRANSACTION";
 
 $sql2 = "DELETE FROM anomalia WHERE id = :id;";
 
$result2 = $db->prepare($sq2);

$result2->execute([':id' => $id]);

  $sql3 = "DELETE FROM proposta_de_correcao NATURAL JOIN correcao, incidencia as i, anomalia as a  WHERE a.anomalia_id =i.anomalia_id and i.anomalia_id = a.id and a.id = :id;";

$result3 = $db->prepare($sq3);

$result3->execute([':id' => $id]);

$sql4 = "COMMIT TRANSACTION";
$result4 = $db->prepare($sql4);
$result4->execute();

echo("<p>anomalia removido com sucesso :) </p>");

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