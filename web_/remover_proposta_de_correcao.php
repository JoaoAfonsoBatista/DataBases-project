<html>
 <body>
<?php
 $email = $_REQUEST['email'];
 $nro = $_REQUEST['nro'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;
 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 
 
 $sql = "DELETE FROM proposta_de_correcao WHERE email = :email and nro = :nro;";
 
$result = $db->prepare($sql);

$result->execute([':email' => $email, ':nro' => $nro] );

echo("<p>proposta de correcao removido com sucesso :) </p>");

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