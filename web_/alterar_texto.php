<html>
 <body>
<?php
$email = $_REQUEST['email'];
$nro = $_REQUEST['nro'];
$texto = $_REQUEST['texto'];
 try
 {
 $host = "db.ist.utl.pt";
 $user ="ist";
 $password = "";
 $dbname = $user;

 $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 $data_hora = date("Y-m-d, H:i:s");

 $sql = "Update proposta_de_correcao SET data_hora = :data_hora,texto= :texto WHERE email = :email AND nro = :nro;";
 
 $result = $db->prepare($sql);
 $result->execute([':data_hora' => $data_hora, ':texto' => $texto, ':email' => $email, ':nro' => $nro]);

echo("Atualizacao realizada com sucesso");

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