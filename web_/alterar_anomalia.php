<html>
 <body>
<?php
$email = $_REQUEST['email'];
$nro = $_REQUEST['nro'];
$anomalia_id1 = $_REQUEST['anomalia_id1'];
$anomalia_id2 = $_REQUEST['anomalia_id2'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "Update correcao SET anomalia_id = :anomalia_id2 WHERE email = :email AND nro = :nro and anomalia_id = :anomalia_id1;";
 
 $result = $db->prepare($sql);
 $result->execute([':anomalia_id2' => $anomalia_id2, ':email' => $email, ':nro' => $nro, ':anomalia_id1' => $anomalia_id1]);

echo("atualizacao realizada com sucesso");

 $db = null;
 
 echo("<p><td><a href=\"interface.php\">home</a></td>\n");
 
 }
 catch (PDOException $e)
 {
 echo("<p>ERROR: {$e->getMessage()}</p>");
 }
?>
 </body>
 </html>